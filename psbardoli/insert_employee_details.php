<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
		<div class="row page-title clearfix">
			<div class="page-title-left">
				<?php
					if(isset($_GET['edtid']))
					{
				?>
				<h5 class="mr-0 mr-r-5">Update Employee Details</h5>
				<?php
					}
					else
					{
				?>
				<h5 class="mr-0 mr-r-5">Add Employee Details</h5>
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
                    <li class="breadcrumb-item active">Update Employee</li>
					<?php
						}
						else
						{
					?>
					<li class="breadcrumb-item active">Insert Employee</li>
					<?php
						}
					?>
				</ol>
			</div>
		</div>
     <!-- /.page-title-right -->
			<div class="widget-list">
			<?php
				if(isset($_GET['edtid']))
				{
					$query = mysql_query("SELECT * FROM employee_details WHERE EMPLOYEE_ID = '".$_GET['edtid']."'");
					$q = mysql_fetch_array($query);
			?>
			<!-- Update -->
			<div class="row">
				<div class="col-md-12 widget-holder">
					<div class="widget-bg">
						<div class="widget-body clearfix">
						<h3 class="box-title mr-b-0">
							Update Employee Details Here....
							<font style="float:right"> <a href="view_employee_details.php">View Employee Details</a> </font>
						</h3>
						
							<br /><br />
							<form method="POST" action="emp_save.php">
							<div class="row mr-b-50">
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Employee Name</label>
									<input type="hidden" name="txtid" value="<?php echo $_GET['edtid']?>" >
									<input type="text" class="form-control" value="<?php echo $q['EMPLOYEE_NAME'] ?>" name="emp_name" required />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Email Address</label>
									<input type="email" class="form-control" value="<?php echo $q['EMAIL_ID'] ?>" name="email_add" required />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Mobile Number</label>
									<input type="text" class="form-control" value="<?php echo $q['CONTACT_NO'] ?>" name="mob_no"	required />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">City</label>
									<input type="text" class="form-control" value="<?php echo $q['CITY_NAME'] ?>" name="city" required />
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
									<textarea class="form-control" name="emp_add"><?php echo $q['ADDRESS'] ?></textarea>
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
			<?php
				}
				else
				{
			?>
		</div>
	<!--- Insert -->
	<div class="row">
				<div class="col-md-12 widget-holder">
					<div class="widget-bg">
						<div class="widget-body clearfix">
						<h3 class="box-title mr-b-0">
							Enter Employee Details Here....
							<font style="float:right"> <a href="view_employee_details.php">View Employee Details</a> </font>
						</h3>
						
							<br /><br />
							<form method="POST" action="emp_save.php">
							<div class="row mr-b-50">
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Employee Name</label>
									<input type="text" class="form-control" placeholder="Enter Customer Name" name="emp_name" required />
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
									<label class="form-control-label">Date of Birth</label>
										<div class="input-group">
                                            <input type="text" class="form-control datepicker" placeholder="Select Date of Birth.." data-plugin-options='{"autoclose": true, "todayHighlight": true, "format": "dd-M-yyyy"}' name="date" /> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                        </div>
                                        <!-- /.input-group -->
								</div>
								
								<div class="col-md-12 mb-3">
									<label for="validationServer01">Address</label>
									<textarea class="form-control" placeholder="Enter Address Here..." name="emp_add"></textarea>
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
			<?php
				}
			?>
    <!-- /.page-title -->
</main>
<!-- /.main-wrappper -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php"; ?>
