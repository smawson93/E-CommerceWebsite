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
		echo"<li><a href='Admin'>Admin Page</a></li>";
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
<?php foreach($products as $product):?>
		<div id="container" class="productImage" style="float: left;">
        <img src = "images/<?php echo $product["Image"];?>" width="500" height="500"/>
		</div>
		
		<div id="container" class="productName"  style="float: left;">
		<h3><?php echo $product["item_Name"];?></h3>
		</div>
		
		<div id="container" class="productDescription" style="float: right;">
		<h3><?php echo $product["item_Description"];?></h3>
		</div>
	
		<div id="container" class="productPrice"  style="float: right;">
		<h3>£ <?php echo $product["item_Price"];?></h3>
		</div>
		
		<div id="container" class="addProductCart" style="float: right;">
		
		<form method="post" action="addToCart.php">
            <input type="hidden" name="item_id" value="<?php echo $product["itemID"];?>"/>
			<input type="hidden" name="item_price" value="<?php echo $product["item_Price"];?>"/>
			<input type="hidden" name="item_name" value="<?php echo $product["item_Name"];?>"/>
			<input type="text" name="item_quantity" value="1"/>
            <input type="submit" name = "submit" value = "Buy"/>
        </form>
		
		</div>

<?php endforeach;?>
</div>
</div>
</Body>
</html>