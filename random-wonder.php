<?php
require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();

$response = $client->request('GET', 'https://www.world-wonders-api.org/v0/wonders/random');

$parse = json_decode($response->getBody(), true);


?>
<!doctype html>
<html lang="en">

<?php include 'templates/head.php'; ?>

<body class="body">
<?php include 'templates/header.php'; ?>
<main class="hero">
    <h1 class="hero__h1"><?= $parse['name'] ?></h1>
    <div class="wonders__info">
        <p class="wonders__info_year">Build Year: <?= $parse['build_year'] ?></p>
        <div class="wonders__info_links">
                <a class="wonders__info_link" target="_blank" href="<?= $parse['links']['wiki'] ?>">Wiki</a>
                <a class="wonders__info_link" target="_blank" href="<?= $parse['links']['britannica'] ?>">Britannica</a>
                <a class="wonders__info_link" target="_blank" href="<?= $parse['links']['google_maps'] ?>">Google maps</a>
                <a class="wonders__info_link" target="_blank" href="<?= $parse['links']['trip_advisor'] ?>">Trip Advisor</a>
        </div>
        <p class="wonders__info_summary"><?= $parse['summary'] ?></p>
        <div class="slider__wrapper">
            <div class="slider">
                <img src="" alt="">
                <button type="button" class="button_slider slider__prev"><</button>
                <button type="button" class="button_slider slider__next">></button>
                <?php foreach ($parse['links']['images'] as $image): ?>
                    <img class="slider__slide" src="<?= $image ?>" alt="">
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="./script/script.js"></script>
</main>
</body>
</html>