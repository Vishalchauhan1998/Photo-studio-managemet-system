<?php
	include "script/db.php";
	if(isset($_POST['btnSubmit']))
	{
		$type = $_POST['type'];
		$subtype = $_POST['subtype'];
		
		echo $query = "INSERT into subtype_mst(`SUBTYPE_NAME`,`TYPE_ID`)VALUES('".$subtype."','".$type."')";
		
		if(mysql_query($query))
		{
			header("location:insert_sub_type.php?msg=Inserted");
		}
		else
		{
			header("location:insert_sub_type.php?msg=Failed");
		}
	}
	elseif(isset($_POST['btnUpdate']))
	{
		$id = $_POST['txtid'];
		$name = $_POST['subtype_name'];
		
		echo $update = "UPDATE type_mst SET `SUBTYPE_NAME = '$name' WHERE SUBTYPE_ID = '$id'";
		
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
			$delete = "DELETE FROM subtype_mst WHERE SUBTYPE_ID = '$id'";
			if(mysql_query($delete))
			{
				header("location:insert_sub_type.php?msg=Deleted");
			}
			else
			{
				header("location:insert_sub_type.php?msg=Failed");
			}	
		}
	}

?>