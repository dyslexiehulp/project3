<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


              <!--configuratie welke role naar welke pagina moet -->
            <?php
            if ( isset($_SESSION["id"])) {
                  
                switch ($_SESSION["userrole"]) {
                  //config van de admin role
                    case 'admin':
                        echo '<li class="nav-item">
                      <a class="nav-link" href="./registeren.php?content=administrator_home">adminhome</a>
                    </li>';
                        break;
                        //config van de root role
                    case 'root':
                        echo '<li class="nav-item">
                      <a class="nav-link" href="./registreren.php?content=root_home">roothome</a>
                    </li>';
                        break;
                        //config van de moderator role
                    case 'moderator':
                        echo '<li class="nav-item">
                      <a class="nav-link" href="./registreren.php?content=moderator_home">moderatorhome</a>
                    </li>';
                        break;
                        //config van de customer role, dit is tevens de standaard role die iedereen krijgt
                    case 'customer':
                        echo '<li class="nav-item">
                      <a class="nav-link" href="./registreren.php?content=customer_home">customerhome</a>
                    </li>';
                        break;
                    default:
                    //import van de header
                        header("Location: ./registeren.php?content=logout");
                        break;
                }
                //import van de uitlog knop
                echo '<li class="nav-item">
                  <a class="nav-link" href="./registeren.php?content=logout">uitloggen</a>
                </li>';
            } else {
                // Biedt de login en register links aan
                echo '<li class="nav-item active">
                  <a class="nav-link" href="./registereren.php?content=home">Home<span class="sr-only">(current)</span></a>
                </li>         
                <li class="nav-item">
                  <a class="nav-link" href="./registreren.php?content=register_form">Registreer</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="./registeren.php?content=login_form">Inloggen</a>
                </li>';
            }
            ?>
        </ul>
    </div>
    <!--welkom heten van de gebruiker -->
    <span id="welkom"><?php if (isset($_SESSION["email"])) { echo "Welkom " . $_SESSION["email"]; } ?></span>
</nav>