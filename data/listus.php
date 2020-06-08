<html lang="ru">
<head>
    <title>Админ-панель</title>
</head>
<body>
<?php
session_start();
require_once '../vendor/connect.php';
$sql = mysqli_query($link, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['red_id']}");

if (isset($_GET['red_id'])) {
    $sql = mysqli_query($link, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['red_id']}");
    $user = mysqli_fetch_array($sql);
}
?>
<table border = '1' >
    <tr >
        <td > id</td >
        <td > Name</td >
        <td > Surname</td >
        <td > Login</td >
        <td > Password</td >
        <td > Language</td >
        <td > Role</td >
        <td > Удаление</td >
        <td > Редактирование</td >
    </tr >

    <?php
    $sql = mysqli_query($link, 'SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users`');
    while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
            "<td>{$result['id']}</td>" .
            "<td>{$result['name']}</td>" .
            "<td>{$result['surname']}</td>" .
            "<td>{$result['login']}</td>" .
            "<td>{$result['password']}</td>" .
            "<td>{$result['lang']}</td>" .
            "<td>{$result['role']}</td>" .
            "<td><a href='?del_id={$result['id']}'>Удалить</a></td>" .
            "<td><a href='?red_id={$result['id']}'>Изменить</a></td>" .
            '</tr>';
    }
    ?>
</table>
<form action = '../users/admin.php'>
    <input style="background-color: black; color: white" type = 'submit' value = 'Back to admin-ka'>
</form>
</body>
</html>