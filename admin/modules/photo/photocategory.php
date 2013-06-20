<?php
	$mode = $_REQUEST['mode'];
	$iPhotoCategoryId = $_REQUEST['iPhotoCategoryId'];
	$type = $_REQUEST['type'];
	$memberId = $_REQUEST['iMemberId'];
	
	if($iPhotoCategoryId !='')
	{
		$sql = "select * from photo_category where iPhotoCategoryId='".$iPhotoCategoryId."' ";
		$db_photocategory = $obj->MySQLSelect($sql);
	}
	
	$smarty->assign("mode",$mode);
	$smarty->assign("type",$type);
	$smarty->assign("db_photocategory",$db_photocategory);
	$smarty->assign("iPhotoCategoryId",$iPhotoCategoryId);
	$smarty->assign("stateArr",$stateArr);
	$smarty->assign("address",$address);
?>
