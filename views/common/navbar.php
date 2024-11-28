<?php
// Start the session to ensure session data is accessible
require_once '../../config/constants.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>


<nav class="navbar navbar-expand-lg shadow-sm position-sticky top-0" 
     style="background: #E5989B; backdrop-filter: blur(12px); z-index: 1030; border-radius: 12px;">
    <div class="container">
        <!-- Site Branding -->
        <a class="navbar-brand text-dark d-flex align-items-center" href="../../index.php" style="font-weight: bold;">
            <img src="../../assets/logo.png" alt="Logo" style="height: 30px; margin-right: 10px;">
            <?php echo SITE_NAME; ?>
        </a>

        <!-- Toggler for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: white;"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!-- Main Navigation Links -->
                <li class="nav-item">
                    <a class="nav-link active text-dark" href="../../views/home/index.php" 
                       style="transition: all 0.3s; padding: 10px 16px; border-radius: 8px;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../../views/property/property_page.php" 
                       style="transition: all 0.3s; padding: 10px 16px; border-radius: 8px;">Properties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../../views/agent/agent.php" 
                       style="transition: all 0.3s; padding: 10px 16px; border-radius: 8px;">Agents</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- Dropdown for Logged-In Users -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" 
                           style="padding: 10px 16px; border-radius: 8px; transition: all 0.3s;">
                            <i class="bi bi-person-circle"></i> My Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" 
                            style="background: rgba(177, 110, 199, 0.3); backdrop-filter: blur(10px); border: none; border-radius: 12px;">
                            <li><a class="dropdown-item text-dark" href="../user/profile.php" style="transition: all 0.3s;">Profile</a></li>
                            <li><a class="dropdown-item text-danger" href="../../auth/logout.php" style="transition: all 0.3s;">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <!-- Login/Register Links for Guests -->
                    <li class="nav-item">
                        <a class="btn-custom" href="../../auth/login.php">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn-custom" href="../../auth/register.php">
                            <i class="bi bi-person-plus"></i> Register
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Search Bar Section -->
<div class="container mt-3">
    <div class="input-group shadow" style="border-radius: 12px; overflow: hidden;">
        <!-- Search Input with Icon -->
        <span class="input-group-text" style="background-color: #B16EC7; border: none; border-radius: 8px;">
            <i class="bi bi-search" style="color: white;"></i>
        </span>
        <input type="text" class="form-control" placeholder="Search properties, agents..." 
               style="border: none; padding: 12px; font-size: 16px; border-radius: 8px;">
    </div>
</div>
</body>
</html>

