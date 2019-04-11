<?php
  
  include("./connect_db.php");
  include("./functions.php");
  $password = sanitize($_POST["password"]);
  $checkpassword = sanitize($_POST["checkpassword"]);
  $id = sanitize($_POST["id"]);
  $pw = sanitize($_POST["pw"]);
  //uitlezen van de database
  $sql = "SELECT * FROM `login` WHERE `id` = $id";
  $result =  mysqli_query($conn, $sql);
  if ( mysqli_num_rows($result) == 1 ) {
    $record = mysqli_fetch_assoc($result);
    if ( password_verify($record["password"], $pw) ) {
          //controle of password leeg is
      if ( !empty($password) && !empty($checkpassword)) {
    //encrypten van het wachtwoord
        if ( !strcmp($password, $checkpassword)) {
          $blowfish_password =  password_hash($password, CRYPT_BLOWFISH);  
            //updaten van de database
          $sql = "UPDATE `login`
                  SET    `password` = '$blowfish_password'
                  WHERE  `id` = $id";
    
          $result = mysqli_query($conn, $sql);
    
          if ( $result ) {
            // inloggen succesvol
            echo '<div class="alert alert-success" role="alert">U wachtwoord is succesvol veranderd. U wordt doorgestuurd naar de inlogpagina</div>';
            header("Refresh: 2; url=./inloggen.php");
          } else {
            // inloggen niet succesvol
            echo '<div class="alert alert-danger" role="alert">Er is iets misgegaan tijdens het registreren van uw wachtwoord. Probeer het opnieuw via de activatielink</div>';
            header("Refresh: 2; url=./index.php");
          }
    
        } else {
          
          // foutmelding
          echo '<div class="alert alert-danger" role="alert">U ingevoerde wachtwoorden zijn niet gelijk, probeer het nogmaals...</div>';
          header("Refresh: 3; url=./createpassword.php");
        }    
      } else {
        // foutmelding
        echo '<div class="alert alert-danger" role="alert">U heeft een van de wachtwoordvelden niet ingevuld probeer het nogmaals...</div>';
        header("Refresh: 3; url=./createpassword.php");
      }
    } else {
      // foutmelding
      echo '<div class="alert alert-danger" role="alert">Uw id en password in de activatielink zijn niet correct. U wordt doorgestuurd naar de homepage</div>';
      header("Refresh: 2; url=./index.php");
    }
  } else {
    // foutmelding
    echo '<div class="alert alert-danger" role="alert">U heeft activatielink met een onbekend id. U wordt doorgestuurd naar de homepage</div>';
    header("Refresh: 2; url=./index.php");
  }  
?>