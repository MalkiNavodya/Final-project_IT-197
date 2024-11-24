<?php
// views/agent/list.php

session_start(); // Start the session to access user data if necessary
require_once '../../config/database.php';  // Include database connection
require_once '../../config/constants.php'; // Include site constants (e.g., site name)

try {
    // Query to fetch all agents from the database
    $query = "SELECT * FROM agents";  // Assuming your database has an 'agents' table
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $agents = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // Fetch all agents
} catch (mysqli_sql_exception $e) {
    die("Error fetching agents: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Agents - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../common/navbar.php'; ?>

    <div class="container mt-4">
        <h2>Our Real Estate Agents</h2>
        <?php if (empty($agents)) : ?>
            <p>No agents found at the moment.</p>
        <?php else : ?>
            <div class="row">
                <?php foreach ($agents as $agent) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="../../public/images/agents/<?php echo $agent['image']; ?>" class="card-img-top" alt="Agent Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($agent['name']); ?></h5>
                                <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($agent['email']); ?></p>
                                <p class="card-text"><strong>Phone:</strong> <?php echo htmlspecialchars($agent['phone']); ?></p>
                                <a href="agent_details.php?id=<?php echo $agent['id']; ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php include '../common/footer.php'; ?>

</body>
</html>
