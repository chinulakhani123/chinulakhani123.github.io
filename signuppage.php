<?php
	require_once("connect.php");

	$username = $_POST['username'];
	$password = $_POST['password'];
	

	$sql="INSERT INTO login (USERNAME,PASSWORD) 
		VALUES ('".$username."','".$password."')";
		
	if(!$result = $conn->query($sql)){
		die('There was an error running the query [' . $conn->error . ']');
	}else{

		header('location:login.php');
	}

?>