<?php
require 'db_connection.php';

function getAgentByPropertyId($property_id) {
    global $conn;

    $sql = "SELECT agents.* 
            FROM agents 
            JOIN properties ON agents.id = properties.agent_id
            WHERE properties.id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $property_id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_assoc();
}
?>
