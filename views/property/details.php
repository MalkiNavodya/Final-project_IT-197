<?php
// details.php
session_start();
require_once '../../config/database.php'; // Ensure this file contains a valid $conn object
require_once '../../config/constants.php';

// Validate property ID
$propertyId = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : null;

if (!$propertyId) {
    die("Invalid property ID. Please provide a valid numeric ID.");
}

try {
    // Check if the database connection is established
    if (!$conn) {
        throw new Exception("Database connection not established.");
    }

    // Fetch the property details using a prepared statement
    $stmt = $conn->prepare("SELECT * FROM properties WHERE id = ?");
    if (!$stmt) {
        throw new Exception("SQL preparation error: " . $conn->error);
    }

    $stmt->bind_param('i', $propertyId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the property data
    $property = $result->fetch_assoc();
    if (!$property) {
        die("Property not found. Please check the ID and try again.");
    }

    $stmt->close();
} catch (Exception $e) {
    die("Error fetching property: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($property['title']); ?> - <?php echo SITE_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../common/navbar.php'; ?>
    <div class="container mt-4">
        <div class="row">
            <!-- Image Section -->
            <div class="col-md-6">
                <?php if (!empty($property['image']) && file_exists("../../public/images/property_photos/" . $property['image'])): ?>
                    <img src="../../public/images/property_photos/<?php echo htmlspecialchars($property['image']); ?>" class="img-fluid" alt="Property Image">
                <?php else: ?>
                    <img src="../../public/images/default_property.jpg" class="img-fluid" alt="Default Property Image">
                <?php endif; ?>
            </div>

            <!-- Details Section -->
            <div class="col-md-6">
                <h1><?php echo htmlspecialchars($property['title']); ?></h1>
                <p><strong>Price:</strong> $<?php echo number_format($property['price']); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($property['address']); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($property['description']); ?></p>
            </div>
        </div>
    </div>
</body>
</html>
