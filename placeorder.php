<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Place Your Order</h1>
        <p class="text-center">This page will process your order and display a confirmation message.</p>
        <button class="btn btn-primary" onclick="goBack()">Go Back to Cart</button>
    </div>

    <script>
        function goBack() {
            window.location.href = 'cart.php';
        }
    </script>
</body>
</html>
