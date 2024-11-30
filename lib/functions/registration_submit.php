<?php
// Include the database connection
include('../../lib/functions/db_connection.php');  // Adjust the path if necessary

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    //$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if passwords match
    //if ($password !== $confirm_password) {
      //  echo "Passwords do not match.";
       // exit;
   // }

    // Check if the email already exists
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_sql);
    
    if (mysqli_num_rows($check_email_result) > 0) {
        echo "This email is already registered.";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query to insert user data
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect to login page after successful registration
        header("Location: ../../login.php");
        exit(); // Make sure to call exit() to prevent further code execution after the redirect
    } else {
        // If there's an error, output the error message
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
