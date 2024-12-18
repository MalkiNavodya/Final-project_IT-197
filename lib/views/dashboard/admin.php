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

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f7f7f7;
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 250px;
            background: var(--sidebar-bg-color, #2c3e50);
            color: #fff;
            padding: 20px;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            z-index: 1000;
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
            position: fixed;
            top: 20px;
            left: 20px;
            font-size: 20px;
            cursor: pointer;
            color: #333;
            z-index: 1100;
            background: #FF9473;
            padding: 10px;
            border-radius: 50%;
        }

        /* Main Content */
        .content {
            margin-top: 60px;
            margin-left: 250px;
            padding: 20px;
            flex: 1;
            transition: margin-left 0.3s ease;
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

        .stats {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
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

        .theme-switcher {
            margin: 20px 0;
            display: flex;
            gap: 10px;
        }

        .theme-switcher button {
            padding: 10px 15px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            font-size: 1rem;
        }

        .theme-default {
            background: #2c3e50;
        }

        .theme-blue {
            background: #3498db;
        }

        .theme-green {
            background: #27ae60;
        }

/* Table Styles */
table {
    width: 90%; /* Adjust the width of the table */
    max-width: 1200px; /* Ensure it doesn't get too wide on large screens */
    margin: 20px auto; /* Center the table on the page */
    border-collapse: collapse;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}

th, td {
    padding: 12px 20px; /* Increased padding for more spacious cells */
    text-align: left;
    border-bottom: 1px solid #ddd;
    font-size: 1rem; /* Adjust font size for better readability */
}

th {
    background: #FF9473;
    color: #fff;
    font-weight: bold;
}

tr:hover {
    background-color: #f1f1f1;
}

td {
    color: #333;
}

/* Adjust for mobile responsiveness */
@media (max-width: 768px) {
    table {
        width: 100%;
        margin: 10px 0; /* Reduced margin for mobile view */
    }

    th, td {
        padding: 10px; /* Reduced padding for smaller screens */
        font-size: 0.9rem; /* Smaller text size for mobile */
    }

    /* Add a scroll for tables that are too wide on small screens */
    .container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        table-layout: auto; /* Adjusts the table layout */
    }

    th, td {
        white-space: nowrap; /* Ensures text doesn't wrap */
    }

    /* Stack the table headers and data vertically for very small screens */
    th, td {
        display: block;
        width: 100%; /* Makes each cell full-width */
        box-sizing: border-box; /* Ensures padding is included in the width */
    }

    th {
        background: #FF9473;
        text-align: left; /* Align headers left for better readability */
    }

    td {
        background: #f9f9f9;
    }

    /* Make the table headers sticky on top */
    thead {
        position: sticky;
        top: 0;
        background: #FF9473;
        z-index: 1;
    }
}



/* Adjust for mobile responsiveness */
@media (max-width: 768px) {
    table {
        width: 100%;
        margin: 10px 0; /* Reduced margin for mobile view */
    }

    th, td {
        padding: 10px; /* Reduced padding for smaller screens */
        font-size: 0.9rem; /* Smaller text size for mobile */
    }
}


        .btn-add {
            display: inline-block;
            padding: 10px 15px;
            background: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            margin: 10px 0;
            font-size: 1rem;
        }

        .btn-add:hover {
            background: #2ecc71;
        }

        .btn-edit {
            background: #3498db;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }

        .btn-delete {
            background: #e74c3c;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-edit:hover {
            background: #2980b9;
        }

        .btn-delete:hover {
            background: #c0392b;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .toggle-btn {
                position: fixed;
                top: 10px;
                left: 10px;
            }

            .sidebar {
                width: 200px;
            }

            .content {
                margin-left: 0;
            }

            .stats {
                flex-direction: column;
            }

            .stat-card {
                margin-bottom: 10px;
            }

            table, th, td {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
  

    <!-- Main Content -->
    <div class="content collapsed" id="main-content">
        
        <header class="header">
            <h1>Admin Dashboard</h1>
            <a href="../../../index.php"><button class="btn-logout">Log Out</button></a>
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
</section><br><br>


        <div >
            <h2>List of Registered Users</h2><br>
            <a href="../../route/user/add_user.php" class="btn-add">Add New User</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
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
                                        <a href='../../route/user/edit_user.php?id={$row['user_id']}' class='btn btn-edit'>Edit</a>
                                        <a href='../../route/user/delete_user.php?id={$row['user_id']}' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
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
   

 

<?php
include('../../functions/db_connection.php'); // Database connection file

$query = "SELECT 
            id, title, price, location, description, 
            bedrooms, bathrooms, `size`, amenities, agent_id 
          FROM properties";
$result = mysqli_query($conn, $query);

?>

    <div class="container">

       
       
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Bedrooms</th>
                        <th>Bathrooms</th>
                        <th>Size</th>
                        <th>Amenities</th>
                        <th>Agent ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$result) {
                        echo "<tr><td colspan='11'>Error: " . mysqli_error($conn) . "</td></tr>";
                    } else {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                                <tr>
                                    <td>{$row['id']}</td><br>
                                    <td>{$row['title']}</td>
                                    <td>{$row['price']}</td>
                                    <td>{$row['location']}</td>
                                    <td>{$row['description']}</td>
                                    <td>{$row['bedrooms']}</td>
                                    <td>{$row['bathrooms']}</td>
                                    <td>{$row['size']}</td>
                                    <td>{$row['amenities']}</td>
                                    <td>{$row['agent_id']}</td>
                                    <td>
                                        <a href='../../route/property/edit_property.php?id={$row['id']}' class='btn btn-edit'>Edit</a><br><br><br>
                                        <a href='../../route/property/delete_property.php?id={$row['id']}' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this property?\")'>Delete</a>
                                    <br><br>
                                        </td>
                                </tr>";
                            }
                        } else {
                            echo "
                            <tr>
                                <td colspan='11'>No properties listed yet.</td>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
                <h1>Manage Properties</h1>
                <a href="../../route/property/add_property.php" class="btn-add">Add Property</a>
            </table>
        </div>
        </div>
     
    <script>
        const toggleBtn = document.getElementById('toggle-btn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            mainContent.classList.toggle('collapsed');
        });

        function switchTheme(color) {
            document.documentElement.style.setProperty('--sidebar-bg-color', color);
        }
    </script>
    
</body>
</html>
