<?php
	include "script/db.php";
	if(isset($_POST['btnInsert']))
	{
		$year_id = $_POST['year_id'];
		$album_id = $_POST['album_id'];
		$flag = 0;
		$date = date('d-m-Y');
		$target_dir = "upload/images/";
		
		if(isset($album_id)) 
		{
			$pro = $target_dir.$_FILES["profile"]["name"];
			function findexts ($pro) 
			 { 
				 $filename = strtolower($pro) ; 
				 $exts = split("[/\\.]", $filename) ; 
				 $n = count($exts)-1; 
				 $exts = $exts[$n]; 
				 return $exts; 
			 } 
			$ext = findexts ($_FILES['profile']['name']) ;
			$ran = date('dmyhms');
			$ran2 = $ran.".";
			echo $path = $target_dir."IMG".$ran2.$ext;
			echo "<br>";
			move_uploaded_file($_FILES["profile"]["tmp_name"], $path);
			echo $query = "INSERT INTO `image_mst`(`IMAGE_ID`, `IMAGE`, `YEAR_ID`, `ALBUM_ID`, `FLAG`) VALUES (NULL, '".$path."','".$year_id."','".$album_id."','".$flag."')";
			
			if(mysql_query($query))
			{
				header("Location:image.php?msg=Inserted");
			}
			else
			{
				header("Location:image.php?msg=Failed");
			}
		}
		
	}
	elseif(isset($_POST['btnUpdate']))
	{
		$year_id = $_POST['year_id'];
		$album_id = $_POST['album_id'];
		$image_desc = $_POST['image_desc'];
		$oldprofile = $_POST['textprofile']; echo"<br>";
		$newprofile = $_FILES["profile"]["name"];
		$txtid = $_POST['id'];
		
		if($newprofile == NULL)
		{
			echo $update = "UPDATE `image_mst` SET 	
			`IMAGE`='$oldprofile',
			`YEAR_ID`='$year_id',
			`ALBUM_ID`='$album_id'
			 WHERE IMAGE_ID = '$txtid'";
			 
			 /*if(mysql_query($update))
			 {
			 	header("location:view_image_details.php?msg=Updated");
			 }
			 else
			 {
			 	header("location:view_image_details.php?msg=Failed");
			 }*/
		}
		else
		{
			$q1 = mysql_query("SELECT IMAGE FROM image_mst WHERE IMAGE_ID='".$txtid."'");
			$r1 = mysql_fetch_array($q1);
			$img = $r1['IMAGE'];
			
			unlink($img); 

			$target_file = "upload/images/" .basename($newprofile);
			move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
			
			echo $update = "UPDATE `image_mst` SET 	
			`IMAGE`='$target_file',
			`YEAR_ID`='$year_id',
			`ALBUM_ID`='$album_id'
			 WHERE IMAGE_ID = '$txtid'";
			 
			 if(mysql_query($update))
			 {
			 	header("location:view_image_details.php?msg=Updated");
			 }
			 else
			 {
			 	header("location:view_image_details.php?msg=Failed");
			 }
		}
		
	}
	if(isset($_GET['del_id']))
	{
		$id = $_GET['del_id'];
		$image_d = mysql_query("SELECT * FROM image_mst WHERE IMAGE_ID = '".$id."'");
		$image = mysql_fetch_array($image_d);
		
		echo $query = "DELETE FROM image_mst WHERE IMAGE_ID = '".$id."'";
		unlink($image['IMAGE']);
		if(mysql_query($query))
		{
			header("Location:view_image_details.php?msg=Deleted");
		}
		else
		{
			header("Location:view_image_details.php?msg=Failed");
		}
	}
?>