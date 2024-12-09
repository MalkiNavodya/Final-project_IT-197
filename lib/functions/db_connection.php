<?php

// Database connection settings
$host = 'localhost';           // Database server
$dbname = 'RealEstateDB';      // Database name
$username = 'root';            // Database username
$password = '';                // Database password (empty for local servers like XAMPP)

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
