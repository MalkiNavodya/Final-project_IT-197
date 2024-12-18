<?php
// Include database connection
include('lib/functions/db_connection.php');

// Fetch filter inputs
$location = $_GET['location'] ?? '';
$price_min = $_GET['price_min'] ?? 0;
$price_max = $_GET['price_max'] ?? PHP_INT_MAX;
$bedrooms = $_GET['bedrooms'] ?? 0;

// Construct SQL query with filters
$sql = "SELECT * FROM properties WHERE 1=1";

if (!empty($location)) {
    $sql .= " AND location LIKE '%" . mysqli_real_escape_string($conn, $location) . "%'";
}
if (!empty($price_min)) {
    $sql .= " AND price >= " . (float)$price_min;
}
if (!empty($price_max) && $price_max !== PHP_INT_MAX) {
    $sql .= " AND price <= " . (float)$price_max;
}
if (!empty($bedrooms)) {
    $sql .= " AND bedrooms >= " . (int)$bedrooms;
}

// Execute query
$result = mysqli_query($conn, $sql);

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
        .search-bar {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        .search-bar input, .search-bar select {
            width: calc(33% - 20px);
            padding: 10px;
            margin: 5px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            font-size: 1rem;
        }
        .search-bar button {
            padding: 10px 15px;
            background: linear-gradient(135deg, #FF9473, #FF758C);
            border: none;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 8px;
            margin-top: 5px;
            transition: background 0.3s ease-in-out;
        }
        .search-bar button:hover {
            background: linear-gradient(135deg, #FF7B76, #FF9473);
        }
    </style>
</head>
<body>


    <div class="hero">
        <h1>Available Properties</h1>
        <p>Find your dream home from our exclusive listings.</p>
    </div>

    <!-- Search Bar -->
    <form class="search-bar" method="GET" action="">
        <input type="text" name="location" placeholder="Location" value="<?php echo htmlspecialchars($location); ?>">
        <input type="number" name="price_min" placeholder="Min Price" value="<?php echo htmlspecialchars($price_min); ?>">
        <input type="number" name="price_max" placeholder="Max Price" value="<?php echo htmlspecialchars($price_max); ?>" >
        <input type="number" name="bedrooms" placeholder="Min Bedrooms" value="<?php echo htmlspecialchars($bedrooms); ?>" >
        <button type="submit">Search</button>
    </form>

    <!-- Property Listings -->
    <div class="container">
        <?php if (count($properties) > 0): ?>
            <?php foreach ($properties as $property): ?>
                <div class="property-card">
                    <div class="property-image" style="background-image: url('images/property_<?php echo $property['id']; ?>.jpg');"></div>
                    <div class="property-content">
                        <h2><?php echo htmlspecialchars($property['title']); ?></h2>
                        <p><?php echo htmlspecialchars($property['description']); ?></p>
                        <p>Price: LKR <?php echo htmlspecialchars($property['price']); ?></p>
                        <p>Bedrooms: <?php echo htmlspecialchars($property['bedrooms']); ?></p><br>
                        <a href="property_details.php?id=<?php echo $property['id']; ?>" class="view-button">View Details</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No properties match your search criteria.</p>
        <?php endif; ?>
    </div>
    <!-- Back to Home Button -->
    <a href="home.php" class="back-button">Back to Home</a>
</body>
</html>
