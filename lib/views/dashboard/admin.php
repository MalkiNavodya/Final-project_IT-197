<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Redirect to login if the user is not an admin
    header("Location: ../../login.php");
    exit();
}
?>

<!-- Admin Dashboard HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome Admin</h1>
    <p>This is the admin dashboard.</p>
</body>
</html>
