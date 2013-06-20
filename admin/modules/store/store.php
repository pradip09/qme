<?php
	$mode = $_REQUEST['mode'];
	$iStoreCategoryId = $_REQUEST['iStoreCategoryId'];
	
	if($iStoreCategoryId !='')
	{
		$sql_Store = "select * from store_category where iStoreCategoryId='".$iStoreCategoryId."' ";
		$db_store = $obj->MySQLSelect($sql_Store);
	}
	
   /*	$sqlMember = "select iMemberId,vName from members";
	$db_storeMember = $obj->MySQLSelect($sqlMember);*/
	
	//$smarty->assign("db_storeMember",$db_storeMember);
	$smarty->assign("mode",$mode);
	$smarty->assign("db_store",$db_store);
	$smarty->assign("iStoreCategoryId",$iStoreCategoryId);
?>
