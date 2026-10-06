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
<title>Index Page</title>
<link rel="stylesheet" href="style.css">
</head>

<Body>

<div id="wrapper">
<div id="content">
<ul class="navbarlist">
<li><img src="images/navbarimage.png" alt="Paint Brush" style="height:50px; width:50px;"></li>
<li class="active"><a href="index.php">Home</a></li>
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
		echo"<li style='float:right;' ><a href='logmeout.php'>Logout</a></li>";
		echo"<li style='float:right;' ><a>You are logged in</a></li>";
	}
	else
	{
		echo"<li style='float:right;' ><a href='loginPage.php'>Login</a></li>";
		echo"<li style='float:right;' ><a>You are not logged in</a></li>";
	}
	?>

<li style="float:right;"><a href="viewCart.php"><img src="images/shoppingCart.png" alt="shopping cart" style="height:25px; width:25px;" title="Shopping Cart"></a></li> 	
</ul>
</div>

<div id="content">

<div id="container" style="height: 250px;" >

<img src="images/indeximage1.jpg" alt="Index Image 1" style="height:200px; width:250px; "/>


<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ultrices mauris ipsum, nec malesuada tellus malesuada quis. Aenean auctor justo et placerat pretium. Aenean eget tempus neque, eu convallis mi. Curabitur fermentum leo vitae tortor rutrum finibus. Morbi diam quam, bibendum eget varius et, lobortis ut felis. In ex diam, pretium eu odio et, maximus pretium orci. In ac lacus nunc. Integer aliquet nulla quam, id egestas felis placerat in. Nam non bibendum ante. Morbi sit amet venenatis dolor. Ut consectetur nisi euismod, maximus tellus vel, egestas magna. </p>

</div>

</div>
<br>
<div id="content">

<div id="container" style="height: 250px;" >

<img src="images/indeximage2.jpg" alt="Index Image 1" style="height:200px; width:250px; "/>


<p>Phasellus dignissim maximus tellus, ac auctor augue porta eget. Etiam a convallis eros, id porttitor nunc. In hac habitasse platea dictumst. Nulla efficitur eu nisi sed hendrerit. Curabitur sit amet felis non erat accumsan eleifend. Fusce augue ligula, lacinia a erat sit amet, dapibus fringilla nisl. Sed sed lacinia enim. Praesent tempus consequat urna, nec aliquet mi porttitor nec. Etiam ac velit enim. In non urna mauris. Vivamus venenatis sapien eget massa ornare euismod. Donec vel efficitur felis. Mauris pretium lorem et metus mattis, at eleifend erat iaculis. Maecenas quis erat ac ex dapibus elementum non et lectus. Sed sollicitudin erat id est sodales consequat eget non odio. </p>
</div>

</div>

<br>
<div id="content">

<div id="container" style="height: 250px;" >

<img src="images/indeximage3.jpg" alt="Index Image 1" style="height:200px; width:250px; "/>


<p>Cras nec dignissim dui, ac mattis magna. Mauris eu pulvinar mi. Duis mi tortor, molestie vel est quis, rutrum ultricies libero. Sed gravida turpis quis vulputate pellentesque. Aenean eget ipsum auctor, rutrum arcu in, sollicitudin lectus. Curabitur eu ullamcorper erat, sed auctor metus. Mauris nec tellus vel nisl vulputate dapibus sit amet et sem. Mauris laoreet pretium dolor. Nam convallis sodales lectus, in lacinia enim fermentum sed. Suspendisse potenti. Praesent dictum urna eu convallis fringilla. Sed a venenatis mi. Nunc ac leo ac nunc sodales tincidunt. Duis sollicitudin, arcu sed dictum tristique, lacus leo tempor erat, quis vestibulum nisl metus at libero. Donec laoreet et lacus at commodo.  </p>

</div>

</div>

</div>
</Body>
</html>