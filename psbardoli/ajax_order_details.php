<?php
include('script/db.php');
if(isset($_POST['get_option']))
{
     $state = $_POST['get_option'];
	 $row1=array();
     $find=mysql_query("select * from order_mst where ORDER_NO=$state");
     while($row=mysql_fetch_array($find))
	  {
		$row1[]=$row;
	  }
	  die(json_encode($row1));
}
?>