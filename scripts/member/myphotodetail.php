<?php

#echo "<pre>";
#print_r($_REQUEST);exit;
$generalobj->checkFrontAuthntication();
    $photoId = $_REQUEST['photoid'];
    
    $iMemberId    = $_SESSION['iUserId'];
    if($photoId == 'add')
    {
        $mode = 'add';
        
    }else{
        
	$sql_photo = "select * from photo where iPhotoId='".$photoId."' AND iMemberId = '".$iMemberId."'";
        
        $db_photo = $obj->MySQLSelect($sql_photo);
        $mode = 'edit';
        #$sql_photocategory = "select * from photo_category iMemberId = '".$iMemberId."' AND iPhotoCategoryId='".$db_photo[0]['iPhotoCategoryId']."'";
        #$db_photocategory = $obj->MySQLSelect($sql_photocategory);
        
    }
    $sql_photocategory = "select * from photo_category where iMemberId = '".$iMemberId."'";
    
    $db_photocategory = $obj->MySQLSelect($sql_photocategory);
#echo "<pre>";
#print_r($db_photo);


$smarty->assign("mode",$mode);
$smarty->assign("iMemberId",$iMemberId);
$smarty->assign("db_photocategory",$db_photocategory);
$smarty->assign("db_photo",$db_photo);

?>