<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
		<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Accessories Detaiks</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Accessories Details</li>
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
							Enter Accessories Details Here....
						</h3>
						
							<br /><br />
							<form method="POST" action="accessories_save.php">
							<div class="row mr-b-50">
								<div class="col-md-8 mb-3">
									<label for="validationServer01">Accessories Name</label>
									<input type="text" class="form-control" placeholder="Enter Accessories Name" name="a_name" required />
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
    <!-- /.page-title -->
		
		<div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h3 class="box-title mr-b-0">
									List of Accessories....	
								</h3>
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                <table class="table table-striped table-responsive" data-toggle="datatables">
                                    <thead>
                                        <tr>
											<th>Id</th>
                                            <th>Accessories</th>
										</tr>
                                    </thead>
                                     <tbody>
										    <?php
											$counter = 0;
							 				$query = mysql_query("select * from accessories_details");
											while($row = mysql_fetch_array($query))
											{	
										    ?>
                                            <tr>
                                                <td><?php echo ++$counter; ?></td>
                                                <td><?php echo $row['ASC_NAME']; ?></td>
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
