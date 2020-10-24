<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
		<div class="row page-title clearfix">
			<div class="page-title-left">
				<?php
					if(isset($_GET['edtid']))
					{
				?>
				<h5 class="mr-0 mr-r-5">Update type Details</h5>
				<?php
					}
					else
					{
				?>
				<h5 class="mr-0 mr-r-5">Type Details</h5>
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
                    <li class="breadcrumb-item active">Update Type details</li>
					<?php
						}
						else
						{
					?>
					<li class="breadcrumb-item active">Type Details</li>
					<?php
						}
					?>
				
				</ol>
			</div>
		</div>
		<div class="widget-list">
			<?php
				if(isset($_GET['edtid']))
				{
					$query = mysql_query("SELECT * FROM type_mst WHERE TYPE_ID = '".$_GET['edtid']."'");
					$q = mysql_fetch_array($query);
			?>
			<div class="row">
				<div class="col-md-12 widget-holder">
					<div class="widget-bg">
						<div class="widget-body clearfix">
						<h3 class="box-title mr-b-0">
							Update Type Details Here....
						</h3>
						
							<br /><br />
							<form method="POST" action="type_save.php">
							<div class="row mr-b-50">
								<div class="col-md-8 mb-3">
									<label for="validationServer01">Type Name</label>
									<input type="hidden" name="txtid" value="<?php echo $_GET['edtid']?>" >
									<input type="text" class="form-control" value="<?php echo $q['TYPE_NAME'] ?>" name="type_name" required />
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
		<!-- /.page-title-right -->
		<div class="row">
			<div class="col-md-12 widget-holder">
				<div class="widget-bg">
					<div class="widget-body clearfix">
						<h3 class="box-title mr-b-0">
							Enter Type Details Here....
						</h3>
						<br /><br />
						<form method="POST" action="type_save.php">
							<div class="row mr-b-50">
								<div class="col-md-8 mb-3">
									<label for="validationServer01">Type Name</label>
									<input type="text" class="form-control" placeholder="Enter Type Name" name="type_name" required />
								</div>
							</div>
							
							<div class="form-actions">
                                <div class="form-group row"  style="float:right;">
                                    <div class="col-md-12 ml-md-auto btn-list">
                                        <button class="btn btn-primary" type="submit" name="btnSubmit">Submit</button>
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
		
		<div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h3 class="box-title mr-b-0">
									List of Type....	
								</h3>
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                <table class="table table-striped table-responsive" data-toggle="datatables">
                                    <thead>
                                        <tr>
											<th>Id</th>
                                            <th>TYPE</th>
											<th>Action</th>
										</tr>
                                    </thead>
                                     <tbody>
										    <?php
											$counter = 0;
							 				$query = mysql_query("select * from type_mst");
											while($row = mysql_fetch_array($query))
											{	
										    ?>
                                            <tr>
                                                <td><?php echo ++$counter; ?></td>
                                                <td><?php echo $row['TYPE_NAME']; ?></td>
												<td>
													<a class="btn btn-info" href="insert_type.php?edtid=<?php echo $row['TYPE_ID'] ?>"  onclick="return confirm('Are you sure you want to Edit?')"><i class="fa fa-pencil"></i></a>
												    <a class="btn btn-danger" href="type_save.php?delid=<?php echo $row['TYPE_ID'] ?>" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a>
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
</main>
<!-- /.main-wrappper -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php"; ?>
