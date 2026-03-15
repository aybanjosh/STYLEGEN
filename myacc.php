<?php
session_start();
include('db.php'); // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
} else {
    // User details stored in session
    $email = $_SESSION['email'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

    // Query to fetch user_id and other user details based on email
    $query = "SELECT user_id FROM tbl_sg WHERE email = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Store user_id in the session
        $_SESSION['user_id'] = $user['user_id'];
        $user_id = $user['user_id'];

        // Fetch phone number and address from the latest order in `orders`
        $order_query = "SELECT phone, address FROM orders WHERE user_id = ? ORDER BY order_date DESC LIMIT 1";
        $order_stmt = $connection->prepare($order_query);
        $order_stmt->bind_param("i", $user_id);
        $order_stmt->execute();
        $order_result = $order_stmt->get_result();
        $order_data = $order_result->fetch_assoc();
        $phone = $order_data['phone'] ?? 'N/A';
        $address = $order_data['address'] ?? 'N/A';
    } else {
        // Handle case where user details are not found in the database
        $_SESSION['error_message'] = "User not found.";
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <title>My Account</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJt3W6F1z6lEcxv6FqBFjDaOq7lPz0DCbsTwLMt2cTKQs5fZfvJl5TXzjlZZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB1R7jyyQEx06nEu1nQx6p5W3r4cvr6DczjFuZ4cym93yXpV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0O5l/xoO3gUbgzT+2tWfrhEdhCH1niJ13HVs1cz9W9fReT1P" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    

    
    <style>
       body {
            font-family: 'Poppins', sans-serif;
            padding-top: 100px;
        }
        

        .btn-transparent {
            font-weight: bold;
            font-size: 1rem;
            color: black;
            border: none;
            background: transparent;
            margin: 0 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
        }

        .btn-transparent:hover {
            color: #F8D0C8; /* Hover color */
            text-decoration: none;
            outline: none;
        }

        .btn-transparent:focus {
            outline: none;
            box-shadow: none;
            text-decoration: none;
        }

        .nav-link:hover {
            color: #F8D0C8 !important;
            text-decoration: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='gray' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>

<style>
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

.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-title {
    font-family: 'Poppins', sans-serif;
    font-size: 1.5rem;
    font-weight: bold;
}

.card-body {
        padding-bottom: 25px; /* Adds padding inside the card if needed */
    }
.card-body p {
    font-size: 1rem;
    font-weight: 400;
    color: #555;
}

.btn-primary {
    background-color: #B0C6B5;
    border: none;
    padding: 10px 20px;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.btn-primary:hover {
    background-color: #F8D0C8;
}

.btn {
        background-color: #B0C6B5; /* Default button color */
        color: white;
        border: none;
        font-weight: bold;
    }

    .btn:hover {
        background-color: #F8D0C8; /* Hover color */
        color: white; /* Keep text white on hover */
    }

    </style>
    
</head>
<body>

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
            <ul class="navbar-nav d-flex align-items-center">
                    <!-- My Account Button -->
                    <li class="nav-item ms-2">
                        <a href="myacc.php" class="btn-transparent">
                            <i class="fa-solid fa-circle-user" style="font-size: 1.5rem;"></i>
                            MY ACCOUNT
                        </a>
                    </li>
                    <!-- Logout Button -->
                    <li class="nav-item ms-2">
                        <form action="logout.php" method="POST" style="margin: 0;">
                            <button type="submit" class="btn-transparent">
                                <i class="fa-solid fa-arrow-right-from-bracket" style="font-size: 1.5rem;"></i>
                                LOG OUT
                            </button>
                        </form>
                    </li>
                </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h1>Welcome, <?php echo $fname . ' ' . $lname; ?>!</h1>
</div>

<div class="container mt-5 mb-5">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="card-title text-uppercase mb-4" style="font-size: 1.5rem;">Account Details</h2>
                <!-- Button Group for Logout and Track Orders -->
                <div>
                    <form action="logout.php" method="POST" class="d-inline">
                        <button class="btn btn-secondary" type="submit" style="padding: 10px 20px; font-size: 1rem;">Log Out</button>
                    </form>
                    <a href="trackorder.php" class="btn btn-primary ml-2" style="padding: 10px 20px; font-size: 1rem;">Track Orders</a>
                </div>
            </div>
            <div class="row">
                <!-- Account Details Section -->
                <div class="col-md-6">
                    <h4 style="font-size: 1.2rem; font-weight: 600;">Name:</h4>
                    <p style="font-size: 1rem;"><strong><?php echo htmlspecialchars($fname . ' ' . $lname); ?></strong></p>
                    <h4 style="font-size: 1.2rem; font-weight: 600;">Email:</h4>
                    <p style="font-size: 1rem;"><strong><?php echo htmlspecialchars($email); ?></strong></p>
                </div>
                <div class="col-md-6">
                    <h4 style="font-size: 1.2rem; font-weight: 600;">Phone:</h4>
                    <p style="font-size: 1rem;"><strong><?php echo htmlspecialchars($phone); ?></strong></p>
                    <h4 style="font-size: 1.2rem; font-weight: 600;">Address:</h4>
                    <p style="font-size: 1rem;"><strong><?php echo htmlspecialchars($address); ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>





    <style>
    .dropdown-menu {
        background-color: #F8D0C8; 
    }
    .dropdown-item:hover {
        background-color: #B0C6B5
        ; 
        color: white;
    }
    .dropdown-item {
        color: black; 
    }
</style>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
<footer class="bg-light-subtle text-dark py-5" style="font-family: 'Poppins', sans-serif; border-top: 4px solid #7F00FF;">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-4 text-justify">
                <h4 class="text-uppercase">About Us</h4>
                <img src="sglogo.png" alt="StyleGen Logo" class="img-fluid mb-2" style="max-width: 90px;">
                <p>With an easy-to-navigate shopping experience, secure checkout, and fast shipping, StyleGen ensures that style is just a click away.</p>
            </div>
            <!-- Customer Service -->
            <div class="col-md-3 mb-3 offset-md-1">
                <h5 class="text-uppercase fw-bold">Customer Service</h5>
                <ul class="list-unstyled">
                    <li><a href="helpcentre.php" class="text-dark">Help Centre</a></li>
                    <li><a href="FAQs.php" class="text-dark">FAQs</a></li>
                    <li><a href="terms.php" class="text-dark">Terms & Conditions</a></li>
                    <li><a href="shipping.php" class="text-dark">Free Shipping</a></li>
                    <li><a href="return.php" class="text-dark">Return & Refund</a></li>
                    <li><a href="contact.php" class="text-dark">Contact Us</a></li>
                </ul>
            </div>

            <!-- About StyleGen -->
            <div class="col-md-3 mb-4">
                <h5 class="text-uppercase fw-bold">About StyleGen</h5>
                <ul class="list-unstyled">
                    <li><a href="aboutus.php" class="text-dark">About Us</a></li>
                    <li><a href="privacy.php" class="text-dark">Privacy Policy</a></li>
                    <li><a href="careers.php" class="text-dark">StyleGen Careers</a></li>
                    <li><a href="size.php" class="text-dark">Size Chart</a></li>
                    <li><a href="locator.php" class="text-dark">Store Locator</a></li>
                </ul>
            </div>

            <!-- Payment -->
            <div class="col-md-2 mb-4 text-left">
                <h5 class="text-uppercase fw-bold">Payment</h5>
                <div class="d-flex flex-wrap">
                    <img src="payment.png" alt="Payment Methods" class="img-fluid" style="max-width: 150px;">
                </div>
            </div>
        </div>

        <hr>

        <div class="row mt-4">
            <div class="col text-center">
                <p class="mb-0">&copy; Copyright 2024 StyleGen Online Shop | All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

<style>
    footer a.text-dark {
        color: #bbb;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    footer a.text-dark:hover {
        color: #B0C6B5;
        text-decoration: none;
    }

    footer .img-fluid {
        max-height: 50px;
        object-fit: contain;
    }

    footer ul li a.text-dark:hover {
        color: #B0C6B5 !important;
    }

    footer a.text-dark:focus,
    footer a.text-dark:hover {
        color: #B0C6B5 !important;
        text-decoration: none;
    }

    footer .col-md-3 {
        margin-bottom: 20px;
    }

    footer .text-white {
        color: white;
    }

    /* Add violet top border to the footer */
    footer {
    border-top: 4px solid #F8D0C8 !important; /* Adding !important ensures it overrides other styles */
}
</style>


</body>
</html>