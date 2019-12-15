<?php
session_start();
if(!isset($_SESSION['email'])){
  header('Location:pa+login.php');
}
require('connect.php');
?>

<!doctype html>
<html lang="ru">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>Veranda - book house</title>
  <link href="/docs/4.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="pa1.css" rel="stylesheet">
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
        <li class="nav-item">
          <a class="nav-link" href="catalogue.php">Catalogue</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Personal account<span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="..." aria-label="Search">
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <main role="main">

    <hr class="featurette-divider">

    <div class="card border-info">
      <div class="card-body">
        <h5 class="card-title text-info">Username:</h5>
        <?php
        if(isset($_SESSION['email'])){
          $email=$_SESSION['email'];
          $query="SELECT * FROM info WHERE email='$email'";
          $result=mysqli_query($connection, $query) or die(mysqli_error($connection));
          $row=mysqli_fetch_array($result);
          echo $row['username'];
          echo '</br>';
          echo '</br>';
        }
        ?>
        <a class="btn btn-info" href="logout.php" role="button">Exit</a>
      </div>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#exampleModal">Make a call request
      </button>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Request</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-signin" method="POST" id="form">
                <input type="hidden" name="DATA[TITLE]" value="Заявка с лендинга">
                <input class="form-control" type="text" name="DATA[NAME]" required placeholder="Name">
                <input class="form-control" type="text" name="DATA[PHONE_WORK]" required placeholder="Phone">
                <br>
                <textarea class="form-control" name="DATA[COMMENTS]" placeholder="Comment"></textarea>
                <button type="submit" class="btn btn-info btn-lg">Request</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <img class="im" src="imgs/new2.jpg" alt="waiting">
    </div>

    <div class="col-md-8 order-md-1">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <?php
            echo $row['book1'];
            echo '</br>';
            echo $row['autor1'];
            ?>
          </div>
          <?php
            echo $row['price1'];
            echo '₽';
          ?>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <?php
            echo $row['book2'];
            echo '</br>';
            echo $row['autor2'];
            ?>
          </div>
          <?php
            echo $row['price2'];
            echo '₽';
          ?>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <?php
            echo $row['book3'];
            echo '</br>';
            echo $row['autor3'];
            ?>
          </div>
          <?php
          echo $row['price3'];
          echo '₽';
          ?>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <?php
          $res=$row['price1']+$row['price2']+$row['price3'];
          echo $res;
          echo '₽';
          ?>
        </li>
      </ul>
    </div>
  </main>

  <hr class="featurette-divider">

  <footer class="container">
    <h6>Work schedule &middot; mon-fri 9:00-21:00 &middot; sat-sun 12:00-00:00</h6>
    <h6>Call us &middot; 89876537_3_</h6>
    <a class="btn btn-info" href="#" role="button">Back to top</a>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="/docs/4.3.1/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="/docs/4.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="common.js"></script>
  <?php include('statistic.php'); ?>

</body>
</html>