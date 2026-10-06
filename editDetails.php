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
	$sql = "SELECT * FROM items where itemID = ' " . $_GET["ID"] . "'";
$result = mysqli_query($conn, $sql);
$products = array();

while($row = mysqli_fetch_array($result))
{
	$products[] = $row;
}
mysqli_close($conn);
?>

<html>
<head>
<title>Product Details</title>
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
<form method="post" action="updateItem.php">
<?php foreach($products as $product):?>
		<div id="container" class="productImage" style="float: left;">
        <img src = "images/<?php echo $product["Image"];?>" width="500" height="500"/>
		</div>
		
		<div id="container"  style="float: right;">
		<label for=<label for="item_name"><b>Item Name</b></label>
		<input type="text" value="<?php echo $product["item_Name"];?>" name="item_name" required>
		</div>
		
		<div id="container"  style="float: right;">
		<label for=<label for="item_description"><b>Item Description</b></label>
		<input type="text" value="<?php echo $product["item_Description"];?>" name="item_description" required>
		</div>
	
		<div id="container"  style="float: right;">
		<label for=<label for="item_price"><b>Item Price (£)</b></label>
		<input type="text" value="<?php echo $product["item_Price"];?>" name="item_price">
		</div>
		
		<div id="container"  style="float: right;">
		<label for=<label for="item_quantity"><b>Item Quantity</b></label>
		<input type="text" value="<?php echo $product["item_Quantity"];?>" name="item_quantity">
		</div>
		
		<div id="container" class="addProductCart" style="float: right;">
            <input type="hidden" name="item_id" value="<?php echo $product["itemID"];?>"/>
            <button type="submit">Update</button>
        </form>

		
		</div>

<?php endforeach;?>
</div>
</div>
</Body>
</html>