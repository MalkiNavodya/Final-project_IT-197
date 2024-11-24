<?php
// views/user/favourites.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../auth/login.php');
    exit();
}

require_once '../../config/database.php';
require_once '../../config/constants.php';

// Get the logged-in user's ID
$userId = $_SESSION['user_id'];

// Query to fetch favourite properties for the logged-in user
$query = "SELECT * FROM favourites 
          INNER JOIN properties ON favourites.property_id = properties.id 
          WHERE favourites.user_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId); // "i" is the type for integer
$stmt->execute();
$result = $stmt->get_result();

// Fetch all the favourite properties
$favourites = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Favourites - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../common/navbar.php'; ?>
    
    <div class="container mt-4">
        <h2>Your Favourite Properties</h2>
        
        <?php if (empty($favourites)) : ?>
            <p>No favourites yet. Start browsing properties and save them to your list!</p>
        <?php else : ?>
            <div class="row">
                <?php foreach ($favourites as $property) : ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../../public/images/property_photos/<?php echo $property['image']; ?>" class="card-img-top" alt="Property Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($property['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($property['address']); ?></p>
                                <p class="card-text"><strong>Price:</strong> $<?php echo number_format($property['price']); ?></p>
                                <a href="../../views/property/details.php?id=<?php echo $property['id']; ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
