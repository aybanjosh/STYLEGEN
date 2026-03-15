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


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    <style>
        /* Add padding to the body to account for the fixed navbar */
        body {
            padding-top: 70px; /* Adjust this value to match the navbar height */
        }
    </style>

<style>
    body{
        font-family: Poppins, sans-serif;
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

<body>
    <div class="container my-5">
        <h3 class="text-center mb-4">Store Locator</h3>
        <div class="accordion" id="storeLocator">

            <!-- Metro Manila Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingMetroManila">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMetroManila" aria-expanded="true" aria-controls="collapseMetroManila">
                        Metro Manila Locations
                    </button>
                </h2>
                <div id="collapseMetroManila" class="accordion-collapse collapse show" aria-labelledby="headingMetroManila" data-bs-parent="#storeLocator">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <h5>StyleGen East Ortigas</h5>
                            <p><strong>Telephone Number:</strong> 828-75208</p>
                            <p><strong>Address:</strong> Ground Level, Ortigas Avenue Extension, Barangay Sta. Lucia, Pasig City</p>
                            <p><strong>Store Hours:</strong></p>
                            <ul>
                                <li>Mon - Thur & Sun: 10:00 AM - 9:00 PM</li>
                                <li>Fri - Sat: 10:00 AM - 10:00 PM</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h5>StyleGen Grand Central</h5>
                            <p><strong>Telephone Number:</strong> Not Available</p>
                            <p><strong>Address:</strong> Third Level, Rizal Ave. Extension, Grace Park East, Caloocan City</p>
                            <p><strong>Store Hours:</strong> Mon - Sun: 10:00 AM - 9:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
    <h2 class="accordion-header" id="headingLuzon">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLuzon" aria-expanded="false" aria-controls="collapseLuzon">
            Luzon Locations
        </button>
    </h2>
    <div id="collapseLuzon" class="accordion-collapse collapse" aria-labelledby="headingLuzon" data-bs-parent="#storeLocator">
        <div class="accordion-body">
            <div class="mb-3">
                <h5>StyleGen Baguio</h5>
                <p><strong>Telephone Number:</strong> (074) 619-7828</p>
                <p><strong>Address:</strong> Second Level, Luneta Hill, Upper Session Road, Baguio City</p>
                <p><strong>Store Hours:</strong></p>
                <ul>
                    <li>Mon - Thur: 10:00 AM - 9:00 PM</li>
                    <li>Fri - Sun: 10:00 AM - 10:00 PM</li>
                </ul>
            </div>
            <div class="mb-3">
                <h5>StyleGen Pampanga</h5>
                <p><strong>Telephone Number:</strong> (045) 963-6746</p>
                <p><strong>Address:</strong> Ground Level, Olongapo-Gapan Road, San Fernando, Pampanga</p>
                <p><strong>Store Hours:</strong> Mon - Sun: 10:00 AM - 9:00 PM</p>
            </div>
            <div class="mb-3">
                <h5>StyleGen Malolos</h5>
                <p><strong>Telephone Number:</strong> (044) 794-3701</p>
                <p><strong>Address:</strong> Second Level, MacArthur Highway, Sumapang Matanda, Malolos City, Bulacan</p>
                <p><strong>Store Hours:</strong></p>
                <ul>
                    <li>Mon - Thur: 10:00 AM - 9:00 PM</li>
                    <li>Fri - Sun: 10:00 AM - 10:00 PM</li>
                </ul>
            </div>
        </div>
    </div>
</div>


            <!-- Visayas Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingVisayas">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVisayas" aria-expanded="false" aria-controls="collapseVisayas">
                        Visayas Locations
                    </button>
                </h2>
                <div id="collapseVisayas" class="accordion-collapse collapse" aria-labelledby="headingVisayas" data-bs-parent="#storeLocator">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <h5>StyleGen Cebu</h5>
                            <p><strong>Telephone Number:</strong> (032) 232-0654</p>
                            <p><strong>Address:</strong> Second Level, Juan Luna Avenue Corner Streets, Mabolo, Cebu City</p>
                            <p><strong>Store Hours:</strong></p>
                            <ul>
                                <li>Mon - Thur & Sun: 10:00 AM - 9:00 PM</li>
                                <li>Fri - Sat: 10:00 AM - 10:00 PM</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h5>StyleGen Iloilo</h5>
                            <p><strong>Telephone Number:</strong> (033) 320-5497</p>
                            <p><strong>Address:</strong> Under Ground Level, Senator Benigno Aquino Jr. Avenue, Iloilo City</p>
                            <p><strong>Store Hours:</strong> Mon - Sun: 10:00 AM - 10:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mindanao Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingMindanao">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMindanao" aria-expanded="false" aria-controls="collapseMindanao">
                        Mindanao Locations
                    </button>
                </h2>
                <div id="collapseMindanao" class="accordion-collapse collapse" aria-labelledby="headingMindanao" data-bs-parent="#storeLocator">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <h5>StyleGen Davao</h5>
                            <p><strong>Telephone Number:</strong> (082) 299-1400</p>
                            <p><strong>Address:</strong> Ground Level, Quimpo Blvd Corner Tulip and Ecoland Drive, Davao City</p>
                            <p><strong>Store Hours:</strong></p>
                            <ul>
                                <li>Mon - Thur & Sun: 10:00 AM - 9:00 PM</li>
                                <li>Fri - Sat: 10:00 AM - 10:00 PM</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h5>StyleGen Bacolod</h5>
                            <p><strong>Telephone Number:</strong> (034) 458-3209</p>
                            <p><strong>Address:</strong> Second Level, Rizal Street, Reclamation Area, Bacolod, Negros Occidental</p>
                            <p><strong>Store Hours:</strong> Mon - Sun: 10:00 AM - 10:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    
  
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