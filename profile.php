<?php
// Include database connection
require 'lib/functions/db_connection.php';

session_start();

// Assuming the user is logged in and their ID is stored in the session
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    die("You need to log in to view this page.");
}

// Fetch user details from the database
$query = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

if (!$user) {
    die("User not found.");
}

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'] ?? null; // Password is optional
    $role = $_POST['role'];
    $profile_picture = $user['profile_picture'];

    // Handle password update
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $hashed_password = $user['password']; // Keep the old password if it's not updated
    }

    // Handle file upload for profile picture
    if (!empty($_FILES['profile_picture']['name'])) {
        // Generate a unique filename to avoid conflicts
        $target_dir = "uploads/";
        $target_file = $target_dir . uniqid() . basename($_FILES["profile_picture"]["name"]);

        // Check if the file is a valid image type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowedTypes = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                $profile_picture = $target_file;  // Update profile picture with the new file path
            } else {
                echo "<script>alert('Failed to upload file.'); window.history.back();</script>";
                exit();
            }
        } else {
            echo "<script>alert('Only image files (JPG, PNG, GIF) are allowed.'); window.history.back();</script>";
            exit();
        }
    }

    // Update user details in the database
    $update_query = "UPDATE users SET username = ?, email = ?, password = ?, profile_picture = ?, role = ? WHERE user_id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sssssi", $username, $email, $hashed_password, $profile_picture, $role, $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('Profile updated successfully!'); window.location.href = 'profile.php';</script>";
    } else {
        echo "<script>alert('Failed to update profile.'); window.history.back();</script>";
        echo "Error: " . $stmt->error; // Debugging line
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('images/home.jpg');
            backdrop-filter: blur(10px);
        }

        .profile-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.2); /* Semi-transparent white */
            backdrop-filter: blur(10px); /* Frosted glass effect */
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: #fff;
        }

        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }

        .profile-header h2 {
            margin: 0;
            font-size: 1.5rem;
        }

        .profile-details {
            margin-bottom: 20px;
        }

        .profile-details p {
            margin: 5px 0;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 5px;
            background: rgba(255, 255, 255, 0.5); /* Slight transparency for form */
            padding: 20px;
            border-radius: 10px;
        }

        input, select {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.8); /* Light background for inputs */
        }

        button {
            padding: 10px;
            font-size: 1rem;
            color: #fff;
            background: #FF758C; /* Gradient button */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #FF7B76; /* Slightly darker on hover */
        }

        .gradient-button {
            background: linear-gradient(to right, #FF758C, #FF7B76, #FF9B5F, #FF9473, #FCE3DB);
            padding: 10px;
            color: black;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .gradient-button:hover {
            background: linear-gradient(to right, #FF7B76, #FF9B5F, #FF9473, #FCE3DB, #FF758C);
        }

        .hidden-form {
            display: none;
        }

        /* Styling the backdrop filter effect */
        .profile-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4); /* Dimmed background */
            z-index: -1;
            border-radius: 15px;
        }

        .back-home {
            margin-top: 20px;
            text-align: center;
        }

        .back-home a {
            text-decoration: none;
            color: #fff;
            background: #5EB934;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .back-home a:hover {
            background: #50E400;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <img src="<?php echo htmlspecialchars($user['profile_picture'] ?: 'images/default_profile.jpg') . '?' . time(); ?>" alt="Profile Picture">
            <h2><?php echo htmlspecialchars($user['username']); ?></h2>
        </div>
        <div class="profile-details">
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?></p>
            <p><strong>Member since:</strong> <?php echo date("F j, Y", strtotime($user['created_at'])); ?></p>
        </div>

        <!-- Button to toggle form visibility -->
        <button class="gradient-button" onclick="toggleForm()">Edit Profile</button>
        <br><br>
        
        <!-- Edit Profile Form (Initially Hidden) -->
        <form method="POST" enctype="multipart/form-data" id="profileForm" class="hidden-form">
            <h3>Edit Profile</h3>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <label for="password">New Password (leave blank to keep current):</label>
            <input type="password" id="password" name="password">

            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="user" <?php if ($user['role'] == 'user') echo 'selected'; ?>>User</option>
                <option value="agent" <?php if ($user['role'] == 'agent') echo 'selected'; ?>>Agent</option>
                <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
            </select>

            <label for="profile_picture">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture" accept="image/*">

            <button type="submit">Update Profile</button>
        </form>

        <!-- Back to Home Button -->
        <div class="back-home">
            <a href="view_saved.php">View saved property</a>
        </div><br>
        <div class="back-home">
            <a href="home.php">Back to Home</a>
        </div>
    </div>

    <script>
        // Toggle the visibility of the form
        function toggleForm() {
            var form = document.getElementById('profileForm');
            form.classList.toggle('hidden-form');
        }
    </script>
</body>
</html>
