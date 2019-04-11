<?php
//import van het bestand om connectie te maken met de database
  include("./connect_db.php");
  //import van het bestand om ervoor te zorgen dat je ook niet standaard letters en getallen kunt invoeren
  include("./functions.php");
  $email = sanitize($_POST["email"]);
  //warning als het emailadres niet goed of niet is ingevoerd
  if ( empty($_POST["email"])) {
    echo '<div class="alert alert-warning" role="alert">U heeft geen e-mailadres ingevoerd. Dit is een verplicht veld. Probeer het nogmaals</div>';
    header("Refresh: 3; url=./registreren.php?content=register_form");
  } else {
    //ophalen van de gegevens uit de database
    $sql = "SELECT * FROM `login` WHERE `email` = '$email'";
    //laat het resultaat van het ophalen van de gevens zien
    $result = mysqli_query($conn, $sql);
    if ( mysqli_num_rows($result) == 1 ) {
      echo '<div class="alert alert-info" role="alert">Het door u ingevoerde e-mailadres bestaat al. Kies een nieuw e-mailadres</div>';
      header("Refresh: 3; ./registreren.php?content=register_form");
    } else {
      // Genereren random password
      date_default_timezone_set("Europe/Amsterdam");
      $length_email = strlen($email);
      $date_time = date('d-m-Y H:i:s');
      $reverse_email = strrev($email);
      $password = $date_time . $reverse_email . $length_email;
      $pw = password_hash($password, PASSWORD_BCRYPT);
      //voert alles in de database in
      $sql = "INSERT INTO `login` (`id`,
                                `email`,
                                `password`)
                        VALUES  (NULL,
                                '$email',
                                '$password')";
      $result = mysqli_query($conn, $sql);
      $id = mysqli_insert_id($conn);
      if ($result) {
        //als alles goed is gegaan word deze mail verzonden
        $to = $email;
        $subject = "Uw activatielink voor www.dyslexiehulp.nl";
        $message = "<!DOCTYPE html>
                    <html>
                      <head>
                        <style>
                          body {
                            background-color: green;
                          }
                        </style>
                        <title>Activatielink</title>
                      </head>
                      <body>
                        <h1>Beste gebruiker,</h1>
                        <p> Als je op de link hieronder klikt dan kun je bevestigen dat je een account bij ons hebt aangevraagd</p>
                        <p>Je kunt vervolgens uw wachtwoord instellen en inloggen op de site</p>
                        <p><a href='http://localhost/project3/createpassword.php" . $id . "&pw=" . $pw . "'>activatielink</a></p>
                        <p>Met vriendelijke groet,</p>
                        <p>Dyxlesiehulp</p>
                      </body>                    
                    </html>";
                    //import van de gegevens om de mail te verzenden
        $headers = "MIME-Version: 1.0" . "\r\n";
        //import van html zodat de mail er aantrekkelijk uitziet en goed werkt
        $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
        //zorgt ervoor dat er ook een afzender zichtbaar is.
        $headers .= "From: noreply@dyslexiehulp.nl"."\r\n";
        //verteld de site wat hij in de volgende statements moet invullen
        mail( $to, $subject, $message, $headers);
        //in het geval dat alles goed is gegaan krijgt de gebruiker deze melding
        echo '<div class="alert alert-success" role="alert">U bent geregistreerd. Wij hebben u een mail gestuurd naar dit adres. Klik daarin op de activatielink om uw registratie te voltooien.</div>';
        header("Refresh: 2; url=./registreren.php?content=login_form");
        //in het geval dat er iets niet goed is gegaan krijgt de gebruiker deze melding
      } else {
        echo '<div class="alert alert-danger" role="alert">Er is iets misgegaan tijdens het registreren probeer het nogmaals</div>';
        header("Refresh: 2; url=./registreren.php?content=register_form");
      }
    }
  }
?>
