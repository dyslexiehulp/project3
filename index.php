<?php session_start(); ?>
<!doctype html>

<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Dyslexiehulp</title>
  </head>
  <body>
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
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./image/scrabble.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./image/3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./image/4.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="Vorige">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Vorige</span>
          </a>
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
              <p>Hey, </p>
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