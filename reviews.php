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
    if(isset($_GET['del_rev'])){
      header("Location:catalogue.php");
      $id_del = $_GET['del_rev'];
      $query_del = "DELETE FROM Reviews WHERE id = $id_del";
      mysqli_query($connection, $query_del);
    }
    ?>

    <?php
    if(isset($_GET['rew'])){
      $book_id = ($_GET['rew']);
      $query = "SELECT * FROM Books WHERE id = $book_id";
      $result = mysqli_query($connection, $query);
      $book = mysqli_fetch_assoc($result);
      ?>
      <hr class="featurette-divider">
      <h5><?php echo $book['name']; ?>:</h5>
      <hr class="featurette-divider">
      <?php
      $query = "SELECT * FROM Reviews WHERE id_book = {$book_id}";
      $result = mysqli_query($connection, $query);
      while($review = mysqli_fetch_assoc($result)){
        ?>
        <div class="card border-info">
          <div class="card-body">
            <h5 class="card-title text-info">Name: <?php echo $review['name']; ?></h5>
            <p class="card-text"><?php echo $review['content']; ?></p>
            <p class="card-text"><small class="text-muted"> <?php echo "Date addition: " . $review['data']; ?> </small></p>
            <?php
            $email = $_SESSION['email'];
            $query_acc = "SELECT * FROM info WHERE email = '$email'";
            $result_acc = mysqli_query($connection, $query_acc);
            $user = mysqli_fetch_assoc($result_acc);
            if($user['access']==1){
              ?>
              <a href="?del_rev=<?= $review['id']; ?>">Delete review</a>
              <?php
            }
            ?>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
    <?php
  }
  ?>

  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Add review</button>

  <div class="modal fade" id="exampleModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add review</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-signin" method="POST">
            <label for="name" class="sr-only">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" required>
            <label for="description">Enter review:</label>
            <textarea class="form-control" name="review" rows="3" required></textarea>
            <button class="btn btn-lg btn-outline-info btn-block" type="submit" name="new_rev">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  if(isset($_POST['new_rev'])){
    header("Location:catalogue.php");
    $name = $_POST['name'];
    $review = $_POST['review'];
    $data = date("Y-m-j");
    $query = "INSERT INTO Reviews (name, content, data, id_book) VALUES ('$name', '$review','$data', '$book_id')";
    mysqli_query($connection, $query);
  }
  ?>

  <hr class="featurette-divider">

  </main>

  <?php include('foot.php'); ?>
  <?php include('scripts.php'); ?>
  <?php include('statistic.php'); ?>

  </body>
  </html>