<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
	<div class="row page-title clearfix">
			<div class="page-title-left">
				<h5 class="mr-0 mr-r-5">Customer Birthday Report</h5>
			</div>
                <!-- /.page-title-left -->
			<div class="page-title-right d-inline-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Customer Birthday Report</li>
				</ol>
			</div>
  </div>
     <!-- /.page-title-right -->

 
<?php
	if(isset($_GET['db']))
	{
		$date = date_parse($_GET['db']);
  		$a = $date['month'];
		$b = $_GET['db'];
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
						
						<h4 class="text-center text-info"> Customer Bithday Report </h4>
						
						<h5 class="text-center text-default"> <b>Report For </b> 
						<?php 
							if($a == '1'){echo 'JANUARY';}
							elseif($a==2){echo 'FEBRUARY';}
							elseif($a==3){echo 'MARCH';}
							elseif($a==4){echo 'APRIL';}
							elseif($a==5){echo 'MAY';}
							elseif($a==6){echo 'JUNE';}
							elseif($a==7){echo 'JULY';}
							elseif($a==8){echo 'AUGUST';}
							elseif($a==9){echo 'SEPTEMBER';}
							elseif($a==10){echo 'OCTOBER';}
							elseif($a==11){echo 'NOVEMBER';}
							elseif($a==12){echo 'DECEMBER';}
							
						?> 
						
						<b>Month</b></h5>
					</td>
						
				  </tr>
				  </thead>
				</table>
				
				<div class="widget-body clearfix" style="margin-left:15px; margin-right:15px;">
				<table class="table">
					
					<thead>
						<tr>
							<th>Customer Name</th>
							<th>Contact No</th>
							<th>Address</th>
							<th>Email</th>
							<th>Facebook Name</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query1 = mysql_query("SELECT * FROM `customer_details` WHERE `DATEOFBIRTH` LIKE '%".$_GET['db']."%'");
							while($que1 = mysql_fetch_array($query1))
							{
														
						?>
						<tr>
							<td><?php echo $que1['CUSTOMER_NAME']?></td>
							<td><?php echo $que1['CUSTOMER_CONTACT']?></td>
							<td><?php echo $que1['CUSTOMER_ADDRESS']?></td>
							<td><?php echo $que1['CUSTOMER_EMAIL']?></td>
							<td><?php echo $que1['CUSTOMER_FB_NAME']?></td>
						</tr>
						<?php
							}
						?>
					</tbody>
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
								<div class="col-md-6 mb-3">
									<label for="validationServer01">Select Month Here</label>
									<select class="form-control" id="inlineFormCustomSelect" name="db">
										<option selected="selected" disabled="disabled">Select Type...</option>
										<option value="Jan"> JANUARY </option>
										<option value="Feb"> FEBRUARY </option>
										<option value="Mar"> MARCH </option>
										<option value="Apr"> APRIL </option>
										<option value="May"> MAY </option>
										<option value="Jun"> JUNE </option>
										<option value="Jul"> JULY </option>
										<option value="Aug"> AUGUST </option>
										<option value="Sep"> SEPTEMBER </option>
										<option value="Oct"> OCTOBER </option>
										<option value="Nov"> NOVEMBER </option>
										<option value="Dec"> DECEMBER </option>
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