
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

<h1 align="center">BILLING SYSTEM</h1>
<body>
<form action="loginpage.php" method="POST">
<center>
  <div  class="container">
    <h1>Login Here</h1>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Email:abc@xyz.com" name="username" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <button id="button1" type="submit"><b>Login</b></button>
    <br>
    <a href="signup.php" style="color: blue;">New User?Register Here!!</a>
    <br>
    <a href="forgotpass.php" style="color: blue;">Forgot password?</a>
  </div>
</center>
</form>
</body>
</html>