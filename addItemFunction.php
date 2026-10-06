<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
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


// Check if image file is a actual image or fake image
if(isset($_POST['add'])) {

	$itemprice=$_POST["item_price"];
	$itemname=$_POST["item_name"];
	$imageName=$_POST["image_name"];
	$itemquantity=$_POST["item_quantity"];
	$itemdescription=$_POST["item_description"];
	$sql = "INSERT INTO `student31`.`items` (`itemID`, `item_Name`, `item_Description`, `Image`, `item_Price`, `item_Quantity`)
	VALUES (NULL,'$itemname', '$itemdescription','$imageName', '$itemprice', '$itemquantity')"; 
	
	if (mysqli_query($conn, $sql))
	{
	echo "New record created successfully";
	} 
	else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

mysqli_close($conn);
header('Location: submitImage.php');

}
?>