<?php
require 'db_connection.php';

session_start();

// Check if the property ID is provided
$property_id = $_GET['property_id'] ?? null;
if (!$property_id) {
    die("Property ID is required.");
}

// Assuming a logged-in user system exists
$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    die("You need to log in to save a property.");
}

// Insert into the saved_properties table
$query = "INSERT INTO saved_properties (user_id, property_id) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $user_id, $property_id);

if ($stmt->execute()) {
    echo "<script>alert('Property saved successfully!'); window.location.href = '../../property_details.php?id={$property_id}';</script>";
} else {
    echo "<script>alert('Failed to save the property. Please try again later.'); window.history.back();</script>";
}
?>
