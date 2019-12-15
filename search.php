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
		</div>
	</nav>
	<main role="main">
		<div class="jumbotron">
			<div class="container">
				<h3>Result of search:</h3>
				<?php 
				$s = $_SESSION['SEARCH'];
				$query = "SELECT * FROM products WHERE description LIKE '%$s%' OR name LIKE '%$s%'";
				$result = mysqli_query($connection, $query);
				?>
				<div class="card-columns">
					<?php
					while ($cat = mysqli_fetch_assoc($result)) { 
						$prod_count = mysqli_query($connection, $query);
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
							</div>
						</div>
					<?php } ?>
			</div>
		</div>
		<hr class="featurette-divider">
	</main>
	<?php include('foot.php'); ?>
	<?php include('scripts.php'); ?>
	<?php include('statistic.php'); ?>
</body>
</html>