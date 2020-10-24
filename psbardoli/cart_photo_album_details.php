<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<!-- Page Title Area -->
		<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Edit Photo Album Details</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Photo Album</li>
				</ol>
			</div>
		</div>
     <!-- /.page-title-right -->
	<?php
		if(isset($_GET['edit_id']))
		{
			$id = $_GET['edit_id'];
			$cart = mysql_query("SELECT * FROM photography_mst WHERE PHOTO_ID = '".$id."'");
			$cart_row = mysql_fetch_array($cart);
			
			$customer = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$cart_row['CUSTOMER_ID']."'");
			$cust_row = mysql_fetch_array($customer);
	?>
	<div class="widget-list">
	<div class="row">
	
		<div class="col-md-12 widget-holder">
			<div class="widget-bg">
				<div class="widget-body clearfix">
				<h3 class="box-title mr-b-0">
					Edit Photography Album Here....
				</h3>
				
					<br /><br />
					<form method="POST" action="photography_details_save.php">
			
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
										<option value="<?php echo $row_city['CUSTOMER_ID'];?>" <?php if($cart_row['CUSTOMER_ID'] == $row_city['CUSTOMER_ID']) { echo 'selected="selected"';} ?>><?php echo $row_city['CUSTOMER_NAME'];?></option>
										<?php
											}
										?>
									</select>
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Select Order Date</label>
									<div class="input-group">
										<input type="text" class="form-control datepicker" value="<?php echo $cart_row['ORDER_DATE']?>" data-plugin-options='
										{"autoclose": true, "todayHighlight": true, "format": "dd-M-yyyy"}' name="date" /> 
										<span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                    </div>
								</div>
																
								<div class="col-md-2 mb-3">
									<input type="hidden" value="<?php echo $_GET['edit_id']?>" name="pedit" />
								</div>
								
							</div>
							
							<!-- Photo Details-->
							<div class="row mr-b-50">
								<div class="col-md-1 mb-3">
									<input type="hidden" class="form-control" name="photouid[]" placeholder="Enter Photo Id" />
								</div>
								
								
								<div class="col-md-3 mb-3">
									<select class="form-control" name="album" id="type" required>
										<option selected="selected" disabled="disabled"> Select Type </option>
										<?php
											$query =  mysql_query("SELECT * FROM `type_mst`");
											while($q = mysql_fetch_array($query))
											{
										?>
											<option value="<?php echo $q['TYPE_ID']; ?>"<?php if($cart_row['ALBUM_NAME'] == $q['TYPE_ID']) { echo 'selected="selected"';} ?>><?php echo $q['TYPE_NAME']; ?></option>
										<?php
											}
										?>
									</select>
								</div>
								
								<div class="col-md-2 mb-3">
									<select class="form-control" name="paper" id="stype" required>
										<?php
											$query =  mysql_query("SELECT * FROM `subtype_mst`");
											while($q = mysql_fetch_array($query))
											{
										?>
											<option value="<?php echo $q['SUBTYPE_ID']; ?>"<?php if($cart_row['PAPER_NAME'] == $q['SUBTYPE_ID']) { echo 'selected="selected"';} ?>><?php echo $q['SUBTYPE_NAME']; ?></option>
										<?php
											}
										?>
									</select>
								</div>
																
								<div class="col-md-2 mb-3">
									<input type="text" class="form-control" name="asize" value="<?php echo $cart_row['PHOTO_SIZE'];?>" />
								</div>
								
								<div class="col-md-1 mb-3">
									<input type="text" class="form-control" name="aqty" value="<?php echo $cart_row['PHOTO_QTY'];?>" />
								</div>
								
								<div class="col-md-2 mb-3">
									<input type="text" class="form-control" name="arate" value="<?php echo $cart_row['PHOTO_RATE'];?>" />
								</div>
							</div>
														
							<div class="form-actions">
                                <div class="form-group row"  style="float:right;">
                                    <div class="col-md-12 ml-md-auto btn-list">
                                        <button class="btn btn-primary" type="submit" name="btnAEDIT">Edit</button>
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
 function fetch_select(val)
 {
         $.ajax
		 ({
			url:"ajax_order_details.php",
			type:"POST",
			data:{"get_option":val},
			dataType:"JSON",
			success:function(data)
			{
				$('#bdate').val((data[0].BOOKING_DATE));
				$('#nocam').val((data[0].NO_OF_CAM));
				$('#dslr').val((data[0].NO_OF_DCAM));
				$('#novid').val((data[0].NO_OF_VID));
				$('#loc').val((data[0].LOCATION));
			}
  		 });
}
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
