<?
	include_once(TPATH_CLASS_APP."/Shopcart.class.php");
	$Cartobj = new Cart();
	$cartmode = 	$_GET['mode'];	
	$fPrice = 	    $_GET['fPrice'];	
	$iQty = 	    $_GET['iQty'];	
	$iProductId = $_GET['productId'];
	$categoryid = $_GET['categoryid'];
	
	if($categoryid == '1')
	{
		$sql = "SELECT iProductId, vProductName, fPrice FROM product_general_item WHERE iProductId = '".$iProductId."' AND eStatus='Active'";
		$db_sql = $obj->MySQLSelect($sql);
        $categorytype = 'General Items';
	}else if($categoryid == '2'){
	   $sql = "SELECT iProductId, vProductName, fPrice FROM product_clothing_accessories WHERE iProductId = '".$iProductId."' AND eStatus='Active'";
		$db_sql = $obj->MySQLSelect($sql);
        $categorytype = 'Clothing and Accessories';
	}
	
	$productname = $db_sql[0]['vProductName'];
	if($cartmode == 'Add'){
		
		$CartArr = array(
			"mode" =>$cartmode,
			"itemqtys" =>$iQty,
			"iProductId"=>$iProductId,
			"productname" =>$productname,
			"itemprices" =>$fPrice,
			"categoryid" =>$categoryid,
            "categorytype" =>$categorytype,
		);
	
		
		$data = $Cartobj->CartProduct($CartArr);
		echo $data;exit;
	}else if($cartmode == 'Update'){
	$CartArr = array(
			"mode" =>$cartmode,
			"itemqtys" =>$iQty,
			"iProductId"=>$iProductId,
			"productname" =>$productname,
			"itemprices" =>$fPrice,
			"categoryid" =>$categoryid,
            "categorytype" =>$categorytype,
		);
		
		$data = $Cartobj->CartProduct($CartArr);
		echo $data;exit;
	}else if($cartmode == 'Delete'){
		$CartArr = array(
			"mode" =>$cartmode,
			"itemqtys" =>$iQty,
			"iProductId"=>$iProductId,
			"productname" =>$productname,
			"itemprices" =>$fPrice,
			"categoryid" =>$categoryid,
            "categorytype" =>$categorytype,
		);
		
		$data = $Cartobj->CartProduct($CartArr);
		//$data = $data.'|success1';
		echo $data;exit;
	}else if($cartmode == 'RemoveAll'){
		$CartArr = array(
			"mode" =>$cartmode,
			"itemqtys" =>$iQty,
			"iProductId"=>$iProductId,
			"productname" =>$productname,
			"itemprices" =>$fPrice,
			"categoryid" =>$categoryid,
            "categorytype" =>$categorytype,
		);
		
		$data = $Cartobj->CartProduct($CartArr);
		echo $data;exit;
	}
    
    if($Cart->itemcount > 0)
	{
		$cart_rec = $Cart->get_all_contents();
		$cart_total = $Cart->total;
	}


$totprice = $_SESSION['Cart']['sess_total_price']+$CREDIT_CARD_PROCESSING_FEE;
$totRec = count($_SESSION['Cart']['sess_vSKUUPC']);
exit();
?>
