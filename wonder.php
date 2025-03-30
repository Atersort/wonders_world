<?php

require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();

$type_wonder = $_GET['type'];

$response = $client->request('GET', "https://www.world-wonders-api.org/v0/wonders/name/$type_wonder");

$wonder = json_decode($response->getBody(), true);

include 'db_connect.php';

$name_user = $_POST['name_user'] ?? "";
$text_user = $_POST['text_user'] ?? "";
$id_wonder = $_GET["type"] ?? "";

if (!empty($name_user) and !empty($text_user)) {
    $query = new DB_connect();
    $query->addComments($name_user, $text_user, $id_wonder);
}

?>
<!doctype html>
<html lang="en">
<?php include 'templates/head.php' ?>
<body class="body">
<?php include 'templates/header.php' ?>
<main class="hero">
    <h1 class="hero__h1"><?php echo $wonder['name'] ?></h1>
    <div class="wonders__info">
        <div class="wonders__info_links">
            <p><?php echo $wonder['location'] ?></p>
            <p><?php echo $wonder['build_year'] ?></p>
            <p><?php echo $wonder['time_period'] ?></p>
            <p class="wonders__info_summary"><?php echo $wonder['summary'] ?></p>
        </div>
    </div>
    <div>
        <div class="slider__wrapper">
            <div class="slider">
                <img src="" alt="">
                <button type="button" class="button_slider slider__prev"><</button>
                <button type="button" class="button_slider slider__next">></button>
                <?php foreach ($wonder['links']['images'] as $image): ?>
                    <img class="slider__slide" src="<?= $image ?>" alt="">
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <section class="comments">
        <h2>Комментарии</h2>
        <div class="comments_form">
            <form method="post">
                <label for="name_user">Имя пользователя</label>
                <input name="name_user" type="text">
                <label for="text_user">Комментарий</label>
                <textarea name="text_user" id="" cols="30" rows="10"></textarea>
                <button>Отправить</button>
            </form>
        </div>

    </section>
</main>

<script src="./script/script.js"></script>
</body>
</html>


