<?php
require "../../_includes/connect.php";
session_start();
if (isset($_SESSION['uid'])) {
    print_r($_SESSION);
}
else{
    header("location: ../../logga-in/");
}

$användarID = $_SESSION['användarID'];
$stmt = $pdo->prepare("SELECT * FROM kurs
JOIN inskrivningkurs ON inskrivningkurs.kursID = kurs.kursID
JOIN namn ON namn.namnID = kurs.namnID
WHERE inskrivningkurs.användarID = :anvandarID");
$stmt->bindParam(':anvandarID', $användarID);
$stmt->execute();
$behörigaKurser = $stmt->fetchAll();
print_r($behörigaKurser);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skapa Uppgift</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
        
               <div class="modal-content">
            <form action="skapalektion.php" method="POST">
            <div class="input-container">
            <label for="kurser">Kurs</label>
                <select name="kurser" id="kurser">
                    <?php
                        foreach($behörigaKurser as $row){
                            echo '<option class="modal-content" value="'.$row['kursID'].'">'.$row['namn'].'</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="input-container">
                <Label for="sal">Sal</Label>
                <input type="text" name="sal" id="sal">
            </div>

            <div class="input-container">
            <Label for="datum">Datum</Label>
                <input type="date" name="datum" id="datum">
                <Label for="start-tid">Start Tid</Label>
                <input type="time" name="start-tid" id="start" min="07:00" max="16:59">
                <Label for="slut-tid">Slut Tid</Label>
                <input type="time" name="slut-tid" id="slut" min="07:01" max="17:00">
            </div>
            <input type="submit" class="publish-button" name="create" value="Publicera" required>
            </form>
            </div>
        
    </div>
</body>
<script src="script.js"></script>
</html>