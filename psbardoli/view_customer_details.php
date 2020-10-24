<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
		<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Display Customer Details</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">View Customer</li>
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
									List of Customer....
									<font style="float:right"> <a href="insert_customer_details.php">Add Customer Details</a> </font>
								</h3>
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                <table class="table table-striped table-responsive" data-toggle="datatables">
                                    <thead>
                                        <tr>
											<th>Sr No</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Contact No</th>
											<th>Email</th>
											<th>Action</th>
										</tr>
                                    </thead>
                                    <tbody>
										<?php
											$counter = 0;
							 				$query = mysql_query("select * from customer_details");
											while($row = mysql_fetch_array($query))
											{		
										?>
										<tr>
                                            <td><?php echo ++$counter; ?></td>
                                            <td><?php echo $row['CUSTOMER_NAME']; ?></td>
                                            <td><?php echo $row['CUSTOMER_ADDRESS']; ?></td>
                                            <td><?php echo $row['CUSTOMER_CONTACT']; ?></td>
											<td><?php echo $row['CUSTOMER_EMAIL']; ?></td>
											<td>
												<!--<a class="btn btn-success"><i class="fa fa-search"></i></a>-->
												<a class="btn btn-danger" href="cust_save.php?delid=<?php echo $row['CUSTOMER_ID'] ?>" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a>
												<a class="btn btn-info" href="insert_customer_details.php?edtid=<?php echo $row['CUSTOMER_ID'] ?>"  onclick="return confirm('Are you sure you want to Edit?')"><i class="fa fa-pencil"></i></a>
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