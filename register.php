<?php

$login = $_POST['login'];
$password = $_POST['password'];

$localhost = 'MySQL-8.2';
$db='wonders_world';
$user = 'root';
$password = '';

$dsn = "mysql:host=$localhost;dbname=$db";

$pdo = new PDO($dsn, $user, $password);

$statement = $pdo->prepare("INSERT INTO users ($login, $password) VALUES (:login, :password)")

?>

<!doctype html>
<html lang="en">
<?php include 'templates/head.php'?>
<body>
<?php include 'templates/header.php'?>
<form action="" method="POST">
    <input name="login">
    <input name="password" type="password">
    <input type="submit">
</form>
</body>
</html>

