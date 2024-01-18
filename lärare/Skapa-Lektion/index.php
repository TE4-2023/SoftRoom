<?php
require "../../_includes/connect.php";
session_start();

if (isset($_SESSION['uid'])) {
    print_r($_SESSION);
}
else{
    header("location: ../../logga-in/");
}
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
        <div class="container">
            <button onclick="toggleDropdown()" class="create-button">+ Skapa</button>
            <div id="assignmentDropdown" class="dropdown-content">
                <a href="#" onclick="openAssignmentModal()">📝Uppgift</a>
            </div>

            <!-- Assignment Modal -->
            <div id="assignmentModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeAssignmentModal()">&times;</span>
                    <h3>Skapa uppgift</h3>
                    <form id="assignmentForm" method="POST" action="index.php">

                        <input type="hidden" id="uppgiftID" name="uppgiftID" value="the_assignment_id">

                        <label for="assignmentTitle">Titel</label>
                        <input type="text" id="assignmentTitle" name="assignmentTitle" required>

                        <label for="instructions">Instruktioner</label>
                        <textarea id="instructions" name="instructions" required></textarea>

                        <label for="dueDate">Inlämningsdatum</label>
                        <input type="date" id="dueDate" name="dueDate" required>

                        <input type="submit" class="publish-button" name="create" value="Publicera" required>

                    </form>
                </div>
            </div>

               <div class="modal-content">
            <form action="skapalektion.php" method="POST">
                <label for="">Titel</label>
                <input type="text" name="titel" value="">
                <label for="">Beskrivningstext</label>
                <input type="text" name="beskrivningText" value="">
                <label for="">Inlämningsdatum</label>
                <input type="date" name="InlämningsDatum" value="">
                <input type="submit" class="publish-button" name="update" value="Uppdatera uppgift">
            </form>
            </div>
        
    </div>
</body>
<script src="script.js"></script>
</html>