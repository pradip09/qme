<?php

    $generalobj->checkFrontAuthntication();
    $vMemberUrl = $_REQUEST['mamberurl'];
    $iVideoAlbumId = $_REQUEST['iVideoalbumId'];
    
    if($iVideoAlbumId == '')
    {
         header("location:".$tconfig["tsite_url"]."/home");
    }else{
     
        $sql_user = "select * from members where vMemberUrl='".$vMemberUrl."'";
        $db_user = $obj->MySQLSelect($sql_user);
        $iMemberId = $db_user[0]['iMemberId'];
        
        $sql_blog = "select * from video_album where iVideoAlbumId = '".$iVideoAlbumId."' AND eStatus = 'Active'";
        $db_vidalbum = $obj->MySQLSelect($sql_blog);
        $db_vidalbum[0][dAddedDate]=date("m-d-Y",strtotime($db_vidalbum[0][dAddedDate]));
         
        $db_vidalbum[0]['vImage'] = $tconfig["tsite_upload_images_video"].$db_vidalbum[0]['iMemberId']."/".$db_vidalbum[0]['vImage'];
        $member_name = "select * from members where iMemberId = '".$db_vidalbum[0]['iMemberId']."'";
        $db_membername = $obj->MySQLSelect($member_name);
        $name = $db_membername[0]['vName'];
    } 
        
$smarty->assign("name", $name);
$smarty->assign("db_vidalbum", $db_vidalbum);
$smarty->assign("code", $vMemberUrl);
$smarty->assign("db_user", $db_user);


?>