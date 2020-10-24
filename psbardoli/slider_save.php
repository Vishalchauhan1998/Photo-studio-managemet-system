<?php 
	include "script/db.php";
	if(isset($_POST['btnInsert']))
	{
		
		$target_dir = "upload/slider/";
		$target_file = $target_dir . basename($_FILES["slider"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["slider"]["tmp_name"]);
		
			$video = $target_dir.$_FILES["slider"]["name"];
			//echo $profile;	
			move_uploaded_file($_FILES["slider"]["tmp_name"], $target_file);
			
			echo $query = "INSERT INTO `slider_mst`(`SLIDER_IMAGE`,`FLAG`) VALUES ('".$video."','0')";
			
			if(mysql_query($query))
			{
				header("Location:slider.php?msg=Inserted");
			}
			else
			{
				header("Location:slider.php?msg=Failed");
			}
	}
	if(isset($_GET['del_id']))
	{
		$id = $_GET['del_id'];
		$image_d = mysql_query("SELECT * FROM slider_mst WHERE SLIDER_ID = '".$id."'");
		$image = mysql_fetch_array($image_d);
		
		echo $query = "DELETE FROM slider_mst WHERE SLIDER_ID = '".$id."'";
		unlink($image['SLIDER_IMAGE']);
		if(mysql_query($query))
		{
			header("location:view_slider_details.php?msg=Deleted");
		}
		else
		{
			header("Location:view_slider_details.php?msg=Failed");
		}
	}
?>	