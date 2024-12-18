<?php
// Start session and include the database connection
session_start();
include('lib/functions/db_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Please log in to view saved properties.');
            window.location.href = 'login.php';
          </script>";
    exit();
}

// Get the logged-in user's ID
$user_id = $_SESSION['user_id'];

// Query to fetch saved properties with property details
$query = "
    SELECT sp.saved_at, p.title, p.price, p.location, p.bedrooms, p.bathrooms, p.size
    FROM saved_properties AS sp
    JOIN properties AS p ON sp.property_id = p.id
    WHERE sp.user_id = '$user_id'
    ORDER BY sp.saved_at DESC
";

$result = mysqli_query($conn, $query);

// Check for errors
if (!$result) {
    die("Error fetching saved properties: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Properties</title>
    <style>
        /* Glassmorphism and Custom Color Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background:  url('images/home.jpg');
            backdrop-filter: blur(5px);
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1000px;
            margin: 20px;
            padding: 20px;
            background: rgba(205, 195, 195, 0.58);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        h2 {
            text-align: center;
            color:rgb(9, 9, 8);
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: black;
        }
        th, td {
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 10px;
            text-align: left;
        }
        th {
            background: #FF7B76;
            color: #FCE3DB;
        }
        tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.2);
        }
        tr:hover {
            background: #FF9473;
            color: #fff;
        }
        a {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            background: #FF9B5F;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
        }
        a:hover {
            background: #FF758C;
            color: #FCE3DB;
        }
        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            text-align: center;
        }
        p {
            text-align: center;
            color: #FF9473;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Back to Profile Button -->
        <br><div class="back-button">
            <a href="profile.php">&larr; Back to Profile</a>
        </div>

        <h2>Your Saved Properties</h2>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>Bedrooms</th>
                    <th>Bathrooms</th>
                    <th>Size (sqft)</th>
                    <th>Saved At</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo number_format($row['price'], 2); ?> LKR</td>
                    <td><?php echo htmlspecialchars($row['location']); ?></td>
                    <td><?php echo $row['bedrooms']; ?></td>
                    <td><?php echo $row['bathrooms']; ?></td>
                    <td><?php echo $row['size']; ?></td>
                    <td><?php echo $row['saved_at']; ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>You have no saved properties.</p>
        <?php endif; ?>
    </div>
</body>
</html>
