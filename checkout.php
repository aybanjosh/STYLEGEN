<?php
session_start();
include 'db.php'; // Include your database connection file

// Ensure the database connection is established
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get user ID (fallback to 1 for testing if not set)
$user_id = $_SESSION['user_id'] ?? 1;

// Fetch cart items for the logged-in user
$query = "SELECT * FROM cart WHERE user_id = '$user_id'";
$result = mysqli_query($connection, $query);

// Check for query errors
if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

// Check if the cart is empty
$is_cart_empty = mysqli_num_rows($result) === 0;

// Initialize total price
$total_price = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
     <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            padding: 140px;
        }
        .checkout-header {
            text-align: center;
            font-size: 2rem;
            color: #333;
            margin-bottom: 10px;
        }
        .address-info,
        .products-ordered {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }
        .product-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .product-item:last-child {
            border-bottom: none;
        }
        .order-total {
            font-size: 1.2rem;
            color: #d9534f;
            font-weight: bold;
            text-align: right;
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
    <div class="checkout-header">
        Checkout
    </div>

    <?php if ($is_cart_empty) { ?>
        <div class="text-center mt-4">
            <h5>Your cart is empty</h5>
            <a href="firstpage.php" class="btn btn-secondary mt-3">Go Shopping</a>
        </div>
    <?php } else { ?>
        <form method="POST" action="processcheckout.php" id="checkoutForm">
            <!-- Products Ordered -->
            <div class="products-ordered mt-4">
                <h5>Products Ordered</h5>
                <?php while ($row = mysqli_fetch_assoc($result)) { 
                    $subtotal = $row['price'] * $row['quantity'];
                    $total_price += $subtotal;
                ?>
                    <div class="product-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong><?php echo $row['product_name']; ?></strong><br>
                            <span class="product-variation">Variation: <?php echo $row['color']; ?>, <?php echo $row['size']; ?></span>
                        </div>
                        <div>
                            ₱<?php echo number_format($subtotal, 2); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Delivery Address -->
            <div class="address-info mt-4">
                <h5>Delivery Address</h5>
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
        <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter your full name" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter your delivery address" required></textarea>
                </div>
            </div>

            <!-- Payment Method -->
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select id="payment_method" name="payment_method" class="form-select" required>
                    <option value="" disabled selected>Select Payment Method</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="GCash">GCash</option>
                </select>
            </div>

            <!-- Order Total -->
            <div class="order-total mt-4" style="color: #28a745;">
                Order Total: ₱<?php echo number_format($total_price, 2); ?>
                <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
            </div>

            <!-- Confirm Button and Back to Cart Button -->
            <div class="text-end mt-4">
                <a href="cart.php" class="btn" style="background-color: #F8D0C8;">Back to Cart</a>
                <button type="button" class="btn" style="background-color: #F8D0C8;" id="confirmPurchaseBtn">Confirm Purchase</button>
                </div>
        </form>
    <?php } ?>
</div>

    <script>
        // Handle the Confirm Purchase button click
        document.getElementById('confirmPurchaseBtn').addEventListener('click', function () {
            const paymentMethod = document.getElementById('payment_method').value;

            if (!paymentMethod) {
                alert('Please select a payment method.');
                return;
            }

            if (paymentMethod === 'GCash') {
                // Redirect to GCash payment page
                const totalPrice = <?php echo $total_price; ?>;
                window.location.href = `gcash_payment.php?total_price=${totalPrice}`;
            } else {
                // Submit the form for Cash on Delivery
                document.getElementById('checkoutForm').submit();
            }
        });
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


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
