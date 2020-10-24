<?php
	include "script/db.php";
	include('script/function.php');
	session_start();
	
	if(isset($_POST['btnSubmit']))
	{
		$id = getMaxValue("accessories_details","ASC_ID");
		$name = strtoupper($_POST['a_name']);
		
		echo $query = "INSERT into accessories_details(`ASC_ID`,`ASC_NAME`)VALUES('".$id."','".$name."')";
		if(mysql_query($query))
		{
			header("location:insert_accessories.php?msg=Inserted");
		}
		else
		{
			header("location:insert_accessories.php?msg=Failed");
		}
	}
	if(isset($_POST['btnAccess']))
	{			
			if(isset($_SESSION['acces']))
			{
				$a = $_POST['order'];
				$orderid = $_POST['orderid'];
			}
			else
			{
				//AUTO GENERATE ORDER NO
				$auto = "SELECT MAX(cast(ORDER_NO as decimal))ORDER_NO FROM accessories_mst";
				if($result = mysql_query($auto))
				{
					$row = mysql_fetch_assoc($result);
					$count = $row['ORDER_NO'];
					$count = $count+1;
				
					$code_no = str_pad($count,4,"0",STR_PAD_LEFT);
				}
					$a = $code_no;
					$year =  date('Y');		
					$orderid = 'AS'. $year . $a;
			}
			
			$total = $_POST['qty'] * $_POST['rate'];
			$flag = '0';
				echo $query = "INSERT INTO `accessories_mst`(`ASS_C_ID`, `DATE`, `ORDER_NO`, `ORDER_REF_NO`, `CUSTOMER_ID`, `ASC_ID`, `QTY`, `RATE`, `TOTAL`, `FLAG`) VALUES ('NULL','".$_POST['date']."','".$a."','".$orderid."','".$_POST['cust']."','".$_POST['asc']."','".$_POST['qty']."','".$_POST['rate']."','$total','$flag')"; 
				
			
			if(mysql_query($query))
			{
				$_SESSION['asc_cust'] = $_POST['cust'];
				$_SESSION['asc_date'] = $_POST['date'];
				$_SESSION['asc_orderid'] = $orderid;
				$_SESSION['asc_order'] = $a;
				header("location:insert_accessories_details.php?msg=Inserted");
			 }
			 else
			 {
				header("location:insert_accessories_details.php?msg=Failed");
			 }	
		 
	}
	
	if(isset($_POST['btnEAccess']))
	{
		$total = $_POST['qty'] * $_POST['rate'];
		echo $query = "UPDATE `accessories_mst` SET ASC_ID = '".$_POST['asc']."', QTY = '".$_POST['qty']."', RATE = '".$_POST['rate']."', TOTAL = '".$total."' WHERE ASS_C_ID = '".$_POST['edtid']."'";
		if(mysql_query($query))
		{
			header("location:insert_accessories_details.php?msg=Updated");
		 }
		 else
		 {
			header("location:insert_accessories_details.php?msg=Failed");
		 }	
	}
	
	if(isset($_GET['del_id']))
	{
		$query ="DELETE FROM `accessories_mst` WHERE ASS_C_ID = '".$_GET['del_id']."'";
		
		if(mysql_query($query))
		{
			header("location:insert_accessories_details.php?msg=Deleted");
		 }
		 else
		 {
			header("location:insert_accessories_details.php?msg=Failed");
		 }	
	}
?>