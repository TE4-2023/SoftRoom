<?php
require 'connect.php';

header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"));

if (!isset($data)) {
    echo json_encode(['error' => 'Missing data']);
    exit();
}

$ElevID = $data->användarID;

$querycheckKurs = $pdo->prepare("INSERT INTO inskriving_kurs (ElevID, KursID) VALUES (:ElevID, :KursID)");

$queryUpdateCourse->bindParam(':ElevID', $ElevID, PDO::PARAM_INT);
$queryUpdateCourse->bindParam(':KursID', $KursID, PDO::PARAM_INT); 

try {
    if ($queryUpdateCourse->execute()) {
        echo json_encode(['message' => 'Data updated successfully']);
    } else {
        echo json_encode(['error' => 'Failed to execute query']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
exit();
?>