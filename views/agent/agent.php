<?php
// agent_details.php
session_start();
require_once '../../config/database.php';
require_once '../../config/constants.php';

// Get the agent ID from the URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid agent ID.");
}
$agentId = $_GET['id'];

// Fetch agent details
try {
    $stmt = $conn->prepare("SELECT * FROM agents WHERE id = ?");
    $stmt->bind_param('i', $agentId);
    $stmt->execute();
    $agent = $stmt->get_result()->fetch_assoc();
    if (!$agent) {
        die("Agent not found.");
    }
} catch (mysqli_sql_exception $e) {
    die("Error fetching agent: " . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($agent['name']); ?> - Agent Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../common/navbar.php'; ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <img src="../../public/images/agents/<?php echo $agent['image']; ?>" alt="Agent Image" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h2><?php echo htmlspecialchars($agent['name']); ?></h2>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($agent['email']); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($agent['phone']); ?></p>
                <p><strong>Bio:</strong> <?php echo htmlspecialchars($agent['bio']); ?></p>
                <h3>Properties Managed</h3>
                <!-- Fetch and display properties linked to this agent -->
                <?php
                try {
                    $stmt = $conn->prepare("SELECT * FROM properties WHERE agent_id = ?");
                    $stmt->bind_param('i', $agentId);
                    $stmt->execute();
                    $properties = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                } catch (mysqli_sql_exception $e) {
                    die("Error fetching properties: " . $e->getMessage());
                }
                ?>
                <?php if (empty($properties)) : ?>
                    <p>No properties managed by this agent.</p>
                <?php else : ?>
                    <ul>
                        <?php foreach ($properties as $property) : ?>
                            <li><a href="../property/details.php?id=<?php echo $property['id']; ?>"><?php echo htmlspecialchars($property['title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
