<?php
require 'connect.php';

try {
    $sql = "SELECT * FROM `klass` WHERE 1";
    $stmtCheckEmail = $pdo->prepare($sql);
    $stmtCheckEmail->execute();

    $data = [];

    while ($row = $stmtCheckEmail->fetch(PDO::FETCH_ASSOC)) {
        $data[] = [
            'KlassID' => $row['KlassID'],
            'Klass' => $row['Klass'],
            'Mentor1' => $row['Mentor1'],
            'Mentor2' => $row['Mentor2'],
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($data);
} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Database error. Please try again later.']);
    // Log the detailed error for debugging purposes
    error_log('Database Error: ' . $e->getMessage());
}
?>
