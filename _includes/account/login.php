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

    $query = $pdo->prepare($userSQL);
    $data = array(
        ':email' => $email,
        ':pwd' => $password
    );

    $query->execute($data);
    
    if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        session_start();
        $_SESSION["uid"] = $row['personNummer'];
        $_SESSION["användarID"] = $row['användarID'];
        $query = null;
        if($row['rollID'] == 1){
            header("Location: ../../startsida");
        }
        if($row['rollID'] == 2){
            header("Location: ../../lärare/startsida");
        }

    }
    else {
        $query = null;

        header("Location: ../../logga-in?error=notfound"); //test
    }
}
else {
    header("Location: ../../logga-in");
}