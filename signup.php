
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="all.css">
</head> 
<style type="text/css">
		#button1 {
  background-color:#4CAF50 ;
  padding: 14px 16px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 70%;
  float: center;
  display: inline-block;
}
</style>

<h1 align="center">Sign Up</h1>
<body>
<form action="signuppage.php" method="POST">
<center>
  <div  class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Email:abc@xyz.com" name="username" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <button id="button1" type="submit"><b>Sign Up</b></button>
  </div>
</center>
</form>
</body>
</html>