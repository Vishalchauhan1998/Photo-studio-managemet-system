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
				<h5 class="mr-0 mr-r-5">Sub Type Details</h5>
				<?php
					}
				?>
			
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Sub Type Details</li>
				</ol>
			</div>
		</div>
		<div class="widget-list">
			<?php
				if(isset($_GET['edtid']))
				{
					$query = mysql_query("SELECT * FROM subtype_mst WHERE SUBTYPE_ID = '".$_GET['edtid']."'");
					$q = mysql_fetch_array($query);
			?>
			
		<div class="row">
				<div class="col-md-12 widget-holder">
					<div class="widget-bg">
						<div class="widget-body clearfix">
						<h3 class="box-title mr-b-0">
							Update Subtype Details Here....
						</h3>
						
							<br /><br />
							<form method="POST" action="type_save.php">
							<div class="row mr-b-50">
								<div class="col-md-8 mb-3">
									<label for="validationServer01">Sub Type Name</label>
									<input type="hidden" name="txtid" value="<?php echo $_GET['edtid']?>" >
									<input type="text" class="form-control" value="<?php echo $q['SUBTYPE_NAME'] ?>" name="subtype_name" required />
								</div>
								<div class="col-md-6 mb-3">
									<label for="validationServer01">Select Type Name</label>
									<select class="form-control" id="inlineFormCustomSelect" name="type">
										<option selected="selected" disabled="disabled">Select Type...</option>
										<?php
											$query_type = mysql_query("SELECT * FROM type_mst");
											while($row_type = mysql_fetch_array($query_type))
											{
										?>
										<option value="<?php echo $row_type['TYPE_ID'];?>"><?php echo $row_city['TYPE_NAME'];?></option>
										<?php
											}
										?>
									</select>
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
				else
				{
			?>
     <!-- /.page-title-right -->
			<div class="widget-list">
			<div class="row">
			
				<div class="col-md-12 widget-holder">
					<div class="widget-bg">
						<div class="widget-body clearfix">
						<h3 class="box-title mr-b-0">
							Enter Sub Type Details Here....
						</h3>
						
							<br /><br />
							<form method="POST" action="subtype_save.php">
							<div class="row mr-b-50">
								<div class="col-md-6 mb-3">
									<label for="validationServer01">Enter Sub Type Name</label>
									<input type="text" class="form-control" placeholder="Enter Sub Type Name" name="subtype" required />
								</div>
								
								<div class="col-md-6 mb-3">
									<label for="validationServer01">Select Type Name</label>
									<select class="form-control" id="inlineFormCustomSelect" name="type">
										<option selected="selected" disabled="disabled">Select Type...</option>
										<?php
											$query_city = mysql_query("SELECT * FROM type_mst");
											while($row_city = mysql_fetch_array($query_city))
											{
										?>
										<option value="<?php echo $row_city['TYPE_ID'];?>"><?php echo $row_city['TYPE_NAME'];?></option>
										<?php
											}
										?>
									</select>
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
									List of Sub Type....	
								</h3>
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                <table class="table table-striped table-responsive" data-toggle="datatables">
                                   <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>TYPE</th>
												<th>SUBTYPE</th>
												<th>Action</th>
											</tr>
                                        </thead>
                                        
                                        <tbody>
										    <?php
											$counter = 0;
							 				$query = mysql_query("select * from subtype_mst");
											while($row = mysql_fetch_array($query))
											{	
												$query1 = mysql_query("select * from type_mst WHERE TYPE_ID = '".$row['TYPE_ID']."'");
												$row1 = mysql_fetch_array($query1);
										    ?>
                                            <tr>
                                                <td><?php echo ++$counter; ?></td>
                                                <td><?php echo $row1['TYPE_NAME']; ?></td>
												<td><?php echo $row['SUBTYPE_NAME']; ?></td>
												<td>
													<a class="btn btn-info" href="insert_sub_type.php?edtid=<?php echo $row['TYPE_ID'] ?>"  onclick="return confirm('Are you sure you want to Edit?')"><i class="fa fa-pencil"></i></a>
													<a class="btn btn-danger" href="subtype_save.php?delid=<?php echo $row['TYPE_ID'] ?>" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a>
													
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
