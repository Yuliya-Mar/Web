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
		if(isset($_FILES['image'])){
			$name = $_FILES['image']['name'];
			$tmp = $_FILES['image']['tmp_name'];
			$ext1 = explode('.', $name);
			$ext2 = end($ext1);
			$ext3 = strtolower($ext2);

			$new_name = "files/" . $_FILES['image']['name'];

			move_uploaded_file($tmp, "files/" . $name);	

			if(isset($_GET['adding'])){
				$id_prod=($_GET['adding']);

				//удаляем старую
				$query="SELECT * FROM images WHERE id_prod=$id_prod";
				$resss=mysqli_query($connection, $query);
				$ress=mysqli_fetch_assoc($resss);
				unlink($ress['content']);
				$query="DELETE FROM images WHERE id_prod=$id_prod";
				mysqli_query($connection, $query);

				//добавляем новую
				$query = "INSERT INTO images (id_prod, content) VALUES ('$id_prod', '$new_name')";
				mysqli_query($connection, $query);
			}
			header('Location:special.php');
		}
		?>
		<form class="form-signin" enctype="multipart/form-data" method="POST">
			Image: 
			<input class="btn btn-lg btn-outline-info btn-block" type="file" name="image"></input>
			<hr>
			<input class="btn btn-lg btn-info btn-block" type="submit" value="Save"></input>
		</form>
	</main>
	<?php include('scripts.php'); ?>
</body>
</html>