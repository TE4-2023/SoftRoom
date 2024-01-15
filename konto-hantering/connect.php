<?php
$host = "localhost";
$user = "root";
$password = "";
$database_name = "softroom";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ));
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
