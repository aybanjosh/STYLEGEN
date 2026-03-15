<?php
session_start();
include 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to remove items from the cart.");
}

$user_id = $_SESSION['user_id'];

// Check if cart_id is provided
if (!isset($_POST['cart_id'])) {
    die("Invalid request.");
}

$cart_id = $_POST['cart_id'];

// Ensure the database connection is established
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Delete the item from the cart (only if it belongs to the logged-in user)
$delete_query = "DELETE FROM cart WHERE cart_id = ? AND user_id = ?";
$stmt = $connection->prepare($delete_query);
$stmt->bind_param("ii", $cart_id, $user_id);

if ($stmt->execute()) {
    // Redirect back to the cart page after removing the item
    header('Location: cart.php');
    exit();
} else {
    echo "Error removing item from cart.";
}
?>
