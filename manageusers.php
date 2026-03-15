<?php
session_start();
include('db.php');

// Check if user is admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: login.php');
    exit();
}

// Fetch users from the database
$query = "SELECT user_id, fname, lname, email, role FROM tbl_sg WHERE role = 'user'";
$result = mysqli_query($connection, $query);

// Check if delete user is requested
if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];

    // Prepare and execute the delete query
    $delete_query = "DELETE FROM tbl_sg WHERE user_id = ?";
    $stmt = $connection->prepare($delete_query);
    $stmt->bind_param("i", $user_id);
    
    if ($stmt->execute()) {
        // Redirect after deleting the user
        header('Location: manageusers.php');
        exit();
    } else {
        echo "Error deleting user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="sgenlogo.png" type="image/x-icon">
    <title>Manage Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .back-btn {
            background-color: #F8D0C8; /* Back button color */
            color: black;
        }
        .back-btn:hover {
            background-color: #f5b8bc;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <h1 class="text-center">Manage Users</h1>

        <!-- Back Button (goes to the Dashboard or another page) -->
        <a href="dashboard.php" class="btn back-btn mb-3">Back to Dashboard</a>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $user['user_id']; ?></td>
                        <td><?php echo $user['fname']; ?></td>
                        <td><?php echo $user['lname']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['role']; ?></td>
                        <td>
                           
                            <!-- Delete Button with confirmation -->
                            <a href="manageusers.php?delete=<?php echo $user['user_id']; ?>" class="btn btn-danger" 
                               onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
