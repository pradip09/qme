<?php

$itemstr = $_REQUEST['itemstr'];

$QtyArr = explode(",",$itemstr);

$CartArr = $_SESSION['Cart'];
$totProduct = $CartArr['sess_total_product'];
unset($_SESSION['Cart']['sess_itemqtys']);
unset($_SESSION['Cart']['sess_total_price']);

for($i=0;$i<$totProduct;$i++){
    $_SESSION['Cart']['sess_itemqtys'][] = $QtyArr[$i];
    $_SESSION['Cart']['sess_total_price'] = $_SESSION['Cart']['sess_total_price'] + ($QtyArr[$i] * $_SESSION['Cart']['sess_itemprices'][$i]);
}

$var_msg = "Shopping cart update successfully";
echo $var_msg;exit;
?>