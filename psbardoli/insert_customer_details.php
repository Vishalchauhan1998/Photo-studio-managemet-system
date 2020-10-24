<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
		<div class="row page-title clearfix">
			<div class="page-title-left">
				<?php
					if(isset($_GET['edtid']))
					{
				?>
				<h5 class="mr-0 mr-r-5">Update Customer Details</h5>
				<?php
					}
					else
					{
				?>
				<h5 class="mr-0 mr-r-5">Add Customer Details</h5>
				<?php
					}
				?>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
					<?php
						if(isset($_GET['edtid']))
						{
					?>
                    <li class="breadcrumb-item active">Update Customer</li>
					<?php
						}
						else
						{
					?>
					<li class="breadcrumb-item active">Insert Customer</li>
					<?php
						}
					?>
				</ol>
			</div>
		</div>
	
	 <div id="insert">
		<i class="fa fa-check" style="color:#28CC49;"></i> Success!!!  Data Inserted Success....
	</div>
	
	<div id="fail">
		<i class="fa fa-close" style="color:#F71818;"></i> Failed!!!  Data Inserted Unsuccess....
	</div>
		
		<?php
			if(!empty($_GET['msg']))
			{
				$msg = $_GET['msg'];
				if($msg == "Inserted")
				{
					echo '
				   <script type="text/javascript">
					 function hideMsg()
					 {
						document.getElementById("insert").style.visibility = "hidden";
					 }
			
					 document.getElementById("insert").style.visibility = "visible";
					 window.setTimeout("hideMsg()", 4000);
				   </script>';
				}
				else
				{
					echo '
				   <script type="text/javascript">
					 function hideMsg()
					 {
						document.getElementById("fail").style.visibility = "hidden";
					 }
			
					 document.getElementById("fail").style.visibility = "visible";
					 window.setTimeout("hideMsg()", 4000);
				   </script>';
				}
			} 
?>
	 <!-- /.page-title-right -->
			<div class="widget-list">
			<?php
				if(isset($_GET['edtid']))
				{
					$query = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$_GET['edtid']."'");
					$q = mysql_fetch_array($query);
			?>
			<!-- Update -->
			<div class="row">
				<div class="col-md-12 widget-holder">
					<div class="widget-bg">
						<div class="widget-body clearfix">
						<h3 class="box-title mr-b-0">
							Update Customer Details Here....
							<font style="float:right"> <a href="view_customer_details.php">View Customer Details</a> </font>
						</h3>
						
							<br /><br />
							<form method="POST" action="cust_save.php">
							<div class="row mr-b-50">
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Customer Name</label>
									<input type="hidden" name="txtid" value="<?php echo $_GET['edtid']?>" >
									<input type="text" class="form-control" value="<?php echo $q['CUSTOMER_NAME'] ?>" name="cust_name" required />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Email Address</label>
									<input type="email" class="form-control" value="<?php echo $q['CUSTOMER_EMAIL'] ?>" name="email_add" required />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Mobile Number</label>
									<input type="text" class="form-control" value="<?php echo $q['CUSTOMER_CONTACT'] ?>" name="mob_no"	required />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">City</label>
									<input type="text" class="form-control" value="<?php echo $q['CITY_NAME'] ?>" name="city" required />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Facebook Username</label>
									<input type="text" class="form-control" value="<?php echo $q['CUSTOMER_FB_NAME'] ?>" name="fbuser" />
								</div>
						
								 <div class="col-md-4 mb-3">
									<label class="form-control-label">Date of Birth</label>
										<div class="input-group">
                                            <input type="text" class="form-control datepicker" value="<?php echo $q['DATEOFBIRTH'] ?>" data-plugin-options='{"autoclose": true, "todayHighlight": true, "format": "dd-M-yyyy"}' name="date" /> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                        </div>
                                        <!-- /.input-group -->
								</div>
								
								<div class="col-md-12 mb-3">
									<label for="validationServer01">Address</label>
									<textarea class="form-control" name="cust_add"><?php echo $q['CUSTOMER_ADDRESS'] ?></textarea>
								</div>
							</div>
							
							<div class="form-actions">
                                <div class="form-group row"  style="float:right;">
                                    <div class="col-md-12 ml-md-auto btn-list">
                                        <button class="btn btn-primary" type="submit" name="btnUpdate">Submit</button>
                                        <button class="btn btn-outline-default" type="reset">Cancel</button>
                                    </div>
                                </div>
                            </div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
				}
				else
				{
			?>
			<!-- Insert -->
			<div class="row">
				<div class="col-md-12 widget-holder">
					<div class="widget-bg">
						<div class="widget-body clearfix">
						<h3 class="box-title mr-b-0">
							Enter Customer Details Here....
							<font style="float:right"> <a href="view_customer_details.php">View Customer Details</a> </font>
						</h3>
						
							<br /><br />
							<form method="POST" action="cust_save.php">
							<div class="row mr-b-50">
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Customer Name</label>
									<input type="text" class="form-control" placeholder="Enter Customer Name" name="cust_name" required />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Email Address</label>
									<input type="email" class="form-control" placeholder="Enter Email Address" name="email_add" required />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Mobile Number</label>
									<input type="text" class="form-control" placeholder="Enter Mobile Number" name="mob_no"	required />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">City</label>
									<input type="text" class="form-control" placeholder="Enter Customer City" name="city" required />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Facebook Username</label>
									<input type="text" class="form-control" placeholder="Enter Facebook Username" name="fbuser" />
								</div>
						
								 <div class="col-md-4 mb-3">
									<label class="form-control-label">Date of Birth</label>
										<div class="input-group">
                                            <input type="text" class="form-control datepicker" placeholder="Select Date of Birth.." data-plugin-options='{"autoclose": true, "todayHighlight": true, "format": "dd-M-yyyy"}' name="date" /> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                        </div>
                                        <!-- /.input-group -->
								</div>
								
								<div class="col-md-12 mb-3">
									<label for="validationServer01">Address</label>
									<textarea class="form-control" placeholder="Enter Address Here..." name="cust_add"></textarea>
								</div>
							</div>
							
							<div class="form-actions">
                                <div class="form-group row"  style="float:right;">
                                    <div class="col-md-12 ml-md-auto btn-list">
                                        <button class="btn btn-primary" type="submit" name="btnInsert">Submit</button>
                                        <button class="btn btn-outline-default" type="reset">Cancel</button>
                                    </div>
                                </div>
                            </div>
							</form>
						</div>
					</div>
				</div>    
			</div>
    <!-- /.page-title -->
			</div>
			<?php
				}
			?>
</main>
<!-- /.main-wrappper -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php"; ?>
