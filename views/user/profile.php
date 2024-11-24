<?php
// views/user/profile.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../auth/login.php');
    exit();
}

require_once '../../config/database.php'; // Include the database connection
require_once '../../config/constants.php'; // Include constants for SITE_NAME

// Get the logged-in user's ID
$userId = $_SESSION['user_id'];

// Query to fetch user details from the database
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId); // "i" is the type for integer
$stmt->execute();
$result = $stmt->get_result();

// Fetch the user data
$user = $result->fetch_assoc();

// Handle form submission for updating profile
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Query to update user profile
    $updateQuery = "UPDATE users SET name = ?, email = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("ssi", $name, $email, $userId); // "ssi" - string, string, integer
    $updateStmt->execute();

    // Update session data
    $_SESSION['user_name'] = $name;

    // Redirect with success message
    header('Location: profile.php?success=1');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../common/navbar.php'; ?>
    
    <div class="container mt-4">
        <h2>Your Profile</h2>
        
        <?php if (isset($_GET['success'])) : ?>
            <div class="alert alert-success">Profile updated successfully!</div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</body>
</html>
