<?php
if (isset($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']); // Sanitize user input
    echo "<h1>Search Results for: " . $query . "</h1>";
    // Add your database or search functionality logic here
} else {
    echo "<h1>No search query provided.</h1>";
}
?>
