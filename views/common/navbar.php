<!-- views/common/navbar.php -->

<?php
// Start the session to ensure session data is accessible

require_once '../../config/constants.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <!-- Site Branding -->
        <a class="navbar-brand" href="../../index.php">
            <img src="../../assets/logo.png" alt="Logo" style="height: 30px; margin-right: 10px;">
            <?php echo SITE_NAME; ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!-- Main Navigation Links -->
                <li class="nav-item">
                    <a class="nav-link active" href="../../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../views/property/property_page.php">Properties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../views/agent/agent.php">Agents</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- Dropdown for Logged-In Users -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> My Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="../user/profile.php">Profile</a></li>
                            <li><a class="dropdown-item text-danger" href="../../auth/logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <!-- Login/Register Links for Guests -->
                    <li class="nav-item">
                        <a class="nav-link" href="../../auth/login.php"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../auth/register.php"><i class="bi bi-person-plus"></i> Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
