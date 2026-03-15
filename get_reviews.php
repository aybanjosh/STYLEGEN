<?php
// Include your database connection file (ensure db.php contains PDO connection setup)
require_once 'db.php'; // Assuming db.php establishes a PDO connection

// Fetch all reviews from the database
$stmt = $pdo->prepare("SELECT review_text, rating, media FROM product_reviews ORDER BY review_date DESC");
$stmt->execute();
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return the reviews as JSON
echo json_encode(['reviews' => $reviews]);
?>
