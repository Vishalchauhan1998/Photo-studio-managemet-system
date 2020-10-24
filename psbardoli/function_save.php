<?php
	include "script/db.php";
	if(isset($_POST['btnSubmit']))
	{
		$name = strtoupper($_POST['f_name']);
		
		echo $query = "INSERT into function_details(`FUNCTION_NAME`)VALUES('".$name."')";
		if(mysql_query($query))
		{
			header("location:insert_function.php?msg=Inserted");
		}
		else
		{
			header("location:insert_function.php?msg=Failed");
		}
	}
	elseif(isset($_POST['btnUpdate']))
	{
		$id = $_POST['txtid'];
		$name = $_POST['f_name'];
		
		echo $update = "UPDATE function_details SET `FUNCTION_NAME` = '$name' WHERE FUNCTION_ID = '$id'";
		
		if(mysql_query($update))
		{
			header("location:insert_function.php?msg='Updated'");
		}
		else
		{
			header("location:insert_function.php?msg='Failed'");
		}
	}
	else
	{
		if(isset($_GET['delid']))
		{	
			$id = $_GET['delid'];
			$delete = "DELETE FROM function_details WHERE FUNCTION_ID = '$id'";
			if(mysql_query($delete))
			{
				header("location:insert_function.php?msg=Deleted");
			}
			else
			{
				header("location:insert_function.php?msg=Failed");
			}	
		}
	}

?>