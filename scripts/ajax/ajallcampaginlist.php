<?php
	
	include_once(TPATH_CLASS_APP."/class.campagin.php");
	$CampaginObj = new Campagin();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_REQUEST['iMemberId'];
	$memid=$_SESSION['iUserId'];
	$searchtext = $_REQUEST['searchtext'];
	$searchindustry = $_REQUEST['searchindustry'];
	$searchcountry = $_REQUEST['searchcountry'];
	$searchstate = $_REQUEST['searchstate'];
	$searchzip = $_REQUEST['searchzip'];
	
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 5; // my record limit
        $rec_limit 	= $recLimit ;
	$var_limit = " ";
	
	$sql_mem = "SELECT * FROM members ";
	$db_mem= $obj->MySQLSelect($sql_mem);
	
	for($j=0;$j<count($db_mem);$j++)
	{
		$idd[$j]=$db_mem[$j]['iMemberId'];
	}
	$Memidd=implode('\',\'',$idd);
	
	$sql_res1 = "SELECT * FROM view_campaign WHERE iMemberId IN ('".$Memidd."') AND dDecline ='1'";
	$db_res1= $obj->MySQLSelect($sql_res1);

	
	for($j=0;$j<count($db_res1);$j++)
	{
	      $id[$j]=$db_res1[$j]['iCampaignId'];
	}
	$camid=implode('\',\'',$id);
	
	
	if($searchtext !='' && $searchcountry == ''  && $searchstate =='' && $searchzip =='' && $searchindustry=='') {
	        $ssql= " AND vCampaignName LIKE '".$searchtext."%' AND iCampaignId NOT IN('".$camid."')" ;
	}elseif($searchcountry != '' && $searchtext == ''  && $searchstate =='' && $searchzip =='' && $searchindustry==''){
		$ssql= " AND iCountryId LIKE '".$searchcountry."%' AND iCampaignId NOT IN('".$camid."')" ;
	}elseif($searchstate != '' && $searchcountry == ''  && $searchtext =='' && $searchzip =='' && $searchindustry==''){
		$ssql= " AND iStateId LIKE '".$searchstate."%' AND iCampaignId NOT IN('".$camid."')" ;
	}elseif($searchzip != '' && $searchcountry == ''  && $searchstate =='' && $searchtext =='' && $searchindustry==''){
		$ssql= " AND vZipCode LIKE '".$searchzip."%' AND iCampaignId NOT IN('".$camid."')" ;
	}elseif($searchzip == '' && $searchcountry == ''  && $searchstate =='' && $searchtext =='' && $searchindustry !=''){
		$ssql= " AND vIndustry LIKE '".$searchindustry."%' AND iCampaignId NOT IN('".$camid."')" ;
	}elseif($searchcountry != ''  && $searchstate !='' && $searchzip =='' && $searchtext=='' && $searchindustry==''){
		$ssql = " AND iCountryId LIKE '".$searchcountry."%' AND iStateId LIKE '".$searchstate."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry == ''  && $searchstate =='' && $searchzip !='' && $searchtext !='' && $searchindustry==''){
		$ssql = " AND vCampaignName LIKE '".$searchtext."%' AND vZipCode LIKE '".$searchzip."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry != ''  && $searchstate =='' && $searchzip !='' && $searchtext =='' && $searchindustry==''){
		$ssql = " AND vZipCode LIKE '".$searchzip."%' AND iCountryId LIKE '".$searchcountry."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry != ''  && $searchstate =='' && $searchzip =='' && $searchtext !='' && $searchindustry==''){
		$ssql = " AND vCampaignName LIKE '".$searchtext."%' AND iCountryId LIKE '".$searchcountry."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry == ''  && $searchstate !='' && $searchzip =='' && $searchtext !='' && $searchindustry==''){
		$ssql = " AND vCampaignName LIKE '".$searchtext."%' AND iStateId LIKE '".$searchstate."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry == ''  && $searchstate !='' && $searchzip !='' && $searchtext =='' && $searchindustry==''){
		$ssql = " AND vZipCode LIKE '".$searchzip."%' AND iStateId LIKE '".$searchstate."%' AND iCampaignId NOT IN('".$camid."')";
	}
	
	elseif($searchcountry == ''  && $searchstate =='' && $searchzip !='' && $searchtext =='' && $searchindustry !=''){
		$ssql = " AND vZipCode LIKE '".$searchzip."%' AND vIndustry LIKE '".$searchindustry."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry == ''  && $searchstate =='' && $searchzip =='' && $searchtext !='' && $searchindustry !=''){
		$ssql = " AND vCampaignName LIKE '".$searchtext."%' AND vIndustry LIKE '".$searchindustry."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry != ''  && $searchstate =='' && $searchzip =='' && $searchtext =='' && $searchindustry !=''){
		$ssql = " AND iCountryId LIKE '".$searchcountry."%' AND vIndustry LIKE '".$searchindustry."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry == ''  && $searchstate !='' && $searchzip =='' && $searchtext =='' && $searchindustry !=''){
		$ssql = " AND iStateId LIKE '".$searchstate."%' AND vIndustry LIKE '".$searchindustry."%' AND iCampaignId NOT IN('".$camid."')";
	}
	
	
	
	elseif($searchcountry == ''  && $searchstate !='' && $searchzip !='' && $searchtext !='' && $searchindustry ==''){
		$ssql = " AND vZipCode LIKE '".$searchzip."%' AND iStateId LIKE '".$searchstate."%' AND vCampaignName LIKE '".$searchtext."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry != ''  && $searchstate !='' && $searchzip !='' && $searchtext =='' && $searchindustry ==''){
		$ssql = " AND vZipCode LIKE '".$searchzip."%' AND iStateId LIKE '".$searchstate."%' AND iCountryId LIKE '".$searchcountry."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry != ''  && $searchstate =='' && $searchzip !='' && $searchtext !='' && $searchindustry ==''){
		$ssql = " AND vZipCode LIKE '".$searchzip."%' AND vCampaignName LIKE '".$searchtext."%' AND iCountryId LIKE '".$searchcountry."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry != ''  && $searchstate !='' && $searchzip =='' && $searchtext !='' && $searchindustry ==''){
		$ssql = " AND iStateId LIKE '".$searchstate."%' AND vCampaignName LIKE '".$searchtext."%' AND iCountryId LIKE '".$searchcountry."%' AND iCampaignId NOT IN('".$camid."')";
	}
	elseif($searchcountry != ''  && $searchstate !='' && $searchzip =='' && $searchtext =='' && $searchindustry !=''){
		$ssql = " AND iStateId LIKE '".$searchstate."%' AND vIndustry LIKE '".$searchindustry."%' AND iCountryId LIKE '".$searchcountry."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry != ''  && $searchstate =='' && $searchzip =='' && $searchtext !='' && $searchindustry !=''){
		$ssql = " AND vCampaignName LIKE '".$searchtext."%' AND vIndustry LIKE '".$searchindustry."%' AND iCountryId LIKE '".$searchcountry."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry != ''  && $searchstate =='' && $searchzip !='' && $searchtext =='' && $searchindustry !=''){
		$ssql = " AND vZipCode LIKE '".$searchzip."%' AND vIndustry LIKE '".$searchindustry."%' AND iCountryId LIKE '".$searchcountry."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry == ''  && $searchstate =='' && $searchzip !='' && $searchtext !='' && $searchindustry !=''){
		$ssql = " AND vZipCode LIKE '".$searchzip."%' AND vIndustry LIKE '".$searchindustry."%' AND vCampaignName LIKE '".$searchtext."%' AND iCampaignId NOT IN('".$camid."')";
	}
	
	elseif($searchcountry != ''  && $searchstate !='' && $searchzip !='' && $searchtext !='' && $searchindustry ==''){
		$ssql = " AND iStateId LIKE '".$searchstate."%' AND vCampaignName LIKE '".$searchtext."%' AND iCountryId LIKE '".$searchcountry."%' AND vZipCode LIKE '".$searchzip."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry == ''  && $searchstate !='' && $searchzip !='' && $searchtext !='' && $searchindustry !=''){
		$ssql = " AND iStateId LIKE '".$searchstate."%' AND vCampaignName LIKE '".$searchtext."%' AND vIndustry LIKE '".$searchindustry."%' AND vZipCode LIKE '".$searchzip."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry != ''  && $searchstate !='' && $searchzip =='' && $searchtext !='' && $searchindustry !=''){
		$ssql = " AND iStateId LIKE '".$searchstate."%' AND vCampaignName LIKE '".$searchtext."%' AND vIndustry LIKE '".$searchindustry."%' AND iCountryId LIKE '".$searchcountry."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry != ''  && $searchstate =='' && $searchzip !='' && $searchtext !='' && $searchindustry !=''){
		$ssql = " AND vZipCode LIKE '".$searchzip."%' AND vCampaignName LIKE '".$searchtext."%' AND vIndustry LIKE '".$searchindustry."%' AND iCountryId LIKE '".$searchcountry."%' AND iCampaignId NOT IN('".$camid."')";
	}elseif($searchcountry != ''  && $searchstate !='' && $searchzip !='' && $searchtext =='' && $searchindustry !=''){
		$ssql = " AND vZipCode LIKE '".$searchzip."%' AND iStateId LIKE '".$searchstate."%' AND vIndustry LIKE '".$searchindustry."%' AND iCountryId LIKE '".$searchcountry."%' AND iCampaignId NOT IN('".$camid."')";
	}
	
	elseif($searchcountry != ''  && $searchstate !='' && $searchzip !='' && $searchtext !='' && $searchindustry !=''){
		$ssql = " AND iStateId LIKE '".$searchstate."%' AND vCampaignName LIKE '".$searchtext."%' AND iCountryId LIKE '".$searchcountry."%' AND vZipCode LIKE '".$searchzip."%' AND vIndustry LIKE '".$searchindustry."%' AND iCampaignId NOT IN('".$camid."')";
	}else{
		$ssql = " AND iCampaignId NOT IN('".$camid."')";
	}
       
        $refcat = $_REQUEST['refcat'];
	$CampaginArr = $CampaginObj->getAllCampaginList($var_limit,$ssql);
        
	$totRec = count($CampaginArr);
	$tot_page = ceil($totRec/$recLimit);
	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}
	
	require_once(TPATH_CLASS_GEN.'class.browsepaging-ajax.php');
	$PagingObj = new Paging($totRec,$start,'displayallcapaginlist');
	$CampaginArr = $CampaginObj->getAllCampaginList($var_limit,$ssql);
	
	for($i = 0; $i < count($CampaginArr); $i++)
	{
		$CampaginArr[$i]['tFullContent']=$CampaginArr[$i]['tContent'];
		if(strlen($CampaginArr[$i]['tContent'])>108){
			$CampaginArr[$i]['tContent']=substr($CampaginArr[$i]['tContent'],0,107).'..';
		}
		
		$sql_view = "SELECT * FROM view_campaign WHERE iCampaignId='".$CampaginArr[$i]['iCampaignId']."' AND iMemberId IN ('".$Memidd."')";
		$db_view= $obj->MySQLSelect($sql_view);
		
		$CampaginArr[$i]['iViewCommerical'] = $db_view[0]['iViewCommerical'];
		$CampaginArr[$i]['iRadioAdd'] = $db_view[0]['iRadioAdd'];
		$CampaginArr[$i]['iViewWebsite'] = $db_view[0]['iViewWebsite'];
		$CampaginArr[$i]['iAccept'] = $db_view[0]['iAccept'];
	}
	
	/*echo $memid;
	echo "<pre>";
	print_r($CampaginArr);exit;*/
	
	
	$recmsg = $PagingObj->setMessage('Campaigns');
	$pages = $PagingObj->displayBrowseCampaignPaging($tot_page);
  	
	$smarty->assign("CampaginArr", $CampaginArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
	$smarty->assign("memid",$memid);
	
	
?>

 