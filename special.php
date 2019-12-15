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
	<?php include('head.php'); ?>
</head>
<body>
	<?php
	if (isset($_POST['ser'])) {
		$_SESSION['SEARCH'] = $_POST['tex'];
		exit(header('Location:search.php'));
	}
	?>
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
			<form class="form-inline mt-2 mt-md-0" method="POST">
				<input class="form-control mr-sm-2" type="text" placeholder="..." aria-label="Search" name="tex" required>
				<button class="btn btn-outline-warning my-2 my-sm-0" type="submit" name="ser">Search</button>
			</form>
		</div>
	</nav>
	<main role="main">
		<div class="jumbotron">
			<div class="container">
				<h3>List of products:</h3>
				<?php 
				$query = "SELECT * FROM products";
				$result = mysqli_query($connection, $query);
				?>
				<div class="card-columns">
					<?php
					while ($cat = mysqli_fetch_assoc($result)) { 
						$prod_count = mysqli_query($connection, "SELECT * FROM products");
						$prod_count_result = mysqli_fetch_assoc($prod_count);

						$id_prod = $cat['id'];

						$im = mysqli_query($connection, "SELECT * FROM images WHERE id_prod=$id_prod");
						$imm = mysqli_fetch_assoc($im);
						?>
						<div class="card border-info">
							<img class="im" src="<?php echo $imm['content']; ?>" alt="...">
							<div class="card-body">
								<h5> <?php echo $cat['name']; ?> </h5>
								<p> <?php echo $cat['description']; ?> </p>
								<p class="card-text"><small class="text-muted"> <?php echo "Date of product addition: " . $cat['data']; ?> </small></p>
								<p class="card-text"><small class="text-muted"> <?php echo "Price: " . $cat['price'] . "p"; ?> </small></p>
								<?php
								if(isset($_SESSION['email'])){
									$email=$_SESSION['email'];
									if(isset($_GET['del'])){
										$id=($_GET['del']);
										$query="SELECT * FROM images WHERE id_prod=$id";
										$resss=mysqli_query($connection, $query);
										$ress=mysqli_fetch_assoc($resss);
										unlink($ress['content']);
										$query="DELETE FROM images WHERE id_prod=$id";
										mysqli_query($connection, $query);
										$query4="DELETE FROM products WHERE id=$id";
										mysqli_query($connection, $query4) or die(mysqli_error($connection));
										header('Location:special.php');
									}
									$query3="SELECT * FROM info WHERE email='$email'";
									$result3=mysqli_query($connection, $query3) or die(mysqli_error($connection));
									$row=mysqli_fetch_array($result3);
									if($row['access']==1){ ?>
										<a href="edit.php?edit=<?= $cat['id']; ?>">Edit</a>
										<a href="?del=<?= $cat['id']; ?>">Delete</a>
										<a href="image.php?adding=<?= $cat['id']; ?>">Add image</a>   
										<?php
									}
								}
								?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="container">
				<?php
				if(isset($_SESSION['email'])){
					if($row['access']==1){ ?>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Add product
						</button>   
						<?php
					}
				}
				?>
				<div class="modal fade" id="exampleModal" role="dialog" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add product</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form class="form-signin" method="POST">
									<label for="name" class="sr-only">Name</label>
									<input type="text" name="name" class="form-control" placeholder="Name" required>
									<label for="price" class="sr-only">Price</label>
									<input type="text" name="price" class="form-control" placeholder="Price" pattern="^[ 0-9]+$" required>
									<label for="description">Enter description:</label>
									<textarea class="form-control" name="description" rows="3" required></textarea>
									<button class="btn btn-lg btn-outline-info btn-block" type="submit">Add</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			if(isset($_POST['name']) and isset($_POST['price']) and isset($_POST['description'])){
				header('Location:special.php');
				$name = $_POST['name'];
				$price = $_POST['price'];
				$description = $_POST['description'];
				$data = date("Y-m-j");
				$query2 = "INSERT INTO products (name, price, data, description) VALUES ('$name', '$price','$data', '$description')";
				$result2 = mysqli_query($connection, $query2);
			}
			?>
			<hr class="featurette-divider">
		</main>
		<?php include('foot.php'); ?>
		<?php include('scripts.php'); ?>
		<?php include('statistic.php'); ?>
	</body>
	</html>