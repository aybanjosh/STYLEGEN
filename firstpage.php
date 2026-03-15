<?php
include 'db.php';
session_start();

if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // Initialize cart as an empty array
}

// Assume logged-in user ID
$user_id = $_SESSION['user_id'] ?? 1;

// Fetch cart count dynamically
$cart_query = "SELECT SUM(quantity) AS cart_count FROM cart WHERE user_id = '$user_id'";
$cart_result = mysqli_query($connection, $cart_query);
$cart_count = ($cart_result && $row = mysqli_fetch_assoc($cart_result)) ? $row['cart_count'] : 0;

// Product details (you can fetch this dynamically from the database)
$product_id = 1;
$product_name = "Gentlemen Striped Print Drop Shoulder Tee";
$product_price = 407.00;
$product_orig_price = 479.00;
$product_image = "shirt1.png";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <title>StyleGen Online Shop</title>
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
        .product-card {
            position: relative;
            overflow: hidden;
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .badge-custom {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.75);
            color: #fff;
            padding: 5px;
            font-size: 0.75rem;
            text-transform: uppercase;
        }
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
        .product-details {
            text-align: center;
            padding-top: 15px;
        }
        .product-title {
            font-size: 0.9rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        .price {
            display: inline-flex;
            gap: 10px;
            align-items: baseline;
        }
        .sale-price {
            font-weight: bold;
            color: black;
        }
        .original-price {
            text-decoration: line-through;
            color: gray;
            font-size: 0.85rem;
        }

        .product-card img {
            height: 250px;
            object-fit: cover;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5); 
        }
        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 10px;
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
        /* Animation for sliding in from the right */
@keyframes slideInFromRight {
    0% {
        opacity: 0;
        transform: translateX(100%); /* Start from the right */
    }
    100% {
        opacity: 1;
        transform: translateX(0); /* End at normal position */
    }
}

/* Default state of products */
.product-card {
    opacity: 0; /* Start as invisible */
    transform: translateX(100%); /* Start off-screen to the right */
    animation: slideInFromRight 1s ease-out forwards;
    animation-delay: 0.2s; /* Delay for staggered effect */
}

/* You can modify the animation-delay per card if you want different timings */
.product-card:nth-child(1) {
    animation-delay: 0.3s;
}
.product-card:nth-child(2) {
    animation-delay: 0.5s;
}
.product-card:nth-child(3) {
    animation-delay: 0.7s;
}
.product-card:nth-child(4) {
    animation-delay: 0.9s;
}
.product-card:nth-child(5) {
    animation-delay: 1.1s;
}
/* When product is animated */
.product-card.animate {
    opacity: 1;
    transform: translateX(0);
    transition: opacity 1s ease-out, transform 1s ease-out;
}

    </style>

