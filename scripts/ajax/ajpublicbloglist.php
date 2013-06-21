<?php


	$start = $_REQUEST['start'];       
        $iMemberId = $_REQUEST['iMemberId'];
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
	$Sql = "Select * from blog where iBlogId IN (".$matchIdArr.")";
	$db_bloglistmatch = $obj->MySQLSelect($Sql);
	$rec_limit = $start*5;
	$var_limit = "LIMIT 0, $rec_limit";
	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}
	
	
	$start++;
        $smarty->assign("totRec",$totRec);
        $smarty->assign("iNewsId",$iNewsId);
        $smarty->assign("rec_limit",$rec_limit);
        $smarty->assign("start",$start);    
	$smarty->assign("relevent_matchbloglist",$relevent_matchbloglist);
	$smarty->assign("iMemberId",$iMemberId);
	
	
?>

 