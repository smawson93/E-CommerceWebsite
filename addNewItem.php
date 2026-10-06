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
<title>Add New Product</title>
<link rel="stylesheet" href="style.css">
</head>

<Body>

<div id="wrapper">
<div id="content">

<ul class="navbarlist">
<li><img src="images/navbarimage.png" alt="Paint Brush" style="height:50px; width:50px;"></li>
<li><a href="index.php">Home</a></li>
<li class="active"><a href="Catalogue.php">Catalogue</a></li>



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

<li style="float:right;"><a href="viewCart.php"><img src="images/shoppingCart.png" alt="shopping cart" style="height:25px; width:25px;" title="Shopping Cart"></a></li> 	
</ul>
</div>

<div id="content">
<form method="post" action="addItemFunction.php" enctype="multipart/form-data">

		<div id="container">
		
		<label for=<label for="image_name"><b>Image Name</b></label>
		<input type="text" placeholder="Enter name of the file with extension e.g .jpg" name="image_name" >
		
		
		<label for=<label for="image"><b>Image</b></label>
		<input type="file" name="fileToUpload" id="fileToUpload">
		
		<br><br>
		<label for=<label for="item_name"><b>Item Name</b></label>
		<input type="text" placeholder="Enter Name of Item" name="item_name" >
		
		
		<label for=<label for="item_description"><b>Item Description</b></label>
		<input type="text" placeholder="Enter Description of Item" name="item_description" >
		
	
		<label for=<label for="item_price"><b>Item Price (£)</b></label>
		<input type="text"  placeholder="Enter Price of Item" name="item_price">
		
		
		<label for=<label for="item_quantity"><b>Item Quantity</b></label>
		<input type="text" placeholder="Enter Quantity of Item" name="item_quantity">
		</div>
		
		<div id="container" >  
            <button type="submit" name="add">Submit</button>
		</div>	
        </form>
</div>
</div>
</Body>
</html>