<?php
		session_start();
		$_SESSION["logged"]=2;
		header("Location: index.php");	
		
?>