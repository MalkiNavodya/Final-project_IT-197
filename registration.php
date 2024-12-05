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

        /* Glassmorphism Container */
        .signup-container {
            backdrop-filter: blur(90px); /* Frosted glass effect */
            padding: 20px;
            border-radius: 10px;
        }

        .error-message {
            color: #E72D30;
            font-size: 14px;
            margin-top: 10px;
        }

        /* Hidden role selection elements */
        .role-container {
            display: none;
            margin-top: 10px;
        }

        .form-buttons {
            margin-top: 20px;
        }

        .btn-select-role {
            background-color: #5EB934;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .btn-select-role:hover {
            background-color: #50E400;
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

                <!-- Hidden Role Selection -->
                <div>
                    <button type="button" id="select-role-button" class="btn-select-role">Select Role</button>
                </div>
                <div class="role-container" id="role-container">
                    <label for="role">Choose Role</label>
                    <select name="role" id="role" required>
                        <option value="user">User</option>
                        <option value="agent">Agent</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

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
                <p> <a href="login.php">Back to home</a></p>
            </div>
        </div>
    </div>

    <!-- JavaScript for Role Selection -->
    <script>
        const selectRoleButton = document.getElementById('select-role-button');
        const roleContainer = document.getElementById('role-container');

        selectRoleButton.addEventListener('click', () => {
            roleContainer.style.display = 'block'; // Show the role selection dropdown
        });
    </script>
</body>
</html>
