<?php
	require_once("connect.php");

    echo '<pre>';
	var_dump($_REQUEST);
	$invDate = $_POST['date'];
	$custname = $_POST['cname'];
	$cid = $_POST['cid'];

	$invAmt = $_POST['grandtotal']; 
	

	$sql="INSERT INTO saleinv(sInvDate,sInvAmount,cId) 
		VALUES (STR_TO_DATE('".$invDate."','%d/%m/%Y'),'".$invAmt."','".$cid."')";

	if(!$result = $conn->query($sql)){
		die('There was an error running the query [' . $conn->error . ']');
	}else{
		$insertId = mysqli_insert_id($conn);

		foreach ($_POST['pname'] as $key => $prodId) {
			
			$sQty = $_POST['qty'][$key];
			$sMrp = $_POST['mrp'][$key];
		$sql = "INSERT INTO saleitem(sInvNo,prodId,sInvQty,itemMrp) 
		VALUES ('".$insertId."','".$prodId."','".$sQty."','".$sMrp."')";
			if(!$result = $conn->query($sql)){
				die('There was an error running the query [' . $conn->error . ']');
			}else{
					$sql = "INSERT INTO inventory (prodId,qty,mrp) 
						VALUES('".$prodId."' , '".-$sQty."','".$sMrp."')
						ON DUPLICATE KEY UPDATE qty = (qty - '".$sQty."')";
				if(!$result = $conn->query($sql)){
				die('There was an error running the query [' . $conn->error . ']');
				}else{
					
			}
		}
	}

		
		header("Location:sInvoice.php");
	}

?>