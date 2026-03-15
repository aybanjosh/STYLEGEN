<?php
session_start();
include('db.php'); // Include your database connection file

// Ensure the database connection is established
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'] ?? 1; // Default to 1 if no user ID in session

// Queries for different statuses
$to_pay_query = "SELECT * FROM orders WHERE user_id = '$user_id' AND payment_method = 'Cash on Delivery' AND order_status = 'To Pay'";
$to_ship_query = "SELECT * FROM orders WHERE user_id = '$user_id' AND order_status IN ('To Ship', 'Pending Approval')";
$to_receive_query = "SELECT * FROM orders WHERE user_id = '$user_id' AND order_status = 'To Receive'";
$to_rate_query = "SELECT * FROM orders WHERE user_id = '$user_id' AND order_status = 'To Rate'";

// Count queries for each status
$to_pay_count_query = "SELECT COUNT(*) AS count FROM orders WHERE user_id = '$user_id' AND payment_method = 'Cash on Delivery' AND order_status = 'To Pay'";
$to_ship_count_query = "SELECT COUNT(*) AS count FROM orders WHERE user_id = '$user_id' AND order_status IN ('To Ship', 'Pending Approval')";
$to_receive_count_query = "SELECT COUNT(*) AS count FROM orders WHERE user_id = '$user_id' AND order_status = 'To Receive'";
$to_rate_count_query = "SELECT COUNT(*) AS count FROM orders WHERE user_id = '$user_id' AND order_status = 'To Rate'";

// Execute queries
$to_pay_result = mysqli_query($connection, $to_pay_query);
$to_ship_result = mysqli_query($connection, $to_ship_query);
$to_receive_result = mysqli_query($connection, $to_receive_query);
$to_rate_result = mysqli_query($connection, $to_rate_query);

// Execute count queries
$to_pay_count = mysqli_fetch_assoc(mysqli_query($connection, $to_pay_count_query))['count'];
$to_ship_count = mysqli_fetch_assoc(mysqli_query($connection, $to_ship_count_query))['count'];
$to_receive_count = mysqli_fetch_assoc(mysqli_query($connection, $to_receive_count_query))['count'];
$to_rate_count = mysqli_fetch_assoc(mysqli_query($connection, $to_rate_count_query))['count'];

// Handle "Order Received" action for users
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_received'])) {
    $order_id = $_POST['order_id'];
    $update_query = "UPDATE orders SET order_status = 'To Rate' WHERE order_id = '$order_id' AND user_id = '$user_id'";
    if (mysqli_query($connection, $update_query)) {
        echo "<script>alert('Order marked as received. Now, you can rate your order.'); window.location.href = 'trackorder.php';</script>";
    } else {
        echo "<script>alert('Error updating order status.');</script>";
    }
}

