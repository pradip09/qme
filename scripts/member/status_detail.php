<?php
    $vMemberUrl = $_REQUEST['mamberurl'];
    $iStatusId = $_REQUEST['iStatusId'];
    $sql_status = "select * from status_update where iStatusId='".$iStatusId."'";
    $db_status = $obj->MySQLSelect($sql_status);
    
    if($iStatusId == '')
    {
         header("location:".$tconfig["tsite_url"]."/home");
    }else{
     
        $sql_user = "select * from members where iMemberId='".$db_status[0]['iMemberId']."'";
        $db_user = $obj->MySQLSelect($sql_user);
        
        $iMemberId = $db_user[0]['iMemberId'];
        
        $sql_status = "select * from status_update where iStatusId = '".$iStatusId."'";
        $db_status = $obj->MySQLSelect($sql_status);
        $db_status[0][dAddedDate]=date("m-d-Y",strtotime($db_status[0][dAddedDate]));
        
        $member_name = "select * from members where iMemberId = '".$db_status[0]['iMemberId']."'";
        $db_membername = $obj->MySQLSelect($member_name);
        $name = $db_membername[0]['vName'];
    }
        
$smarty->assign("name", $name);
$smarty->assign("db_status", $db_status);
$smarty->assign("code", $vMemberUrl);
$smarty->assign("db_user", $db_user);


?>