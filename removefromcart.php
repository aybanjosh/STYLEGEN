<?php
session_start();
include('db.php'); // Database connection

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'] ?? null;
    $cart_id = $_POST['cart_id'] ?? null;

    if (!$user_id || !$cart_id) {
        $response['message'] = 'Invalid request.';
        echo json_encode($response);
        exit;
    }

    // Remove the product from the cart
    $delete_query = "DELETE FROM cart WHERE cart_id = ? AND user_id = ?";
    $stmt = $connection->prepare($delete_query);
    $stmt->bind_param("ii", $cart_id, $user_id);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Product removed successfully.';
    } else {
        $response['message'] = 'Failed to remove product.';
    }

    $stmt->close();
} else {
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
?>
