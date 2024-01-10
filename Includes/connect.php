<?php
// Database login
$host = "localhost";
$user = "root";
$password = "";

$database_name = "softroom";

// PHP Data Object used to log in to Database
$pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
));
?>