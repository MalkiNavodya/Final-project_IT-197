<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Nestly</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to CSS -->
</head>
<body>
    <div class="signup-container">
        <!-- Header Section -->
        <div class="signup-header">
            <h2>Welcome to <span>Nestly</span></h2>
            <p>Create a New Account</p>
        </div>

        <!-- Registration Form -->
        <form action="functions/signup.php" method="POST">
            <label for="username">User Name</label>
            <input type="text" id="username" name="username" placeholder="Enter your name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>

            <!-- Form Buttons -->
            <div class="form-buttons">
                <button type="submit" class="btn-submit">Submit</button>
                <button type="reset" class="btn-clear">Clear</button>
            </div>
        </form>

        <!-- Link Back to Home -->
        <div class="link-to-home">
            <p>Already have an account? <a href="index.php">Go to Home Page</a></p> <!-- Link to Home Page -->
        </div>
    </div>
</body>
</html>
