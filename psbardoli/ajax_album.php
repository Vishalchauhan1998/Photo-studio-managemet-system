<?php
include('script/db.php');
if($_POST['id'])
{
	$id=$_POST['id'];
	$sql=mysql_query("select * from album_mst where YEAR = '".$id."'");
?>
	
	<option selected disabled="disabled">Select Album Name</option>
<?php
	while($row=mysql_fetch_array($sql))
	{
		$id=$row['ALBUM_ID'];
		$data=$row['ALBUM_NAME'];
		echo '<option value="'.$id.'">'.$data.'</option>';
	}
}
?>