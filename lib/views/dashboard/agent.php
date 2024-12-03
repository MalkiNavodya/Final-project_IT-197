<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'agent') {
    // Redirect to login if the user is not an agent
    header("Location: ../../../login.php");
    exit();
}
?>

<!-- Agent Dashboard HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agent Dashboard</title>
</head>
<body>
    <h1>Welcome Agent</h1>
    <p>This is the agent dashboard.</p>
</body>
</html>
