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
</head>
<body>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: 	#1e1f22;
    color: #fff;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.container {
    background-color: #2e3035;
    padding: 20px;
    border-radius: 8px;
    max-width: 800px;
    width: 100%;
}

form {
    display: flex;
    margin-bottom: 20px;
}
input[type="text"] {
    outline: none;
    border: none;
    flex-grow: 1;
    padding: 14px;
    background-color: #383a40;
    color: #fff;
    border-radius: 4px;
    margin-right: 10px;
}
input[type="submit"] {
    padding: 10px 20px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type="submit"]:hover {
    background-color: #218838;
}
ul {
    list-style: none;
    padding: 0;
    max-height: 90%;
}
li {
    background-color: #2b2d31;
    margin-bottom: 10px;
    padding: 14px;
    border-radius: 4px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 1px solid #1e1f22;
}
a {
    text-decoration: none;
    color: #dc3545;
}
a:hover {
    color: #c82333;
}
</style>
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