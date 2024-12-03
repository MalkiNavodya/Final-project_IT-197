<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Blue Resident</title>
    <link rel="stylesheet" href="styles.css">
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
            background-image: url('images/home.jpg'); /* Set background image */
            background-size: cover;
            color: #333;
            line-height: 1.6;
            height: 100vh;
        }

        /* Header */
        header {
            background-color: rgba(52, 58, 64, 0.8);
            color: white;
            padding: 20px 0;
            text-align: center;
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header h1 {
            font-size: 2.5em;
        }

        /* Property Section */
        .property-header {
            display: flex;
            justify-content: space-between;
            padding: 40px 5%;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 60px;
        }

        .property-header .left {
            width: 50%;
        }

        .property-header .right {
            width: 45%;
            color: white;
        }

        .property-header .right p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .property-header .right h2 {
            font-size: 2.5em;
            color: #FF758C;
        }

        .property-header .right .price {
            color: #FF758C;
            font-size: 1.5em;
            margin: 10px 0;
        }

        .property-header img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Specifications Section */
        .specifications, .facilities, .gallery, .browse-more {
            background: rgba(255, 255, 255, 0.3);
            padding: 40px 5%;
            border-radius: 15px;
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            color: white;
        }

        h3 {
            color: #FF758C;
            margin-bottom: 20px;
        }

        .specifications p, .facilities p {
            font-size: 1.1em;
        }

        .gallery img {
            width: 32%;
            margin-right: 2%;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .gallery img:last-child {
            margin-right: 0;
        }

        /* Contact Form */
        .contact-form {
            display: flex;
            background-color: rgba(255, 255, 255, 0.3);
            padding: 40px 5%;
            border-radius: 15px;
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            color: white;
        }

        .contact-form .form-group {
            margin-right: 20px;
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.7);
        }

        .contact-form .form-button {
            background-color: #FF758C;
            color: white;
            border: none;
            padding: 15px 20px;
            font-size: 1.2em;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact-form .form-button:hover {
            background-color: #FF9B5F;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: rgba(52, 58, 64, 0.8);
            color: white;
            backdrop-filter: blur(10px);
        }

        footer p {
            font-size: 1.1em;
        }

        .property-item {
            width: 30%;
            margin: 1%;
            display: inline-block;
        }

        .property-item img {
            width: 100%;
            border-radius: 8px;
        }

        .property-item h4 {
            font-size: 1.5em;
            color: #FF758C;
            margin-top: 10px;
        }

        .property-item p {
            font-size: 1.1em;
            color: #555;
        }

        .property-item .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #FF758C;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .property-item .btn:hover {
            background-color: #FF9B5F;
        }

    </style>
</head>
<body>

<br><br><br>

<!-- Property Header Section -->
<div class="property-header">
    <div class="left">
        <img src="images/home5.jpg" alt="Property Image">
    </div>
    <div class="right">
        <h2>Royal Blue Resident</h2>
        <p>Explore our comprehensive listings of residential properties, from cozy starter homes to luxurious estates.</p>
        <div class="price">$250,000</div>
        <p>Property Agent: Mike Lewis</p>
        <p>Email: mike@realtyco.com</p>
        <p>Phone: (123) 456 789</p>
    </div>
</div>

<!-- Property Specification Section -->
<div class="specifications">
    <h3>Specifications</h3>
    <p><strong>Bedrooms:</strong> 3</p>
    <p><strong>Bathrooms:</strong> 2</p>
    <p><strong>Dimensions:</strong> 250m²</p>
    <p><strong>Garage:</strong> 3</p>
    <p><strong>Floor:</strong> 3</p>
    <p><strong>Ceiling:</strong> 4m</p>
</div>

<!-- Facilities Section -->
<div class="facilities">
    <h3>Facilities</h3>
    <p>Air Conditioning, Swimming Pool, Sauna, Gym, Local Park, Apple TV, Wireless, Garden, Mosque</p>
</div>

<!-- Photo Gallery Section -->
<div class="gallery">
    <h3>Photo Gallery</h3>
    <img src="images/home7.jpg" alt="Living Room">
    <img src="images/home8.jpg" alt="Kitchen">
    <img src="images/home5.jpg" alt="Bedroom">
</div>

<!-- Browse More Properties -->
<div class="browse-more">
    <h3>Browse More</h3>
    <div class="property-item">
        <img src="images/home2.jpg" alt="Metro House">
        <h4>Metro House</h4>
        <p>$250,000 | 4 Bedrooms | 2 Bathrooms</p>
        <a href="#" class="btn">Read More</a>
    </div>
    <div class="property-item">
        <img src="images/home2.jpg" alt="Avenue Regency">
        <h4>Avenue Regency</h4>
        <p>$450,000 | 4 Bedrooms | 2 Bathrooms</p>
        <a href="#" class="btn">Read More</a>
    </div>
    <div class="property-item">
        <img src="images/home2.jpg" alt="New Central Park">
        <h4>New Central Park</h4>
        <p>$700,000 | 4 Bedrooms | 2 Bathrooms</p>
        <a href="#" class="btn">Read More</a>
    </div>
</div>

<!-- Contact Form -->
<div class="contact-form">
    <div class="form-group">
        <input type="text" placeholder="Your Name">
    </div>
    <div class="form-group">
        <input type="email" placeholder="Your Email">
    </div>
    <div class="form-group">
        <input type="text" placeholder="Your Phone Number">
    </div>
    <div class="form-group">
        <textarea placeholder="Your Message"></textarea>
    </div>
    <button class="form-button">Send Message</button>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2024 Realty. All Rights Reserved.</p>
</footer>

</body>
</html>
