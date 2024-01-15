<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="signUpp.css">
</head>

  <body>
    <form action="../_includes/account/login.php" method="post" style="padding:35%;padding-top:10%;">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">E-post</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">Vi delar aldrig din e-post address med någon annan.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Lösernord</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            <div id="pwdHelp" class="form-text">Håll ditt lösenord hemligt.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="../skapa-konto">Skapa konto</a>
    </form>
  </body>
</html>