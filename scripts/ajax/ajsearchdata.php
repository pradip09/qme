<?php
	

	$eTypeSearch = $_SESSION['eTypeSearch'];
        $keyword=$_SESSION['keyword'];
        $iMemberId = $_SESSION['iUserId'];
	$searchtext = $_REQUEST['searchtext'];
	$searchindustry = $_REQUEST['searchindustry'];
	$searchcountry = $_REQUEST['searchcountry'];
	$searchstate = $_REQUEST['searchstate'];
	$searchzip = $_REQUEST['searchzip'];
        
        if($eTypeSearch == 'bizmember')
        {
            $sql_search = "select * from  members where vBizName LIKE '%".$keyword."%' AND eStatus='Active'";
             $db_searchdata =  $obj->MySQLSelect($sql_search);
	     
	    for($i=0;$i<count($db_searchdata);$i++){
		    
		if($db_searchdata[$i]['vProfileImage'] =='' && !is_file(TPATH_SERVER_IMAGES_MEMBER."/".$db_searchdata[$i]['iMemberId']."/".$db_searchdata[$i]['vProfileImage'])){
			$db_searchdata[$i]['vProfileImage'] = $tconfig["front_images"]."added_user_img.png";
		}else{
			$db_searchdata[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$db_searchdata[$i]['iMemberId']."/"."2_".$db_searchdata[$i]['vProfileImage'];
		}
	     
	     }
            
        }elseif($eTypeSearch == 'campaign'){
		
				
		$sql_post = "select * from  post_campaign where (vCampaignName LIKE '%".$keyword."%' OR tContent LIKE '%".$keyword."%') AND eStatus='Active' ";
		$db_post =  $obj->MySQLSelect($sql_post);
		
		 
		for($j=0;$j<count($db_post);$j++)
		{
			$memid[$j]=$db_post[$j]['iMemberId'];
		}
		
		$Memid=implode('\',\'',$memid);
		$sql_res = "SELECT * FROM view_campaign WHERE iMemberId IN ('".$Memid."') AND dDecline ='1'";
		$db_res = $obj->MySQLSelect($sql_res);
		
		for($j=0;$j<count($db_res);$j++)
		{
			$id[$j]=$db_res[$j]['iCampaignId'];
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
		
            $sql_search = "select * from  post_campaign where (vCampaignName LIKE '%".$keyword."%' OR tContent LIKE '%".$keyword."%') AND eStatus='Active' $ssql order by iCampaignId DESC ";
            $db_searchdata =  $obj->MySQLSelect($sql_search);
	   //echo "<pre>";print_r($db_searchdata);exit;
            for($i=0;$i<count($db_searchdata);$i++){
		
		$db_searchdata[$i]['tFullContent'] = $db_searchdata[$i]['tContent'];
		if($db_searchdata[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_BLOG."/".$db_searchdata[$i]['iMemberId']."/".$db_searchdata[$i]['vImage'])){
			$db_searchdata[$i]['vImage'] = $tconfig["front_images"]."1_nomusic_img.jpg";
		}else{
			 if($db_searchdata[$i]['iMemberId'] != 0){ 
			$db_searchdata[$i]['vImage'] = $tconfig["tsite_upload_images_campaign"].'member/'.$db_searchdata[$i]['iMemberId']."/"."2_".$db_searchdata[$i]['vImage'];
			}else{
			 $db_searchdata[$i]['vImage'] = $tconfig["tsite_upload_images_campaign"].'admin/'.$db_searchdata[$i]['iAdminId']."/"."2_".$db_searchdata[$i]['vImage'];
			}
		}
                $db_searchdata[$i]['tContent'] = $generalobj->limit_words($db_searchdata[$i]['tContent'],2);
		
		$sql_res1 = "SELECT * FROM view_campaign WHERE iCampaignId='".$db_searchdata[$i]['iCampaignId']."' or iMemberId='".$db_searchdata[$i]['iMemberId']."'";
		$db_res1= $obj->MySQLSelect($sql_res1);
		
		$db_searchdata[$i]['iViewCommerical'] = $db_res1[$i]['iViewCommerical'];
		$db_searchdata[$i]['iRadioAdd'] = $db_res1[$i]['iRadioAdd'];
		$db_searchdata[$i]['iViewWebsite'] = $db_res1[$i]['iViewWebsite'];
		$db_searchdata[$i]['iAccept'] = $db_res1[$i]['iAccept'];
		
	}
	
        }elseif($eTypeSearch == 'member')
	{
	    $sql_search = "select m.*,s.vState AS state, c.vCountry AS country from  members AS m LEFT JOIN state_master AS s ON(m.iStateId = s.iStateId) LEFT JOIN country_master AS c ON(m.iCountryId = c.iCountryId) where vName LIKE '%".$keyword."%' AND m.eStatus='Active'";
	    $db_searchdata =  $obj->MySQLSelect($sql_search);
	     
	    for($i=0;$i<count($db_searchdata);$i++){
		    
		if($db_searchdata[$i]['vProfileImage'] =='' && !is_file(TPATH_SERVER_IMAGES_MEMBER."/".$db_searchdata[$i]['iMemberId']."/".$db_searchdata[$i]['vProfileImage'])){
			$db_searchdata[$i]['vProfileImage'] = $tconfig["front_images"]."added_user_img.png";
		}else{
			$db_searchdata[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$db_searchdata[$i]['iMemberId']."/"."2_".$db_searchdata[$i]['vProfileImage'];
		}
	     
	     }
	}
	#echo "<pre>";
	#print_r($db_searchdata);exit;
        
    $smarty->assign("db_searchdata",$db_searchdata);
    $smarty->assign("eTypeSearch",$eTypeSearch);
    $smarty->assign("iMemberId",$iMemberId);

?>