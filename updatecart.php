<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart_id = $_POST['cart_id'];
    $action = $_POST['action'];

    if ($action === 'increase') {
        $query = "UPDATE cart SET quantity = quantity + 1 WHERE cart_id = '$cart_id'";
    } elseif ($action === 'decrease') {
        $query = "UPDATE cart SET quantity = GREATEST(quantity - 1, 1) WHERE cart_id = '$cart_id'";
    }

    mysqli_query($connection, $query);
}

header('Location: cart.php');
exit;
?>
