<?php
$servername = "localhost";
$username = "student31";
$password = "bottle14";
$dbname = "student31";
  session_start();
  $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
  if($_SERVER["REQUEST_METHOD"] == "POST") {
     // username and password sent from form 
     
     $myusername = mysqli_real_escape_string($conn,$_POST['username']);
     $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
     
     $sql = "SELECT * FROM customer WHERE Username = '$myusername' and Password = '$mypassword'";
     $result = mysqli_query($conn,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $active = $row['active'];
     
     $count = mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
		if(!empty($_POST["remember"])) {
	setcookie ("username",$_POST["username"],time()+ 3600);
	setcookie ("password",$_POST["password"],time()+ 3600);
	echo "Cookies Set Successfuly";
	} else {
	setcookie("username","");
	setcookie("password","");
	echo "Cookies Not Set";
}
        //session_register("myusername");
		$_SESSION["customer"] = 0;
		$_SESSION['login_user'] = $myusername;
		$_SESSION['logincustomerid'] = $row['CustomerID'];
		
		
		
        
       header("location: logmein.php");
	  
}
    else {
        echo "Your Login Name or Password is invalid";
		header('location: loginPage.php?msg=1');
		mysqli_close($conn);
     }
  }
?>