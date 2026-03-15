<?php
// Include database connection
include('db.php');

// Check if product_id is passed
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id']; // Get the product_id
    $product_id = mysqli_real_escape_string($connection, $product_id); // Sanitize the input

    // Query to fetch product details from database
    $sql = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

        // Display product details
        echo "<h1>" . htmlspecialchars($product['product_name']) . "</h1>";
        echo "<img src='" . htmlspecialchars($product['image_url']) . "' alt='" . htmlspecialchars($product['product_name']) . "' />";
        echo "<p>" . htmlspecialchars($product['description']) . "</p>";
        echo "<p>Price: " . htmlspecialchars($product['price']) . "</p>";
        // You can add more details as needed
    } else {
        echo "Product not found.";
    }
} else {
    echo "Product ID is missing.";
}
?>
