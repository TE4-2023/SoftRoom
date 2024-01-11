<?php
require "../../Includes/connect.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    try {
        // Get assignment data from the POST request
        $assignmentTitle = isset($_POST['assignmentTitle']) ? $_POST['assignmentTitle'] : null;
        $instructions = isset($_POST['instructions']) ? $_POST['instructions'] : null;
        $dueDate = isset($_POST['dueDate']) ? $_POST['dueDate'] : null;

        $uppgiftID = isset($_POST['uppgiftID']) ? $_POST['uppgiftID'] : null;

        if ($assignmentTitle !== null && $instructions !== null && $dueDate !== null) {
            // Insert new assignment
            $queryInsertAssignment = $pdo->prepare("INSERT INTO uppgifter (titel, beskrivningText, InlämningsDatum) VALUES (:title, :instructions, :dueDate)");

            // Binding parameters for the insert query
            $queryInsertAssignment->bindParam(':title', $assignmentTitle);
            $queryInsertAssignment->bindParam(':instructions', $instructions);
            $queryInsertAssignment->bindParam(':dueDate', $dueDate);

            $queryInsertAssignment->execute();
        } else {
            // Handle the case where some required data is missing
            echo "Error: Some required data is missing.";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {
    $editTitle = $_POST['titel'];
    $editInstructions = $_POST['beskrivningText'];
    $editDueDate = $_POST['InlämningsDatum'];
    $assignmentID = $_GET['uppgiftID'];

    $sql = "UPDATE uppgifter SET titel = :editTitle, beskrivningText = :editInstructions, InlämningsDatum = :editDueDate WHERE uppgiftID = :assignmentID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":editTitle", $editTitle, PDO::PARAM_STR);
    $stmt->bindParam(":editInstructions", $editInstructions, PDO::PARAM_STR);
    $stmt->bindParam(":editDueDate", $editDueDate);
    $stmt->bindParam(":assignmentID", $assignmentID, PDO::PARAM_INT);
    $stmt->execute();
    header("Location: index.php");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $assignmentIDToDelete = $_POST['delete'];
    
    $sql = "DELETE FROM uppgifter WHERE uppgiftID = :assignmentIDToDelete";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":assignmentIDToDelete", $assignmentIDToDelete, PDO::PARAM_INT);
    $stmt->execute();
    
    header("Location: index.php");
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
    <?php if (empty($_GET)): ?>
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

            <?php
            // Hämta uppgifterna från databasen
            $sql = "SELECT * FROM uppgifter";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $uppgifter = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php foreach ($uppgifter as $uppgift): ?>
                <div class="assignment-container">
                <a href="../Se-uppgift/uppgift.php?uppgiftID=<?php echo $uppgift['uppgiftID']; ?>">
                        <button class="assignment-button">
                            📝
                            <?php echo $uppgift['titel']; ?>
                            <br>
                            <span class="due-text">Inlämning:
                                <?php echo $uppgift['InlämningsDatum']; ?>
                            </span>
                        </button>
                    </a>

                    <a href="index.php?action=edit&uppgiftID=<?php echo $uppgift['uppgiftID']; ?>"><button
                            class="edit-button">Redigera</button></a>
                    <button class="delete-button">🗑</button>

                        <!-- Form for the delete button -->
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="delete" value="<?php echo $uppgift['uppgiftID']; ?>">
                            <button type="submit" class="delete-button" onclick="return confirm('Är du säker på att du vill radera uppgiften?')">🗑</button>
                        </form>


                </div>
            <?php endforeach; ?>
        <?php elseif (isset($_GET['action']) && $_GET['action'] == "edit"): ?>
            <?php
            // Hämta uppgiften från databasen 
            $sql = "SELECT * FROM uppgifter WHERE uppgiftID = " . $_GET['uppgiftID'];
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $uppgift = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>

               <div class="modal-content">
            <form action="index.php?action=edit&uppgiftID=<?php echo $uppgift['uppgiftID']; ?>" method="POST">
                <label for="">Titel</label>
                <input type="text" name="titel" value="<?php echo $uppgift['titel']; ?>">
                <label for="">Beskrivningstext</label>
                <input type="text" name="beskrivningText" value="<?php echo $uppgift['beskrivningText']; ?>">
                <label for="">Inlämningsdatum</label>
                <input type="date" name="InlämningsDatum" value="<?php echo $uppgift['InlämningsDatum'] ?>">
                <input type="submit" class="publish-button" name="update" value="Uppdatera uppgift">
            </form>
            </div>
        <?php endif; ?>
        <script src="script.js"></script>
    </div>
</body>

</html>
