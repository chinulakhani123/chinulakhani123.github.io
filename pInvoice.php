<?php
  require_once('connect.php');

  if(isset($_POST['action']) && $_POST['action'] == 'getSupplierByName'){
    $result = mysqli_query($conn,"SELECT sId,sPhoNum,sName FROM suppdetails WHERE sName = '".$_POST['sname']."'") or die( mysqli_error($conn));
    $data = $result->fetch_assoc() ;
    echo json_encode($data);
    exit;
  }


  include('navbar.php');

  $d = date("d/m/Y");
  $result = mysqli_query($conn,"SELECT prodId,pName FROM proddetails ORDER BY pName") or die( mysqli_error($conn));
  $result1 = mysqli_query($conn,"SELECT sPhoNum,sName FROM suppdetails ORDER BY sName") or die( mysqli_error($conn));
 ?>

<!DOCTYPE html>
  <html>

      <head>  
           <title>Purchase Invoice</title>  
           
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>
      <style type="text/css">
        <style type="text/css">
  #dynamic_field {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#dynamic_field td, #dynamic_field th {
  border: 1px solid #ddd;
  padding: 8px;
}

#dynamic_field tr:nth-child(even){background-color: #f2f2f2;}

#dynamic_field tr:hover {background-color: #ddd;}

#dynamic_field th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
      </style>  
      <body>  

                <div class="form-group">  
                     <form name="submit" id="submit" action="addPinvoice.php" method="POST"> 
                        <div class="container">  
                <br />  
                <br />  
                <h2 align="center">Purchase Invoice</h2>
                <div class="form-group">
                     
                    <label>Name</label>
                    <input type="text" id="sname_input" name="sname" placeholder="Supplier Name" class="form-control name_list" list="sname" />
                    <datalist id="sname">
                      <option id="0" value="Select">
                        <?php 
                          if ($result1->num_rows > 0) {
                            while($row1 = $result1->fetch_assoc()) {
                              echo "<option value='".$row1['sName']."'>".$row1['sName']."</option>";
                            }
                          }
                        ?>
                      </option>
                    </datalist>

                    <label>Contact</label>
                    <input type="text" name="sphone" id="sphone"  placeholder="Mobile No." readonly/>
                    <label>Supplier Id</label>
                    <input type="text" name="sid" id="sid" placeholder="Supplier Id" readonly/>
                    <label>Date</label>
                    <input type="text" name="date" placeholder="Date" value="<?php echo $d ?>" class="form-control" />
                  
                </div>
                <br> 
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                <tbody>
                                    <tr>  
                                         <td><input type="text" name="pname[]" placeholder="Product Name" class="form-control name_list" list="item" /></td>
                                              <datalist id="item">
                                                <option id="0" value="Select">
                                                  <?php 
                                                      if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                                          echo "<option value='".$row['prodId']."'>".$row['pName']."</option>";
                                                        }
                                                      }
                                                   ?>
                                                </option>
                                              </datalist>  
                                         <td><input type="number" name="rate[]" placeholder="Rate" class="form-control price_calc name_list" id="PRICE"  /></td>  
                                         <td><input type="number" name="qty[]" placeholder="Qty"  class="form-control price_calc name_list" id="QTY"  /></td>
                                         <td><input type="number" name="mrp[]" placeholder="MRP" class="form-control price_calc name_list" id="MRP"  /></td>  
                                         <td><input type="text" name="total[]" placeholder="Total" class="form-control name_list" id="TOTAL" /></td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success" accesskey="+">Add More</button></td>
                                    </tr>                                    
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Grand Total</td>
                                    <td><input type="text" name="grandtotal" placeholder="Grand Total" class="form-control name_list" id="grandtotal" value="0" readonly /></td>
                                  </tr>
                                </tfoot>
                               </table>  
                               <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                          </div>  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="pname[]" placeholder="Product Name" class="form-control name_list" list="item" /></td><td><input type="number" name="rate[]" placeholder="Rate" class="form-control price_calc name_list" id="PRICE" /></td><td><input type="number" name="qty[]" placeholder="Qty"  class="form-control price_calc name_list" id="QTY"  /></td><td><input type="number" name="mrp[]" placeholder="MRP" class="form-control price_calc name_list" id="MRP"  /></td><td><input type="text" name="total[]" placeholder="Total" class="form-control name_list" id="TOTAL" /></td> <td><button type="button" accesskey="-" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });

      $(document).on('keyup', '.price_calc', function(){  
        var row = $(this).closest('tr');
        var price = Number(row.find("#PRICE").val());
        var qty = Number(row.find("#QTY").val());
        var total = qty * price;
        row.find("#TOTAL").val(total);
        //Find all totals and add then
        var gtotals = $("input[name^='total']");
        var gTotal = 0;
        for (var i = 0; i < gtotals.length; i++) {
          gTotal += Number($(gtotals[i]).val());
        }
        $("#grandtotal").val(gTotal);
      });

      $('#sname_input').on('input',function(){
        var val = $(this).val();
        $.ajax({
          url: "pInvoice.php", 
          type: "POST",
          data : { action: 'getSupplierByName', sname : val },
          success: function(result){
            var res = JSON.parse(result);
            $('#sphone').val(res.sPhoNum);
            $('#sid').val(res.sId);
          }
        });
      });

      
 });

 </script>
 