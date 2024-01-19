<?php
require '../connect.php';

// Why isnt this split up in functions -apfrog
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $roleID = $_POST['roleID'];
    $lastnameID = $_POST['lastname'];
    $personnummer = $_POST['personnummer'];
    //$hashedPassword = password_hash($password, PASSWORD_BCRYPT); salting happens in sql
/////////////////////////////////////////////////////////////////////////////
    $queryCheckEmail = "SELECT användarID FROM användare WHERE email = :email";
    $stmtCheckEmail = $pdo->prepare($queryCheckEmail);
    $stmtCheckEmail->bindParam(':email', $email);
    $stmtCheckEmail->execute();

    if ($stmtCheckEmail->rowCount() > 0) {
        echo "Email is already in use. Please choose a different email.";
        header("Location: ../../skapa-konto");
        exit();
    }
/////////////////////////////////////////////////////////////////////////////
    $queryCheckFirstName = "SELECT namnID FROM namn WHERE namn = :username";
    $stmtFirstName = $pdo->prepare($queryCheckFirstName);
    $stmtFirstName->bindParam(':username', $username);
    $stmtFirstName->execute();

    if ($stmtFirstName->rowCount() > 0) {
        $row = $stmtFirstName->fetch(PDO::FETCH_ASSOC);
        $username = $row['namnID'];
    } else {
        $insertFirstNameQuery = $pdo->prepare("INSERT INTO namn (namn) VALUES (:username)");
        $insertFirstNameQuery->bindParam(':username', $username);
        $insertFirstNameQuery->execute();

        $username = $pdo->lastInsertId();
    }
/////////////////////////////////////////////////////////////////////////////
    $queryCheckLastName = "SELECT namnID FROM namn WHERE namn = :lastnameID";
    $stmtLastName = $pdo->prepare($queryCheckLastName);
    $stmtLastName->bindParam(':lastnameID', $lastnameID);
    $stmtLastName->execute();

    if ($stmtLastName->rowCount() > 0) {
        $row = $stmtLastName->fetch(PDO::FETCH_ASSOC);
        $lastnameID = $row['namnID'];
    } else {
        $insertLastNameQuery = $pdo->prepare("INSERT INTO namn (namn) VALUES (:lastnameID)");
        $insertLastNameQuery->bindParam(':lastnameID', $lastnameID);
        $insertLastNameQuery->execute();

        $lastnameID = $pdo->lastInsertId();
    }
/////////////////////////////////////////////////////////////////////////////
    $query = $pdo->prepare("INSERT INTO användare (namnID, email, rollID, efternamnID, personNummer, lösenord) 
                            VALUES (:nameID, :email, :roleID, :lastnameID, :personnummer,SHA(:password))");
    $query->bindParam(':nameID', $username, PDO::PARAM_INT);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':roleID', $roleID, PDO::PARAM_INT);
    $query->bindParam(':lastnameID', $lastnameID, PDO::PARAM_INT);
    $query->bindParam(':personnummer', $personnummer, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    

    if ($query->execute()) {
        echo "Registration successful! Redirecting to login page...";
        header("Location: ../../logga-in");
        exit();
    } else {
        echo "Error! Registration failed.";
    }
}
?>
