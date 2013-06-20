<?php

    $mode = $_REQUEST['mode'];
    $iPostJobId = $_REQUEST['iPostJobId'];
    $iMemberId = $_REQUEST['iMemberId'];
    
     $modePost = 'add';
    if($iPostJobId !=''){
        $sql_post_job = "SELECT * FROM post_job  WHERE iPostJobId='".$iPostJobId."'";	
        $db_post_job = $obj->MySQLSelect($sql_post_job);
        $modePost = 'edit';
        $Arrintrest = explode(",",$db_post_job[0]['iInterestId']);
	$Arrskill= explode(",",$db_post_job[0]['iSkillId']);
    }
   //echo "<pre>";
   //print_r($db_post_job);exit;
        $sql_interest = "select * from interest";
	$db_interest = $obj->MySQLSelect($sql_interest);
	
	$sql_skill = "select * from skill";
	$db_skill = $obj->MySQLSelect($sql_skill);
        
    $sqlState = "select iStateId, vState from state_master where vCountryCode ='US' ";
    $db_state = $obj->MySQLSelect($sqlState);
    
     $sql_cont="select * from  country_master";
    $db_cont = $obj->MySQLSelect($sql_cont);
    
   
    $smarty->assign("db_cont",$db_cont); 
    $smarty->assign("modePost",$modePost);
    $smarty->assign("db_post_job",$db_post_job);
    $smarty->assign("db_state",$db_state);
    $smarty->assign("iPostJobId",$iPostJobId);
    $smarty->assign("iMemberId",$iMemberId);
    $smarty->assign("db_interest",$db_interest);
    $smarty->assign("db_skill",$db_skill);
    //$smarty->assign("db_blog_view",$db_blog_view);
    $smarty->assign("Arrintrest",$Arrintrest);
    $smarty->assign("Arrskill",$Arrskill);
?>
