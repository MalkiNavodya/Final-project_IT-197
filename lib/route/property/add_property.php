<?php
// Include database connection
include('../../functions/db_connection.php');

// Initialize variables
$title = $price = $location = $description = $bedrooms = $bathrooms = $size = $amenities = $agent_id = "";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input
    $title = trim($_POST['title']);
    $price = trim($_POST['price']);
    $location = trim($_POST['location']);
    $description = trim($_POST['description']);
    $bedrooms = trim($_POST['bedrooms']);
    $bathrooms = trim($_POST['bathrooms']);
    $size = trim($_POST['size']);
    $amenities = trim($_POST['amenities']);
    $agent_id = trim($_POST['agent_id']);

    if (empty($title)) {
        $errors[] = "Title is required.";
    }
    if (empty($price) || !is_numeric($price)) {
        $errors[] = "A valid price is required.";
    }
    if (empty($location)) {
        $errors[] = "Location is required.";
    }
    if (empty($bedrooms) || !is_numeric($bedrooms)) {
        $errors[] = "A valid number of bedrooms is required.";
    }
    if (empty($bathrooms) || !is_numeric($bathrooms)) {
        $errors[] = "A valid number of bathrooms is required.";
    }
    if (empty($size) || !is_numeric($size)) {
        $errors[] = "A valid size is required.";
    }
    if (empty($agent_id)) {
        $errors[] = "Agent ID is required.";
    }

    // Insert into database if no errors
    if (empty($errors)) {
        $stmt = $conn->prepare("
            INSERT INTO properties (title, price, location, description, bedrooms, bathrooms, size, amenities, agent_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param(
            "ssssiiisi",
            $title,
            $price,
            $location,
            $description,
            $bedrooms,
            $bathrooms,
            $size,
            $amenities,
            $agent_id
        );

        if ($stmt->execute()) {
            header("Location:  ../../views/dashboard/admin.php?success=Property added successfully");
            exit();
        } else {
            $errors[] = "Failed to add property: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
    <style>
       body {
    font-family: 'Poppins', sans-serif;
    background: #f7f7f7;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.container {
    background: white;
    padding: 20px; /* Reduced padding */
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    width: 50%;
    max-width: 400px;
}
.container h1 {
    margin-bottom: 10px; /* Reduced margin */
    text-align: center;
    font-size: 1.5rem; /* Reduced font size */
    color: #333;
}
.form-group {
    margin-bottom: 10px; /* Reduced spacing between fields */
}
.form-group label {
    display: block;
    margin-bottom: 5px;
    font-size: 0.9rem; /* Reduced label font size */
    color: #333;
}
.form-group input, .form-group textarea {
    width: 90%;
    padding: 3px; /* Reduced padding */
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 0.9rem; /* Reduced font size */
}
.btn-submit {
    background: #27ae60;
    color: white;
    padding: 8px 10px; /* Reduced padding */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 90%;
    font-size: 0.9rem; /* Reduced font size */
}
.btn-submit:hover {
    background: #2ecc71;
}
.errors {
    color: red;
    margin-bottom: 10px; /* Reduced margin */
    font-size: 0.9rem; /* Reduced font size */
}
.form-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}
.btn-back {
    background: #e74c3c;
    color: white;
    padding: 8px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.9rem;
}
.btn-back:hover {
    background: #c0392b;
}


    </style>
</head>
<body>
<div class="container">
    <h1>Add Property</h1>
    <?php if (!empty($errors)): ?>
        <div class="errors">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($location); ?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description"><?php echo htmlspecialchars($description); ?></textarea>
        </div>
        <div class="form-group">
            <label for="bedrooms">Bedrooms</label>
            <input type="number" id="bedrooms" name="bedrooms" value="<?php echo htmlspecialchars($bedrooms); ?>">
        </div>
        <div class="form-group">
            <label for="bathrooms">Bathrooms</label>
            <input type="number" id="bathrooms" name="bathrooms" value="<?php echo htmlspecialchars($bathrooms); ?>">
        </div>
        <div class="form-group">
            <label for="size">Size</label>
            <input type="number" id="size" name="size" value="<?php echo htmlspecialchars($size); ?>">
        </div>
        <div class="form-group">
            <label for="amenities">Amenities</label>
            <input type="text" id="amenities" name="amenities" value="<?php echo htmlspecialchars($amenities); ?>">
        </div>
        <div class="form-group">
            <label for="agent_id">Agent ID</label>
            <input type="text" id="agent_id" name="agent_id" value="<?php echo htmlspecialchars($agent_id); ?>">
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Add Property</button>
            <button type="button" class="btn-back" onclick="history.back()">Go Back</button>
        </div>
    </form>
</div>

</body>
</html>
