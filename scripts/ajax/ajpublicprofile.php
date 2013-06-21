<?php
 
	include_once(TPATH_CLASS_APP."/class.publicprofile.php");
	$publicprofileObj = new publicprofile();
	$start = $_REQUEST['start'];
	$iMemberId = $_REQUEST['iMemberId'];
	
	$sql_user = "select * from members where iMemberId='".$iMemberId."'";
	$db_user = $obj->MySQLSelect($sql_user);
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$var_limit = " ";
           
        $recent_activities = $publicprofileObj->recent_activitiesList($var_limit,$ssql,$iMemberId);
	/*echo "<pre>";
	print_r($recent_activities);exit;*/
        $totRec = count($recent_activities);
	
	$rec_limit = $start*3;
	$var_limit = "LIMIT 0, $rec_limit";
	$recent_activities = $publicprofileObj->recent_activitiesList($var_limit,$ssql,$iMemberId);
	$recent_imgs = $publicprofileObj->recent_imgs($iMemberId);
	
	/*echo "<pre>";
	print_r($recent_activities);exit;*/
	for($i=0;$i<count($recent_activities);$i++){
		
		$recent_activities[$i][dAddedDate]=date("M d, Y",strtotime($recent_activities[$i][dAddedDate]));
		
		$recent_activities[$i]['vProfileImage'] = $recent_imgs[0]['vProfileImage'];
		$Different[$i] = $generalobj->getDateDifference($recent_activities[$i]['dAddedDate'],date('Y-m-d H:i:s'),'a');
		if($Different[$i]['days'] != 0){
		$recent_activities[$i]['Differ'] = $Different[$i]['days'].' days '.$Different[$i]['hours'].' hours '.$Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] != 0){
			$recent_activities[$i]['Differ'] = $Different[$i]['hours'].' hours '.$Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] == 0 && $Different[$i]['minutes'] != 0){
			$recent_activities[$i]['Differ'] = $Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] == 0 && $Different[$i]['minutes'] == 0){
			$recent_activities[$i]['Differ'] = $Different[$i]['seconds'].' seconds ago';
		}
		$recent_activities[$i]['dAddedDate'] = date("F jS Y", strtotime($recent_activities[$i]['dAddedDate']));
		$recent_activities[$i]['eNameActivity'] = $generalobj->limit_words($recent_activities[$i]['eNameActivity'],6);
		if($recent_activities[$i]['eType'] == 'Photo')
		{
			$recent_activities[$i]['eNameActivity'] = 'Photo title : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/photo_detail/'.$db_user[0]['vMemberUrl'].'/'.$recent_activities[$i]['iTypeId'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';
			
			}else{
			
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
			if($recent_activities[$i]['vImage'] == ''){
				$recent_activities[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$recent_activities[$i]['vImage'] = $tconfig["tsite_upload_images_photo"].$recent_activities[$i]['iMemberId']."/"."".$recent_activities[$i]['vImage'];		
			}
			
		}
		if($recent_activities[$i]['eType'] == 'PhotoCategory')
		{
			$recent_activities[$i]['eNameActivity'] = 'Photo album : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/phalbum_detail/'.$db_user[0]['vMemberUrl'].'/'.$recent_activities[$i]['iTypeId'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';			
			}else{			
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
			if($recent_activities[$i]['vImage'] == ''){
				$recent_activities[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$recent_activities[$i]['vImage'] = $tconfig["tsite_upload_images_photo"].$recent_activities[$i]['iMemberId']."/"."".$recent_activities[$i]['vImage'];		
			}
		}
		if($recent_activities[$i]['eType'] == 'Video')
		{
			$recent_activities[$i]['eNameActivity'] = 'Video title : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/video_detail/'.$db_user[0]['vMemberUrl'].'/'.$recent_activities[$i]['iTypeId'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
			if($recent_activities[$i]['vImage'] == ''){
				$recent_activities[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$recent_activities[$i]['vImage'] = $tconfig["tsite_upload_images_video"].$recent_activities[$i]['iMemberId']."/"."".$recent_activities[$i]['vImage'];		
			}
		}
		if($recent_activities[$i]['eType'] == 'VideoAlbum')
		{
			$recent_activities[$i]['eNameActivity'] = 'Video album : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/vidalbum_detail/'.$db_user[0]['vMemberUrl'].'/'.$recent_activities[$i]['iTypeId'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
			if($recent_activities[$i]['vImage'] == ''){
				$recent_activities[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$recent_activities[$i]['vImage'] = $tconfig["tsite_upload_images_video"].$recent_activities[$i]['iMemberId']."/"."".$recent_activities[$i]['vImage'];		
			}
		}
		if($recent_activities[$i]['eType'] == 'Song')
		{
			$recent_activities[$i]['eNameActivity'] = 'Song title : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/song_detail/'.$db_user[0]['vMemberUrl'].'/'.$recent_activities[$i]['iTypeId'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
			
		}
		if($recent_activities[$i]['eType'] == 'SongAlbum')
		{
			$recent_activities[$i]['eNameActivity'] = 'Song album : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/songalbum_detail/'.$db_user[0]['vMemberUrl'].'/'.$recent_activities[$i]['iTypeId'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
			if($recent_activities[$i]['vImage'] == ''){
				$recent_activities[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$recent_activities[$i]['vImage'] = $tconfig["tsite_upload_music_song"].$recent_activities[$i]['iMemberId']."/"."".$recent_activities[$i]['vImage'];		
			}
		}
		if($recent_activities[$i]['eType'] == 'Blog')
		{
			$recent_activities[$i]['eNameActivity'] = 'Blog title : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/blog_detail/'.$db_user[0]['vMemberUrl'].'/'.$recent_activities[$i]['iTypeId'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
			if($recent_activities[$i]['vImage'] == ''){
				$recent_activities[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$recent_activities[$i]['vImage'] = $tconfig["tsite_upload_images_blog"].$recent_activities[$i]['iMemberId']."/"."".$recent_activities[$i]['vImage'];		
			}
		}
		if($recent_activities[$i]['eType'] == 'Event')
		{
			$recent_activities[$i]['eNameActivity'] = 'Event title : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/event_detail/'.$db_user[0]['vMemberUrl'].'/'.$recent_activities[$i]['iTypeId'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
			if($recent_activities[$i]['vImage'] == ''){
				$recent_activities[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$recent_activities[$i]['vImage'] = $tconfig["tsite_upload_images_event"].$recent_activities[$i]['iMemberId']."/"."".$recent_activities[$i]['vImage'];		
			}
		}
		if($recent_activities[$i]['eType'] == 'PostJob')
		{
			$recent_activities[$i]['eNameActivity'] = 'Job Post : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/job_detail/'.$db_user[0]['vMemberUrl'].'/'.$recent_activities[$i]['iTypeId'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
		}
		if($recent_activities[$i]['eType'] == 'Campaign')
		{
			$recent_activities[$i]['eNameActivity'] = 'Campaign title : '.$recent_activities[$i]['eNameActivity'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
			
		}
		if($recent_activities[$i]['eType'] == 'QmeIn')
		{
			$recent_activities[$i]['eNameActivity'] = 'Qme Connection : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/qmeconn_detail/'.$db_user[0]['vMemberUrl'].'/'.$recent_activities[$i]['iTypeId'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';
			$recent_activities[$i]['vImage'] = $tconfig["front_images"].'admin_user.png';	
			}else{
			$recent_activities[$i]['vImage'] = $tconfig["front_images"].'admin_user.png';	
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
		}
		if($recent_activities[$i]['eType'] == 'Member')
		{
			$recent_activities[$i]['eNameActivity'] = '';
			if($recent_activities[$i]['vImage'] == ''){			
			$recent_activities[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$recent_activities[$i]['vImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."".$recent_activities[$i]['vImage'];				
			}
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';			
			}else{			
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
		}
		if($recent_activities[$i]['eType'] == 'post_campaign')
		{
			$recent_activities[$i]['eNameActivity'] = 'Campaign title : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/postcamp_detail/'.$db_user[0]['vMemberUrl'].'/'.$recent_activities[$i]['iTypeId'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
			if($recent_activities[$i]['vImage'] == ''){
				$recent_activities[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$recent_activities[$i]['vImage'] = $tconfig["tsite_upload_images_campaign"]."member"."/".$recent_activities[$i]['iMemberId']."/"."7_".$recent_activities[$i]['vImage'];
			
			}
		}
		if($recent_activities[$i]['eType'] == 'Post_job')
		{
			$recent_activities[$i]['eNameActivity'] = 'Job Post : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/job_detail/'.$db_user[0]['vMemberUrl'].'/'.$recent_activities[$i]['iTypeId'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';
			$recent_activities[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$recent_activities[$i]['vImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."7_".$recent_activities[$i]['vProfileImage'];	
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
		}
		if($recent_activities[$i]['eType'] == 'approve_friend_request')
		{
			
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';
			$recent_activities[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$recent_activities[$i]['vImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['vImage'];	
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
			
		}
		if($recent_activities[$i]['eType'] == 'status_update' AND $recent_activities[$i]['iPostMemberId'] == '')
		{			
			$recent_activities[$i]['eNameActivity'] = 'Status : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/status_detail/'.$db_user[0]['vMemberUrl'].'/'.$recent_activities[$i]['iTypeId'];
			if($recent_activities[$i]['vProfileImage'] == ''){
			//$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			//$recent_activities[$i]['vImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
		}else if($recent_activities[$i]['eType'] == 'status_update'&& $recent_activities[$i]['iPostMemberId'] != ''){
			
			$sql_user123 = "select * from members where iMemberId='".$recent_activities[$i]['iPostMemberId']."'";
			$db_user123 = $obj->MySQLSelect($sql_user123);
			
			$recent_activities[$i]['eNameActivity'] = 'Status : '.$recent_activities[$i]['eNameActivity'];
			$recent_activities[$i]['link'] = $site_url.'/status_detail/'.$recent_activities[$i]['iPostMemberId'].'/'.$recent_activities[$i]['iTypeId'];
			$recent_activities[$i]['memurl'] = $site_url.'/'.$db_user123[0]['vMemberUrl'];
			if($db_user123[0]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';
			//$recent_activities[$i]['vImage'] = $tconfig["front_images"].'user_img_71.png';
			}else{
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$db_user123[0]['iMemberId']."/"."3_".$db_user123[0]['vProfileImage'];
			//$recent_activities[$i]['vImage'] = $tconfig["tsite_upload_images_member"].$db_user123[0]['iMemberId']."/"."3_".$db_user123[0]['vProfileImage'];
			}
		}
		if($recent_activities[$i]['eType'] ==''){
			if($recent_activities[$i]['vProfileImage'] == ''){
			$recent_activities[$i]['vProfileImage'] = $tconfig["front_images"].'user_img_71.png';	
			}else{
			$recent_activities[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$recent_activities[$i]['iMemberId']."/"."3_".$recent_activities[$i]['vProfileImage'];	
			}
		}
		
		
		
		
	}
	
	/*echo "<pre>";
	print_r($recent_activities);exit;*/
	
	
	$start++;
	$smarty->assign("totRec",$totRec);
	$smarty->assign("rec_limit",$rec_limit);
	$smarty->assign("start",$start);
	$smarty->assign("recent_imgs",$recent_imgs);
	$smarty->assign("recent_activities", $recent_activities);
	$smarty->assign("iMemberId",$iMemberId);
	
	
?>

 
