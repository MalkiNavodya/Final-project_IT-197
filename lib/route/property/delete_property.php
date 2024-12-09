<?php
// Include database connection
include('../../functions/db_connection.php');

// Check if the property ID is passed through the URL
if (isset($_GET['id'])) {
    $property_id = $_GET['id'];

    // Ensure the property ID is an integer to prevent SQL injection
    $property_id = intval($property_id);

    // SQL query to delete the property from the database
    $deleteQuery = "DELETE FROM properties WHERE id = $property_id";

    // Execute the delete query
    if (mysqli_query($conn, $deleteQuery)) {
        // Redirect to the properties management page after successful deletion
        header("Location: ../../views/dashboard/admin.php"); // You can change this to your desired page
        exit();
    } else {
        // If there was an error in the query, show the error
        die("Error deleting property: " . mysqli_error($conn));
    }
} else {
    // If the ID is not passed, show an error message
    die("Property ID is missing.");
}

// Close the database connection
mysqli_close($conn);
?>
