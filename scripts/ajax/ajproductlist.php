<?php

	include_once(TPATH_CLASS_APP."/class.product.php");
	$ProductObj = new Product();
	$start 		= $_REQUEST['start'];
	$keyword = $_REQUEST['keyword'];
	$iCategoryId = $_REQUEST['iCategoryId'];
	$iParentId = $_REQUEST['iParentId'];
	$iMemberId    = $_REQUEST['iMemberId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
        $rec_limit 	= $FRONT_REC_LIMIT_ALL;
	$var_limit = " ";
	$refcat = $_REQUEST['refcat'];
	
	if($refcat !=''){
		$ssql = " AND iCategoryId = '".$refcat."'";
	}
	$ProductArr = $ProductObj->getProductList($var_limit,$ssql);
	$totRec = count($ProductArr);
	
	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}
	require_once(TPATH_CLASS_GEN.'class.paging-ajax.php');
	$PagingObj = new Paging($totRec,$start,'GetProducts');
	$ProductArr = $ProductObj->getProductList($var_limit,$ssql);

	for($i=0;$i<count($ProductArr);$i++){
		
		if(strlen($ProductArr[$i]['vTitle'])>15){
			$ProductArr[$i]['vTitle']=substr($ProductArr[$i]['vTitle'],0,14).'..';
		}
		
		if($ProductArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_PRODUCT."/".$ProductArr[$i]['iProductId']."/".$ProductArr[$i]['vImage'])){
			$ProductArr[$i]['vImage'] = $tconfig["front_images"]."noimage.png";
		}else{
			$ProductArr[$i]['vImage'] = $tconfig["tsite_upload_images_product"].$ProductArr[$i]['iProductId']."/"."1_".$ProductArr[$i]['vImage'];
		}
	}
	$recmsg = $PagingObj->setMessage('producto');
	$pages = $PagingObj->displayPaging();
	
	$smarty->assign("ProductArr", $ProductArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 