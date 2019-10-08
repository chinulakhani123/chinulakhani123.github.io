<?php
	session_start();
	require_once("connect.php");

	$sId = isset($_POST['sId'])?$_POST['sId']:0;
	$suppname = $_POST['suppliername'];
	$suppphone = $_POST['supplierPhone'];
	$suppemail=$_POST['supplierEmail'];
	$suppaddress=$_POST['supplierAddress'];

	if($sId > 0){
	$sql="INSERT INTO suppdetails (sName,sPhoNum,sEmail,sAddress) 
		VALUES ('".$suppname."','".$suppphone."','".$suppemail."','".$suppaddress."')";

	} else {
		$sql="INSERT INTO suppdetails (sName,sPhoNum,sEmail,sAddress) 
		VALUES ('".$suppname."','".$suppphone."','".$suppemail."','".$suppaddress."')
		ON DUPLICATE KEY
		UPDATE sName = '".$suppname."',sPhoNum = '".$suppphone."',sEmail='".$suppemail."',sAddress='".$suppaddress."'";		
	}
		
	if(!$result = $conn->query($sql)){
		die('There was an error running the query [' . $conn->error . ']');
	}else{
		echo'<script type="text/javascript">
	  	alert("Added/Modified Successfully!!")
	  	window.location = "supplierdetails.php";
		</script>';
	}

?>