<?php
// dit zorgt ervoor dat pagina's geladen worden vanaf de inlog pagina
if (isset($_GET["content"])) {
    include("./" . $_GET["content"] . ".php");
} else {
    include("./index.php");
}
?>