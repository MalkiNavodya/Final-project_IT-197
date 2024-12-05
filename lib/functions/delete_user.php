<?php
// Include the database connection file
include('db_connection.php');

// Initialize a response message
$message = '';

// Check if the user ID is passed via GET
if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']); // Sanitize the ID

    // Prepare the delete query
    $query = "DELETE FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $user_id);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            $message = 'User deleted successfully!';
        } else {
            $message = 'Error deleting user: ' . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        $message = 'Error preparing the query: ' . mysqli_error($conn);
    }
} else {
    $message = 'Invalid request. User ID is missing.';
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            text-align: center;
            padding: 50px;
        }

        .message {
            margin: 20px auto;
            padding: 20px;
            max-width: 500px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .success {
            color: #28a745;
        }

        .error {
            color: #dc3545;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f68c36;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-back:hover {
            background-color: #e07e2f;
        }
    </style>
</head>
<body>
    <div class="message <?php echo strpos($message, 'successfully') !== false ? 'success' : 'error'; ?>">
        <?php echo htmlspecialchars($message); ?>
    </div>
    <a href="../views/dashboard/admin.php" class="btn-back">Back to Users List</a>
</body>
</html>
