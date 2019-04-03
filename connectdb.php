<!-- hiermee maken we verbinding met de database -->
<?php

define("SERVERNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "dyslexiehulp");

$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
?>