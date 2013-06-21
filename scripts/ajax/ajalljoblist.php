<?php

//echo "<pre>";
//print_r($_REQUEST);exit;
	include_once(TPATH_CLASS_APP."/class.job.php");
	$PostJobObj = new PostJob();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_REQUEST['iMemberId'];
	$searchtext = $_REQUEST['searchtext'];
	$searchcountry = $_REQUEST['searchcountry'];
	$searchstate = $_REQUEST['searchstate'];
	$searchzip = $_REQUEST['searchzip'];
    
    
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
	$rec_limit 	= $recLimit;
	$var_limit = " ";
	//$ssql = " AND p.vSkill LIKE '".$searchtext."%' OR p.iCountryId LIKE '".$searchcountry."%' OR p.iStateId LIKE '".$searchstate."%' OR p.vZip LIKE '".$searchzip."%'" ;
	if($searchtext !='' && $searchcountry == ''  && $searchstate =='' && $searchzip =='') {
	        $ssql= " AND p.vSkill LIKE '".$searchtext."%'" ;
	}elseif($searchcountry != '' && $searchtext == ''  && $searchstate =='' && $searchzip ==''){
		$ssql= " AND p.iCountryId LIKE '".$searchcountry."%'" ;
	}elseif($searchstate != '' && $searchcountry == ''  && $searchtext =='' && $searchzip ==''){
		$ssql= " AND p.iStateId LIKE '".$searchstate."%'" ;
	}elseif($searchzip != '' && $searchcountry == ''  && $searchstate =='' && $searchtext ==''){
		$ssql= " AND p.vZip LIKE '".$searchzip."%'" ;
	}elseif($searchcountry != ''  && $searchstate !='' && $searchzip =='' && $searchtext==''){
		$ssql = " AND p.iCountryId LIKE '".$searchcountry."%' AND p.iStateId LIKE '".$searchstate."%'";
	}elseif($searchcountry == ''  && $searchstate =='' && $searchzip !='' && $searchtext !=''){
		$ssql = " AND p.vSkill LIKE '".$searchtext."%' AND p.vZip LIKE '".$searchzip."%'";
	}elseif($searchcountry != ''  && $searchstate =='' && $searchzip !='' && $searchtext ==''){
		$ssql = " AND p.vZip LIKE '".$searchzip."%' AND p.iCountryId LIKE '".$searchcountry."%'";
	}elseif($searchcountry != ''  && $searchstate =='' && $searchzip =='' && $searchtext !=''){
		$ssql = " AND p.vSkill LIKE '".$searchtext."%' AND p.iCountryId LIKE '".$searchcountry."%'";
	}elseif($searchcountry == ''  && $searchstate !='' && $searchzip =='' && $searchtext !=''){
		$ssql = " AND p.vSkill LIKE '".$searchtext."%' AND p.iStateId LIKE '".$searchstate."%'";
	}elseif($searchcountry == ''  && $searchstate !='' && $searchzip !='' && $searchtext ==''){
		$ssql = " AND p.vZip LIKE '".$searchzip."%' AND p.iStateId LIKE '".$searchstate."%'";
	}elseif($searchcountry == ''  && $searchstate !='' && $searchzip !='' && $searchtext !=''){
		$ssql = " AND p.vZip LIKE '".$searchzip."%' AND p.iStateId LIKE '".$searchstate."%' AND p.vSkill LIKE '".$searchtext."%'";
	}elseif($searchcountry != ''  && $searchstate !='' && $searchzip !='' && $searchtext ==''){
		$ssql = " AND p.vZip LIKE '".$searchzip."%' AND p.iStateId LIKE '".$searchstate."%' AND p.iCountryId LIKE '".$searchcountry."%'";
	}elseif($searchcountry != ''  && $searchstate =='' && $searchzip !='' && $searchtext !=''){
		$ssql = " AND p.vZip LIKE '".$searchzip."%' AND p.vSkill LIKE '".$searchtext."%' AND p.iCountryId LIKE '".$searchcountry."%'";
	}elseif($searchcountry != ''  && $searchstate !='' && $searchzip =='' && $searchtext !=''){
		$ssql = " AND p.iStateId LIKE '".$searchstate."%' AND p.vSkill LIKE '".$searchtext."%' AND p.iCountryId LIKE '".$searchcountry."%'";
	}elseif($searchcountry != ''  && $searchstate !='' && $searchzip !='' && $searchtext !=''){
		$ssql = " AND p.iStateId LIKE '".$searchstate."%' AND p.vSkill LIKE '".$searchtext."%' AND p.iCountryId LIKE '".$searchcountry."%' AND p.vZip LIKE '".$searchzip."%'";
	}
	
    
	$PostJobArr = $PostJobObj->getAllJobList($var_limit,$ssql);
	
	$totRec = count($PostJobArr);
	//echo $totRec;
	//exit;
	$tot_page = ceil($totRec/$recLimit);

	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}

	require_once(TPATH_CLASS_GEN.'class.browsepaging-ajax.php');

	$PagingObj = new Paging($totRec,$start,'searchjoblist');
	$PostJobArr = $PostJobObj->getAllJobList($var_limit,$ssql);

	for($i = 0; $i < count($PostJobArr); $i++)
	{
		$PostJobArr[$i][dAddedDate]=date("m-d-Y",strtotime($PostJobArr[$i][dAddedDate]));
		$PostJobArr[$i]['tFullDescription']=$PostJobArr[$i]['tDescription'];
		if(strlen($PostJobArr[$i]['tDescription'])>145){
			$PostJobArr[$i]['tDescription']=substr($PostJobArr[$i]['tDescription'],0,144).'...';
		}
		if($PostJobArr[$i]['iAdminId'] != '0')
		{
			$PostJobArr[$i]['vImage'] = $tconfig["front_images"].'jobs.png';
		}else if($PostJobArr[$i]['vProfileImage'] != ''){
			$PostJobArr[$i]['vImage'] = $tconfig["tsite_upload_images_member"].$PostJobArr[$i]['iMemberId'].'/2_'.$PostJobArr[$i]['vProfileImage'];
		}else{
			$PostJobArr[$i]['vImage'] = $tconfig["front_images"].'user_img.png';
		}
		
	}
	
	$recmsg = $PagingObj->setMessage('Jobs');
	$pages = $PagingObj->displayBrowseJobPaging($tot_page);
	
	$smarty->assign("PostJobArr", $PostJobArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 