<?php

session_start();
require '../../_includes/connect.php';

// Get data from AJAX request
$dates = explode(",", $_POST['week']);
$user = $_SESSION['användarID'];

$arr = array(
    "mon" => array(),
    "tue" => array(),
    "wed" => array(),
    "thu" => array(),
    "fri" => array()
);

try {
    foreach ($dates as $dag) {
        $lektioner = $pdo->prepare('
            SELECT *, date(startTid) AS dag, TIME(startTid) AS lektionStart, TIME(slutTid) AS lektionSlut FROM `lektion` 
            JOIN inskrivningkurs ON inskrivningkurs.kursID = lektion.kursID
            JOIN kurs ON kurs.kursID = lektion.kursID
            JOIN namn ON kurs.namnID = namn.namnID
            WHERE date(startTid) = :dag AND inskrivningkurs.användarID = :user;
        ');

        $data = array(
            ':dag' => $dag,
            ':user' => $user
        );

        $lektioner->execute($data);

        // Fetch and display the results
        while ($row = $lektioner->fetch(PDO::FETCH_ASSOC)) {
            $lektion = array(
                'time' => (substr($row['lektionStart'], 0, 5) . '-' . substr($row['lektionSlut'], 0, 5)),
                'course' => ($row['namn'] . ' | ' . $row['sal'])
            );
            $dayOfWeek = strtolower(date('D', strtotime($row['dag'])));
            array_push($arr[$dayOfWeek], $lektion);
        }
    }

    $jsonLektioner = json_encode($arr);

    header('Content-Type: application/json');

    // Encode the data as JSON and output it
    echo $jsonLektioner;
} catch (PDOException $e) {
    // Handle the exception, e.g., log or return an error response
    echo json_encode(array('error' => 'ERROR: ' . $e->getMessage()));
}

exit;
?>
