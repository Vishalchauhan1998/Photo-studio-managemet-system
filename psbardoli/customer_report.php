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
						<h4 class="text-center text-info"> Customer Details Report </h4>
						
					</td>
						
				  </tr>
				  </thead>
				</table>
				
				<div class="widget-body clearfix" style="margin-left:15px; margin-right:15px;">
				<table class="table">
                                    <thead>
                                        <tr>
											<th>Id</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Contact No</th>
											<th>Email</th>
											<th>DOB</th>
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
                                            <td><font style="font-size:13px"><?php echo ++$counter; ?></font></td>
                                            <td><font style="font-size:13px"><?php echo $row['CUSTOMER_NAME']; ?></font></td>
                                            <td><font style="font-size:13px"><?php echo $row['CUSTOMER_ADDRESS']; ?></font></td>
                                            <td><font style="font-size:13px"><?php echo $row['CUSTOMER_CONTACT']; ?></font></td>
											<td><font style="font-size:13px"><?php echo $row['CUSTOMER_EMAIL']; ?></font></td>
											<td><font style="font-size:13px"><?php echo $row['DATEOFBIRTH']; ?></font></td>
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