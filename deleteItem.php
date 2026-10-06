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
	$sql = "DELETE FROM items where itemID = ' " . $_GET["ID"] . "'";
$result = mysqli_query($conn, $sql);
$products = array();

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: catalogue.php'); 
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>