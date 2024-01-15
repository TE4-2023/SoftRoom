<?php   
try{
    $host = "localhost";
    $user = "root";
    $password = "";
    $database_name = "softroom";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ));
}catch(Exception $e){
    echo "Kunde inte ansluta till databasen : ".$e->getMessage();
}


?>