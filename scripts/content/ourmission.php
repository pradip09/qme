<?php

$sql1 = "select * from static_pages where vFileName = 'ourmission'";

    $db_mission = $obj->MySQLSelect($sql1);
#echo "<pre>";
#print_r($db_sta);exit;
$total = count($db_mission);

 $smarty->assign("db_mission",$db_mission);


?>