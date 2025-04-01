<?php

require_once "db_connect.php";

$page = $_GET['page'];
$id = $_GET['id'];

$connection = new DB_connect();
$delete = $connection->deleteComments($id);

header("Location: admin.php");
die;