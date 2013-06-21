<?php
$generalobj->checkFrontAuthntication();
$url = $_REQUEST['mamberurl'];
    $sql_user = "select * from members where vMemberUrl='".$url."'";
    $db_user = $obj->MySQLSelect($sql_user);

    if($db_user[0]['iMemberId'] == ''){

        header("location:".$tconfig["tsite_url"]."/home");

    }else{
            $iMemberId = $db_user[0]['iMemberId'];
            $sql_aboutus = "select * from aboutus_member where iMemberId = '".$iMemberId."'";
            $db_aboutus = $obj->MySQLSelect($sql_aboutus);
    }
#echo "<pre>";
#print_r($db_aboutus);exit;
$smarty->assign("db_user",$db_user);
$smarty->assign("db_aboutus",$db_aboutus);
$smarty->assign("db_myaboutus",$db_myaboutus);

?>