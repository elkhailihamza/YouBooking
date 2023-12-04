<?php
require '../page/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../page');
$dotenv->load();
$serverName = $_ENV["DB_HOST"];
$userName = $_ENV["DB_USERNAME"];
$password = $_ENV["DB_PASSWORD"];
$name = $_ENV["DB_NAME"];

$connexion = mysqli_connect($serverName, $userName, $password, $name);
if (!$connexion) {
    die("Connection failed!" . mysqli_connect_error());
}