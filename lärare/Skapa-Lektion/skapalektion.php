<?php
require "../../_includes/connect.php"; // Include your database connection file
if (!($_SERVER['REQUEST_METHOD'] === 'POST')) {
    header("location: ../Startsida");
}
    // Assuming form fields are submitted via POST method
    $kursID = $_POST['kurser'];
    $sal = $_POST['sal'];
    $startTid = $_POST['datum']. " " .$_POST['start-tid'];
    $slutTid = $_POST['datum']. " " .$_POST['slut-tid'];
    print_r($_POST);


    $queryLektion = $pdo->prepare("INSERT INTO lektion (kursID, sal, startTid, slutTid) VALUES (:kursID, :sal, :startTid, :slutTid)");
    $queryLektion->bindParam(':kursID', $kursID);
    $queryLektion->bindParam(':sal', $sal);
    $queryLektion->bindParam(':startTid', $startTid);
    $queryLektion->bindParam(':slutTid', $slutTid);
    if($queryLektion->execute()) {
    echo "lektion skapad";
    header("location: ../Startsida");
}
?>