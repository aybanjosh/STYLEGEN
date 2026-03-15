<?php
include('db.php'); // Include database connection

header('Content-Type: application/json');

$response = ['success' => false, 'message' => '', 'average_rating' => 0, 'review_count' => 0];

try {
    $productId = isset($_GET['product_id']) ? (int)$_GET['product_id'] : 0;

    if (!$productId) {
        throw new Exception('Product ID is required.');
    }

    // Query to calculate average rating and count reviews
    $query = "SELECT AVG(rating) AS average_rating, COUNT(*) AS review_count FROM reviews WHERE product_id = ?";
    $stmt = $connection->prepare($query);
    if (!$stmt) {
        throw new Exception('Database error: ' . $connection->error);
    }

    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $response['success'] = true;
    $response['average_rating'] = $row['average_rating'] ? (float) $row['average_rating'] : 0;
    $response['review_count'] = (int) $row['review_count'];

    $stmt->close();
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>
