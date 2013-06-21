<?php
$generalobj->checkFrontAuthntication();
$iProductId = $_REQUEST['iProductId'];
$sql_product = "SELECT r.*,p.vPropertyType FROM product_real_estate r LEFT JOIN real_estate_property p  ON r.iPropertyTypeId = p.iPropertyTypeId where iProductId = '".$iProductId."'";
$db_product = $obj->MySQLSelect($sql_product);
#echo "<pre>";
#print_r ($db_product);exit;
$iProductId = $db_product[0]['iProductId'];

$sql_gallery = "select * from product_gallery where iProductId = $iProductId";
$db_gallery = $obj->MySQLSelect($sql_gallery);

#echo "<pre>";
#print_r($db_gallery); exit;

$smarty->assign("db_gallery",$db_gallery); 
$smarty->assign("iProductId",$iProductId);
$smarty->assign("db_product",$db_product);
?>