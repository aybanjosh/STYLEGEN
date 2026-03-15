<?php
session_start();
include('db.php');

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] !== true) {
    header('Location: login.php');
    exit();
}

// Handle order approval action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_order'])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status']; // Get the current order status (To Ship or To Receive)

    if ($order_status == 'TO SHIP') {
        // Move the order to 'TO RECEIVE'
        $query = "UPDATE orders SET order_status = 'TO RECEIVE' WHERE order_id = '$order_id'";
        if (mysqli_query($connection, $query)) {
            echo "<script>alert('Order has been moved to TO RECEIVE.'); window.location.href = 'dashboard.php';</script>";
        } else {
            echo "<script>alert('Error updating order status.');</script>";
        }
    } elseif ($order_status == 'TO RECEIVE') {
        // Move the order to 'TO RATE'
        $query = "UPDATE orders SET order_status = 'TO RATE' WHERE order_id = '$order_id'";
        if (mysqli_query($connection, $query)) {
            echo "<script>alert('Order has been moved to TO RATE.'); window.location.href = 'dashboard.php';</script>";
        } else {
            echo "<script>alert('Error updating order status.');</script>";
        }
    }
}
?>
