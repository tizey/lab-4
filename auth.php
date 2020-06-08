<?php
session_start();
$link = mysqli_connect('localhost', 'root' , '','bd');
$login = $_POST["login"];
$password = $_POST["password"];


$verify_user = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' ");
$_SESSION['check_user'] = $verify_user;
$user = mysqli_fetch_assoc($verify_user);

$_SESSION['user'] = [
    "id" => $user['id'],
    "name" => $user['name'],
    "surname" => $user['surname'],
    "login" => $user['login'],
    "password" => $user['password'],
    "role" => $user['role'],
    "lang" => $user['lang']
];

#Проверяю есть ли такой пользователь ВООБЩЕ
if ((mysqli_num_rows($verify_user) > 0))
{

    #Передаю в сессию значения логина и пароля которые совпали с комбинацией с файла users(дальше работаю с сессионными данными)
$_SESSION['login'] = $login;
$_SESSION['password'] = $password;

#Проверяю совпадает ли роль залогиненого пользователя с фиксированной ролью "admin"
if ($user['role'] == 'admin'){
    header('Location: users\admin.php'); #Если совпало - перекидываю на админскую страницу
}

#Проверяю совпадает ли роль залогиненого пользователя с фиксированной ролью "manager"
if ($user['role'] == 'manager'){
    header('Location: users\manager.php'); #Если совпало - перекидываю на менеджерскую страницу
}

#Проверяю совпадает ли роль залогиненого пользователя с фиксированной ролью "client"
if ($user['role'] == 'client'){
    header('Location: users\client.php'); #Если совпало - перекидываю на клиентскую страницу
}

}

