<?php


	$mode = $_REQUEST['mode'];
	//echo $mode;exit;
	$iBlogId = $_REQUEST['iBlogId'];
	$type = $_REQUEST['type'];
	$modeBlog = 'add';
	$memberId = $_REQUEST['iMemberId'];
    
	
	
	
    if($iBlogId !='')
	{
		$sql_blog = "select * from  blog where iBlogId='".$iBlogId."' ";
		$db_blog = $obj->MySQLSelect($sql_blog);
		$modeBlog = 'edit';
		$db_blog[0]['dCreateDate'] = date('m-d-Y',strtotime($db_blog[0]['dCreateDate']));
		$Arrintrest = explode(",",$db_blog[0]['iInterestId']);
		$Arrskill= explode(",",$db_blog[0]['iSkillId']);
	}
	
	//print_r($Arrintrest);exit;
	$sql_interest = "select * from interest";
	$db_interest = $obj->MySQLSelect($sql_interest);
	
	$sql_skill = "select * from skill";
	$db_skill = $obj->MySQLSelect($sql_skill);
	
    	
	
    
    $smarty->assign("db_interest",$db_interest);
    $smarty->assign("db_skill",$db_skill);
    
    $smarty->assign("Arrintrest",$Arrintrest);
    $smarty->assign("Arrskill",$Arrskill);
    $smarty->assign("memberId",$memberId);
    $smarty->assign("modeBlog",$modeBlog);
    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_blog",$db_blog);
    $smarty->assign("iBlogId",$iBlogId);
    
?>
