<?php
session_start();
include('db.php');

$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';

unset($_SESSION['error_message']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $admin_email = 'admin@stylegen.ph'; 
    $admin_password = 'admin123'; 

    if ($email === $admin_email && $password === $admin_password) {
        $_SESSION['user_id'] = 0;  
        $_SESSION['email'] = $email;
        $_SESSION['is_admin'] = true;  
        $_SESSION['fname'] = 'Admin';  
        $_SESSION['lname'] = 'Admin';  

        ob_end_clean();  
        header('Location: dashboard.php'); 
        exit();
    }

    $query = "SELECT user_id, fname, lname, email FROM tbl_sg WHERE email = ? AND password = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['user_id'];  
        $_SESSION['email'] = $user['email'];
        $_SESSION['fname'] = $user['fname'];
        $_SESSION['lname'] = $user['lname'];
        $_SESSION['is_admin'] = false; 

        ob_end_clean(); 
        header('Location: myacc.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Invalid email or password.";
        ob_end_clean();  
        header("Location: login.php"); 
        exit();
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
    <title>Login - StyleGen Online Shop</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJt3W6F1z6lEcxv6FqBFjDaOq7lPz0DCbsTwLMt2cTKQs5fZfvJl5TXzjlZZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB1R7jyyQEx06nEu1nQx6p5W3r4cvr6DczjFuZ4cym93yXpV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0O5l/xoO3gUbgzT+2tWfrhEdhCH1niJ13HVs1cz9W9fReT1P" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Poppins;
            background: url('loginbg.png') no-repeat center center fixed; /* Full background image */
            background-size: cover; /* Ensure the image covers the entire screen */
            background-attachment: fixed; /* Keep the background fixed */
        }

        .login-form-container {
            background: transparent; /* Semi-transparent white background */
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(25px);
            background-size: cover;
            background-position: center;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            color: black;
        }

        .login-form-container h4 {
            color: black;
        }

        .form-control {
            background: transparent;
            border: 1px solid rgba(0, 0, 0, 0.3);
            color: black;
            height: 50px;
            border-radius: 10px;
            padding-left: 45px;
        }

        .form-control:focus {
            background: transparent;
            color: black;
            border: 1px solid rgba(0, 0, 0, 0.6);
            box-shadow: none;
        }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(0, 0, 0, 0.6);
        }

        .btn-log {
            background-color: #B0C6B5;
            color: #F8D0C8;
            height: 50px;
            border-radius: 10px;
            font-weight: bold;
        }

        .btn-log:hover {
            background-color: #F8D0C8;
            color: white;
            border: 1px solid black;
        }

        .text-decoration-none:hover {
            color: black;
            text-decoration: underline;
        }

        /* Transparent Alert Styling */
        .alert {
            text-align: center;
            color: #FF7F7F; /* Green color for the alert */
            font-weight: bold;
            border-radius: 5px;
        }
    </style>

</head>
<body>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center" style="font-family: 'Poppins', sans-serif; padding-top: 100px;">
        <div class="col-md-4 col-sm-6">
            <div class="login-form-container">
                <h4 class="text-center mb-4"><b>LOGIN<b></h4>

                <!-- Display Error Message -->
                <?php if (!empty($error_message)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>

                <form method="post" autocomplete="off">
                    <div class="form-group position-relative mb-3">
                        <i class="fas fa-envelope"></i>
                        <input type="" class="form-control shadow-sm" id="email" name="email" placeholder="Email" required autocomplete="off">
                    </div>

                    <div class="form-group position-relative mb-4">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control shadow-sm" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                    </div>

                    <button type="submit" name="login" class="btn-log w-100">Sign In</button>

                    <div class="mt-3 text-center">
                        <a href="createacc.php" class="text-decoration-none" style="color: #687B61;">Create Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
