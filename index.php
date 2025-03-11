<?php
require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();

$response = $client->request('GET', 'https://www.world-wonders-api.org/v0/wonders/');
$wonders = json_decode($response->getBody(), true);

$per_page = 6;

$page = $_GET['page'] ?? 1;

if ($page < 1) {
    $page = 1;
}

$count_wonders = count($wonders);
$total_pages = ceil($count_wonders / $per_page);

$offset = ($page - 1) * $per_page;

$to_page_wonders = array_slice($wonders, $offset, $per_page);

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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

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
        if (empty($to_page_wonders)) {
            echo "<h1>Data not found</h1>";
        } else {
            foreach ($to_page_wonders as $wonder) {

                $image = $wonder['links']['images'][0];
                $name = $wonder['name'];
                $time_period = $wonder['time_period'];
                $name_wonders = str_replace(' ', '-', strtolower($name));
                echo "<div class='container__item'>
<img class='container__item__img' src='{$image}' alt=''><br>
<a href='/wonder.php?type={$name_wonders}'>$name</a></div>";
            }
        }
        ?>
    </div>

    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="index.php?page=<?php echo $page - 1; ?>">Previous</a>
        <?php endif; ?>
        <span><?php echo "Page " . $page . " of " . "$total_pages " ?></span>

        <?php if ($page < $total_pages): ?>
            <a href="index.php?page=<?php echo $page + 1; ?>"> Next</a>
        <?php endif; ?>
    </div>
</main>
</body>
</html>
