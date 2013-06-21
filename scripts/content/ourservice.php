<?php

$sql1 = "select * from static_pages where vFileName = 'ourservice'";

    $db_service = $obj->MySQLSelect($sql1);
#echo "<pre>";
#print_r($db_sta);exit;
$total = count($db_service);

 $smarty->assign("db_service",$db_service);


?>