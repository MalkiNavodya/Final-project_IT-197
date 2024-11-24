<?php
// Start the session and check if the user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header('Location: ../../auth/login.php');
    exit();
}

// Include constants file for site name, etc.
require_once '../../config/constants.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - <?php echo SITE_NAME; ?></title>
    
    <!-- Include Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include your custom CSS file -->
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <!-- Include navbar.php file for the navigation bar -->
    <?php include '../common/navbar.php'; ?>

    <div class="container mt-4">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
        <p>Your personalized real estate dashboard. Choose one of the options below to get started.</p>

        <div class="row mt-4">
            <!-- Favourites Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Favourites</h5>
                        <p class="card-text">View your saved properties.</p>
                        <a href="favourites.php" class="btn btn-primary">Go to Favourites</a>
                    </div>
                </div>
            </div>

            <!-- Profile Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <p class="card-text">Manage your account details.</p>
                        <a href="profile.php" class="btn btn-primary">Go to Profile</a>
                    </div>
                </div>
            </div>

            <!-- Property Search Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Search Properties</h5>
                        <p class="card-text">Find properties based on your preferences.</p>
                        <a href="../property/property_search.php" class="btn btn-primary">Search Properties</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include footer.php file for the footer content -->
    <?php include '../common/footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
