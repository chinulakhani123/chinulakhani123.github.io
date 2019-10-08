<?php
	session_start();
	require_once("connect.php");

	$cId = isset($_POST['cId'])?$_POST['cId']:0;
	$custname = $_POST['customername'];
	$custphone = $_POST['customerPhone'];
	$custemail=$_POST['customerEmail'];
	$custaddress=$_POST['customerAddress'];

	if($cId > 0){
	$sql="INSERT INTO custdetails (cName,cPhoNo,cEmail,cAddress) 
		VALUES ('".$custname."','".$custphone."','".$custemail."','".$custaddress."')";

	} else {
		$sql="INSERT INTO custdetails (cName,cPhoNo,cEmail,cAddress) 
		VALUES ('".$custname."','".$custphone."','".$custemail."','".$custaddress."')
		ON DUPLICATE KEY
		UPDATE cName = '".$custname."',cPhoNo = '".$custphone."',cEmail='".$custemail."',cAddress='".$custaddress."'";		
	}
		
	if(!$result = $conn->query($sql)){
		die('There was an error running the query [' . $conn->error . ']');
	}else{
		echo'<script type="text/javascript">
	  	alert("Added/Modified Successfully!!")
	  	window.location = "customerdetails.php";
		</script>';
	}

?>