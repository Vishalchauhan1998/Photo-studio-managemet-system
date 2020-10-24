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
								if(isset($_GET['edit_id']))
								{
									$query = mysql_query("SELECT * FROM accessories_mst WHERE ASS_C_ID = '".$_GET['edit_id']."'");
									$r_row = mysql_fetch_array($query);
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
									<input type="text" value="<?php echo $_SESSION['asc_orderid'];?>" class="form-control" readonly="" />
									<input type="hidden" value="<?php echo $_SESSION['asc_order'];?>" class="form-control" name="orderid" readonly="" />
								</div>
																
								<div class="col-md-2 mb-3">
									<input type="hidden" />
								</div>
								
								<div class="col-md-1 mb-2"></div>
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Select Accessories</label>
									<select class="form-control" name="asc" required>
										<option selected="selected" disabled="disabled"> Select Accessories Name </option>
										<?php
											$query_city = mysql_query("SELECT * FROM accessories_details");
											while($row_city = mysql_fetch_array($query_city))
											{
										?>
										<option value="<?php echo $row_city['ASC_ID'];?>" <?php if($r_row['ASC_ID'] == $row_city['ASC_ID']) { echo 'selected="selected"';} ?>><?php echo $row_city['ASC_NAME'];?></option>
										<?php
											}
										?>
									</select>
								</div>
								
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Qty</label>
									<input type="text" class="form-control" value="<?php echo $r_row['QTY']?>" name="qty"	required />
								</div>
								
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Rate of Accessories</label>
									<input type="text" class="form-control" value="<?php echo $r_row['RATE']?>" name="rate" required />
									<input type="hidden" name="edtid" value="<?php echo $r_row['ASS_C_ID'];?>"  />
								</div>
								
								<div class="col-md-1 mb-2"></div>
							</div>
							
							<div class="form-actions"  style="float:right;">
                                <div class="form-group row">
                                    <div class="col-md-12 ml-md-auto btn-list">
										
                                        <button class="btn btn-primary" type="submit" name="btnEAccess">Submit</button>
										<button class="btn btn-outline-default" type="reset">Cancel</button>
										
                                    </div>
                                </div>
                            </div>
							<?php
								}
							?>
							</form>
						</div>
					</div>
				</div>
			</div>
	</div>
</main>
<!-- /.main-wrappper -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php"; ?>
