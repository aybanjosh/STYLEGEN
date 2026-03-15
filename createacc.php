<?php
include "db.php"; // Include database connection
$message = "";
$fname = $lname = $email = ""; // Initialize variables for the form fields

if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $passwordError = "";

    // Password validation
    if (strlen($password) < 6) {
        $passwordError = "Password must be at least 6 characters";
    } elseif (!preg_match("/[A-Za-z]/", $password) || !preg_match("/[0-9]/", $password) || !preg_match("/[\W_]/", $password)) {
        $passwordError = "Your password needs to include letters, numbers, and special characters for security.";
    }

    // If no password error, proceed
    if (empty($passwordError)) {
        $checkEmailQuery = "SELECT * FROM tbl_sg WHERE email = '$email'";
        $result = mysqli_query($connection, $checkEmailQuery);

        if (mysqli_num_rows($result) > 0) {
            $message = "Account already exists with this email.";
        } else {
            $query = "INSERT INTO tbl_sg (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";

            if (mysqli_query($connection, $query)) {
                mysqli_close($connection);
                header('Location: login.php'); // Redirect to login page
                exit();
            } else {
                $message = "Error: " . mysqli_error($connection);
            }
        }
    } else {
        // Clear only the password
        $password = "";
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
    <title>Create Account - StyleGen Online Shop</title>
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
            background: url('createaccbg.png') no-repeat center center fixed; /* Full background image */
            background-size: cover; /* Ensure the image covers the entire screen */
            background-attachment: fixed; /* Keep the background fixed */
        }

        .login-form-container {
            background: transparent; /* Semi-transparent white background */
            border: 1px solid rgba(255, 255, 255, 0.3); /* Slightly more opaque white */
            border: 1px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(25px);
            border-radius: 15px;
            padding: 40px;
            background-size: cover;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            color: black;
            width: 100%;
            max-width:700px; /* Slightly larger width */
            margin: auto;
        }

        .login-form-container h4 {
            color: black;
            font-size: 24px; /* Larger font for the heading */
            margin-bottom: 20px;
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
            color: black;
            height: 50px;
            border-radius: 10px;
            font-weight: bold;
            margin-top: 20px;
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
            color: green;
            background-color: rgba(0, 255, 0, 0.1); /* Semi-transparent background */
            font-weight: bold;
            border-radius: 10px;
        }

        .container-fluid {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            padding-top: 40px;
        }
    </style>

</head>

<body>


<div class="container-fluid">
    <div class="col-md-4 col-sm-6">
        <div class="login-form-container">
            <h4 class="text-center"><b>CREATE ACCOUNT</b></h4>

            <?php if (isset($message)): ?>
                <div class="text-center text-danger">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form method="post" autocomplete="off">
    <!-- First Name -->
    <div class="form-group position-relative mb-3">
        <i class="fas fa-user"></i>
        <input type="text" class="form-control shadow-sm" id="fname" name="fname" placeholder="First Name" 
               value="<?php echo htmlspecialchars($fname); ?>" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');">
    </div>

    <!-- Last Name -->
    <div class="form-group position-relative mb-3">
        <i class="fas fa-user"></i>
        <input type="text" class="form-control shadow-sm" id="lname" name="lname" placeholder="Last Name" 
               value="<?php echo htmlspecialchars($lname); ?>" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');">
    </div>

    <!-- Email -->
    <div class="form-group position-relative mb-3">
        <i class="fas fa-envelope"></i>
        <input type="email" class="form-control shadow-sm" id="email" name="email" placeholder="Email" 
               autocomplete="new-password" value="<?php echo htmlspecialchars($email); ?>" required>
    </div>

    <!-- Password -->
    <div class="form-group position-relative mb-4">
        <i class="fas fa-lock"></i>
        <input type="password" class="form-control shadow-sm" id="password" name="password" placeholder="Password" 
               autocomplete="new-password" required>
    </div>

    <!-- Display password error -->
    <?php if (!empty($passwordError)) { ?>
        <div class="error-message" style="color: red; font-size: 14px;">
            <?php echo $passwordError; ?>
        </div>
    <?php } ?>

    <button type="submit" name="submit" class="btn-log w-100">Create Account</button>

    <div class="mt-3 text-center">
        <a href="login.php" class="text-decoration-none">
            <span style="color: black;">Already have an account? </span>
            <span style="color: #687B61; font-weight: bold;">Log In</span>
        </a>
    </div>
</form>


        </div>
    </div>
</div>

</body>
</html>