<style>
        .product-card {
            position: relative;
            overflow: hidden;
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .badge-custom {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.75);
            color: #fff;
            padding: 5px;
            font-size: 0.75rem;
            text-transform: uppercase;
        }
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
        .product-details {
            text-align: center;
            padding-top: 15px;
        }
        .product-title {
            font-size: 0.9rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        .price {
            display: inline-flex;
            gap: 10px;
            align-items: baseline;
        }
        .sale-price {
            font-weight: bold;
            color: black;
        }
        .original-price {
            text-decoration: line-through;
            color: gray;
            font-size: 0.85rem;
        }

        .product-card img {
            height: 250px;
            object-fit: cover;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5); 
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
        .dropdown-menu {
            background-color: #F8D0C8;
        }
        .dropdown-item:hover {
            background-color: #B0C6B5;
            color: white;
        }
        .dropdown-item {
            color: black;
        }
        .category-card {
            display: flex;
            align-items: center;
            justify-content: start;
            background-color: #B0C6B5;
            border-radius: 50px;
            padding: 15px 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .category-card:hover {
            transform: scale(1.05);
        }
        .category-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }
        .category-text {
            font-size: 1.1rem;
            font-weight: bold;
            color: #333;
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
                <li class="nav-item ms-2">
                    <a href="myacc.php" class="btn-transparent">
                        <i class="fa-solid fa-circle-user" style="font-size: 1.5rem;"></i>
                        MY ACCOUNT
                    </a>
                </li>
                <li class="nav-item ms-2">
    <a href="cart.php" class="nav-link position-relative">
        <i class="fa fa-shopping-cart text-dark" style="font-size: 1.5rem;"></i>
        <!-- Cart Count Display -->
        <span class="cart-count">
            <?php
            // Fetch cart count from the database dynamically
            $cart_count_query = "SELECT SUM(quantity) AS cart_count FROM cart WHERE user_id = '$user_id'";
            $cart_count_result = mysqli_query($connection, $cart_count_query);
            $cart_count = ($cart_count_result && $row = mysqli_fetch_assoc($cart_count_result)) ? $row['cart_count'] : 0;
            echo $cart_count;
            ?>
        </span>
    </a>
</li>

                <li class="nav-item ms-4">
                    <form class="d-flex" method="get" action="search.php">
                        <input class="form-control me-1" type="text" name="query" placeholder="Search Products" aria-label="Search" style="font-size: 0.8rem;" required>
                        <button class="btn btn-outline-success" type="submit" style="font-size: 0.75rem;">Search</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .dropdown-menu {
        background-color: #F8D0C8;
    }
    .dropdown-item:hover {
        background-color: #B0C6B5;
        color: white;
    }
    .dropdown-item {
        color: black;
    }
</style>



<div class="container mt-7 pt-5 text-center" style="margin-top: 120px; font-family: Poppins;">
    <h4 class="alert-heading fs-1 fw-bold" style="font-size: 35px;">Welcome to StyleGen Online Shop!</h4>
    <p>Explore our latest collection of fashion for both gentlemen and ladies. <br>
        Find the best deals and styles available. Enjoy shopping with us!
    </p>
</div>

<div id="carouselExample" class="carousel slide mt-5" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="boy.png" class="d-block w-100" alt="slide1">
        </div>
        <div class="carousel-item">
            <img src="girl.png" class="d-block w-100" alt="slide2">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<br><br>

   <div class="container my-5 d-flex justify-content-center align-items-center vh-60" style="font-family: Poppins;">
    <div class="row g-4">
        <!-- Shirts -->
        <div class="col-md-6 col-sm-12">
            <a href="gentlemen1.php" class="text-decoration-none">
                <div class="category-card text-center">
                    <img src="gentlemen.png" alt="Gentlemen" class="category-image mb-3">
                    <span class="category-text">Gentlemen's Outfit</span>
                </div>
            </a>
        </div>
        <!-- Pants -->
        <div class="col-md-6 col-sm-12">
            <a href="ladies1.php" class="text-decoration-none">
                <div class="category-card text-center">
                    <img src="lady.png" alt="Ladies" class="category-image mb-3">
                    <span class="category-text">Ladies Outfit</span>
                </div>
            </a>
        </div>
    </div>
</div>


<div class="container py-5">
    <h2 class="text-center mb-4">BEST SELLERS</h2>
    <div class="row">
    <div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="<?php echo $product_image; ?>" alt="<?php echo $product_name; ?>" class="img-fluid">
        <div class="badge-custom">BEST SELLER</div>
        <div class="product-details">
            <h5 class="product-title"><?php echo $product_name; ?></h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱<?php echo $product_price; ?></span>
                <span class="original-price" style="color: #F8D0C8; text-decoration: line-through;">₱<?php echo $product_orig_price; ?></span>
            </p>
            <!-- Buttons -->
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal6">Add to Cart</button>
                <a href="product.php?id=6" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal -->
<div class="modal fade" id="addToCartModal6" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel">Select Size and Color</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm6">
                    <input type="hidden" name="product_id" value="6">
                    <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
                    <input type="hidden" name="price" value="<?php echo $product_price; ?>">
                    <input type="hidden" name="orig_price" value="<?php echo $product_orig_price; ?>">
                    <input type="hidden" name="image_url" value="<?php echo $product_image; ?>">
                    <div class="mb-3">
                        <label for="colorSelect6" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect6" name="color" required>
                            <option value="Multicolor">Multicolor</option>
                            <option value="Black">Black</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sizeSelect6" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect6" name="size" required>
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                            <option value="XL">Extra Large</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(6)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

    
  <!-- Product 2 -->
<div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="lrandom2.png" alt="Double-Breasted Collar Pressed-Pleated Dress" class="img-fluid">
        <div class="badge-custom">BEST SELLER</div>
        <div class="product-details">
            <h5 class="product-title">Double-Breasted Collar Pressed-Pleated Dress</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱766.00</span>
                <span class="original-price" style="color: #F8D0C8; text-decoration: line-through;">₱959.00</span>
            </p>
            <!-- Buttons -->
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal7">Add to Cart</button>
                <a href="product1.php?id=7" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal -->
<div class="modal fade" id="addToCartModal7" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel7">Select Size and Color</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm7">
                    <input type="hidden" name="product_id" value="7">
                    <input type="hidden" name="product_name" value="Double-Breasted Collar Pressed-Pleated Dress">
                    <input type="hidden" name="price" value="766.00">
                    <input type="hidden" name="orig_price" value="959.00">
                    <input type="hidden" name="image_url" value="lrandom2.png">
                    <div class="mb-3">
                        <label for="colorSelect7" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect7" name="color" required>
                            <option value="Black">Black</option>
                            <option value="Red">Red</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sizeSelect7" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect7" name="size" required>
                            <option value="XS">Extra Small</option>
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(7)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>



 <!-- Product 3 -->
<div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="G2.png" alt="Gentlemen's Casual Waist Washed Denim Pants" class="img-fluid">
        <div class="badge-custom">BEST SELLER</div>
        <div class="product-details">
            <h5 class="product-title">Gentlemen's Casual Waist Washed Denim Pants</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱714.00</span>
                <span class="original-price" style="color: #F8D0C8; text-decoration: line-through;">₱840.00</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal8">Add to Cart</button>
                <a href="product2.php?id=8" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal for Product 3 -->
<div class="modal fade" id="addToCartModal8" tabindex="-1" aria-labelledby="addToCartModalLabel8" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel8">Select Size and Color</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm8">
                    <input type="hidden" name="product_id" value="8">
                    <input type="hidden" name="product_name" value="Gentlemen's Casual Waist Washed Denim Pants">
                    <input type="hidden" name="price" value="714.00">
                    <input type="hidden" name="orig_price" value="840.00">
                    <input type="hidden" name="image_url" value="G2.png">
                    <div class="mb-3">
                        <label for="colorSelect8" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect8" name="color" required>
                            <option value="Light Blue">Light Blue</option>
                            <option value="Dark Gray">Dark Gray</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sizeSelect8" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect8" name="size" required>
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                            <option value="XL">Extra Large</option>
                            <option value="2XL">2XL</option>
                            <option value="3XL">3XL</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart('8')">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Product 4 -->
<div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="lpants.png" alt="Ladies Casual Pants With Pockets" class="img-fluid">
        <div class="badge-custom">BEST SELLER</div>
        <div class="product-details">
            <h5 class="product-title">Ladies Casual Pants With Pockets</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱416.00</span>
                <span class="original-price" style="color: #F8D0C8; text-decoration: line-through;">₱489.00</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal9">Add to Cart</button>
                <a href="product3.php?id=9" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal for Product 9 -->
<div class="modal fade" id="addToCartModal9" tabindex="-1" aria-labelledby="addToCartModalLabel9" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel9">Select Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm9">
                    <input type="hidden" name="product_id" value="9">
                    <input type="hidden" name="product_name" value="Ladies Casual Pants With Pockets">
                    <input type="hidden" name="price" value="416.00">
                    <input type="hidden" name="orig_price" value="489.00">
                    <input type="hidden" name="image_url" value="lpants.png">

                    <!-- Color Selection -->
                    <div class="mb-3">
                        <label for="colorSelect9" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect9" name="color" required>
                            <option value="Light Brown">Light Brown</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="sizeSelect9" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect9" name="size" required>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(9)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Product 5 -->
<div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="lrandom3.png" alt="Ladies Loose Fit Short Sleeve T-Shirt" class="img-fluid">
        <div class="badge-custom">BEST SELLER</div>
        <div class="product-details">
            <h5 class="product-title">Ladies Loose Fit Short Sleeve T-Shirt</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱152.00</span>
                <span class="original-price" style="color: #F8D0C8; text-decoration: line-through;">₱180.00</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal10">Add to Cart</button>
                <a href="product4.php?id=10" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal for Product 5 -->
<div class="modal fade" id="addToCartModal10" tabindex="-1" aria-labelledby="addToCartModalLabel10" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel10">Select Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm10">
                    <input type="hidden" name="product_id" value="10">
                    <input type="hidden" name="product_name" value="Ladies Loose Fit Short Sleeve T-Shirt">
                    <input type="hidden" name="price" value="152.00">
                    <input type="hidden" name="orig_price" value="180.00">
                    <input type="hidden" name="image_url" value="lrandom3.png">

                                        <!-- Color Selection -->
                                        <div class="mb-3">
                        <label for="colorSelect10" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect10" name="color" required>
                            <option value="White">White</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="sizeSelect10" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect10" name="size" required>
                            <option value="XXS">XXS</option>
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                            <option value="XL">Extra Large</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(10)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Product 6 -->
<div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="G3.png" alt="Hypemode Gentlemen's Denim Shorts" class="img-fluid">
        <div class="badge-custom">BEST SELLER</div>
        <div class="product-details">
            <h5 class="product-title">Hypemode Gentlemen's Denim Shorts</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱706.00</span>
                <span class="original-price" style="color: #F8D0C8; text-decoration: line-through;">₱831.00</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal11">Add to Cart</button>
                <a href="product5.php?id=11" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal for Product 6 -->
<div class="modal fade" id="addToCartModal11" tabindex="-1" aria-labelledby="addToCartModalLabel11" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel11">Select Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm11">
                    <input type="hidden" name="product_id" value="11">
                    <input type="hidden" name="product_name" value="Hypemode Gentlemen's Denim Shorts">
                    <input type="hidden" name="price" value="706.00">
                    <input type="hidden" name="orig_price" value="831.00">
                    <input type="hidden" name="image_url" value="G3.png">

                                        <!-- Color Selection -->
                                        <div class="mb-3">
                        <label for="colorSelect11" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect11" name="color" required>
                            <option value="Washed Gray">Washed Gray</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sizeSelect11" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect11" name="size" required>
                            <option value="XS">Extra Small</option>
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(11)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Product 7 -->
<div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="lrandom4.png" alt="Simple Daily Dress With Decorative Ornaments" class="img-fluid">
        <div class="badge-custom">BEST SELLER</div>
        <div class="product-details">
            <h5 class="product-title">Simple Daily Dress With Decorative Ornaments</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱794.00</span>
                <span class="original-price" style="color: #F8D0C8; text-decoration: line-through;">₱993.00</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal12">Add to Cart</button>
                <a href="product6.php?id=12" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal for Product 7 -->
<div class="modal fade" id="addToCartModal12" tabindex="-1" aria-labelledby="addToCartModalLabel12" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel12">Select Size and Color</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm12">
                    <input type="hidden" name="product_id" value="12">
                    <input type="hidden" name="product_name" value="Simple Daily Dress With Decorative Ornaments">
                    <input type="hidden" name="price" value="794.00">
                    <input type="hidden" name="orig_price" value="993.00">
                    <input type="hidden" name="image_url" value="lrandom4.png">
                    <div class="mb-3">
                        <label for="colorSelect12" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect12" name="color" required>
                            <option value="Green">Green</option>
                            <option value="Pink">Pink</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sizeSelect12" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect12" name="size" required>
                            <option value="XS">Extra Small</option>
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(12)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Product 8 -->
<div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="G4.png" alt="Gentlemen's Summer Colorblock Polo Shirt" class="img-fluid">
        <div class="badge-custom">BEST SELLER</div>
        <div class="product-details">
            <h5 class="product-title">Gentlemen's Summer Colorblock Polo Shirt</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱220.00</span>
                <span class="original-price" style="color: #F8D0C8; text-decoration: line-through;">₱289.00</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal13">Add to Cart</button>
                <a href="product7.php?id=13" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal for Product 8 -->
<div class="modal fade" id="addToCartModal13" tabindex="-1" aria-labelledby="addToCartModalLabel13" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel13">Select Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm13">
                    <input type="hidden" name="product_id" value="13">
                    <input type="hidden" name="product_name" value="Gentlemen's Summer Colorblock Polo Shirt">
                    <input type="hidden" name="price" value="220.00">
                    <input type="hidden" name="orig_price" value="289.00">
                    <input type="hidden" name="image_url" value="G4.png">

                                        <!-- Color Selection -->
                                        <div class="mb-3">
                        <label for="colorSelect13" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect13" name="color" required>
                            <option value="Brown">Brown</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sizeSelect13" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect13" name="size" required>
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                            <option value="XL">Extra Large</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(13)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>


    </div>
</div>



    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .btn-custom {
            background-color: #B0C6B5;
            color: white;
            font-size: 0.8rem; /* Smaller font size for buttons */
            padding: 5px 10px; /* Adjust padding for smaller buttons */
        }
        .btn-custom:hover {
            background-color: #A0B6A5;
            color: white;
        }
        .badge-custom {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #ff6f61;
            color: white;
            font-size: 0.8rem;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .product-card {
            position: relative;
            overflow: hidden;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
        }
        .price {
            font-size: 1rem;
            margin: 10px 0;
        }
        .price .sale-price {
            color: #ff6f61;
            font-weight: bold;
        }
        .price .original-price {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
    </style>



<div class="container py-5" style="font-family: Poppins;">
    <h2 class="text-center mb-4">NEW ARRIVALS</h2>
    
    <!-- First Row of Products -->
    <div class="row g-4">
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="product-card">
            <img src="new1.png" alt="StyleGen Ladies Oversized Fit Graphic Tee" class="img-fluid">
            <div class="badge-custom">NEW</div>
            <div class="product-details">
                <h5 class="product-title">StyleGen Ladies Oversized Fit Graphic Tee</h5>
                <p class="product-price">
                    <span class="sale-price" style="color: #687B61;">₱350.00</span>
                </p>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal14">Add to Cart</button>
                    <a href="arrivals1.php?id=14" class="btn btn-custom">View Details</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Add to Cart Modal for Product 14 -->
    <div class="modal fade" id="addToCartModal14" tabindex="-1" aria-labelledby="addToCartModalLabel14" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addToCartModalLabel14">Select Size</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addToCartForm14">
                        <input type="hidden" name="product_id" value="14">
                        <input type="hidden" name="product_name" value="StyleGen Ladies Oversized Fit Graphic Tee">
                        <input type="hidden" name="price" value="350.00">
                        <input type="hidden" name="orig_price" value="350.00">
                        <input type="hidden" name="image_url" value="new1.png">

                        <!-- Color Selection -->
                        <div class="mb-3">
                        <label for="colorSelect14" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect14" name="color" required>
                            <option value="Light Pink">Light Pink</option>
                        </select>
                    </div>
                        <div class="mb-3">
                            <label for="sizeSelect14" class="form-label">Select Size</label>
                            <select class="form-select" id="sizeSelect14" name="size" required>
                                <option value="S">Small</option>
                                <option value="M">Medium</option>
                                <option value="L">Large</option>
                                <option value="XL">Extra Large</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-custom w-100" onclick="addToCart(14)">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="new2.png" alt="StyleGen Men's Light Brown Denim Pants" class="img-fluid">
        <div class="badge-custom">NEW</div>
        <div class="product-details">
            <h5 class="product-title">StyleGen Men's Light Brown Denim Pants</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱679.00</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal15">Add to Cart</button>
                <a href="arrivals2.php?id=15" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal for Product 15 -->
<div class="modal fade" id="addToCartModal15" tabindex="-1" aria-labelledby="addToCartModalLabel15" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel15">Select Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm15">
                    <input type="hidden" name="product_id" value="15">
                    <input type="hidden" name="product_name" value="StyleGen Men's Light Brown Denim Pants">
                    <input type="hidden" name="price" value="679.00">
                    <input type="hidden" name="orig_price" value="679.00">
                    <input type="hidden" name="image_url" value="new2.png">
                    <!-- Color Selection -->
                    <div class="mb-3">
                        <label for="colorSelect15" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect15" name="color" required>
                            <option value="Brown">Brown</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sizeSelect15" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect15" name="size" required>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(15)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="new3.png" alt="StyleGen Washed Faux Leather Mini Skirt" class="img-fluid">
        <div class="badge-custom">NEW</div>
        <div class="product-details">
            <h5 class="product-title">StyleGen Washed Faux Leather Mini Skirt</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱2,295.00</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal16">Add to Cart</button>
                <a href="arrivals3.php?id=16" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal for Product 16 -->
<div class="modal fade" id="addToCartModal16" tabindex="-1" aria-labelledby="addToCartModalLabel16" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel16">Select Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm16">
                    <input type="hidden" name="product_id" value="16">
                    <input type="hidden" name="product_name" value="StyleGen Washed Faux Leather Mini Skirt">
                    <input type="hidden" name="price" value="2295.00">
                    <input type="hidden" name="orig_price" value="2295.00">
                    <input type="hidden" name="image_url" value="new3.png">
                    <!-- Color Selection -->
                    <div class="mb-3">
                        <label for="colorSelect16" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect16" name="color" required>
                            <option value="Dark Gray">Dark Gray</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sizeSelect16" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect16" name="size" required>
                            <option value="XXS">XXS</option>
                            <option value="XS">XS</option>
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                            <option value="XL">Extra Large</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(16)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="shirt3.png" alt="StyleGen Men T-Shirts Fit Stripe Casual" class="img-fluid">
        <div class="badge-custom">NEW</div>
        <div class="product-details">
            <h5 class="product-title">StyleGen Men T-Shirts Fit Stripe Casual</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱320.00</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal17">Add to Cart</button>
                <a href="arrivals4.php?id=17" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal for Product 17 -->
<div class="modal fade" id="addToCartModal17" tabindex="-1" aria-labelledby="addToCartModalLabel17" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel17">Select Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm17">
                    <input type="hidden" name="product_id" value="17">
                    <input type="hidden" name="product_name" value="StyleGen Men T-Shirts Fit Stripe Casual">
                    <input type="hidden" name="price" value="320.00">
                    <input type="hidden" name="orig_price" value="320.00">
                    <input type="hidden" name="image_url" value="shirt3.png">
                    <!-- Color Selection -->
                    <div class="mb-3">
                        <label for="colorSelect17" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect17" name="color" required>
                            <option value="Stripe Brown">Stripe Brown</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sizeSelect17" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect17" name="size" required>
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                            <option value="XL">Extra Large</option>
                            <option value="2XL">2XL</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(17)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

    
    <!-- Second Row of Products -->
    <div class="row">
    <div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="new8.png" alt="StyleGen Men Straight Leg Cargo Pants" class="img-fluid">
        <div class="badge-custom">NEW</div>
        <div class="product-details">
            <h5 class="product-title">StyleGen Men Straight Leg Cargo Pants</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱1,200.00</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal18">Add to Cart</button>
                <a href="arrivals5.php?id=18" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal for Product 18 -->
<div class="modal fade" id="addToCartModal18" tabindex="-1" aria-labelledby="addToCartModalLabel18" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel18">Select Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm18">
                    <input type="hidden" name="product_id" value="18">
                    <input type="hidden" name="product_name" value="StyleGen Men Straight Leg Cargo Pants">
                    <input type="hidden" name="price" value="1200.00">
                    <input type="hidden" name="orig_price" value="1200.00">
                    <input type="hidden" name="image_url" value="new8.png">
                    <!-- Color Selection -->
                    <div class="mb-3">
                        <label for="colorSelect18" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect18" name="color" required>
                            <option value="Khaki">Khaki</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sizeSelect18" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect18" name="size" required>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(18)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="new5.png" alt="StyleGen Ladies Knit Midi Skirt" class="img-fluid">
        <div class="badge-custom">NEW</div>
        <div class="product-details">
            <h5 class="product-title">StyleGen Ladies Knit Midi Skirt</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱1,495.00</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal19">Add to Cart</button>
                <a href="arrivals6.php?id=19" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal for Product 19 -->
<div class="modal fade" id="addToCartModal19" tabindex="-1" aria-labelledby="addToCartModalLabel19" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel19">Select Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm19">
                    <input type="hidden" name="product_id" value="19">
                    <input type="hidden" name="product_name" value="StyleGen Ladies Knit Midi Skirt">
                    <input type="hidden" name="price" value="1495.00">
                    <input type="hidden" name="orig_price" value="1495.00">
                    <input type="hidden" name="image_url" value="new5.png">
                    <!-- Color Selection -->
                    <div class="mb-3">
                        <label for="colorSelect19" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect19" name="color" required>
                            <option value="Gray">Gray</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sizeSelect19" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect19" name="size" required>
                            <option value="4">4</option>
                            <option value="6">6</option>
                            <option value="8">8</option>
                            <option value="10">10</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(19)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="newshort.png" alt="StyleGen Street Men Ripped Denim Shorts" class="img-fluid">
        <div class="badge-custom">NEW</div>
        <div class="product-details">
            <h5 class="product-title">StyleGen Street Men Ripped Denim Shorts</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱683.00</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal20">Add to Cart</button>
                <a href="arrivals7.php?id=20" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal for Product 20 -->
<div class="modal fade" id="addToCartModal20" tabindex="-1" aria-labelledby="addToCartModalLabel20" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel20">Select Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm20">
                    <input type="hidden" name="product_id" value="20">
                    <input type="hidden" name="product_name" value="StyleGen Street Men Ripped Denim Shorts">
                    <input type="hidden" name="price" value="683.00">
                    <input type="hidden" name="orig_price" value="683.00">
                    <input type="hidden" name="image_url" value="newshort.png">
                    <!-- Color Selection -->
                    <div class="mb-3">
                        <label for="colorSelect20" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect20" name="color" required>
                            <option value="Light Blue">Light Blue</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sizeSelect20" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect20" name="size" required>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(20)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 col-sm-6 mb-4">
    <div class="product-card">
        <img src="new6.png" alt="StyleGen Contrast Collar Half-Zip Polo" class="img-fluid">
        <div class="badge-custom">NEW</div>
        <div class="product-details">
            <h5 class="product-title">StyleGen Contrast Collar Half-Zip Polo</h5>
            <p class="product-price">
                <span class="sale-price" style="color: #687B61;">₱500.00</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-custom me-2" data-bs-toggle="modal" data-bs-target="#addToCartModal21">Add to Cart</button>
                <a href="arrivals8.php?id=21" class="btn btn-custom">View Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Add to Cart Modal for Product 21 -->
<div class="modal fade" id="addToCartModal21" tabindex="-1" aria-labelledby="addToCartModalLabel21" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel21">Select Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm21">
                    <input type="hidden" name="product_id" value="21">
                    <input type="hidden" name="product_name" value="StyleGen Contrast Collar Half-Zip Polo">
                    <input type="hidden" name="price" value="500.00">
                    <input type="hidden" name="orig_price" value="500.00">
                    <input type="hidden" name="image_url" value="new6.png">
                    <!-- Color Selection -->
                    <div class="mb-3">
                        <label for="colorSelect21" class="form-label">Select Color</label>
                        <select class="form-select" id="colorSelect21" name="color" required>
                            <option value="Black">Black</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sizeSelect21" class="form-label">Select Size</label>
                        <select class="form-select" id="sizeSelect21" name="size" required>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                            <option value="Extra Large">Extra Large</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-custom w-100" onclick="addToCart(21)">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
    </div>
    </div>
   

<style>
    .badge-custom {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #F8D0C8;
        color: white;
        padding: 5px 10px;
        font-size: 0.75rem;
        border-radius: 5px;
    }
    .product-title {
        font-size: 1rem;
        font-weight: bold;
    }
    .price .sale-price {
        color: #687B61;
        font-weight: bold;
        margin-right: 10px;
    }
    .price .original-price {
        text-decoration: line-through;
        color: #F8D0C8;
    }
</style>


<script>
function addToCart(productId) {
    const form = document.getElementById(`addToCartForm${productId}`);
    const formData = new FormData(form);

    fetch('addtocart.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const cartCountElement = document.querySelector('.cart-count');
            cartCountElement.textContent = data.cart_count;
            alert(`${data.product_name} has been added to your cart.`);

            // Show product image confirmation
            if (data.image_url) {
                alert('Image URL: ' + data.image_url);
            }
        } else {
            alert(data.message || 'Failed to add to cart.');
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>


<script>
    // Initialize intersection observer
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add the 'animate' class when the element is in view
                entry.target.classList.add('animate');
                observer.unobserve(entry.target); // Stop observing once animated
            }
        });
    }, {
        threshold: 0.5 // Trigger the animation when 50% of the product is visible
    });

    // Target all product cards
    document.querySelectorAll('.product-card').forEach(card => {
        observer.observe(card);
    });
</script>








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
