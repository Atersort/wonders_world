<?php
session_start();

if (empty($_SESSION['auth'])) {
    header('Location: /');
}

include "db_connect.php";

if (!empty($_POST['name_wonder']) and !empty($_POST['age_wonder'] and !empty($_POST['description_wonder']))) {
    $name = $_POST['name_wonder'];
    $age = $_POST['age_wonder'];
    $description = $_POST['description_wonder'];
    $query = new DB_connect();
    $query->addWonder($name, $age, $description);
} else {
    echo "Заполните все поля";
}

?>
<!doctype html>
<html lang="en">
<?php include 'templates/head.php'?>
<body class="body">
<?php include 'templates/header.php' ?>
<form class="add_wonder" method="post">
    <label for="name_wonder">Имя объекта</label>
    <input name="name_wonder" type="text" class="add_wonder__name">
    <label for="age_wonder">Возраст объекта</label>
    <input name="age_wonder" type="number" class="add_wonder__age">
    <label for="description_wonder">Возраст объекта</label>
    <input name="description_wonder" type="text" class="add_wonder__description">
    <button type="submit" class="button add_wonder_btn">Submit</button>
</form>
</body>
</html>
