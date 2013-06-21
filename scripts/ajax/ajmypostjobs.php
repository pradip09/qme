<?php
	
	include_once(TPATH_CLASS_APP."/class.postjobs.php");
	$PostJobObj = new PostJobs();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_SESSION['iUserId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	
	if($iMemberId !=''){
		$ssql .= "eStatus='Active' AND iMemberId='".$iMemberId."' order by iPostJobId desc";
	}
	
	$PostJobArr = $PostJobObj->getAllpostjobs($var_limit,$ssql);
	$totRec = count($PostJobArr);
	
	$tot_page = ceil($totRec/$recLimit);

	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}

	require_once(TPATH_CLASS_GEN.'class.browsepaging-ajax.php');

	$PagingObj = new Paging($totRec,$start,'displaymyjobs');
	$PostJobArr = $PostJobObj->getAllpostjobs($var_limit,$ssql);
   
	for($i=0;$i<count($PostJobArr);$i++){
		
		if($PostJobArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_MUSIC_SONG."/".$PostJobArr[$i]['iMemberId']."/".$PostJobArr[$i]['vImage'])){
			$PostJobArr[$i]['vImage'] = $tconfig["front_images"]."user_img.png";
		}else{
			$PostJobArr[$i]['vImage'] = $tconfig["tsite_upload_music_song"].$PostJobArr[$i]['iMemberId']."/"."1_".$PostJobArr[$i]['vImage'];
		}
        $PostJobArr[$i]['tFullDescription'] = $PostJobArr[$i]['tDescription'];
		$PostJobArr[$i]['tDescription'] = $generalobj->limit_words($PostJobArr[$i]['tDescription'],25);
        $PostJobArr[$i][dAddedDate]=date('m-d-Y',strtotime($PostJobArr[$i][dAddedDate]));
	}
	$recmsg = $PagingObj->setMessage('Post Jobs');
	$pages = $PagingObj->displayBrowseJobPaging($tot_page);
	$member = "select * from members where iMemberId ='".$iMemberId."' ";
	$user = $obj->MySQLSelect($member);
	
	$smarty->assign("PostJobArr", $PostJobArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
	$smarty->assign("user",$user);
?>

 