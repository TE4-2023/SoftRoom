<?php
require 'connect.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming form fields are submitted via POST method
    $email = $_POST['Email'];
    $picture = $_POST['picture'];
    $courseNameID = $_POST['namn'];

    // Check if course name exists in the database
    $queryCheckCourse = "SELECT id FROM namn WHERE namn = :courseName";
    $stmtCheckCourse = $pdo->prepare($queryCheckCourse);
    $stmtCheckCourse->bindParam(':courseName', $courseNameID);
    $stmtCheckCourse->execute();

    if ($stmtCheckCourse->rowCount() > 0) {
        $row = $stmtCheckCourse->fetch(PDO::FETCH_ASSOC);
        $courseID = $row['id'];
    } else {
        // Insert the course name if it doesn't exist
        $insertCourseQuery = $pdo->prepare("INSERT INTO namn (namn) VALUES (:courseName)");
        $insertCourseQuery->bindParam(':courseName', $courseNameID);
        $insertCourseQuery->execute();

        $courseID = $pdo->lastInsertId();
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

    // Assuming $picture, and $courseID have correct values here

    $queryInsertCourse = $pdo->prepare("INSERT INTO kurs (picture, namnID) VALUES (:picture, :courseID)");


    
    // Binding parameters for the insert query
    $queryInsertCourse->bindParam(':userID', $userID);
    $queryInsertCourse->bindParam(':picture', $picture);
    $queryInsertCourse->bindParam(':courseID', $courseID);

    // Execute the query
    if ($queryInsertCourse->execute()) {
        $queryEnrollTeacher = $pdo->prepare("INSERT INTO inskrivningkurs (användarID, kursID) VALUES (:userID, courseID)");
        $queryEnrollTeacher->bindParam(':userID', $userID);
        $queryEnrollTeacher->bindParam(':courseID', $courseID);
        if($queryEnrollTeacher->execute()) {
            echo "Course and teacher addded successfully";
        }
        
        echo "Course addded successfully";
        exit();

    } else {
        print_r($queryInsertCourse->errorInfo()); // Print error info if query fails
        exit();
    }
}
?>