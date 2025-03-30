<?php
session_start();

$user_login = $_POST['login'] ?? '';
$user_pass = $_POST['password'] ?? '';

include 'db_connect.php';

$query = new DB_connect();

if (!empty([$user_login]) and !empty($user_pass)) {
    $result = $query->singIn($user_login, $user_pass);
    if (is_array($result) and $result['login'] === $user_login and $result['password'] === $user_pass) {
        $_SESSION['auth'] = true;
        $_SESSION['user_login'] = $user_login;
    } else {
        echo "чет не так";
    }
}

?>
<!doctype html>
<html lang="en">
<?php include 'templates/head.php'?>
<body class="body">

<?php include 'templates/header.php'?>
<main class="hero">
<form class="sign__in_form" action="" method="POST">
    <label for="login">Login</label>
    <input name="login">
    <label for="login">Password</label>
    <input name="password" type="password">
    <input type="submit">
</form>
</main>
</body>
</html>
