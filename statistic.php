<?php
$username = $_SESSION['email']; 
$ip = $_SERVER["REMOTE_ADDR"]; 
$url = $_SERVER["REQUEST_URI"]; 
$ref = $_SERVER["HTTP_REFERER"]; 
$date = date("Y-m-d");  
mysqli_query($connection, "INSERT INTO `visits` (`username`, `ip`, `url`, `ref`, `date`) VALUES ('$username', '$ip', '$url', '$ref', '$date')") or die(mysqli_error($connection));
?>

