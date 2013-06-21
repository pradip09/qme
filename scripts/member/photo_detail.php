<?php

$generalobj->checkFrontAuthntication();
$vMemberUrl = $_REQUEST['mamberurl'];
$iPhotoId = $_REQUEST['iPhotoId'];

    if($iPhotoId == '')
    {
         header("location:".$tconfig["tsite_url"]."/home");
    }else{
     
        $sql_user = "select * from members where vMemberUrl='".$vMemberUrl."'";
        $db_user = $obj->MySQLSelect($sql_user);
        $iMemberId = $db_user[0]['iMemberId'];
        
        $sql_photo_detail = "select * from photo where iPhotoId = '".$iPhotoId."' AND eStatus = 'Active'";
        $db_photo = $obj->MySQLSelect($sql_photo_detail);
       
        
        $db_photo[0]['vImage'] = $tconfig["tsite_upload_images_photo"].$db_photo[0]['iMemberId']."/".$db_photo[0]['vImage'];
        $member_name = "select * from members where iMemberId = '".$db_photo[0]['iMemberId']."'";
        $db_membername = $obj->MySQLSelect($member_name);
        $name = $db_membername[0]['vName'];
        
        $sql_photocategory = "select * from photo_category where iMemberId = '".$iMemberId."'";
        $db_photocategory = $obj->MySQLSelect($sql_photocategory);
    } 
        
$smarty->assign("name", $name);
$smarty->assign("db_photo", $db_photo);
$smarty->assign("code", $vMemberUrl);
$smarty->assign("db_user", $db_user);
$smarty->assign("db_photocategory", $db_photocategory);


?>