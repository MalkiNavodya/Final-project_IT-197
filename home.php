<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Nestly - Real Estate</title> 
    <?php include 'navbar.php'; ?>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #FF758C, #FF9B5F);
            background-image: url('images/home.jpg'); /* Set background image */
            color: #333;
            overflow-x: hidden;
            
        }

        /* Glassmorphism Effect */
        .glass {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            
        }

        /* Header */
        header {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 117, 140, 0.8);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        header .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }

        /* Hero Section */
.hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 50px;
    min-height: 80vh;
    color: #fff;
    backdrop-filter: blur(15px); /* Adds blur for glassmorphism */
    background: rgba(255, 255, 255, 0.2); /* Transparent white background */
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
    border: 1px solid rgba(255, 255, 255, 0.3); /* Light border */
    border-radius: 20px; /* Rounded corners */
    margin: 20px auto; /* Adds spacing around the section */
    max-width: 90%; /* Keeps the hero section centered */
    
}

/* Hero Text Styling */
.hero-text {
    max-width: 50%;
    z-index: 10; /* Ensures text appears above any background elements */
}

.hero h1 {
    font-size: 48px;
    line-height: 1.2;
    color: #fff; /* Keeps text visible on the glass background */
}

.hero p {
    margin: 20px 0;
    font-size: 18px;
    line-height: 1.6;
    color: #fff;
}

/* Hero Image Styling */
.hero img {
    position: absolute; /* Position the image relative to the hero section */
    top: 0;
    right: 0;
    width: 30%; /* Set the width to 50% of the parent (hero section) */
    height: 100%; /* Make the height cover the full height of the hero section */
    object-fit: cover; /* Ensures the image covers the space without distorting */
    border-radius: 15px; /* Rounds the corners of the image */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Depth effect for the image */
    z-index: 1; /* Ensures image appears above the background blur */
}

/* Cards Section */
.property-section {
    padding: 50px;
    background: rgba(255, 255, 255, 0.1); /* Slightly transparent section */
    backdrop-filter: blur(15px);
    margin: 20px auto;
    max-width: 90%;
    border-radius: 20px;
}

.property-section h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 36px;
    color: #FF758C;
}

.property-cards {
    display: flex;
    gap: 30px;
    justify-content: center;
    flex-wrap: wrap;
}

/* Glassmorphism Effect for Property Cards */
.property-card {
    flex: 1;
    max-width: 300px;
    text-align: center;
    border-radius: 15px;
    backdrop-filter: blur(20px); /* Increases blur for glass effect */
    background: rgba(255, 255, 255, 0.3); /* Transparent white background */
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2); /* Soft shadow for depth */
    border: 1px solid rgba(255, 255, 255, 0.3); /* Light border */
    transition: transform 0.3s, box-shadow 0.3s;
    overflow: hidden;
    position: relative;
}

.property-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 35px rgba(0, 0, 0, 0.3); /* Slightly stronger shadow on hover */
}

.property-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 15px 15px 0 0; /* Rounds the top corners of the image */
}

.property-card h3 {
    font-size: 20px;
    color: #FF758C;
    margin: 15px 0 10px;
}

.property-section  h2{
    color:white;
}

.property-card p {
    color: #555;
    margin: 10px 0;
}

.property-card .btn {
    display: inline-block;
    margin: 15px 0;
    padding: 10px 20px;
    font-size: 16px;
    background: #FF9B5F;
    color: white;
    text-decoration: none;
    border-radius: 10px;
    transition: background-color 0.3s ease;
}

.property-card .btn:hover {
    background: #FF7B76;
}

/* Animation */
.property-card {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.6s ease-in-out forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

        /* Footer */
        footer {
            padding: 20px 50px;
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            color: #FF758C;
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body>

<br><br><br>
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-text">
            <h1>Find A House That Suits You</h1>
            <p>We are here to help you find the home that matches your lifestyle and needs.</p>
        </div>
        <img src="images/home7.jpg" alt="Hero Image">
    </div>

    
    <!-- Cards Section -->
    <div class="property-section">
    <h2>How Can We Help You?</h2>
    <div class="property-cards">
        <div class="property-card glass">
            <img src="images/home1.jpg" alt="Sell a Home">
            <h3>Sell a Home</h3>
            <p>Let us help you find the best buyers for your property.</p>
            <a href="#" class="btn">Get Started</a>
        </div>
        <div class="property-card glass">
            <img src="images/home2.jpg" alt="Buy a Home">
            <h3>Buy a Home</h3>
            <p>Find the perfect home that matches your lifestyle.</p>
            <a href="#" class="btn">Explore Now</a>
        </div>
        <div class="property-card glass">
            <img src="images/home4.jpg" alt="Rent a Home">
            <h3>Rent a Home</h3>
            <p>Explore beautiful properties available for rent.</p>
            <a href="#" class="btn">View Listings</a>
        </div>
    </div>
</div>


    <!-- Footer -->
    <footer>
        &copy; 2024 La Maison. All Rights Reserved.
    </footer>

</body>
</html>

    