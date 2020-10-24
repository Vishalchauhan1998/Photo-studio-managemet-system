<?php 
	include "header.php"; 			
	if(isset($_GET['edt_id']))
	{
		$query = mysql_query("SELECT * FROM album_mst WHERE ALBUM_ID = '".$_GET['edt_id']."'");
		$row = mysql_fetch_array($query);
?>		
		<main class="main-wrapper clearfix">
			<!-- Page Title Area -->
				<div class="row page-title clearfix">
					<div class="page-title-left">
						<h5 class="mr-0 mr-r-5">Edit Customer Details</h5>
					</div>
						<!-- /.page-title-left -->
					<div class="page-title-right d-inline-flex">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Edit Customer</li>
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
									Update Album Details Here....
								</h3>
								
									<br /><br />
									<form method="POST" action="album_save.php">
										<div class="row mr-b-50">
											<div class="col-md-4 mb-3">
												<label for="validationServer01">Year</label>
												<select name="year_id" id="year_id" class="form-control" required>
													<option selected="selected" disabled="disabled"> Select Year</option>
													<?php
														$query = mysql_query("SELECT * FROM year_mst");
														while($year = mysql_fetch_array($query))
														{
													?>	
														<option value="<?php echo $year['YEAR_ID'];?>" <?php if($row['YEAR'] ==  $year['YEAR_ID']) { echo 'selected="selected"'; } ?>><?php echo $year['YEAR'];?></option>
													<?php
														}
													?>
												</select>
											</div>
											
											<div class="col-md-4 mb-3">
												<label for="validationServer01">Album Date</label>
												<input type="text" class="form-control datepicker" value="<?php echo $row['ALBUM_DATE']?>" id="cust_a" name="album_date" required />
											</div>
											
											<div class="col-md-4 mb-3">
												<label for="validationServer01">Album Names</label>
												<input type="text" class="form-control" value="<?php echo $row['ALBUM_NAME']?>" name="album_name" />
												<input type="hidden" class="form-control" value="<?php echo $row['ALBUM_ID']?>" name="album_id" />
											</div>
										</div>
										<div class="form-actions">
											<div class="form-group row"  style="float:right;">
												<div class="col-md-12 ml-md-auto btn-list">
													<button class="btn btn-primary" type="submit" name="btnUpdate">Update Data</button>
													<a href="view_album_details.php" class="btn btn-outline-default" >Cancel</a>
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
	<div id="snackbar">
		<i class="fa fa-check" style="color:#00CC66;"></i> RECORD ADDED SUCCESSFULLY !!!
	</div>
	
	<div id="bar">
		<i class="fa fa-fw fa-warning" style="color:#FF3333;"></i> ERROR!!! PLEASE TRY AGAIN....
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
		?>
		
		<main class="main-wrapper clearfix">
				<!-- Page Title Area -->
					<div class="row page-title clearfix">
						<div class="page-title-left">
							<h5 class="mr-0 mr-r-5">Add Album Details</h5>
						</div>
							<!-- /.page-title-left -->
						<div class="page-title-right d-inline-flex">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Add Album</li>
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
										Enter Album Details Here....
										<font style="float:right"> <a href="view_album_details.php">View Album Details</a> </font>
									</h3>
									
										<br /><br />
										<form method="POST" action="album_save.php">
										<div class="row mr-b-50">
											<div class="col-md-4 mb-3">
												<label for="validationServer01">Year</label>
												<select name="year_id" id="year_id" class="form-control" required>
													<option selected="selected" disabled="disabled"> Select Year</option>
													<?php
														$query = mysql_query("SELECT * FROM year_mst");
														while($year = mysql_fetch_array($query))
														{
													?>	
														<option value="<?php echo $year['YEAR_ID']?>"><?php echo $year['YEAR']?></option>
													<?php
														}
													?>
												</select>
											</div>
											
											<div class="col-md-4 mb-3">
												<label for="validationServer01">Album Date</label>
												<input type="text" class="form-control datepicker" placeholder="Select Date" id="cust_a" name="album_date" required />
											</div>
											
											<div class="col-md-4 mb-3">
												<label for="validationServer01">Album Names</label>
												<input type="text" class="form-control" placeholder="Enter Album Name" name="album_name" />
											</div>
										</div>
										<div class="form-actions">
											<div class="form-group row"  style="float:right;">
												<div class="col-md-12 ml-md-auto btn-list">
													<button class="btn btn-primary" type="submit" name="btnInsert">Insert Data</button>
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
<?php 
	include "footer.php";
	}
?>