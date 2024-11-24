<?php
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check CSRF token
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token.");
    }

    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $role = htmlspecialchars($_POST['role']);

    // Validate inputs
    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required!";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        // Insert into database
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $hashedPassword,
            ':role' => $role
        ]);

        echo "Registration successful! <a href='login.php'>Login here</a>";
    } catch (PDOException $e) {
        if ($e->getCode() === '23000') { // Unique constraint violation
            echo "Email is already registered!";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    echo "Invalid request method!";
}
?>
