<?php
include('script/db.php');
if($_POST['id'])
{
	$id=$_POST['id'];
	$sql=mysql_query("select * from subtype_mst where TYPE_ID='".$id."'");
?>
	
	<option selected disabled="disabled">Select Sub Type</option>
<?php
	while($row=mysql_fetch_array($sql))
	{
		$id=$row['SUBTYPE_ID'];
		$data=$row['SUBTYPE_NAME'];
		echo '<option value="'.$id.'">'.$data.'</option>';
	}
}
?>