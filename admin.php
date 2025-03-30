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
<div class="tabs">
    <ul class="tabs__container">
        <li data-tab="tab-1" class="tab__title">Add Wonders</li>
        <li data-tab="tab-2" class="tab__title">Moderation comments</li>
    </ul>
    <div class="tabs__wrapper">
        <div id="tab-1" class="tab__content hidden-tab-content">
            <h2 class="tab__h2">Добавить объект</h2>
            <form class="add_wonder" method="post">
                <label for="name_wonder">Имя объекта</label>
                <input name="name_wonder" type="text" class="add_wonder__name">
                <label for="age_wonder">Возраст объекта</label>
                <input name="age_wonder" type="number" class="add_wonder__age">
                <label for="description_wonder">Возраст объекта</label>
                <input name="description_wonder" type="text" class="add_wonder__description">
                <button type="submit" class="button add_wonder_btn">Submit</button>
        </div>
        <div id="tab-2" class="tab__content hidden-tab-content">
            <h2 class="tab__h2">Модерация комментариев</h2>
            div
        </div>
    </div>
</div>
</form>
<footer>

</footer>
<script src="./script/admin_panel.js"></script>
</body>
</html>
