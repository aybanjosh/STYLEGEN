<?php
session_start();
include('db.php');

// Check if user is admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: login.php');
    exit();
}

// This page can have various settings, like site-wide configurations.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <title>Settings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for centering the title */
        .page-title {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <!-- Centered Title -->
        <h1 class="page-title">Settings</h1>

        <a href="dashboard.php" class="btn btn-secondary mb-3">Back to Dashboard</a>

        <form method="POST">
            <!-- Example Settings -->
            <div class="form-group">
                <label for="site_name">Site Name</label>
                <input type="text" class="form-control" id="site_name" name="site_name" value="Stylegen Online Shop" required>
            </div>
            <div class="form-group">
                <label for="site_email">Site Email</label>
                <input type="email" class="form-control" id="site_email" name="site_email" value="admin@example.com" required>
            </div>
        </form>
    </div>
</body>
</html>
