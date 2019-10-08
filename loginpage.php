<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" type="text/css" href="all.css">
</head>
<body>

<?php
session_start();
require_once("connect.php");
$uname = $_POST['username'];
$pass = $_POST['password'];

$result = mysqli_query($conn,"SELECT USERNAME,PASSWORD FROM login WHERE USERNAME = '".$uname."'") or die( mysqli_error($conn));

$row = mysqli_fetch_array($result);

if($row['USERNAME']==$uname && $row['PASSWORD']==$pass){
	$_SESSION['logged_in'] = 1;
	$_SESSION['USERNAME'] = $uname;


    header("Location:home.php");

}else{
	
	echo'<script type="text/javascript">
  	alert("Invalid Credentials!")
  	window.location = "login.php";
	</script>';


}




?>
</body>
</html>