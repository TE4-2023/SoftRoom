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
    $roleID = 1; // Change this to get from post, temporary placeholder
    $ssn = htmlspecialchars($_POST["ssn"], ENT_QUOTES, 'UTF-8');

    // Get DB connection variable
    $pdo = getConnectionPDO();

    $fnID = getNameID($fn,$pdo);
    $enID = getNameID($en,$pdo);

    if (emailAlreadyRegistered($email, $pdo)) {
        header("Location: ../../skapa-konto/?error=E-post är redan registrerad");
    }
    if (ssnAlreadyInUse($ssn, $pdo)) {
        // This is not displayed as an error due to privacy reasons
        header("Location: ../../skapa-konto?error=Kontakta din administratör för att fixa detta fel");
    }

    // Add user into db
    $userSQL = "INSERT INTO användare (namnID, email, rollID, efternamnID, personNummer, lösenord) VALUES (:fnID, :email, :roleID, :enID, :ssn, SHA(:pwd))";

    $query = $pdo->prepare($userSQL);
    $data = array(
        ':fnID' => $fnID,
        ':email' => $email,
        ':roleID' => $roleID,
        ':enID' => $enID,
        ':ssn' => $ssn,
        ':pwd' => $password
    );

    $query->execute($data);

    header("Location: ../../logga-in");
}

function ssnAlreadyInUse($ssn, $pdo) {
    $ssnExistsSQL = "SELECT * FROM användare WHERE personNummer = :ssn";

    $query = $pdo->prepare($ssnExistsSQL);
    $data = array(
        ':ssn' => $ssn
    );

    $query->execute($data);

    if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $query = null;
        return true;
    }
    $query = null;
    return false;
}

function emailAlreadyRegistered($email, $pdo) {
    $emailExistsSQL = "SELECT * FROM användare WHERE email = :email";

    $query = $pdo->prepare($emailExistsSQL);
    $data = array(
        ':email' => $email
    );

    $query->execute($data);

    if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $query = null;
        return true;
    }
    $query = null;
    return false;
}

function insertName($name, $pdo) {
    $nameSQL = "INSERT INTO namn(name) VALUES (:name)";

    $query = $pdo->prepare($nameSQL);
    $data = array(
        ':name' => $name
    );

    $query->execute($data);
    $query = null;
}

function getNameID($name, $pdo) {
    $nameID = null;
    $nameExistsSQL = "SELECT nameID FROM namn WHERE name = :name";

    $query = $pdo->prepare($nameExistsSQL);
    $data = array(
        ':name' => $name
    );

    $query->execute($data);

    if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $nameID = $row['nameID'];
    }
    else {
        $query = null;
        insertName($name,$pdo);
        $nameID = getNameID($name,$pdo);
    }
    $query = null;

    return $nameID;
}