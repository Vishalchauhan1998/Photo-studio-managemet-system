<?php 
	include "script/db.php";
	include('script/function.php');
	session_start();
	
	if(isset($_POST['btnPhoto']))
	{			
			if(isset($_SESSION['p_photo']))
			{
				$a = $_POST['order'];
				$orderid = $_POST['orderid'];
			}
			else
			{
				//AUTO GENERATE ORDER NO
				$auto = "SELECT MAX(cast(P_ORDER as decimal))P_ORDER FROM photography_mst";
				if($result = mysql_query($auto))
				{
					$row = mysql_fetch_assoc($result);
					$count = $row['P_ORDER'];
					$count = $count+1;
				
					$code_no = str_pad($count,1,"0",STR_PAD_LEFT);
				}
					$a = $code_no;
					$year =  date('Y');		
					$orderid = 'PS'. $year . $a;
			}
			$cust = $_POST['cust'];
			$date = $_POST['date'];
			$photouid = $_POST['photouid'];
			$paper = $_POST['ipaper'];
			$size = $_POST['size'];
			$qty = $_POST['qty'];
			$rate = $_POST['rate'];
			$frame = $_POST['iframe'];
			$fqty = $_POST['fqty'];
			$frate = $_POST['frate'];
			$flag = '0';
			
			
			if(isset($photouid))
			{
				echo $query = "INSERT INTO `photography_mst`
				(`PHOTO_ID`, `P_ORDER`, `CUSTOMER_ID`, `ORDER_ID`, `ORDER_DATE`, `PHOTO_UID`, `ALBUM_NAME`, `PAPER_NAME`, `PHOTO_SIZE`, `PHOTO_QTY`, `PHOTO_RATE`, `FRAME_NAME`, `FRAME_QTY`, `FRAME_RATE`, `FLAG`)
				 VALUES ('NULL','$a','$cust','$orderid','$date','$photouid','NULL','$paper','$size','$qty','$rate','$frame','$fqty','$frate','$flag')"; 
			}
			
			if(mysql_query($query))
			{
				session_start();
				$_SESSION['p_photo'] = $_POST['photouid'];
				$_SESSION['p_cust'] = $_POST['cust'];
				$_SESSION['p_date'] = $_POST['date'];
				$_SESSION['p_orderid'] = $orderid;
				$_SESSION['p_order'] = $a;
				header("location:photography_details.php?msg=Inserted");
			 }
			 else
			 {
				header("location:photography_details.php?msg=Failed");
			 }
		 
	}
	
	if(isset($_POST['btnPInvoice']))
	{
		$auto = "SELECT MAX(cast(P_BILL_NO as decimal)) P_BILL_NO FROM p_invoice_mst";
		if($result = mysql_query($auto))
		{
			$row = mysql_fetch_assoc($result);
			$count = $row['P_BILL_NO'];
			$count = $count+1;
			
			$code_no = str_pad($count,1,"0",STR_PAD_LEFT);
		}
		$billno = $code_no;
		$date = date('d-m-Y');
		$cust = $_POST['cust'];
		$order = $_POST['order'];
		$album = $_POST['aname'];
		$size = $_POST['asize'];
		$qty = $_POST['aqty'];
		$rate = $_POST['arate'];
		$frame = $_POST['fname'];
		$fqty = $_POST['fqty'];
		$frate = $_POST['frate'];
		$atotal = $_POST['atotal'];
		$ftotal = $_POST['ftotal'];
		$flag = '0';
		
		for($i=0; $i <= count($album) -1; $i++)
		{
			echo $query ="INSERT INTO `p_invoice_mst`(`P_INVOICE_ID`, `P_BILL_NO`, `P_BILL_DATE`, `P_ORDER_ID`, `P_CUSTOMER_ID`, `ALBUM_NAME`, `A_SIZE`, `A_QTY`, `A_PRICE`, `A_TOTAL`, `FRAME_NAME`, `F_QTY`, `F_PRICE`, `F_TOTAL`, `M_FLAG`) VALUES ('NULL','$billno','$date','$order','$cust','$album[$i]','$size[$i]','$qty[$i]','$rate[$i]','$atotal[$i]','$frame[$i]','$fqty[$i]','$frate[$i]','$ftotal[$i]','$flag')";
			echo "<br>";
			
			if(mysql_query($query))
			{
				header("location:p_invoice.php?msg=success");	
			}
				else
			{
				header("location:p_invoice.php?msg=failed");	
			}
		}
	}
	
	if(isset($_POST['btnAEDIT']))
	{
		$cust = $_POST['cust'];
		$date = $_POST['date'];
		$paper = $_POST['paper'];
		$size = $_POST['asize'];
		$qty = $_POST['aqty'];
		$rate = $_POST['arate'];
		$album = $_POST['album'];
		
		echo $query = "UPDATE `photography_mst` SET `CUSTOMER_ID`='$cust',`ORDER_DATE`='$date',`ALBUM_NAME`='$album',`PAPER_NAME`='$paper',`PHOTO_SIZE`='$size',`PHOTO_QTY`='$qty',`PHOTO_RATE`='$rate' WHERE PHOTO_ID = '".$_POST['pedit']."'";
		
		
		if(mysql_query($query))
		{
			header("location:photoalbum_details.php?msg=Updated");
		}
	}
	
	if(isset($_GET['del_ida']))
	{
		$id = $_GET['del_ida'];
		$query = "DELETE FROM photography_mst WHERE PHOTO_ID = '".$id."'";
		
		if(mysql_query($query))
		{
			header("location:photoalbum_details.php?msg=Deleted");
		}
	}
	
	if(isset($_POST['btnAPhoto']))
	{
			if(isset($_SESSION['p_photo']))
			{
				$a = $_POST['order'];
				$orderid = $_POST['orderid'];
			}
			else
			{
				//AUTO GENERATE ORDER NO
				$auto = "SELECT MAX(cast(P_ORDER as decimal))P_ORDER FROM photography_mst";
				if($result = mysql_query($auto))
				{
					$row = mysql_fetch_assoc($result);
					$count = $row['P_ORDER'];
					$count = $count+1;
				
					$code_no = str_pad($count,1,"0",STR_PAD_LEFT);
				}
					$a = $code_no;
					$year =  date('Y');		
					$orderid = 'PS'. $year . $a;
			}
			$cust = $_POST['cust'];
			$date = $_POST['date'];
			$photouid = $_POST['photouid'];
			$paper = $_POST['paper'];
			$size = $_POST['asize'];
			$qty = $_POST['aqty'];
			$rate = $_POST['arate'];
			$fqty = $_POST['aqty'];
			$frate = $_POST['arate'];
			$flag = '0';
			$album = $_POST['album'];
			
			if(isset($photouid))
			{
				for ($i = 0; $i < count($album); $i++)
				{
					echo $query = "INSERT INTO `photography_mst`
					(`PHOTO_ID`, `P_ORDER`, `CUSTOMER_ID`, `ORDER_ID`, `ORDER_DATE`, `PHOTO_UID`, `ALBUM_NAME`, `PAPER_NAME`, `PHOTO_SIZE`, `PHOTO_QTY`, `PHOTO_RATE`, `FRAME_NAME`, `FRAME_QTY`, `FRAME_RATE`, `FLAG`)
				 	VALUES ('NULL','$a','$cust','$orderid','$date','$photouid[$i]','$album[$i]','$paper[$i]','$size[$i]','$qty[$i]','$rate[$i]','','','','$flag')"; 
				
					if(mysql_query($query))
					{
						session_start();
						$_SESSION['p_photo'] = $_POST['photouid'];
						$_SESSION['p_cust'] = $_POST['cust'];
						$_SESSION['p_date'] = $_POST['date'];
						$_SESSION['p_orderid'] = $orderid;
						$_SESSION['p_order'] = $a;
						header("location:photoalbum_details.php?msg=Inserted");
					}
					else
					{
						header("location:photoalbum_details.php?msg=Failed");
					}
				}
			}
		}
	
		if(isset($_POST['btnAPInvoice']))
		{
			$auto = "SELECT MAX(cast(P_BILL_NO as decimal)) P_BILL_NO FROM p_invoice_mst";
			if($result = mysql_query($auto))
			{
				$row = mysql_fetch_assoc($result);
				$count = $row['P_BILL_NO'];
				$count = $count+1;
				
				$code_no = str_pad($count,1,"0",STR_PAD_LEFT);
			}
			$billno = $code_no;
			$date = date('d-m-Y');
			$cust = $_POST['cust'];
			$order = $_POST['order'];
			$album = $_POST['aname'];
			$paper = $_POST['apname'];
			$size = $_POST['asize'];
			$qty = $_POST['aqty'];
			$rate = $_POST['arate'];
			$atotal = $_POST['atotal'];
			$flag = '0';
			
			for($i=0; $i <= count($album) -1; $i++)
			{
				echo $query ="INSERT INTO `p_invoice_mst`(`P_INVOICE_ID`, `P_BILL_NO`, `P_BILL_DATE`, `P_ORDER_ID`, `P_CUSTOMER_ID`, `ALBUM_NAME`, `PAPER_NAME`, `A_SIZE`, `A_QTY`, `A_PRICE`, `A_TOTAL`, `FRAME_NAME`, `F_QTY`, `F_PRICE`, `F_TOTAL`, `M_FLAG`) VALUES ('NULL','$billno','$date','$order','$cust','$album[$i]','$paper[$i]','$size[$i]','$qty[$i]','$rate[$i]','$atotal[$i]','','','','','$flag')";
				echo "<br>";
				
				if(mysql_query($query))
				{
					header("location:ap_invoice.php?msg=APsuccess");	
				}
					else
				{
					header("location:ap_invoice.php?msg=failed");	
				}
			}
		}
		
		if(isset($_POST['btnPEDIT']))
		{
			$photouid = $_POST['photouid'];
			$paper = $_POST['ipaper'];
			$size = $_POST['size'];
			$qty = $_POST['qty'];
			$rate = $_POST['rate'];
			$frame = $_POST['iframe'];
			$fqty = $_POST['fqty'];
			$frate = $_POST['frate'];
			$id = $_POST['edtid'];
			
			echo $query = "UPDATE `photography_mst` SET `PHOTO_UID`='$photouid',`PAPER_NAME`='$paper',`PHOTO_SIZE`='$size',`PHOTO_QTY`='$qty',`PHOTO_RATE`='$rate',`FRAME_NAME`='$frame',`FRAME_QTY`='$fqty',`FRAME_RATE`='$frate' WHERE PHOTO_ID = '".$id."'";
			
			if(mysql_query($query))
			{
				header("location:photography_details.php?msg=updated");
			}
		}
		
		
		if(isset($_GET['del_id']))
		{
			echo $query = "DELETE FROM photography_mst WHERE PHOTO_ID = '".$_GET['del_id']."'";
			
			if(mysql_query($query))
			{
				header("location:photography_details.php?msg=deleted");
			}
		}
?>
