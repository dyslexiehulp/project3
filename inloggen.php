<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- dit zorgt dat er tekst staat in het tabje van de browser -->
    <title>Dyslexiehulp Inloggen</title>
  </head>
  <body>
  <!-- import van de voor bootstrap benodigde links -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <main class="container">
      <div class="row">
          <div class="col-12">
          <form action="./login_script" method="post">
          <!--import van de navbar -->
              <?php include("./navbar.php"); ?>
          </div>
      </div>
      <!--Inlog formulier -->
      <div class="row">
          <div class="col-12">
          <form>
  <div class="form-group">
  <!-- invoer van het email adres -->
    <label for="InputEmail1">Email adres</label>
    <input name="email" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Email">
  </div>
  <div class="form-group">
    <!--invoer van het wachtwoord -->
    <label for="InputPassword1">Wachtwoord</label>
    <input name="password" type="password" class="form-control" id="InputPassword1" placeholder="Wachtwoord">
  </div>
  <!-- bevestiging dat je wilt inloggen -->
  <button type="submit" class="btn btn-primary">Login</button>
  <a class="btn btn-primary" href="register_form.php" role="button">Registreren</a>

</form>

      </div>
          </div>

      <!--import van de footer -->
      <div class="row">
          <div class="col-12">
              <?php include("./footer.php"); ?>
          </div>
      </div>
    </main>

    </body>
</html>