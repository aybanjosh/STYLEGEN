<?php
session_start();
include('db.php');

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if user is admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] !== true) {
    header('Location: login.php');
    exit();
}

// Check if product_id is passed
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details
    $query = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if (!$product) {
        header('Location: manageproducts.php');
        exit();
    }
} else {
    header('Location: manageproducts.php');
    exit();
}

// Handle form submission for updating product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_paths = [];

    // Handle new image uploads
    if (!empty($_FILES['images']['name'][0])) {
        $upload_dir = 'uploads/products/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['images']['name'][$key];
            $file_tmp = $_FILES['images']['tmp_name'][$key];
            $file_path = $upload_dir . uniqid() . '_' . basename($file_name);

            if (move_uploaded_file($file_tmp, $file_path)) {
                $image_paths[] = $file_path;
            }
        }
    }

    // If no new images, retain old ones
    $images = !empty($image_paths) ? json_encode($image_paths) : $product['images'];

    // Update the product details in the database
    $update_query = "UPDATE products SET product_name = ?, description = ?, price = ?, images = ? WHERE product_id = ?";
    $stmt = $connection->prepare($update_query);
    $stmt->bind_param("ssdsi", $product_name, $description, $price, $images, $product_id);

    if ($stmt->execute()) {
        header('Location: manageproducts.php?success=Product updated successfully');
        exit();
    } else {
        $error_message = "Error updating product. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }
        .container {
            margin-top: 50px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #4CAF50;
            border: none;
        }
        .btn-primary:hover {
            background-color: #45a049;
        }
        .existing-images img {
            margin-right: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Edit Product</h1>
        <?php if (isset($error_message)) echo "<div class='alert alert-danger'>$error_message</div>"; ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
            </div>

            <!-- Display Existing Images -->
            <div class="form-group">
                <label>Existing Images</label>
                <div class="existing-images">
                    <?php
                    $images = json_decode($product['images'], true);
                    if ($images) {
                        foreach ($images as $image) {
                            echo '<img src="' . htmlspecialchars($image) . '" alt="Product Image" width="100" height="100">';
                        }
                    } else {
                        echo '<p>No images available.</p>';
                    }
                    ?>
                </div>
            </div>

            <!-- Upload New Images -->
            <div class="form-group">
                <label for="images">Upload New Images (Optional)</label>
                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="manageproducts.php" class="btn btn-secondary">Back to Manage Products</a>
        </form>
    </div>
</body>
</html>
