<?php
session_start();
include('db.php');

// Check if user is admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header('Location: login.php');
    exit();
}

// Handle product deletion
if (isset($_GET['delete'])) {
    $product_id = $_GET['delete'];
    $delete_query = "DELETE FROM products WHERE product_id = ?";
    $stmt = $connection->prepare($delete_query);
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        echo "<script>alert('Product deleted successfully!'); window.location.href = 'manageproducts.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error deleting product. Please try again.');</script>";
    }
}

// Fetch all products
$query = "SELECT * FROM products";
$result = mysqli_query($connection, $query);

// Check for errors
if (!$result) {
    die("Query Failed: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <title>Manage Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .back-btn {
            background-color: #F8D0C8;
            color: black;
        }
        .back-btn:hover {
            background-color: #f5b8bc;
        }
        .action-btn {
            font-size: 12px;
            padding: 5px 10px;
        }
        .btn-warning {
            background-color: #ffcc00;
            border-color: #e6b800;
        }
        .btn-warning:hover {
            background-color: #e6b800;
            border-color: #cc9a00;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #c82333;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
    <script>
        // Confirm Delete Dialog
        function confirmDelete(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
                window.location.href = "manageproducts.php?delete=" + productId;
            }
        }
    </script>
</head>
<body>
    <div class="container my-4">
        <h1 class="text-center">Manage Products</h1>

        <!-- Add Product Button -->
        <a href="addproduct.php" class="btn btn-success mb-3">Add Product</a>

        <!-- Back to Dashboard Button -->
        <a href="dashboard.php" class="btn back-btn mb-3">Back to Dashboard</a>

        <!-- Products Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($product = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['product_id']); ?></td>
                        <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                        <td><?php echo htmlspecialchars($product['description']); ?></td>
                        <td>₱<?php echo number_format($product['price'], 2); ?></td>
                        <td>
                            
                            <!-- Delete Button with Confirmation -->
                            <button onclick="confirmDelete(<?php echo $product['product_id']; ?>)" 
                                    class="btn btn-danger action-btn">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
