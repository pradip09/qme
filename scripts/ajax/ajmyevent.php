<?php
	include_once(TPATH_CLASS_APP."/class.event.php");
	$EventObj = new Event();
	$start = $_REQUEST['start'];
	$iMemberId = $_SESSION['iUserId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 6; // my record limit
	$rec_limit 	= $recLimit ;
	$var_limit = " ";           
                 
	$refcat = $_REQUEST['refcat'];
	$event_info = $EventObj->getEventList($var_limit,$ssql,$iMemberId);
	
	
	$totRec = count($event_info);
	$tot_page = ceil($totRec/$recLimit);
	
	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}

	
	require_once(TPATH_CLASS_GEN.'class.browsepaging-ajax.php');

	$PagingObj = new Paging($totRec,$start,'displaymyevent');
	$event_info = $EventObj->getEventList($var_limit,$ssql,$iMemberId);
    
	for($j = 0; $j < count($event_info); $j++)
	{
	$event_info[$j]['dEventDate'] = date('m-d-Y', strtotime($event_info[$j]['dEventDate']));
	}
	for($i=0;$i<count($event_info);$i++){
		
		if($event_info[$i]['vEventImage'] =='' && !is_file(TPATH_SERVER_IMAGES_EVENT."/".$event_info[$i]['iMemberId']."/".$event_info[$i]['vEventImage'])){
			$event_info[$i]['vEventImage'] = $tconfig["front_images"]."user_img.png";
		}else{
			$event_info[$i]['vEventImage'] = $tconfig["tsite_upload_images_event"].$event_info[$i]['iMemberId']."/"."1_".$event_info[$i]['vEventImage'];
		}
		$event_info[$i]['vDescription'] = $generalobj->limit_words($event_info[$i]['vDescription'],28);
	}
    
    
	$recmsg = $PagingObj->setMessage('Event');
	$pages = $PagingObj->displayBrowseCampaignPaging($tot_page);
	$smarty->assign("event_info", $event_info);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 