<?php
// Only use this script to set session the uid variable, 
// it is not intended for any other use case.

include_once "../connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    //Grabbing the data
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    // Get DB connection variable
    $pdo = getConnectionPDO();

    $userSQL = "SELECT * FROM användare WHERE email = :email AND lösenord = SHA(:pwd)";

    $stmt = $pdo->prepare($userSQL);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':pwd',$password);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result->rowCount() == 0) {
        $stmt = null;
        header("Location: ../logga-in?error=notfound"); //test
    }
    else {
        $_SESSION["uid"] = $result->fetch()['personNummer'];
        header("Location: ../startsida");
    }
}
else {
    header("Location: ../logga-in");
}