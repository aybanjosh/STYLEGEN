<?php
include 'db.php';
session_start();

$user_id = $_SESSION['user_id'] ?? 1;

// Fetch cart items for the logged-in user
$query = "SELECT * FROM cart WHERE user_id = '$user_id'";
$result = mysqli_query($connection, $query);

// Check if the cart is empty
$is_cart_empty = mysqli_num_rows($result) === 0;

// Calculate total
$total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin-top: 140px;
        }
        .cart-container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .cart-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .cart-header h2 {
            font-size: 2rem;
            font-weight: bold;
        }
        .cart-table img {
            width: 80px;
            height: 80px;
            border-radius: 5px;
        }
        .cart-table th, .cart-table td {
            vertical-align: middle;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .quantity-controls input {
            width: 50px;
            text-align: center;
        }
        .order-summary {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .order-summary h5 {
            font-weight: bold;
            margin-bottom: 15px;
        }
        .order-summary .total-amount {
            font-size: 1.5rem;
            font-weight: bold;
            color: #28a745;
        }
        .btn-checkout {
            background-color: #F8D0C8;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            text-decoration: none;
        }
        .btn-checkout:hover {
            background-color: #e5b1b0;
            text-decoration: none;
        }
        .remove-btn {
            background-color: #B0C6B5;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .remove-btn:hover {
            background-color: #9fb7a4;
        }
        .continue-shopping {
            display: flex;
            align-items: center;
            font-size: 1rem;
            color: #000;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .continue-shopping i {
            margin-right: 5px;
        }
        .continue-shopping:hover {
            color: #555;
            text-decoration: none;
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
<div class="container cart-container">
    
    <?php if ($is_cart_empty) { ?>
        <div class="empty-cart text-center">
            <img src="emptycart.png" alt="Empty Cart" class="mb-4" style="width: 150px;">
            <h3>Your Cart is Empty</h3>
            <a href="firstpage.php" class="btn mt-3" style="background-color: #F8D0C8;">Go Shopping Now</a>
        </div>
    <?php } else { ?>
        <div class="cart-header">
            <h2>Your Shopping Cart</h2>
        </div>

        <div class="row">
            <div class="col-md-8">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th></th> <!-- Checkbox Column -->
                            <th>Product</th>
                            <th>Details</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { 
                            $subtotal = $row['price'] * $row['quantity'];
                            ?>
                        <tr>
                            <td>
                                <!-- Checkbox with Total Value -->
                                <input type="checkbox" name="selected_items[]" value="<?php echo $subtotal; ?>" class="form-check-input cart-checkbox" onclick="updateOrderSummary();">
                            </td>
                            <td><img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['product_name']; ?>"></td>
                            <td>
                                <strong><?php echo $row['product_name']; ?></strong><br>
                                <span>Color: <?php echo $row['color']; ?> | Size: <?php echo $row['size']; ?></span>
                            </td>
                            <td>
                                <form method="POST" action="updatequantity.php" class="quantity-controls">
                                    <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
                                    <button type="submit" name="action" value="decrease" class="btn btn-outline-secondary">-</button>
                                    <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" readonly>
                                    <button type="submit" name="action" value="increase" class="btn btn-outline-secondary">+</button>
                                </form>
                            </td>
                            <td class="item-total">₱<?php echo number_format($subtotal, 2); ?></td>
                            <td>
                                <form method="POST" action="remove_item.php" onsubmit="return confirmRemove();">
                                    <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
                                    <button type="submit" name="action" value="remove" class="remove-btn"> Remove</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
    <div class="order-summary">
        <h5>Order Summary</h5>
        <p>Subtotal: <strong id="subtotal">₱0.00</strong></p>
        <p class="total-amount">Total: <strong id="total">₱0.00</strong></p>

        <!-- Checkout Form -->
        <form method="POST" action="checkout.php" id="checkoutForm">
            <input type="hidden" name="selected_cart_ids" id="selected_cart_ids">
            <button type="button" class="btn-checkout" onclick="submitCheckedItems()">Checkout Now</button>
        </form>
    </div>
</div>
</div>
        </div>
    <?php } ?>
</div>

<script>
    function submitCheckedItems() {
        const selectedCheckboxes = document.querySelectorAll('.cart-checkbox:checked');
        const selectedIds = Array.from(selectedCheckboxes).map(checkbox => checkbox.dataset.cartId);

        if (selectedIds.length === 0) {
            alert("Please select at least one item to proceed to checkout.");
            return;
        }

        document.getElementById('selected_cart_ids').value = JSON.stringify(selectedIds);
        document.getElementById('checkoutForm').submit();
    }
</script>

<script>
    function updateOrderSummary() {
        let checkboxes = document.querySelectorAll('.cart-checkbox');
        let subtotal = 0;

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                subtotal += parseFloat(checkbox.value);
            }
        });

        // Update Order Summary
        document.getElementById('subtotal').innerText = '₱' + subtotal.toFixed(2);
        document.getElementById('total').innerText = '₱' + subtotal.toFixed(2);
    }

    function confirmRemove() {
        return confirm("Are you sure you want to remove this product?");
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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
