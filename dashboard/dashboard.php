<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please <a href='login.php'>login</a> first.");
}

echo "<h2>Welcome, " . $_SESSION['user_name'] . "</h2>";
echo "<p>Your role: " . $_SESSION['user_role'] . "</p>";
echo "<a href='logout.php'>Logout</a>";
?>
