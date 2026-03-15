<?php
session_start();

// Initialize cart count
$cartCount = 0;

// Check if the cart exists in the session
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $productKey => $quantity) {
        $cartCount += $quantity;  // Add the quantity of each item to the cart count
    }
}

// Return the cart count
echo $cartCount;
?>
