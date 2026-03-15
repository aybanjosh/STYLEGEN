<?php
session_start();

// Example for setting dummy user_id and product_id. You can modify these based on your needs.
$user_id = $_SESSION['user_id'] ?? 1; // Default to 1 if no user ID in session
$product_id = $_GET['product_id'] ?? null; // Get product_id from URL

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = $_POST['rating'] ?? null;

    // Validate inputs
    if (!$rating || !$product_id) {
        echo "<script>window.history.back();</script>";
        exit();
    }

    // Since we're not saving to the database, we don't need to process the form further
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .rate-container {
            max-width: 500px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .rate-header {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
        .star-rating {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .star-rating i {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
            margin: 0 5px;
        }
        .star-rating i.active {
            color: #ffc107;
        }
        .thank-you-message {
            display: none;
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            color: #28a745;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="rate-container">
        <div class="rate-header">Rate Your Order</div>

        <form method="POST" enctype="multipart/form-data">
            <!-- Star Rating -->
            <div class="star-rating">
                <input type="hidden" name="rating" id="rating" required>
                <i class="fa fa-star" data-value="1"></i>
                <i class="fa fa-star" data-value="2"></i>
                <i class="fa fa-star" data-value="3"></i>
                <i class="fa fa-star" data-value="4"></i>
                <i class="fa fa-star" data-value="5"></i>
            </div>
        </form>

        <!-- Thank You Message -->
        <div class="thank-you-message" id="thankYouMessage">
            Thank you for your rating!
        </div>
    </div>

    <!-- Custom Confetti Script -->
    <script>
        'use strict';
        const stars = document.querySelectorAll('.star-rating i');
        const ratingInput = document.getElementById('rating');
        const thankYouMessage = document.getElementById('thankYouMessage');

        // Custom Confetti Function
        function poof() {
            const particles = 10;
            const spread = 40;
            for (let i = 0; i < particles; i++) {
                const confetti = document.createElement('div');
                confetti.style.position = 'absolute';
                confetti.style.background = `hsl(${Math.random() * 360}, 100%, 50%)`;
                confetti.style.width = `${Math.random() * 10 + 5}px`;
                confetti.style.height = `${Math.random() * 10 + 5}px`;
                confetti.style.top = `${Math.random() * window.innerHeight}px`;
                confetti.style.left = `${Math.random() * window.innerWidth}px`;
                confetti.style.borderRadius = '50%';
                confetti.style.animation = 'fall 2s ease-out forwards';
                document.body.appendChild(confetti);
                setTimeout(() => confetti.remove(), 2000);
            }
        }

        // Star Click Listener
        stars.forEach(star => {
            star.addEventListener('click', function () {
                const rating = this.getAttribute('data-value');
                ratingInput.value = rating;

                // Highlight stars up to the selected one
                stars.forEach(s => {
                    s.classList.remove('active');
                    if (s.getAttribute('data-value') <= rating) {
                        s.classList.add('active');
                    }
                });

                // Trigger custom confetti animation
                poof();

                // Show the "Thank you" message
                thankYouMessage.style.display = 'block';

                // Redirect to firstpage.php after 5 seconds
                setTimeout(() => {
                    window.location.href = 'firstpage.php';
                }, 5000);
            });
        });
    </script>
</body>
</html>
