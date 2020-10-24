<?php
	include "script/db.php";
	if(isset($_POST['btnSubmit']))
	{
		$name = strtoupper($_POST['type_name']);
		
		echo $query = "INSERT into type_mst(`TYPE_NAME`)VALUES('".$name."')";
		if(mysql_query($query))
		{
			header("location:insert_type.php?msg=Inserted");
		}
		else
		{
			header("location:insert_type.php?msg=Failed");
		}
	}
	elseif(isset($_POST['btnUpdate']))
	{
		$id = $_POST['txtid'];
		$name = $_POST['type_name'];
		
		echo $update = "UPDATE type_mst SET `TYPE_NAME` = '$name' WHERE TYPE_ID = '$id'";
		
		if(mysql_query($update))
		{
			header("location:insert_type.php?msg='Updated'");
		}
		else
		{
			header("location:insert_type.php?msg='Failed'");
		}
	}
	else
	{
		if(isset($_GET['delid']))
		{	
			$id = $_GET['delid'];
			$delete = "DELETE FROM type_mst WHERE TYPE_ID = '$id'";
			if(mysql_query($delete))
			{
				header("location:insert_type.php?msg=Deleted");
			}
			else
			{
				header("location:insert_type.php?msg=Failed");
			}	
		}
	}
?>