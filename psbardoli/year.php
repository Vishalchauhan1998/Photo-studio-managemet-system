<?php include "header.php"; ?>
	<div id="snackbar">
		<i class="fa fa-check" style="color:#00CC66;"></i> SUCCESS!!! Data Inserted Successfully...
	</div>
	
	<div id="snack">
		<i class="fa fa-close" style="color:#FF3333;"></i> REMOVED!!! Data Deleted Successfully...
	</div>
	
	<div id="bar">
		<i class="fa fa-fw fa-warning" style="color:#FFCC33;"></i> ERROR!!! PLEASE TRY AGAIN....
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
						document.getElementById("snackbar").style.visibility = "hidden";
					 }
			
					 document.getElementById("snackbar").style.visibility = "visible";
					 window.setTimeout("hideMsg()", 4000);
				   </script>';
		 		} 
				else if($msg == "Deleted")
				{
					echo '
				   <script type="text/javascript">
					 function hideMsg()
					 {
						document.getElementById("snack").style.visibility = "hidden";
					 }
			
					 document.getElementById("snack").style.visibility = "visible";
					 window.setTimeout("hideMsg()", 4000);
				   </script>';
				}
				else
				{
					echo '
				   <script type="text/javascript">
					 function hideMsg()
					 {
						document.getElementById("bar").style.visibility = "hidden";
					 }
			
					 document.getElementById("bar").style.visibility = "visible";
					 window.setTimeout("hideMsg()", 4000);
				   </script>';
				}
			} 

	if(isset($_GET['edt_id']))
	{
		$query = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$_GET['edt_id']."'");
		$row = mysql_fetch_array($query);
?>
		<main class="main-wrapper clearfix">
			<!-- Page Title Area -->
				<div class="row page-title clearfix">
					<div class="page-title-left">
						<h5 class="mr-0 mr-r-5">Edit Year Details</h5>
					</div>
						<!-- /.page-title-left -->
					<div class="page-title-right d-inline-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Edit Year</li>
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
									Update Year Details Here....
								</h3>
								
									<br /><br />
									<form method="POST" action="cust_save.php">
									<div class="row mr-b-50">
										<div class="col-md-4 mb-3">
											<label for="validationServer01">Enter Year </label>
											<input type="text" class="form-control" placeholder="Enter Customer Name" name="cust_name" value="<?php echo $row['CUSTOMER_NAME'] ?>" /><input type="hidden" value="<?php echo $row['CUSTOMER_ID']?>" name="custid" />
										</div>
										
										<div class="col-md-4 mb-3">
											<label for="validationServer01">Phone Number</label>
											<input type="text" class="form-control" placeholder="Enter Phone Number" name="phno" value="<?php echo $row['CUST_PH_NO'] ?>"/>
										</div>
										
										
										<div class="col-md-4 mb-3">
											<label for="validationServer01"> Priority </label>
											<select name="prio" class="form-control" required>
												<option selected="selected" disabled="disabled"> Select Priority </option>
												<option value="AMC" <?php if($row['PRIORITY'] == "AMC") { echo 'selected="selected"'; } ?>> AMC </option>
												<option value="High" <?php if($row['PRIORITY'] == "High") { echo 'selected="selected"'; } ?>> High </option>
												<option value="Low" <?php if($row['PRIORITY'] == "Low") { echo 'selected="selected"'; } ?>> Low </option>
											</select>
										</div>
										
										<div class="col-md-12 mb-3">
											<label for="validationServer01">Address</label>
											<textarea class="form-control" name="cust_add"><?php echo $row['ADDRESS'] ?></textarea>
										</div>
									</div>
									
									<div class="form-actions">
										<div class="form-group row"  style="float:right;">
											<div class="col-md-12 ml-md-auto btn-list">
												<button class="btn btn-primary" type="submit" name="btnUpdate">Update Data</button>
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
		</main>
		<!-- /.main-wrappper -->
		<?php include "footer.php"; ?>
<?php
	}
	else
	{
?>
		<main class="main-wrapper clearfix">
				<!-- Page Title Area -->
					<div class="row page-title clearfix">
						<div class="page-title-left">
							<h5 class="mr-0 mr-r-5">Add Year Details</h5>
						</div>
							<!-- /.page-title-left -->
						<div class="page-title-right d-inline-flex">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Insert Year</li>
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
											Enter Year Details Here....
										</h3>
										
											<br /><br />
											<form method="POST" action="year_save.php">
											<div class="row mr-b-50">
												<div class="col-md-6 mb-3">
													<label for="validationServer01">Year</label>
													<input type="text" class="form-control" placeholder="Enter Year" name="year" />
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
					</div>
				<!-- /.page-title -->
				
				<div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h3 class="box-title mr-b-0">
									List of Year....
								</h3>
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
								<table class="table table-striped table-responsive" data-toggle="datatables">
									<thead>
										<tr>
											<th>Id</th>
											<th>Year</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$counter = 0;
											$query = mysql_query("select * from year_mst");
											while($row = mysql_fetch_array($query))
											{	
										?>
										<tr>
											<td><?php echo ++$counter; ?></td>
											<td><?php echo $row['YEAR']?></td>
											<td>
												<a href="year_save.php?del_id=<?php echo $row['YEAR_ID'] ?>" class="btn btn-danger" role="button" title="Delete Data"
												onclick="return confirm('Are You Sure You Want to Delete <?php echo $row['YEAR']?>?');">
													<i class="fa fa-trash"></i>
												</a>
											</td>
										</tr>
										<?php 
											}
										?>
									</tbody>
								</table>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
     		</div>
			</main>
		<!-- /.main-wrappper -->
		<?php include "footer.php"; ?>
		<script type="text/javascript">
		$('#cust_a').keyup(function(){
			$('#cust_b').val(this.value);
		});
		</script>
<?php
	}
?>