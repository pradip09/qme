<?php


$id=$_REQUEST['id'];

$sql="select * from store_plan where iStorePlanId =".$id."";
$db_sql=$obj->MysqlSelect($sql);

$smarty->assign("db_sql",$db_sql);
?>
