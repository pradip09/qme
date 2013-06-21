<?php

	include_once(TPATH_CLASS_APP."/class.videoalbum.php");
	$VideoCategoryObj = new VideoCategory();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_REQUEST['UserId'];
	$CategoryId    = $_REQUEST['iCatVideoId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	
	if($iMemberId !=''){
		$ssql .= "eStatus='Active' AND iMemberId='".$iMemberId."' AND iVideoAlbumId='".$CategoryId."'";
	}
	
	$VideoArr = $VideoCategoryObj->getVideos($var_limit,$ssql);
	
	for($i=0;$i<count($VideoArr);$i++){
		
		if($VideoArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_VIDEO."/".$VideoArr[$i]['iMemberId']."/".$VideoArr[$i]['vImage'])){
			$VideoArr[$i]['vImage'] = $tconfig["front_images"]."noimage.png";
		}else{
			$VideoArr[$i]['vImage'] = $tconfig["tsite_upload_images_video"].$VideoArr[$i]['iMemberId']."/".$VideoArr[$i]['vImage'];
		}
	}
	
	$sql_category = "Select * from video where iMemberId = '".$iMemberId."' order by iVideoId desc limit 1";
	$db_albums = $obj->MySQLSelect($sql_category);
	
	if($db_albums[0]['vImage'] != ''){
		$db_albums[0]['vImage']=$tconfig["tsite_upload_images_video"].$db_albums[0]['iMemberId']."/".$db_albums[0]['vImage'];
	}
//echo "<pre>";
//print_r($vid);exit;
	$smarty->assign("vid", $vid);
	$smarty->assign("db_albums", $db_albums);
	$smarty->assign("VideosArr", $VideoArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 