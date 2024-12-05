<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Body Styling */
        body {
            display: flex;
            min-height: 100vh;
            background-image: url('../../../images/home.jpg'); /* Set image as background */
            background-size: cover; /* Make the image cover the whole body */
            background-position: center; /* Center the image */
            color: #333;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 250px;
            background: #2c3e50;
            color: #fff;
            padding: 20px;
            transform: translateX(-250px);
            transition: all 0.3s ease;
            z-index: 10;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar .admin-profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .admin-profile img {
            width: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 3px solid #FF9473;
        }

        .sidebar .admin-profile h3 {
            margin-bottom: 5px;
            font-size: 1.2rem;
        }

        .sidebar .admin-profile p {
            font-size: 0.9rem;
            color: #bdc3c7;
        }

        .sidebar nav ul {
            list-style: none;
            padding: 10px 0;
        }

        .sidebar nav ul li {
            margin-bottom: 15px;
        }

        .sidebar nav ul li a {
            text-decoration: none;
            color: #ecf0f1;
            font-size: 1rem;
            padding: 10px;
            display: block;
            transition: background 0.3s ease;
            border-radius: 10px;
        }

        .sidebar nav ul li a:hover {
            background: #34495e;
        }

        .toggle-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 20px;
            cursor: pointer;
            color: #fff;
            z-index: 11;
        }

        /* Main Content */
        .content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .content.collapsed {
            margin-left: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 123, 118, 0.3);
            padding: 10px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        .header h1 {
            font-size: 1.8rem;
            color: #FF9473;
        }

        .btn-logout {
            padding: 10px 15px;
            background: #E72D30;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-logout:hover {
            background: #FD8A86;
        }

        /* Stats Section */
        .stats {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            flex: 1;
            background: rgba(255, 255, 255, 0.3);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        .stat-card h2 {
            font-size: 2rem;
            margin-bottom: 5px;
            color: #FF9B5F;
        }

        .stat-card p {
            font-size: 1rem;
            color: #333;
        }

        /* CRUD Table */
        .crud-table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
        }

        .crud-table th,
        .crud-table td {
            padding: 15px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 1rem;
            color: #333;
        }

        .crud-table thead {
            background: rgba(255, 123, 118, 0.4);
            color: #fff;
        }

        /* Button Colors */
        .btn-update {
            padding: 8px 15px;
            background-color: #5EB934; /* Success */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .btn-update:hover {
            background-color: #50E400;
        }

        .btn-edit {
            padding: 8px 15px;
            background-color: #FF9F01; /* Edit (Orange) */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .btn-edit:hover {
            background-color: #FFB64E;
        }

        .btn-delete {
            padding: 8px 15px;
            background-color: #E72D30; /* Error */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .btn-delete:hover {
            background-color: #FD8A86;
        }

        /* Footer Section */
        .footer {
            text-align: center;
            font-size: 0.9rem;
            color: #bdc3c7;
            margin-top: 20px;
        }
         /* Existing styles */
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f7f7f7;
            color: #333;
            padding: 20px;
        }

        header {
            background-color: #f68c36;
            padding: 20px 0;
            text-align: center;
            color: white;
        }

        header h1 {
            font-size: 2.5em;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
            color: #f68c36;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f68c36;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .btn {
            padding: 8px 12px;
            margin: 0 5px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-edit {
            background-color: #3498db;
        }

        .btn-edit:hover {
            background-color: #2a7cb7;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        .btn-back {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #f68c36;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #e07e2f;
        }

        .btn-add {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #2ecc71;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-add:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="admin-profile">
            <img src="https://via.placeholder.com/80" alt="Admin Profile">
            <h3>Admin Name</h3>
            <p>Administrator</p>
        </div>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Analytics</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Log Out</a></li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content collapsed" id="main-content">
        <span class="toggle-btn" id="toggle-btn">☰</span>
        <header class="header">
            <h1>Admin Dashboard</h1>
            <button class="btn-logout">Log Out</button>
        </header>

<?php
include('../../functions/db_connection.php'); // Database connection file

// Fetch Total Users
$totalUsersQuery = "SELECT COUNT(*) AS total_users FROM users";
$totalUsersResult = mysqli_query($conn, $totalUsersQuery);
if (!$totalUsersResult) {
    die("Error in Total Users Query: " . mysqli_error($conn));
}
$totalUsers = mysqli_fetch_assoc($totalUsersResult)['total_users'] ?? 0;

// Fetch Active Sessions
$activeSessionsQuery = "SELECT COUNT(*) AS active_sessions FROM sessions WHERE status = 'active'";
$activeSessionsResult = mysqli_query($conn, $activeSessionsQuery);
if (!$activeSessionsResult) {
    die("Error in Active Sessions Query: " . mysqli_error($conn));
}
$activeSessions = mysqli_fetch_assoc($activeSessionsResult)['active_sessions'] ?? 0;

// Fetch New Signups
$newSignupsQuery = "SELECT COUNT(*) AS new_signups FROM users WHERE DATE(created_at) = CURDATE()";
$newSignupsResult = mysqli_query($conn, $newSignupsQuery);
if (!$newSignupsResult) {
    die("Error in New Signups Query: " . mysqli_error($conn));
}
$newSignups = mysqli_fetch_assoc($newSignupsResult)['new_signups'] ?? 0;
?>

        <section class="stats">
    <div class="stat-card">
        <h2><?php echo $totalUsers; ?></h2>
        <p>Total Users</p>
    </div>
    <div class="stat-card">
        <h2><?php echo $activeSessions; ?></h2>
        <p>Active Sessions</p>
    </div>
    <div class="stat-card">
        <h2><?php echo $newSignups; ?></h2>
        <p>New Signups</p>
    </div>
</section>


        <div class="container">
            <h2>List of Registered Users</h2>
            <a href="../../functions/add_user.php" class="btn-add">Add New User</a>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registration Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../../functions/db_connection.php'); // Database connection file

                    $query = "SELECT user_id, username, email, created_at FROM users";
                    $result = mysqli_query($conn, $query);

                    if (!$result) {
                        echo "<tr><td colspan='5'>Error: " . mysqli_error($conn) . "</td></tr>";
                    } else {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                                <tr>
                                    <td>{$row['user_id']}</td>
                                    <td>{$row['username']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['created_at']}</td>
                                    <td>
                                        <a href='../../functions/edit_user.php?id={$row['user_id']}' class='btn btn-edit'>Edit</a>
                                        <a href='../../functions/delete_user.php?id={$row['user_id']}' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "
                            <tr>
                                <td colspan='5'>No users registered yet.</td>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript for Toggle Button -->
    <script>
        const toggleBtn = document.getElementById('toggle-btn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            mainContent.classList.toggle('collapsed');
        });
    </script>
</body>
</html>