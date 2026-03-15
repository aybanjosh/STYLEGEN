<?php
session_start();
include('db.php');

// Ensure the database connection is established
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Assume user_id is stored in the session, otherwise default to 1
$user_id = $_SESSION['user_id'] ?? 1; 

// Fetch the most recent order placed by the user
$order_query = "SELECT order_id FROM orders WHERE user_id = '$user_id' ORDER BY order_date DESC LIMIT 1";
$order_result = mysqli_query($connection, $order_query);

// Check for query errors
if (!$order_result) {
    die("Query failed: " . mysqli_error($connection));
}

// Fetch the order ID
$order_id = null;
if ($order_row = mysqli_fetch_assoc($order_result)) {
    $order_id = $order_row['order_id'];
} else {
    // If no order found, handle accordingly
    $order_id = "Unknown";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Successful</title>
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Include Canvas Confetti script -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 50px auto;
            background: #F8D0C8; /* Light transparent background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .success-icon {
            font-size: 100px;
            color: #28a745;
            margin-bottom: 20px;
        }
        h1 {
            color: #343a40;
            margin-bottom: 10px;
        }
        .order-number {
            font-weight: bold;
            color: #28a745;
        }
        .btn-container {
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            margin: 5px;
            background-color: #B0C6B5;
            color: black;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #D6B4FC;
        }
        .illustration {
            width: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <img src="sglogo.png" alt="Illustration" class="illustration">
        <h1>Thank you for shopping!</h1>
        <p>Your order id is <span class="order-number"><?php echo htmlspecialchars($order_id); ?></span>.</p>
        <div class="btn-container">
            <a href="firstpage.php" class="btn">HOME</a>
            <a href="trackorder.php" class="btn">TRACK ORDER</a>
        </div>
    </div>

    <script>
        // Trigger confetti effect when the page loads
        window.onload = function() {
            confetti({
                particleCount: 150,
                spread: 70,
                origin: { x: 0.5, y: 0.5 },
                colors: ['#28a745', '#ffdf00', '#ff5733', '#2e6dbf']
            });
        };
    </script>
</body>
</html>
