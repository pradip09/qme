<?php
	include_once(TPATH_CLASS_APP."/class.postcampiagn.php");
	$PostCampiagnObj = new PostCampiagn();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_SESSION['iUserId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	
	if($iMemberId !=''){
		$ssql .= "eStatus='Active' AND iMemberId='".$iMemberId."' order by iCampaignId Desc";
	}
	
	$PostCampiagnArr = $PostCampiagnObj->getAllPostCampiagn($var_limit,$ssql);
	$totRec = count($PostCampiagnArr);
	
	$tot_page = ceil($totRec/$recLimit);

	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}


	require_once(TPATH_CLASS_GEN.'class.browsepaging-ajax.php');

	$PagingObj = new Paging($totRec,$start,'displaymypostcampaign');
	$PostCampiagnArr = $PostCampiagnObj->getAllPostCampiagn($var_limit,$ssql);

	for($i=0;$i<count($PostCampiagnArr);$i++){
		
		if($PostCampiagnArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_BLOG."/".$PostCampiagnArr[$i]['iMemberId']."/".$PostCampiagnArr[$i]['vImage'])){
			$PostCampiagnArr[$i]['vImage'] = $tconfig["front_images"]."1_nomusic_img.jpg";
		}else{
			$PostCampiagnArr[$i]['vImage'] = $tconfig["tsite_upload_images_campaign"]."member"."/".$PostCampiagnArr[$i]['iMemberId']."/"."2_".$PostCampiagnArr[$i]['vImage'];
		}
	}
	for($i = 0; $i < count($PostCampiagnArr); $i++)
	{
		$PostCampiagnArr[$i]['tFullContent']=$PostCampiagnArr[$i]['tContent'];
		if(strlen($PostCampiagnArr[$i]['tContent'])>40){
			$PostCampiagnArr[$i]['tContent']=substr($PostCampiagnArr[$i]['tContent'],0,39).'...';
		}
	}
	
	$recmsg = $PagingObj->setMessage('Campaigns');
	$pages = $PagingObj->displayBrowseJobPaging($tot_page);
	$smarty->assign("CampaginArr", $PostCampiagnArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 