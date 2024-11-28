<?php
// property_page.php
session_start();
require_once '../../config/database.php';
require_once '../../config/constants.php';

// Default filter values
$search = $_GET['search'] ?? '';
$min_price = $_GET['min_price'] ?? 0;
$max_price = $_GET['max_price'] ?? 99999999;
$type = $_GET['type'] ?? '';
$limit = 6; // Items per page
$page = $_GET['page'] ?? 1;
$offset = ($page - 1) * $limit;

try {
    // Check if database connection is established
    if (!$conn) {
        throw new Exception("Database connection not established.");
    }

    // SQL query to fetch properties with filters
    $query = "
        SELECT * FROM properties 
        WHERE title LIKE ? AND price BETWEEN ? AND ? 
        AND (type = ? OR ? = '') 
        LIMIT ?, ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        throw new Exception("SQL preparation error: " . $conn->error);
    }

    // Bind parameters
    $searchLike = "%$search%";
    $stmt->bind_param('siissii', $searchLike, $min_price, $max_price, $type, $type, $offset, $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    $properties = $result->fetch_all(MYSQLI_ASSOC);

    // Query to count total properties for pagination
    $countQuery = "
        SELECT COUNT(*) FROM properties 
        WHERE title LIKE ? AND price BETWEEN ? AND ? 
        AND (type = ? OR ? = '')";
    $countStmt = $conn->prepare($countQuery);
    if (!$countStmt) {
        throw new Exception("SQL preparation error: " . $conn->error);
    }

    $countStmt->bind_param('siiss', $searchLike, $min_price, $max_price, $type, $type);
    $countStmt->execute();
    $totalCount = $countStmt->get_result()->fetch_row()[0];
    $totalPages = ceil($totalCount / $limit);

    $stmt->close();
    $countStmt->close();
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties - <?php echo SITE_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../common/navbar.php'; ?>
    <div class="container mt-4">
        <h2>Browse Properties</h2>

        <!-- Filters -->
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" class="form-control" name="search" placeholder="Search by title" value="<?php echo htmlspecialchars($search); ?>">
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control" name="min_price" placeholder="Min Price" value="<?php echo htmlspecialchars($min_price); ?>">
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control" name="max_price" placeholder="Max Price" value="<?php echo htmlspecialchars($max_price); ?>">
            </div>
            <div class="col-md-2">
                <select class="form-control" name="type">
                    <option value="">All Types</option>
                    <option value="Apartment" <?php echo $type === 'Apartment' ? 'selected' : ''; ?>>Apartment</option>
                    <option value="House" <?php echo $type === 'House' ? 'selected' : ''; ?>>House</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </form>

        <!-- Property Cards -->
        <div class="row">
            <?php if (empty($properties)) : ?>
                <p>No properties found.</p>
            <?php else : ?>
                <?php foreach ($properties as $property) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="../../public/images/property_photos/<?php echo htmlspecialchars($property['image']); ?>" class="card-img-top" alt="Property Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($property['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($property['address']); ?></p>
                                <p class="card-text"><strong>Price:</strong> $<?php echo number_format($property['price']); ?></p>
                                <a href="details.php?id=<?php echo $property['id']; ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>">
                        <a class="page-link" href="?<?php echo http_build_query(array_merge($_GET, ['page' => $i])); ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</body>
</html>
