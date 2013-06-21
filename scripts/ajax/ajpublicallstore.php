<?php
	
	include_once(TPATH_CLASS_APP."/class.store.php");
	$StoreObj = new Store();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_REQUEST['UserId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	
	if($iMemberId !=''){
		$ssql .= "eStatus='Active' AND iMemberId='".$iMemberId."'";
	}
	
	$StoreArr = $StoreObj->geStore($var_limit,$ssql);
	
	for($i=0;$i<count($StoreArr);$i++){
		
		if($StoreArr[$i]['vStoreImage'] =='' && !is_file(TPATH_SERVER_IMAGES_STORE."/".$StoreArr[$i]['iStoreId']."/".$StoreArr[$i]['vStoreImage'])){
			$StoreArr[$i]['vStoreImage'] = $tconfig["front_images"]."noimage.png";
		}else{
			$StoreArr[$i]['vStoreImage'] = $tconfig["tsite_upload_images_store"].$StoreArr[$i]['iStoreId']."/".$StoreArr[$i]['vStoreImage'];
		}
	}
	
	$sql = "select * from members where iMemberId = '".$_REQUEST['UserId']."'";
	$db_code = $obj->MySQLSelect($sql);
	$code = $db_code[0]['vMemberUrl'];	

	$smarty->assign("code", $code);
	$smarty->assign("StoreArr", $StoreArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 