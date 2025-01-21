<?php
session_start();
if ($_SESSION['role'] !== 'Manager') {
    header("Location: ../index.php");
    exit;
}
require '../database/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manager - Manage Tasks</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<?php include '../includes/header.php'; ?>
<div class="container mt-4">
    <h1>Manage Tasks</h1>
    <table id="taskTable" class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Assigned User</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $stmt = $db->query("SELECT tasks.*, users.username FROM tasks JOIN users ON tasks.user_id = users.id");
        while ($task = $stmt->fetch()) {
            echo "<tr>
                    <td>{$task['id']}</td>
                    <td>{$task['title']}</td>
                    <td>{$task['username']}</td>
                    <td>{$task['status']}</td>
                    <td>
                        <button class='btn btn-success mark-completed' data-id='{$task['id']}'>Complete</button>
                        <button class='btn btn-danger delete-task' data-id='{$task['id']}'>Delete</button>
                    </td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
