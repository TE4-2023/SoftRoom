<?php

// Self explanatory, makes sure not to waste resources on useless calls
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Used as a function to be able to pass through PDO connection as param
// instead of saving a ref of it
function isUserLoggedIn($pdo) {
    
    if (!isset($_SESSION['uid'])) {
        return false;
    }
    $userID = $_SESSION['uid'];
    $userSQL = "SELECT * FROM användare WHERE personNummer VALUES :ssn";

    $stmt = $pdo->prepare($userSQL);
    $stmt->bindParam(':ssn', $userID);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result->rowCount() == 0) {
        return false;
    }
    return true;
}

