<?php

$sql1 = "select * from static_pages where vPageCode = 'privacypolicy'";

    $db_privacypolicy = $obj->MySQLSelect($sql1);
#echo "<pre>";
#print_r($db_privacypolicy);exit;
$total = count($db_privacypolicy);

 $smarty->assign("db_privacypolicy",$db_privacypolicy);


?>