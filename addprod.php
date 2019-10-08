<?php
	require_once("connect.php");
	$pId = isset($_POST['pId'])?$_POST['pId']:0;
	$prodname = $_POST['pName'];
	$minqty = $_POST['minQty'];
	$maxqty=$_POST['maxQty'];
	
	if ($pId > 0) {
		$sql="INSERT INTO proddetails(pName,minQty,maxQty) 
		VALUES ('".$prodname."','".$minqty."','".$maxqty."')";
		
	}else{
	$sql="INSERT INTO proddetails(pName,minQty,maxQty) 
		VALUES ('".$prodname."','".$minqty."','".$maxqty."')
		ON DUPLICATE KEY
		UPDATE pName = '".$prodname."',minQty = '".$minqty."',maxQty='".$maxqty."'";
	}
	if(!$result = $conn->query($sql)){
		die('There was an error running the query [' . $conn->error . ']');
	}else{
		echo'<script type="text/javascript">
	  	alert("Added/Modified Successfully!!")
	  	window.location = "productdetails.php";
		</script>';
	}

?>