<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>

<div class="navbar">
  <a href="home.php" accesskey="h" >Home</a>
  
  <div class="dropdown">
    <button class="dropbtn">Product
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="productdetails.php">Add New Product</a>
      <a href="displayprod.php">Product Details</a>
      <a href="inventory.php">Inventory</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Customer
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="customerdetails.php">Add customer</a>
      <a href="displaycust.php">Customer Details</a>
    </div>
  </div>
  <div class="dropdown">
   <button class="dropbtn">Supplier
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="supplierdetails.php">Add Supplier</a>
      <a href="displaysupp.php">Supplier Details</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Sales
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="sInvoice.php">New Sale Invoice</a>
      <a href="salebook.php">Sale Book</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Purchase
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="pInvoice.php">New Purchase Invoice</a>
      <a href="purchasebook.php">Purchase Book</a>
    </div>
  </div>
  
  <a href="logout.php" style="float: right; width: 10%;">Logout</a>

</div>

</body>
</html>