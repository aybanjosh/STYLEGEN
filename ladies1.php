
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <title>Ladies - StyleGen Online Shop</title>
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
            margin-top: 90px;

        }
        .category-card {
            display: flex;
            align-items: center;
            justify-content: start;
            background-color: #f7f7f7;
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
            text-align: left;
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
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
    .product-card {
        position: relative;
        overflow: hidden;
    }

    .coming-soon-overlay {
        background-color: rgba(0, 0, 0, 0.3);
        color: white;
        font-size: 1.5rem;
        font-weight: bold;
        text-transform: uppercase;
        display: none;
    }

    .product-card:hover .coming-soon-overlay {
        display: flex;
    }
   /* Right to Left animation */
   @keyframes slideInFromRight {
            0% {
                transform: translateX(100%); /* Start off-screen to the right */
                opacity: 0; /* Make it invisible */
            }
            100% {
                transform: translateX(0); /* End in the normal position */
                opacity: 1; /* Fully visible */
            }
        }

        /* Apply animation to the specific elements */
        .animate-right-to-left {
            animation: slideInFromRight 1s ease-out forwards;
        }
</style>

    <div class="animate-right-to-left container my-5" style="font-family: Poppins;">
    <h2 class="section-title" style="text-align:center">LADIES' OUTFITS</h2><br>

        <div class="row g-4" style="font-family: Poppins;">

        <!-- Product Card 4 -->
        <div class="col-md-3 col-sm-6">
        <div class="product-card position-relative">
                    <!-- Overlay for Coming Soon -->
                    <div class="coming-soon-overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                        <span>STAY TUNED</span>
                    </div>
                <img src="Ladies/ladytop.png" alt="Product 4" class="product-image">
                <div class="product-details">
                <span class="product-label" style="background-color: #F8D0C8; color: white;">ARRIVING SOON</span>
                <h5 class="product-title">Ladies Argyle Button Down V-Neck Vest</h5>
                    <p class="product-price" style="color: #687B61;">₱1,???.00 </p>
                    <div class="product-actions">
                        <button class="cart-btn">Add to Cart</button>
                        <span style="color: orange;">☆☆☆☆☆</span>
                    </div>
                </div>
            </div>
</a>
        </div>
            <!-- Repeat other product cards -->
            <!-- Product Card 5 -->
            <div class="col-md-3 col-sm-6">
            <div class="product-card position-relative">
                    <!-- Overlay for Coming Soon -->
                    <div class="coming-soon-overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                        <span>STAY TUNED</span>
                    </div>
                    <img src="Ladies/ladydress.png" alt="Product 5" class="product-image">
                    <div class="product-details">
                    <span class="product-label" style="background-color: #F8D0C8; color: white;">ARRIVING SOON</span>
                        <h5 class="product-title">StyleGen Square Neck Eyelet Mini Dress</h5>
                        <p class="product-price" style="color: #687B61;">₱1,???.00 </p>
                        <div class="product-actions">
                            <button class="cart-btn">Add to Cart</button>
                            <span style="color: orange;">☆☆☆☆☆</span>
                        </div>
                    </div>
                </div>
</a>
            </div>
            <div class="col-md-3 col-sm-6">
            <div class="product-card position-relative">
                    <!-- Overlay for Coming Soon -->
                    <div class="coming-soon-overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                        <span>STAY TUNED</span>
                    </div>
                <img src="Ladies/ladyskirt.png" alt="Product 7" class="product-image">
                <div class="product-details">
                <span class="product-label" style="background-color: #F8D0C8; color: white;">ARRIVING SOON</span>
                <h5 class="product-title">Metallic Pleated Mini Skirt with Elastic Waistband</h5>
                    <p class="product-price" style="color: #687B61;">₱5??.00 </p>
                    <div class="product-actions">
                    <button class="cart-btn">Add to Cart</button>
                    <span style="color: orange;">☆☆☆☆☆</span>
                    </div>
                </div>
            </div>
</a>
        </div>
        <!-- Product Card 8 -->
        <div class="col-md-3 col-sm-6">
        <div class="product-card position-relative">
                    <!-- Overlay for Coming Soon -->
                    <div class="coming-soon-overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                        <span>STAY TUNED</span>
                    </div>
                <img src="Ladies/ladyjog.png" alt="Product 8" class="product-image">
                <div class="product-details">
                <span class="product-label" style="background-color: #F8D0C8; color: white;">ARRIVING SOON</span>
                <h5 class="product-title">Cotton Trending Pants with Drawstring for Ladies</h5>
                    <p class="product-price" style="color: #687B61;">₱3??.00 </p>
                    <div class="product-actions">
                    <button class="cart-btn">Add to Cart</button>
                    <span style="color: orange;">☆☆☆☆☆</span>
                    </div>
                </div>
            </div>
</a>
        </div>
        <!-- Product Card 9 -->
        <div class="col-md-3 col-sm-6">
        <div class="product-card position-relative">
                    <!-- Overlay for Coming Soon -->
                    <div class="coming-soon-overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                        <span>STAY TUNED</span>
                    </div>
                <img src="Ladies/ladyhalf.png" alt="Product 9" class="product-image">
                <div class="product-details">
                <span class="product-label" style="background-color: #F8D0C8; color: white;">ARRIVING SOON</span>
                <h5 class="product-title">Skinny Plaid Strapless Bandeau Mini Dress</h5>
                    <p class="product-price" style="color: #687B61;">₱7??.00 </p>
                    <div class="product-actions">
                    <button class="cart-btn">Add to Cart</button>
                    <span style="color: orange;">☆☆☆☆☆</span>
                    </div>
                </div>
            </div>
</a>
        </div>
        <!-- Product Card 10 -->
        <div class="col-md-3 col-sm-6">
        <div class="product-card position-relative">
                    <!-- Overlay for Coming Soon -->
                    <div class="coming-soon-overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                        <span>STAY TUNED</span>
                    </div>
                <img src="Ladies/ladylong.png" alt="Product 10" class="product-image">
                <div class="product-details">
                <span class="product-label" style="background-color: #F8D0C8; color: white;">ARRIVING SOON</span>
                <h5 class="product-title">Trendy Long Check Midi Skirt for Ladies</h5>
                    <p class="product-price" style="color: #687B61;">₱3??.00 </p>
                    <div class="product-actions">
                    <button class="cart-btn">Add to Cart</button>
                    <span style="color: orange;">☆☆☆☆☆</span>
                    </div>
                </div>
            </div>
</a>
        </div>
        <!-- Product Card 11 -->
        <div class="col-md-3 col-sm-6">
        <div class="product-card position-relative">
                    <!-- Overlay for Coming Soon -->
                    <div class="coming-soon-overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                        <span>STAY TUNED</span>
                    </div>
                <img src="Ladies/ladycrop.png" alt="Product 11" class="product-image">
                <div class="product-details">
                <span class="product-label" style="background-color: #F8D0C8; color: white;">ARRIVING SOON</span>
                <h5 class="product-title">StyleGen Pointelle Square Neck Cropped Top</h5>
                    <p class="product-price" style="color: #687B61;">₱5??.00 </p>
                    <div class="product-actions">
                    <button class="cart-btn">Add to Cart</button>
                    <span style="color: orange;">☆☆☆☆☆</span>
                    </div>
                </div>
            </div>
</a>
        </div>
        

        <div class="col-md-3 col-sm-6">
        <div class="product-card position-relative">
                    <!-- Overlay for Coming Soon -->
                    <div class="coming-soon-overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                        <span>STAY TUNED</span>
                    </div>
                <img src="Ladies/ladypants2.png" alt="Product 12" class="product-image">
                <div class="product-details">
                <span class="product-label" style="background-color: #F8D0C8; color: white;">ARRIVING SOON</span>
                <h5 class="product-title">Ladies Wideleg Trousers with Turnup Hems</h5>
                    <p class="product-price" style="color: #687B61;">₱320.00 </p>
                    <div class="product-actions">
                    <button class="cart-btn">Add to Cart</button>
                    <span style="color: orange;">☆☆☆☆☆</span>
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