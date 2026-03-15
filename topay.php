<?php
session_start();
include('db.php');

// Ensure the database connection is established
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch orders for the current user with "Cash on Delivery" payment method and "To Pay" status
$user_id = $_SESSION['user_id'] ?? 1;
$to_pay_query = "
    SELECT 
        order_id, user_id, fullname, phone, address, payment_method, total_price, status, order_date
    FROM 
        orders
    WHERE 
        user_id = '$user_id' 
        AND payment_method = 'Cash on Delivery' 
        AND status = 'To Pay'
";
$to_pay_result = mysqli_query($connection, $to_pay_query);

// Check for query errors
if (!$to_pay_result) {
    die("Query failed: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Pay Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
        .order-item {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
            margin-bottom: 10px;
        }
        .order-item:last-child {
            border-bottom: none;
        }
        .order-details {
            margin-bottom: 10px;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            background-color: #6f42c1;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-back:hover {
            background-color: #5a34a8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">To Pay Orders</div>

        <?php if (mysqli_num_rows($to_pay_result) > 0) { ?>
            <?php while ($order = mysqli_fetch_assoc($to_pay_result)) { ?>
                <div class="order-item">
                    <div class="order-details">
                        <p><strong>Order ID:</strong> <?php echo $order['order_id']; ?></p>
                        <p><strong>User ID:</strong> <?php echo $order['user_id']; ?></p>
                        <p><strong>Full Name:</strong> <?php echo $order['fullname']; ?></p>
                        <p><strong>Phone:</strong> <?php echo $order['phone']; ?></p>
                        <p><strong>Address:</strong> <?php echo $order['address']; ?></p>
                        <p><strong>Payment Method:</strong> <?php echo $order['payment_method']; ?></p>
                        <p><strong>Total Price:</strong> ₱<?php echo number_format($order['total_price'], 2); ?></p>
                        <p><strong>Status:</strong> <?php echo $order['status']; ?></p>
                        <p><strong>Order Date:</strong> <?php echo $order['order_date']; ?></p>
                    </div>
                    <form method="POST" action="pay_cod.php">
                        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                        <button type="submit" class="btn btn-primary">Mark as Paid</button>
                    </form>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="text-center">
                <p>No orders available for payment via Cash on Delivery.</p>
            </div>
        <?php } ?>

        <a href="trackorder.php" class="btn-back">Back to Track Order</a>
    </div>
</body>
</html>
