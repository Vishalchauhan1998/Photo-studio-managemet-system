<?php
	include "script/db.php";
	if(isset($_POST['btnInsert']))
	{
		$acopen = date('d-m-Y');
		$name = $_POST['emp_name'];
		$email = $_POST['email_add'];
		$mob_no = $_POST['mob_no'];
		$city = $_POST['city'];
		$dob = $_POST['date'];
		$add = $_POST['emp_add'];
		
		echo $query = "INSERT into employee_details
		(`AC_OPEN`,`EMPLOYEE_NAME`,`CONTACT_NO`,`ADDRESS`,`EMAIL_ID`,`DATEOFBIRTH`,`CITY_NAME`)
		VALUES('".$acopen."','".$name."','".$mob_no."','".$add."','".$email."','".$dob."','".$city."')";
	
		if(mysql_query($query))
		{
			header("location:insert_employee_details.php?msg=Inserted");
		}
		else
		{
			header("location:insert_employee_details.php?msg=Failed");
		}
	}
	elseif(isset($_POST['btnUpdate']))
	{
		$id = $_POST['txtid'];
		$name=$_POST['emp_name'];
		$email = $_POST['email_add'];
		$mob = $_POST['mob_no']	;
		$city = $_POST['city'];
		$dob = $_POST['date'];
		$add = $_POST['emp_add'];
		
		echo $update = "UPDATE employee_details SET `EMPLOYEE_NAME` = '$name', `CONTACT_NO` = '$mob',`ADDRESS` = '$add',
		`EMAIL_ID` = '$email',`DATEOFBIRTH` = '$dob',`CITY_NAME` = '$city'
		WHERE EMPLOYEE_ID= '$id'";

		if(mysql_query($update))
		{
			header("location:view_employee_details.php?msg='Updated'");
		}
		else
		{
			header("location:view_employee_details.php?msg='Failed'");
		}
	}
	else
	{
		if(isset($_GET['delid']))
		{	
			$id = $_GET['delid'];
			$delete = "DELETE FROM employee_details WHERE EMPLOYEE_ID = '$id'";
			if(mysql_query($delete))
			{
				header("location:view_employee_details.php?msg=Deleted");
			}
			else
			{
				header("location:view_employee_details.php?msg=Failed");
			}	
		}
	}
?>