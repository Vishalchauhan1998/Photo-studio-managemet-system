<?php
	include "script/db.php";
	include('script/function.php');
	if(isset($_POST['btnMInsert']))
	{
		if(isset($_SESSION['function']))
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
				$orderid = 'MS'. $year . $order_no;
		}
		$id = getMaxValue("order_mst","ORDER_ID"); 
		$order_date = date('d-m-Y');
		$cust = $_POST['cust'];
		$f_name = $_POST['f_name'];
		$f_date = $_POST['f_date'];
		$f_time = $_POST['f_time'];
		$dslr = $_POST['dslr'];
		$cam = $_POST['cam'];
		$vid = $_POST['vid'];
		$pdslr = $_POST['pdslr'];
		$pcam = $_POST['pcam'];
		$pvid = $_POST['pvid'];
		$type = $_POST['txtvalue'];
		$flag = '0';
		
			echo $query = "INSERT INTO `order_mst`(`ORDER_ID`, `ORDER_NO`, `ORDER_REF_NO`, `ORDER_DATE`, `CUSTOMER_ID`, `ORDER_TYPE`, `FUNCTION_ID`, `FUNCTION_DATE`, `FUNCTION_TIME`, `NO_of_CAM`, `NO_of_DSLR`, `NO_of_VIDEO`, `RATE_CAM`, `RATE_DSLR`, `RATE_VIDEO`, `FLAG`)
			VALUES('$id','$order_no','$orderid','$order_date','$cust','$type','$f_name','$f_date','$f_time','$dslr','$cam','$vid','$pcam','$pdslr','$pvid','$flag')";
			
			if(mysql_query($query))
			{
				$_SESSION['function'] = $cust;
				$_SESSION['orderid'] = $orderid;
				$_SESSION['order'] = $order_no;
				header("location:insert_order_details.php?msg=Inserted");
			}
			else
			{
				header("location:insert_order_details.php?msg=Failed");
			}
	}
	elseif(isset($_POST['btnFUpdate']))
	{
		$order_date = date('d-m-Y');
		$cust = $_POST['cust'];
		$f_name = $_POST['f_name'];
		$f_date = $_POST['f_date'];
		$f_time = $_POST['f_time'];
		$dslr = $_POST['dslr'];
		$cam = $_POST['cam'];
		$vid = $_POST['vid'];
		$pdslr = $_POST['pdslr'];
		$pcam = $_POST['pcam'];
		$pvid = $_POST['pvid'];
		$txtid = $_POST['txtid'];
		
		echo $Update = "UPDATE order_mst SET `CUSTOMER_ID` = '$cust', `FUNCTION_ID` = '$f_name',`FUNCTION_DATE` = '$f_date',`FUNCTION_TIME` = '$f_time',`NO_of_VIDEO` = '$vid',`NO_of_CAM` = '$cam',`NO_of_DSLR`='$dslr',`RATE_DSLR`='$pdslr',`RATE_CAM`='$pcam',`RATE_VIDEO`='$pvid' WHERE ORDER_ID = '$txtid'"; 
		if(mysql_query($Update))
		{
			header("location:view_function_order_details.php?msg=Update");
		}
		else
		{
			header("location:view_function_order_details.php?msg=Failed");
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
				header("location:view_function_order_details.php?msg=Deleted");
			}
			else
			{
				header("location:view_function_order_details.php?msg=Failed");
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
							Update Marraige Order Details Here....
							<font style="float:right"> <a href="view_function_order_details.php">View Marraige Order Details</a> </font>
						</h3>
						
							<br /><br />
							<form method="POST" action="">
							<div class="row mr-b-50">
								<div class="col-md-3 mb-3">
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
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Select Function Name</label>
									<select class="form-control" name="f_name" id="f_name" >
									<option selected disabled="disabled">Select Ceremony</option>
									<?php
										$query = mysql_query("SELECT * FROM  function_details");
										while($f = mysql_fetch_array($query))
										{
									?>
									<option value="<?php echo $f['FUNCTION_ID'];?>"<?php if ($f['FUNCTION_ID'] == $f['FUNCTION_ID']){ echo "selected='selected'"; } ?>><?php echo $f['FUNCTION_NAME'];?></option>
									</option>
										<?php
											}
										?>
									</select>
								</div>
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Select Function Date</label>
									<div class="input-group">
									<input type="text" class="form-control datepicker" value="<?php echo $data['FUNCTION_DATE']?>" name="f_date"  />
									</div>
								</div>
								<div class="col-md-3 mb-3">
									<div class="form-group">
									<label for="validationServer01">Select Function Time</label>
                                        <div class="input-group clockpicker">
                                            <input type="text" class="form-control" name="f_time" value="<?php echo $data['FUNCTION_TIME']?>" data-masked-input="99:99" id="sampleClockPicker1"> <span class="input-group-addon"><span class="material-icons list-icon">watch_later</span></span>
                                        </div>
                                        <!-- /.input-group -->
                                    </div>
								</div>
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">No of DSLR</label>
									<input type="text" id="dslr" class="form-control" name="dslr" value="<?php echo $data['NO_of_DSLR']?>"  tabindex="4"  />
								</div>
								<div class="col-md-2 mb-3">
									<label for="validationServer01">Rate of DSLE</label>
									<input type="text" id="pcam" class="form-control" name="pdslr"value="<?php echo $data['RATE_DSLR']?>"  tabindex="5" />
								</div>
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">No of CAMERA</label>
									<input type="text" id="cam" class="form-control" name="cam" value="<?php echo $data['NO_of_CAM']?>"  tabindex="6"  />
								</div>
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">Rate of Camera</label>
									<input type="text" id="pdslr" class="form-control" name="pcam" value="<?php echo $data['RATE_CAM']?>" tabindex="7"  />
								</div>
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">No of VIDEO CAM</label>
									<input type="text" id="vid" class="form-control" name="vid" value="<?php echo $data['NO_of_VIDEO']?>" tabindex="8" />
								</div>
								
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">Rate of VIDEO CAM</label>
									<input type="text" id="pvid" class="form-control" name="pvid" value="<?php echo $data['RATE_VIDEO']?>"  tabindex="9" />
									<input type="hidden" value="<?php echo $data['ORDER_ID']?>" name="txtid" />
								</div>
								
							</div>
							
							<div class="form-actions">
                                <div class="form-group row"  style="float:right;">
                                    <div class="col-md-12 ml-md-auto btn-list">
                                        <button class="btn btn-primary" type="submit" name="btnFUpdate">Update Data</button>
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
							Enter Marraige Order Details Here....
							<font style="float:right"> <a href="view_function_order_details.php">View Marraige Order Details</a> </font>
						</h3>
						
							<br /><br />
							<form method="POST" action="">
							<div class="row mr-b-50">
								<?php
								if(isset($_SESSION['function']))
								{
											$query = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$_SESSION['function']."'");
											$ra = mysql_fetch_array($query);
									?>
									<div class="col-md-3 mb-3">
										<label for="validationServer01">Select Customer</label>
										<input type="text" class="form-control" value="<?php echo $ra['CUSTOMER_NAME'];?>" readonly="" />
										<input type="hidden" value="<?php echo $_SESSION['function'];?>" class="form-control" name="cust" />
										<input type="hidden" value="<?php echo $_SESSION['orderid'];?>" class="form-control" name="orderid" readonly="" />
										<input type="hidden" value="<?php echo $_SESSION['order'];?>" class="form-control" name="order" readonly="" />
									</div>
									<?php
									}
									else
									{
								?>
								<div class="col-md-3 mb-3">
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
								<?php
									}
								?>
								
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Select Function Name</label>
									<select class="form-control" name="f_name" id="f_name" >
										<option selected disabled="disabled">Select Ceremony</option>
										<?php
											$query = mysql_query("SELECT * FROM  function_details");
											while($f = mysql_fetch_array($query))
											{
										?>
										<option value="<?php echo $f['FUNCTION_ID']?>"><?php echo $f['FUNCTION_NAME'] ?></option>
										<?php
											}
										?>
									</select>
								</div>
								
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Select Booking Date</label>
								<div class="input-group">
										<input type="text" class="form-control datepicker" placeholder="Enter Function Date.." data-plugin-options='
										{"autoclose": true, "todayHighlight": true, "format": "dd-M-yyyy"}' name="f_date" /> 
										<span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                    </div>
								</div>
								
								<div class="col-md-3 mb-3">
									<div class="form-group">
									<label for="validationServer01">Select Function Time</label>
                                        <div class="input-group clockpicker">
                                            <input type="text" class="form-control" name="f_time" placeholder="Function Time" data-masked-input="99:99" id="sampleClockPicker1"> <span class="input-group-addon"><span class="material-icons list-icon">watch_later</span></span>
                                        </div>
                                        <!-- /.input-group -->
                                    </div>
								</div>
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">No of DSLR</label>
									<input type="text" id="dslr" class="form-control" name="dslr" placeholder="DSLR"  tabindex="4"  />
								</div>
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">Rate of DSLE</label>
									<input type="text" id="pcam" class="form-control" name="pdslr" placeholder="Rate DSLR"  tabindex="5" />
								</div>
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">No of CAMERA</label>
									<input type="text" id="cam" class="form-control" name="cam" placeholder="Camera"  tabindex="6"  />
								</div>
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">Rate of Camera</label>
									<input type="text" id="pdslr" class="form-control" name="pcam" placeholder="Rate Camera"  tabindex="7"  />
								</div>
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">No of VIDEO CAM</label>
									<input type="text" id="vid" class="form-control" name="vid" placeholder="Video Camera"  tabindex="8" />
								</div>
								
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">Rate of VIDEO CAM</label>
									<input type="text" id="pvid" class="form-control" name="pvid" placeholder="Rate Video"  tabindex="9" />
									<input type="hidden" value="M" name="txtvalue" />
								</div>
								
							</div>
							
							<div class="form-actions">
                                <div class="form-group row"  style="float:right;">
                                    <div class="col-md-12 ml-md-auto btn-list">
                                        <button class="btn btn-primary" type="submit" name="btnMInsert">Submit</button>
                                        <?php
										if(isset($_SESSION['function']))
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