<?php
session_start();
$servername = "localhost";
$username ="student31";
$password = "bottle14";
$dbname = "student31";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(!isset($_SESSION["cart"]) || $_SESSION["cart"]==0)
{
	//echo "Hello World";
	$sql = "INSERT INTO cart (total, complete) VALUES (0.0, 0)";
	$_SESSION["cart"] = 1;
	if (mysqli_query($conn, $sql)) 
	{
    $_SESSION["$last_id"] = mysqli_insert_id($conn);
	
     echo "New record created successfully. Last inserted ID is: " . $_SESSION["$last_id"];
	} 
	else 
	{
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
	$itemID=$_POST["item_id"];
	$item_Price=$_POST["item_price"];
	$item_Name=$_POST["item_name"];
	$item_Quantity=$_POST["item_quantity"];
	$lineTotal=$item_Price * $item_Quantity;
	$ID=$_SESSION["$last_id"];

	$sql="INSERT INTO cartitems VALUES ($ID,$itemID,'$item_Name',$item_Price,$item_Quantity,$lineTotal)";


if (mysqli_query($conn, $sql))
{
	echo "New record created successfully.";
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
header('Location: viewCart.php');

?>