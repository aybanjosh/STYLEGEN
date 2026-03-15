<?php
$host = 'localhost'; // Your database host
$username = 'root'; // Your database username
$password = ''; // Your database password
$database = 'Database'; // Your database name

// Create a connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optionally set the character set to UTF-8 for proper encoding of special characters
mysqli_set_charset($connection, "utf8");

?>
