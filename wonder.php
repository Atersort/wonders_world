<?php

require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();

$type_wonder = $_GET['type'];

$response = $client->request('GET', "https://www.world-wonders-api.org/v0/wonders/name/$type_wonder");

$wonder = json_decode($response->getBody(), true);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $wonder['name'] ?></title>
</head>
<body>
<header></header>
<main>
    <h1><?php echo $wonder['name'] ?></h1>
    <div>
        <p><?php echo $wonder['location'] ?></p>
        <p><?php echo $wonder['build_year'] ?></p>
        <p><?php echo $wonder['time_period'] ?></p>
        <p><?php echo $wonder['summary'] ?></p>
    </div>
    <div>
        <?php
        $img_array = $wonder['links']['images'];

        foreach ($img_array as $img) {
            echo "<img src='$img' alt='' style='height: 300px; height: 300px'>";
        }
        ?>
    </div>
</main>
</body>
</html>


