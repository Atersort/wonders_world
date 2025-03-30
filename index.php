<?php
session_start();
require './vendor/autoload.php';

$client = new GuzzleHttp\Client();

//start pagination
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
<?php include 'templates/head.php'?>
<body class="body">
<?php include 'templates/header.php' ?>
<main class="hero">
    <h1 class="hero__h1">Wonders of the World</h1>
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
