<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skapa Kurs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        .input-container {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            margin: auto;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: solid;
            border-width: thin;

        }

        button {
            background: #5E5DF0;
            /* Set the background to transparent */
            border-radius: 999px;
            box-shadow: #5E5DF0 0 10px 20px -10px;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            font-size: 20px;
            font-weight: 700;
            line-height: 24px;
            opacity: 1;
            outline: 0 solid transparent;
            padding: 8px 18px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: fit-content;
            word-break: break-word;
            border: 0;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            background-color: #fff;
            z-index: 1;
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
    </style>
</head>

<body>
    <button onclick="openModal()">Skapa kurs</button>

    <!-- Modal and Overlay -->
    <div class="overlay" id="overlay" onclick="closeModal()"></div>
    <div class="modal" id="modal">
        <form action="skapakursbackend.php" method="POST" enctype="multipart/form-data">
            <div class="input-container">
                <label for="namn">Namn på kursen</label>
                <input type="text" id="namn" name="namn" required>
            </div>
            <div class="input-container">
                <label for="Email">Email lärare</label>
                <input type="email" id="Email" name="Email" required>
            </div>
            <div class="input-container">
                <label for="picture">Bild</label>
                <input type="text" id="picture" name="picture" required>
            </div>
            <button type="submit">Lägg till kurs</button>
        </form>
    </div>

    <script>
        function openModal() {
            document.getElementById("modal").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function closeModal() {
            document.getElementById("modal").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    </script>
</body>

</html>