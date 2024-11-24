<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'seller') {
    // Redirect to login page if not logged in or not a seller
    header('Location: ../../auth/login.php');
    exit();
}

require_once '../../config/constants.php';
require_once '../../config/database.php';

// Fetch properties added by the seller
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM properties WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Properties - <?php echo SITE_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../common/navbar.php'; ?>

    <div class="container mt-5">
        <h2>Manage Your Properties</h2>

        <?php if ($result->num_rows > 0) : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($property = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($property['title']); ?></td>
                            <td><?php echo htmlspecialchars($property['description']); ?></td>
                            <td><?php echo htmlspecialchars($property['price']); ?></td>
                            <td><?php echo htmlspecialchars($property['location']); ?></td>
                            <td><?php echo htmlspecialchars($property['status']); ?></td>
                            <td>
                                <a href="edit_property.php?id=<?php echo $property['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_property.php?id=<?php echo $property['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No properties found. <a href="add_property.php">Add a new property</a>.</p>
        <?php endif; ?>
    </div>

    <?php include '../common/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
