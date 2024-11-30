<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate form data
    if ($password !== $confirm_password) {
        echo "<h3 style='color:red;'>Passwords do not match. Please try again.</h3>";
        echo "<a href='../registration.php'>Go back to Registration Page</a>";
        exit;
    }

    // Mock response (in real cases, insert data into the database)
    echo "<h3 style='color:green;'>Account successfully created for $username!</h3>";
    echo "<a href='../index.php'>Go to Home Page</a>";
} else {
    echo "<h3 style='color:red;'>Invalid request.</h3>";
    echo "<a href='../registration.php'>Go back to Registration Page</a>";
}
?>
