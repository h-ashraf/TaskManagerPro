<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Task Manager Pro</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <span class="navbar-text">Welcome, <?= $_SESSION['username']; ?>!</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../api/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
