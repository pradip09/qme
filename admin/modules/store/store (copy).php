<?php
	$mode = $_REQUEST['mode'];
	$iItemId = $_REQUEST['iItemId'];
		
	if($iItemId !='')
	{
		$sql_Store = "select * from store where iItemId='".$iItemId."' ";
		$db_store = $obj->MySQLSelect($sql_Store);
	
		$sql_itemsize = "select vItemSize from store where iItemId='".$iItemId."' ";
		$dbItemsize = $obj->MySQLSelect($sql_itemsize);
		$sz = $dbItemsize[0]['vItemSize'];
		$db_size = explode("|", $sz);
		
		$sql_itemcolor = "select vItemColor from store where iItemId='".$iItemId."' ";
		$dbItemcolor = $obj->MySQLSelect($sql_itemcolor);
		$clr = $dbItemcolor[0]['vItemColor'];
		$db_color = explode("|",$clr);
		
	}
	
	$sqlMember = "select iMemberId,vName from members";
	$db_storeMember = $obj->MySQLSelect($sqlMember);
	
	$smarty->assign("db_color",$db_color);
	$smarty->assign("db_size",$db_size);
	$smarty->assign("db_storeMember",$db_storeMember);
	$smarty->assign("mode",$mode);
	$smarty->assign("db_store",$db_store);
	$smarty->assign("iItemId",$iItemId);
?>
