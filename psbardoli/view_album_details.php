<link href="admin/cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="assets/css/main.css" type="text/css" />
<?php include "header.php"; ?>
		<div id="snackbar">
			<i class="fa fa-check" style="color:#00CC66;"></i> RECORD UPDATED SUCCESSFULLY !!!
		</div>
		
		<div id="snack">
			<i class="fa fa-close" style="color:#FF3300;"></i> RECORD DELETED SUCCESSFULLY !!!
		</div>
		
		<div id="bar">
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
<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
		<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Display Album Details</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">View Album</li>
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
									List of Album....
									<font style="float:right"> <a href="album.php">Add Album Details</a> </font>
								</h3>
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
								<table class="table table-striped table-responsive" data-toggle="datatables">
									<thead>
										<tr>
											<th>Id</th>
											<th>Year</th>
											<th>Album Date</th>
											<th>Album Name</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$counter = 0;
											$query = mysql_query("select * from album_mst");
											while($row = mysql_fetch_array($query))
											{	
												$year = mysql_query("select * from year_mst WHERE YEAR_ID = '".$row['YEAR']."'");	
												$y = mysql_fetch_array($year);
										?>
										<tr>
											<td><?php echo ++$counter; ?></td>
											<td><?php echo $y['YEAR']?></td>
											<td><?php echo $row['ALBUM_DATE']; ?></td>
											<td><?php echo $row['ALBUM_NAME']; ?></td>
											<td>
												<a class="btn btn-info" href="album.php?edt_id=<?php echo $row['ALBUM_ID']?>" 
												onclick="return confirm('Are You Sure You Want to Edit <?php echo $row['ALBUM_DATE']." - ". $row['ALBUM_NAME']?>?');">
													<i class="fa fa-edit"></i>
												</a>
												
												<a href="album_save.php?del_id=<?php echo $row['ALBUM_ID'] ?>" class="btn btn-danger" role="button" title="Delete Data"
												onclick="return confirm('Are You Sure You Want to Delete <?php echo $row['ALBUM_DATE']." - ". $row['ALBUM_NAME']?>?');">
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