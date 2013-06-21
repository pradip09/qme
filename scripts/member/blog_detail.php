<?php

$vMemberUrl = $_REQUEST['mamberurl'];
$iBlogId = $_REQUEST['iBlogId'];
    
    if($iBlogId == '')
    {
         header("location:".$tconfig["tsite_url"]."/home");
    }else{
     
        $sql_user = "select * from members where vMemberUrl='".$vMemberUrl."'";
        $db_user = $obj->MySQLSelect($sql_user);
        $iMemberId = $db_user[0]['iMemberId'];    
        $sql_blog = "select * from blog where iBlogId = '".$iBlogId."' AND eStatus = 'Active'";
        $db_blogs = $obj->MySQLSelect($sql_blog);
        $db_blogs[0][dCreateDate]=date("m-d-Y",strtotime($db_blogs[0][dCreateDate]));
        $db_blogs[0]['vImage'] = $tconfig["tsite_upload_images_blog"].$db_blogs[0]['iMemberId']."/".$db_blogs[0]['vImage'];
        $member_name = "select * from members where iMemberId = '".$db_blogs[0]['iMemberId']."'";
        $db_membername = $obj->MySQLSelect($member_name);
        $memurl=$db_membername[0]['vMemberUrl'];
        $name = $db_membername[0]['vName'];
    }
        
$smarty->assign("memurl", $memurl);
$smarty->assign("name", $name);
$smarty->assign("db_blogs", $db_blogs);
$smarty->assign("code", $vMemberUrl);
$smarty->assign("db_user", $db_user);


?>