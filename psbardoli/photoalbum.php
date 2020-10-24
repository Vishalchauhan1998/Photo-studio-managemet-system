<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
		<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Order Album Details</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Order Album</li>
				</ol>
			</div>
		</div>
     <!-- /.page-title-right -->
		<?php
			if(isset($_POST['btnSession']))
			{
				session_start();
				$_SESSION['o_cust'] = $_POST['cust'];
				$_SESSION['order_id'] = $_POST['order_id'];
				header("location:photoalbum.php");
			}
			if(!isset($_SESSION['o_cust']))
			{
		?>
		<div class="widget-list">
			<div class="row">
			
				<div class="col-md-12 widget-holder">
					<div class="widget-bg">
						<div class="widget-body clearfix">
						<h3 class="box-title mr-b-0">
							Enter Order Album Details Here....
							<font style="float:right"> <a href="view_photoalbum.php">View Album Details</a> </font>
						</h3>
						
							<br /><br />
							<form method="POST">
							<div class="row mr-b-50">
								<div class="col-md-2 mb-3">
									<input type="hidden" class="form-control" />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Select Customer</label>
									<select class="form-control" name="cust" id="cust" required>
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
									<label for="validationServer01">Select Order No</label>
									<select class="form-control" name="order_id" id="order_id" onchange='fetch_select(this.value)'  required>
										<option selected="selected" disabled="disabled"> Select Order No </option>
										
									</select>
								</div>
								
								
								<div class="col-md-2 mb-3">
									<input type="hidden" class="form-control"/>
								</div>
								
							
							</div>
							
							<div class="form-actions">
                                <div class="form-group row"  style="float:right;">
                                    <div class="col-md-12 ml-md-auto btn-list">
                                        <button class="btn btn-primary" type="submit" name="btnSession">Select Customer</button>
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
		<?php
			}
			else
			{
				$query = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$_SESSION['o_cust']."'");
				$q = mysql_fetch_array($query);
				
				$query1 = mysql_query("SELECT * FROM order_mst WHERE ORDER_NO = '".$_SESSION['order_id']."'");
				$q1 = mysql_fetch_array($query1);
		?>
			<div class="widget-list">
			<div class="row">
			
				<div class="col-md-12 widget-holder">
					<div class="widget-bg">
						<div class="widget-body clearfix">
						<h3 class="box-title mr-b-0">
							Enter Order Album Details Here....
							<font style="float:right"> <a href="#">View Outdoor Details</a> </font>
						</h3>
						
							<br /><br />
							<form method="POST" action="photoalbum_save.php">
							<div class="row mr-b-50">
								<div class="col-md-2 mb-3">
									<input type="hidden" class="form-control" />
								</div>
								
								<div class="col-md-4 mb-3">
									<input type="hidden" name="cust_name" value="<?php echo $_SESSION['o_cust']?>" class="form-control" />
									<input type="text" value="<?php echo $q['CUSTOMER_NAME']?>" class="form-control" readonly="" />
								</div>
								
								<div class="col-md-4 mb-3">
									<input type="hidden" name="order_id" value="<?php echo $_SESSION['order_id']?>" class="form-control" />
									<input type="text" value="<?php echo $q1['ORDER_REF_NO']?>" class="form-control" readonly="" />
								</div>
								
								
								<div class="col-md-2 mb-3">
									<input type="hidden" class="form-control"/>
								</div>
								
							
							</div>
							<div class="row mr-b-50">
								<?php
									$data_fetch = mysql_query("SELECT * FROM order_mst WHERE ORDER_NO = '".$_SESSION['order_id']."'");
									while($data = mysql_fetch_array($data_fetch))
									{
										if($data['ORDER_TYPE'] == 'O')
										{
								?>
								<div class="col-md-2 mb-3">
									<input type="text" id="bdate" class="form-control" name="bdate" value="<?php echo $data['BOOKING_DATE'] ?>" readonly="" />
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" id="nocam" class="form-control" name="nocam" value="<?php echo $data['NO_of_CAM'].' CAMERA' ?>" readonly="" />
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" id="nodcam" class="form-control" name="nodcam" value="<?php echo $data['NO_of_DSLR'].' DSLR' ?>" readonly="" />
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" id="novid" class="form-control" name="novid" value="<?php echo $data['NO_of_VIDEO'].' VIDEO' ?>" readonly="" />
								</div>
								
								<div class="col-md-4 mb-3">
									<input type="text" id="loc" class="form-control" name="loc" value="<?php echo $data['LOCATION'] ?>" readonly="" />
								</div>
								<?php
										}
										else
										{
											$fetch_function = mysql_query("SELECT * FROM function_details WHERE FUNCTION_ID = '".$data['FUNCTION_ID']."'");
											$function = mysql_fetch_array($fetch_function);
										
								?>
								<div class="col-md-2 mb-3">
									<input type="text" id="fname" class="form-control" name="fname" value="<?php echo $function['FUNCTION_NAME'] ?>" readonly="" />
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" id="fdate" class="form-control" name="fdate" value="<?php echo $data['FUNCTION_DATE'] ?>" readonly="" />
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" id="ftime" class="form-control" name="ftime" value="<?php echo $data['FUNCTION_TIME'] ?>" readonly="" />
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" id="nocam" class="form-control" name="nocam" value="<?php echo $data['NO_of_CAM'].' CAMERA' ?>" readonly="" />
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" id="nodcam" class="form-control" name="nodcam" value="<?php echo $data['NO_of_DSLR'].' DSLR' ?>" readonly="" />
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" id="novid" class="form-control" name="novid" value="<?php echo $data['NO_of_VIDEO'].' VIDEO' ?>" readonly="" />
								</div>
								<?php						
										}
									}
								?>
							</div>
							
							<?php
								if(isset($_GET['edit']))
								{
									$edit = mysql_query("SELECT * FROM photo_albumdetails, type_mst, subtype_mst WHERE
									photo_albumdetails.TYPE_ID = type_mst.TYPE_ID AND photo_albumdetails.SUBTYPE_ID = subtype_mst.SUBTYPE_ID");
									$fetch_edit = mysql_fetch_array($edit);
							?>
							<div class="row mr-b-50">
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Select Type</label>
									<select class="form-control" name="type" id="type" required  tabindex="1">
										<option selected="selected" disabled="disabled"> Select Type </option>
										<?php
											$query = mysql_query("SELECT * FROM type_mst");
											while($row = mysql_fetch_array($query))
											{
										?>
										<option value="<?php echo $row['TYPE_ID']; ?>" <?php if($row['TYPE_ID'] == $fetch_edit['TYPE_ID']){ echo"selected='selected'";}?>><?php echo $row['TYPE_NAME']; ?></option>
										<?php
											}
										?>
									</select>
									<input type="hidden" value="<?php echo $fetch_edit['PALBUM_ID']?>" name="txtid" />
								</div>
								
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Select SubType</label>
									<select class="form-control" name="stype" id="stype" required tabindex="2">
										<option selected="selected" disabled="disabled"> Select Type </option>
										<?php
											$query = mysql_query("SELECT * FROM subtype_mst");
											while($row = mysql_fetch_array($query))
											{
										?>
										<option value="<?php echo $row['SUBTYPE_ID']; ?>" <?php if($row['SUBTYPE_ID'] == $fetch_edit['SUBTYPE_ID']){ echo"selected='selected'";}?>><?php echo $row['SUBTYPE_NAME']; ?></option>
										<?php
											}
										?>
									</select>
								</div>
									
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Select Size</label>
									<select class="form-control" tabindex="3" name="size" id="size" tabindex="3">
										<option selected disabled="disabled">Select Size</option>
										
										<option value="12x30"<?php if($fetch_edit['SIZE'] == "12x30") { echo 'selected="selected"'; }?>>12x30</option>
										<option value="12x36"<?php if($fetch_edit['SIZE'] == "12x36") { echo 'selected="selected"'; }?>>12x36</option>
										
									</select>
								</div>
								
								<div class="col-md-1 mb-3">
									<label for="validationServer01">Quantity</label>
									<input type="text" id="qty" class="form-control" name="qty" value="<?php echo $fetch_edit['QTY']?>"  tabindex="4"  />
								</div>
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">Select Price</label>
									<input type="text" id="price" class="form-control" name="price" value="<?php echo $fetch_edit['PRICE']?>" tabindex="5" />
								</div>
							</div>
							
							<div class="form-actions">
                                <div class="form-group row"  style="float:right;">
                                    <div class="col-md-12 ml-md-auto btn-list">
										<?php ?>
										<button type="submit" name="btnUpdate" class="btn btn-danger" tabindex="6"> Update Data </button>
										<button type="submit" name="btnLogout" class="btn btn-inverse" tabindex="7"> Change Customer </button>
                                    </div>
                                </div>
                            </div>
							<?php
								}
								else
								{
							?>
							<div class="row mr-b-50">
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Select Type</label>
									<select class="form-control" name="type" id="type" required  tabindex="1">
										<option selected="selected" disabled="disabled"> Select Type </option>
										<?php
											$query = mysql_query("SELECT * FROM type_mst");
											while($row = mysql_fetch_array($query))
											{
										?>
										<option value="<?php echo $row['TYPE_ID']; ?>"><?php echo $row['TYPE_NAME']; ?></option>
										<?php
											}
										?>
									</select>
								</div>
								
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Select SubType</label>
									<select class="form-control" name="stype" id="stype" required tabindex="2">
										<option selected disabled="disabled">Select Sub Type</option>
									</select>
								</div>
								
								<div class="col-md-3 mb-3">
									<label for="validationServer01">Select Size</label>
									<select class="form-control" tabindex="3" name="size" id="size" tabindex="3">
										<option selected disabled="disabled">Select Size</option>
										
										<option value="12x30">12x30</option>
										<option value="12x36">12x36</option>
										
									</select>
								</div>
								
								<div class="col-md-1 mb-3">
									<label for="validationServer01">Quantity</label>
									<input type="text" id="qty" class="form-control" name="qty" placeholder="Qty"  tabindex="4"  />
								</div>
								
								<div class="col-md-2 mb-3">
									<label for="validationServer01">Select Price</label>
									<input type="text" id="price" class="form-control" name="price" placeholder="Enter Price" tabindex="5" />
								</div>
							</div>
							
							<div class="form-actions">
                                <div class="form-group row"  style="float:right;">
                                    <div class="col-md-12 ml-md-auto btn-list">
										<?php ?>
										<button type="submit" name="btnCart" class="btn btn-danger" tabindex="6"> Save Data </button>
										<button type="submit" name="btnLogout" class="btn btn-inverse" tabindex="7"> Change Customer </button>
                                    </div>
                                </div>
                            </div>
							<?php
								}
							?>
							</form>
						</div>
					</div>
				</div>
                  
			</div>
			
		</div>	
		
			<?php
				$getSupplier = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$_SESSION['o_cust']."'");
				$row = mysql_fetch_array($getSupplier);
			?>
				<center>
				<h1 class="text-danger m-b-0 m-t-0" style="font-weight:bold;"><?php echo $row['CUSTOMER_NAME'] ?></h1>
				</center>
				<br />
				
				<font class="text-danger m-b-0 m-t-0"  style="float:right; font-weight:bold;">Order Id :	<?php echo $q1['ORDER_REF_NO'] ?></font>
				<font class="text-danger m-b-0 m-t-0"  style="float:left; font-weight:bold;">Contact No :	<?php echo $row['CUSTOMER_CONTACT'] ?></font>
				<br />
				<br />
			<div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h3 class="box-title mr-b-0">
									Cart for Album Details.	
								</h3>
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
							<form method="POST" action="photoalbum_save.php">
                            <table class="table table-striped table-responsive" data-toggle="datatables">
                            <thead>
								<tr>
									<th class="text-center"><strong>Sr. No</strong></th>
									<th class="text-center"><strong>Type</strong></th>
									<th class="text-center"><strong>Sub Type</strong></th>
									<th class="text-center"><strong>Size</strong></th>
									<th class="text-center"><strong>Qty</strong></th>
									<th class="text-right"><strong>Rate </strong></th>
									<th class="text-right"><strong>Total </strong></th>
									<th class="text-right"><strong>Action</strong></th>
								</tr>
							</thead>
							<tbody>
								<?php
										$counter = 0;
										$qty = 0;
										$final_sum = 0;
										
										$getData = mysql_query("SELECT * FROM photo_albumdetails WHERE CUSTOMER_ID = '".$_SESSION['o_cust']."' AND FLAG = '0' AND ORDER_NO = '".$_SESSION['order_id']."' GROUP BY TYPE_ID, SUBTYPE_ID, SIZE");
										while($row = mysql_fetch_array($getData))
										{
											$query = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$row['CUSTOMER_ID']."'");
											$cust = mysql_fetch_array($query);
											
											$query = mysql_query("SELECT * FROM type_mst WHERE TYPE_ID = '".$row['TYPE_ID']."'");
											$rowtype = mysql_fetch_array($query);
											
											$query = mysql_query("SELECT * FROM subtype_mst WHERE SUBTYPE_ID = '".$row['SUBTYPE_ID']."'");
											$rowstype = mysql_fetch_array($query);
								?>	
								<tr>
									<td class="text-center"><?php echo ++$counter; ?></td>
									<td class="text-center">
										<input class="form-control" name="order_id[]" type="hidden" value="<?php echo $row['ORDER_NO']; ?>" readonly="">
										<?php echo $rowtype['TYPE_NAME']; ?>
									</td>
									<td class="text-center">
										<?php echo  $rowstype['SUBTYPE_NAME']; ?>
									</td>
									
									<td class="text-center">
										<?php echo  $row['SIZE']; ?>
									</td>
									<td class="text-center">
										<?php
									
											$qty_s = mysql_query("SELECT SUM(QTY) from photo_albumdetails WHERE TYPE_ID = '".$row['TYPE_ID']."' and SUBTYPE_ID = '".$row['SUBTYPE_ID']."' AND SIZE = '".$row['SIZE']."' AND CUSTOMER_ID = '".$_SESSION['o_cust']."' AND ORDER_NO = '".$_SESSION['order_id']."' AND FLAG ='0'");
											$row_s = mysql_fetch_array($qty_s);
											$sqty = $row_s['SUM(QTY)'];
											
											
											$qty += $sqty;
										?>
										<?php echo $sqty; ?>
									</td>
									<td class="text-right">
										<?php
											$qty_p = mysql_query("SELECT PRICE from photo_albumdetails WHERE TYPE_ID = '".$row['TYPE_ID']."' and SUBTYPE_ID = '".$row['SUBTYPE_ID']."' AND CUSTOMER_ID = '".$_SESSION['o_cust']."' AND ORDER_NO = '".$_SESSION['order_id']."' AND FLAG ='0'");
											$row_p = mysql_fetch_array($qty_p);
											
										?>
										<?php echo $row_p['PRICE']; ?>
									</td>
									<td class="text-right">
										<?php
											$tot_1 = $row_s['SUM(QTY)'];
											$tot_2 = $row_p['PRICE'];
											
											$tot = $tot_1 * $tot_2;
		
											
											$final_sum += $tot;
										?>
										<input type="hidden" name="rows" value="<?php echo $counter; ?>" />
										<strong><?php echo $tot ?></strong>
									</td>
									
									<td class="text-center">
										<a class="" href="photoalbum.php?edit=<?php echo $row['PALBUM_ID']; ?>" role="button"><i class="fa fa-edit"></i></a>
										&nbsp;&nbsp;&nbsp;
										<a class="" onclick="return confirm('Are you sure you want to Delete?');" href="photoalbum_save.php?delete=<?php echo $row['PALBUM_ID']; ?>"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								
								<?php
									}
									$sum_qty = mysql_query("SELECT SUM(QTY) FROM photo_albumdetails WHERE CUSTOMER_ID = '".$_SESSION['o_cust']."' AND FLAG = '0' AND ORDER_NO = '".$_SESSION['order_id']."'");
									$sum_qty_row = mysql_fetch_array($sum_qty);
									
									$sum_tot = mysql_query("SELECT SUM(TOTAL) FROM photo_albumdetails WHERE CUSTOMER_ID = '".$_SESSION['o_cust']."' AND FLAG = '0' AND ORDER_NO = '".$_SESSION['order_id']."'");
									$sum_tot_row = mysql_fetch_array($sum_tot);
									
									$stot = 0;
								?>
								<tr>	
									<td colspan="8">&nbsp;
										 
									</td>
								</tr>
								<!--<tr>
									<td colspan="4" class="text-center" style="font-weight:bold;"> <b>TOTAL</b> </td>
									<td class="text-center" style="font-weight:bold"><?php //echo $qty;?></td>
									<td class="text-center">&nbsp;</td>
									<td class="text-right" style="font-weight:bold"><?php //echo $final_sum; ?></td>
								</tr>-->
								<tr>
									<td colspan="8">
										<div class="form-actions" style="float:right;">
											<button type="submit" name="btnInvoice" class="btn btn-danger" tabindex="8"> 
											Bill Preview </button>
										</div>
									</td>
								</tr>								
								<?php
								
								?>
							</tbody>
							</table>
								</form>
						   </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
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
		$("#cust").change(function()
		{
			var id = $("#cust").val();
			var dataString = 'id='+ id;
			$.ajax
			({
				type: "POST",
				url: "ajax_order_id.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$("#order_id").html(html);
				} 
			});
		});
	});
</script>


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
</script>
