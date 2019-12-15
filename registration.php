<!doctype html>
<html lang="ru">
<head>
	<?php include('head.php'); ?>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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

	<?php
	require ('connect.php');

	if(isset($_POST['user']) && isset($_POST['password'])){
		var_dump($_POST);

		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$key = '6Lck88QUAAAAAFjZFYSvgsTy5afV271gbu-OGzc-';
		$query = $url . '?secret=' . $key . '&response=' . $_POST['g-recaptcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR'];

		$data = json_decode(file_get_contents($query));

		if($data->success){
			$access = 3;
			$user = $_POST['user'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$flag=1;

			$query = "SELECT * FROM info";
			$result = mysqli_query($connection, $query);
			while($str = mysqli_fetch_assoc($result)){
				if($user == $str['username'])
					$flag=0;
			}

			if($flag){
				$query = "INSERT INTO info (access, username, email, password) VALUES ('$access', '$user', '$email', '$password')";
				$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
				header('Location:pa+login.php');
			} else
			echo "Username is busy!";
		}

	}
	?>

	<main role="main">
		<form class="form-signin" method="POST">
			<input type="text" name="user" class="form-control" placeholder="Username" required>
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" name="email" class="form-control" placeholder="Email address" required>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password" required>
			<div class="g-recaptcha" data-sitekey="6Lck88QUAAAAAHyEm8XYLffA6XXSeYh6ZY7KcEQt"></div>
			<button class="btn btn-lg btn-outline-info btn-block" type="submit">Registration</button>
		</form>
	</main>
	<?php include('scripts.php'); ?>
	<?php include('statistic.php'); ?>
</body>
</html>