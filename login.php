<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Linking the CSS -->
    <style>
     body{
        background: url('images/home.jpg') no-repeat center center fixed; /* Add background image */
        background-size: cover; /* Ensure the image covers the entire screen */
     }

     .error-message {
        color: red;
        font-size: 14px;
        margin-top: 10px;
     }

     .signin-container {
             backdrop-filter: blur(100px); /* Frosted glass effect */
   
     }

    </style>
</head>
<body>
    <div class="signin-container">
        <h1>Welcome to <span class="logo">Nestly</span></h1>
        <h2>Sign In</h2>
        
        <!-- Login Form -->
        <form action="lib/functions/login_submit.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="signin-btn">Sign In</button>
        </form>

        <!-- Display Error Message -->
        <?php
        session_start();
        if (isset($_SESSION['login_error'])) {
            echo "<div class='error-message'>" . $_SESSION['login_error'] . "</div>";
            unset($_SESSION['login_error']);
        }
        ?>

        <!-- Forgot Password and Connect Section -->
        <p class="forgot-password">
            <button><a href="forgot_password.php">Forgot your password?</a></button>
        </p>
        <hr>
        <p>or connect with:</p>

        <!-- Google Sign-In Button -->
        <button class="social-btn">
            <img src="https://www.gstatic.com/images/branding/product/1x/gsa_64dp.png" alt="Google Logo" class="social-icon">
            Continue with Google
        </button>

        <!-- Facebook Sign-In Button -->
        <button class="social-btn">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook Logo">
            Continue with Facebook
        </button>

        <div class="link-to-home">
            <a href="index.php">Go to Home Page</a><!-- Link to Home Page -->
        </div>
    </div>
</body>
</html>
