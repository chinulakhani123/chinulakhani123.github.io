<!DOCTYPE html>

<?php

  include 'navbar.php';
?>

<html>
<style type="text/css">
  #customer {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customer td, #customer th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customer tr:nth-child(even){background-color: #f2f2f2;}

#customer tr:hover {background-color: #ddd;}

#customer th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

<body><center>

<?php


  require_once("connect.php");

  

      if(isset($_REQUEST['deletecId']) && $_REQUEST['deletecId'] > 0){
        $sql = "DELETE FROM custdetails WHERE cId = ".$_REQUEST['deletecId'];
        if(!$result = $conn->query($sql)){
           die('There was an error running the query [' . $conn->error . ']');
        }else{
          header('Location:displaycust.php');
        }      
      }

  

    $sql = "SELECT * FROM custdetails ORDER BY cName";
    if(!$result = $conn->query($sql)){
      die('There was an error running the query [' . $conn->error . ']');
    }else{
      echo"<h1>Customer Details</h1>";
    }
?>
<?php
    if ($result->num_rows > 0) {
?>
<table>
    <table id="customer"><tr><th>Name</th><br><th>Phone</th><th>Email</th><th>Address</th><th>Modify</th><th>Delete</th></tr>
      <?php 
        while($row = $result->fetch_assoc()){
       ?>
      <tr>
        <td><?php echo $row["cName"]; ?></td>
        <td><?php echo $row["cPhoNo"]; ?></td>
        <td><?php echo $row["cEmail"]; ?></td>
        <td><?php echo $row["cAddress"]; ?></td>
        <td><a href="customerdetails.php?cId=<?php echo $row["cId"]; ?>" id="modify"><button>Modify</button></a></td>
        <td><a href="?deletecId=<?php echo $row["cId"]; ?>" id="delete"><button>Delete</button></a></td>
      </tr>
    <?php } ?>
</table>
<?php } ?>
</center>
</body>
</html>
