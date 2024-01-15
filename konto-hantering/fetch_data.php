<?php
require 'connect.php';

$KursID = 9;

$sql = "SELECT * FROM användare WHERE rollID = 1";
$stmtCheckEmail = $pdo->prepare($sql);
$stmtCheckEmail->execute();

$data = [];

while ($row = $stmtCheckEmail->fetch(PDO::FETCH_ASSOC)) {
    $namnID = $row['namnID'];
    $efternamnID = $row['efternamnID'];
    $användarID2 = $row['användarID'];

    $stmtCheckEnrollment = $pdo->prepare("SELECT * FROM inskriving_kurs WHERE ElevID = :anvandarID AND KursID = :KursID");
    $stmtCheckEnrollment->bindParam(':anvandarID', $användarID2);
    $stmtCheckEnrollment->bindParam(':KursID', $KursID);
    $stmtCheckEnrollment->execute();
    
    $stmtCheckEnrollment->execute();

    if (!$stmtCheckEnrollment->fetch()) {
        $stmtFirstName = $pdo->prepare("SELECT namn FROM namn WHERE ID = :namnID");
        $stmtFirstName->bindParam(':namnID', $namnID);
        $stmtFirstName->execute();
        $rowFirst = $stmtFirstName->fetch(PDO::FETCH_ASSOC);

        $stmtLastName = $pdo->prepare("SELECT namn FROM namn WHERE ID = :efternamnID");
        $stmtLastName->bindParam(':efternamnID', $efternamnID);
        $stmtLastName->execute();
        $rowLast = $stmtLastName->fetch(PDO::FETCH_ASSOC);

        $användarID = isset($row['användarID']) ? $row['användarID'] : null;
        $namn = isset($rowFirst['namn']) ? $rowFirst['namn'] : null;
        $efternamn = isset($rowLast['namn']) ? $rowLast['namn'] : null;

        $data[] = [
            'användarID' => $användarID,
            'namn' => $namn,
            'efternamn' => $efternamn,
        ];
    }
}
$allusersInCourse = "SELECT `ElevID` FROM `inskriving_kurs` WHERE KursID = 9";

header('Content-Type: application/json');
echo json_encode($data);
?>