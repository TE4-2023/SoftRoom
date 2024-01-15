<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../_styles/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="../_includes/account/login.php" method="POST">
            <div class="input-container">
                <label for="email">email</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="lgTxtCn">
            <p><a href="../skapa-konto/index.php">skapa konto</a></p>
            
        </div>
    </div>

</body>
</html>
