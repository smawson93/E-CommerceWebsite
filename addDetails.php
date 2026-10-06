<?php
session_start();
$myusername = $_SESSION['logincustomerid'];
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

$sql = "SELECT * FROM customer where CustomerID = '$myusername'";
$result = mysqli_query($conn, $sql);
$users = array();

while($row = mysqli_fetch_array($result))
{
	$users[] = $row;
}
mysqli_close($conn);

?>

<html>
<head>
<title>Add Details Page</title>
<link rel="stylesheet" href="style.css">
</head>

<Body>
<div id="wrapper">
<div id="content">
<ul class="navbarlist">
<li><img src="images/navbarimage.png" alt="Paint Brush" style="height:50px; width:50px;"></li>
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
		echo"<li style='float:right;' ><a href='logmeout.php'>Logout</a></li>";
		echo"<li style='float:right;' ><a>You are logged in</a></li>";
	}
	else
	{
		echo"<li style='float:right;' ><a href='loginPage.php'>Login</a></li>";
		echo"<li style='float:right;' ><a>You are not logged in</a></li>";
	}
	?>

<li style="float:right;" class='active'><a href="viewCart.php"><img src="images/shoppingCart.png" alt="shopping cart" style="height:25px; width:25px;" title="Shopping Cart"></a></li> 	
</ul>
</div>

<div id="content">

<form action="addDetailsFunction.php" method="post">
<?php foreach($users as $user):?>
<div id="container">
	
	<label for="fname"><b>First Name</b></label>
    <input type="text"  value="<?php echo $user["FirstName"];?>" name="fname" required>
	
	<label for="lname"><b>Last Name</b></label>
    <input type="text" value="<?php echo $user["LastName"];?>" name="lname" required>
	
	<label for="email"><b>Email</b></label>
    <input type="text" value="<?php echo $user["Email"];?>" name="email" required>
	
	<label for="cnumber"><b>Number</b></label>
    <input type="text" value="<?php echo $user["Number"];?>" name="cnumber" required>
	
	<label for="address"><b>Address</b></label>
    <input type="text" value="<?php echo $user["Address"];?>" name="address" required>
	
	<label>
      <input type="checkbox" checked="checked" name="remember"> Remember Details
    </label>

    <button type="submit" name="checkout">checkout</button>
  </div>

  <div id="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" onclick="window.location.href='index.php'">Cancel</button>
  </div>
</div>
</form>
<?php endforeach;?>

</div>
</div>
</body>
</html>