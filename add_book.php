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

		<?php
		if(isset($_POST['adding'])){
			header('Location:catalogue.php');

			$name = $_POST['name'];
			$price = $_POST['price'];
			$categorie = $_GET['add'];

			$author = $_POST['author'];
			$query_add_author = "INSERT INTO Authors (name) VALUES ('$author')";
			mysqli_query($connection, $query_add_author);

			$query_get_author = "SELECT * FROM Authors WHERE id = (SELECT MAX(id) FROM Authors)";
			$result_get_author = mysqli_query($connection, $query_get_author);
			$author_last = mysqli_fetch_assoc($result_get_author);
			$author = $author_last['id'];

			if(isset($_FILES['image'])){
				$name_cov = $_FILES['image']['name'];
				$tmp = $_FILES['image']['tmp_name'];
				$ext1 = explode('.', $name_cov);
				$ext2 = end($ext1);
				$ext3 = strtolower($ext2);

				$new_name = "files/" . $_FILES['image']['name'];

				move_uploaded_file($tmp, "files/" . $name_cov);	

				$query_cov = "INSERT INTO Covers (name) VALUES ('$new_name')";
				mysqli_query($connection, $query_cov);
			}

			$query_get_cover = "SELECT * FROM Covers WHERE id = (SELECT MAX(id) FROM Covers)";
			$result_get_cover = mysqli_query($connection, $query_get_cover);
			$cover_last = mysqli_fetch_assoc($result_get_cover);
			$cover = $cover_last['id'];

			$query_add = "INSERT INTO Books (name, price, categorie, author, cover) VALUES ('$name', '$price', '$categorie', '$author', '$cover')";
			mysqli_query($connection, $query_add);
		}
		?>

		<form class="form-signin" enctype="multipart/form-data" method="POST">
			<label for="name" class="sr-only">Book title</label>
			<input type="text" name="name" class="form-control" placeholder="Name" required>
			<label for="author" class="sr-only">Author</label>
			<input type="text" name="author" class="form-control" placeholder="New author" required>
			<label for="price" class="sr-only">Price</label>
			<input type="text" name="price" class="form-control" placeholder="Price" pattern="^[ 0-9]+$" required>
			Cover: 
			<input class="btn btn-lg btn-info btn-block" type="file" name="image"></input>
			<hr>
			<button class="btn btn-lg btn-outline-info btn-block" type="submit" name="adding">Add</button>
		</form>

	</main>
	
	<?php include('scripts.php'); ?>
</body>
</html>