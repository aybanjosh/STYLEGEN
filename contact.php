<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db.php';

$messageSent = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['fname']); 
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['pnumber']);  
    $message = trim($_POST['Message']);  

    if (empty($name) || empty($email) || empty($phone_number) || empty($message)) {
        $messageSent = "Please fill in all required fields.";  
    } else {
        $stmt = $connection->prepare("INSERT INTO tbl_contact (name, email, phone_number, message) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            $messageSent = "Error preparing statement: " . $connection->error;
        } else {
            $stmt->bind_param("ssss", $name, $email, $phone_number, $message);

            if ($stmt->execute()) {
                $messageSent = "Thanks for contacting us. We'll get back to you as soon as possible.";  
            } else {
                $messageSent = "Error executing query: " . $stmt->error;  
            }
            $stmt->close();
        }
        $connection->close();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <title>Contact Us - StyleGen Online Shop</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJt3W6F1z6lEcxv6FqBFjDaOq7lPz0DCbsTwLMt2cTKQs5fZfvJl5TXzjlZZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB1R7jyyQEx06nEu1nQx6p5W3r4cvr6DczjFuZ4cym93yXpV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0O5l/xoO3gUbgzT+2tWfrhEdhCH1niJ13HVs1cz9W9fReT1P" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
            </ul>
        </div>
    </div>
</nav>


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

<section id="plans" class="container-fluid d-flex justify-content-center align-items-center py-5" style="font-family: 'Poppins', sans-serif; background-color: #f5f3ef;">

<div class="row w-100 align-items-center">
        <!-- Image Section -->
        <div class="col-md-6">
            <img src="model.png" alt="Fashion Models" class="img-fluid rounded">
        </div>
    <div class="col-md-6 col-sm-8">
        <div class="border p-4 rounded-3 login-form-container">
            <h4 class="text-center mb-3"><b>CONTACT US</b></h4>
            <p class="text-center mb-3">We'd love to hear from you! You can reach us by filling out the form below. Our customer service team is available from 7:00 AM to 4:00 PM (Mondays to Sundays). We are here to help.</p>

            <?php if ($messageSent): ?>
                <div class="alert alert-info text-center"><?php echo $messageSent; ?></div>
            <?php endif; ?>

            <form action="contact.php" method="POST">
                <div class="mb-1">
                    <label for="fname" class="form-label"></label>
                    <input type="text" class="form-control shadow-sm" id="fname" name="fname" placeholder="Name" required>
                </div>

                <div class="mb-1">
                    <label for="email" class="form-label"></label>
                    <input type="email" class="form-control shadow-sm" id="email" name="email" placeholder="Email" required>
                </div>

                <div class="mb-1">
                    <label for="pnumber" class="form-label"></label>
                    <input type="text" class="form-control shadow-sm" id="pnumber" name="pnumber" placeholder="Phone Number" required>
                </div>

                <div class="mb-3">
                    <label for="Message" class="form-label"></label>
                    <textarea class="form-control shadow-sm" id="Message" name="Message" placeholder="Write your message" required></textarea>
                </div>

                <button type="submit" class="btn btn-secondary w-100">Submit</button>
            </form>
        </div>
    </div>
</section>

<style>
    /* Adjust top margin based on the height of the navbar and banner */
    #plans {
        margin-top: 100px; /* Adjust this value if navbar and banner height changes */
    }

    .contact-form-container {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .contact-form-container input,
    .contact-form-container textarea {
        border: 1px solid #ddd;
    }

    .contact-form-container button:hover {
        background-color: #333;
        color: #fff;
    }
</style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ldHT3Yhwv93pFqcWd0KniPWE0bNY8sma/9kdCdrSWZoZs82Jc5E7PEz4p6kBSqtr" crossorigin="anonymous"></script>


      
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