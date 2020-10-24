<?php
	include "script/db.php";
	if(isset($_POST['btnInsert']))
	{
		//echo "hi";
		$video_desc = $_POST['video_desc'];
		$video_name = $_POST['video_name'];
		$flag = 0;
		$date = date('d-m-Y');
		$target_dir = "upload/videos/";
			
			$pro = $target_dir.$_FILES["image_name"]["name"];
			//echo $profile;
			function findexts ($pro) 
			 { 
				 $filename = strtolower($pro) ; 
				 $exts = split("[/\\.]", $filename) ; 
				 $n = count($exts)-1; 
				 $exts = $exts[$n]; 
				 return $exts; 
			 } 
			$ext = findexts ($_FILES['image_name']['name']) ;
			$ran = date('dmyhms');
			$ran2 = $ran.".";
			echo $path = $target_dir."IMG".$ran2.$ext;
			echo "<br>";
			
			move_uploaded_file($_FILES["image_name"]["tmp_name"], $path);
			//echo $targetfile1;
		
			echo $query = "INSERT INTO `video_mst`(`VIDEO`, `VIDEO_DATE`, `IMAGE`, `DESCRIPTION`, `FLAG`) 
			VALUES 
			('".$video_name."', '".$date."', '".$path."','".$video_desc."','".$flag."')";
			
			if(mysql_query($query))
			{
				header("Location:video.php?msg=Inserted");
			}
			else
			{
				header("Location:video.php?msg=Failed");
			}
	}
	if(isset($_GET['del_id']))
	{
		$id = $_GET['del_id'];
		$image_d = mysql_query("SELECT * FROM video_mst WHERE VIDEO_ID = '".$id."'");
		$image = mysql_fetch_array($image_d);
		
		echo $query = "DELETE FROM video_mst WHERE VIDEO_ID = '".$id."'";
		unlink($image['IMAGE']);
		if(mysql_query($query))
		{
			header("Location:view_video_details.php?msg=Deleted");
		}
		else
		{
			header("Location:view_video_details.php?msg=Failed");
		}
	}
?>