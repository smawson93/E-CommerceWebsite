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
if (isset($_POST['register'])) {
  	$username = $_POST["uname"];
  	$password = $_POST["psw1"];
	$firstname = $_POST["fname"];
	$lastname = $_POST["lname"];
	$email = $_POST["email"];
	$connumber = $_POST["cnumber"];
	$clearance = $_POST["clear"];

  	$sql_u = "SELECT * FROM administrator WHERE username='$username'";
  	$res_u = mysqli_query($conn, $sql_u);

  	if (mysqli_num_rows($res_u) > 0) {
		header('Location: signUp.php?msg=1');
		mysqli_close($conn);
  	}	else{
           $sql = "INSERT INTO administrator (username, password, firstName, lastName, email, number, clearance) 
      	    	  VALUES ('$username','$password', '$firstname', '$lastname', '$email', '$connumber', '$clearance')";

if (mysqli_query($conn, $sql))
{
	echo "New record created successfully.";
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
header('Location: index.php');
  	}
  }
?>