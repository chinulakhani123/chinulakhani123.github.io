<!DOCTYPE html>

<?php

  include 'navbar.php';
?>

<html>
<style type="text/css">
  #product {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#product td, #product th {
  border: 1px solid #ddd;
  padding: 8px;
}

#product tr:nth-child(even){background-color: #f2f2f2;}

#product tr:hover {background-color: #ddd;}

#product th {
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

      if(isset($_REQUEST['deletepId']) && $_REQUEST['deletepId'] > 0){
        $sql = "DELETE FROM proddetails WHERE prodId = ".$_REQUEST['deletepId'];
        if(!$result = $conn->query($sql)){
           die('There was an error running the query [' . $conn->error . ']');
        }else{
          header('Location:displayprod.php');
        }      
      }

      $sql = "SELECT * FROM proddetails ORDER BY prodId";
      if(!$result = $conn->query($sql)){
        die('There was an error running the query [' . $conn->error . ']');
      }else{
        echo"<h1>Product Details</h1>";
      }
?>
<?php
    if ($result->num_rows > 0) {
?>
<table>
    <table id="product"><tr><th>Id</th><br><th>Name</th><th>minQty</th><th>maxQty</th><th>Modify</th><th>Delete</th></tr>
      <?php 
        while($row = $result->fetch_assoc()){
       ?>
      <tr>
        <td><?php echo $row["prodId"]; ?></td>
        <td><?php echo $row["pName"]; ?></td>
        <td><?php echo $row["minQty"]; ?></td>
        <td><?php echo $row["maxQty"]; ?></td>
        <td><a href="productdetails.php?pId=<?php echo $row["prodId"]; ?>" id="modify"><button>Modify</button></a></td>
        <td><a href="?deletepId=<?php echo $row["prodId"]; ?>" id="delete"><button>Delete</button></a></td>
      </tr>
    <?php } ?>
</table>
<?php } ?>
</center>
</body>
</html>