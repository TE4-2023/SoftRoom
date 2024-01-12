<?php
// Only use this script to register the user, 
// it is not intended for any other use case.

include_once "../connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    //Grabbing the data
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
    $fn = htmlspecialchars($_POST["fn"], ENT_QUOTES, 'UTF-8');
    $en = htmlspecialchars($_POST["en"], ENT_QUOTES, 'UTF-8');
    $ssn = htmlspecialchars($_POST["ssn"], ENT_QUOTES, 'UTF-8');

    // Get DB connection variable
    $pdo = getConnectionPDO();

    $userSQL = "INSERT INTO användare (email, personNummer, lösenord) VALUES (:email, :ssn, SHA(:pwd))";

    $stmt = $pdo->prepare($userSQL);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':email',$ssn);
    $stmt->bindParam(':pwd',$password);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    header("Location: ../logga-in");
}