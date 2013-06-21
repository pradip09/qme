<?php

$generalobj->checkFrontAuthntication();
$iProductId = $_REQUEST['iProductId'];
$sql_product = "select * from product_general_item where eStatus = 'Active' AND iProductId = '".$iProductId."'";
$db_product = $obj->MySQLSelect($sql_product);
/*
if($db_product[0]['vProductImage'] =='' || !is_file(TPATH_SERVER_IMAGES_STORE."/".$db_product[0]['iStoreCategoryId']."/".$db_product[0]['iProductId']."/1_".$ProductArr[$i]['vProductImage']))
{
   $noimage = 1;
}
else
{
   $noimage = 0;
}
#echo "<pre>";
#print_r ($db_product);exit;
$smarty->assign("noimage",$noimage);
*/
$smarty->assign("db_product",$db_product);
?>
