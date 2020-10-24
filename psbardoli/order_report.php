<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Outdoor Order Report</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Outdoor Order Report</li>
				</ol>
			</div>
  </div>
     <!-- /.page-title-right -->

<?php
	if(isset($_GET['tdate']) && ($_GET['fdate']) && ($_GET['db']))
	{
?>	 
<div class="widget-list">
	<div class="row">
		<div class="col-md-12 widget-holder">
			<div class="widget-bg">
			<div class="widget-body clearfix">
				<div class="ecommerce-invoice printableArea" style="border:1px solid black;">
				<table style="width:100%;" border="0">
					<thead>
						<tr>
						<td colspan="2" ><font style="margin-left:15px; margin-top:5px;">" Shree Ganeshay Namah "</font></td>
						<td colspan="2"><div align="right" style="margin-right:15px; margin-top:5px;">" Jay Swami Narayana "</div></td>
					</tr>
					
					<tr>
					<td colspan="4">
					  	<h2 class="text-center text-danger">Photo Digital Studio</h2>
						<h6 class="text-center">
							<span class="text-danger"> 101 Sky Mall, Ten Road, Bardoli - 394601</span>
							<span> Jignesh Patel Mo : 9909594409 </span>						
						</h6>
						<?php
							if($_GET['db'] == 'outdoor')
							{
						?>
						<h4 class="text-center text-info"> Outdoor Order Report </h4>
						<?php
							}
							elseif($_GET['db'] == 'wedding')
							{
						?>
						<h4 class="text-center text-info"> Wedding Order Report </h4>
						<?php
							}
							else
							{
						?>
						<h4 class="text-center text-info"> Photography Order Report </h4>
						<?php
							}
						?>	
						<h5 class="text-center text-default"> <b>Report From Date:</b> <?php echo $_GET['fdate'];?> to 
																<b>To Date:</b> <?php echo $_GET['tdate'];?></h5>
					</td>
						
				  </tr>
				  </thead>
				</table>
				
				<div class="widget-body clearfix" style="margin-left:15px; margin-right:15px;">
				<table class="table">
					<?php
						if($_GET['db'] == 'outdoor')
						{
					?>
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Order Date</th>
							<th>Booking Date</th>
							<th>Customer Name</th>
							<th>Contact No</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = mysql_query("SELECT * FROM order_mst WHERE BOOKING_DATE between'".$_GET['fdate']."' and  '".$_GET['tdate']."'");
							while($que = mysql_fetch_array($query))
							{
								$cust = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$que['CUSTOMER_ID']."'");
								$c = mysql_fetch_array($cust);
						?>
						<tr>
							<td><?php echo $que['ORDER_REF_NO']?></td>
							<td><?php echo $que['ORDER_DATE']?></td>
							<td><?php echo $que['BOOKING_DATE']?></td>
							<td><?php echo $c['CUSTOMER_NAME']?></td>
							<td><?php echo $c['CUSTOMER_CONTACT']?></td>
						</tr>
						<?php
							}
						?>
					</tbody>
					<?php
						}
						elseif($_GET['db'] == 'wedding')
						{
					?>
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Customer Name</th>
							<th>Function Date</th>
							<th>Function Name</th>
							<th>Time</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
							$query1 = mysql_query("SELECT * FROM order_mst WHERE FUNCTION_DATE between '".$_GET['fdate']."' and  '".$_GET['tdate']."'");
							while($que1 = mysql_fetch_array($query1))
							{
								$cust = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$que1['CUSTOMER_ID']."'");
								$c = mysql_fetch_array($cust);
								
								$qfu = mysql_query("SELECT * FROM function_details WHERE FUNCTION_ID = '".$que1['FUNCTION_ID']."'");
								$q = mysql_fetch_array($qfu);
								
						?>
						<tr>
							<td><?php echo $que1['ORDER_REF_NO']?></td>
							<td><?php echo $c['CUSTOMER_NAME']?></td>
							<td><?php echo $que1['FUNCTION_DATE']?></td>
							<td><?php echo $q['1']?></td>
							<td><?php echo $que1['FUNCTION_TIME']?></td>
						</tr>
						<?php
							}
						?>
					</tbody>
					
					<?php
						}
						else
						{
					?>
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Order Date</th>
							<th>Customer Name</th>
	
						</tr>
					</thead>
					<tbody>
						<?php
							$query1 = mysql_query("SELECT * FROM photography_mst WHERE 	ORDER_DATE between '".$_GET['fdate']."' and  '".$_GET['tdate']."'");
							while($que1 = mysql_fetch_array($query1))
							{
								$cust = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$que1['CUSTOMER_ID']."'");
								$c = mysql_fetch_array($cust);								
						?>
						<tr>
							<td><?php echo $que1['ORDER_ID']?></td>
							<td><?php echo $que1['ORDER_DATE']?></td>
							<td><?php echo $c['CUSTOMER_NAME']?></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				<?php
						}
					?>
				</table>
                </div>
				</div>
				<!-- /.ecommerce-invoice -->
				<br /><br /><br /><br /><br /><br /><br /><br />
				<div class="text-right">
					<button id="print" class="btn btn-danger" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
				</div>
			</div>
			</div>
		</div>
	</div>
<!-- /.row -->
</div>
<?php
	}
	else
	{
?>
<div class="widget-list">
	<div class="row">
			
		<div class="col-md-12 widget-holder">
					<div class="widget-bg">
						<div class="widget-body clearfix">
						<h3 class="box-title mr-b-0">
							Enter From to To Date....
						</h3>
						
							<br /><br />
							<form method="GET" action="">
							<div class="row mr-b-50">
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Enter From Date</label>
									<input type="text" class="form-control datepicker" placeholder="Enter From Date" name="fdate" required />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Enter To Date</label>
									<input type="text" class="form-control datepicker" placeholder="Enter To Date" name="tdate" required />
								</div>
								
								<div class="col-md-4 mb-3">
									<label for="validationServer01">Select Report Type</label>
									<select class="form-control" id="inlineFormCustomSelect" name="db">
										<option selected="selected" disabled="disabled">Select Type...</option>
										<option value="wedding"> Wedding Report</option>
										<option value="outdoor"> Outdoor Report</option>
										<option value="photo"> Photo Report</option>
									</select>
								</div>
								
							</div>
							
							<div class="form-actions">
                                <div class="form-group row"  style="float:right;">
                                    <div class="col-md-12 ml-md-auto btn-list">
                                        <button class="btn btn-primary" type="submit" name="btnReport">Submit</button>
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
?>
</main>
<?php include "footer.php"; 
ini_set('display_errors', '1');
?>
<script src="js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>