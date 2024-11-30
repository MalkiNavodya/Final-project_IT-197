<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Buy</a></li>
                <li><a href="#">Sell</a></li>
                <li><a href="#">Rent</a></li>
                <li><a href="#">Agent</a></li>
                <li><a href="#">Map</a></li>
                <li><a href="registration.php">Register/Sign In</a></li>
            </ul>
        </nav>
        
        <!-- Search Bar Inside Navbar -->
        <div class="search-bar">
            <form action="functions/search.php" method="GET">
                <input type="text" name="query" placeholder="Location, zipcode or city" required>
                <button type="submit">🔍</button>
            </form>
        </div>
    </header>
</body>
</html>
