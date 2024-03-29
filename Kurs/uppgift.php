<!-- Ihopsnickrat av Emil Gothilander -->
<?php
session_start();
require 'connect.php';

// Hämta uppgiften från databasen
$sql = "SELECT * FROM uppgifter WHERE uppgiftID = :AssignmentID";
$stmt = $pdo->prepare($sql);
$assignmentID = intval($_GET['uppgiftID']);
$stmt->bindParam(":AssignmentID", $assignmentID);
$stmt->execute();
// Raden för uppgiften
$assignment = $stmt->fetch(PDO::FETCH_ASSOC);

// Hämta uppgiftens namn
$sql = "SELECT * FROM namn WHERE ID = :NameID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":NameID", $assignment['namnID']);
$stmt->execute();

$assignmentName = $stmt->fetch(PDO::FETCH_ASSOC);

// Räkna tid till deadline
$date = date_create(date('Y-m-d'));
$deadline = date_create($assignment['InlämningsDatum']);
$difference = date_diff($date, $deadline);
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
    } catch (PDOException $e) {
        echo 'Fel : ' . $e->getMessage();
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
    <div id="title">
        <h1>Uppgift - <?php echo $assignment['titel']?></h1>
    </div>

    <header>
        <h2 class="heading">Softroom</h2>
        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
    </header>

    <div class="menu" id="sideMenu">
        <div class="dropdown">
            <a href="#">Startsida</a>
            <a href="#" class="dropdown-link" id="schoolDropdownToggle">Skolinformation
                <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-container">
                <a href="#">Kontaktlistor</a>
            </div>
            <hr>
            <button class="dropdown-link" id="registreredDropdownToggle">Registrerade
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="#">Att Göra</a>
                <a href="#">Webb</a>
                <a href="#">Matte</a>
                <a href="#">Fysik </a>
            </div>
            <hr>
            <a href="#" class="dropdown-link" id="attendanceDropdownToggle">Närvaro
                <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-container">
                <a href="#">Ledighetsansökan</a>
                <a href="#">Frånvaroanmälan</a>
            </div>
            <a href="#">Betyg</a>
            <a href="#">Provschema</a>
            <a href="#">Arkiverade kurser</a>
        </div>
    </div>

    <section class="assignment-section">
        <div class="assignment-container">
            <div class="assignment-title">
                <h2 class="assignment-name">
                    <?php echo $assignmentName['namn']; ?>
                </h2>
                <h2 class="assignment-date">Senast inlämning :
                    <?php echo $assignment['InlämningsDatum']; ?>
                </h2>
            </div>
            <div class="row-2">
                <div class="assignment-instructions">
                    <h2>Instruktioner</h2>
                    <p class="instruction-text">
                        <?php echo $assignment['beskrivningText']; ?>
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
                <form action="uppgift.php?uppgiftID=<?php echo $assignment['uppgiftID']; ?>" method="POST">
                    <?php if ($assignment['inlämnad'] == 1): ?>
                        <input type="submit" name="regret-assignment" value="Ångra inlämning" class="assignment-btn">
                    <?php else: ?>
                        <input type="submit" name="submit-assignment" value="Lämna in" class="assignment-btn">
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </section>

    <footer>
    <h2>&copy; 2023 Softroom</h2>
    </footer>

    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>