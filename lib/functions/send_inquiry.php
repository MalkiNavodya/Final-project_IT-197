<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $property_id = intval($_POST['property_id']);
    $message = trim($_POST['message']);

    if (!empty($message)) {
        // Insert inquiry into the database
        $stmt = $pdo->prepare("INSERT INTO inquiries (property_id, user_id, message) VALUES (:property_id, :user_id, :message)");
        $stmt->execute([
            'property_id' => $property_id,
            'user_id' => $_SESSION['user_id'], // Assumes the user is logged in
            'message' => $message
        ]);
        echo "Inquiry sent successfully!";
    } else {
        echo "Message cannot be empty.";
    }
} else {
    echo "Invalid request.";
}
?>
