<?php

	include_once(TPATH_CLASS_APP."/class.friend_request.php");
	$FriendObj = new Friend_request();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_SESSION['iUserId'];
	$rec_limit 	= 5;
	$var_limit = " ";
	
        $ssql = "qf.iFriendId = '".$_SESSION['iUserId']."' AND qf.eStatus = 'Pending'";
	$FriendArr = $FriendObj->getPendingList($var_limit,$ssql);
	$totRec = count($FriendArr);
	
	for($i=0;$i<count($FriendArr);$i++){
		
		if($FriendArr[$i]['vProfileImage'] =='' && !is_file(TPATH_SERVER_IMAGES_MEMBER."/".$FriendArr[$i]['iMemberId']."/".$FriendArr[$i]['vProfileImage'])){
			$FriendArr[$i]['vProfileImage'] = $tconfig["front_images"]."user_img.png";
		}else{
			$FriendArr[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$FriendArr[$i]['iMemberId']."/"."1_".$FriendArr[$i]['vProfileImage'];
		}
	}
//echo "<pre>";print_r($FriendArr);
	
	$smarty->assign("FriendArr", $FriendArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 