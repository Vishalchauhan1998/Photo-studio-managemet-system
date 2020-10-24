<?php
	include "script/db.php";
	if(isset($_POST['btnInsert']))
	{
		$name = $_POST['cust_name'];
		$email = $_POST['email_add'];
		$mob = $_POST['mob_no'];
		$city = $_POST['city'];
		$fbuser = $_POST['fbuser'];
		$dob = $_POST['date'];
		$add = $_POST['cust_add'];
		$odate = date('d-m-Y');
		
		$query = "INSERT INTO customer_details(`AC_OPEN`,`CUSTOMER_NAME`,`CUSTOMER_CONTACT`,`CUSTOMER_ADDRESS`,
		`CUSTOMER_EMAIL`,`CUSTOMER_FB_NAME`,`DATEOFBIRTH`,`CITY_NAME`)VALUES('$odate','$name','$mob',
		'$add','$email','$fbuser','$dob','$city')";
		
		if(mysql_query($query))
		{
			header("location:insert_customer_details.php?msg=Inserted");
		}
		else
		{
			header("location:insert_customer_details.php?msg=Failed");
		}
	}
	elseif(isset($_POST['btnUpdate']))
	{
		$id = $_POST['txtid'];
		$name = $_POST['cust_name'];
		$email = $_POST['email_add'];
		$mob = $_POST['mob_no'];
		$city = $_POST['city'];
		$fbuser = $_POST['fbuser'];
		$dob = $_POST['date'];
		$add = $_POST['cust_add'];
		
		echo $update = "UPDATE customer_details SET `CUSTOMER_NAME` = '$name', `CUSTOMER_CONTACT` = '$mob',`CUSTOMER_ADDRESS` = '$add',
		`CUSTOMER_EMAIL` = '$email',`CUSTOMER_FB_NAME` = '$fbuser',`DATEOFBIRTH` = '$dob',`CITY_NAME` = '$city'
		WHERE CUSTOMER_ID = '$id'";
		
		if(mysql_query($update))
		{
			header("location:view_customer_details.php?msg=Updated");
		}
		else
		{
			header("location:view_customer_details.php?msg=Failed");
		}
	}
	else
	{
		if(isset($_GET['delid']))
		{	
			$id = $_GET['delid'];
			$delete = "DELETE FROM customer_details WHERE CUSTOMER_ID = '$id'";
			if(mysql_query($delete))
			{
				header("location:view_customer_details.php?msg=Deleted");
			}
			else
			{
				header("location:view_customer_details.php?msg=Failed");
			}	
		}
	}
?>