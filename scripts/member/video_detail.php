<?php

$generalobj->checkFrontAuthntication();
$vMemberUrl = $_REQUEST['mamberurl'];
$iVideoId = $_REQUEST['iVideoId'];

    if($iVideoId == '')
    {
         header("location:".$tconfig["tsite_url"]."/home");
    }else{
     
        $sql_user = "select * from members where vMemberUrl='".$vMemberUrl."'";
        $db_user = $obj->MySQLSelect($sql_user);
        $iMemberId = $db_user[0]['iMemberId'];
        
        $sql_vid = "select * from  video where iVideoId = '".$iVideoId."' AND eStatus = 'Active'";
        $db_video = $obj->MySQLSelect($sql_vid);
        
        
        $db_video[0]['vImage'] = $tconfig["tsite_upload_images_video"].$db_video[0]['iMemberId']."/".$db_video[0]['vImage'];
        $member_name = "select * from members where iMemberId = '".$db_video[0]['iMemberId']."'";
        $db_membername = $obj->MySQLSelect($member_name);
        $name = $db_membername[0]['vName'];
        
        $sql_videocategory = "select * from video_album where iMemberId = '".$iMemberId."'";
        $db_videocategory = $obj->MySQLSelect($sql_videocategory);

    }
        
$smarty->assign("name", $name);
$smarty->assign("db_videocategory", $db_videocategory);
$smarty->assign("db_video", $db_video);
$smarty->assign("code", $vMemberUrl);
$smarty->assign("db_user", $db_user);

?>