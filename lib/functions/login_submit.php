<?php
// Start session
session_start();

// Include the database connection
include('../../lib/functions/db_connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Prepare the SQL query to check the email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // If the user exists
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Store user info in session variables
            $_SESSION['user_id'] = $user['user_id']; // Assuming the ID column is user_id
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Store the user's role

            // Redirect to the appropriate dashboard based on the role
            if ($user['role'] == 'admin') {
                // Redirect to Admin dashboard
                header("Location: ../../lib/views/dashboard/admin.php");
            } elseif ($user['role'] == 'agent') {
                // Redirect to Agent dashboard
                header("Location: ../../lib/views/dashboard/agent.php");
            } else {
                // Redirect to User dashboard
                header("Location: ../../home.php");
            }
            exit();
        } else {
            // Invalid password
            $_SESSION['login_error'] = "Invalid password!";
            header("Location: ../../login.php");
            exit();
        }
    } else {
        // No user found with this email
        $_SESSION['login_error'] = "No user found with this email.";
        header("Location: ../../login.php");
        exit();
    }

    // Close the connection
    mysqli_close($conn);
}
?>
