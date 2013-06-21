<?php

$generalobj->checkFrontAuthntication();
$iProductId = $_REQUEST['iProductId'];
$sql_product = "select * from product_clothing_accessories where eStatus = 'Active' AND iProductId = '".$iProductId."'";
$db_product = $obj->MySQLSelect($sql_product);
#echo "<pre>";
#print_r ($db_product);exit;
$smarty->assign("db_product",$db_product);
?>
