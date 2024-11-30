<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Linking the CSS -->

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
        <br>

        <!-- Forgot Password and Connect Section -->
        <p class="forgot-password">
            <button><a href="forgot_password.php">Forgot your password?</a></button>
        </p><br>
        <hr>
        <p>or connect with:</p>

        <!-- Google Sign-In Button -->
        <button class="social-btn">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4f/Google_2015_logo.svg" alt="Google Logo">
        Continue with Google
        </button>

        <!-- Facebook Sign-In Button -->
        <button class="social-btn">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook Logo">
            Continue with Facebook
        </button>
    </div>
</body>
</html>
