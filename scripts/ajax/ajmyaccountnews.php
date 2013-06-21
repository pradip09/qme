<?php
	
       
	$start = $_REQUEST['start'];       
        $iMemberId = $_REQUEST['iMemberId'];
	
	
	include_once(TPATH_CLASS_APP."/class.releventnews.php");
	$releventnewsObj = new releventnews();
		
	$relevent_news = $releventnewsObj->relevent_newsList($ssql);
	
        $sql_user = "select * from members where iMemberId='".$iMemberId."'";
	$db_user = $obj->MySQLSelect($sql_user);
	$relatedArr = explode(",",$db_user[0]['iSkillId']);
	$relatedArrIntrest = explode(",",$db_user[0]['iInterestId']);
	$sql_blog = "select * from blog";
	$db_blog = $obj->MySQLSelect($sql_blog);
	
	for($i = 0 ; $i < count($db_blog) ; $i++)
	{
	    $db_blog[$i]['iSkillId'] = explode(",",$db_blog[$i]['iSkillId']);
	    $db_blog[$i]['iInterestId'] = explode(",",$db_blog[$i]['iInterestId']);
	}
	for($k = 0 ; $k < count($db_blog) ; $k++)
	    {
		$count ='';
		for($j = 0 ; $j < count($relatedArr) ; $j++)
		{
		    for($p = 0; $p < count($db_blog[$k]['iSkillId']) ; $p++)
		    {
			if($relatedArr[$j] == $db_blog[$k]['iSkillId'][$p])
			{
			$count++;
			}
		    }
		}
		for($a = 0 ; $a < count($relatedArrIntrest) ; $a++)
		{
		    for($q = 0; $q < count($db_blog[$k]['iInterestId']) ; $q++)
		    {
			if($relatedArr[$a] == $db_blog[$k]['iInterestId'][$q])
			{
			$count++;
			}
		    }
		}
		if($count > 0)
		{
		    $matchId[$k] = $db_blog[$k]['iBlogId']; 
		}
	    }

	$matchIdArr = implode(",",$matchId);
	
	
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$var_limit = " ";
	
	$Sql1 = "Select * from blog where iBlogId IN (".$matchIdArr.") ORDER BY dAddedDate DESC $var_limit";
	$db_bloglistmatch1 = $obj->MySQLSelect($Sql1);
	
	$rec_limit = $start*1;
	$var_limit = "LIMIT 0, $rec_limit";
	
	
	$Sql = "Select * from blog where iBlogId IN (".$matchIdArr.") ORDER BY dAddedDate DESC $var_limit";
	
	$db_bloglistmatch = $obj->MySQLSelect($Sql);
	
	for($i=0;$i<count($relevent_news);$i++)
	{
		if($relevent_news[$i]['vImage'] =='' && !is_file(TPATH_SERVER_MUSIC_NEWS."/".$relevent_news[$i]['vImage']))
		{
			$relevent_news[$i]['vImage'] = $tconfig["front_images"]."noimage.png";
		}else{
			$relevent_news[$i]['vImage'] = $tconfig["tsite_upload_images_news"].$relevent_news[$i]['iNewsId']."/3_".$relevent_news[$i]['vImage'];
		}
		
		  $relevent_news[$i][dAddedDate]=date("M jS, Y",strtotime($relevent_news[$i][dAddedDate]));
		
		
		
		
		
		
		$Different[$i] = $generalobj->getDateDifference($relevent_news[$i]['dAddedDate'],date('Y-m-d H:i:s'),'a');
		if($Different[$i]['days'] != 0){
		$relevent_news[$i]['Differ'] = $Different[$i]['days'].' days '.$Different[$i]['hours'].' hours '.$Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] != 0){
			$relevent_news[$i]['Differ'] = $Different[$i]['hours'].' hours '.$Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] == 0 && $Different[$i]['minutes'] != 0){
			$relevent_news[$i]['Differ'] = $Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] == 0 && $Different[$i]['minutes'] == 0){
			$relevent_news[$i]['Differ'] = $Different[$i]['seconds'].' seconds ago';
		}
		$relevent_news[$i]['vTitle'] = $generalobj->limit_words($relevent_news[$i]['vTitle'],10);
		$relevent_news[$i]['vDescription'] = $generalobj->limit_words($relevent_news[$i]['vDescription'],15);
	}
	
	for($i=0;$i<count($db_bloglistmatch);$i++)
	{
		if($db_bloglistmatch[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_BLOG."/".$db_bloglistmatch[$i]['iMemberId'].'/'.$db_bloglistmatch[$i]['vImage']))
		{
			$db_bloglistmatch[$i]['vImage'] = $tconfig["front_images"]."no-img.png";
		}else{
			$db_bloglistmatch[$i]['vImage'] = $tconfig["tsite_upload_images_blog"].$db_bloglistmatch[$i]['iMemberId']."/3_".$db_bloglistmatch[$i]['vImage'];
		}
		$db_bloglistmatch[$i]['vText'] = $generalobj->limit_words($db_bloglistmatch[$i]['vText'],15);
		$db_bloglistmatch[$i]['vBlogTitle'] = $generalobj->limit_words($db_bloglistmatch[$i]['vBlogTitle'],10);
		//echo "<pre>";
	//print_r($db_bloglistmatch);exit;
		$db_bloglistmatch[$i][dAddedDate]=date("M d, Y",strtotime($db_bloglistmatch[$i][dAddedDate]));
		
		$Different[$i] = $generalobj->getDateDifference($db_bloglistmatch[$i]['dAddedDate'],date('Y-m-d H:i:s'),'a');
		if($Different[$i]['days'] != 0){
		$db_bloglistmatch[$i]['Differ'] = $Different[$i]['days'].' days '.$Different[$i]['hours'].' hours '.$Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] != 0){
			$db_bloglistmatch[$i]['Differ'] = $Different[$i]['hours'].' hours '.$Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] == 0 && $Different[$i]['minutes'] != 0){
			$db_bloglistmatch[$i]['Differ'] = $Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] == 0 && $Different[$i]['minutes'] == 0){
			$db_bloglistmatch[$i]['Differ'] = $Different[$i]['seconds'].' seconds ago';
		}
		
		
	}
	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}
	$code = $db_user[0]['vMemberUrl'];
	
	$totRec = count($db_bloglistmatch1);
	$start++;
	
	//echo "<pre>";
	//print_r($relevent_news);exit;
	
	
	$smarty->assign("code", $code);
	$smarty->assign("relevent_news", $relevent_news);
        $smarty->assign("totRec",$totRec);
        $smarty->assign("iNewsId",$iNewsId);
        $smarty->assign("rec_limit",$rec_limit);
        $smarty->assign("start",$start);    
	$smarty->assign("db_bloglistmatch",$db_bloglistmatch);
	$smarty->assign("iMemberId",$iMemberId);
	
	
	
?>

 
 