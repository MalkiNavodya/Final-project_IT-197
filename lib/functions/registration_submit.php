<?php
session_start();
include('../../lib/functions/db_connection.php'); // Database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        $_SESSION['register_error'] = "Passwords do not match.";
        header("Location: ../../registration.php");
        exit();
    }

    // Check if email is already registered
    $email_check_query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $email_check_query);
    
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['register_error'] = "Email is already registered.";
        header("Location: ../../registration.php");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database with the selected role
    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', '$role')";
    
    if (mysqli_query($conn, $query)) {
        // Registration successful, login the user automatically
        $_SESSION['user_id'] = mysqli_insert_id($conn); // Get the user ID of the inserted record
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role; // Store the role

        // Redirect user to the appropriate dashboard based on role
        if ($role == 'admin') {
            // Admin dashboard
            header("Location: ../../registration_success.php");
        } elseif ($role == 'agent') {
            // Agent dashboard
            header("Location: ../../registration_success.php");
        } else {
            // Regular user dashboard
            header("Location: ../../registration_success.php");
        }
        exit();
    } else {
        // Registration failed
        $_SESSION['register_error'] = "Registration failed. Please try again.";
        header("Location: ../../registration.php");
        exit();
    }
}
?>
