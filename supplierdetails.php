<!DOCTYPE html>
<html>
<?php
  session_start();
	include 'navbar.php';
?>
<head>
	<link rel="stylesheet" type="text/css" href="all.css">
</head>
<head>
	<title>Supplier Details</title>
</head>
<style type="text/css">
		#button1 {
  background-color:#4CAF50 ;
  padding: 14px 16px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  float: center;
  display: inline-block;
}
      #button2 {
  background-color:#4CAF50 ;
  padding: 14px 16px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 25%;
  float: center;
  display: inline-block;
}
</style>
<?php
  require_once("connect.php");



  $sId = isset($_REQUEST['sId'])?$_REQUEST['sId']:0;
  if($sId > 0){
    $sql = "SELECT * FROM suppdetails WHERE sId = ".$sId;
    if(!$result = $conn->query($sql)){
       die('There was an error running the query [' . $conn->error . ']');
    }else{
      echo"<h1>Supplier Details</h1>";
      $row = $result->fetch_assoc();
      $sName = $row['sName'];
      $sPhoNum = $row['sPhoNum'];
      $sEmail = $row['sEmail'];
      $sAddress = $row['sAddress'];
    }
  }
?>
<body>   
    <form id="form1" action="addsupp.php" method="POST">  
    <div>                
    </div>   
    <h2 align="center">Add Supplier Details</h2>  
    <input type="hidden" name="" value="<? echo $sId; ?>">
    <table id="table1"; cellspacing="5px" cellpadding="5%"; align="center" style="width:100%">  
       <tr>  
              <td  align="right" class="style1">Name:</td>
              <td class="style1"><input type="text" name="suppliername" 
                <?php 
                  echo isset($sName) ?  'value="'.$sName.'"': '';
                ?>
                /></td>  
       </tr>  
       <tr>  
              <td align="right">Phone No:</td> 
              <td class="style1"><input type="text" name="supplierPhone" 
                <?php 
                  echo isset($sPhoNum) ?  'value="'.$sPhoNum.'"': '';
                ?>/></td>
       </tr>  
       <tr>  
              <td align="right">Email Address:</td>  
              <td><input type="text" name="supplierEmail" 
                <?php 
                  echo isset($sEmail) ?  'value="'.$sEmail.'"': '';
                ?> /></td>  
       </tr>  
       <tr>  
              <td align="right">Address:</td>  
              <td><input type="text" name="supplierAddress" 
                <?php 
                  echo isset($sAddress) ?  'value="'.$sAddress.'"': '';
                ?>/></td>  
       </tr>  
       
        <td> <a href="home.php"><input type="button" id="button2" value="Cancel" align="left"/></a>
        <td> <button id="button1" type="submit"><b>Add Supplier</b></button>            
        </td>  
        </tr>  
</table>   
    </form>  
</body> 
</html>