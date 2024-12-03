<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    // Redirect to login if the user is not a user
    header("Location: ../../login.php");
    exit();
}
?>

<!-- User Dashboard HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome User</h1>
    <p>This is the user dashboard.</p>
</body>
</html>
