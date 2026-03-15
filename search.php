<?php
$host = 'localhost'; // Your database host
$username = 'root'; // Your database username
$password = ''; // Your database password
$database = 'Database'; // Your database name

// Create a connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <title>Search Results - StyleGen</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            padding-top: 80px;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeIn 0.5s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }
        .card-title {
            font-size: 1rem;
            font-weight: bold;
            color: #333;
        }
        .card-text {
            font-size: 0.9rem;
            color: #666;
        }
        .badge {
            font-size: 0.8rem;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 4px;
            text-transform: uppercase;
            color: white;
        }
        .badge.best-seller, .badge.new { background-color: #F8D0C8; }
        .badge.trends { background-color: #D6B4FC; }
        .badge.sale { background-color: #80C4E9; }
        .badge.hot { background-color: #FF0000; }
        .navbar-toggler-icon {
            width: 30px;
            height: 30px;
            border: 2px solid #333;
            border-radius: 5px;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }
        .navbar-toggler-icon:before,
        .navbar-toggler-icon:after {
            content: '';
            position: absolute;
            background-color: #333;
            width: 70%;
            height: 3px;
            left: 15%;
            transition: all 0.3s ease-in-out;
        }
        .navbar-toggler-icon:before {
            top: 8px;
        }
        .navbar-toggler-icon:after {
            bottom: 8px;
        }
        .navbar-toggler.collapsed .navbar-toggler-icon {
            transform: rotate(360deg);
        }
        .navbar-toggler.collapsed .navbar-toggler-icon:before {
            transform: rotate(45deg);
            top: 0;
        }
        .navbar-toggler.collapsed .navbar-toggler-icon:after {
            transform: rotate(-45deg);
            bottom: 0;
        }
        @media (max-width: 991px) {
            .navbar-collapse {
                text-align: left;
            }
            .navbar-nav {
                margin-left: 0;
            }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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
        </div>
        <form class="d-flex" method="get" action="search.php">
                <input class="form-control me-2" type="text" name="query" placeholder="Search Products" aria-label="Search" required>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
    </div>
</nav>

<div class="container my-5">
    <?php
    if (isset($_GET['query']) && !empty($_GET['query'])) {
        $query = mysqli_real_escape_string($connection, $_GET['query']); // Sanitize user input

        // SQL query to fetch matching products
        $sql = "SELECT * FROM products WHERE product_name LIKE '%$query%' OR description LIKE '%$query%'";
        $result = mysqli_query($connection, $sql);

        echo "<h3 class='mb-4' style='font-family: Poppins, sans-serif;'>Search Results for '" . htmlspecialchars($query) . "':</h3>";

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='row row-cols-1 row-cols-md-4 g-4'>"; // 4 columns layout

            while ($row = mysqli_fetch_assoc($result)) {
                $tag = $row['tag'] ?? '';
                $category = strtolower($row['category'] ?? ''); // Assuming there's a 'category' column to identify gentlemen or ladies
                $price = $row['price'] ?? '₱???';
                $image_url = htmlspecialchars($row['image_url']);
                $product_name = htmlspecialchars($row['product_name']);
                $description = htmlspecialchars($row['description']);

                // Determine the tag background color
                $tag_color = '';
                if (strtolower($tag) === 'arriving soon') {
                    $tag_color = ($category === 'gentlemen') ? '#80C4E9' : (($category === 'ladies') ? '#F8D0C8' : '');
                } elseif (strtolower($tag) === 'new') {
                    $tag_color = '#D6B4FC'; // New tag color
                } elseif (strtolower($tag) === 'best seller') {
                    $tag_color = '#FF0000'; // Best Seller tag color
                }

                echo "<div class='col'>";
                echo "<div class='card h-100 shadow-sm'>";

                // Display the product image
                echo "<img src='$image_url' class='card-img-top' alt='$product_name'>";

                // Display the card body
                echo "<div class='card-body'>";
                if (!empty($tag)) {
                    echo "<span class='badge' style='background-color: $tag_color; color: white;'>" . htmlspecialchars($tag) . "</span>";
                }

                // Display product name and description
                echo "<h5 class='card-title' style='font-family: Poppins, sans-serif;'>$product_name</h5>";
                echo "<p class='card-text' style='font-family: Poppins, sans-serif;'>$description</p>";

              

                echo "</div>"; // End card body
                echo "</div>"; // End card
                echo "</div>"; // End col
            }

            echo "</div>"; // End row
        } else {
            echo "<p>No products found.</p>";
        }
    }
    ?>
</div>


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

    footer {
    border-top: 4px solid #F8D0C8 !important;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
