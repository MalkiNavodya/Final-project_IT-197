<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../auth/login.php');
    exit();
}

require_once '../../config/constants.php';
require_once '../../config/database.php';

// Fetch property details based on the property ID from the URL
if (isset($_GET['id'])) {
    $property_id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Query to fetch property details from the database
    $query = "SELECT * FROM properties WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $property_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Fetch the property details
        $property = $result->fetch_assoc();
    } else {
        // Property not found, redirect to home or an error page
        header('Location: ../index.php'); // Or wherever you want to redirect
        exit();
    }
} else {
    // If no property ID is provided, redirect to home or an error page
    header('Location: ../index.php'); // Or wherever you want to redirect
    exit();
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

    <div class="container mt-5">
        <h2><?php echo htmlspecialchars($property['title']); ?></h2>
        <p><strong>Location:</strong> <?php echo htmlspecialchars($property['location']); ?></p>
        <p><strong>Price:</strong> $<?php echo number_format($property['price'], 2); ?></p>
        <p><strong>Status:</strong> <?php echo ucfirst(htmlspecialchars($property['status'])); ?></p>
        <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($property['description'])); ?></p>
        
        <!-- Contact Seller Form -->
        <div class="mt-4">
            <h5>Contact Seller</h5>
            <form action="contact_seller.php" method="POST">
                <input type="hidden" name="property_id" value="<?php echo $property['id']; ?>">
                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>

    <?php include '../common/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
