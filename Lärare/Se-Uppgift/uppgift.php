<!-- Ihopsnickrat av Emil Gothilander -->


<?php
session_start();
require "connect.php";

$assignment = null; // Initialize $assignment to avoid undefined variable error

// Check if the user is logged in
if (isset($_SESSION['användarID'])) {
    $användarID = $_SESSION['användarID'];
        $sql = "SELECT uppgifter.*, kurs.*, namn.*, uppgifter.InlämningsDatum
        FROM uppgifter
        LEFT JOIN kurs ON uppgifter.kursID = kurs.kursID
        LEFT JOIN namn ON uppgifter.namnID = namn.ID
        WHERE namn.ID = $användarID";

$stmt = $pdo->prepare($sql);
// $stmt->bindParam(":användarID", $användarID);
// var_dump($stmt);
if (!$stmt->execute()) {

    die("Error executing query: " . print_r($stmt->errorInfo(), true));
}


$assignment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!isset($assignment['InlämningsDatum'])) {
    // Handle the case where 'InlämningsDatum' is not available
    die("Error: InlämningsDatum not available.");
}

// Hämta uppgiftens namn
$sql = "SELECT * FROM namn WHERE ID = :NameID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":NameID", $assignment['namnID']);
$stmt->execute();

$assignmentName = $stmt->fetch(PDO::FETCH_ASSOC);

// Räkna tid till deadline
$date = date_create(date('Y-m-d'));
$difference = date_diff($date, date_create($assignment['InlämningsDatum']));
$interval = ltrim($difference->format('%R%a dagar'), '+');


// Lämna in uppgiften
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit-assignment'])) {
    // Ändra uppgiften till ändrad i databasen
    $turnedIn = 1;
    try {
        $sql = "UPDATE uppgifter SET inlämnad = 1 WHERE uppgiftID = " . $assignment['uppgiftID'];
        $stmt = $pdo->prepare($sql);
        echo $stmt->queryString;
        $stmt->execute();
        // Uppdatera sidan så knappen uppdateras
        header('Location: uppgift.php?uppgiftID=' . $assignment['uppgiftID']);
    } catch (PDOException $e) {
        echo "Fel : " . $e->getMessage();
    }
}

// Ångra inlämning
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["regret-assignment"])) {
    // Ändra uppgiften till icke inlämnad i databasen
    $turnedIn = 0;
    try {
        $sql = "UPDATE uppgifter SET inlämnad = 0 WHERE uppgiftID = " . $assignment['uppgiftID'];
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        // Uppdatera sidan så knappen uppdateras
        header('Location: uppgift.php?uppgiftID=' . $assignment['uppgiftID']);
    }catch (PDOException $e) {
        echo 'Fel : '. $e->getMessage();
    }

}
}
?>

<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SoftRoom</title>
</head>

<body>
    <!-- Insert nav här -->
    <!-- -------------- -->
    <!-- -------------- -->

    <section class="assignment-header-section">
        <div class="assignment-header">
            <h1>Uppgiftsheader</h1>
        </div>
    </section>

    <section class="assignment-section">
        <div class="assignment-container">
            <?php if ($assignment !== null): ?>
                <!-- Your HTML code that uses $assignment -->
                <div class="assignment-title">

                    <h2 class="assignment-name">
                        <?php echo $assignment['titel']; ?>
                    </h2>
                    <h2 class="assignment-date">Senast inlämning :
                    <?php echo isset($assignment['InlämningsDatum']) ? $assignment['InlämningsDatum'] : 'N/A'; ?>
</h2>
                </div>
            <div class="row-2">
                <div class="assignment-instructions">
                    <h2>Instruktioner</h2>
                    <?php $beskrivningText = isset($assignment['beskrivningText']) ? $assignment['beskrivningText'] : 'N/A'; ?>
                    <p class="instruction-text">
                    <?php echo $beskrivningText; ?>
                    </p>

                </div>
                <div class="attatchments">
                    <h2>Bifogade länkar och material</h2>
                    <p class="link-p">Läs på här : <a href="https://www.studienet.se/guides/utredande-text"
                            target="_blank">https://www.studienet.se/guides/utredande-text </a></p>
                    <p class="link-p">Läs även här : <a
                            href="https://www.su.se/utbildning/studera-vid-universitetet/studie-och-spr%C3%A5kverkstaden/s%C3%A5-skriver-du-uppsats-1.442583"
                            target="_blank">https://www.su.se/utbildning/studera-vid-universitetet/studie-och-spr%C3%A5kverkstaden/s%C3%A5-skriver-du-uppsats-1.442583</a>
                    </p>
                </div>
            </div>
            <div class="row-3">
                <button onclick="window.open('https://drive.google.com/drive/my-drive', '_blank');">Öppna
                    uppgift</button>
                <h2>Betyg : Ej satt</h2>
            </div>
            <div class="row-4">
                <h2>Deadline om :
                    <?php echo $interval; ?>
                </h2>
                <?php $inlämnad = isset($assignment['inlämnad']) ? $assignment['inlämnad'] : null; ?>
                    <form action="uppgift.php?uppgiftID=<?php echo $assignment['uppgiftID']; ?>" method="POST">
                        <?php if ($inlämnad === 1): ?>
                            <input type="submit" name="regret-assignment" value="Ångra inlämning" class="assignment-btn">
                        <?php else: ?>
                            <input type="submit" name="submit-assignment" value="Lämna in" class="assignment-btn">
                        <?php endif; ?>
                    </form>
            </div>
        </div>
        <?php else: ?>
                <p>Error: Uppgift finns inte</p>
            <?php endif; ?>
        </div>
    </section>
  


    <!-- Insert footer här -->
    <!-- -------------- -->
    <!-- -------------- -->
</body>

</html>