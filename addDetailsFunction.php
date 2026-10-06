<?php
session_start();
$myusername = $_SESSION['logincustomerid'];
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
	
	if(!empty($_POST["remember"])) {
		
	
	$firstname = $_POST["fname"];
	$lastname = $_POST["lname"];
	$email = $_POST["email"];
	$connumber = $_POST["cnumber"];
	$address = $_POST["address"];
		
		$sql = "UPDATE customer SET FirstName='$firstname', LastName='$lastname', Address='$address',
		Email='$email', Number='$connumber' WHERE CustomerID = '$myusername'";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: printInvoice.php'); 
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	}
?>