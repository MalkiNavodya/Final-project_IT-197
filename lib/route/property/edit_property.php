<?php
include('../../functions/db_connection.php'); // Database connection file

// Check if ID is passed in the URL
if (isset($_GET['id'])) {
    $property_id = $_GET['id'];
    
    // Fetch the property details from the database
    $query = "SELECT * FROM properties WHERE id = $property_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $property = mysqli_fetch_assoc($result);
    } else {
        die("Error fetching property: " . mysqli_error($conn));
    }
} else {
    die("Property ID is missing.");
}

// Handle the form submission and update the property
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $bedrooms = mysqli_real_escape_string($conn, $_POST['bedrooms']);
    $bathrooms = mysqli_real_escape_string($conn, $_POST['bathrooms']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $amenities = mysqli_real_escape_string($conn, $_POST['amenities']);
    $agent_id = mysqli_real_escape_string($conn, $_POST['agent_id']);
    
    // Update the property in the database
    $updateQuery = "UPDATE properties SET 
                    title = '$title',
                    price = '$price',
                    location = '$location',
                    description = '$description',
                    bedrooms = '$bedrooms',
                    bathrooms = '$bathrooms',
                    size = '$size',
                    amenities = '$amenities',
                    agent_id = '$agent_id'
                    WHERE id = $property_id";
    
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: ../../views/dashboard/admin.php"); // Redirect to dashboard or properties list after update
    } else {
        die("Error updating property: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Include your CSS file -->
    <style>/* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background-color: #f7f7f7;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 800px;
}

h1 {
    text-align: center;
    font-size: 2rem;
    color: #FF9473;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-size: 1rem;
    color: #555;
    margin-bottom: 5px;
    display: block;
}

input, textarea {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    outline: none;
    transition: border-color 0.3s ease;
}

input:focus, textarea:focus {
    border-color: #FF9473;
}

textarea {
    resize: vertical;
    min-height: 100px;
}

button {
    background-color: #FF9473;
    color: white;
    padding: 12px 20px;
    font-size: 1rem;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background 0.3s;
}

button:hover {
    background-color: #E72D30;
}

a {
    text-align: center;
    margin-top: 15px;
    display: block;
    font-size: 1rem;
    color: #3498db;
    text-decoration: none;
    transition: color 0.3s;
}

a:hover {
    color: #2980b9;
}

.btn-submit {
    margin-top: 20px;
    background: #27ae60;
    border-radius: 10px;
    padding: 12px 20px;
    text-align: center;
    color: white;
    font-size: 1rem;
}

.btn-submit:hover {
    background: #2ecc71;
}

.btn-cancel {
    display: block;
    text-align: center;
    margin-top: 20px;
    font-size: 1rem;
    color: #FF9473;
    text-decoration: none;
}

.btn-cancel:hover {
    color: #E72D30;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    h1 {
        font-size: 1.6rem;
    }

    label {
        font-size: 0.9rem;
    }

    input, textarea {
        font-size: 0.9rem;
    }

    button {
        font-size: 0.9rem;
        padding: 10px 15px;
    }

    a, .btn-cancel {
        font-size: 0.9rem;
    }
}
</style>
</head>
<body>

<div class="container">
    <h1>Edit Property</h1>

    <form action="edit_property.php?id=<?php echo $property['id']; ?>" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?php echo $property['title']; ?>" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" value="<?php echo $property['price']; ?>" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" value="<?php echo $property['location']; ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" required><?php echo $property['description']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="bedrooms">Bedrooms</label>
            <input type="number" name="bedrooms" id="bedrooms" value="<?php echo $property['bedrooms']; ?>" required>
        </div>

        <div class="form-group">
            <label for="bathrooms">Bathrooms</label>
            <input type="number" name="bathrooms" id="bathrooms" value="<?php echo $property['bathrooms']; ?>" required>
        </div>

        <div class="form-group">
            <label for="size">Size (sq ft)</label>
            <input type="number" name="size" id="size" value="<?php echo $property['size']; ?>" required>
        </div>

        <div class="form-group">
            <label for="amenities">Amenities</label>
            <textarea name="amenities" id="amenities" required><?php echo $property['amenities']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="agent_id">Agent ID</label>
            <input type="text" name="agent_id" id="agent_id" value="<?php echo $property['agent_id']; ?>" required>
        </div>

        <button type="submit" class="btn-submit">Update Property</button>
    </form>

    <a href="../../views/dashboard/admin.php" class="btn-cancel">Cancel</a>
</div>

</body>
</html>
