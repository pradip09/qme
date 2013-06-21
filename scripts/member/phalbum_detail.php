<?php


$generalobj->checkFrontAuthntication();
$vMemberUrl = $_REQUEST['mamberurl'];
$iPhotoCategoryId = $_REQUEST['iPhotoalbumId'];

    if($iPhotoCategoryId == '')
    {
         header("location:".$tconfig["tsite_url"]."/home");
    }else{
   
        $sql_user = "select * from members where vMemberUrl='".$vMemberUrl."'";
        $db_user = $obj->MySQLSelect($sql_user);
        $iMemberId = $db_user[0]['iMemberId'];
        
        $sql_photo = "select * from  photo_category where iPhotoCategoryId = '".$iPhotoCategoryId."' AND eStatus = 'Active'";
        $db_photoalbum = $obj->MySQLSelect($sql_photo);
         
        
        $db_photoalbum[0]['vImage'] = $tconfig["tsite_upload_images_photo"].$db_photoalbum[0]['iMemberId']."/".$db_photoalbum[0]['vImage'];
        $member_name = "select * from members where iMemberId = '".$db_photoalbum[0]['iMemberId']."'";
        $db_membername = $obj->MySQLSelect($member_name);
        $name = $db_membername[0]['vName'];
       
    }
       
$smarty->assign("name", $name);
$smarty->assign("db_photoalbum", $db_photoalbum);
$smarty->assign("code", $vMemberUrl);
$smarty->assign("db_user", $db_user);


?>