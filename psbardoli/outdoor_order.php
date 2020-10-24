<?php 
	include "script/db.php"; 
	if(isset($_POST['btnInsert']))
	{
		include('script/function.php');
		//session_start();
		if(isset($_POST['btnInsert']))
		{
			if(isset($_SESSION['cust']))
			{
				$order_no = $_POST['order'];
				$orderid = $_POST['orderid'];
			}
			else
			{
				//AUTO GENERATE ORDER NO
				$auto = "SELECT MAX(cast(ORDER_NO as decimal)) ORDER_NO FROM order_mst";
				if($result = mysql_query($auto))
				{
					$row = mysql_fetch_assoc($result);
					$count = $row['ORDER_NO'];
					$count = $count+1;
					
					$code_no = str_pad($count,4,"0",STR_PAD_LEFT);
				}
					$order_no = $code_no;
					$year =  date('Y');
					$orderid = 'OS'. $year . $order_no;
			}
				$id = getMaxValue("order_mst","ORDER_ID"); 
				$cust = $_POST['cust'];
				$order_date = date('d-m-Y');
				$bdate = $_POST['b_date'];		
				$cam = $_POST['nocam'];
				$dcam = $_POST['nodcam'];
				$vid = $_POST['novid'];
				$rcam = $_POST['ratecam'];
				$rdcam = $_POST['ratedslr'];
				$rvid = $_POST['ratevid'];
				$loc = $_POST['loc'];
				$type = $_POST['txtvalue'];
			
			
			echo $query = "INSERT INTO `order_mst`(`ORDER_ID`, `ORDER_NO`, `ORDER_REF_NO`, `ORDER_DATE`, `BOOKING_DATE`, `CUSTOMER_ID`, `ORDER_TYPE`, `NO_of_CAM`, `NO_of_DSLR`, `NO_of_VIDEO`, `RATE_CAM`, `RATE_DSLR`, `RATE_VIDEO`, `LOCATION`, `FLAG`)
					VALUES ('".$id."', '".$order_no."', '".$orderid."', '".$order_date."', '".$bdate."', '".$cust."', '".$type."', '".$cam."', '".$dcam."', '".$vid."', '".$rcam."', '".$rdcam."', '".$rvid."','".$loc."','0')";
				
				if(mysql_query($query))
				{
					$_SESSION['bdate'] = $bdate;
					$_SESSION['cust'] = $cust;
					$_SESSION['orderid'] = $orderid;
					$_SESSION['order'] = $order_no;
					header("location:insert_order_details.php?msg=Inserted");
				}
				else
				{
					header("location:insert_order_details.php?msg=Failed");
				}
		}
	}
	elseif(isset($_POST['btnUpdate']))
	{
		
				$cust = $_POST['cust'];
				$bdate = $_POST['b_date'];		
				$cam = $_POST['nocam'];
				$dcam = $_POST['nodcam'];
				$vid = $_POST['novid'];
				$rcam = $_POST['ratecam'];
				$rdcam = $_POST['ratedslr'];
				$rvid = $_POST['ratevid'];
				$loc = $_POST['loc'];
				$txtid = $_POST['txtid'];
				
			echo $update = "UPDATE order_mst SET `CUSTOMER_ID` = '$cust',`BOOKING_DATE` = '$bdate',`NO_of_CAM` = '$cam',`NO_of_DSLR` = '$dcam',`NO_of_VIDEO` = '$vid',`RATE_CAM` = '$rcam',`RATE_DSLR`='$rdcam',`RATE_VIDEO`= '$rvid',`LOCATION`= '$loc' WHERE ORDER_ID = '$txtid'"; 
			if(mysql_query($update))
			{
				header("location:view_outdoor_order_details.php?msg=Update");
			}
			else
			{
				header("location:view_outdoor_order_details.php?msg=Failed");
			}
	}
	else
	{
		if(isset($_GET['del_id']))
		{	
			$id = $_GET['del_id'];
			$delete = "DELETE FROM order_mst WHERE order_ID = '$id'";
			if(mysql_query($delete))
			{
				header("location:view_outdoor_order_details.php?msg=Deleted");
			}
			else
			{
				header("location:view_outdoor_order_details.php?msg=Failed");
			}	
		}
	}
	if(isset($_GET['edt_id']))
	{
		$query = mysql_query("select * from order_mst WHERE ORDER_ID = '".$_GET['edt_id']."'");
		$data = mysql_fetch_array($query);
?>
	<div class="col-md-12 widget-holder">
		<div class="widget-bg">
		<div class="widget-body clearfix">
			<h3 class="box-title mr-b-0">
				Update Outdoor Order Details Here....
				<font style="float:right"> <a href="view_outdoor_order_details.php">View Outdoor Order Details</a> </font>
			</h3>
			<br /><br />
				<form method="POST" action="">
				<div class="row mr-b-50">
					<!-- Customer Name -->
					<div class="col-md-4 mb-3">
						<label for="validationServer01">Select Customer</label>
						<select class="form-control" name="cust" required>
							<option selected="selected" disabled="disabled"> Select Customer Name </option>
							<?php
								$query_city = mysql_query("SELECT * FROM customer_details");
								while($row_city = mysql_fetch_array($query_city))
								{
							?>
							<option value="<?php echo $row_city['CUSTOMER_ID'];?>" <?php if($data['CUSTOMER_ID'] == $row_city['CUSTOMER_ID']){ echo "selected='selected'"; } ?>><?php echo $row_city['CUSTOMER_NAME'];?></option>
							<?php
								}
							?>
						</select>
					</div>
						
					<div class="col-md-4 mb-3">
						<label for="validationServer01">Select Booking Date</label>
						<div class="input-group">
							<input type="text" class="form-control datepicker" value="<?php echo $data['BOOKING_DATE']?>" name="b_date"  required />
						</div>
					</div>
							
					<div class="col-md-2 mb-3">
						<label for="validationServer01">Number of Camera</label>
						<input type="text" class="form-control" value="<?php echo $data['NO_of_CAM']?>" name="nocam"	required />
					</div>
					
					<div class="col-md-2 mb-3">
						<label for="validationServer01">Rate of Camera</label>
						<input type="text" class="form-control" value="<?php echo $data['RATE_CAM']?>" name="ratecam" required />
					</div>
					
					<div class="col-md-2 mb-3">
						<label for="validationServer01">Number of DSLR</label>
						<input type="text" class="form-control" value="<?php echo $data['NO_of_DSLR']?>" name="nodcam" required />
					</div>
					
					<div class="col-md-2 mb-3">
						<label for="validationServer01">Rate of DSLR</label>
						<input type="text" class="form-control" value="<?php echo $data['RATE_DSLR']?>" name="ratedslr" required />
					</div>
					
					<div class="col-md-2 mb-3">
						<label for="validationServer01">Number of Video</label>
						<input type="text" class="form-control" value="<?php echo $data['NO_of_VIDEO']?>" name="novid" required />
					</div>
					
					<div class="col-md-2 mb-3">
						<label for="validationServer01">Rate of Video</label>
						<input type="text" class="form-control" value="<?php echo $data['RATE_VIDEO']?>" name="ratevid" required />
					</div>
					
					<div class="col-md-4 mb-3">
						<label for="validationServer01">Location Details</label>
						<textarea class="form-control" placeholder="Enter Location Details Here..." name="loc"><?php echo $data['LOCATION']?></textarea>
						<input type="hidden" name="txtid" value="<?php echo $data['ORDER_ID']?>"/>
					</div>
				</div>
							
				<div class="form-actions">
                    <div class="form-group row"  style="float:right;">
                    <div class="col-md-12 ml-md-auto btn-list">
						<button class="btn btn-primary" type="submit" name="btnUpdate">Update Data</button>
                    </div>
					</div>
                </div>
				</form>
				
			</div>
		</div>
	</div>
<?php
	}
	else
	{
?>

	<div class="col-md-12 widget-holder">
		<div class="widget-bg">
		<div class="widget-body clearfix">
			<h3 class="box-title mr-b-0">
				Enter Outdoor Order Details Here....
				<font style="float:right"> <a href="view_outdoor_order_details.php">View Outdoor Order Details</a> </font>
			</h3>
			<br /><br />
				<form method="POST" action="">
				<div class="row mr-b-50">
					
					<?php
						if(isset($_SESSION['cust']))
						{
							$query = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$_SESSION['cust']."'");
							$ra = mysql_fetch_array($query);
					?>
					<div class="col-md-4 mb-3">
						<label for="validationServer01">Select Customer</label>
						<input type="text" class="form-control" value="<?php echo $ra['CUSTOMER_NAME'];?>" readonly="" />
						<input type="hidden" value="<?php echo $_SESSION['cust'];?>" class="form-control" name="cust" />
					</div>
					
					<div class="col-md-4 mb-3">
						<label for="validationServer01">Select Booking Date</label>
						<div class="input-group">
							<input type="text" class="form-control datepicker" placeholder="Select Booking Date" name="b_date" />
							<input type="hidden" value="<?php echo $_SESSION['orderid'];?>" class="form-control" name="orderid" readonly="" />
							<input type="hidden" value="<?php echo $_SESSION['order'];?>" class="form-control" name="order" readonly="" />
						</div>
					</div>
					<?php
						}
						else
						{
					?>
					<!-- Customer Name -->
					<div class="col-md-4 mb-3">
						<label for="validationServer01">Select Customer</label>
						<select class="form-control" name="cust" required>
							<option selected="selected" disabled="disabled"> Select Customer Name </option>
							<?php
								$query_city = mysql_query("SELECT * FROM customer_details");
								while($row_city = mysql_fetch_array($query_city))
								{
							?>
							<option value="<?php echo $row_city['CUSTOMER_ID'];?>"><?php echo $row_city['CUSTOMER_NAME'];?></option>
							<?php
								}
							?>
						</select>
					</div>
						
					<div class="col-md-4 mb-3">
						<label for="validationServer01">Select Booking Date</label>
						<div class="input-group">
							<input type="text" class="form-control datepicker" placeholder="Select Booking Date" name="b_date"  />
						</div>
					</div>
					<?php
						}
					?>
							
					<div class="col-md-2 mb-3">
						<label for="validationServer01">Number of Camera</label>
						<input type="text" class="form-control" placeholder="No of Camera" name="nocam"	required />
					</div>
					
					<div class="col-md-2 mb-3">
						<label for="validationServer01">Rate of Camera</label>
						<input type="text" class="form-control" placeholder="Rate of Camera" name="ratecam" required />
					</div>
					
					<div class="col-md-2 mb-3">
						<label for="validationServer01">Number of DSLR</label>
						<input type="text" class="form-control" placeholder="No of DSLR" name="nodcam" required />
					</div>
					
					<div class="col-md-2 mb-3">
						<label for="validationServer01">Rate of DSLR</label>
						<input type="text" class="form-control" placeholder="Rate of DSLR" name="ratedslr" required />
					</div>
					
					<div class="col-md-2 mb-3">
						<label for="validationServer01">Number of Video</label>
						<input type="text" class="form-control" placeholder="No of Video" name="novid" required />
					</div>
					
					<div class="col-md-2 mb-3">
						<label for="validationServer01">Rate of Video</label>
						<input type="text" class="form-control" placeholder="Rate of Video" name="ratevid" required />
					</div>
					
					<div class="col-md-4 mb-3">
						<label for="validationServer01">Location Details</label>
						<textarea class="form-control" placeholder="Enter Location Details Here..." name="loc"></textarea>
						<input type="hidden" name="txtvalue" value="OO" />
					</div>
				</div>
							
				<div class="form-actions">
                    <div class="form-group row"  style="float:right;">
                    <div class="col-md-12 ml-md-auto btn-list">
						<button class="btn btn-primary" type="submit" name="btnInsert">Submit</button>
						<?php
						if(isset($_SESSION['cust']))
						{
						?>
							<a href="outdoor_logout.php"><button class="btn btn-info" type="button">Change Customer</button></a>
						<?php
						}
						else
						{
						?>
							<button class="btn btn-outline-default" type="reset">Cancel</button>
						<?php
						}
						?>
                    </div>
					</div>
                </div>
				</form>
				
			</div>
		</div>
	</div>
<?php
	}
?>