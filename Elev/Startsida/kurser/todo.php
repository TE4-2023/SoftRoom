<?php
require "../connect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softroom Elev</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="todo.css">
</head>
<body>
    
<div id="title">
    <h1>Softroom</h1>
    
</div>


<header>
    <h2 class="heading">Softroom</h2>
    <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
</header>

<div class="menu" id="sideMenu">
    <div class="dropdown">
    <a href="index.php">Startsida</a>
   <a href="#" class="dropdown-link" id="schoolDropdownToggle">Skolinformation
        <i class="fa fa-caret-down"></i>
        </a>
      <div class="dropdown-container">
        <a href="kontakt.php">Kontaktlistor</a>
      </div>     
      <hr>
      <button class="dropdown-link" id="registreredDropdownToggle">Registrerade
  <i class="fa fa-caret-down"></i>
</button>
      <div class="dropdown-container">
        <a href="./kurser/todo.php">Att Göra</a>
        <a href="./kurser/webb.php">Webb</a>
        <a href="./kurser/matte.php">Matte</a>
        <a href="./kurser/fysik.php">Fysik </a>
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

<div class="box">
 
<h1 class="rubrik"> LÄMNA IN</h1>

    <div class="göra">

      <h3 class="rubrik"> Engelska 7 </h3>

      <p class="info"> Lämna in uppgiften senast 2024-07-23</p>

    </div>

    <div class="göra">

      <h3 class="rubrik"> Ämne </h3>

      <p class="info"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto ullam optio perspiciatis facilis dolor inventore assumenda dolorum, unde vero harum laboriosam ducimus, itaque blanditiis eos minus. Praesentium exercitationem possimus pariatur! </p>

    </div>

    <div class="göra">

      <h3 class="rubrik"> Ämne </h3>

      <p class="info"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto ullam optio perspiciatis facilis dolor inventore assumenda dolorum, unde vero harum laboriosam ducimus, itaque blanditiis eos minus. Praesentium exercitationem possimus pariatur! </p>

    </div>

    <div class="göra">

      <h3 class="rubrik"> Ämne </h3>

      <p class="info"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto ullam optio perspiciatis facilis dolor inventore assumenda dolorum, unde vero harum laboriosam ducimus, itaque blanditiis eos minus. Praesentium exercitationem possimus pariatur! </p>

    </div>


</div>





<div class="kurser">
        <?php

        function getName($userID, $pdo)
        {
            // Hämta användarens namn från databasen
            $userSQL = "SELECT anv.namnID, anv.efternamnID, fn.namn AS fornamn, en.namn AS efternamn FROM användare AS anv JOIN namn AS fn ON anv.namnID = fn.ID JOIN namn AS en ON anv.efternamnID = en.ID WHERE anv.användarID = :userID";

            $stmt = $pdo->prepare($userSQL);
            $stmt->bindParam(':userID', $userID);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $name = $result['fornamn'] . " " . $result['efternamn'];

            return $name;
        }

        $stmt = $pdo->prepare("SELECT kurs.kursID, namn.namn, kurs.användarID, kurs.aktiv FROM kurs INNER JOIN namn ON kurs.namnID = namn.ID");
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

<footer>
    <h2>&copy; 2024 Softroom</h2>
</footer>


<script src="../script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>
</html>