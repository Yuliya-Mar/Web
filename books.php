<?php
session_start();
require('connect.php');
?>

<!doctype html>
<html lang="ru">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>Veranda - book house</title>
  <link href="/docs/4.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="books.css" rel="stylesheet">
</head>
<body>

  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-info">
    <a class="navbar-brand" href="#">VERANDA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="main.php">Main</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="catalogue.php">Catalogue<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pa(after).php">Personal account</a>
        </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="..." aria-label="Search">
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <main role="main">

    <div class="list-group list-group-flush">
      <a href="#" class="list-group-item active list-group-item-action list-group-item-info">Books</a>
      <a href="#" class="list-group-item list-group-item-action list-group-item-info">Office supplies</a>
      <a href="#" class="list-group-item list-group-item-action list-group-item-info">Souvenirs</a>
      <a href="#" class="list-group-item list-group-item-action list-group-item-info">Games and toys</a>
      <a href="#" class="list-group-item list-group-item-action list-group-item-info">Creativity</a>
      <a href="special.php" class="list-group-item list-group-item-action list-group-item-info">Special products</a> 
    </div>

    <hr class="featurette-divider">

    <div class="card-columns">
      <div class="card border-info">
        <img class="im" src="imgs/nat9.jpg" alt="waiting">
        <div class="card-body">
          <h5 class="card-title">"Hitchhiker's guide to the galaxy"</h5>
          <p class="card-text">Douglas Adams</p>
          <p> <a href="#" class="badge badge-pill badge-info">490₽</a> </p>
        </div>
      </div>
      <div class="card border-info">
        <img class="im" src="imgs/nat2.jpg" alt="waiting">
        <div class="card-body">
          <h5 class="card-title">"Lolita"</h5>
          <p class="card-text">Vladimir Nabokov</p>
          <p><a href="#" class="badge badge-pill badge-info">1200₽</a></p>
        </div>
      </div>
      <div class="card border-info">
        <img class="im" src="imgs/nat5.jpg" alt="waiting">
        <div class="card-body">
          <h5 class="card-title">"Three comrades"</h5>
          <p class="card-text">Erich Maria Remarque</p>
          <p><a href="#" class="badge badge-pill badge-info">1000₽</a></p>
        </div>
      </div>
      <div class="card border-info">
        <img class="im" src="imgs/nat4.jpg" alt="waiting">
        <div class="card-body">
          <h5 class="card-title">"Diary"</h5>
          <p class="card-text">Chuck Palahniuk</p>
          <p><a href="#" class="badge badge-pill badge-info">350₽</a></p>
        </div>
      </div>
      <div class="card border-info">
        <img class="im" src="imgs/nat3.jpg" alt="waiting">
        <div class="card-body">
          <h5 class="card-title">"The ghosts"</h5>
          <p class="card-text">Chuck Palahniuk</p>
          <p><a href="#" class="badge badge-pill badge-info">290₽</a></p>
        </div>
      </div>
      <div class="card border-info">
        <img class="im" src="imgs/nat11.jpg" alt="waiting">
        <div class="card-body">
          <h5 class="card-title">"Fight club"</h5>
          <p class="card-text">Chuck Palahniuk</p>
          <p><a href="#" class="badge badge-pill badge-info">590₽</a></p>
        </div>
      </div>
      <div class="card border-info">
        <img class="im" src="imgs/nat7.jpg" alt="waiting">
        <div class="card-body">
          <h5 class="card-title">"Looking for Alaska"</h5>
          <p class="card-text">John Green</p>
          <p><a href="#" class="badge badge-pill badge-info">250₽</a></p>
        </div>
      </div>
      <div class="card border-info">
        <img class="im" src="imgs/nat8.jpg" alt="waiting">
        <div class="card-body">
          <h5 class="card-title">"Woman in white"</h5>
          <p class="card-text">Wilkie Collins</p>
          <p><a href="#" class="badge badge-pill badge-info">1200₽</a> </p>
        </div>
      </div>
      <div class="card border-info">
        <img class="im" src="imgs/nat1.jpg" alt="waiting">
        <div class="card-body">
          <h5 class="card-title">"Mint the tale"</h5>
          <p class="card-text">A. Polar</p>
          <p><a href="#" class="badge badge-pill badge-info">350₽</a></p>
        </div>
      </div>
      <div class="card border-info">
        <img class="im" src="imgs/nat10.jpg" alt="waiting">
        <div class="card-body">
          <h5 class="card-title">"Night in Lisbon"</h5>
          <p class="card-text">Erich Maria Remarque</p>
          <p><a href="#" class="badge badge-pill badge-info">490₽</a></p>
        </div>
      </div>
      <div class="card border-info">
        <img class="im" src="imgs/nat6.jpg" alt="waiting">
        <div class="card-body">
          <h5 class="card-title">"Hotel "at the dead Climber""</h5>
          <p class="card-text">Arkady and Boris Strugatsky</p>
          <p><a href="#" class="badge badge-pill badge-info">520₽</a></p>
        </div>
      </div>
      <div class="card border-info">
        <img class="im" src="imgs/nat12.jpg" alt="waiting">
        <div class="card-body">
          <h5 class="card-title">"Clockwork orange"</h5>
          <p class="card-text">Anthony Burgess</p>
          <p><a href="#" class="badge badge-pill badge-info">0₽</a></p>
        </div>
      </div>
    </div>

    <hr class="featurette-divider">

  </main>

  <footer class="container">
    <h6>Work schedule &middot; mon-fri 9:00-21:00 &middot; sat-sun 12:00-00:00</h6>
    <h6>Call us &middot; 89876537_3_</h6>
    <a class="btn btn-info" href="books.html" role="button">Back to top</a>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="/docs/4.3.1/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="/docs/4.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <?php include('statistic.php'); ?>

</body>
</html>