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
    <title>Wonders World</title>
</head>
<body>
<header>
    <h1>Wonders World</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="wonders.php">Wonders</a></li>
        </ul>
    </nav>
</header>
<main>
    <ul>
    <?php

    $wonders = json_decode($response->getBody(), true);
    $i = 0;
    foreach ($wonders as $wonder) {

        $i += 1;
        $image = $wonder['links']['images'][0];
        $name = $wonder['name'];
        $time_period = $wonder['time_period'];
        $name_wonders = str_replace(' ', '-', strtolower($name));
        echo "<li>
<img src='{$image}' alt='' style='width: 200px; height: 200px'>
<a href='https://www.world-wonders-api.org/v0/wonders/name/{$name_wonders}'>$name: $time_period</a></li>";
    }
    ?>
    </ul>
</main>
</body>
</html>
