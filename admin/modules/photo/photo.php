<?php

	$mode = $_REQUEST['mode'];
	$iPhotoId = $_REQUEST['iPhotoId'];
	$iPhotoCategoryId = $_REQUEST['iPhotoCategoryId'];
	$type = $_REQUEST['type'];
	$modePhotoCat = 'add';
	$modePhoto = 'add';
	$memberId = $_REQUEST['iMemberId'];
	
	
	
	if($iPhotoCategoryId !='')
	{
		$sql = "select * from photo_category where iPhotoCategoryId='".$iPhotoCategoryId."' ";
		$db_photocategory = $obj->MySQLSelect($sql);
		$modePhotoCat = 'edit';
		
	}
	
	if($iPhotoId !=''){
		$sql = "select * from photo where iPhotoId='".$iPhotoId."' ";
		$db_photo = $obj->MySQLSelect($sql);
		$modePhoto = 'edit';
	}
	
	$sqlPhotoCat = "select * from photo_category where iMemberId=".$memberId;
	$db_photocat = $obj->MySQLSelect($sqlPhotoCat);
	
	$innerjoin = " INNER JOIN photo_category pc ON (p.iPhotoCategoryId = pc.iPhotoCategoryId)";
	$sql_res = "SELECT p.*,pc.vPhotoCategory as PhotoCategory FROM photo p ".$innerjoin." where p.iMemberId = ".$memberId;
	$db_viewphoto = $obj->MySQLSelect($sql_res);
	
	$sql_cus = "SELECT * FROM photo_category where iMemberId=".$memberId;	
	$db_viewphotocategory= $obj->MySQLSelect($sql_cus);
	
	
	$sqlcnt= "select count(*) as total from photo where iMemberId=".$memberId;
	$db_qry = $obj->MySQLSelect($sqlcnt);
	$totalRec = $db_qry[0]['total'];

	
	$initOrder =1;
	$smarty->assign("initOrder",$initOrder);
	$smarty->assign("totalRec",$totalRec);
	
	$smarty->assign("modePhotoCat",$modePhotoCat);
	$smarty->assign("modePhoto",$modePhoto);
	$smarty->assign("db_photocategory",$db_photocategory);
	$smarty->assign("db_viewphotocategory",$db_viewphotocategory);
	$smarty->assign("iPhotoCategoryId",$iPhotoCategoryId);
	
	$smarty->assign("db_photocat",$db_photocat);
	$smarty->assign("db_photoMember",$db_photoMember);
	//$smarty->assign("mode",$mode);
	$smarty->assign("type",$type);
	$smarty->assign("db_photo",$db_photo);
	$smarty->assign("db_viewphoto",$db_viewphoto);
	$smarty->assign("iPhotoId",$iPhotoId);
	$smarty->assign("stateArr",$stateArr);
	$smarty->assign("address",$address);
?>
