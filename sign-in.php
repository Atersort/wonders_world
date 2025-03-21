<?php
session_start();

$user_login = $_POST['login'] ?? '';
$user_pass = $_POST['password'] ?? '';

include 'db_connect.php';

$query = new DB_connect();

if (!empty([$user_login]) and !empty($user_pass)) {
    $result = $query->singIn($user_login, $user_pass);
    if ($result['login'] === $user_login and $result['password'] === $user_pass) {
        echo "успеъ";
    } else {
        echo "чет не так";
    }
}

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
