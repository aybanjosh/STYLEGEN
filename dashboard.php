<?php
session_start();
include('db.php');

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] !== true) {
    header('Location: login.php');
    exit();
}

// Fetch order statuses for admin view
$order_status_query = "SELECT order_status, COUNT(*) AS count FROM orders GROUP BY order_status";
$order_status_result = mysqli_query($connection, $order_status_query);
$order_statuses = [];
while ($status = mysqli_fetch_assoc($order_status_result)) {
    $order_statuses[] = $status;
}

// Fetch pending orders (TO PAY status) for admin approval
$pending_to_pay_query = "SELECT * FROM orders WHERE order_status = 'TO PAY'";
$pending_to_pay_result = mysqli_query($connection, $pending_to_pay_query);

// Fetch pending orders (TO SHIP status) for admin approval
$pending_to_ship_query = "SELECT * FROM orders WHERE order_status = 'TO SHIP'";
$pending_to_ship_result = mysqli_query($connection, $pending_to_ship_query);

// Handle order approval action for "TO PAY"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_to_pay'])) {
    $order_id = $_POST['order_id'];
    $query = "UPDATE orders SET order_status = 'TO SHIP' WHERE order_id = '$order_id'";
    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Order has been moved to TO SHIP.'); window.location.href = 'dashboard.php';</script>";
    } else {
        echo "<script>alert('Error updating order status.');</script>";
    }
}

// Handle order approval action for "TO SHIP"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_to_ship'])) {
    $order_id = $_POST['order_id'];
    $query = "UPDATE orders SET order_status = 'TO RECEIVE' WHERE order_id = '$order_id'";
    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Order has been moved to TO RECEIVE.'); window.location.href = 'dashboard.php';</script>";
    } else {
        echo "<script>alert('Error updating order status.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #B0C6B5; /* New color */
            color: white;
            padding-top: 30px;
        }
        .sidebar a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #F8D0C8;
        }
        .sidebar .active {
            background-color: #F8D0C8;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .logout-btn {
            background-color: #F8D0C8; /* New color */
            color: black;
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .logout-btn:hover {
            background-color: #f5b8bc;
        }
        .card {
            margin-bottom: 15px;
        }
        .order-status {
            font-weight: bold;
        }
        .btn-status {
            margin: 5px;
        }
        /* Adjust layout for total counts */
        .dashboard-card {
            margin: 15px 0;
        }
        .card-body {
            padding: 15px;
        }
        /* Responsive Design for Mobile */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
            }
            .logout-btn {
                position: relative;
                margin-top: 15px;
                margin-bottom: 15px;
            }
            .sidebar a {
                text-align: center;
                font-size: 16px;
            }
        }
        @media (max-width: 576px) {
            .sidebar a {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="text-center text-white">Admin Panel</h2>
        <a href="dashboard.php" class="active">Dashboard</a>
        <a href="manageusers.php">Manage Users</a>
        <a href="manageproducts.php">Manage Products</a>
        <a href="vieworders.php">Recent Orders</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <a href="logout.php" class="btn btn-danger logout-btn">Logout</a>
        <h1 class="text-center">Admin Dashboard</h1>

        <!-- Dashboard Summary -->
        <div class="row">
            <div class="col-sm-6 col-md-3 dashboard-card">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">
                            <?php 
                                $user_count_query = "SELECT COUNT(*) AS user_count FROM tbl_sg";
                                $user_count_result = mysqli_query($connection, $user_count_query);
                                $user_count = mysqli_fetch_assoc($user_count_result)['user_count'];
                                echo $user_count;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 dashboard-card">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                        <p class="card-text">
                            <?php 
                                $product_count_query = "SELECT COUNT(*) AS product_count FROM products";
                                $product_count_result = mysqli_query($connection, $product_count_query);
                                $product_count = mysqli_fetch_assoc($product_count_result)['product_count'];
                                echo $product_count;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 dashboard-card">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text">
                            <?php 
                                $order_count_query = "SELECT COUNT(*) AS order_count FROM orders";
                                $order_count_result = mysqli_query($connection, $order_count_query);
                                $order_count = mysqli_fetch_assoc($order_count_result)['order_count'];
                                echo $order_count;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 dashboard-card">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Pending Orders</h5>
                        <p class="card-text">
                            <?php 
                                $pending_order_count_query = "SELECT COUNT(*) AS pending_count FROM orders WHERE order_status IN ('TO PAY', 'TO SHIP')";
                                $pending_order_count_result = mysqli_query($connection, $pending_order_count_query);
                                $pending_order_count = mysqli_fetch_assoc($pending_order_count_result)['pending_count'];
                                echo $pending_order_count;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Orders in 'TO PAY' -->
        <div class="card my-4" >
            <div class="card-header" style="background-color: #D6B4FC;">Pending Orders (TO PAY)</div>
            <div class="card-body">
                <?php if (mysqli_num_rows($pending_to_pay_result) > 0) { ?>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User ID</th>
                                <th>Full Name</th>
                                <th>Payment Method</th>
                                <th>Total Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($order = mysqli_fetch_assoc($pending_to_pay_result)) { ?>
                                <tr>
                                    <td><?php echo $order['order_id']; ?></td>
                                    <td><?php echo $order['user_id']; ?></td>
                                    <td><?php echo $order['fullname']; ?></td>
                                    <td><?php echo $order['payment_method']; ?></td>
                                    <td><?php echo $order['total_price']; ?></td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                            <button type="submit" name="approve_to_pay" class="btn btn-success btn-status">Approve to Ship</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p>No pending orders to approve.</p>
                <?php } ?>
            </div>
        </div>

        <!-- Pending Orders in 'TO SHIP' -->
        <div class="card my-4">
            <div class="card-header" style="background-color: #D6B4FC;">Pending Orders (TO SHIP)</div>
            <div class="card-body">
                <?php if (mysqli_num_rows($pending_to_ship_result) > 0) { ?>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User ID</th>
                                <th>Full Name</th>
                                <th>Payment Method</th>
                                <th>Total Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($order = mysqli_fetch_assoc($pending_to_ship_result)) { ?>
                                <tr>
                                    <td><?php echo $order['order_id']; ?></td>
                                    <td><?php echo $order['user_id']; ?></td>
                                    <td><?php echo $order['fullname']; ?></td>
                                    <td><?php echo $order['payment_method']; ?></td>
                                    <td><?php echo $order['total_price']; ?></td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                            <button type="submit" name="approve_to_ship" class="btn btn-primary btn-status">Approve to Receive</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p>No pending orders to approve for shipping.</p>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
