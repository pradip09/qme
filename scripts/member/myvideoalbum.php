<?php

#echo "<pre>";
#print_r($_REQUEST);exit;
$generalobj->checkFrontAuthntication();
    $videoalbumid = $_REQUEST['videoalbumid'];
    $iMemberId  = $_SESSION['iUserId'];
    if($videoalbumid == 'add')
    {
        $mode = 'add';
        
    }else{
        
	$sql_allvideocategory = "select * from video_album where iVideoAlbumId='".$videoalbumid."' AND iMemberId = '".$iMemberId."'";
        
        $db_allvideocategory = $obj->MySQLSelect($sql_allvideocategory);
        $mode = 'edit';
        #$sql_photocategory = "select * from photo_category iMemberId = '".$iMemberId."' AND iPhotoCategoryId='".$db_photo[0]['iPhotoCategoryId']."'";
        #$db_photocategory = $obj->MySQLSelect($sql_photocategory);
        
    }
    


$smarty->assign("mode",$mode);
$smarty->assign("iMemberId",$iMemberId);
$smarty->assign("db_allvideocategory",$db_allvideocategory);

?>