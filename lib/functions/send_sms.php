<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Adjust path if needed

use Twilio\Rest\Client;

// Twilio credentials
$sid = 'AC24b08774ba3bc8fc3ae6b6e3ab9b8edc';  // Replace with your Twilio SID
$token = '51b66dd3c86bafcf4ffd5cf9498a39ed';  // Replace with your Twilio Auth Token
$twilio_number = '+17752889907'; // Replace with your Twilio phone number

// Sanitize input
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
$agent_phone = isset($_POST['agent_phone']) ? htmlspecialchars($_POST['agent_phone']) : null;

// Check for missing fields
if (empty($name) || empty($email) || empty($phone) || empty($message) || empty($agent_phone)) {
    die("Error: All fields are required.");
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Error: Invalid email format.");
}

// Format phone numbers to E.164 (Add country code for Sri Lanka if missing)
$phone = (substr($phone, 0, 1) === '+') ? $phone : '+94' . ltrim($phone, '0'); // Add '+94' for Sri Lanka
$agent_phone = (substr($agent_phone, 0, 1) === '+') ? $agent_phone : '+94' . ltrim($agent_phone, '0'); // Add '+94' for Sri Lanka

// Validate phone number format
if (!preg_match('/^\+[1-9]\d{1,14}$/', $phone)) {
    die("Error: Invalid phone number format. Use international format starting with '+'.");
}
if (!preg_match('/^\+[1-9]\d{1,14}$/', $agent_phone)) {
    die("Error: Invalid agent phone number format. Use international format starting with '+'.");
}

// Debug formatted phone numbers (optional)
error_log("Phone: $phone");
error_log("Agent Phone: $agent_phone");

try {
    // Create Twilio client
    $client = new Client($sid, $token);

    // Send SMS
    $twilio_message = $client->messages->create(
        $agent_phone, // Agent's phone number (recipient)
        [
            'from' => $twilio_number, // Your Twilio number (sender)
            'body' => "New inquiry from $name ($email, $phone): $message"
        ]
    );

    // If successful
    echo "Message sent successfully!";
} catch (Exception $e) {
    // Debug error message
    error_log("Twilio Error: " . $e->getMessage());
    echo "Error: " . $e->getMessage();
}
?>
