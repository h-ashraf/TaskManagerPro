<?php
session_start();
if ($_SESSION['role'] !== 'Admin') {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<?php include '../includes/header.php'; ?>
<div class="container mt-4">
    <h1>Admin Dashboard</h1>
    <a href="users.php" class="btn btn-primary">Manage Users</a>
    <a href="tasks.php" class="btn btn-secondary">Manage Tasks</a>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
