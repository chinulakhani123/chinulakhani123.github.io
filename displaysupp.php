<!DOCTYPE html>

<?php

  include 'navbar.php';
?>

<html>
<style type="text/css">
  #suppliers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#suppliers td, #suppliers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#suppliers tr:nth-child(even){background-color: #f2f2f2;}

#suppliers tr:hover {background-color: #ddd;}

#suppliers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

<body><center>

<?php

    session_start();
    require_once("connect.php");

      if(isset($_REQUEST['deletesId']) && $_REQUEST['deletesId'] > 0){
        $sql = "DELETE FROM suppdetails WHERE sId = ".$_REQUEST['deletesId'];
        if(!$result = $conn->query($sql)){
           die('There was an error running the query [' . $conn->error . ']');
        }else{
          header('Location:displaysupp.php');
        }      
      }

      $sql = "SELECT * FROM suppdetails ORDER BY sName";
      if(!$result = $conn->query($sql)){
        die('There was an error running the query [' . $conn->error . ']');
      }else{
        echo"<h1>Supplier Details</h1>";
      }
?>
<?php
    if ($result->num_rows > 0) {
?>
<table>
    <table id="suppliers"><tr><th>Name</th><br><th>Phone</th><th>Email</th><th>Address</th><th>Modify</th><th>Delete</th></tr>
      <?php 
        while($row = $result->fetch_assoc()){
       ?>
      <tr>
        <td><?php echo $row["sName"]; ?></td>
        <td><?php echo $row["sPhoNum"]; ?></td>
        <td><?php echo $row["sEmail"]; ?></td>
        <td><?php echo $row["sAddress"]; ?></td>
        <td><a href="supplierdetails.php?sId=<?php echo $row["sId"]; ?>" id="modify"><button>Modify</button></a></td>
        <td><a href="?deletesId=<?php echo $row["sId"]; ?>" id="delete"><button>Delete</button></a></td>
      </tr>
    <?php } ?>
</table>
<?php } ?>
</center>
</body>
</html>
