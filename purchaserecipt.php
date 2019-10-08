<!DOCTYPE html>

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

</script>
</script>
<body><center>

<?php


 

     require_once("connect.php");
     
    $invno = $_REQUEST["invoiceId"];


    $sql = "SELECT proddetails.pName,puritem.pInvQty,puritem.pItemRate
          FROM puritem
          INNER JOIN proddetails ON puritem.prodId = proddetails.prodId
          WHERE pInvNo = '".$invno."'";
    if(!$result = $conn->query($sql)){
      die('There was an error running the query [' . $conn->error . ']');
    }else{
      echo"<h1>Sale Invoice</h1>";
    }
?>
<?php
    if ($result->num_rows > 0) {
?>

<table>
    <table id="customer"><tr><th>Product Id</th><th>Quantity</th><th>MRP</th></tr>
      <?php 
        while($row = $result->fetch_assoc()){
       ?>
      <tr>
        <td><a><?php echo $row["pName"]; ?></a></td>
        <td><?php echo $row["pInvQty"]; ?></td>
        <td><?php echo $row["pItemRate"]; ?></td>
      </tr>
    <?php } ?>
</table>
<?php } ?>
</center>
</body>
</html>
