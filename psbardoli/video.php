<?php include "header.php"; ?>
	<div id="insert">
		<i class="fa fa-check" style="color:#00CC66;"></i> RECORD ADDED SUCCESSFULLY !!!
	</div>
	
	<div id="fail">
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
			<main class="main-wrapper clearfix">
				<!-- Page Title Area -->
					<div class="row page-title clearfix">
						<div class="page-title-left">
							<h5 class="mr-0 mr-r-5">Add Video Details</h5>
						</div>
							<!-- /.page-title-left -->
						<div class="page-title-right d-inline-flex">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Insert Video Details</li>
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
											Enter Video Details Here....
											<font style="float:right"> <a href="view_video_details.php">View Video Details</a> </font>
										</h3>
										
											<br /><br />
											<form method="POST" action="video_save.php" enctype="multipart/form-data">
											<div class="row mr-b-50">
												<div class="col-md-4 mb-3">
													<label for="validationServer01">Enter Video URL</label>
													<input class="form-control" placeholder ="Enter URL of Video" type="url" name="video_name" required>
												</div>
											
												<div class="col-md-4 mb-3">
													<label>Select Image</label>
													<input class="form-control" type="file" name="image_name" accept="image/gif, image/jpeg, image/jpg" required>
												</div>
												
												<div class="col-md-12 mb-3">
													<label for="validationServer01">Description</label>
													<textarea class="form-control" placeholder="Enter Description Here..." name="video_desc"></textarea>
												</div>
											</div>
										
											<div class="form-actions">
												<div class="form-group row"  style="float:right;">
													<div class="col-md-12 ml-md-auto btn-list">
														<input type="submit" class="btn btn-primary" name="btnInsert">
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
			</main>
		<!-- /.main-wrappper -->
<?php include "footer.php"; ?>