<?php
session_start();
include('db.php');

// Ensure the database connection is established
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get order ID from POST
if (isset($_POST['order_id'])) {
    $order_id = mysqli_real_escape_string($connection, $_POST['order_id']);

    // Update the order status to "To Ship"
    $update_query = "UPDATE orders SET status = 'To Ship' WHERE order_id = '$order_id'";
    if (mysqli_query($connection, $update_query)) {
        header("Location: topay.php?success=Order marked as paid.");
        exit();
    } else {
        die("Query failed: " . mysqli_error($connection));
    }
} else {
    header("Location: topay.php?error=No order ID provided.");
    exit();
}
