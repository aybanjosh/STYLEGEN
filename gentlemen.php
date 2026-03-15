
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <title>Gentlemen - StyleGen Online Shop</title>
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
        body {
            padding-top: 80px;
        }
    </style>

<style>
        .product-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }
        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-details {
            padding: 15px;
        }
        .product-title {
            font-size: 1rem;
            font-weight: bold;
            color: #333;
        }
        .product-price {
            font-size: 1rem;
            font-weight: bold;
            color: #FF4500;
        }
        .product-label {
            background: #FF4500;
            color: white;
            padding: 2px 5px;
            border-radius: 5px;
            font-size: 0.75rem;
            display: inline-block;
            margin-bottom: 10px;
        }
        .product-actions {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .cart-btn {
        font-size: 0.75rem; /* Smaller font size */
        padding: 5px 10px; /* Reduced padding */
        background-color: #B0C6B5; /* Keep the original color */
        border: none;
        color: white;
        border-radius: 4px; /* Rounded corners */
        cursor: pointer;
        display: inline-block;
    }

    .cart-btn:hover {
        background-color: #687B61; /* Slightly darker hover color */
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

    </style>
</head>
<body>
<div class="container my-5" style="font-family: 'Poppins', sans-serif;">
    <h2 class="section-title text-center">GENTLEMEN'S OUTFIT</h2><br>
    <div class="row g-4">

        <!-- Product Card 1 -->
        <div class="col-md-3 col-sm-6">
            <a href="product.php" class="text-decoration-none text-dark">
                <div class="product-card">
                    <img src="shirt1.png" alt="Product 1" class="product-image">
                    <div class="product-details">
                        <span class="product-label" style="background-color: #F8D0C8; color: white;">BEST SELLER</span>
                        <h5 class="product-title">Gentlemen Striped Print Drop Shoulder Tee</h5>
                        <p class="product-price" style="color: #687B61;">₱407.00 <span style="color: #F8D0C8;"><del>₱479.00</del></span></p>
                        <div class="product-actions">
                            <button class="cart-btn">Add to Cart</button>
                            <span style="color: orange;">4.9 ★★★★★</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Product Card 2 -->
        <div class="col-md-3 col-sm-6">
            <a href="gen1.php" class="text-decoration-none text-dark">
            <div class="product-card">
                <img src="short1.png" alt="Product 2" class="product-image">
                <div class="product-details">
                    <span class="product-label" style="background-color: #D6B4FC; color: white;">TRENDS</span>
                    <h5 class="product-title">Gentlemen Slant Pockets Straight Leg Shorts</h5>
                    <p class="product-price" style="color: #687B61;">₱488.00 <span style="color: #F8D0C8;"><del>₱574.00</del></span></p>
                    <div class="product-actions">
                        <button class="cart-btn">Add to Cart</button>
                        <span style="color: orange;">4.91 ★★★★★</span>
                    </div>
                </div>
            </div>
        </a>
        </div>

        <!-- Product Card 3 -->
        <div class="col-md-3 col-sm-6">
        <a href="product2.php" class="text-decoration-none text-dark">
            <div class="product-card">
                <img src="pants1.png" alt="Product 3" class="product-image">
                <div class="product-details">
                    <span class="product-label" style="background-color: #80C4E9; color: white;">SALE</span>
                    <h5 class="product-title">Gentlemen's Casual Waist Washed Denim Pants</h5>
                    <p class="product-price" style="color: #687B61;">₱714.00 <span style="color: #F8D0C8;"><del>₱840.00</del></span></p>
                    <div class="product-actions">
                        <button class="cart-btn">Add to Cart</button>
                        <span style="color: orange;">4.91 ★★★★★</span>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <!-- Product Card 4 -->
        <div class="col-md-3 col-sm-6">
        <a href="gen2.php" class="text-decoration-none text-dark">

            <div class="product-card">
                <img src="Gentlemen/polo6.png" alt="Product 4" class="product-image">
                <div class="product-details">
                    <span class="product-label" style="background-color: #FF0000; color: white;">HOT</span>
                    <h5 class="product-title">Gentlemen's Short Sleeve Polo Shirt Collar All White</h5>
                    <p class="product-price" style="color: #687B61;">₱401.00 <span style="color: #F8D0C8;"><del>₱472.00</del></span></p>
                    <div class="product-actions">
                        <button class="cart-btn">Add to Cart</button>
                        <span style="color: orange;">5.0 ★★★★★</span>
                    </div>
                </div>
            </div>
</a>
        </div>
            <!-- Repeat other product cards -->
            <!-- Product Card 5 -->
            <div class="col-md-3 col-sm-6">
            <a href="gen3.php" class="text-decoration-none text-dark">

                <div class="product-card">
                    <img src="trouser1.png" alt="Product 5" class="product-image">
                    <div class="product-details">
                        <span class="product-label" style="background-color: #D6B4FC; color: white;">TRENDS</span>
                        <h5 class="product-title">Mode Gentlemen Space Dye Tailored Pants</h5>
                        <p class="product-price" style="color: #687B61;">₱754.00 </p>
                        <div class="product-actions">
                            <button class="cart-btn">Add to Cart</button>
                            <span style="color: orange;">5.0 ★★★★★</span>
                        </div>
                    </div>
                </div>
</a>
            </div>
            <div class="col-md-3 col-sm-6">
            <a href="gen4.php" class="text-decoration-none text-dark">

            <div class="product-card">
                <img src="cargo2.png" alt="Product 7" class="product-image">
                <div class="product-details">
                    <span class="product-label" style="background-color: #FF0000; color: white;">HOT</span>
                    <h5 class="product-title">Gentlemen Loose Fit Pants With Drawstring Waist</h5>
                    <p class="product-price" style="color: #687B61;">₱462.00 <span style="color: #F8D0C8;"><del>₱543.00</del></span></p>
                    <div class="product-actions">
                    <button class="cart-btn">Add to Cart</button>
                    <span style="color: orange;">4.93 ★★★★★</span>
                    </div>
                </div>
            </div>
</a>
        </div>
        <!-- Product Card 8 -->
        <div class="col-md-3 col-sm-6">
        <a href="gen5.php" class="text-decoration-none text-dark">
            <div class="product-card">
                <img src="shirt2.png" alt="Product 8" class="product-image">
                <div class="product-details">
                    <span class="product-label" style="background-color: #FF0000; color: white;">HOT</span>
                    <h5 class="product-title">Gentlemen Round Neck Short Sleeve Casual T-Shirt</h5>
                    <p class="product-price" style="color: #687B61;">₱423.00 <span style="color: #F8D0C8;"><del>₱498.00</del></span></p>
                    <div class="product-actions">
                    <button class="cart-btn">Add to Cart</button>
                    <span style="color: orange;">4.94 ★★★★★</span>
                    </div>
                </div>
            </div>
</a>
        </div>
        <!-- Product Card 9 -->
        <div class="col-md-3 col-sm-6">
        <a href="gen6.php" class="text-decoration-none text-dark">

            <div class="product-card">
                <img src="short2.png" alt="Product 9" class="product-image">
                <div class="product-details">
                    <span class="product-label" style="background-color: #FF0000; color: white;">HOT</span>
                    <h5 class="product-title">Denim Shorts Baggy Jorts Plain Navy Blue</h5>
                    <p class="product-price" style="color: #687B61;">₱496.00 <span style="color: #F8D0C8;"><del>₱584.00</del></span></p>
                    <div class="product-actions">
                    <button class="cart-btn">Add to Cart</button>
                    <span style="color: orange;">4.93 ★★★★★</span>
                    </div>
                </div>
            </div>
</a>
        </div>
        <!-- Product Card 10 -->
        <div class="col-md-3 col-sm-6">
        <a href="gen7.php" class="text-decoration-none text-dark">

            <div class="product-card">
                <img src="Gentlemen/shirtdye.png" alt="Product 10" class="product-image">
                <div class="product-details">
                    <span class="product-label" style="background-color: #FF0000; color: white;">HOT</span>
                    <h5 class="product-title">Vacaylife Gentlemen Tie Dye Tee</h5>
                    <p class="product-price" style="color: #687B61;">₱292.00 <span style="color: #F8D0C8;"><del>₱343.00</del></span></p>
                    <div class="product-actions">
                    <button class="cart-btn">Add to Cart</button>
                    <span style="color: orange;">4.93 ★★★★★</span>
                    </div>
                </div>
            </div>
</a>
        </div>
        <!-- Product Card 11 -->
        <div class="col-md-3 col-sm-6">
        <a href="gen8.php" class="text-decoration-none text-dark">
            <div class="product-card">
                <img src="polo4.png" alt="Product 11" class="product-image">
                <div class="product-details">
                    <span class="product-label" style="background-color: #D6B4FC; color: white;">TRENDS</span>
                    <h5 class="product-title">StyleGen Solid Ribbed Polo Shirt For Gentlemen</h5>
                    <p class="product-price" style="color: #687B61;">₱427.00 </p>
                    <div class="product-actions">
                    <button class="cart-btn">Add to Cart</button>
                    <span style="color: orange;">4.92 ★★★★★</span>
                    </div>
                </div>
            </div>
</a>
        </div>
        <!-- Product Card 12 -->
        <div class="col-md-3 col-sm-6">
        <a href="arrivals2.php" class="text-decoration-none text-dark">

            <div class="product-card">
                <img src="pants2.png" alt="Product 12" class="product-image">
                <div class="product-details">
                    <span class="product-label" style="background-color: #F8D0C8; color: white;">NEW</span>
                    <h5 class="product-title">StyleGen Gentlemen's Light Brown Denim Pants</h5>
                    <p class="product-price" style="color: #687B61;">₱679.00 </p>
                    <div class="product-actions">
                    <button class="cart-btn">Add to Cart</button>
                    <span style="color: orange;">☆☆☆☆☆</span>
                    </div>
                </div>
            </div>
</a>
        </div>

        <div class="col-md-3 col-sm-6">
        <a href="arrivals4.php" class="text-decoration-none text-dark">

            <div class="product-card">
                <img src="shirt3.png" alt="Product 12" class="product-image">
                <div class="product-details">
                    <span class="product-label" style="background-color: #F8D0C8; color: white;">NEW</span>
                    <h5 class="product-title">StyleGen Men T-Shirts Fit Basic Tee Stripe Casual</h5>
                    <p class="product-price" style="color: #687B61;">₱320.00</p>
                    <div class="product-actions">
                    <button class="cart-btn">Add to Cart</button>
                    <span style="color: orange;"> ☆☆☆☆☆</span>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
</div>


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
                    <a class="nav-link active" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gentlemen.php">GENTLEMEN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ladies.php">LADIES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">CONTACT US</a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex align-items-center">
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill" style="font-size: 1.9rem;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        <li><a class="dropdown-item" href="login.php">LOGIN</a></li>
                        <li><a class="dropdown-item" href="createacc.php">CREATE ACCOUNT</a></li>
                    </ul>
                </li>

                <li class="nav-item ms-2">
                    <a href="cart.php" class="nav-link">
                        <i class="fa-solid fa-cart-shopping text-dark" style="font-size: 1.5rem;"></i>
                        <span class="cart-badge">0</span>
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
        background-color: #B0C6B5
        ; 
        color: white;
    }
    .dropdown-item {
        color: black; 
    }
</style>




  
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