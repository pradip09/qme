<?php

#echo "<pre>";
#print_r($_REQUEST);exit;
$generalobj->checkFrontAuthntication();
    $videoid = $_REQUEST['videoid'];
    $iMemberId    = $_SESSION['iUserId'];
    if($videoid == 'add')
    {
        $mode = 'add';
        
    }else{
        
	$sql_video = "select * from video where iVideoId='".$videoid."' AND iMemberId = '".$iMemberId."'";
        
        $db_video = $obj->MySQLSelect($sql_video);
        $mode = 'edit';
        #$sql_photocategory = "select * from photo_category iMemberId = '".$iMemberId."' AND iPhotoCategoryId='".$db_photo[0]['iPhotoCategoryId']."'";
        #$db_photocategory = $obj->MySQLSelect($sql_photocategory);
        
    }
    $sql_videocategory = "select * from video_album where iMemberId = '".$iMemberId."'";
    
    $db_videocategory = $obj->MySQLSelect($sql_videocategory);

   $db_video[0]['vVideolink'] =  html_entity_decode($db_video[0]['vVideolink']);


$smarty->assign("mode",$mode);
$smarty->assign("iMemberId",$iMemberId);
$smarty->assign("db_videocategory",$db_videocategory);
$smarty->assign("db_video",$db_video);

?>
