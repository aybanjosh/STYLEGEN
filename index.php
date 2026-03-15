

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


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

                <!-- Cart -->
                <li class="nav-item ms-2">
                    <a href="cart.php" class="nav-link position-relative">
                        <i class="fa fa-shopping-cart text-dark" style="font-size: 1.5rem;"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.75rem;">
                            0
                        </span>
                    </a>
                </li>

                <!-- Search Bar -->
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



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


   <div class="container my-5 d-flex justify-content-center align-items-center vh-60" style="font-family: Poppins;">
    <div class="row g-4">
        <!-- Shirts -->
        <div class="col-md-6 col-sm-12">
            <a href="gentlemen.php" class="text-decoration-none">
                <div class="category-card text-center">
                    <img src="gentlemen.png" alt="Gentlemen" class="category-image mb-3">
                    <span class="category-text">Gentlemen's Outfit</span>
                </div>
            </a>
        </div>
        <!-- Pants -->
        <div class="col-md-6 col-sm-12">
            <a href="ladies.php" class="text-decoration-none">
                <div class="category-card text-center">
                    <img src="lady.png" alt="Ladies" class="category-image mb-3">
                    <span class="category-text">Ladies Outfit</span>
                </div>
            </a>
        </div>
    </div>
</div>



    <div class="container py-5" style="font-family: Poppins;">
    <h2 class="text-center mb-4">BEST SELLERS</h2>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- Carousel Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            <!-- First Slide -->
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-4">
                        <a href="product.php" class="text-decoration-none text-dark">
                        <div class="card product-card">
                            <div class="badge-custom">Best Seller</div>
                            <img src="G1.png" class="card-img-top" href="product.php" alt="Gentlemen Striped Print Drop Shoulder Tee">
                            <div class="card-body text-center">
                                <p class="product-title">Gentlemen Striped Print Drop Shoulder Tee</p>
                                <div class="price">
                                    <span class="sale-price">₱407.00</span>
                                    <span class="original-price">₱479.00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                    <a href="product1.php" class="text-decoration-none text-dark">

                        <div class="card product-card">
                            <div class="badge-custom">Best Seller</div>
                            <img src="lrandom2.png" class="card-img-top" alt="Double-Breasted Collar Pressed-Pleated Dress">
                            <div class="card-body text-center">
                                <p class="product-title">Double-Breasted Collar Pressed-Pleated Dress</p>
                                <div class="price">
                                    <span class="sale-price">₱766.00</span>
                                    <span class="original-price">₱959.00</span>
                                </div>
                            </div>
                        </div>
                        </a>

                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                     <a href="product2.php" class="text-decoration-none text-dark">
                        <div class="card product-card">
                            <div class="badge-custom">Best Seller</div>
                            <img src="G2.png" class="card-img-top" alt="Gentlemen's Casual Waist Washed Denim Pants">
                            <div class="card-body text-center">
                                <p class="product-title">Gentlemen's Casual Waist Washed Denim Pants</p>
                                <div class="price">
                                    <span class="sale-price">₱714.00</span>
                                    <span class="original-price">₱840.00</span>
                                </div>
                            </div>
                        </div>
                        </a>

                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                    <a href="product3.php" class="text-decoration-none text-dark">
                        <div class="card product-card">
                            <div class="badge-custom">BEST SELLER</div>
                            <img src="lpants.png" class="card-img-top" alt="Trendy Round Toe Thick Platform High Heels">
                            <div class="card-body text-center">
                                <p class="product-title">Ladies Casual Pants With Pockets</p>
                                <div class="price">
                                    <span class="sale-price">₱416.00</span>
                                    <span class="original-price">₱489.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>

            </div>

            <!-- Second Slide -->
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-4">
                    <a href="product4.php" class="text-decoration-none text-dark">
                        <div class="card product-card">
                            <div class="badge-custom">BEST SELLER</div>
                            <img src="lrandom3.png" class="card-img-top" alt="Ladies Loose Fit Short Sleeve T-Shirt">
                            <div class="card-body text-center">
                                <p class="product-title">Ladies Loose Fit Short Sleeve T-Shirt</p>
                                <div class="price">
                                    <span class="sale-price">₱152.00</span>
                                    <span class="original-price">₱180.00</span>
                                </div>
                            </div>
                        </div>
    </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                    <a href="product5.php" class="text-decoration-none text-dark">

                        <div class="card product-card">
                            <div class="badge-custom">BEST SELLER</div>
                            <img src="G3.png" class="card-img-top" alt="Hypemode Gentlemen's Casual Denim Shorts ">
                            <div class="card-body text-center">
                                <p class="product-title">Hypemode Gentlemen's Denim Shorts </p>
                                <div class="price">
                                    <span class="sale-price">₱706.00</span>
                                    <span class="original-price">₱831</span>
                                </div>
                            </div>
                        </div>
    </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                    <a href="product6.php" class="text-decoration-none text-dark">

                        <div class="card product-card">
                            <div class="badge-custom">BEST SELLER</div>
                            <img src="lrandom4.png" class="card-img-top" alt="Simple Daily Dress With Decorative Ornaments">
                            <div class="card-body text-center">
                                <p class="product-title">Simple Daily Dress With Decorative Ornaments</p>
                                <div class="price">
                                    <span class="sale-price">₱794.00</span>
                                    <span class="original-price">₱993.00</span>
                                </div>
                            </div>
                        </div>
    </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                    <a href="product7.php" class="text-decoration-none text-dark">

                        <div class="card product-card">
                            <div class="badge-custom">BEST SELLER</div>
                            <img src="G4.png" class="card-img-top" alt="Gentlemen's Summer Colorblock Polo Shirt">
                            <div class="card-body text-center">
                                <p class="product-title">Gentlemen's Summer Colorblock Polo Shirt</p>
                                <div class="price">
                                    <span class="sale-price">₱220.00</span>
                                    <span class="original-price">₱289.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
    </a>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>




