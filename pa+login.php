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

		<div class="jumbotron">
			<div class="container">
				<h1>Hey, you're in the personal account.</h1>
				<p>To view your personal information, you must log in.</p>
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">log in
				</button>
				<hr>
				<a href="registration.php">Registration</a>
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Log in</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form class="form-signin" method="POST">
									<label for="inputEmail" class="sr-only">Email address</label>
									<input type="email" name="email" class="form-control" placeholder="Email address" required>
									<label for="inputPassword" class="sr-only">Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" required>
									<button class="btn btn-lg btn-outline-info btn-block" type="submit">Sign in</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<hr class="featurette-divider">

	</main>

	<footer class="container">
		<h6>Work schedule &middot; mon-fri 9:00-21:00 &middot; sat-sun 12:00-00:00</h6>
		<h6>Call us &middot; 89876537_3_</h6>
	</footer>

	<?php
	session_start();
	require('connect.php');

	if (isset($_POST['email']) and isset($_POST['password'])){
		$email=$_POST['email'];
		$password=$_POST['password'];

		$hash=password_hash($password, PASSWORD_DEFAULT);

		$query="SELECT * FROM info WHERE email='$email' and password='$password'";
		$result=mysqli_query($connection, $query) or die(mysqli_error($connection));
		$count=mysqli_num_rows($result);

		if($count==1){
			$_SESSION['email']=$email;
		} else{
			header('Location:err.html');
			exit();
		}

		if(isset($_SESSION['email'])){
			header('Location:pa(after).php');
			exit();
		} else{
			header('Location:err.html');
			exit();
		}
	}


	?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="/docs/4.3.1/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="/docs/4.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<?php include('statistic.php'); ?>

</body>
</html>
