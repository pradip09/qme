<?php
	include_once(TPATH_CLASS_APP."/class.product.php");
	$ProductObj = new Product();
	$start 		= $_REQUEST['start'];
	$keyword = $_REQUEST['keyword'];
	$iCategoryId = $_REQUEST['refcat'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
        $rec_limit 	= $FRONT_REC_LIMIT_ALL;
	$var_limit = " ";
	
	if($iCategoryId !=''){
        	$ssql.= " AND iParentId = '".$iCategoryId."'";
	}	

	$CategoryArr = $ProductObj->getCategoryList($var_limit,$ssql);
	
	$totRec = count($CategoryArr);
	
	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}
	require_once(TPATH_CLASS_GEN.'class.paging-ajax.php');
	$PagingObj = new Paging($totRec,$start,'GetCategory');
	$CategoryArr = $ProductObj->getCategoryList($var_limit,$ssql);
        for($i=0;$i<count($CategoryArr);$i++){
		
		if(strlen($CategoryArr[$i]['vCategory'])>15){
			$CategoryArr[$i]['vCategory']=substr($CategoryArr[$i]['vCategory'],0,14).'..';
		}
		
		if($CategoryArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_CATEGORY."/".$CategoryArr[$i]['vImage'])){
			$CategoryArr[$i]['vImage'] = $tconfig["front_images"]."noimage.png";
		}else{
			$CategoryArr[$i]['vImage'] = $tconfig["tsite_upload_images_category"]."1_".$CategoryArr[$i]['vImage'];
		}
	}
	$recmsg = $PagingObj->setMessage('Categor&iacute;a');
	$pages = $PagingObj->displayPaging();
  
	$smarty->assign("CategoryArr", $CategoryArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
?>

 