// Handle "Order Complete" action for users
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_complete'])) {
    $order_id = $_POST['order_id'];
    $update_query = "UPDATE orders SET order_status = 'Completed' WHERE order_id = '$order_id' AND user_id = '$user_id'";
    if (mysqli_query($connection, $update_query)) {
        echo "<script>alert('Order has been marked as completed!'); window.location.href = 'trackorder.php';</script>";
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
    <title>Track Order</title>
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
            padding-top: 120px;
        }
        .container {
            text-align: center;
        }
        .back-button {
            text-align: left;
            margin-bottom: 20px;
        }
        .back-button a {
            text-decoration: none;
            color: #333;
            font-size: 1rem;
            display: flex;
            align-items: center;
        }
        .back-button i {
            margin-right: 5px;
        }
        .header {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
        .order-categories {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 20px auto;
            max-width: 600px;
        }
        .category-item {
            text-align: center;
            flex: 1;
            margin: 15px;
            cursor: pointer;
            position: relative;
        }
        .category-item i {
            font-size: 2.5rem;
            color: #555;
        }
        .category-item span {
            display: block;
            margin-top: 10px;
            font-size: 1.1rem;
            color: #333;
            font-weight: 500;
        }
        .category-count {
            position: absolute;
            top: -5px;
            right: 15px;
            background-color: #F8D0C8;
            color: #333;
            font-size: 0.9rem;
            font-weight: bold;
            padding: 2px 8px;
            border-radius: 50%;
        }
        .category-item:hover i {
            color: #B0C6B5;
        }
        .category-item:hover span {
            color: #B0C6B5;
        }
        .order-list {
            margin: 20px auto;
            max-width: 600px;
        }
        .order-list .order-item {
            background: #fff;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .order-status {
            color: red;
            font-weight: bold;
        }
        .nav-link:hover {
    color: #F8D0C8 !important; /
    text-decoration: none; 
}

.nav-item .fa-solid:hover,
.nav-item .bi-person-fill:hover {
    color: #F8D0C8 !important; 
}

.navbar-brand:hover {
    color: #F8D0C8 !important; 
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='gray' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}
.nav-link .badge {
    font-size: 0.8rem; /* Adjust badge text size */
    padding: 5px 8px; /* Adjust badge size */
    transform: translate(-50%, -50%); /* Fine-tune badge positioning */
    background-color: #ff3d3d; /* Customize badge color */
    color: white; /* Badge text color */
}
        /* Add hover effect for navbar links */
        .nav-link:hover {
        color: #F8D0C8 !important; /* Change text color on hover */
        text-decoration: none; /* Ensure no underline on hover */
        }

        .nav-item .fa-solid:hover,
        .nav-item .bi-person-fill:hover {
        color: #F8D0C8 !important; /* Change icon color on hover */
        }
        .navbar-brand:hover {
         color: #F8D0C8 !important; /* Change logo text color on hover (if applicable) */
        }
        .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='gray' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Track Your Orders</div>

        <!-- Order Categories -->
        <div class="order-categories">
            <div class="category-item" onclick="toggleCategory('toPay')">
                <i class="fa-solid fa-wallet"></i>
                <span>To Pay</span>
                <div class="category-count"><?php echo $to_pay_count; ?></div>
            </div>
            <div class="category-item" onclick="toggleCategory('toShip')">
                <i class="fa-solid fa-box"></i>
                <span>To Ship</span>
                <div class="category-count"><?php echo $to_ship_count; ?></div>
            </div>
            <div class="category-item" onclick="toggleCategory('toReceive')">
                <i class="fa-solid fa-truck"></i>
                <span>To Receive</span>
                <div class="category-count"><?php echo $to_receive_count; ?></div>
            </div>
            <div class="category-item" onclick="toggleCategory('toRate')">
                <i class="fa-solid fa-circle-check"></i>
                <span>To Complete</span>
                <div class="category-count"><?php echo $to_rate_count; ?></div>
            </div>
        </div>

        <!-- Order Lists -->
        <div id="toPay" class="order-list d-none">
            <h5>To Pay</h5>
            <?php while ($order = mysqli_fetch_assoc($to_pay_result)) { ?>
                <div class="order-item">
                    <p>Order ID: <?php echo $order['order_id']; ?></p>
                    <p>Total: ₱<?php echo number_format($order['total_price'], 2); ?></p>
                    <p class="order-status">Waiting for the Admin Approval</p>
                </div>
            <?php } ?>
        </div>

        <div id="toShip" class="order-list d-none">
            <h5>To Ship</h5>
            <?php while ($order = mysqli_fetch_assoc($to_ship_result)) { ?>
                <div class="order-item">
                    <p>Order ID: <?php echo $order['order_id']; ?></p>
                    <p>Total: ₱<?php echo number_format($order['total_price'], 2); ?></p>
                    <p class="order-status">Pending Approval</p>
                </div>
            <?php } ?>
        </div>

        <div id="toReceive" class="order-list d-none">
        <h5>To Receive</h5>
            <?php while ($order = mysqli_fetch_assoc($to_receive_result)) { ?>
                <div class="order-item">
                    <p>Order ID: <?php echo $order['order_id']; ?></p>
                    <p>Total: ₱<?php echo number_format($order['total_price'], 2); ?></p>
                    <form method="POST" action="trackorder.php">
                        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                        <button type="submit" name="order_received" class="btn" style="background-color: #F8D0C8;">Order Received</button>
                    </form>
                </div>
            <?php } ?>
        </div>

        <div id="toRate" class="order-list d-none">
        <h5>To Complete</h5>
            <?php while ($order = mysqli_fetch_assoc($to_rate_result)) { ?>
                <div class="order-item">
                    <p>Order ID: <?php echo $order['order_id']; ?></p>
                    <p>Total: ₱<?php echo number_format($order['total_price'], 2); ?></p>
                    <form method="POST" action="trackorder.php">
                        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                        <button type="submit" name="order_complete" class="btn" style="background-color: #F8D0C8;">Order Complete</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        function toggleCategory(category) {
            // Hide all categories
            const categories = ['toPay', 'toShip', 'toReceive', 'toRate'];
            categories.forEach(cat => {
                const element = document.getElementById(cat);
                if (element) {
                    element.classList.add('d-none'); // Add 'd-none' class to hide
                }
            });

            // Show the selected category
            const selectedCategory = document.getElementById(category);
            if (selectedCategory) {
                selectedCategory.classList.remove('d-none'); // Remove 'd-none' to show
            }
        }
    </script>

<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #B0C6B5; font-family: 'Poppins', sans-serif; font-weight: bold; font-size: 0.9rem;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="sglogo.png" alt="StyleGen Logo" style="max-width: 120px; padding-left:20px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto ms-3">
                <li class="nav-item">
                    <a class="nav-link active" href="firstpage.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gentlemen1.php">GENTLEMEN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ladies1.php">LADIES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact1.php">CONTACT US</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>
