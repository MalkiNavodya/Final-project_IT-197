<?php
// Include database connection
include('db_connection.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and get form inputs
    $property_id = mysqli_real_escape_string($conn, $_POST['property_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    // Insert inquiry into the database
    $query = "INSERT INTO inquiries (property_id, name, email, message) 
              VALUES ('$property_id', '$name', '$email', '$message')";
    
    if (mysqli_query($conn, $query)) {
        // Success message
        echo "<script>
                alert('Inquiry submitted successfully. The agent will contact you soon.');
                window.location.href = '../../property.php'; // Redirect to a specific page after success
              </script>";
    } else {
        // Error message
        echo "<script>
                alert('Error: " . mysqli_error($conn) . "');
                window.history.back(); // Redirect back to the form page
              </script>";
    }
}
?>
