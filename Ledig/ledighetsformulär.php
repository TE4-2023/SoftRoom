<!-- Ihopsnickrat av Emil Gothilander -->
<?php
session_start();
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['application'])) {
    $insertMsg = "";
    try {
        // Hämta all data att föra in i databasen
        // Byt userID till id från sessionen sen..
        $userID = 7;
        $startDate = $_POST['startDatum'];
        $endDate = $_POST['slutDatum'];
        $information = $_POST['information'];
        $created = date('Y-m-d H:i:s');

        // Kontrollera att formuläret är korrekt ifyllt
        if ($startDate == "0000-00-00 00:00:00" || $endDate == "0000-00-00 00:00:00" || empty($information)) {
            $insertMsg = "Fyll i alla fält";
        } else {
            $sql = "INSERT INTO ledighetsansökningar (AnvändarID, startDatum, slutDatum, information, skapad) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$userID, $startDate, $endDate, $information, $created]);

            $insertMsg = "Ledighetsansökan skickades";
        }


    } catch (Exception $e) {
        $insertMsg = "Fel uppstod... " . $e->getMessage();
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
        <h1>Ledighetsansökan</h1>
    </div>

    <header>
        <h2 class="heading">Softroom</h2>
        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
    </header>

    <!-- <section class="new-header">
        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
        <h2 class="new-heading">Softroom</h2>
    </section> -->

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

    <section class="application-form-section">
        <div class="application-form-container">
            <h2 class="application-header">Ansök om ledighet</h2>
            <form action="ledighetsformulär.php" class="application-form" id="application-form" method="POST">
                <div class="form-group">
                    <label for="">Startdatum</label>
                    <input type="date" name="startDatum">
                </div>
                <div class="form-group">
                    <label for="">Slutdatum</label>
                    <input type="date" name="slutDatum">
                </div>
                <div class="form-group">
                    <label for="">Bifogad information angående ledighet</label>
                    <textarea name="information" id="application-form" cols="30" rows="10"></textarea>
                </div>
                <input type="submit" name="application" value="Ansök">
            </form>
            <?php if (isset($insertMsg)): ?>
                <p class="insert-msg">
                    <?php echo $insertMsg ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <footer>
    <h2>&copy; 2023 Softroom</h2>
    </footer>

    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>