<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glassmorphism Nav Bar</title>
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background: url('images/home.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background: linear-gradient(135deg, #FF758C, #FF7B76, #FF9B5F, #FF9473, #FCE3DB);
            background-size: 200% 200%;
            animation: gradient-animation 5s ease infinite;
            backdrop-filter: blur(10px); /* Frosted glass effect */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5); /* Stronger shadow for depth */
            border-radius: 15px;
            position: fixed; /* Fix the navbar to the top */
            top: 0; /* Align it to the top */
            width: 100%; /* Ensure it spans the entire width */
            z-index: 1000; /* Ensure it stays above other elements */
        }

        @keyframes gradient-animation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-container img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .logo-container .logo-text {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.7);
        }

        .nav-links {
            display: flex;
            gap: 20px;
            list-style: none;
            margin: 0 auto;
            padding: 0;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s ease, transform 0.2s ease;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.7);
        }

        .nav-links a:hover {
            color: #FFE6D8;
            transform: scale(1.1);
        }

        .right-section {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .right-section img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid white;
            cursor: pointer;
        }

        .right-section a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s ease, transform 0.2s ease;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.7);
        }

        .right-section a:hover {
            color: #FFE6D8;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo-container">
            <img src="../../../images/logo.png" alt="Website Logo">
            <a href="#" class="logo-text">Nestly</a>
        </div>
        <ul class="nav-links">
            <li><a href="../../../home.php">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="../../../property.php">Property</a></li>
            <li><a href="#">Agent</a></li>
            <li><a href="#">Map</a></li>
        </ul>
        <div class="right-section">
            <a href="../../../registration.php">Register</a>
            <a href="../../../login.php">Login</a>
            <img src="https://via.placeholder.com/150" alt="Profile Icon">




        </div>
    </nav>
</body>
</html>

<?php if (isset($_SESSION['admin_logged_in'])): ?>
    <li><a href="lib/views/dashboard/admin.php">Admin Dashboard</a></li>
<?php endif; ?>
