<!-- DOCTYPE -->
<!DOCTYPE html>

<!-- Includes -->
<?php
include_once "../_includes/connect.php"; // Connect to Database
include_once "../_includes/auth.php";

if (!isUserLoggedIn($pdo)) {
    header("Location: ../logga-in");
}
//if (isStudentRole($pdo)) {}
if (isTeacherRole($pdo)) {
    header("Location: ../lärare/startsida");
}
//if (isAdminRole($pdo)) {}

?>
  
<!-- Webpage -->
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../_styles/style.css">

    <!-- Current title -->
    <title>Softroom</title>
</head>
<body>

<!-- Banner title -->
<div id="title">
    <h1>Softroom</h1>
</div>

<!-- Header Title -->
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
       <a href="#" class="dropdown-link" id="attendanceDropdownToggle">Frånvaroanmälan-Alla elever
        <i class="fa fa-caret-down"></i>
        </a>
      <div class="dropdown-container">
        <a href="#">Mina mentorselever</a>
        <a href="#">Oanmäld-frånvaro</a>
      </div>   
    <a href="#">Skapa uppgift</a>
    <a href="#">Skapa-Kurs</a>
    <a href="#">Tidsbokningar</a>
    <a href="#">Sätt-Betyg</a>
 </div>
</div>


<!-- DISPLAY IF LOGGED IN -->
<?php 
if (/*isUserLoggedIn()*/true) { //change that later?>

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



    <div id="news">
        <h1>Nyheter</h1>
        <div class="image-container">
            <div class="image-item">
                <img src="https://mobilestories.se/sites/default/files/render/tri_meta_22702/field_puffbild/78f6fb42-d1ef-4ac3-a39e-c2e8d9c25578.jpeg" alt="Image 1">
                <p>Dålig mat i skolan</p>
            </div>

            <div class="image-item">
                <img src="https://hhsclarionnews.com/wp-content/uploads/2023/10/maxresdefault.jpg" alt="Image 2">
                <p>Jag om 1 månad</p>
            </div>

            <div class="image-item">
                <img src="https://upload.wikimedia.org/wikipedia/en/4/4d/Shrek_%28character%29.png" alt="Image 3">
                <p>Jag har inte duschat sen igår och jag har inte gillat mig själv sen 2006</p>
            </div>
        </div>
    </div>

    <hr>

    <div class="schedule-container">
    <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Europe%2FStockholm&src=am9uYXRhbi5wcmFzdEBlbGV2LmdhLm50aWcuc2U&src=Y19jbGFzc3Jvb200NzEyOGEwYUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Z2EubnRpZy5zZV9jbGFzc3Jvb21lYjVkODU1NkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb21lYjI0OWQ3YkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb203NDhiNDUyZUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb200YjU4NDhkNEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb201N2RkYjg1MUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb204MTg5ZTlkYUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb21jMzZkODk0YUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb20wYjEyNDIyN0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb20zYzZiYWU4YkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Z2EubnRpZy5zZV9jbGFzc3Jvb204MzJmOWViZEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb204ZjgzYzA0NkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb21lZTYyN2QwOUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=c3Yuc3dlZGlzaCNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=Z2EubnRpZy5zZV9jbGFzc3Jvb21jY2U5YmQ0OUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb203Mzg2ZmFiNEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Z2EubnRpZy5zZV9jbGFzc3Jvb20xZjhmYjkxN0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Z2EubnRpZy5zZV9jbGFzc3Jvb20zZTY5MzU0N0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Z2EubnRpZy5zZV9jbGFzc3Jvb21hNjM1YWU2NkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb20zOWIzNTIxYUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb200YzMwOWYyNUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb205ZDIzOTkwZEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23039BE5&color=%23137333&color=%23202124&color=%23c26401&color=%23137333&color=%23137333&color=%230047a8&color=%230047a8&color=%230047a8&color=%23202124&color=%23202124&color=%230047a8&color=%230047a8&color=%237627bb&color=%230B8043&color=%23007b83&color=%230047a8&color=%230047a8&color=%23c26401&color=%23c26401&color=%23202124&color=%23174ea6&color=%230047a8" 
    style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    </div>

    <hr>

    <div class="kurser">
        <?php

        function getName($userID, $pdo)
        {
            // Hämta användarens namn från databasen
            $userSQL = "SELECT anv.namnID, anv.efternamnID, fn.namn AS fornamn, en.namn AS efternamn FROM användare AS anv JOIN namn AS fn ON anv.namnID = fn.namnID JOIN namn AS en ON anv.efternamnID = en.namnID WHERE anv.användarID = :userID";

            $stmt = $pdo->prepare($userSQL);
            $stmt->bindParam(':userID', $userID);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $name = '';
            if ($result['förnamn'] != false && !is_null($result['förnamn'])) {
                $name = $result['förnamn'] . " ";
            }
            if ($result['efternamn'] != false && !is_null($result['efternamn'])) {
                $name = $name . $result['efternamn'];
            }

            return $name;
        }

        $stmt = $pdo->prepare("SELECT kurs.kursID, namn.namn, kurs.användarID, kurs.aktiv FROM kurs INNER JOIN namn ON kurs.namnID = namn.namnID");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            foreach ($result as $row) {
                $userID = $row['användarID'];
                $name = getName($userID, $pdo);

                echo '<div class="kurs">';
                echo'<div class="kurs_banner">';
                echo '<h3>' . $row['namn'] . '</h3>';
                echo "<p>" . $name . "</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "Ingen data hittades i databasen.";
        }
        $conn = null; 
        ?>
    </div>
<!-- END OF LOGGED IN LOGIC-->
<?php
} else {
    return;
} ?>



<footer>
    <h2>&copy; 2023 Softroom</h2>
</footer>

<script>
    function toggleMenu() {
        sideMenu.style.left = (sideMenu.style.left === "0px") ? "-300px" : "0";
    }
</script>
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>
</html>