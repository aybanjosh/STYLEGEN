<?php
session_start();
include 'db.php'; // Include your database connection file

$user_id = $_SESSION['user_id'] ?? 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user inputs
    $fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $payment_method = mysqli_real_escape_string($connection, $_POST['payment_method']);
    $total_price = mysqli_real_escape_string($connection, $_POST['total_price']);

    // Check if all required fields are filled
    if (empty($fullname) || empty($phone) || empty($address) || empty($payment_method)) {
        $_SESSION['error_message'] = "Error: All fields are required."; // Store the error message in session
        header('Location: checkout.php'); // Redirect back to checkout.php with the error message
        exit;
    }

    // Fetch cart items from the database
    $cart_query = "SELECT * FROM cart WHERE user_id = '$user_id'";
    $cart_result = mysqli_query($connection, $cart_query);

    if (mysqli_num_rows($cart_result) > 0) {
        // Insert order details into the `orders` table
        $order_query = "INSERT INTO orders (user_id, fullname, phone, address, payment_method, total_price, order_date) 
                        VALUES ('$user_id', '$fullname', '$phone', '$address', '$payment_method', '$total_price', NOW())";

        if (mysqli_query($connection, $order_query)) {
            $order_id = mysqli_insert_id($connection); // Get the last inserted order ID

            // Insert order items into the `order_items` table
            while ($row = mysqli_fetch_assoc($cart_result)) {
                $product_id = $row['product_id']; // Directly fetch product_id from the cart table
                $product_name = mysqli_real_escape_string($connection, $row['product_name']); // Escape special characters
                $price = $row['price'];
                $quantity = $row['quantity'];

                // Insert the order item
                $order_item_query = "INSERT INTO order_items (order_id, product_id, product_name, price, quantity) 
                                     VALUES ('$order_id', '$product_id', '$product_name', '$price', '$quantity')";
                if (!mysqli_query($connection, $order_item_query)) {
                    echo "Error inserting order item: " . mysqli_error($connection);
                }
            }

            // Clear the user's cart
            $clear_cart_query = "DELETE FROM cart WHERE user_id = '$user_id'";
            mysqli_query($connection, $clear_cart_query);

            // Redirect to success page
            header('Location: success.php');
            exit;
        } else {
            echo "Error creating order: " . mysqli_error($connection);
        }
    } else {
        echo "Cart is empty!";
    }
} else {
    header('Location: checkout.php');
    exit;
}
?>
