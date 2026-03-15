<?php
session_start();
include('db.php'); // Database connection

$response = ['success' => false, 'message' => '', 'cart_count' => 0, 'product_name' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'] ?? null;
    $product_id = $_POST['product_id'] ?? null;
    $price = $_POST['price'] ?? null;
    $orig_price = $_POST['orig_price'] ?? null;
    $color = $_POST['color'] ?? null;
    $size = $_POST['size'] ?? null;
    $image_url = $_POST['image_url'] ?? null;

    // Validate required fields
    if (!$user_id) {
        $response['message'] = 'You must be logged in to add to cart.';
        echo json_encode($response);
        exit;
    }

    if (!$product_id || !$size || !$color) {
        $response['message'] = 'Product ID, Size, and Color are required.';
        echo json_encode($response);
        exit;
    }

    // Fetch product name from database based on product_id
    $product_query = "SELECT product_name FROM products WHERE product_id = ?";
    $product_stmt = $connection->prepare($product_query);
    if ($product_stmt) {
        $product_stmt->bind_param("i", $product_id);
        $product_stmt->execute();
        $product_result = $product_stmt->get_result();

        if ($product_result && $product_row = $product_result->fetch_assoc()) {
            $product_name = $product_row['product_name'];
            $response['product_name'] = $product_name; // Add product name to the response
        } else {
            $response['message'] = 'Invalid product ID or product name not found.';
            echo json_encode($response);
            exit;
        }

        $product_stmt->close();
    } else {
        $response['message'] = 'Failed to retrieve product details from the database.';
        echo json_encode($response);
        exit;
    }

    // Check if the product already exists in the cart
    $check_query = "SELECT * FROM cart WHERE user_id = ? AND product_id = ? AND color = ? AND size = ?";
    $stmt = $connection->prepare($check_query);
    $stmt->bind_param("iiss", $user_id, $product_id, $color, $size);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $row = $result->fetch_assoc()) {
        // Update quantity if product exists
        $new_quantity = $row['quantity'] + 1;
        $update_query = "UPDATE cart SET quantity = ? WHERE cart_id = ?";
        $update_stmt = $connection->prepare($update_query);
        $update_stmt->bind_param("ii", $new_quantity, $row['cart_id']);
        $update_stmt->execute();
        $update_stmt->close();
        $response['success'] = true;
        $response['message'] = 'Product quantity updated in your cart.';
    } else {
        // Insert new product into the cart
        $insert_query = "INSERT INTO cart (user_id, product_id, product_name, price, orig_price, color, size, quantity, image_url) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, 1, ?)";
        $insert_stmt = $connection->prepare($insert_query);
        $insert_stmt->bind_param("iissssss", $user_id, $product_id, $product_name, $price, $orig_price, $color, $size, $image_url);
        $insert_stmt->execute();
        $insert_stmt->close();
        $response['success'] = true;
        $response['message'] = 'Product added to your cart.';
    }

    // Add cart count to the response
    $cart_count_query = "SELECT SUM(quantity) AS cart_count FROM cart WHERE user_id = ?";
    $cart_count_stmt = $connection->prepare($cart_count_query);
    $cart_count_stmt->bind_param("i", $user_id);
    $cart_count_stmt->execute();
    $cart_count_result = $cart_count_stmt->get_result();
    $cart_count = ($cart_count_result && $cart_row = $cart_count_result->fetch_assoc()) ? $cart_row['cart_count'] : 0;
    $response['cart_count'] = $cart_count;
    $cart_count_stmt->close();
}

echo json_encode($response);
?>
