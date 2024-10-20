<?php
session_start();

if (!isset($_SESSION['todo_list'])) {
    $_SESSION['todo_list'] = [];
}

if (isset($_POST['add_task'])) {
    $task = htmlspecialchars($_POST['task']);
    if (!empty($task)) {
        $_SESSION['todo_list'][] = $task;
    }
}

if (isset($_GET['remove_task'])) {
    $task_id = (int)$_GET['remove_task'];
    unset($_SESSION['todo_list'][$task_id]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>

<div class="container">
    <h1>📝 To-Do List</h1>
    <ul>
        <?php foreach ($_SESSION['todo_list'] as $id => $task) : ?>
            <li>
                <?php echo $task; ?>
                <a href="?remove_task=<?php echo $id; ?>">Remove</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <form action="" method="POST">
        <input type="text" name="task" placeholder="Enter a new task" required>
        <input type="submit" name="add_task" value="Add Task">
    </form>
</div>
</body>
</html>