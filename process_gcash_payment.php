<?php
session_start();
include 'db.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $gcashNumber = $_POST['gcashNumber'] ?? '';
    $gcashPin = $_POST['gcashPin'] ?? '';
    $totalPrice = $_POST['totalPrice'] ?? 0;

    $user_id = $_SESSION['user_id'] ?? null; // Assume session contains the user ID

    // Validate inputs
    if (empty($fullname) || empty($phone) || empty($address)) {
        echo json_encode(['status' => 'error', 'message' => 'Please provide all required details: Full Name, Phone, and Address.']);
        exit();
    }
    if (!preg_match('/^\d{11}$/', $gcashNumber)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid GCash Number.']);
        exit();
    }
    if (!preg_match('/^\d{4}$/', $gcashPin)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid GCash PIN.']);
        exit();
    }

    // Begin transaction
    mysqli_begin_transaction($connection);

    try {
        // Step 1: Insert GCash payment details
        $payment_query = "INSERT INTO gcash_payment (user_id, gcash_number, gcash_pin, total_price, payment_date) 
                          VALUES ('$user_id', '$gcashNumber', '$gcashPin', '$totalPrice', NOW())";
        if (!mysqli_query($connection, $payment_query)) {
            throw new Exception('Error inserting GCash payment: ' . mysqli_error($connection));
        }

        // Step 2: Create the order
        $order_query = "INSERT INTO orders (user_id, fullname, phone, address, total_price, payment_method, order_status, order_date) 
                        VALUES ('$user_id', '$fullname', '$phone', '$address', '$totalPrice', 'GCash', 'To Ship', NOW())";
        if (!mysqli_query($connection, $order_query)) {
            throw new Exception('Error creating order: ' . mysqli_error($connection));
        }

        // Step 3: Remove items from the cart
        $delete_cart_query = "DELETE FROM cart WHERE user_id = '$user_id'";
        if (!mysqli_query($connection, $delete_cart_query)) {
            throw new Exception('Error clearing cart: ' . mysqli_error($connection));
        }

        // Commit transaction
        mysqli_commit($connection);

        // Return success response
        echo json_encode(['status' => 'success', 'redirect' => 'success.php']);
    } catch (Exception $e) {
        // Rollback transaction on error
        mysqli_rollback($connection);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>
