<?php
include "../../script/db.php";

if(isset($_REQUEST['id'])) 
{
	$query = mysql_query("SELECT * FROM order_mst WHERE ORDER_ID='".$_REQUEST['id']."'");
 	$row = mysql_fetch_array($query);

	$cust_details = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$row['CUSTOMER_ID']."'");
	$cust = mysql_fetch_array($cust_details);
?>
   
<div class="table-responsive">
<form method="post">
<table class="table table-striped table-bordered">
 	<tr>
		<th class="text-center" colspan="6">
			Display Order Details of <?php echo strtoupper($cust['CUSTOMER_NAME']); ?>
		</th>
 	</tr>
	
	<tr>
		<td colspan="6"></td>
	</tr>
	<tr>
		<th class="text-center" colspan="3">Booking Date</th>
		<th class="text-center" colspan="3">Location</th>
	</tr>
	
	<tr>
		<td class="text-center" colspan="3"><?php echo $row['BOOKING_DATE'];?></td>
		<td class="text-center" colspan="3"><?php echo $row['LOCATION']?></td>
	</tr>
	
	<tr>
		<th class="text-center">Camera</th>
		<th class="text-center">Rate of Camera</th>
		<th class="text-center">DSLR</th>
		<th class="text-center">Rate of DSLR</th>
		<th class="text-center">Video</th>
		<th class="text-center">Rate of Video</th>
	</tr>
	
	<tr>
		<td class="text-center"><?php echo $row['NO_of_CAM'];?></td>
		<td class="text-center"><?php echo $row['RATE_CAM']?></td>
		<td class="text-center"><?php echo $row['NO_of_DSLR']?></td>
		<td class="text-center"><?php echo $row['RATE_DSLR']?></td>
		<td class="text-center"><?php echo $row['NO_of_VIDEO']?></td>
		<td class="text-center"><?php echo $row['RATE_VIDEO']?></td>
	</tr>
 </table>
</form>
</div>
 <?php    
}
?>