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
    $userSQL = "SELECT * FROM användare WHERE personNummer = :ssn";

    $stmt = $pdo->prepare($userSQL);
    $stmt->bindParam(':ssn', $userID);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        return false;
    }
    return true;
}

function isTeacherRole($pdo) {
    
    if (!isset($_SESSION['uid'])) {
        return false;
    }
    $userID = $_SESSION['uid'];
    $userSQL = "SELECT * FROM användare WHERE personNummer = :ssn";

    $stmt = $pdo->prepare($userSQL);
    $stmt->bindParam(':ssn', $userID);
    $stmt->execute();

    if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($result['rollID'] == 2) {
            return true;
        }
    }
    return false;
}


function isStudentRole($pdo) {
    
    if (!isset($_SESSION['uid'])) {
        return false;
    }
    $userID = $_SESSION['uid'];
    $userSQL = "SELECT * FROM användare WHERE personNummer = :ssn";

    $stmt = $pdo->prepare($userSQL);
    $stmt->bindParam(':ssn', $userID);
    $stmt->execute();

    if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($result['rollID'] == 1) {
            return true;
        }
    }
    return false;
}

function isAdminRole($pdo) {
    
    if (!isset($_SESSION['uid'])) {
        return false;
    }
    $userID = $_SESSION['uid'];
    $userSQL = "SELECT * FROM användare WHERE personNummer = :ssn";

    $stmt = $pdo->prepare($userSQL);
    $stmt->bindParam(':ssn', $userID);
    $stmt->execute();

    if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($result['rollID'] == 3) {
            return true;
        }
    }
    return false;
}