<div class="container py-5" style="font-family: Poppins;">
    <h2 class="text-center mb-4">NEW ARRIVALS</h2>
    
    <!-- First Row of Products -->
    <div class="row">
        <div class="col-md-3 col-sm-6 mb-4" style="font-family: Poppins;">
        <a href="arrivals1.php" class="text-decoration-none text-dark">

            <div class="card product-card">
                <div class="badge-custom">NEW</div>
                <img src="new1.png" class="card-img-top" alt="StyleGen Florida Oversized Fit Graphic Tee">
                <div class="card-body product-details">
                    <p class="product-title">StyleGen Ladies Oversized Fit Graphic Tee</p>
                    <div class="price">
                        <span class="sale-price">₱350.00</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
        <div class="col-md-3 col-sm-6 mb-4">
        <a href="arrivals2.php" class="text-decoration-none text-dark">

            <div class="card product-card">
                <div class="badge-custom">NEW</div>
                <img src="new2.png" class="card-img-top" alt="StyleGen Men's Light Brown Denim Pants">
                <div class="card-body product-details">
                    <p class="product-title">StyleGen Gentlemen's Light Brown Denim Pants</p>
                    <div class="price">
                        <span class="sale-price">₱679.00</span>
                    </div>
                </div>
            </div>
         </a>
    </div>
        <div class="col-md-3 col-sm-6 mb-4">
        <a href="arrivals3.php" class="text-decoration-none text-dark">

            <div class="card product-card">
                <div class="badge-custom">NEW</div>
                <img src="new3.png" class="card-img-top" alt="StyleGen Washed faux leather mini skirt">
                <div class="card-body product-details">
                    <p class="product-title">StyleGen Washed Faux Leather Mini Skirt</p>
                    <div class="price">
                        <span class="sale-price">₱2,295.00</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
        <div class="col-md-3 col-sm-6 mb-4">
        <a href="arrivals4.php" class="text-decoration-none text-dark">

            <div class="card product-card">
                <div class="badge-custom">NEW</div>
                <img src="shirt3.png" class="card-img-top" alt="StyleGen Men T-Shirts Fit Basic Tee Stripe Casual">
                <div class="card-body product-details">
                    <p class="product-title">StyleGen Men T-Shirts Fit Basic Tee Stripe Casual</p>
                    <div class="price">
                        <span class="sale-price">₱320.00</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
    
    <!-- Second Row of Products -->
    <div class="row">
        <div class="col-md-3 col-sm-6 mb-4">
        <a href="arrivals5.php" class="text-decoration-none text-dark">

            <div class="card product-card">
                <div class="badge-custom">NEW</div>
                <img src="new8.png" class="card-img-top" alt="StyleGen Straight Leg Cargo Pants">
                <div class="card-body product-details">
                    <p class="product-title">StyleGen Gentlemen Straight Leg Cargo Pants</p>
                    <div class="price">
                        <span class="sale-price">₱1,200.00</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
        <div class="col-md-3 col-sm-6 mb-4">
        <a href="arrivals6.php" class="text-decoration-none text-dark">

            <div class="card product-card">
                <div class="badge-custom">NEW</div>
                <img src="new5.png" class="card-img-top" alt="StyleGen Ladies Knit midi skirt">
                <div class="card-body product-details">
                    <p class="product-title">StyleGen Ladies Knit Midi Skirt </p>
                    <div class="price">
                        <span class="sale-price">₱1,495.00</span>
                    </div>
                </div>
            </div>
    </a>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
        <a href="arrivals7.php" class="text-decoration-none text-dark">

            <div class="card product-card">
                <div class="badge-custom">NEW</div>
                <img src="newshort.png" class="card-img-top" alt="StyleGen Street Gentlemen Cotton Ripped Denim Shorts">
                <div class="card-body product-details">
                    <p class="product-title">StyleGen Street Gentlemen Cotton Ripped Denim Shorts</p>
                    <div class="price">
                        <span class="sale-price">₱683.00</span>
                    </div>
                </div>
            </div>
    </a>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
        <a href="arrivals8.php" class="text-decoration-none text-dark">

            <div class="card product-card">
                <div class="badge-custom">NEW</div>
                <img src="new6.png" class="card-img-top" alt="StyleGen Contrast Collar Half-Zip Polo">
                <div class="card-body product-details">
                    <p class="product-title">StyleGen Contrast Collar Half-Zip Polo</p>
                    <div class="price">
                        <span class="sale-price">₱500.00</span>
                    </div>
                </div>
            </div>
    </a>
        </div>
    </div>
</div>

<!-- Optional CSS Styling -->
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

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="font-family: 'Poppins', sans-serif;">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Welcome to StyleGen</h5>
                <!-- No Close button here -->
            </div>
            <div class="modal-body text-center">
                <p>Choose an option to continue</p>
                <a href="login.php" class="btn" style="background-color: #B0C6B5; color: white; width: 100%; margin-bottom: 10px;">Login</a>
                <a href="createacc.php" class="btn" style="background-color: #B0C6B5; color: white; width: 100%;">Create Account</a>
            </div>
        </div>
    </div>
</div>

<!-- Script to trigger the modal on page load -->
<script>
    window.onload = function() {
        var myModal = new bootstrap.Modal(document.getElementById('loginModal'), {
            keyboard: false
        });
        myModal.show();
    };
</script>



</body>
</html>