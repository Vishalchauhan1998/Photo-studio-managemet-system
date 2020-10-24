<?php
	include "script/db.php";
	include "script/function.php";
	session_start();
	if(isset($_POST['btnLogout']))
	{
		unset($_SESSION['o_cust']);
		header("location:photoalbum.php");	
	}
	elseif(isset($_POST['btnCart']))
	{
		$id = getMaxValue("photo_albumdetails","PALBUM_ID"); 
		
		$cust_name = $_POST['cust_name'];
		$order_id = $_POST['order_id'];
		$type = $_POST['type'];
		$stype = $_POST['stype'];
		$size = $_POST['size'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];
		$total = $qty * $price;
		$flag = '0';
		
		echo $insert = "INSERT INTO `photo_albumdetails`(`PALBUM_ID`, `CUSTOMER_ID`, `ORDER_NO`, `TYPE_ID`, `SUBTYPE_ID`, `QTY`, `SIZE`, `PRICE`, `TOTAL`, `FLAG`) VALUES ('$id','$cust_name','$order_id','$type','$stype','$qty','$size','$price','$total','$flag')";
			
		if(mysql_query($insert))
		{
			header("location:photoalbum.php?msg=Inserted");
		}
		else
		{
			header("location:photoalbum.php?msg=Failed");
		}
	}
	elseif(isset($_POST['btnUpdate']))
	{
		$type = $_POST['type'];
		$stype = $_POST['stype'];
		$size = $_POST['size'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];
		$total = $qty * $price;
		$flag = '0';
		
		echo $update = "UPDATE `photo_albumdetails` SET `TYPE_ID`='$type', `SUBTYPE_ID`='$stype' ,`QTY`='$qty', `SIZE`='$size', `PRICE`='$price' ,`TOTAL`='$total' WHERE PALBUM_ID = '".$_POST['txtid']."'";
		if(mysql_query($update))
		{
				header("location:photoalbum.php?msg=Updated");
		}
		else
		{
			header("location:photoalbum.php?msg=Failed");
		}
	}
	elseif(isset($_POST['btnInvoice']))
	{
		
		$code = 0;
		$auto = "SELECT MAX(cast(BILL_ID as decimal)) BILL_ID FROM invoice_mst";
		if($result = mysql_query($auto))
		{
			$row = mysql_fetch_assoc($result);
			$count = $row['BILL_ID'];
			$count = $count+1;
				
			$code = str_pad($count,4,"0",STR_PAD_LEFT);
		}
			$a = $code;
			$c = $count;
			$year =  date('y');
			$billno = 'PS'. $year . $a;
			
			$id = getMaxValue("invoice_mst","INVOICE_ID"); 
			$date = date('d-m-Y');
			$orderid = $_POST['order_id'];
			
			$count_data = mysql_query("SELECT * FROM invoice_mst WHERE ORDER_NO = '".$orderid."'");
			$count = mysql_num_rows($count_data);
			if($count > 0)
			{
				
			}
			else
			{
				for($i=0; $i <= $_POST['rows'] - 1 ; $i++)
				{
					echo $query = "INSERT INTO `invoice_mst`(`INVOICE_ID`, `BILL_ID`, `ORDER_NO`, `BILL_NO`, `BILL_DATE`) 
					VALUES ('$id','$c','".$orderid[$i]."','$billno','$date')";
				
					echo "<br>";
					
					echo $upd_query = "UPDATE photo_albumdetails SET FLAG = '1' WHERE ORDER_NO = '".$orderid[$i]."'";
				
					echo "<br>";
			
					if((mysql_query($query)) && (mysql_query($upd_query)))
					{
						unset($_SESSION['o_cust']);
						header("location:view_photoalbum.php?msg=Sucess");	
					}
					/*else
					{
						header("location:photoalbum.php?msg=Failed");
					}*/
				}
			}
	}
	else
	{
		$id = $_GET['delete'];
		$delete = "DELETE FROM photo_albumdetails WHERE PALBUM_ID = '".$_GET['delete']."'";
		if(mysql_query($delete))
		{
			header("location:photoalbum.php?msg=Deleted");
		}
		else
		{
			header("location:photoalbum.php?msg=Failed");
		}
	}
?>