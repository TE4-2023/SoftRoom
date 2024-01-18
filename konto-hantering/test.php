<?php
require 'connect.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming form fields are submitted via POST method
    $email = $_POST['Email'];
    $picture = $_POST['picture'];
    $courseNameID = $_POST['namn'];


    $queryCheckCourse = "SELECT namnID FROM namn WHERE namn = :courseName";
    $stmtCheckCourse = $pdo->prepare($queryCheckCourse);
    $stmtCheckCourse->bindParam(':courseName', $courseNameID);
    $stmtCheckCourse->execute();

    if ($stmtCheckCourse->rowCount() > 0) {
        $row = $stmtCheckCourse->fetch(PDO::FETCH_ASSOC);
        $namnID = $row['namnID'];
    } else {
        // Insert the course name if it doesn't exist
        $insertCourseQuery = $pdo->prepare("INSERT INTO namn (namn) VALUES (:courseName)");
        $insertCourseQuery->bindParam(':courseName', $courseNameID);
        $insertCourseQuery->execute();

        $namnID = $pdo->lastInsertId();
    }

    // Check if the email exists in the user table
    $queryCheckEmail = "SELECT användarID FROM användare WHERE email = :email";
    $stmtCheckEmail = $pdo->prepare($queryCheckEmail);
    $stmtCheckEmail->bindParam(':email', $email);
    $stmtCheckEmail->execute();

    if ($stmtCheckEmail->rowCount() > 0) {
        $row = $stmtCheckEmail->fetch(PDO::FETCH_ASSOC);
        $userID = $row['användarID'];
    } else {
        echo 'User does not exist';
        exit();
    }

    $queryInsertCourse = $pdo->prepare("INSERT INTO kurs (picture, namnID, aktiv) VALUES (:picture, :namnID, 1)");


    
    // Binding parameters for the insert query
    $queryInsertCourse->bindParam(':picture', $picture);
    $queryInsertCourse->bindParam(':namnID', $namnID);


    

    // Execute the query
    $queryInsertCourse->execute();
    $courseID = $pdo->lastInsertId();
    $queryEnrollTeacher = $pdo->prepare("INSERT INTO inskrivningkurs (användarID, kursID) VALUES (:userID, :courseID)");
    $queryEnrollTeacher->bindParam(':userID', $userID);
    $queryEnrollTeacher->bindParam(':courseID', $courseID);
    if($queryEnrollTeacher->execute()) {
    echo "Course and teacher addded successfully";
    }
        

    } else {
        print_r($queryInsertCourse->errorInfo()); // Print error info if query fails
        exit();
    }
    $kravArr = (array_slice($_POST, 4));

    foreach($kravArr as $krav){
        $queryCheckKrav = $pdo->prepare("SELECT kunskapskravID FROM kunskapskrav WHERE krav = :krav");
        $queryCheckKrav->bindParam(':krav', $krav, PDO::PARAM_STR);
        $queryCheckKrav->execute();
        $kravInDB = $queryCheckKrav->fetchAll();
        if(empty($kravInDB))
        {
            $queryKrav = $pdo->prepare("INSERT INTO kunskapskrav (krav) VALUES(:krav)");
            $queryKrav->bindParam(':krav', $krav, PDO::PARAM_STR);
            $queryKrav->execute();
        }
        $queryKrav = $pdo->prepare("SELECT kunskapskravID FROM kunskapskrav WHERE krav = :krav LIMIT 1");
        $queryKrav->bindParam(':krav', $krav, PDO::PARAM_STR);
        $queryKrav->execute();
        $kravRow = $queryKrav->fetch();
        $kravID = $kravRow['kunskapskravID'];

        $queryKrav = $pdo->prepare("INSERT INTO kravinskrivningar (kravID, kursID) VALUES(:kravID, :courseID)");
        $queryKrav->bindParam(':kravID', $kravID, PDO::PARAM_STR);
        $queryKrav->bindParam(':courseID', $courseID, PDO::PARAM_STR);
        if($queryKrav->execute()){
            echo "krav added to course";
        }
    }

?>