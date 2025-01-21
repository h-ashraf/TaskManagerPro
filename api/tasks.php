<?php
require '../database/connection.php';
session_start();

// Add a new task
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $user_id = $_POST['user_id'] ?? $_SESSION['user_id']; // Admins/Managers can assign tasks

    $stmt = $db->prepare("INSERT INTO tasks (user_id, title, description, due_date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$user_id, $title, $description, $due_date]);

    echo json_encode(['message' => 'Task added successfully']);
}

// Fetch tasks with filters
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];
    $filter = $_GET['filter'] ?? '';

    $query = "SELECT tasks.*, users.username FROM tasks 
              JOIN users ON tasks.user_id = users.id";

    if ($role === 'User') {
        $query .= " WHERE tasks.user_id = $user_id";
    }

    if ($filter === 'completed') {
        $query .= ($role === 'User' ? ' AND' : ' WHERE') . " tasks.status = 'Completed'";
    } elseif ($filter === 'pending') {
        $query .= ($role === 'User' ? ' AND' : ' WHERE') . " tasks.status = 'Pending'";
    }

    $stmt = $db->query($query);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

// Update task
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $data);

    $id = $data['id'];
    $title = $data['title'];
    $description = $data['description'];
    $due_date = $data['due_date'];
    $status = $data['status'];

    $stmt = $db->prepare("UPDATE tasks SET title = ?, description = ?, due_date = ?, status = ? WHERE id = ?");
    $stmt->execute([$title, $description, $due_date, $status, $id]);

    echo json_encode(['message' => 'Task updated successfully']);
}

// Delete task
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);

    $id = $data['id'];

    $stmt = $db->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->execute([$id]);

    echo json_encode(['message' => 'Task deleted successfully']);
}
?>
