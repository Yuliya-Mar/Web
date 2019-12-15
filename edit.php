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
			<form class="form-inline mt-2 mt-md-0">
				<input class="form-control mr-sm-2" type="text" placeholder="..." aria-label="Search">
				<button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<main role="main">
		<?php
		if(isset($_SESSION['email'])){
			$email=$_SESSION['email'];
			if(isset($_GET['edit'])){
				$id=($_GET['edit']);
				$query5="SELECT * FROM products WHERE id=$id";
				$result5=mysqli_query($connection, $query5) or die(mysqli_error($connection));
				$rowx=mysqli_fetch_assoc($result5);
				//header('Location:special.php');
			}
		}
		?>
		<form class="form-signin" method="POST">
			<label for="name" class="sr-only">Name</label>
			<input type="text" name="name" class="form-control" value="<?php echo $rowx['name']; ?>">
			<label for="price" class="sr-only">Price</label>
			<input type="text" name="price" class="form-control" value="<?php echo $rowx['price']; ?>" pattern="^[ 0-9]+$">
			<label for="description">Enter description:</label>
			<textarea class="form-control" name="description" rows="3"><?php echo $rowx['description']; ?></textarea>
			<button class="btn btn-lg btn-outline-info btn-block" type="submit">Edit</button>
		</form>
	</main>
	<?php
	if(isset($_POST['name']) and isset($_POST['price']) and isset($_POST['description'])){
		$name = $_POST['name'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$data = date("Y-m-j");
		$query6 = "UPDATE products SET name='$name', price='$price', description='$description' WHERE id=$id";
		$result6=mysqli_query($connection, $query6);
		header('Location:special.php');
	}
	?>
	<?php include('scripts.php'); ?>
</body>
</html>