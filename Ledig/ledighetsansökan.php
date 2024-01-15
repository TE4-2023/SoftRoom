<?php
session_start();
require 'connect.php';

$currentTeacher = 4;

// Hämta alla ledighetsansökningar
$sql = "SELECT * FROM ledighetsansökningar";
$stmt = $pdo->prepare($sql);
$stmt->execute();
// Spara dem i array
$leaveApplications = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accept'])) {
        $status = 1;
        // Sätt status till 1
        $sql = "UPDATE ledighetsansökningar SET status = :status WHERE ID = :ID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":status", $status, PDO::PARAM_INT);
        $stmt->bindParam(":ID", $_GET['ID'], PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ledighetsansökan.php');
    } elseif (isset($_POST['deny'])) {
        // Sätt status till 0
        $status = 0;
        // Sätt status till 1
        $sql = "UPDATE ledighetsansökningar SET status = :status WHERE ID = :ID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":status", $status, PDO::PARAM_INT);
        $stmt->bindParam(":ID", $_GET['ID'], PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ledighetsansökan.php');
    }
}

function getName($userID, $pdo)
{
    // Hämta lärarnas namn från klassens databas med en sql join
    $teacherSQL = "SELECT anv.namnID, anv.efternamnID, fn.namn AS fornamn, en.namn AS efternamn FROM användare AS anv JOIN namn AS fn ON anv.namnID = fn.ID JOIN namn AS en ON anv.efternamnID = en.ID WHERE anv.användarID = :teacherID";

    $stmt = $pdo->prepare($teacherSQL);
    $stmt->bindParam(':teacherID', $userID);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $result['fornamn'] . " " . $result['efternamn'];

    // Returnera fullständigt namn i sträng
    return $name;
}
?>

<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b536048985.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>SoftRoom</title>
</head>

<body>

    <div id="title">
        <h1>Ledighetsansökan</h1>
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

    <section class="leave-application-section">
        <?php
        // Skapa en array för de ansökningar som matchar den inloggade läraren
        $matchingApplications = array();

        // Hitta klassen som läraren är mentor för
        $sql = "SELECT * FROM klass WHERE Mentor1 = :Mentor OR Mentor2 = :Mentor";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":Mentor", $currentTeacher, PDO::PARAM_INT);
        $stmt->execute();
        // Lägg i array
        $teacherClasses = $stmt->fetchAll(PDO::FETCH_ASSOC);


        // Loopa samtliga ansökningar
        foreach ($leaveApplications as $leaveApplication) {

            $userID = $leaveApplication["AnvändarID"];
            // Loopa inskrivningklass och hämta klasser eleven är skriven i
            $sql = "SELECT * FROM inskrivningklass WHERE användarID = :userID";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":userID", $userID, PDO::PARAM_INT);
            $stmt->execute();
            $studentClasses = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Loopa genom lärarens klasser som den är mentor i och kolla vilka som matchar eleverna som ansökt om ledighet
            foreach ($teacherClasses as $teacherClass) {
                foreach ($studentClasses as $studentClass) {
                    if ($teacherClass['KlassID'] == $studentClass['KlassID']) {
                        // Lägg de som matchar i en array
                        array_push($matchingApplications, $leaveApplication);
                    }
                }
            }
        }
        ?>

        <?php if (empty($_GET['ID'])): ?>
            <!-- Loopa genom ansökningarna och skriv ut dem på skärmen -->
            <div class="leave-applications-container">
                <?php if (empty($_GET)): ?>

                    <div class="grid-header">
                        <h2>Ej behandlade ledighetsansökningar</h2>
                    </div>
                    <div class="leave-applications">
                        <?php foreach ($matchingApplications as $matchingApplication): ?>
                            <!-- Kolla om statusen är null -->
                            <?php if ($matchingApplication['status'] == null): ?>
                                <div class="leave-application"
                                    onclick="window.location.href = 'ledighetsansökan.php?ID=<?php echo $matchingApplication['ID'] ?>';">
                                    <div class="la-left">
                                        <div class="profile-icon">
                                            <i class="fa-regular fa-user fa-xl"></i>
                                        </div>
                                    </div>
                                    <div class="la-right">
                                        <h2>Ansökan av
                                            <?php echo getName($matchingApplication['AnvändarID'], $pdo); ?>
                                        </h2>
                                        <p>Skickad
                                            <?php echo $matchingApplication['skapad'] ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <h2 class="grid-footer"><a href="ledighetsansökan.php?view=Assesed">Se behandlade ansökningar</a></h2>

                <?php elseif (isset($_GET['view'])): ?>

                    <div class="grid-header">
                        <h2>Bedömda ledighetsansökningar</h2>
                    </div>
                    <div class="leave-applications">
                        <?php foreach ($matchingApplications as $matchingApplication): ?>

                            <!-- Kolla om statusen är null -->
                            <?php if (isset($matchingApplication['status'])): ?>
                                <div class="leave-application">
                                    <div class="la-left" <?php
                                    if ($matchingApplication['status'] == 1) {
                                        echo 'style="background-color: #29cc29;"';
                                    } elseif ($matchingApplication['status'] == 0) {
                                        echo 'style="background-color: red;"';
                                    }
                                    ?>>
                                        <div class="profile-icon">
                                            <i class="fa-regular fa-user fa-xl"></i>
                                        </div>
                                    </div>
                                    <div class="la-right">
                                        <h2>Ansökan av
                                            <?php echo getName($matchingApplication['AnvändarID'], $pdo); ?>
                                        </h2>
                                        <p>Status :
                                            <?php
                                            if ($matchingApplication['status'] == 1) {
                                                echo 'Beviljad';
                                            } else {
                                                echo 'Nekad';
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>

                            <?php endif; ?>

                        <?php endforeach; ?>
                    </div>
                    <h2 class="grid-footer"><a href="ledighetsansökan.php">Tillbaka</a></h2>
                <?php endif; ?>
            </div>
        <?php elseif (isset($_GET['ID'])): ?>
            <?php
            $sql = "SELECT * FROM ledighetsansökningar WHERE ID = :ID";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":ID", $_GET["ID"], PDO::PARAM_INT);
            $stmt->execute();
            $leaveApplication = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="asses-application">
                <h2 class="asses-header">Ledighetsansökan av
                    <?php echo getName($leaveApplication['AnvändarID'], $pdo); ?>
                </h2>
                <p class="asses-period">Period :
                    <?php echo $leaveApplication['startDatum']; ?> -
                    <?php echo $leaveApplication['slutDatum']; ?>
                </p>
                <p class="asses-header-2">Bifogad information</p>
                <div class="asses-information">
                    <p>Information - sdkfasldkfasdlök</p>
                </div>
                <form action="ledighetsansökan.php?ID=<?php echo $leaveApplication['ID'] ?>" method="POST"
                    class="asses-btns">
                    <input type="submit" class="deny" name="deny" value="Neka">
                    <input type="submit" class="accept" name="accept" value="Acceptera">
                </form>
            </div>
        <?php endif; ?>
    </section>

    <footer>
    <h2>&copy; 2023 Softroom</h2>
    </footer>

    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>