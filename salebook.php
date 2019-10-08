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
  

    $sql = "SELECT saleinv.sInvNo,saleinv.sInvDate,saleinv.sInvAmount,custdetails.cName
          FROM saleinv
          INNER JOIN custdetails ON saleinv.cID = custdetails.cID";


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
        <td><a href="salerecipt.php?invoiceId=<?php echo $row["sInvNo"]; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=300,left=500,width=400,height=400'); return false;"><?php echo $row["sInvNo"];?></a></td>
        <td><?php echo $row["cName"]; ?></td>
        <td><?php echo $row["sInvDate"]; ?></td>
        <td><?php echo $row["sInvAmount"]; ?></td>
      </tr>


    <?php } ?>

</table>

<?php } ?>



</center>
</body>
</html>
