<?php
	include_once(TPATH_CLASS_APP."/class.store.php");
	$StoreObj = new Store();
	$start 	= $_REQUEST['start'];
	$useid = $_SESSION['iUserId'];
	$iStoreCategoryId    = $_REQUEST['iStoreCategoryId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	$iMemberId = $_REQUEST['iMemberId'];
	$ssql = "AND iStoreCategoryId = ".$iStoreCategoryId . " AND iMemberId =".$iMemberId;
	$ProductArr = $StoreObj->getClothingProductList($var_limit,$ssql);
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

	$PagingObj = new Paging($totRec,$start,'displayallClothingproduct('.$start.','.$iStoreCategoryId.')');
	$ProductArr = $StoreObj->getClothingProductList($var_limit,$ssql);

	
	$recmsg = $PagingObj->setMessage('Products');
	
	$pages = $PagingObj->displayBrowseJobPaging($tot_page);
	
	for($i=0;$i<count($ProductArr);$i++){
		if(strlen($ProductArr[$i]['tDescription'])>121){
			$ProductArr[$i]['tDescription']=substr($ProductArr[$i]['tDescription'],0,120).'..';
		}
		
		if($ProductArr[$i]['vProductImage'] =='' || !is_file(TPATH_SERVER_IMAGES_STORE."/".$ProductArr[$i]['iStoreCategoryId']."/".$ProductArr[$i]['iProductId']."/2_".$ProductArr[$i]['vProductImage'])){
			$ProductArr[$i]['vProductImage'] = $tconfig["front_images"]."noimage.jpg";
		}else{
			$ProductArr[$i]['vProductImage'] = $tconfig["tsite_upload_images_store"].$ProductArr[$i]['iStoreCategoryId']."/".$ProductArr[$i]['iProductId']."/2_".$ProductArr[$i]['vProductImage'];
		}
	}
	$sql_userr = "select * from members where iMemberId ='".$useid."'";
	$db_userr = $obj->MySQLSelect($sql_userr);
	$url=$db_userr[0]['vMemberUrl'];
	
	
	$sql_user = "select * from members where iMemberId ='".$iMemberId."'";
	$db_user = $obj->MySQLSelect($sql_user);
	$memurl=$db_user[0]['vMemberUrl'];
	
	$smarty->assign("db_user", $db_user);
	$smarty->assign("memurl", $memurl);
	$smarty->assign("url", $url);
	
	$smarty->assign("ProductArr", $ProductArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iStoreId",$iStoreId);
?>