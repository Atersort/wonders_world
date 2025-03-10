<?php
require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();

$response = $client->request('GET', 'https://www.world-wonders-api.org/v0/wonders/');


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/image/pin.png">
    <link rel="stylesheet" href="./style/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Wonders World</title>
</head>
<body>
<header class="header">
    <div class="header-logo"><a href="index.php/">Wonders World</a></div>

    <nav class="nav">
        <ul class="nav__container">
            <li class="nav__container__item"><a class="container__item-link" href="index.php">Home</a></li>
            <li class="nav__container__item"><a class="container__item-link" href="wonders.php">Wonders</a></li>
        </ul>
    </nav>
</header>
<main class="hero">
    <h1>Wonders of the World</h1>
    <div class="container">
    <?php

    $wonders = json_decode($response->getBody(), true);
    $i = 0;
    foreach ($wonders as $wonder) {

        $i += 1;
        $image = $wonder['links']['images'][0];
        $name = $wonder['name'];
        $time_period = $wonder['time_period'];
        $name_wonders = str_replace(' ', '-', strtolower($name));
        echo "<div class='container__item'>
<img class='container__item__img' src='{$image}' alt=''><br>
<a href='https://www.world-wonders-api.org/v0/wonders/name/{$name_wonders}'>$name</a></div>";
    }
    ?>
        </div>
</main>
</body>
</html>
