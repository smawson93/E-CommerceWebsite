<?php
session_start();
$servername = "localhost";
$username = "student31";
$password = "bottle14";
$dbname = "student31";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// check connection

	if (!$conn) 
	{
		die ("Connection Failed!: " . mysqli_connect_error());
	}
?>

<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="style.css">
</head>

<Body>
<div id="wrapper">
<div id="content" >
<ul class="navbarlist">
<li><img src="images/navbarimage.png" alt="Paint Brush" height="50" width="70"></li>
<li><a href="index.php">Home</a></li>
<li><a href="Catalogue.php">Catalogue</a></li>


     <?php
	if($_SESSION["logged"]==1)
	{
		echo"<li><a href='News'>News</a></li>";
		echo"<li><a href='Account'>Account</a></li>";
		echo"<li style='float:right;' ><a href='logmeout.php'>Logout</a></li>";
		echo"<li style='float:right;' ><a>You are logged in</a></li>";
	}
	else if ($_SESSION["logged"]==2)
	{
		echo"<li><a href='News'>News</a></li>";
		echo"<li><a href='Account'>Account</a></li>";
		echo"<li><a href='adminPage.php'>Admin Page</a></li>";
		echo"<li style='float:right;' Class='active'><a href='logmeout.php'>Logout</a></li>";
		echo"<li style='float:right;' ><a>You are logged in</a></li>";
	}
	else
	{
		echo"<li style='float:right;' class='active'><a href='loginPage.php'>Login</a></li>";
		echo"<li style='float:right;' ><a>You are not logged in</a></li>";
	}
	?>

<li style="float:right;"><a href="viewCart.php"><img src="images/shoppingCart.png" alt="shopping cart" style="height:25px; width:25px;" title="Shopping Cart"></a></li> 	
</ul>
</div>

<?php	if ( isset($_GET['msg']) && $_GET['msg'] == 1 )
	{
		$message = "Details Invalid! Please try again";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	?>
	
<div id="content">
<h2>Customer Login</h2>
<form action="loginFunction.php" method="post">
<div id="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"required>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"required>
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div id="container" style="background-color:#f1f1f1; ">
    <button type="button" class="cancelbtn" onclick="window.location.href='index.php'">Cancel</button>
   <span class="singup"">New User? <a href="signUp.php">Sign Up Here</a></span>
	<span class="singup" style="float:right;">Admin <a href="adminLoginPage.php">Login Here</a></span>
  </div>
  
</form>
</h3>
</div>

</Body>
</html>