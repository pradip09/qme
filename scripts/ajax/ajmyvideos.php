<?php
	
	
	include_once(TPATH_CLASS_APP."/class.videoalbum.php");
	$VideoCategoryObj = new VideoCategory();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_SESSION['iUserId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 6; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	
	if($iMemberId !=''){
		$ssql .= "va.eStatus='Active' AND va.iMemberId='".$iMemberId."'";
	}
	
	$VideoCategoryArr = $VideoCategoryObj->getAllvideoalbums($var_limit,$ssql);
	$totRec = count($VideoCategoryArr);
	
	for($i=0;$i<count($VideoCategoryArr);$i++){
		
		if($VideoCategoryArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_VIDEO."/".$VideoCategoryArr[$i]['iMemberId']."/".$VideoCategoryArr[$i]['vImage'])){
			$VideoCategoryArr[$i]['vImage'] = $tconfig["front_images"]."vedio-img_old.gif";
		}else{
			$VideoCategoryArr[$i]['vImage'] = $tconfig["tsite_upload_images_video"].$VideoCategoryArr[$i]['iMemberId']."/"."1_".$VideoCategoryArr[$i]['vImage'];
		}
	}
	
	$smarty->assign("VideoCategoryArr", $VideoCategoryArr);
	
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 