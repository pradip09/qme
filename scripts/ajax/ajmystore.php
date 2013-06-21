<?php	
	include_once(TPATH_CLASS_APP."/class.store.php");
	$StoreObj = new Store();
	$start 	= $_REQUEST['start'];
	$iMemberId    = $_SESSION['iUserId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	$ssql = "sa.iMemberId = ".$iMemberId;
	$StoreArr = $StoreObj->getStoreList($var_limit,$ssql);
	$totRec = count($StoreArr);
	
	$tot_page = ceil($totRec/$recLimit);

	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}

	require_once(TPATH_CLASS_GEN.'class.browsepaging-ajax.php');

	$PagingObj = new Paging($totRec,$start,'displayallstore');
	$StoreArr = $StoreObj->getStoreList($var_limit,$ssql);
	
	for($i=0;$i<count($StoreArr);$i++){
		
		if($StoreArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_STORE."/".$StoreArr[$i]['iMemberId']."/".$StoreArr[$i]['vImage'])){
			$StoreArr[$i]['vImage'] = $tconfig["front_images"]."noimage.png";
		}else{
			$StoreArr[$i]['vImagePopup'] = $tconfig["tsite_upload_images_store"].$StoreArr[$i]['iMemberId']."/".$StoreArr[$i]['vImage'];
			$StoreArr[$i]['vImage'] = $tconfig["tsite_upload_images_store"].$StoreArr[$i]['iMemberId']."/"."2_".$StoreArr[$i]['vImage'];
			
		}
	}
 
	$recmsg = $PagingObj->setMessage('Stores');
	$pages = $PagingObj->displayBrowseJobPaging($tot_page);
	
	
	$smarty->assign("StoreArr", $StoreArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 
