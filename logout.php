<?php
	session_start();
    session_destroy();
	header('Location: pa+login.php');
	exit();
?>
