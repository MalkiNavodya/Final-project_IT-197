<?php
require 'lib/functions/get_property.php';

// Get property ID from query string
$property_id = $_GET['id'] ?? null;

if (!$property_id) {
    die("Property ID is required.");
}

// Fetch property details
$property = getPropertyById($property_id);

if (!$property) {
    die("Property not found.");
}

// Map property IDs to static images (fallback to placeholder if no image)
$image_paths = [
    1 => ['images/property_1.jpg', 'images/room.jpg', 'images/bath.jpg'],
    2 => ['images/property_2.jpg', 'images/property2_2.jpg', 'images/property2_3.jpg'],
    3 => ['images/property_3.jpg', 'images/property3_2.jpg', 'images/property3_3.jpg'],
    4 => ['images/property_4.jpg', 'images/property4_2.jpg', 'images/property4_3.jpg'], 
    5 => ['images/property_5.jpg', 'images/property5_2.jpg', 'images/property5_3.jpg'],
    6 => ['images/property_6.jpg', 'images/property6_2.jpg', 'images/property6_3.jpg'],
    7 => ['images/property_7.jpg', 'images/property7_2.jpg', 'images/property7_3.jpg'],
    8 => ['images/property_8.jpg', 'images/property8_2.jpg', 'images/property8_3.jpg'],
    9 => ['images/property_9.jpg', 'images/property9_2.jpg', 'images/property9_3.jpg'],
    10 => ['images/property_10.jpg', 'images/property10_2.jpg', 'images/property10_3.jpg'],
    11 => ['images/property_21.jpg', 'images/property11_2.jpg', 'images/property11_3.jpg'],
    12 => ['images/property_22.jpg', 'images/property12_2.jpg', 'images/property12_3.jpg'],
    13 => ['images/property_23.jpg', 'images/property13_2.jpg', 'images/property13_3.jpg'],
    14 => ['images/property_24.jpg', 'images/property14_2.jpg', 'images/property14_3.jpg'],
    15 => ['images/property_25.jpg', 'images/property15_2.jpg', 'images/property15_3.jpg'],
    

];
$image_list = $image_paths[$property['id']] ?? ['images/placeholder.jpg'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($property['title']); ?> - Property Details</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
        /* General reset for body */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background: url('images/home.jpg') no-repeat center center fixed; /* Optional background */
    background-size: cover;
    color: #333;
}

/* Glassmorphism style for .container */
.container {
    background: rgba(255, 255, 255, 0.5); /* Transparent white background */
    backdrop-filter: blur(10px); /* Blur effect for the content behind */
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}



/* Optional text inside the container */
.container h1 {
    color: white;
    font-size: 2.5rem;
    margin-bottom: 15px;
}

.container p {
    color: white;
    font-size: 1.1rem;
    line-height: 1.6;
}


        /* Header Section */
        header {
            padding: 20px;
            color: #fff;
            background: rgba(0, 0, 0, 0.6);
            margin-bottom: 20px;
            text-align: center;
        }

        header h1 {
            font-size: 2.5rem;
            margin: 0;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        header p {
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Image Thumbnails Section */
        .image-thumbnails {
            display: flex;
            gap: 10px;
            margin: 20px;
            justify-content: center;
        }

        .image-thumbnails .thumbnail {
            width: 100px;
            height: 100px;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
        }

        .image-thumbnails .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Main Image */
        .main-image {
            text-align: center;
            margin-bottom: 0px;
            
        }

        .main-image img {
            max-width: 100%;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        }

        /* Property Details and Contact Form Layout */
        .property-container {
            display: grid;
            grid-template-columns: 60% 35%;
            gap: 20px;
            margin: 0 20px;
        }

        .property-details {
            background: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .contact-form {
            background: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .property-details h2 {
            color: black;
            font-size: 1.8rem;
        }

        .property-details p {
            margin: 10px 0;
            color:black;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: linear-gradient(135deg, #FF758C, #FF9473);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1rem;
            transition: background 0.3s ease-in-out;
        }

        .back-button:hover {
            background: linear-gradient(135deg, #FF9473, #FF758C);
        }

        .contact-form h3 {
            color: #FF758C;
            margin-bottom: 20px;
        }

        .contact-form label {
            margin-bottom: 8px;
            font-size: 1rem;
            color: #333;
        }

        .contact-form input,
        .contact-form textarea {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            color: #333;
        }

        .contact-form button {
            padding: 12px 20px;
            background: linear-gradient(135deg, #FF758C, #FF9473);
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        .contact-form button:hover {
            background: linear-gradient(135deg, #FF9473, #FF758C);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .property-container {
                grid-template-columns: 1fr;
            }

            .property-details,
            .contact-form {
                margin: 10px 0;
                flex: 1 0 100%;
            }

            .image-thumbnails {
                flex-direction: column;
            }
        }
        
    </style>
</head>
<body>
    
    <header>
        <h1><?php echo htmlspecialchars($property['title']); ?></h1>
        <p>LKR <?php echo number_format($property['price'], 2); ?></p>
    </header>
    <div class="container">
    <!-- Main Image Section -->
    <div class="main-image">
        <img id="main-image" src="<?php echo htmlspecialchars($image_list[0]); ?>" alt="Main Property Image">
    </div>


    <!-- Image Thumbnails Section -->
    <div class="image-thumbnails">
        <?php foreach ($image_list as $index => $image): ?>
            <div class="thumbnail" onclick="changeMainImage('<?php echo $image; ?>')">
                <img src="<?php echo htmlspecialchars($image); ?>" alt="Thumbnail <?php echo $index + 1; ?>">
            </div>
        <?php endforeach; ?>
    </div>

    
    <div class="property-container">
        <!-- Property Details -->
        <div class="property-details">
            <h2>Property Details</h2>
            <p><?php echo nl2br(htmlspecialchars($property['description'])); ?></p>
            <p><strong>Location:</strong> <?php echo htmlspecialchars($property['location']); ?></p>
            <p><strong>Price:</strong> LKR <?php echo number_format($property['price'], 2); ?></p>
            <p><strong>Bedrooms:</strong> <?php echo $property['bedrooms']; ?></p>
            <p><strong>Bathrooms:</strong> <?php echo $property['bathrooms']; ?></p>
            <p><strong>Size:</strong> <?php echo $property['size']; ?> sq ft</p>
            <p><strong>Amenities:</strong> <?php echo htmlspecialchars($property['amenities']); ?></p>
            <a href="property.php" class="back-button">Back to Listings</a>
        </div>

        <!-- Contact Form -->
        <div class="contact-form">
            <h3>Contact Us</h3>
            <form action="lib/functions/contact_form.php" method="POST">
                <input type="hidden" name="property_id" value="<?php echo $property['id']; ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
                <button type="submit">Send Inquiry</button>
            </form>
        </div>
    </div>
    </div>

    <script>
        // JavaScript function to change the main image
        function changeMainImage(imageSrc) {
            document.getElementById('main-image').src = imageSrc;
        }
    </script>

</body>
</html>
