<?php
	$mode = $_REQUEST['mode'];
	$iStorePlanId = $_REQUEST['iStorePlanId'];
	
	if($iStorePlanId !='')
	{
		$sql_Storeplan = "select * from store_plan where iStorePlanId='".$iStorePlanId."' ";
		$db_storeplan = $obj->MySQLSelect($sql_Storeplan);
	}
	
  
	$smarty->assign("mode",$mode);
	$smarty->assign("db_storeplan",$db_storeplan);
	$smarty->assign("iStorePlanId",$iStorePlanId);
?>
