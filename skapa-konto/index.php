<!DOCTYPE html>

<html lang="sv">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Skolsida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </head>

  <body>
    <form action="../_includes/account/register-account.php" method="post" style="padding:35%;padding-top:10%;">
        <div class="mb-3">
            <label for="email" class="form-label">E-post</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="mail">
            <div id="emailHelp" class="form-text">Vi delar aldrig din e-post address med någon annan.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Lösernord</label>
            <input type="password" class="form-control" id="password" name="password">
            <div id="pwdHelp" class="form-text">Håll ditt lösenord hemligt.</div>
        </div>
        <div class="mb-3">
            <label for="fn" class="form-label">Förnamn</label>
            <input type="text" class="form-control" id="fn" aria-describedby="emailHelp" name="fn">
        </div>
        <div class="mb-3">
            <label for="en" class="form-label">Efternamn</label>
            <input type="text" class="form-control" id="en" name="en">
        </div>
        <div class="mb-3">
            <label for="ssn" class="form-label">Person Nummer</label>
            <input type="text" class="form-control" id="ssn" name="ssn">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="../logga-in">Logga in</a>
    </form>
  </body>
</html>