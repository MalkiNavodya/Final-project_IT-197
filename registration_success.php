<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: url('images/home.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
            overflow: hidden;
        }

        /* Glassmorphism Container */
        .success-container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 40px;
            width: 90%;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .success-container h1 {
            font-size: 2.5em;
            color: #4caf50;
            margin-bottom: 20px;
        }

        .success-container p {
            font-size: 1.2em;
            color: #fff;
            margin-bottom: 30px;
        }

        .success-container .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1.2em;
            color: #fff;
            background-color: #4caf50;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        .success-container .btn:hover {
            background-color: #45a049;
        }

        .success-container .btn-secondary {
            background-color: #FF758C;
            margin-left: 10px;
        }

        .success-container .btn-secondary:hover {
            background-color: #FF9B5F;
        }

        /* Success Icon */
        .success-icon {
            font-size: 4em;
            color: #4caf50;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <!-- Success Icon -->
        <div class="success-icon">✔️</div>
        
        <!-- Title -->
        <h1>Registration Successful</h1>
        
        <!-- Message -->
        <p>Thank you for registering! Your account has been successfully created. You can now log in to access your dashboard.</p>
        
        <!-- Buttons -->
        <a href="login.php" class="btn">Log In</a>
        <a href="index.php" class="btn btn-secondary">Back to Home</a>
        <a href="transaction.php" class="btn btn-secondary">transer</a>
        

    </div>
</body>
</html>
