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

  	$sql_u = "SELECT * FROM customer WHERE Username='$username'";
  	$res_u = mysqli_query($conn, $sql_u);

  	if (mysqli_num_rows($res_u) > 0) {
		header('Location: signUp.php?msg=1');
		mysqli_close($conn);
  	}	else{
           $sql = "INSERT INTO customer (Username, Password) 
      	    	  VALUES ('$username','$password')";

if (mysqli_query($conn, $sql))
{
	echo "New record created successfully.";
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
header('Location: loginPage.php');
  	}
  }
?>