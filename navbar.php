<head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Buy</a></li>
            <li><a href="#">Sell</a></li>
            <li><a href="#">Rent</a></li>
            <li><a href="#">Agent</a></li>
            <li><a href="#">Map</a></li>
            <li>
                <!-- Register and Sign In as separate buttons -->
                <a href="registration.php" class="btn-register">Register</a>
                <a href="login.php" class="btn-login">Sign In</a>
            </li>
        </ul>
    </nav>

    <!-- Search Bar Inside Navbar -->
    <div class="search-bar">
        <!-- Example with FontAwesome -->
<form action="functions/search.php" method="GET">
    <input type="text" name="query" placeholder="Location, zipcode or city" required>
    <button type="submit">
        <i class="fa fa-search"></i> <!-- FontAwesome Search Icon -->
    </button>
</form>

    </div>
</header>
