<?php
require '../database/connection.php';
session_start();

// Ensure only admins and managers can access
if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'Admin' && $_SESSION['role'] !== 'Manager')) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

// Fetch All Users
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $db->query("SELECT id, username, email, role, created_at FROM users");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

// Update User Role
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $data);
    $userId = $data['id'];
    $newRole = $data['role'];

    $stmt = $db->prepare("UPDATE users SET role = ? WHERE id = ?");
    $stmt->execute([$newRole, $userId]);

    echo json_encode(['message' => 'User role updated successfully']);
}

// Delete User
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $userId = $data['id'];

    $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$userId]);

    echo json_encode(['message' => 'User deleted successfully']);
}
?>
