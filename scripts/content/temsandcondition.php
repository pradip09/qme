<?php

$sql1 = "select * from static_pages where vFileName = 'terms&condition'";
$db_sta = $obj->MySQLSelect($sql1);
#echo "<pre>";
#print_r($db_sta);exit;
$total = count($db_sta);

$smarty->assign("db_sta",$db_sta);


?>