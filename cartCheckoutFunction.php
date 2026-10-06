<?php
session_start();
$ID = $_POST["cart_ID"];
$servername = "localhost";
$username ="student31";
$password = "bottle14";
$dbname = "student31";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	
  	$ordertotal = $_POST["order_total"];
  	$sql = "UPDATE cart SET total=$ordertotal WHERE cartID = $ID";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: addDetails.php'); 
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>