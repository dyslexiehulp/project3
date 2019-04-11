<?php
  // var_dump($_POST);
  include("./connect_db.php");
  include("./functions.php");
  $email = sanitize($_POST["email"]);
  $password = sanitize($_POST["password"]);
  $sql = "SELECT * FROM  `login` WHERE `email` = '$email'";
  $result = mysqli_query($conn, $sql);
  if ( mysqli_num_rows($result) == 1 ) {
    // Ga verder met de inlogprocedure
    $record = mysqli_fetch_assoc($result);
    $blowfish_password = $record["password"];
    if ( password_verify($password, $blowfish_password)) {
      $_SESSION["id"] = $record["id"];
      $_SESSION["email"] = $email;
      $_SESSION["userrole"] = $record["userrole"];
      
      //meldingen per role als je ingelogd bent + de redirect link
      switch ($record["userrole"]) {
        //melding + redirect van de (standaard) customer role
        case 'customer':
          echo '<div class="alert alert-success" role="alert">U bent succesvol ingelogd. U wordt doorgestuurd naar uw Klant homepagina</div>';      
          header("Refresh: 3; url=./index.php?content=customer_home");
        break;
        //melding + redirect van de admin role
        case 'admin':
          echo '<div class="alert alert-success" role="alert">U bent succesvol ingelogd. U wordt doorgestuurd naar uw administrator homepagina</div>';      
          header("Refresh: 3; url=./index.php?content=administrator_home");
        break;
        //melding + redirect van de root role
        case 'root':
          echo '<div class="alert alert-success" role="alert">U bent succesvol ingelogd. U wordt doorgestuurd naar uw root homepagina</div>';      
          header("Refresh: 3; url=./index.php?content=root_home");
        break;
        //melding + redirect van de root role
        case 'moderator':
          echo '<div class="alert alert-success" role="alert">U bent succesvol ingelogd. U wordt doorgestuurd naar uw moderator homepagina</div>';      
          header("Refresh: 3; url=./index.php?content=moderator_home");
        break;
        default:
        //als je geen juiste role hebt (bijvoorbeeld als je er zelf als hacker 1 wilt maken) dan krijg je deze error en word je uitgelogd
          echo '<div class="alert alert-warning" role="alert">U bent succesvol ingelogd. Maar uw gebruikersrol bestaat niet. Uwordt doorgestuurd naar de standaard homepagina</div>';      
          header("Refresh: 3; url=./index.php?content=home");
        break;
      }
      
    } else {
      // E-mailadres is niet bekend in database, terugsturen naar het inlogformulier
      echo '<div class="alert alert-danger" role="alert">Uw wachtwoord is niet correct, probeer het nogmaals</div>';
      header("Refresh: 2; url=./index.php?content=login_form");
    }
  } else {
    // E-mailadres is niet bekend in database, terugsturen naar het inlogformulier
    echo '<div class="alert alert-danger" role="alert">E-mail is niet bekend, probeer het nogmaals</div>';
    header("Refresh: 2; url=./index.php?content=login_form");
  }
?>