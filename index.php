<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'Admin') {
        header("Location: admin/dashboard.php");
    } elseif ($_SESSION['role'] === 'Manager') {
        header("Location: manager/dashboard.php");
    } else {
        header("Location: user/dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Task Manager - Login</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Task Manager</h1>
    <form action="api/auth.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
    <p class="text-center mt-3">
        Don't have an account? <a href="register.php">Register here</a>.
    </p>
</div>
</body>
</html>
