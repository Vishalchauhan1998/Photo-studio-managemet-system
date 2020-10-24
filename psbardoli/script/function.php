<?php
include('script/db.php');
function getMaxValue($tablename,$primarykey)
{
	$getMaxValue=("SELECT MAX(".$primarykey.")AS TOTAL FROM ".$tablename);
	$res = mysql_query ($getMaxValue);
	$res_data=mysql_fetch_assoc($res);
	if(mysql_num_rows($res)== 0)
	{
		 return 1;	
	}
	 else
	 {
		 return $res_data["TOTAL"]+1;
	}
}
?>