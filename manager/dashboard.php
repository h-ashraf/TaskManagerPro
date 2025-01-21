<?php
session_start();
if ($_SESSION['role'] !== 'Manager') {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<?php include '../includes/header.php'; ?>
<div class="container mt-4">
    <h1>Manager Dashboard</h1>
    <a href="tasks.php" class="btn btn-primary">Manage Tasks</a>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
