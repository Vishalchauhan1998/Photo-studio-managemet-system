<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
		<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Accessories Details</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Accessories Order</li>
				</ol>
			</div>
		</div>
     <!-- /.page-title-right -->
			<div class="widget-list">
			<div class="row">
                 <div class="col-md-12 widget-holder">
					<div class="widget-bg">
						<div class="widget-body clearfix">
						<h3 class="box-title mr-b-0">
							Enter Accessories Order Details Here....
							<font style="float:right"> <a href="view_outdoor_order.php">View Accessories Details</a> </font>
						</h3>
							<br /><br />
							
							<form method="POST" action="accessories_save.php">
							<?php
								if(isset($_SESSION['asc_cust']))
								{
							?>
						
							<div class="row mr-b-50">
								
								<div class="col-md-2 mb-3">
									<input type="hidden" />
								</div>
								
								<div class="col-md-4 mb-3">
									<?php 
										$query = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$_SESSION['asc_cust']."'");
										$ra = mysql_fetch_array($query);
									?>
									<input type="text" value="<?php echo $ra['CUSTOMER_NAME'];?>" class="form-control" readonly="" />
									<input type="hidden" value="<?php echo $_SESSION['asc_cust'];?>" class="form-control" name="cust" />
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" value="<?php echo $_SESSION['asc_date'];?>" class="form-control" name="date" readonly="" />							
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" value="<?php echo $_SESSION['asc_orderid'];?>" class="form-control" name="orderid" readonly="" />
									<input type="hidden" value="<?php echo $_SESSION['asc_order'];?>" class="form-control" name="order" readonly="" />
								</div>
																
								<div class="col-md-1 mb-3">
									<input type="hidden" />
								</div>
							</div>
							
							<div class="row mr-b-50">	
								<div class="col-md-1 mb-3">
									<input type="hidden" />
								</div>
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Select Accessories</label>
									<select class="form-control" name="asc" required>
										<option selected="selected" disabled="disabled"> Select Accessories Name </option>
										<?php
											$query_city = mysql_query("SELECT * FROM accessories_details");
											while($row_city = mysql_fetch_array($query_city))
											{
										?>
										<option value="<?php echo $row_city['ASC_ID'];?>"><?php echo $row_city['ASC_NAME'];?></option>
										<?php
											}
										?>
									</select>
								</div>
								
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Qty</label>
									<input type="text" class="form-control" placeholder="Number of Accessories" name="qty"	required />
								</div>
								
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Rate of Accessories</label>
									<input type="text" class="form-control" placeholder="Rate of Accessories" name="rate" required />
								</div>
								<div class="col-md-1 mb-3">
									<input type="hidden" />
								</div>
							</div>
							
							<?php
								}
								else
								{
							?>	
							<form method="POST" action="accessories_save.php">
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
										<option value="<?php echo $row_city['CUSTOMER_ID'];?>"><?php echo $row_city['CUSTOMER_NAME'];?></option>
										<?php
											}
										?>
									</select>
								</div>
								
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Select Accessories</label>
									<select class="form-control" name="asc" required>
										<option selected="selected" disabled="disabled"> Select Accessories Name </option>
										<?php
											$query_city = mysql_query("SELECT * FROM accessories_details");
											while($row_city = mysql_fetch_array($query_city))
											{
										?>
										<option value="<?php echo $row_city['ASC_ID'];?>"><?php echo $row_city['ASC_NAME'];?></option>
										<?php
											}
										?>
									</select>
								</div>
								
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Select Order Date</label>
									<div class="input-group">
										<input type="text" class="form-control datepicker" placeholder="Select Booking Date.." data-plugin-options='
										{"autoclose": true, "todayHighlight": true, "format": "dd-M-yyyy"}' name="date" /> 
										<span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                    </div>
								</div>
								
								<div class="col-md-1 mb-3">
									<label for="validationServer01">Qty</label>
									<input type="text" class="form-control" placeholder="Q" name="qty"	required />
								</div>
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">Rate of Accessories</label>
									<input type="text" class="form-control" placeholder="Rate" name="rate" required />
								</div>
							</div>
							<?php
								}
							?>
							<div class="form-actions">
                                <div class="form-group row"  style="float:right;">
                                    <div class="col-md-12 ml-md-auto btn-list">
										<?php
											if(isset($_SESSION['asc_cust']))
											{
										?>
                                        <button class="btn btn-primary" type="submit" name="btnAccess">Submit</button>
                                        <a href="asc_logout.php" class="btn btn-info" type="button"> Change Customer </a>
										<?php
											}
											else
											{
										?>
										
                                        <button class="btn btn-primary" type="submit" name="btnAccess">Submit</button>
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
			</div>
	</div>
		<?php
			if(isset($_SESSION['asc_cust']))
			{
		?>
		<div class="widget-list">
			<div class="row">
				<div class="col-md-12 widget-holder">
					<div class="widget-bg">
					   <center>
						<h1 class="text-danger m-b-0 m-t-0" style="font-weight:bold;"><?php echo $ra['CUSTOMER_NAME'] ?></h1>
						</center>
						<br />
						
						<font class="text-danger m-b-0 m-t-0"  style="float:right; font-weight:bold;">Order Id :	<?php echo $_SESSION['asc_orderid'] ?></font>
						<font class="text-danger m-b-0 m-t-0"  style="float:left; font-weight:bold;">Contact No :	<?php echo $ra['CUSTOMER_CONTACT'] ?></font>
						<br />
						<br />
						
						<div class="widget-body clearfix">
						<form method="POST" action="">
						<table class="table table-striped table-responsive" data-toggle="datatables">
							<thead>
								<tr>
									<th class="text-left"><strong>Order Id</strong></th>
									<th class="text-center"><strong>Accessory Name</strong></th>
									<th class="text-center"><strong>Qty</strong></th>
									<th class="text-center"><strong>Rate</strong></th>
									<th class="text-right"><strong>Total </strong></th>
									<th class="text-right"><strong>Action </strong></th>
								</tr>
							</thead>
							
							<tbody>
								<?php
									$counter = 0;
									$photo_cust = $_SESSION['asc_cust'];
									$orderid = $_SESSION['asc_orderid'];
									$orderdate = $_SESSION['asc_date'];
									$query1 = mysql_query("SELECT * FROM accessories_mst where CUSTOMER_ID = '".$photo_cust."' AND DATE = '".$orderdate."' AND FLAG = '0'");
										
									while($prow = mysql_fetch_array($query1))	
									{
										$query = mysql_query("SELECT * FROM accessories_details WHERE ASC_ID = '".$prow['ASC_ID']."'");
										$arow = mysql_fetch_array($query);
								?>
								<tr>	
									<td><?php echo $prow['ORDER_REF_NO']?></td>
									<td class="text-center"><?php echo $arow['ASC_NAME']?></td>
									<td class="text-center"><?php echo $fqty = $prow['QTY']?></td>
									<td class="text-center"><?php echo $frate = $prow['RATE']?></td>
									<td class="text-right"><?php echo $frate = $prow['TOTAL']?></td>
									<td class="text-center">
										<a class="" href="accessories_details.php?edit_id=<?php echo $prow['ASS_C_ID']; ?>" role="button"><i class="fa fa-edit"></i></a>
										&nbsp;&nbsp;&nbsp;
										<a class="" href="accessories_save.php?del_id=<?php echo $prow['ASS_C_ID']; ?>"><i class="fa fa-trash"></i></a>
									</td>
									
									
								</tr>
								<?php
									}
									
									if(isset($_POST['btnASCInvoice']))
									{
										$auto = "SELECT MAX(cast(BILL_NO as decimal)) BILL_NO FROM accessories_mst";
										if($result = mysql_query($auto))
										{
											$row = mysql_fetch_assoc($result);
											$count = $row['BILL_NO'];
											$count = $count+1;
											
											$code_no = str_pad($count,1,"0",STR_PAD_LEFT);
										}
										
										$billno = $code_no;
										
										echo $query = "UPDATE accessories_mst SET FLAG = '2', BILL_NO ='".$billno."'  WHERE CUSTOMER_ID = '".$_SESSION['asc_cust']."' AND ORDER_REF_NO = '".$_SESSION['asc_orderid']."' AND DATE = '".$_SESSION['asc_date']."'";
										
											
										if(mysql_query($query))
										 {
											header("location:asc_invoice.php?msg=success");
										 }
										 else
										 {
											header("location:asc_invoice.php?msg=Failed");
										 }
									}
								?>
								<tr>
								<td colspan="9">
									<div class="form-actions" style="float:right;">
										<button type="submit" name="btnASCInvoice" class="btn btn-danger" tabindex="8"> 
										Bill Preview </button>
									</div>
								</td>
							</tr>	
							</tbody>
						</table>
						</form>
					   </div>
					</div>
					<!-- /.widget-bg -->
				</div>
				<!-- /.widget-holder -->
          	</div>
		</div>
		<?php
			}
		?>
</main>
<!-- /.main-wrappper -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php"; ?>
