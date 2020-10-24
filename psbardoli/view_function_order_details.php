<?php include "header.php"; ?>
<main class="main-wrapper clearfix">
<!-- Page Title Area -->
<div class="row page-title clearfix">
	<div class="page-title-left">
		<h5 class="mr-0 mr-r-5">Display Function Order Details</h5>
	</div>
		<!-- /.page-title-left -->
	<div class="page-title-right d-inline-flex">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
			<li class="breadcrumb-item active">View Function Order</li>
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
					List of Function Order....
					<font style="float:right"> <a href="insert_order_details.php">Add Function Order Details</a> </font>
				</h3>
			</div>
			<!-- /.widget-heading -->
			<div class="widget-body clearfix">
				<table class="table table-striped table-responsive" data-toggle="datatables">
					<thead>
						<tr>
							<th>Customer Name</th>
							<th>Customer No</th>
							<th>Order No</th>
							<th>Function Date</th>
							<th>Function Time</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$counter = 0;
							$query = mysql_query("select * from order_mst WHERE ORDER_TYPE = 'M'");
							while($row = mysql_fetch_array($query))
							{		
								$cust = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$row['CUSTOMER_ID']."'");
								$row_cust = mysql_fetch_array($cust); 
						?>
						<tr>
							<td><?php echo $row_cust['CUSTOMER_NAME']; ?></td>
							<td><?php echo $row_cust['CUSTOMER_CONTACT']; ?></td>
							<td><?php echo $row['ORDER_REF_NO']; ?></td>
							<td><?php echo $row['FUNCTION_DATE']; ?></td>
							<td><?php echo $row['FUNCTION_TIME']; ?></td>
							
							<td>
								<button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['ORDER_ID']; ?>" id="getView" class="btn btn-success"><i class="fa fa-search"></i></button>
								
								&nbsp;&nbsp;&nbsp;
								<a class="btn btn-info" href="insert_order_details.php?edt_id=<?php echo $row['ORDER_ID']; ?>" role="button"><i class="fa fa-edit"></i></a>
								&nbsp;&nbsp;&nbsp;
								<a class="btn btn-danger" href="outdoor_order.php?del_id=<?php echo $row['ORDER_ID']; ?>""><i class="fa fa-trash"></i></a>
								
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
          url: 'modals/display/modal_function_order.php',
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
