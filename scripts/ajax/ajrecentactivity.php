<?php
	
	include_once(TPATH_CLASS_APP."/class.recentactivity.php");
	$RecentActivityObj = new RecentActivity();
	$iMemberId    = $_SESSION['iUserId'];
	$start 		= $_REQUEST['start'];
	$keyword = $_REQUEST['keyword'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
        $recLimit = 2; // my record limit
	$rec_limit 	= $recLimit ;
	$var_limit = " ";
	$sql_user = "select * from members where iMemberId='".$iMemberId."'";
	$db_user = $obj->MySQLSelect($sql_user);
	$relatedArr = explode(",",$db_user[0]['iSkillId']);
	$relatedArrIntrest = explode(",",$db_user[0]['iInterestId']);
	//$sql_mem = "select * from members";
	//$db_mem = $obj->MySQLSelect($sql_mem);
	for($k = 0 ; $k < count($db_user) ; $k++)
	    {
		$count ='';
		for($j = 0 ; $j < count($relatedArr) ; $j++)
		{
			$count++;
			
		}
		for($a = 0 ; $a < count($relatedArrIntrest) ; $a++)
		{
			$count++;
		   
		}
		//echo $count;
		if($count > 0)
		{
		    $matchId[$k] = $db_user[$k]['iMemberId'];
		    
		}
	    }
	   
	$matchIdArr = implode(",",$matchId);
	
	if($matchIdArr !=''){
		$ssql .= "(rs.iMemberId = (".$matchIdArr."))";
	}
	
	$RecentActivityArr = $RecentActivityObj->getRecentActivity($var_limit,$ssql);
	$totRec = count($RecentActivityArr);
//echo "<pre>";
//print_r($RecentActivityArr);exit;	
	$tot_page = ceil($totRec/$recLimit);

	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}


	require_once(TPATH_CLASS_GEN.'class.browsepaging-ajax.php');
	$PagingObj = new Paging($totRec,$start,'displayrecentactivity');
	$RecentActivityArr = $RecentActivityObj->getRecentActivity($var_limit,$ssql);
	
	for($i=0;$i<count($RecentActivityArr);$i++){
		
		if($RecentActivityArr[$i]['eType'] == 'Photo')
		{			
			if($RecentActivityArr[$i]['vImage'] == ''){
				$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$RecentActivityArr[$i]['vImage'] = $tconfig["tsite_upload_images_photo"].$RecentActivityArr[$i]['iMemberId']."/"."".$RecentActivityArr[$i]['vImage'];		
			}
			
		}
		if($RecentActivityArr[$i]['eType'] == 'PhotoCategory')		{
			
			if($RecentActivityArr[$i]['vImage'] == ''){
				$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$RecentActivityArr[$i]['vImage'] = $tconfig["tsite_upload_images_photo"].$RecentActivityArr[$i]['iMemberId']."/"."".$RecentActivityArr[$i]['vImage'];		
			}
		}
		if($RecentActivityArr[$i]['eType'] == 'Video')
		{			
			if($RecentActivityArr[$i]['vImage'] == ''){
				$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$RecentActivityArr[$i]['vImage'] = $tconfig["tsite_upload_images_video"].$RecentActivityArr[$i]['iMemberId']."/"."".$RecentActivityArr[$i]['vImage'];		
			}
		}
		if($RecentActivityArr[$i]['eType'] == 'VideoAlbum')
		{
			if($RecentActivityArr[$i]['vImage'] == ''){
				$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$RecentActivityArr[$i]['vImage'] = $tconfig["tsite_upload_images_video"].$RecentActivityArr[$i]['iMemberId']."/"."".$RecentActivityArr[$i]['vImage'];		
			}
		}
		if($RecentActivityArr[$i]['eType'] == 'SongAlbum')
		{
			if($RecentActivityArr[$i]['vImage'] == ''){
				$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$RecentActivityArr[$i]['vImage'] = $tconfig["tsite_upload_music_song"].$RecentActivityArr[$i]['iMemberId']."/"."".$RecentActivityArr[$i]['vImage'];		
			}
		}
		if($RecentActivityArr[$i]['eType'] == 'Blog')
		{
			
			if($RecentActivityArr[$i]['vImage'] == ''){
				$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$RecentActivityArr[$i]['vImage'] = $tconfig["tsite_upload_images_blog"].$RecentActivityArr[$i]['iMemberId']."/"."".$RecentActivityArr[$i]['vImage'];		
			}
		}
		if($RecentActivityArr[$i]['eType'] == 'Event')
		{
			if($RecentActivityArr[$i]['vImage'] == ''){
				$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$RecentActivityArr[$i]['vImage'] = $tconfig["tsite_upload_images_event"].$RecentActivityArr[$i]['iMemberId']."/"."".$RecentActivityArr[$i]['vImage'];		
			}
		}
		if($RecentActivityArr[$i]['eType'] == 'post_campaign')
		{
			if($RecentActivityArr[$i]['vImage'] == ''){
				$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$RecentActivityArr[$i]['vImage'] = $tconfig["tsite_upload_images_campaign"]."member"."/".$RecentActivityArr[$i]['iMemberId']."/"."".$RecentActivityArr[$i]['vImage'];
			
			}
		}
		if($RecentActivityArr[$i]['eType'] == 'Post_job')
		{
			if($RecentActivityArr[$i]['vProfileImage'] == ''){
			$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$RecentActivityArr[$i]['vImage'] = $tconfig["tsite_upload_images_member"].$RecentActivityArr[$i]['iMemberId']."/"."".$RecentActivityArr[$i]['vProfileImage'];	
		
			}
		}
		if($RecentActivityArr[$i]['eType'] == 'Member')
		{			
			if($RecentActivityArr[$i]['vImage'] == ''){
			
			$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$RecentActivityArr[$i]['vImage'] = $tconfig["tsite_upload_images_member"].$RecentActivityArr[$i]['iMemberId']."/"."".$RecentActivityArr[$i]['vImage'];		
			
			}
		}
		
		if($RecentActivityArr[$i]['eType'] == 'QmeIn')
		{			
			if($RecentActivityArr[$i]['vProfileImage'] == ''){			
			$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'admin_user.png';	
			}else{
			$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'admin_user.png';	
			
			}
		}
		if($RecentActivityArr[$i]['eType'] == 'approve_friend_request')
		{
			if($RecentActivityArr[$i]['vImage'] == ''){			
			$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$RecentActivityArr[$i]['vImage'] = $tconfig["tsite_upload_images_member"].$RecentActivityArr[$i]['vImage'];	
			
			}
		}
		
		
		$RecentActivityArr[$i]['dAddedDate'] = date("F jS Y", strtotime($RecentActivityArr[$i]['dAddedDate']));
		
		
		
		if($RecentActivityArr[$i]['eType'] == 'status_update' AND $RecentActivityArr[$i]['iPostMemberId'] != ''){
			$sql_user123 = "select * from members where iMemberId='".$RecentActivityArr[$i]['iPostMemberId']."'";
			$db_user123 = $obj->MySQLSelect($sql_user123);
			$RecentActivityArr[$i]['vName'] = $db_user123[0]['vName'];
			$RecentActivityArr[$i]['vMemberUrl'] = $db_user123[0]['vMemberUrl'];
			//$RecentActivityArr[$i]['vName'] = $db_user123[0]['vName'];
			if($db_user123[0]['vProfileImage'] == ''){
			$RecentActivityArr[$i]['vProfileImage'] = $tconfig["front_images"].'img_user.png';
			$RecentActivityArr[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$RecentActivityArr[$i]['vImage'] = $tconfig["tsite_upload_images_member"].$db_user123[0]['iMemberId']."/"."".$db_user123[0]['vProfileImage'];	
			$RecentActivityArr[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$db_user123[0]['iMemberId']."/"."".$db_user123[0]['vProfileImage'];	
			}
		}else{
			if($RecentActivityArr[$i]['vProfileImage'] == ''){
			$RecentActivityArr[$i]['vProfileImage'] = $tconfig["front_images"].'img_user.png';
			
			}else{
			
			$RecentActivityArr[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$RecentActivityArr[$i]['iMemberId']."/"."".$RecentActivityArr[$i]['vProfileImage'];	
			}
			
		}
	}
	//echo "<pre>";
	//print_r($RecentActivityArr);exit;
	
	
	$recmsg = $PagingObj->setMessage('Recent activity');
	$pages = $PagingObj->displayBrowseJobPaging($tot_page);
	
	$smarty->assign("db_recentactivities", $RecentActivityArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 
