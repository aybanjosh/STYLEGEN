<?php
// Include database connection
include('db.php');

// Get product_id from request
$product_id = $_GET['product_id'] ?? 0;

if (empty($product_id)) {
    echo json_encode(['success' => false, 'message' => 'Product ID is required.']);
    exit;
}

// Query to fetch reviews for the specific product
$query = "SELECT user_id, review, rating, review_date, image FROM reviews WHERE product_id = ? ORDER BY review_date DESC";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

$reviews = [];
while ($row = $result->fetch_assoc()) {
    $images = json_decode($row['image'], true); // Decode JSON to array
    $reviews[] = [
        'user_id' => $row['user_id'],
        'review' => $row['review'],
        'rating' => $row['rating'],
        'review_date' => $row['review_date'],
        'images' => $images,
    ];
}

// Return reviews as JSON
echo json_encode(['reviews' => $reviews]);
?>
