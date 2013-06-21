<?php
$productidstr = $_REQUEST['productidstr'];
$cartproductArr = explode(",",$productidstr);


if(count($cartproductArr) > 0){
    for($i=0;$i<count($cartproductArr);$i++){
        $key=array_search($cartproductArr[$i],$_SESSION['Cart']['sess_iProductId']);
        $sql = "SELECT iProductId, vTitle,fPrice,vImage as productimage,vProductCode FROM products WHERE iProductId = '".$cartproductArr[$i]."'";				
        $db_sql = $obj->MySQLSelect($sql);
        $price = ($_SESSION['Cart']['sess_itemqtys'][$key] * $_SESSION['Cart']['sess_itemprices'][$key]);
        $total_price = $_SESSION['Cart']['sess_total_price'] -$price;
        $_SESSION['Cart']['sess_total_price'] = $total_price;
        $_SESSION['Cart']['sess_total_product']=$_SESSION['Cart']['sess_total_product'] - 1;
        array_splice($_SESSION['Cart']['sess_itemqtys'],$key,1);
        array_splice($_SESSION['Cart']['sess_productname'],$key,1);
        array_splice($_SESSION['Cart']['sess_iProductId'],$key,1);
        array_splice($_SESSION['Cart']['sess_itemprices'],$key,1);
        array_splice($_SESSION['Cart']['sess_code'],$key,1);
        if($_SESSION['Cart']['sess_total_product'] == 0){
		$_SESSION['Cart']['sess_total_price'] = '0.00';
	}
    }
    $var_msg="Producto eliminados con &eacute;xito desde el carro.";
}else{
 $var_msg="El producto no existe en el carro.";   
}

echo $var_msg;exit;

?>