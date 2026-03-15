<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('db.php');

$response = ['success' => false, 'message' => ''];

try {
    // Debugging: Log POST and SESSION data
    error_log("POST Data: " . print_r($_POST, true));
    error_log("SESSION Data: " . print_r($_SESSION, true));

    $reviewText = $_POST['reviewText'] ?? '';
    $reviewRating = $_POST['reviewRating'] ?? 0;
    $productId = $_POST['product_id'] ?? 0; // Received from frontend
    $userId = $_SESSION['user_id'] ?? 0; // Retrieved from session

    // Validate required fields
    if (!$reviewText || !$reviewRating || !$productId || !$userId) {
        throw new Exception('Missing required fields: reviewText, reviewRating, userId, or productId.');
    }

    $uploadedImages = [];
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Handle image uploads
    if (isset($_FILES['reviewImages']['name']) && count($_FILES['reviewImages']['name']) > 0) {
        foreach ($_FILES['reviewImages']['name'] as $key => $imageName) {
            $imageTmpName = $_FILES['reviewImages']['tmp_name'][$key];
            $imagePath = $uploadDir . basename($imageName);

            if (!move_uploaded_file($imageTmpName, $imagePath)) {
                throw new Exception("Failed to upload image: $imageName");
            }

            $uploadedImages[] = $imagePath;
        }
    }

    $imagesJson = json_encode($uploadedImages);

    // Insert the review into the database
    $stmt = $connection->prepare("INSERT INTO reviews (user_id, product_id, review, rating, review_date, image) VALUES (?, ?, ?, ?, NOW(), ?)");
    if (!$stmt) {
        throw new Exception('Database error: ' . $connection->error);
    }
    $stmt->bind_param("iisis", $userId, $productId, $reviewText, $reviewRating, $imagesJson);

    if (!$stmt->execute()) {
        throw new Exception('Failed to save review: ' . $stmt->error);
    }

    $response['success'] = true;
    $response['message'] = 'Review submitted successfully.';
} catch (Exception $e) {
    error_log("Error in submit_review.php: " . $e->getMessage());
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>
