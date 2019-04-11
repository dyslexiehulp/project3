<!-- hiermee maken we verbinding met de database -->
<?php
//servernaam
define("SERVERNAME", "localhost");
//gebruikersnaamname
define("USERNAME", "root");
//wachtwoord is leeg, zoals standaard
define("PASSWORD", "");
//naam van de database 
define("DBNAME", "dyslexiehulp");
// maakt connectie met de database 
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
?>