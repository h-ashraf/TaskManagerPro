<?php
session_start();
if ($_SESSION['role'] !== 'User') {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<?php include '../includes/header.php'; ?>
<div class="container mt-4">
    <h1>Welcome, <?= $_SESSION['username']; ?></h1>
    <a href="tasks.php" class="btn btn-primary">View Tasks</a>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
