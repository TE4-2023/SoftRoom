<?php
// Connect to db
include_once "_includes/connect.php";

// Check if user is logged in
include_once "_includes/auth.php";

$result = isUserLoggedIn(getConnectionPDO());

if (!$result) {
    header("Location: logga-in");
} else {
    header("Location: startsida");
}

//   http://localhost:8080/SoftRoom/