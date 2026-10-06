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

$sql = "SELECT * FROM items";
$result = mysqli_query($conn, $sql);
$products = array();

while($row = mysqli_fetch_array($result))
{
	$products[] = $row;
}
mysqli_close($conn);
?>

<html>

<script>
function searchFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("productTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<head>
<title>Catalogue</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
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
<h2> Catalogue </h2>
<input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Search for artists..">
<table id="productTable" border=1>
  <tr class="header">
    <th>Name</th>
    <th>Price</th>
	<th>Image</th>
  </tr>
<?php foreach($products as $product):?>
<tr>
<td>
    <?php echo $product["item_Name"];?>
    </td>
    <td>
    <?php echo $product["item_Price"];?>
    </td>   
    <td>
        <img src = "images/<?php echo $product["Image"];?>" width="50" height="50"/>
    </td>
	<td>
	<?php
			echo "<a HREF='viewDetails.php?ID=" . $product["itemID"] . "'>View Item</a>";
	?>
	</td>
	<td>
	<?php
	
		if ($_SESSION["logged"]==2  && $_SESSION["clearance"]==2)
		{
			echo "<a HREF='editDetails.php?ID=" . $product["itemID"] . "'>Edit Item</a>";
		}
	
	?>
	</td>
	
	<td>
	<?php
	
		if ($_SESSION["logged"]==2  && $_SESSION["clearance"]==2)
		{
			echo "<a HREF='deleteItem.php?ID=" . $product["itemID"] . "'>Delete Item</a>";
		}
	
	?>
	</td>
</tr>
<?php endforeach;?>
</table>
</div>
<div id="content">
<div id="container">
<?php
		
		if ($_SESSION["logged"]==2)
		{
			echo("<button onclick=\"location.href='addNewItem.php'\">Add New Item</button>");
			//echo "<a HREF='addNewItem.php>Add New Item</a>";
		}
	
	?>
	</div>
	</div>
</div>
</div>
</body>
</html>