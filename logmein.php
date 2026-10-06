<?php
		session_start();
		$_SESSION["logged"]=1;
		header("Location: index.php");
?>