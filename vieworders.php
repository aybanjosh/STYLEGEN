<?php
session_start();
include('db.php');

// Check if user is admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: login.php');
    exit();
}

// Fetch orders from the database
$query = "SELECT * FROM orders ORDER BY order_date DESC"; // Ensure 'order_date' and 'order_status' exist
$result = mysqli_query($connection, $query);

// Check for query errors
if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

// Function to map order statuses to readable labels
function formatOrderStatus($status) {
    switch ($status) {
        case 'TO PAY':
            return '<span class="badge badge-warning">Pending Payment</span>';
        case 'TO SHIP':
            return '<span class="badge badge-info">To Ship</span>';
        case 'TO RECEIVE':
            return '<span class="badge badge-primary">To Receive</span>';
        case 'COMPLETED':
            return '<span class="badge badge-success">Completed</span>';
        default:
            return '<span class="badge badge-secondary">Unknown</span>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <title>View Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .status-complete {
            background-color: #d4edda; /* Light green for completed */
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <h1 class="text-center">View Orders</h1>

        <a href="dashboard.php" class="btn mb-3" style="background-color: #F8D0C8;">Back to Dashboard</a>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = mysqli_fetch_assoc($result)) { ?>
                    <tr class="<?php echo $order['order_status'] == 'COMPLETED' ? 'status-complete' : ''; ?>">
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['user_id']; ?></td>
                        <td><?php echo date("F j, Y, g:i a", strtotime($order['order_date'])); ?></td>
                        <td><?php echo formatOrderStatus($order['order_status']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
