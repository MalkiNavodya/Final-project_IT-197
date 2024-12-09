<?php
// Include the database connection file
include('../../functions/db_connection.php');

// Initialize variables
$message = '';
$user_id = '';
$username = '';
$email = '';

// Fetch the user data for editing
if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    // Fetch user data
    $query = "SELECT * FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $username = $user['username'];
        $email = $user['email'];
    } else {
        $message = 'User not found.';
    }

    mysqli_stmt_close($stmt);
}

// Handle form submission for updates
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user'])) {
    $user_id = intval($_POST['user_id']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate input fields
    if (empty($username) || empty($email)) {
        $message = 'Username and Email are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Invalid email format.';
    } else {
        // Update query
        if (!empty($password)) {
            // Update with a new password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $query = "UPDATE users SET username = ?, email = ?, password = ? WHERE user_id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'sssi', $username, $email, $hashed_password, $user_id);
        } else {
            // Update without changing the password
            $query = "UPDATE users SET username = ?, email = ? WHERE user_id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'ssi', $username, $email, $user_id);
        }

        if (mysqli_stmt_execute($stmt)) {
            $message = 'User updated successfully!';
        } else {
            $message = 'Error updating user: ' . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #f68c36;
            margin-bottom: 20px;
        }

        form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #f68c36;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #e07e2f;
        }

        .message {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #f68c36;
        }

        .btn-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <?php if (!empty($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">

            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

            <label for="password">Password (leave blank to keep current password)</label>
            <input type="password" id="password" name="password" placeholder="Enter new password">

            <button type="submit" name="update_user" class="btn">Update User</button>
        </form>
        <a href="../../views/dashboard/admin.php" class="btn-back">Back to Users List</a>
    </div>
</body>
</html>
