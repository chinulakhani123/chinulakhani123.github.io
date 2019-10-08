<!DOCTYPE html>
<?php 
  
  include("navbar.php");
?>
<html>
<style type="text/css">
  #inventory {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#inventory td, #inventory th {
  border: 1px solid #ddd;
  padding: 8px;
}

#inventory tr:nth-child(even){background-color: #f2f2f2;}

#inventory tr:hover {background-color: #ddd;}

#inventory th {
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

  
       $sql = "SELECT inventory.qty,inventory.mrp,proddetails.pName
          FROM inventory
          INNER JOIN proddetails ON inventory.prodID = proddetails.prodId ";

  if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
  }else{
    echo"<h1>INVENTORY</h1>";
  }

  if ($result->num_rows > 0) {
    // output data of each row

  echo "<table id='inventory'><tr><th>Name</th><br><th>Quantity</th><th>MRP</th></tr>";
    while($row = $result->fetch_assoc()) {
    echo"<tr><td>".$row["pName"]. "</td><td>".$row["qty"]."</td><td>".$row["mrp"]."</td></tr>";
    }
    echo"</table>";
} else {
    echo "0 results";
}
$conn->close();

?>
</center>
</body>
</html>
<!DOCTYPE html>
<html>
