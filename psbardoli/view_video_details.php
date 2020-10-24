<?php include "header.php"; ?>
		<div id="update">
			<i class="fa fa-check" style="color:#00CC66;"></i> RECORD UPDATED SUCCESSFULLY !!!
		</div>
		
		<div id="delete">
			<i class="fa fa-close" style="color:#00CC66;"></i> RECORD DELETED SUCCESSFULLY !!!
		</div>
		
		<div id="fail">
			<i class="fa fa-fw fa-warning" style="color:#FF3333;"></i> ERROR!!! PLEASE TRY AGAIN....
		</div>
		
		<?php
			if(!empty($_GET['msg']))
			{
				$msg = $_GET['msg'];
				if($msg == "Updated")
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
		?>
	<script src="jquery.js"></script>
	<script src="mediaelement-and-player.min.js"></script>
	<link rel="stylesheet" href="mediaelementplayer.css" />
<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
		<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Display Video Details</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">View Video</li>
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
									List of Video....
									<font style="float:right"> <a href="video.php">Add Video Details</a> </font>
								</h3>
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
								<table class="table table-striped table-responsive" data-toggle="datatables">
									<thead>
										<tr>
											<th>Id</th>
											<th>Image</th>
											<th>Video</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$counter = 0;
											$query = mysql_query("select * from video_mst");
											while($row = mysql_fetch_array($query))
											{		
										?>
										<tr>
											<td><?php echo ++$counter; ?></td>
											<td><img src="<?php echo $row['IMAGE']; ?>" width="100px;" height="100px;"  /></td>
											<td><?php echo $row['VIDEO']; ?></td>
											<td><?php echo $row['DESCRIPTION']; ?></td>
											<td>
												<?php /*?><a class="btn btn-info" href="video.php?edt_id=<?php echo $row['VIDEO_ID']?>" 
												onclick="return confirm('Are You Sure You Want to Edit?');">
													<i class="fa fa-edit"></i>
												</a><?php */?>
												
												<a href="video_save.php?del_id=<?php echo $row['VIDEO_ID'] ?>" class="btn btn-danger" role="button" title="Delete Data"
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
  <script>
    var player = new MediaElementPlayer('#player1');
</script>