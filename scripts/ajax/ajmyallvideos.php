<?php
	
	#echo "<pre>";
	#print_r($_REQUEST);exit;
	include_once(TPATH_CLASS_APP."/class.videoalbum.php");
	$VideoCategoryObj = new VideoCategory();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_SESSION['iUserId'];
	$iVideoAlbumId    = $_REQUEST['iVideoAlbumId'];
	
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	
	if($iMemberId !=''){
		$ssql .= "eStatus='Active' AND iMemberId='".$iMemberId."' AND iVideoAlbumId='".$iVideoAlbumId."'";
	}
	
	
	$VideosArr = $VideoCategoryObj->getVideos($var_limit,$ssql);
	
	
	
	//$totRec = count($VideosArr);
	
	//$tot_page = ceil($totRec/$recLimit);

	/*if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}*/


	//require_once(TPATH_CLASS_GEN.'class.browsepaging-ajax.php');

	//$PagingObj = new Paging($totRec,$start,'getallvideos');
	$VideosArr = $VideoCategoryObj->getVideos($var_limit,$ssql);

	for($i=0;$i<count($VideosArr);$i++){
		
		if($VideosArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_VIDEO."/".$VideosArr[$i]['iMemberId']."/".$VideosArr[$i]['vImage'])){
			$VideosArr[$i]['vImage'] = $tconfig["front_images"]."cap-img.png";
		}else{
			$VideosArr[$i]['vImage'] = $tconfig["tsite_upload_images_video"].$VideosArr[$i]['iMemberId']."/"."1_".$VideosArr[$i]['vImage'];
		}
	}
	
	/*for($i = 0; $i < count($PostJobArr); $i++)
	{
		$PostJobArr[$i]['tFullDescription']=$PostJobArr[$i]['tDescription'];
		if(strlen($PostJobArr[$i]['tDescription'])>100){
			$PostJobArr[$i]['tDescription']=substr($PostJobArr[$i]['tDescription'],0,99).'...';
		}
	}*/
	
	/*echo "<pre>";
	print_r($VideosArr);exit;*/
	
	//$recmsg = $PagingObj->setMessage('Videos');
	
	//$pages = $PagingObj->displayBrowseJobPaging($tot_page);
	
	
	$smarty->assign("VideosArr", $VideosArr);
	
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 