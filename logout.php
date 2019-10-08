<?php 
	
	session_start();
	unset($_SESSION['logged_in']);
	unset($_SESSION['USERNAME']);
	session_destroy();
	header("Location:login.php");
?>

