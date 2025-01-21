<?php
session_start();
if ($_SESSION['role'] !== 'Admin') {
    header("Location: ../index.php");
    exit;
}
require '../database/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Tasks</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="../assets/js/scripts.js"></script>
</head>
<body>
<?php include '../includes/header.php'; ?>
<div class="container mt-4">
    <h1>Manage Tasks</h1>
    <table id="taskTable" class="table table-bordered">
        <thead>
	    <select id="filterTasks" class="form-select">
			<option value="">All Tasks</option>
			<option value="pending">Pending</option>
			<option value="completed">Completed</option>
		</select>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Assigned User</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    fetchTasks();
    function fetchTasks() {
        fetch('../api/tasks.php')
            .then(response => response.json())
            .then(tasks => {
                const tbody = document.querySelector('#taskTable tbody');
                tbody.innerHTML = '';
                tasks.forEach(task => {
                    tbody.innerHTML += `
                        <tr>
                            <td>${task.id}</td>
                            <td>${task.title}</td>
                            <td>${task.username}</td>
                            <td>${task.status}</td>
                            <td>
                                <button class="btn btn-success mark-completed" data-id="${task.id}">Complete</button>
                                <button class="btn btn-danger delete-task" data-id="${task.id}">Delete</button>
                            </td>
                        </tr>
                    `;
                });
            });
    }
});
</script>
</body>
</html>
