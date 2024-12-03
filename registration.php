<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Nestly</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to CSS -->
    <style>
        body {
            background: url('images/home.jpg') no-repeat center center fixed; /* Add background image */
            background-size: cover; /* Ensure the image covers the entire screen */
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        

    </style>
</head>
<body>
    <div class="container">
        <div class="signup-container">
            <!-- Header Section -->
            <div class="signup-header">
                <h2>Welcome to <span>Nestly</span></h2>
                <p>Create a New Account</p>
            </div>

            <!-- Registration Form -->
            <form action="lib/functions/registration_submit.php" method="POST">
                <label for="username">User Name</label>
                <input type="text" id="username" name="username" placeholder="Enter your name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>

                <!-- Role selection (Admin, Agent, User) -->
                <label for="role">Select Role</label>
                <select name="role" required>
                    <option value="user">User</option>
                    <option value="agent">Agent</option>
                    <option value="admin">Admin</option>
                </select>

                <!-- Form Buttons -->
                <div class="form-buttons">
                    <button type="reset" class="btn-clear">Clear</button>
                    <button type="submit" class="btn-submit">Submit</button>
                </div>
            </form>

            <!-- Display error message if any -->
            <?php
            session_start();
            if (isset($_SESSION['register_error'])) {
                echo "<div class='error-message'>" . $_SESSION['register_error'] . "</div>";
                unset($_SESSION['register_error']);
            }
            ?>

            <!-- Link Back to Home -->
            <div class="link-to-home">
                <p>Already have an account? <a href="login.php">Go to Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>
