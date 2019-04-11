<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- import van de bestanden die ervoor zorgen dat de website er goed uitziet -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Dyslexiehulp</title>
</head>
<body>
<main class="container">
    <div class="row">
        <div class="col-12">
        <!--import van de navbar -->
            <?php include("./navbar.php"); ?>
        </div>
    </div>
</main>

<?php
//import van het bestand om de database te laden
  include("./connect_db.php");
//import van het bestand om ook niet standaard letters en getallen in te kunnen voeren
  include("./functions.php");
  //verwerking van de email en een waarschuwing als het veld leeg is of het geen email adres is 
  $email = sanitize($_POST["email"]);
  if ( empty($_POST["email"])) {
    echo '<div class="alert alert-warning" role="alert">U heeft geen e-mailadres ingevoerd. Dit is een verplicht veld. Probeer het nogmaals</div>';
    //refresh van de pagina als je je email niet goed hebt ingevoerd
    header("Refresh: 3; url=./register_form");
  } else {
    //ophalen van gegevens uit de database 
    $sql = "SELECT * FROM `login` WHERE `email` = '$email'";
    //laat de gegevens van het vorige commando zien
    $result = mysqli_query($conn, $sql);
    if ( mysqli_num_rows($result) == 1 ) {
      //error als je een email adres 2 keer probeert te registreren
      echo '<div class="alert alert-info" role="alert">Het door u ingevoerde e-mailadres bestaat al. Kies een nieuw e-mailadres</div>';
      //refresh van de pagina als je een email adres dubbel probeert te registreren
      header("Refresh: 3; ./register_form");
    } else {
      // Genereren random password
      date_default_timezone_set("Europe/Amsterdam");
      $length_email = strlen($email);
      $date_time = date('d-m-Y H:i:s');
      $reverse_email = strrev($email);
      $password = $date_time . $reverse_email . $length_email;
      $pw = password_hash($password, PASSWORD_BCRYPT);
      //registratie compleet maken door het invoeren van de gegevens in de database 
      $sql = "INSERT INTO `login` (`id`,
                                `email`,
                                `password`)
                        VALUES  (NULL,
                                '$email',
                                '$password')";
      $result = mysqli_query($conn, $sql);
      $id = mysqli_insert_id($conn);
      //als alles goed is gegaan word de volgende mail naar het geregistreerde mailadres gestuurd
      if ($result) {
        $to = $email;
        $subject = "Uw activatielink voor www.dyslexiehulp.nl";
        $message = "<!DOCTYPE html>
                    <html>
                      <head>
                        <style>
                          body {
                            background-color: white;
                          }
                        </style>
                        <title>Activatielink</title>
                      </head>
                      <body>
                        <h1>Beste gebruiker,</h1>
                        <p> Als je op de link hieronder klikt dan kun je bevestigen dat je een account bij ons hebt aangevraagd</p>
                        <p>Je kunt vervolgens uw wachtwoord instellen en inloggen op de site</p>
                        <p><a href='http://localhost/project3/index.php?content=createpassword&id=" . $id . "&pw=" . $pw . "'>activatielink</a></p>
                        <p>Met vriendelijke groet,</p>
                        <p>Dyxlesiehulp</p>
                      </body>                    
                    </html>";
        //import van de software om de links etc te laten werken
        $headers = "MIME-Version: 1.0" . "\r\n";
        //import van de html code zodat alles er goed uit ziet
        $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
        //import van de afzender
        $headers .= "From: noreply@dyslexiehulp.nl"."\r\n";
        //met deze code leggen we de site uit wat hij moet doen als het account succesvol is geregistreerd.
        mail( $to, $subject, $message, $headers);
        //melding als de registratie succesvol is verlopen
        echo '<div class="alert alert-success" role="alert">U bent geregistreerd. Wij hebben u een mail gestuurd naar dit adres. Klik daarin op de activatielink om uw registratie te voltooien.</div>';
        header("Refresh: 2; url=./inloggen.php");
      } else {
        //melding als de registratie niet compleet is
        echo '<div class="alert alert-danger" role="alert">Er is iets misgegaan tijdens het registreren probeer het nogmaals</div>';
        header("Refresh: 2; url=./register_form.php");
      }
    }
  }
?>


<!--import van de voor bootstrap benodigde links -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>