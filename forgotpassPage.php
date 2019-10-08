<?php
  require_once("connect.php");

  $user = $_POST['username'];
  $pass = $_POST['password'];


  $sql="UPDATE login SET password ='".$pass."' WHERE username ='".$user."'";
  if(!$result = $conn->query($sql)){
    echo'<script type="text/javascript">
  	alert("Invalid Username!")
  	window.location = "forgotpass.php";
	</script>';
  }else{
    header("Location:login.php");
  }
?>