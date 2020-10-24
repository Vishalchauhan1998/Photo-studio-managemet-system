<?php include "header.php"; ?>
	<link href="http://vjs.zencdn.net/6.4.0/Slider-js.css" rel="stylesheet">
<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
		<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Display Slider Details</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">View Slider</li>
				</ol>
			</div>
		</div>
     <!-- /.page-title-right -->
	<div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h3 class="box-title mr-b-0">
									List of Slider....
									<font style="float:right"> <a href="slider.php">Add Slider Details</a> </font>
								</h3>
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
								<table class="table table-striped table-responsive" data-toggle="datatables">
									<thead>
										<tr>
											<th>Id</th>
											<th>Image</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$counter = 0;
											$query = mysql_query("select * from slider_mst");
											while($row = mysql_fetch_array($query))
											{		
										?>
										<tr>
											<td><?php echo ++$counter; ?></td>
											<td><img src="<?php echo $row['SLIDER_IMAGE']; ?>" width="550px;" height="250px;"  /></td>
											
											<td>
												<a href="slider_save.php?del_id=<?php echo $row['SLIDER_ID'] ?>" class="btn btn-danger" role="button" title="Delete Data"
												onclick="return confirm('Are You Sure You Want to Delete?');">
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
    </div>
<?php include "footer.php"; ?>
  	<script src="http://vjs.zencdn.net/ie8/1.1.2/Sliderjs-ie8.min.js"></script>
	<script src="http://vjs.zencdn.net/6.4.0/Slider.js"></script>