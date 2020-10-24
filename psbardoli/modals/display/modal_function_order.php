<?php
include "../../script/db.php";

if(isset($_REQUEST['id'])) 
{
	$query = mysql_query("SELECT * FROM order_mst WHERE ORDER_ID='".$_REQUEST['id']."'");
 	$row = mysql_fetch_array($query);

	$cust_details = mysql_query("SELECT * FROM customer_details WHERE CUSTOMER_ID = '".$row['CUSTOMER_ID']."'");
	$cust = mysql_fetch_array($cust_details);
	
	$func_details = mysql_query("SELECT * FROM  function_details WHERE FUNCTION_ID = '".$row['FUNCTION_ID']."'");
	$func = mysql_fetch_array($func_details);
	
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
		<th class="text-center" colspan="2">Function Date</th>
		<th class="text-center" colspan="2">Function Name</th>
		<th class="text-center" colspan="2">Function Time</th>
	</tr>
	
	<tr>
		<td class="text-center" colspan="2"><?php echo $row['FUNCTION_DATE'];?></td>
		<td class="text-center" colspan="2"><?php echo $func['FUNCTION_NAME']?></td>
		<td class="text-center" colspan="2"><?php echo $row['FUNCTION_TIME']?></td>
	</tr>
	
	<tr>
		<th class="text-center">Camera</th>
		<th class="text-center">Rate of Cam</th>
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