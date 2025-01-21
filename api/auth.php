<?php
require '../database/connection.php';
session_start();

// Registration
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $db->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'User')");
    $stmt->execute([$username, $email, $password]);

    header("Location: ../index.php");
}

// Login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['username'] = $user['username'];

        if ($user['role'] == 'Admin') {
            header("Location: ../admin/dashboard.php");
        } elseif ($user['role'] == 'Manager') {
            header("Location: ../manager/dashboard.php");
        } else {
            header("Location: ../user/dashboard.php");
        }
    } else {
        echo "Invalid credentials!";
    }
}
?>
