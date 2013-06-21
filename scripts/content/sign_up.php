<?php
$url = basename($_SERVER['REQUEST_URI']);
$sql_user = "select * from members where vMemberUrl='".$url."'";
$db_user = $obj->MySQLSelect($sql_user);

$smarty->assign("name",$db_user[0]['vName']);
$smarty->assign("code",$url);
$smarty->assign("db_user",$db_user);
$smarty->assign("tot_storeitem",$tot_storeitem);
?>