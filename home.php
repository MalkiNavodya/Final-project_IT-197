<?php
// Include the database connection
include('lib/functions/db_connection.php');

// Initialize variables
$error_msg = "";
$success_msg = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if email exists in the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // If email exists, proceed with password reset
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Generate a unique token for password reset
        $token = bin2hex(random_bytes(50));
        
        // Insert token into the database
        $expiry_time = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token expiry time (1 hour)
        $token_sql = "INSERT INTO password_resets (email, token, expiry_time) VALUES ('$email', '$token', '$expiry_time')";
        
        if (mysqli_query($conn, $token_sql)) {
            // Send password reset email
            $reset_link = "http://yourdomain.com/reset-password.php?token=$token";
            $subject = "Password Reset Request";
            $message = "Hello, \n\nPlease click the link below to reset your password:\n$reset_link\n\nIf you did not request this, please ignore this email.";
            $headers = "From: no-reply@yourdomain.com";

            if (mail($email, $subject, $message, $headers)) {
                $success_msg = "A password reset link has been sent to your email address.";
            } else {
                $error_msg = "Failed to send the reset email. Please try again.";
            }
        } else {
            $error_msg = "Error in generating password reset token. Please try again.";
        }
    } else {
        $error_msg = "No account found with that email address.";
    }

    // Close the connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Linking the New CSS -->
</head>
<body class="forgot-password-body">
    <div class="forgot-password-container">
        <h2>Forgot Your Password?</h2>
        
        <!-- Display error or success message -->
        <?php if ($error_msg) { echo "<div class='error'>$error_msg</div>"; } ?>
        <?php if ($success_msg) { echo "<div class='success'>$success_msg</div>"; } ?>

        <!-- Forgot Password Form -->
        <form action="forgot-password.php" method="POST">
            <label for="email">Enter your email address</label>
            <input type="email" id="email" name="email" placeholder="Email address" required>

            <button type="submit" class="reset-btn">Send Reset Link</button>
        </form>

        <p>Remember your password? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>

<?php
// Include the database connection
include('lib/functions/db_connection.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Prepare the SQL query to check the email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // If user exists
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Start session and store user info
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Ensure no session or redirect issues before redirecting
            header("Location: ../../home.php"); // Redirect to home.php after successful login
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with this email.";
    }

    // Close the connection
    mysqli_close($conn);
}
?>

