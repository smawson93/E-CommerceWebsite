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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
</head>
<body>

<script type="text/javascript">
function printDiv(invoice) {
     var printContents = document.getElementById(invoice).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>
		
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
<div id="invoice">

        <table border=1>
            <colgroup>
                <col width="20%">
                <col width="20%">
                <col width="20%">
				
            </colgroup>
            <thead>         
                <tr class='warning'>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Line Total</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product):?>
<tr>
	
	<td>
	<?php echo $product["item_Name"];?>	
     </td>
	 
	 <td>
	 <?php echo $product["item_Quantity"];?> 
	 </td>
	 
	 <td>
	 <?php echo $product["lineTotal"];?>
	 <?php $orderTotal=$orderTotal + $product["lineTotal"];?>
	 </td>
	
</tr>
<?php endforeach;?>
            </tbody>
        </table> 	
		
		<h2> Total Price: £ <?php echo $orderTotal;?></h2> 
		
				

    </div>
	
			<button onclick="printDiv('invoice')">Print</button>
			<button type="button" class="cancelbtn" onclick="window.location.href='closeCart.php'">Return</button>

</div>
</body>
</html>