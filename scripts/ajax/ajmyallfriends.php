<?php

	include_once(TPATH_CLASS_APP."/class.friend_request.php");
	$FriendObj = new Friend_request();
	$start = $_REQUEST['start'];
	$iMemberId = $_SESSION['iUserId'];
	$FRONT_REC_LIMIT_ALL = 10;
	$var_limit = " ";
        $rec_limit = 10;
        $ssql = "qf.iFriendId = '".$iMemberId."' AND (qf.eStatus = 'Approve' OR qf.eStatus = 'Blocked')";
	
        $FriendArr = $FriendObj->myallfriend($var_limit,$ssql);
        $totRec = count($FriendArr);
	//exit;
	$tot_page = ceil($totRec/$recLimit);
           
        if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}


	require_once(TPATH_CLASS_GEN.'class.browsepaging-ajax.php');

	$PagingObj = new Paging($totRec,$start,'displaymyallfriends');
	$FriendArr = $FriendObj->myallfriend($var_limit,$ssql);
        
        for($i=0;$i<count($FriendArr);$i++){
		
		if($FriendArr[$i]['vProfileImage'] =='' && !is_file(TPATH_SERVER_IMAGES_MEMBER."/".$FriendArr[$i]['iMemberId']."/".$FriendArr[$i]['vProfileImage'])){
			$FriendArr[$i]['vProfileImage'] = $tconfig["front_images"]."user_img.png";
		}else{
			$FriendArr[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$FriendArr[$i]['iMemberId']."/"."1_".$FriendArr[$i]['vProfileImage'];
		}
		$FriendArr[$i]['ApproveDate'] = date('m-d-Y',strtotime($FriendArr[$i]['ApproveDate']));
	}
	
	#echo "<pre>";
	#print_r($FriendArr);exit;
	$recmsg = $PagingObj->setMessage('Friends');
	$pages = $PagingObj->displayBrowseJobPaging($tot_page);
        
        
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("FriendArr", $FriendArr);
	$smarty->assign("iMemberId",$iMemberId);
	
?>

 