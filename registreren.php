<?php
include("./navbar.php");
include("./connectdb.php");
$email = $_POST["email"];
if ( empty($_POST["email"])) {
    echo '<div class="alert alert-warning" role="alert">U heeft geen e-mailadres ingevoerd. Dit is een verplicht veld. Probeer het nogmaals</div>';
    header("Refresh: 3; url=./index.php?content=register_form");
} else {
    $sql = "SELECT * FROM `inloggen` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    if ( mysqli_num_rows($result) == 1 ) {
        echo '<div class="alert alert-info" role="alert">Het door u ingevoerde e-mailadres bestaat al. Kies een nieuw e-mailadres</div>';
        header("Refresh: 3; ./index.php?content=register_form");
    } else {
        $sql = "INSERT INTO `inloggen` (`id`,
                                `username`
                                `email`,
                                `password`)
                        VALUES  (NULL,
                                '$username'
                                '$email',
                                'geheim')";
        $result = mysqli_query($conn, $sql);

        $id = mysqli_insert_id($conn);
        if ($result) {
            $to = $email;
            $subject = "Actievatielink www.dyslexiehulp.nl";
            $message = "<!DOCTYPE html>
                            <html> 
                                <head>
                                    <style>
                                    
                                    </style>
                                    <title>Activatielink</title>
                                </head>
                                <body>
                                <h1>Beste Gebruiker,</h1>
                                <p>U kunt via de onderstaande link uw account activeren.</p>
                                <p>U kunt vervolgens uw wachtwoord instellen en inloggen op de site.</p>
                                <p><a href='http://www.loginregistration.am1c.org/index.php?content=createpassword'>activatielink</a></p>
                                <p><a href='http://www.loginregistration.am1c.org/index.php?content=createpassword&id=$id'>activatielink</a></p>
                                <p>Met vriendelijke groet,</p>
                                <p>Guus de kaasman</p>
                                </body>
                                </html>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers = "From: noreply@login.nl" . "\r\n";
            $headers = "Cc: info@wakkerdier.nl" . "\r\n";

            $from = "Admin@login.nl";

            mail($to, $subject, $message, $headers);
            echo '<div class="alert alert-success" role="alert">"U bent geregistreerd. Wij hebben u een mail gestuurd naar dit adres. Klik daarin op de activatielink om uw registratie te voltooien."</div>';
            header("Refresh: 2; url=./index.php?content=login_form");
        } else {
            echo '<div class="alert alert-danger" role="alert">Er is iets misgegaan tijdens het registreren probeer het nogmaals</div>';
            header("Refresh: 2; url=./index.php?content=register_form");
        }
    }
}
?>
