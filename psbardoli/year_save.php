<?php
	include "script/db.php";
	include('script/function.php');
	if(isset($_POST['btnInsert']))
	{
		$year = $_POST['year'];
		
		echo $query = "INSERT INTO `year_mst`(`YEAR`)VALUES('".$year."')";
		
		if(mysql_query($query))
		{
			header("Location:year.php?msg=Inserted");
		}
		else
		{
			header("Location:year.php?msg=Failed");
		}
			
	}
	if(isset($_GET['del_id']))
	{
		$id = $_GET['del_id'];
		echo $query = "DELETE FROM year_mst WHERE YEAR_ID = '".$id."'";
		if(mysql_query($query))
		{
			header("Location:year.php?msg=Deleted");
		}
		else
		{
			header("Location:year.php?msg=Failed");
		}
	}
?>