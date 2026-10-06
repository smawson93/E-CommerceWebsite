<?php
session_start();
$id = $_POST["item_id"];
$servername = "localhost";
$username ="student31";
$password = "bottle14";
$dbname = "student31";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to update a record

	$item_Price=$_POST["item_price"];
	$item_Name=$_POST["item_name"];
	$item_Quantity=$_POST["item_quantity"];
	$item_Description=$_POST["item_description"];
	$sql = "Update items SET item_Name='$item_Name', item_Description='$item_Description',
	item_Quantity='$item_Quantity', item_Price='$item_Price' WHERE itemId = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: catalogue.php'); 
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>