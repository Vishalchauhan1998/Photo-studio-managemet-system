<?php include "header.php"; ?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
		<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Photography Order Details</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Photography Order</li>
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
							Enter Photography Order Details Here....
							<!--<font style="float:right"> <a href="view_outdoor_order.php">View Outdoor Details</a> </font>-->
						</h3>
						
							<br /><br />
							<form method="POST" action="photography_details_save.php">
							<?php
								if(isset($_SESSION['p_photo']))
								{
							?>
							<div class="row mr-b-50">
								
								<div class="col-md-2 mb-3">
									<input type="hidden" />
								</div>
								
								<div class="col-md-4 mb-3">
									<?php 
										$query = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$_SESSION['p_cust']."'");
										$ra = mysql_fetch_array($query);
									?>
									<input type="text" value="<?php echo $ra['CUSTOMER_NAME'];?>" class="form-control" readonly="" />
									<input type="hidden" value="<?php echo $_SESSION['p_cust'];?>" class="form-control" name="cust" />
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" value="<?php echo $_SESSION['p_date'];?>" class="form-control" name="date" readonly="" />							
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" value="<?php echo $_SESSION['p_orderid'];?>" class="form-control" name="orderid" readonly="" />
									<input type="hidden" value="<?php echo $_SESSION['p_order'];?>" class="form-control" name="order" readonly="" />
								</div>
																
								<div class="col-md-2 mb-3">
									<input type="hidden" />
								</div>
								
							</div>
							<?php
								}
								else
								{
							?>
							
							<div class="row mr-b-50">
								
								<div class="col-md-2 mb-3">
									<input type="hidden" />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Select Customer</label>
									<select class="form-control" name="cust" required>
										<option selected="selected" disabled="disabled"> Select Customer Name </option>
										<?php
											$query_city = mysql_query("SELECT * FROM customer_details");
											while($row_city = mysql_fetch_array($query_city))
											{
										?>
										<option value="<?php echo $row_city['CUSTOMER_ID'];?>"><?php echo $row_city['CUSTOMER_NAME'];?></option>
										<?php
											}
										?>
									</select>
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Select Order Date</label>
									<div class="input-group">
										<input type="text" class="form-control datepicker" placeholder="Select Order Date.." data-plugin-options='
										{"autoclose": true, "todayHighlight": true, "format": "dd-M-yyyy"}' name="date" /> 
										<span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                    </div>
								</div>
																
								<div class="col-md-2 mb-3">
									<input type="hidden" />
								</div>
								
							</div>
							<?php
								}
							?>
								
							<!-- Photo Details-->
							<div class="row mr-b-50">
								<div class="col-md-1 mb-3">
									<input type="hidden" class="form-control" name="photouid[]" placeholder="Enter Photo Id" />
								</div>
								
								
								<div class="col-md-3 mb-3">
									<select class="form-control" name="album[]" id="type" required>
										<option selected="selected" disabled="disabled"> Select Type </option>
										<?php
											$query =  mysql_query("SELECT * FROM `type_mst`");
											while($q = mysql_fetch_array($query))
											{
										?>
											<option value="<?php echo $q['TYPE_ID']; ?>"><?php echo $q['TYPE_NAME']; ?></option>
										<?php
											}
										?>
									</select>
								</div>
								
								<div class="col-md-2 mb-3">
									<select class="form-control" name="paper[]" id="stype" required>
										<option selected="selected" disabled="disabled">Select Sub Type </option>
									</select>
								</div>
																
								<div class="col-md-2 mb-3">
									<input type="text" class="form-control" name="asize[]" placeholder="Enter Size" />
								</div>
								
								<div class="col-md-1 mb-3">
									<input type="text" class="form-control" name="aqty[]" placeholder="Qty" />
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" class="form-control" name="arate[]" placeholder="Enter Photo Rate" />
								</div>
							</div>
														
							<div class="form-actions">
                                <div class="form-group row"  style="float:right;">
                                    <div class="col-md-12 ml-md-auto btn-list">
                                        <button class="btn btn-primary" type="submit" name="btnAPhoto">Submit</button>
										<?php
											if(isset($_SESSION['p_photo']))
											{
										?>
                                        <a href="photo_logoutt.php" class="btn btn-info" type="button"> Change Customer </a>
										<?php
											}
											else
											{
										?>
										<button class="btn btn-outline-default" type="reset">Cancel</button>
										
										<?php
											}
										?>
                                    </div>
                                </div>
                            </div>
							</form>
						</div>
					</div>
				</div>
                  
			</div>
		</div>
		
		<?php
			if(isset($_SESSION['p_photo']))
			{
		?>
		<div class="widget-list">
			<div class="row">
				<div class="col-md-12 widget-holder">
					<div class="widget-bg">
					   <center>
						<h1 class="text-danger m-b-0 m-t-0" style="font-weight:bold;"><?php echo $ra['CUSTOMER_NAME'] ?></h1>
						</center>
						<br />
						
						<font class="text-danger m-b-0 m-t-0"  style="float:right; font-weight:bold;">Order Id :	<?php echo $_SESSION['p_orderid'] ?></font>
						<font class="text-danger m-b-0 m-t-0"  style="float:left; font-weight:bold;">Contact No :	<?php echo $ra['CUSTOMER_CONTACT'] ?></font>
						<br />
						<br />
						
						<div class="widget-body clearfix">
						<form method="POST" action="photography_details_save.php">
						<table class="table table-striped table-responsive" data-toggle="datatables">
							<thead>
								<tr>
									<th class="text-left"><strong>Type Name</strong></th>
									<th class="text-left"><strong>SubType Name</strong></th>
									<th class="text-center"><strong>Size</strong></th>
									<th class="text-center"><strong>Qty</strong></th>
									<th class="text-center"><strong>Rate</strong></th>
									<th class="text-right"><strong>Total </strong></th>
									<th class="text-right"><strong>Action </strong></th>
								</tr>
							</thead>
							
							<tbody>
								<?php
									$counter = 0;
									$photo_cust = $_SESSION['p_cust'];
									$orderid = $_SESSION['p_orderid'];
									$orderdate = $_SESSION['p_date'];
									$query1 = mysql_query("SELECT * FROM photography_mst where CUSTOMER_ID = '".$photo_cust."' AND ORDER_ID = '".$orderid."' AND ORDER_DATE = '".$orderdate."' AND FLAG = '0'");
									
									while($prow = mysql_fetch_array($query1))	
									{
										$sel_type = mysql_query("SELECT * FROM type_mst WHERE TYPE_ID = '".$prow['ALBUM_NAME']."'");
										$type = mysql_fetch_array($sel_type);
										
										$sel_stype = mysql_query("SELECT * FROM subtype_mst WHERE SUBTYPE_ID = '".$prow['PAPER_NAME']."'");
										$stype = mysql_fetch_array($sel_stype);
										
								?>
								<tr>
									<td><?php echo $type['TYPE_NAME']?></td>
									<td><?php echo $stype['SUBTYPE_NAME'];?></td>
									<td class="text-center"><?php echo $prow['PHOTO_SIZE']?></td>
									<td class="text-center"><?php echo $pqty = $prow['PHOTO_QTY']?></td>
									<td class="text-center"><?php echo $prate = $prow['PHOTO_RATE']?></td>
									<td class="text-right">
										<?php
											$tot_photo = $pqty * $prate;
											echo $total = $tot_photo;
										?>
									</td>
									
									<td class="text-center">
										<a class="" href="cart_photo_album_details.php?edit_id=<?php echo $prow['PHOTO_ID']; ?>" role="button"><i class="fa fa-edit"></i></a>
										&nbsp;&nbsp;&nbsp;
										<a class="" href="photography_details_save.php?del_ida=<?php echo $prow['PHOTO_ID']; ?>"><i class="fa fa-trash"></i></a>
									</td>
									<input type="hidden" name="cust" value="<?php echo $_SESSION['p_cust'];?>" />
									<input type="hidden" name="order" value="<?php echo $_SESSION['p_orderid'];?>" />
									<input type="hidden" name="aname[]" value="<?php echo $prow['ALBUM_NAME']?>" />
									<input type="hidden" name="apname[]" value="<?php echo $prow['PAPER_NAME']?>" />
									<input type="hidden" name="asize[]" value="<?php echo $prow['PHOTO_SIZE']?>" />
									<input type="hidden" name="aqty[]" value="<?php echo $prow['PHOTO_QTY']?>" />
									<input type="hidden" name="arate[]" value="<?php echo $prow['PHOTO_RATE']?>" />
									<input type="hidden" name="atotal[]" value="<?php echo $tot_photo; ?>" />
								</tr>
								<?php
									}
								?>
								<tr>
								<td colspan="9">
									<div class="form-actions" style="float:right;">
										<button type="submit" name="btnAPInvoice" class="btn btn-danger" tabindex="8"> Bill Preview </button>
									</div>
								</td>
							</tr>	
							</tbody>
						</table>
						</form>
					   </div>
					</div>
					<!-- /.widget-bg -->
				</div>
				<!-- /.widget-holder -->
          	</div>
		</div>
		<?php
			}
		?>
    <!-- /.page-title -->
</main>
<!-- /.main-wrappper -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php"; ?>
 
 <script type="text/javascript">
	$(document).ready(function()
	{
		$("#type").change(function()
		{
			var id = $("#type").val();
			var dataString = 'id='+ id;
			$.ajax
			({
				type: "POST",
				url: "ajax_type.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$("#stype").html(html);
				} 
			});
		});
	});
</script>
