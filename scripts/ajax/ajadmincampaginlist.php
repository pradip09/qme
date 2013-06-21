<?php
	include_once(TPATH_CLASS_APP."/class.campagin.php");
	$CampaginObj = new Campagin();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_REQUEST['iMemberId'];
	$memid=$_SESSION['iUserId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
        $rec_limit 	= $FRONT_REC_LIMIT_ALL;
	$var_limit = " ";
	
	$sql_res = "SELECT * FROM view_campaign WHERE iMemberId='".$memid."' AND dDecline ='1'";
	$db_res= $obj->MySQLSelect($sql_res);
	
	for($j=0;$j<count($db_res);$j++)
	{
		$id[$j]=$db_res[$j]['iCampaignId'];
	}
	$camid=implode('\',\'',$id);
	$ssql = " AND iAdminId !='0' AND iCampaignId NOT IN('".$camid."')";
	//echo "<pre>";
	//print_r($id);exit;
        $refcat = $_REQUEST['refcat'];
	$CampaginArr = $CampaginObj->getCampaginList($var_limit,$ssql);
	
        $totRec = count($CampaginArr);
	
	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}
	
	require_once(TPATH_CLASS_GEN.'class.paging-ajax.php');
	$PagingObj = new Paging($totRec,$start,'displayadmincapagin');
	$CampaginArr = $CampaginObj->getCampaginList($var_limit,$ssql);
	
	for($i = 0; $i < count($CampaginArr); $i++)
	{
		
		$CampaginArr[$i]['tFullContent']=$CampaginArr[$i]['tContent'];
	        if(strlen($CampaginArr[$i]['tContent'])>108){
		$CampaginArr[$i]['tFullContent']=$CampaginArr[$i]['tContent'];
		$CampaginArr[$i]['tContent']=substr($CampaginArr[$i]['tContent'],0,107).'..';
		}
		
		$sql_res1 = "SELECT * FROM view_campaign WHERE iCampaignId='".$CampaginArr[$i]['iCampaignId']."' AND iMemberId='".$_SESSION['iUserId']."'";
		$db_res1= $obj->MySQLSelect($sql_res1);
		
		$CampaginArr[$i]['iViewCommerical'] = $db_res1[0]['iViewCommerical'];
		$CampaginArr[$i]['iRadioAdd'] = $db_res1[0]['iRadioAdd'];
		$CampaginArr[$i]['iViewWebsite'] = $db_res1[0]['iViewWebsite'];
		$CampaginArr[$i]['iAccept'] = $db_res1[0]['iAccept'];
		
	}
	
	//echo "<pre>";
	//print_r($CampaginArr);exit;
	
	
	$recmsg = $PagingObj->setMessage('Campaigns');
	$pages = $PagingObj->displayPaging();
	
	$smarty->assign("CampaginArr", $CampaginArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
	$smarty->assign("memid",$memid);

?>

 