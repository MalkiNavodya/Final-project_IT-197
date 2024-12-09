<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'db_connection.php'; // Include your database connection file

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the POST data from the form
    $property_id = $_POST['property_id'];
    $agent_id = $_POST['agent_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Validate the input fields (ensure they're not empty)
    if (empty($property_id) || empty($agent_id) || empty($name) || empty($email) || empty($phone) || empty($message)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'All fields are required.'
        ]);
        exit;
    }

    // Prepare the SQL query to insert the inquiry into the database
    $sql = "INSERT INTO inquiries (property_id, agent_id, name, email, phone, message) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Error preparing the SQL statement.'
        ]);
        exit;
    }

    // Bind the parameters to the prepared statement
    $stmt->bind_param('iissss', $property_id, $agent_id, $name, $email, $phone, $message);

    // Try executing the statement and check if it was successful
    if ($stmt->execute()) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Your message has been sent successfully! We will contact you soon.'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to send message: ' . $stmt->error
        ]);
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    // If the request is not POST, return an error message
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method.'
    ]);
}
?>
