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
    <title>Admin - Manage Users</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="../assets/js/scripts.js"></script>
</head>
<body>
<?php include '../includes/header.php'; ?>
<div class="container mt-4">
    <h1>Manage Users</h1>
    <table id="userTable" class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    fetchUsers();
    function fetchUsers() {
        fetch('../api/users.php')
            .then(response => response.json())
            .then(users => {
                const tbody = document.querySelector('#userTable tbody');
                tbody.innerHTML = '';
                users.forEach(user => {
                    tbody.innerHTML += `
                        <tr>
                            <td>${user.id}</td>
                            <td>${user.username}</td>
                            <td>${user.email}</td>
                            <td>${user.role}</td>
                            <td>
                                <button class="btn btn-warning update-role" data-id="${user.id}">Change Role</button>
                                <button class="btn btn-danger delete-user" data-id="${user.id}">Delete</button>
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
