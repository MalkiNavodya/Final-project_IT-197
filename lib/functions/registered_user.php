<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <style>
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
    <header>
        <h1>Registered Users</h1>
    </header>
    <div class="container">
        <h2>List of Registered Users</h2>
        <a href="add_user.php" class="btn-add">Add New User</a>
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
                include('db_connection.php'); // Database connection file

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
                                    <a href='edit_user.php?id={$row['user_id']}' class='btn btn-edit'>Edit</a>
                                    <a href='delete_user.php?id={$row['user_id']}' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
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
        <a href="../views/dashboard/admin.php" class="btn-back">Back to Home</a>
    </div>
</body>
</html>
