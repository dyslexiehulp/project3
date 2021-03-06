<?php session_start(); ?>
<!doctype html>

<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- dit zorgt dat er tekst staat in het tabje van de browser -->
    <title>Dyslexiehulp</title>
  </head>
  <body>
  <!--import van de bootstrap benodigde links -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <main class="container">
      <div class="row">
          <div class="col-12">
          <!--import van de navbar -->
              <?php include("./navbar.php"); ?>
          </div>
        </div>
        <!-- hier staat het carousel inclusief de afbeeldingen -->
      <div class="row">
        <div class="col-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <!--hiermee kun je selecteren naar welke afbeelding je wilt gaan -->
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <div class="carousel-item active">
            <!--import van de eerste afbeelding -->
              <img src="./image/scrabble.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <!--import van de 2e afbeelding -->
              <img src="./image/3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <!--import van de 3e afbeelding -->
              <img src="./image/4.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <!--hiermee kun je bladeren naar de vorige afbeelding in het carousel -->
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="Vorige">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Vorige</span>
          </a>
          <!--hiermee kun je bladeren naar de volgende afbeelding in het carousel -->
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="Volgende">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Volgende</span>
          </a>
      </div>
        </div>
          </div>
          <!-- informatie over de website -->
          <div class="row">
            <div class="col-12">
              <div class="jumbotron">
              <h1 class="display-4">Welkom!</h1>
              <p class="lead">Dyslexie? Wij helpen je verder!</p>
              <hr class="my-4">
              <p><h6>Hey, Heb jij ook moeite met lezen?</h6>
              kun je (sommige) letters moeilijk uit elkaar houden?<br> 
              Dan is de kans groot dat jij net als 1,19 miljoen andere mensen dyslexie hebt.<br>
              Dat is helemaal niet erg, wij hebben onze website daarvoor namelijk opgebouwd met handige tips en leuke weetjes over dyslexie!<br>
              Neem gerust een kijkje, als je het niet snapt kun je ons altijd mailen. het mailadres staat op de Over Ons Pagina!</p>
              </div>
              </div>
            </div>
      <!--Import van de footer -->
      <div class="row">
          <div class="col-12">
              <?php include("./footer.php"); ?>
          </div>
      </div>



      

    </main>

    </body>
</html>