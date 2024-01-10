<?php

// Check if session is valid
// function isUserLoggedIn() {
    
//     if ($_SESSION['uid'].isset) {
//         // maths this to db to check if login is valid
//         return true;
//     }
//     return false;
// }

// Add function to get users ID from session uid

// Get a users full legal name from user ID
function getName($userID, $pdo) {
    // Hämta användarens namn från databasen
    $userSQL = "SELECT anv.namnID, anv.efternamnID, fn.namn AS fornamn, en.namn AS efternamn FROM användare AS anv JOIN namn AS fn ON anv.namnID = fn.ID JOIN namn AS en ON anv.efternamnID = en.ID WHERE anv.användarID = :userID";

    $stmt = $pdo->prepare($userSQL);
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $result['fornamn'] . " " . $result['efternamn'];

    return $name;
}

?>