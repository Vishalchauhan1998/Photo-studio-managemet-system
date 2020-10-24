<?php include "header.php"; ?>
		<main class="main-wrapper clearfix">
				<!-- Page Title Area -->
					<div class="row page-title clearfix">
						<div class="page-title-left">
							<h5 class="mr-0 mr-r-5">Add Slider Details</h5>
						</div>
							<!-- /.page-title-left -->
						<div class="page-title-right d-inline-flex">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Insert Slider Details</li>
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
											Enter Slider Details Here....
											<font style="float:right"> <a href="view_slider_details.php">View Slider Details</a> </font>
										</h3>
										
											<br /><br />
											<form method="POST" action="slider_save.php" enctype="multipart/form-data">
											<div class="row mr-b-50">
												<div class="col-md-6 mb-3">
													<label for="validationServer01">Select Slider Image</label>
													<input id="l16" class="form-control" type="file" name="slider">
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
			</main>
		<!-- /.main-wrappper -->
<?php include "footer.php"; ?>