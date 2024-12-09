<?php
// Include database connection
include('lib/functions/db_connection.php');

// Fetch properties from the database
$query = "SELECT * FROM properties";
$result = mysqli_query($conn, $query);

$properties = [];
while ($row = mysqli_fetch_assoc($result)) {
    $properties[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listings</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #FF758C, #FF7B76, #FF9B5F, #FF9473, #FCE3DB);
            background-image: url('images/home.jpg'); /* Set the background image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-blend-mode: overlay; /* Blend gradient and image */
            min-height: 100vh;
        }
        .back-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-weight: bold;
    }

    .back-button:hover {
        background-color: #218838;
    }


        .hero {
            text-align: center;
            color: #FCE3DB;
            padding: 60px 20px;
            background: rgba(0, 0, 0, 0.5); /* Transparent dark background */
            backdrop-filter: blur(10px);
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        .hero h1 {
            font-size: 3rem;
            margin: 0;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 1.2rem;
            margin: 10px 0 0;
            color: rgba(255, 255, 255, 0.9);
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            display: grid; /* Use grid layout */
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Responsive grid columns */
            gap: 20px; /* Space between grid items */
            background: rgba(255, 255, 255, 0.6); /* Transparent white background */
            backdrop-filter: blur(10px); /* Blur effect for the content behind */
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3); /* Slightly darker shadow for depth */
        }

        .property-card {
            background: rgba(0, 0, 0, 0.5); /* Dark semi-transparent background */
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3); /* Slightly darker shadow for depth */
            backdrop-filter: blur(20px); /* Frosted glass effect with increased blur */
            border: 1px solid rgba(255, 255, 255, 0.2); /* Subtle white border */
            overflow: hidden;
            display: flex;
            flex-direction: column; /* Stack content vertically */
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .property-card:hover {
            transform: scale(1.02); /* Slight zoom on hover */
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.5);
        }

        .property-image {
            width: 100%; /* Full width for grid layout */
            height: 200px;
            background: #ccc;
            background-size: cover;
            background-position: center;
            border-radius: 15px 15px 0 0;
        }

        .property-content {
            padding: 20px;
            flex-grow: 1;
            color: rgba(255, 255, 255, 0.9); /* Slightly less intense white text */
        }

        .property-content h2 {
            font-size: 1.5rem;
            margin: 0 0 10px;
        }

        .property-content p {
            margin: 5px 0;
            color: rgba(255, 255, 255, 0.8); /* Softer white for text */
        }

        .view-button {
            background: linear-gradient(135deg, #FF9473, #FF758C); /* Gradient button */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s ease-in-out;
        }

        .view-button:hover {
            background: linear-gradient(135deg, #FF7B76, #FF9473);
        }

        @media screen and (max-width: 600px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="hero">
        <h1>Available Properties</h1>
        <p>Find your dream home from our exclusive listings.</p>
    </div>
<br>
    <div class="container">
        <?php foreach ($properties as $property): ?>
            <div class="property-card">
                <div class="property-image" style="background-image: url('images/property_<?php echo $property['id']; ?>.jpg');"></div>
                <div class="property-content">
                    <h2><?php echo htmlspecialchars($property['title']); ?></h2>
                    <p><?php echo htmlspecialchars($property['description']); ?></p><br>
                    <a href="property_details.php?id=<?php echo $property['id']; ?>" class="view-button">View Details</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- Back to Home Button -->
<a href="home.php" class="back-button">Back to Home</a>

</body>
</html>
