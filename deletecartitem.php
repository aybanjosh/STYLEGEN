<?php
// Include the database connection
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cart_id = $_POST['cart_id'];

    // Delete the cart item from the database
    $query = "DELETE FROM cart WHERE cart_id = '$cart_id'";

    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Item removed from cart.');</script>";
        echo "<script>window.location.href = 'cart.php';</script>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
