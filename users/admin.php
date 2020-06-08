<?php

session_start();

include '../resources/lang.php';

#Ловлю методом GET то что пользователь нажал на exit
if($_GET["exit"])
{
    session_destroy(); #разрушаю сессию
    header("Location: ..\index.php"); #перекидываю пользователя на страницу ввода л/п
}

#Ловлю методом GET то что пользователь нажал на кнопку смены языка
if (isset($_GET['lang'])){
    $_SESSION['user']['lang'] = $_GET['lang'];
}

#Проверяю залогинен ли вообще ХОТЬ КТО-ТО, а так же если это не админ - не пускаю его
if (!(isset($_SESSION['login'])) && (!(isset($_SESSION['password'])))){
    session_destroy();
    header('location:  ..\index.php');
}


if ($_SESSION['user']['lang'] == 'ru') {
    echo $lang[0]['ru'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[1]['ru'];
}

if ($_SESSION['user']['lang'] == 'en') {
# code...
    echo $lang[0]['en'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[1]['en'];
}

if ($_SESSION['user']['lang'] == 'ua') {

    echo $lang[0]['ua'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[1]['ua'];

}

if ($_SESSION['user']['lang'] == 'it') {

    echo $lang[0]['it'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[1]['it'];
}



?>

<head>
    <title>Админ</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    

<form >
    <select name="lang" method="GET">
        <option value="ru">Русский</option>
        <option value="ua">Українська</option>
        <option value="en">English</option>
        <option value="it">Italian</option>
    </select>
    <input type="submit" value="Save">
</form>

<form method="GET">
        <input type="submit" class= "ex-b" name="exit"  value="Exit">
    </form>

    <form name = "test" action = "manager.php" method = "post">
        <button>Manager</button>
    </form>
    <form name = "test" action = "client.php" method = "post">
        <button>Client</button>
    </form>
    <form name = "test" action = "../data/deleteuser.php" method = "post">
        <button>Delete</button>
    </form>
    <form name = "test" action = "../data/tableuser.php" method = "post">
        <button>Edit</button>
    </form>
    <form name = "test" action = "../data/addusers.php" method = "post">
        <button>Add</button>
    </form>
<form name = "test" action = "../data/search.php" method = "post">
    <button>Search user</button>
</form>

</body> 
