<?php
    $generalobj->checkFrontAuthntication();
    $url = $_REQUEST['mamberurl'];
    $sql_user = "select * from members where vMemberUrl='".$url."'";
    $db_user = $obj->MySQLSelect($sql_user);
    
    if($db_user[0]['iMemberId'] == ''){
        header("location:".$tconfig["tsite_url"]."/home");
    }else{
        $iUserid = $db_user[0]['iMemberId'];
    }
    
    $smarty->assign("db_user", $db_user);
    $smarty->assign("iMemberid", $iUserid);


?>