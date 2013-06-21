<?php

	include_once(TPATH_CLASS_APP."/class.friend_request.php");
	$FriendObj = new Friend_request();
	$start = $_REQUEST['start'];
	$iMemberId = $_REQUEST['iMemberId'];
	
	$sql_user = "select * from members where iMemberId='".$iMemberId."'";
	$db_user = $obj->MySQLSelect($sql_user);
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$var_limit = " ";
           
        

        $ssql = "qf.iFriendId ='".$iMemberId."' AND qf.eStatus = 'Approve' ORDER BY qf.dApproveDate";
        $FriendArr = $FriendObj->recent_friendList($var_limit,$ssql);

        $totRec = count($FriendArr);   
     
	$rec_limit = $start*5;
	$var_limit = "LIMIT 0, $rec_limit";
        $ssql = "qf.iFriendId ='".$iMemberId."' AND qf.eStatus = 'Approve' ORDER BY qf.dApproveDate DESC";
	$FriendArr = $FriendObj->recent_friendList($var_limit,$ssql);
#echo "<pre>";
#print_r($FriendArr);exit;
        for($i=0;$i<count($FriendArr);$i++){
		$Different[$i] = $generalobj->getDateDifference($FriendArr[$i]['ApproveDate'],date('Y-m-d H:i:s'),'a');
		if($Different[$i]['days'] != 0){
		$FriendArr[$i]['Differ'] = $Different[$i]['days'].' days '.$Different[$i]['hours'].' hours '.$Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] != 0){
			$FriendArr[$i]['Differ'] = $Different[$i]['hours'].' hours '.$Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] == 0 && $Different[$i]['minutes'] != 0){
			$FriendArr[$i]['Differ'] = $Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] == 0 && $Different[$i]['minutes'] == 0){
			$FriendArr[$i]['Differ'] = $Different[$i]['seconds'].' seconds ago';
		}
   		if($FriendArr[$i]['vProfileImage'] =='' && !is_file(TPATH_SERVER_IMAGES_MEMBER."/".$FriendArr[$i]['iMemberId']."/3_".$FriendArr[$i]['vProfileImage'])){
			$FriendArr[$i]['vProfileImage'] = $tconfig["front_images"]."user_img_67.png";
		}else{
			$FriendArr[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$FriendArr[$i]['iMemberId']."/"."3_".$FriendArr[$i]['vProfileImage'];
		}

		$FriendArr[$i]['ApproveDate'] = date("F jS Y", strtotime($FriendArr[$i]['ApproveDate']));
	}
	
	//echo "<pre>";
	//print_r($FriendArr);exit;
	$start++;
	$smarty->assign("totRec",$totRec);
	$smarty->assign("rec_limit",$rec_limit);
	$smarty->assign("start",$start);
	$smarty->assign("recent_imgs",$recent_imgs);
	$smarty->assign("FriendArr", $FriendArr);
	$smarty->assign("iMemberId",$iMemberId);
	
	
?>

 