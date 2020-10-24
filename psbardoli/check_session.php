<?php
	include "script/db.php";
	session_start();
	if(!$_SESSION['psadmin'])
	{
		header("location:index.php");
	}
?>