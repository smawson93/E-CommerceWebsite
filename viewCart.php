<?php
session_start();
$ID = $_SESSION["$last_id"];
$servername = "localhost";
$username = "student31";
$password = "bottle14";
$dbname = "student31";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM cartitems WHERE ID = $ID";
$result = mysqli_query($conn,$sql);
$products = array();

while($row = mysqli_fetch_array($result))
{
	$products[] = $row;
}
mysqli_close($conn);

$orderTotal = 0;
?>
<html>
<head>
<title> Shopping Basket</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="wrapper">
<div id="content">
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
		echo"<li style='float:right;' ><a href='logmeout.php'>Logout</a></li>";
		echo"<li style='float:right;' ><a>You are logged in</a></li>";
	}
	else
	{
		echo"<li style='float:right;' ><a href='loginPage.php'>Login</a></li>";
		echo"<li style='float:right;' ><a>You are not logged in</a></li>";
	}
	?>

<li style="float:right;" class="active"><a href="viewCart.php"><img src="images/shoppingCart.png" alt="shopping cart" style="height:25px; width:25px;" title="Shopping Cart"></a></li> 	
</ul>
</div>

<div id="content">
<h2>Shopping Basket</h2>
<div id="container">
<table border=1>
<tr><th>Name</th><th>Price</th><th>Quantity</th><th>Line Total<tr>
<?php foreach($products as $product):?>
<tr>
	
	<td>
	<?php echo $product["item_Name"];?>	
     </td>
	 
    <td>
    <?php echo $product["item_Price"];?>
    </td>
	 
	 <td>
	 <?php echo $product["item_Quantity"];?> 
	 </td>
	 
	 <td>
	 <?php echo $product["lineTotal"];?>
	 <?php $orderTotal=$orderTotal + $product["lineTotal"];?>
	 </td>
	 
	 
	<td>
        <form method="post" action="remove_from_cart.php">
            <input type="hidden" name="item_id" value="<?php echo $product["itemId"];?>"/>
			
            <input type="submit" name = "submit" value = "Remove"/>
        </form>
    </td>
</tr>
<?php endforeach;?>
</table>
</div>
<div id="container">
<h2> Total Price: £ <?php echo $orderTotal;?></h2> 

<form method="post" action="cartCheckoutFunction.php">
		
		<input type="hidden" name="cart_ID" value="<?php echo $ID;?>"/>
		<input type="hidden" name="order_total" value="<?php echo $orderTotal;?>"/>
<?php 
	if($_SESSION["logged"]>=1)
		
	{		
			
			echo"<input type='submit' name = 'submit' value='checkout'/>";		
	}
	else
	{
			echo"<Button type=\"button\" onclick=\"window.location.href='loginPage.php'\">Please Login</button>";
			echo"<p style=\"text-align: center;\">Please Login to proceed through checkout</p>";
	}
?>
	</form>	
	
	<br><br>
	
	<form method="post" action="catalogue.php">
			<input type="submit" name = "submit" value="continue shopping"/>
		</form>
</div>
</div>
</body>
</html>	