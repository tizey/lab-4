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
#Проверяю залогинен ли вообще ХОТЬ КТО-ТО, а если кто-то залогинен - пускаю его на странцу клиента 
#проверку на то клиент ли это вообще - не делаю как так на его страницу можно пускать любую роль
if (!(isset($_SESSION['login'])) && (!(isset($_SESSION['password'])))){
    session_destroy();
    header('location:  ..\index.php');
}



#1 - admin
#2 -manager
#3 - client


if ($_SESSION['role'] == 'admin') {
    $n_rl = 1;
}

if ($_SESSION['role'] == 'manager') {
    $n_rl = 2;
}

if ($_SESSION['role'] == 'client') {
    $n_rl = 3;
}




if ($_SESSION['user']['lang'] == 'ru') {
    echo $lang[0]['ru'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[$n_rl]['ru'];
}

if ($_SESSION['user']['lang'] == 'en') {
# code...
    echo $lang[0]['en'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[$n_rl]['en'];
}

if ($_SESSION['user']['lang'] == 'ua') {

    echo $lang[0]['ua'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[$n_rl]['ua'];
       
}

if ($_SESSION['user']['lang'] == 'it') {

    echo $lang[0]['it'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[$n_rl]['it'];
}


?>
<head>
    <title>Клиент</title>
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
    <input type="submit"value="Save">
</form>

<form method="GET">
    <input type="submit" name="exit" class= "ex-b" value="Exit">
</form>
<form name = "test" action = "../data/specificuser.php" method = "post">
    <button>Your info(change)</button>
</form>
<!--Вариативное меню для роли админа на странице клиентского ЛК-->
<?php if($_SESSION['role'] == 'admin') { ?>

    <form name = "test" action = "admin.php" method = "post">
        <button>Admin</button>
    </form>
    <form name = "test" action = "manager.php" method = "post">
        <button>Manager</button>
    </form>
<?} ?>

<!--Вариативное меню для роли менеджера на странице клиентского ЛК-->

<?php if($_SESSION['role'] == 'manager') { ?>
    <form name = "test" action = "manager.php" method = "post">
        <button>Manager</button>
    </form>
<?} ?>

</form>
</body>