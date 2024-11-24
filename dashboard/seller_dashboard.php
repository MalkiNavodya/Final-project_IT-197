<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    die("Access denied. Please <a href='login.php'>login</a>.");
}

// Dashboard content for admins
echo "<h1>Welcome Admin, " . $_SESSION['user_name'] . "</h1>";
echo "<a href='logout.php'>Logout</a>";
?>
