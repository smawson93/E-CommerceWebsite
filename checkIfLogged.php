<?php 

	if($_SESSION["logged"]==1)
	{
	header("Location: index.php");	
	}
	else
	{
		header("Location: loginPage.php");	
	}
?>