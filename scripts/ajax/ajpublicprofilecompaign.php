<?php
	
	include_once(TPATH_CLASS_APP."/class.campagin.php");
	$CampaginObj = new Campagin();
	$start 		= $_REQUEST['start'];
	$iMemberId = $_REQUEST['iMemberId'];
	
	//echo $iMemberId;exit; 
	$memid=$_SESSION['iUserId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 5; // my record limit
	$rec_limit 	= $recLimit;
	$var_limit = " ";
	
	$sql_res = "SELECT * FROM view_campaign WHERE iMemberId='".$iMemberId."' AND dDecline ='1'";
	$db_res = $obj->MySQLSelect($sql_res);
	
	for($j=0;$j<count($db_res);$j++)
	{
		$id[$j]=$db_res[$j]['iCampaignId'];
	}
	$camid=implode('\',\'',$id);
	             
	if($iMemberId !=''){
		$ssql .= "AND iMemberId='".$iMemberId."' AND iCampaignId NOT IN('".$camid."')";
	}
        
	$refcat = $_REQUEST['refcat'];
	$CampaginArr = $CampaginObj->getAllCampaginList($var_limit,$ssql);
	//echo "<pre>";
	//print_r($db_res);exit;
	
	$totRec = count($CampaginArr);
	$tot_page = ceil($totRec/$recLimit);
	
	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}

	/*require_once(TPATH_CLASS_GEN.'class.browsepaging-ajax.php');

	$PagingObj = new Paging($totRec,$start,'displaypublicprofilecompaign');
	$CampaginArr = $CampaginObj->getAllCampaginList($var_limit,$ssql);*/
	
	for($i = 0; $i < count($CampaginArr); $i++)
	{
		$CampaginArr[$i]['tFullContent']=$CampaginArr[$i]['tContent'];
	        if(strlen($CampaginArr[$i]['tContent'])>108){
		
		$CampaginArr[$i]['tContent']=substr($CampaginArr[$i]['tContent'],0,107).'..';
		}
		if($CampaginArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_CAMPAIGN."/".$CampaginArr[$i]['iMemberId']."/".$CampaginArr[$i]['vImage'])){
			$CampaginArr[$i]['vImage'] = $tconfig["front_images"]."cap-img.png";
		}else{
			$CampaginArr[$i]['vImage'] = $tconfig["tsite_upload_images_campaign"].'member/'.$CampaginArr[$i]['iMemberId']."/"."2_".$CampaginArr[$i]['vImage'];
		}
		
		$sql_res1 = "SELECT * FROM view_campaign WHERE iCampaignId='".$CampaginArr[$i]['iCampaignId']."' AND iMemberId='".$iMemberId."'";
		$db_res1= $obj->MySQLSelect($sql_res1);
		
		$CampaginArr[$i]['iViewCommerical'] = $db_res1[0]['iViewCommerical'];
		$CampaginArr[$i]['iRadioAdd'] = $db_res1[0]['iRadioAdd'];
		$CampaginArr[$i]['iViewWebsite'] = $db_res1[0]['iViewWebsite'];
		$CampaginArr[$i]['iAccept'] = $db_res1[0]['iAccept'];
	}
	//echo count($CampaginArr);exit;
	//echo "<pre>";
	//print_r($CampaginArr);exit;
	//$recmsg = $PagingObj->setMessage('Campaigns');
	//$pages = $PagingObj->displayBrowseCampaignPaging($tot_page);
  
	$smarty->assign("CampaginArr", $CampaginArr);
	//$smarty->assign("pages",$pages);
	$smarty->assign("memid",$memid);
	$smarty->assign("iMemberId",$iMemberId);
?>

 