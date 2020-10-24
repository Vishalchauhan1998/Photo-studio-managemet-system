<?php
	include "script/db.php";
	include('script/function.php');
	if(isset($_POST['btnInsert']))
	{
		$albumdate = $_POST['album_date'];
		$albumname = $_POST['album_name'];
		$year = $_POST['year_id'];
		$flag = 0;
		
		echo $query = "INSERT INTO `album_mst`(`ALBUM_ID`, `ALBUM_DATE`, `ALBUM_NAME`, `YEAR`, `FLAG`)VALUES(NULL,'".$albumdate."','".$albumname."','".$year."','".$flag."')";
		
		if(mysql_query($query))
		{
			header("Location:album.php?msg=Inserted");
		}
		else
		{
			header("Location:album.php?msg=Failed");
		}
		
	}
	elseif(isset($_POST['btnUpdate']))
	{
		$albumdate = $_POST['album_date'];
		$albumname = $_POST['album_name'];
		$albumid = $_POST['album_id'];
		$year = $_POST['year_id'];
		
		echo $query = "UPDATE `album_mst` SET ALBUM_DATE = '".$albumdate."', ALBUM_NAME = '".$albumname."', YEAR = '".$year."' WHERE ALBUM_ID = '".$albumid."'";
		
		if(mysql_query($query))
		{
			header("Location:view_album_details.php?msg=Updated");
		}
		else
		{
			header("Location:view_album_details.php?msg=Failed");
		}
		
	}
	if(isset($_GET['del_id']))
	{
		$id = $_GET['del_id'];
		echo $query = "DELETE FROM album_mst WHERE ALBUM_ID = '".$id."'";
		if(mysql_query($query))
		{
			header("Location:view_album_details.php?msg=Deleted");
		}
		else
		{
			header("Location:view_album_details.php?msg=Failed");
		}
	}
?>