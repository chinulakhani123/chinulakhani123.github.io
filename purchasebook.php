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

a {
  color: blue;
}
</style>



<body><center>

<?php

    require_once("connect.php");
  

    $sql = "SELECT purchaseinvoice.pInvNo,purchaseinvoice.pInvDate,purchaseinvoice.pInvAmt,suppdetails.sName
          FROM purchaseinvoice
          INNER JOIN suppdetails ON purchaseinvoice.sID = suppdetails.sID";


    if(!$result = $conn->query($sql)){
      die('There was an error running the query [' . $conn->error . ']');
    }else{
      echo"<h1>Sale Book</h1>";
    }
?>
<?php
    if ($result->num_rows > 0) {
?>

<table id="customer"><tr><th>Invoice No.</th><br><th>Name</th><th>Date</th><th>Total Amount</th></tr>

      <?php 

        while($row = $result->fetch_assoc()){
       ?>
       <script type="text/javascript">
         $val = "<?php echo $row["sInvNo"] ?>";
       </script>
      <tr>
        <td><a href="purchaserecipt.php?invoiceId=<?php echo $row["pInvNo"]; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=300,left=500,width=400,height=400'); return false;"><?php echo $row["pInvNo"];?></a></td>
        <td><?php echo $row["sName"]; ?></td>
        <td><?php echo $row["pInvDate"]; ?></td>
        <td><?php echo $row["pInvAmt"]; ?></td>
      </tr>


    <?php } ?>

</table>

<?php } ?>



</center>
</body>
</html>
