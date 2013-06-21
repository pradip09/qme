<?php
	include_once(TPATH_CLASS_APP."/class.store.php");
	$StoreObj = new Store();
	$start 	= $_REQUEST['start'];
	$iStoreCategoryId    = $_REQUEST['iStoreCategoryId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	$iMemberId = $_REQUEST['iMemberId'];
	$ssql = "AND iStoreCategoryId = ".$iStoreCategoryId. " AND iMemberId = ".$iMemberId;
	$ProductArr = $StoreObj->getAutomotiveProductList($var_limit,$ssql);
	$totRec = count($ProductArr);
	
	$tot_page = ceil($totRec/$recLimit);

	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}

	require_once(TPATH_CLASS_GEN.'class.browsepaging-ajax.php');

	$PagingObj = new Paging($totRec,$start,'displayallAutomotiveproduct');
	$ProductArr = $StoreObj->getAutomotiveProductList($var_limit,$ssql);
	
	$recmsg = $PagingObj->setMessage('Products');
	
	$pages = $PagingObj->displayBrowseJobPaging($tot_page);
	
	for($i = 0; $i < count($ProductArr); $i++)
	{
	    if(strlen($ProductArr[$i]['tDescription'])>121){
		$ProductArr[$i]['tDescription']=substr($ProductArr[$i]['tDescription'],0,120).'..';
		}
	}
	
	for($i=0;$i<count($ProductArr);$i++){
		
		if($ProductArr[$i]['vVehicleImage'] =='' && !is_file(TPATH_SERVER_IMAGES_STORE."/".$ProductArr[$i]['iStoreCategoryId']."/".$ProductArr[$i]['iProductId']."/2_".$ProductArr[$i]['vVehicleImage'])){
			$ProductArr[$i]['vVehicleImage'] = $tconfig["front_images"]."cap-img.png";
		}else{
			$ProductArr[$i]['vVehicleImage'] = $tconfig["tsite_upload_images_store"]."/".$ProductArr[$i]['iStoreCategoryId']."/".$ProductArr[$i]['iProductId']."/2_".$ProductArr[$i]['vVehicleImage'];
		}
	}
	$sql_user = "select * from members where iMemberId ='".$iMemberId."'";
	$db_user = $obj->MySQLSelect($sql_user);

	$smarty->assign("db_user", $db_user);

	
	$smarty->assign("ProductArr", $ProductArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iStoreId",$iStoreId);
?>

 