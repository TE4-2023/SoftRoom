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
            overflow-y: auto;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        .input-container {
            margin-bottom: 15px;
        }
        .input-container textarea{
            max-width: 350px;
            height: auto;
        }
        .antal{
            left:10;
            width: 20%;
            cursor: default;
            padding-bottom: 15px;

        }

        label {
            display: block;
            margin-bottom: 5px;
            margin-left: 5px;
            font-family: Arial, Helvetica, sans-serif;
        }
        .krav{
            align-items: center;
            display: block;
            padding-bottom: 15px;
        }
        input {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: solid;
            border-width: thin;
            
        }
        textarea{
            max-width: 100%;
            min-width: 350px;
            max-height: 350px;
        }

        button {
            background: #5E5DF0; /* Set the background to transparent */
    border-radius: 999px;
    box-shadow: #5E5DF0 0 10px 20px -10px;
    box-sizing: border-box;
    color: #FFFFFF;
    cursor: pointer;
    font-family: Inter, Helvetica, "Apple Color Emoji", "Segoe UI Emoji", NotoColorEmoji, "Noto Color Emoji", "Segoe UI Symbol", "Android Emoji", EmojiSymbols, -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", sans-serif;
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
            top: 50%;
            left: 50%;
            max-width: 500px;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 1;
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
        <form action="skapakursbackend.php" method="POST" enctype="multipart/form-data" id="kurs-form">
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
            <div class="antal">
                <label for="">Antal krav</label>
                <input type="number" id="kunskapskrav-antal" name="antal" min="0" max="7" oninput="checkAntal(this)" required>
            </div>

            <div id="krav" class="krav">

            </div>

            <button type="submit">Lägg till kurs</button>
        </form>
    </div>

    <script>
        function checkAntal(antal){
            console.log(antal.value);
            if(antal.value > 7){
                antal.value = 7;
            }
            if (antal.value < 0){
                antal.value = 0;
            }
            form = document.getElementById("kurs-form");
            kravdiv = document.getElementById("krav");
            arr=kravdiv;

            for(i = kravdiv.childElementCount; i < antal.value; i++){
                var input = document.createElement("textarea");
                input.setAttribute("name", "krav" + i);
                input.className = "input-container";
                input.tagName = "krav" + i;
                kravdiv.appendChild(input);
            }

            while(antal.value < kravdiv.childElementCount){
                kravdiv.removeChild(kravdiv.lastChild);
            }


            console.log(form.children);
        }

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
