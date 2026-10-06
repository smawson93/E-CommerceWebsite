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

?>

<html>
<head>
<title>Admin Page</title>
<link rel="stylesheet" href="style.css">
</head>

<Body>
<div id="wrapper">
<div id="content">
<ul class="navbarlist">
<li><img src="images/navbarimage.png" alt="Paint Brush" style="height:50px; width:50px;"></li>
<li><a href="index.php">Home</a></li>
<li><a href="Catalogue.php">Catalogue</a></li>

     <?php
	if($_SESSION["logged"]==1)
	{
		echo"<li><a href='News'>News</a></li>";
		echo"<li><a href='Account'>Account</a></li>";
		echo"<li style='float:right;' ><a href='logmeout.php'>Logout</a></li>";
		echo"<li style='float:right;' ><a>You are logged in</a></li>";
	}
	else if ($_SESSION["logged"]==2)
	{
		echo"<li><a href='News'>News</a></li>";
		echo"<li><a href='Account'>Account</a></li>";
		echo"<li><a href='adminPage.php'>Admin Page</a></li>";
		echo"<li style='float:right;' Class='active'><a href='logmeout.php'>Logout</a></li>";
		echo"<li style='float:right;' ><a>You are logged in</a></li>";
	}
	else
	{
		echo"<li style='float:right;' class='active'><a href='loginPage.php'>Login</a></li>";
		echo"<li style='float:right;' ><a>You are not logged in</a></li>";
	}
	?>

<li style="float:right;"><a href="viewCart.php"><img src="images/shoppingCart.png" alt="shopping cart" style="height:25px; width:25px;" title="Shopping Cart"></a></li> 	
</ul>
</div>

<div id="content">

<script type="text/javascript">

  function checkForm(form){
  
    if(form.uname.value == "") {
      alert("Error: Username cannot be blank!");
      form.uname.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.uname.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.uname.focus();
      return false;
    }

    if(form.psw1.value != "" && form.psw1.value == form.psw2.value) {
      if(form.psw1.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.psw1.focus();
        return false;
      }
      if(form.psw1.value == form.uname.value) {
        alert("Error: Password must be different from Username!");
        form.psw1.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.psw1.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.psw1.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.psw1.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.psw1.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.psw1.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.psw1.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.psw1.focus();
      return false;
    }

    alert("You entered a valid password: " + form.psw1.value);
    return true;
  }

</script>

<form action="addAdminFunction.php" method="post" onsubmit="return checkForm(this);">

<div id="container" >
<div>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Add Username" name="uname" required>
	<br>
	<?php	if ( isset($_GET['msg']) && $_GET['msg'] == 1 )
	{
		$message = "Username already taken!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	//{	
     // treat the succes case ex:
     //echo "Username already taken";
	 //}
	 ?>
	 
</div>
    <label for="psw1"><b>Password</b></label>
    <input type="password" placeholder="Add Password" name="psw1" required>
	
	<label for="psw2"><b>Confirm Password</b></label>
    <input type="password" placeholder="Add Password" name="psw2" required>
	
	<label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Add First Name" name="fname" required>
	
	<label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Add Last Name" name="lname" required>
	
	<label for="email"><b>Email</b></label>
    <input type="text" placeholder="Add Email" name="email" required>
	
	<label for="cnumber"><b>Number</b></label>
    <input type="text" placeholder="Add Contact Number" name="cnumber" required>
	
	<label for="clear"><b>Clearance</b></label>
    <input type="text" placeholder="Add Clearance Level" name="clear" required>

    <button type="submit" name="register">Sign Up</button>
  </div>

  <div id="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" onclick="window.location.href='index.php'">Cancel</button>
  </div>
  
</form>
</h3>
</div>
</div>
</body>
</html>