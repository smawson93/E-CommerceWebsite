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
	$ID = $_GET["item_ID"];
	$sql = "SELECT * FROM items where itemID = $ID";
$result = mysqli_query($conn, $sql);
$products = array();

while($row = mysqli_fetch_array($result))
{
	$products[] = $row;
}
mysqli_close($conn);
header('Location: viewDetails.php');
?>