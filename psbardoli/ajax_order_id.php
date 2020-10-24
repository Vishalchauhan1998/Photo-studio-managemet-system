<?php
include('script/db.php');
if($_POST['id'])
{
	$id=$_POST['id'];
	$sql=mysql_query("select * from order_mst where CUSTOMER_ID='".$id."' GROUP BY ORDER_REF_NO");
?>
	
	<option selected disabled="disabled">Select Order Ref No</option>
<?php
	while($row=mysql_fetch_array($sql))
	{
		$id=$row['ORDER_NO'];
		$data=$row['ORDER_REF_NO'];
		echo '<option value="'.$id.'">'.$data.'</option>';
	}
}
?>