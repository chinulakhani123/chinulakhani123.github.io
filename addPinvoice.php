<?php
	require_once("connect.php");

	$invDate = $_POST['date'];
	$suppname = $_POST['sname'];
	$sid = $_POST['sid'];

	$invAmt = $_POST['grandtotal']; 
	

	$sql="INSERT INTO purchaseinvoice(pInvDate,pInvAmt,sId) 
		VALUES (STR_TO_DATE('".$invDate."','%d/%m/%Y'),'".$invAmt."','".$sid."')";

	if(!$result = $conn->query($sql)){
		die('There was an error running the query [' . $conn->error . ']');
	}else{
		$insertId = mysqli_insert_id($conn);

		foreach ($_POST['pname'] as $key => $prodId) {
			$pRate = $_POST['rate'][$key];
			$pQty = $_POST['qty'][$key];
			$pMrp = $_POST['mrp'][$key];
		$sql = "INSERT INTO puritem(pInvNo,prodId,pInvQty,pItemRate,itemMrp) 
		VALUES ('".$insertId."','".$prodId."','".$pQty."','".$pRate."','".$pMrp."')";
			if(!$result = $conn->query($sql)){
				die('There was an error running the query [' . $conn->error . ']');
			}else{
				
				$sql = "INSERT INTO inventory (prodId,qty,mrp) 
						VALUES('".$prodId."' , '".$pQty."','".$pMrp."')
						ON DUPLICATE KEY UPDATE qty = (qty + '".$pQty."')";
				if(!$result = $conn->query($sql)){
				die('There was an error running the query [' . $conn->error . ']');
				}else{
					
			}
		}

		
		header("Location:pInvoice.php");
	}
}

?>