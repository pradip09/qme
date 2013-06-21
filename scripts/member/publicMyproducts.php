<?php
$generalobj->checkFrontAuthntication();
$url = $_REQUEST['mamberurl'];
$iStoreId  = $_REQUEST['iStoreId'];
$sql_user = "select * from members where vMemberUrl='".$url."'";
$db_user = $obj->MySQLSelect($sql_user);

    if($db_user[0]['iMemberId'] == ''){
    header("location:".$tconfig["tsite_url"]."/home");
    }
    else{
        
    }
    
    
    
$smarty->assign("db_user", $db_user);
$smarty->assign("iMemberid", $iMemberId);
$smarty->assign("iStoreId", $iStoreId);
#echo "<pre>";
#print_r ($db_user);exit;

?>