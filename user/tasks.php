<?php
session_start();
if ($_SESSION['role'] !== 'User') {
    header("Location: ../index.php");
    exit;
}
require '../database/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Tasks</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<?php include '../includes/header.php'; ?>
<div class="container mt-4">
    <h1>My Tasks</h1>
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
            <th>Description</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $user_id = $_SESSION['user_id'];
        $stmt = $db->prepare("SELECT * FROM tasks WHERE user_id = ?");
        $stmt->execute([$user_id]);
        while ($task = $stmt->fetch()) {
            echo "<tr>
                    <td>{$task['id']}</td>
                    <td>{$task['title']}</td>
                    <td>{$task['description']}</td>
                    <td>{$task['status']}</td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
