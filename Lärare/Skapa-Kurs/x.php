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
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
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
</body>
</html>