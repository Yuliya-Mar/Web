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
  <link href="jumbotron.css" rel="stylesheet">
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

    <div class="jumbotron">
      <div class="container">
        <h1>Hey, you're in the catalogue.</h1>
        <p>Here you can find a list of sections and go to any of them. Also here you will find a selection of books on various topics.</p>
      </div>
    </div>

    <?php
    $query = "SELECT * FROM Categories";
    $result = mysqli_query($connection, $query);
    while($cat = mysqli_fetch_assoc($result)){
      ?>
      <div class="list-group list-group-flush">
        <a href="catalog_categ.php?categ=<?= $cat['id']; ?>" class="list-group-item list-group-item-action list-group-item-info"><?php echo $cat['name']; ?></a>
        <?php
      }
      ?>
      <a href="special.php" class="list-group-item list-group-item-action list-group-item-info">Special products</a>
      <br>
      <a href="authors.php" class="list-group-item list-group-item-action list-group-item-info">View by author</a>
    </div>

    <hr class="featurette-divider">

    <div class="row">
      <div class="col-sm-4">
        <div class="card border-info mb-3">
          <img src="imgs/im21.jpg" class="card-img-top" alt="...">
          <div class="card-body text-info">
            <p class="card-text">Top 10 books of Nobel laureates of the 20th century</p>
            <a href="#" class="btn btn-info">Watch list</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card border-info mb-3">
          <img src="imgs/im2.jpg" class="card-img-top" alt="...">
          <div class="card-body text-info">
            <p class="card-text">Top 10 books for exam preparation</p>
            <a href="top.php" class="btn btn-info">Watch list</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card border-info mb-3">
          <img src="imgs/im22.jpg" class="card-img-top" alt="...">
          <div class="card-body text-info">
            <p class="card-text">Top 10 books about the wonders of nature</p>
            <a href="#" class="btn btn-info">Watch list</a>
          </div>
        </div>
      </div>
    </div>

    <hr class="featurette-divider">

  </main>

  <footer class="container">
    <h6>Work schedule &middot; mon-fri 9:00-21:00 &middot; sat-sun 12:00-00:00</h6>
    <h6>Call us &middot; 89876537_3_</h6>
    <a class="btn btn-info" href="catalogue.html" role="button">Back to top</a>
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