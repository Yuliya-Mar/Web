<?php
session_start();
require('connect.php');
?>

<!doctype html>
<html lang="ru">
<head>
  <?php include('head.php'); ?>
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

    <?php
    if(isset($_GET['aut'])){
      $aut = ($_GET['aut']);
      $query = "SELECT * FROM Authors WHERE id = $aut";
      $result = mysqli_query($connection, $query);
      $author = mysqli_fetch_assoc($result);
      ?>
      <hr class="featurette-divider">
      <h5><?php echo $author['name']; ?>:</h5>
      <hr class="featurette-divider">
      <?php
      $query = "SELECT * FROM Books WHERE author = $aut";
      $result = mysqli_query($connection, $query);
      ?>
      <div class="card-columns">
        <?php
        while($book = mysqli_fetch_assoc($result)){
          $query_im = "SELECT * FROM Covers WHERE id = {$book['cover']}";
          $result_im = mysqli_query($connection, $query_im);
          $cover = mysqli_fetch_assoc($result_im);
          $query_au = "SELECT * FROM Authors WHERE id = {$book['author']}";
          $result_au = mysqli_query($connection, $query_au);
          $author = mysqli_fetch_assoc($result_au);
          ?>
          <div class="card border-info">
            <img class="im" src="<?php echo $cover['name']; ?>" alt="waiting">
            <div class="card-body">
              <h5 class="card-title">"<?php echo $book['name']; ?>"</h5>
              <p class="card-text"><?php echo $author['name']; ?></p>
              <p> <a href="#" class="badge badge-pill badge-info"><?php echo $book['price']; ?>₽</a> </p>
              <a href="reviews.php?rew=<?= $book['id']; ?>">Reviews</a>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
      <?php
    }
    ?>

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