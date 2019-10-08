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
  <title>Customer Details</title>
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



  $cId = isset($_REQUEST['cId'])?$_REQUEST['cId']:0;
  if($cId > 0){
    $sql = "SELECT * FROM custdetails WHERE cId = ".$cId;
    if(!$result = $conn->query($sql)){
       die('There was an error running the query [' . $conn->error . ']');
    }else{
      
      $row = $result->fetch_assoc();
      $cName = $row['cName'];
      $cPhoNo = $row['cPhoNo'];
      $cEmail = $row['cEmail'];
      $cAddress = $row['cAddress'];
    }
  }
?>
<body>   
    <form id="form1" action="addcust.php" method="POST">  
    <div>                
    </div>   
    <h2 align="center">Add/Modify Customer Details</h2>  
    <input type="hidden" name="" value="<? echo $sId; ?>">
    <table id="table1"; cellspacing="5px" cellpadding="5%"; align="center" style="width:100%">  
       <tr>  
              <td  align="right" class="style1">Name:</td>
              <td class="style1"><input type="text" name="customername" 
                <?php 
                  echo isset($cName) ?  'value="'.$cName.'"': '';
                ?>
                /></td>  
       </tr>  
       <tr>  
              <td align="right">Phone No:</td> 
              <td class="style1"><input type="text" name="customerPhone" 
                <?php 
                  echo isset($cPhoNo) ?  'value="'.$cPhoNo.'"': '';
                ?>/></td>
       </tr>  
       <tr>  
              <td align="right">Email Address:</td>  
              <td><input type="text" name="customerEmail" 
                <?php 
                  echo isset($cEmail) ?  'value="'.$cEmail.'"': '';
                ?> /></td>  
       </tr>  
       <tr>  
              <td align="right">Address:</td>  
              <td><input type="text" name="customerAddress" 
                <?php 
                  echo isset($cAddress) ?  'value="'.$cAddress.'"': '';
                ?>/></td>  
       </tr>  
       
        <td> <a href="home.php"><input type="button" id="button2" value="Cancel" align="left"/></a>
        <td> <button id="button1" type="submit"><b>Add/Modify customer</b></button>            
        </td>  
        </tr>  
</table>   
    </form>  
</body> 
</html>