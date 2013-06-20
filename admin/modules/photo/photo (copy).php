<?php
	$mode = $_REQUEST['mode'];
    $iPhotoId = $_REQUEST['iPhotoId'];
    $type = $_REQUEST['type'];
    

    if($iPhotoId !=''){
        $sql = "select * from photo where iPhotoId='".$iPhotoId."' ";
        $db_photo = $obj->MySQLSelect($sql);
    }
    
    $sqlPhotoCat = "select * from photo_category";
    $db_photocat = $obj->MySQLSelect($sqlPhotoCat);
    
    $sqlMember = "select iMemberId,vName from members";
    $db_photoMember = $obj->MySQLSelect($sqlMember);
    	
    $smarty->assign("db_photocat",$db_photocat);
    $smarty->assign("db_photoMember",$db_photoMember);
    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_photo",$db_photo);
    $smarty->assign("iPhotoId",$iPhotoId);
    $smarty->assign("stateArr",$stateArr);
    $smarty->assign("address",$address);
?>
