<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Nestly</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Add font imports -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style> /* General body styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('images/home.jpg'); /* Set background image */
            background-size: cover; /* Make sure the image covers the entire background */
            background-position: center center; /* Center the image */
            color: #FFFFFF; /* White text for contrast */
            overflow: hidden; /* Ensure content stays within bounds */
        }

        /* Welcome container with Glassmorphism and Animation */
        .welcome-container {
            text-align: center;
            padding: 30px;  /* Padding for smaller frame */
            backdrop-filter: blur(12px); /* Apply less blur for a subtler glass effect */
            background: rgba(255, 255, 255, 0.1); /* Slightly more transparent for glass effect */
            border-radius: 20px; /* Smaller rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); /* Softer shadow for more depth */
            max-width: 600px; /* Reduced width for a smaller container */
            width: 100%;
            opacity: 0;
            animation: fadeIn 1s forwards; /* Fade-in animation */
            transition: transform 0.3s ease;
        }

        .welcome-container:hover {
            transform: scale(1.05); /* Slight zoom effect on hover */
        }

        /* Animation for fade-in */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Logo styling */
        .welcome-logo {
            margin-bottom: 20px;
            background-color: white; /* White background for logo */
            border-radius: 50%; /* Circular design */
            padding: 10px;
            display: inline-block;
        }

        .welcome-logo img {
            width: 90px; /* Set the logo size */
            height: 90px;
            object-fit: contain; /* Ensure logo fits within circle */
            border-radius: 50%; /* Circular design */
            border: none; /* Remove border */
        }

        /* Main heading styling */
        .welcome-heading {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.8em; /* Smaller font size */
            font-weight: bold;
            margin-bottom: 15px;
            color: #FFFFFF;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3); /* Add text shadow for better contrast */
            animation: fadeInHeading 2s ease-in-out, slideIn 1s ease-out 0.5s; /* Added slide-in animation */
        }

        /* Animation for heading fade-in and slide-in */
        @keyframes fadeInHeading {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateX(-30px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Subheading styling */
        .welcome-subheading {
            font-family: 'Roboto', sans-serif;
            font-size: 1.3em; /* Smaller font size */
            font-weight: 300;
            margin-bottom: 30px; /* Reduced margin */
            color: #FCE3DB;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }

        /* Action buttons section */
        .welcome-actions {
            display: flex;
            flex-direction: column;
            gap: 15px; /* Reduced gap between buttons */
        }

        /* General button styling */
        .btn {
            padding: 15px; /* Reduced padding */
            border: none;
            border-radius: 50px;
            font-size: 1.2em; /* Smaller font size */
            cursor: pointer;
            width: 100%;
            max-width: 350px; /* Reduced max-width */
            margin: 0 auto;
            font-family: 'Roboto', sans-serif;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: bounce 1s infinite alternate; /* Bounce animation for the buttons */
        }

        /* Bounce animation for buttons */
        @keyframes bounce {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-10px);
            }
        }

        .btn-primary {
            background: linear-gradient(135deg, #5EB934, #50E400, #A2FAA2, #77E29B);
            color: white;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #77E29B, #A2FAA2, #50E400, #5EB934);
            transform: translateY(-4px); /* Lift effect */
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
        }

        .btn-secondary {
            background: transparent;
            border: 2px solid #FFFFFF;
            color: #FFFFFF;
            transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .btn-secondary:hover {
            background: #FFFFFF;
            color: #FF7B76;
            transform: translateY(-4px); /* Lift effect */
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .welcome-container {
                padding: 25px; /* Reduced padding on mobile */
                max-width: 85%;
            }

            .welcome-heading {
                font-size: 2.4em; /* Smaller font on mobile */
            }

            .welcome-subheading {
                font-size: 1.1em; /* Smaller font on mobile */
            }

            .btn {
                max-width: 100%;
            }
        }</style>
</head>
<body>
    <div class="welcome-container">
        <!-- Logo section -->
        <div class="welcome-logo">
            <img src="images/logo.png" alt="Nestly Logo">
        </div>

        <!-- Heading -->
        <h1 class="welcome-heading">Welcome to Nestly</h1>
        <p class="welcome-subheading">Your trusted partner for real estate listings and property management.</p>

        <!-- Action Buttons -->
        <div class="welcome-actions">
            <a href="login.php"><button class="btn btn-primary">Log In</button></a>
            <a href="registration.php"><button class="btn btn-secondary">Sign Up</button></a>
        </div>
    </div>
</body>
</html>
