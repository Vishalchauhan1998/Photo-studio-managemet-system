<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
<!-- Page Title Area -->
<div class="row page-title clearfix">
	<div class="page-title-left">
		<h5 class="mr-0 mr-r-5">Display Photo Album Details</h5>
	</div>
		<!-- /.page-title-left -->
	<div class="page-title-right d-inline-flex">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
			<li class="breadcrumb-item active">View Photo Album</li>
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
					List of Photo Album....
					<font style="float:right"> <a href="photoalbum.php">Add Photo Album Details</a> </font>
				</h3>
			</div>
			<!-- /.widget-heading -->
			<div class="widget-body clearfix">
				<table class="table table-striped table-responsive" data-toggle="datatables">
					<thead>
						<tr>
							<th>Sr No</th>
							<th>Bill No</th>
							<th>Customer Name</th>
							<th>Contact No</th>
							<th>Total Amount</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$counter = 0;
							$query = mysql_query("SELECT * FROM invoice_mst, photo_albumdetails, customer_details
							WHERE
							invoice_mst.ORDER_NO = photo_albumdetails.ORDER_NO AND
							photo_albumdetails.CUSTOMER_ID = customer_details.CUSTOMER_ID
							GROUP BY BILL_NO");
							while($row = mysql_fetch_array($query))
							{		
								$sum = mysql_query("SELECT SUM(TOTAL) FROM photo_albumdetails WHERE ORDER_NO = '".$row['ORDER_NO']."' AND FLAG = '1'");
								$rsum = mysql_fetch_array($sum);
						?>
						<tr>
							<td><?php echo ++$counter;?></td>
							<td><?php echo $row['BILL_NO']; ?></td>
							<td><?php echo $row['CUSTOMER_NAME']; ?></td>
							<td><?php echo $row['CUSTOMER_CONTACT']; ?></td>
							<td><?php echo $amt = $rsum['SUM(TOTAL)']; ?></td>
							
							<td>
								<a href="invoice.php?getid=<?php echo $row['INVOICE_ID']?>&custid=<?php echo $row['CUSTOMER_ID']?>" class="btn btn-danger"><i class="fa fa-search"></i></a>
								&nbsp;&nbsp;&nbsp;
							</td>
						</tr>
						<?php 
							}
						?>
					</tbody>
				</table>
				<!-- View Modal -->
				<div id="view-modal" class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-lg"> 
					<div class="modal-content">  
				   
						<div class="modal-header" style="background:#51d2b7" > 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
							<h5 class="modal-title"> Function Order Details..	</h5>
						</div> 
											
						<div class="modal-body">                     
						   <div id="modal-loader" style="display: none; text-align: center;">
						   <!-- ajax loader -->
						   <img src="ajax-loader.gif">
						   </div>
											
							   <!-- mysql data will be load here -->                          
							   <div id="dynamic-content"></div>
							</div> 	
						</div> 
					</div>
				</div>
			</div>
			<!-- /.widget-body -->
		</div>
		<!-- /.widget-bg -->
		
		<!-- /.modal -->
			<div id="large_modal" class="modal fade animated" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						
					</div>
				</div>
			</div>
		<!-- /.modal -->
	</div>
	<!-- /.widget-holder -->
</div>
<!-- /.row -->
</div>
</main>
</div>
<script type="text/javascript" src="js/advanced_modals.js"></script>
<?php include "footer.php"; ?>

<script>
$(document).ready(function(){

    $(document).on('click', '#getView', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id'); // get id of clicked row
  
     $('#dynamic-content').html(''); // leave this div blank
     $('#modal-loader').show();      // load ajax loader on button click
 
     $.ajax({
          url: 'modals/display/modal_outdoor_order.php',
          type: 'POST',
          data: 'id='+uid,
          dataType: 'html'
     })
     .done(function(data){
          console.log(data); 
          $('#dynamic-content').html(''); // blank before load.
          $('#dynamic-content').html(data); // load here
          $('#modal-loader').hide(); // hide loader  
     })
     .fail(function(){
          $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#modal-loader').hide();
     });

    });
});
</script>
