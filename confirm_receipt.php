<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$order_id = $_POST['order_id'];

// Update the order status to 'TO RATE'
$query = "UPDATE orders SET order_status = 'TO RATE' WHERE order_id = '$order_id' AND user_id = '{$_SESSION['user_id']}'";
if (mysqli_query($connection, $query)) {
    echo "<script>alert('Order has been moved to TO RATE.'); window.location.href = 'dashboard.php';</script>";
} else {
    echo "<script>alert('Error confirming receipt.');</script>";
}
?>
