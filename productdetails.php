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



  $pId = isset($_REQUEST['pId'])?$_REQUEST['pId']:0;
  if($pId > 0){
    $sql = "SELECT * FROM proddetails WHERE prodId = ".$pId;
    if(!$result = $conn->query($sql)){
       die('There was an error running the query [' . $conn->error . ']');
    }else{
      
      $row = $result->fetch_assoc();
      $pName = $row['pName'];
      $minQty = $row['minQty'];
      $maxQty = $row['maxQty'];
      // $sAddress = $row['sAddress'];
    }
  }
?>
<body>   
    <form id="form1" action="addprod.php" method="POST">  
    <div>                
    </div>   
    <h2 align="center">Add/Modify Product Details</h2>  
    <input type="hidden" name="" value="<? echo $pId; ?>">
    <table id="table1"; cellspacing="5px" cellpadding="5%"; align="center" style="width:100%">  
       <tr>  
              <td  align="right" class="style1">Name:</td>
              <td class="style1"><input type="text" name="pName" 
                <?php 
                  echo isset($pName) ?  'value="'.$pName.'"': '';
                ?>
                /></td>  
       </tr>  
       <tr>  
              <td align="right">Minimum Quantity:</td> 
              <td class="style1"><input type="text" name="minQty" 
                <?php 
                  echo isset($minQty) ?  'value="'.$minQty.'"': '';
                ?>/></td>
       </tr>  
       <tr>  
              <td align="right">Maximum Quantity:</td>  
              <td><input type="text" name="maxQty" 
                <?php 
                  echo isset($maxQty) ?  'value="'.$maxQty.'"': '';
                ?> /></td>  
       </tr>  
       
       
        <td> <a href="home.php"><input type="button" id="button2" value="Cancel" align="left"/></a>
        <td> <button id="button1" type="submit"><b>Add/Modify Supplier</b></button>            
        </td>  
        </tr>  
</table>   
    </form>  
</body> 
</html>