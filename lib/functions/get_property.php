<?php
require 'db_connection.php';

function getAllProperties() {
    global $conn;
    $sql = "SELECT * FROM properties";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getPropertyById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM properties WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}
?>
