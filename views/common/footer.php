<?php
// views/common/footer.php
 // Ensure session is started to access session variables
?>
<footer class="bg-dark text-white text-center py-3 mt-4">
    <p>&copy; <?php echo date('Y'); ?> 
    <?php
    // Check if user is logged in and display role
    if (isset($_SESSION['user_role'])) {
        echo ucfirst($_SESSION['user_role']); // Capitalize the first letter of the role
    } else {
        echo "Guest"; // Default for non-logged-in users
    }
    ?>. All rights reserved.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
