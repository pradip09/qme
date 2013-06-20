<?php


    $mode = $_REQUEST['mode'];
    $iContestId = $_REQUEST['iContestId'];
    if($iContestId !=''){
        $sql_post = "SELECT * FROM contests  WHERE iContestId='".$iContestId."'";	
        $db_postcampaign = $obj->MySQLSelect($sql_post);
        $relatedArr = explode(",",$db_postcampaign[0]['iSkillId']);
	$relatedArrIntrest = explode(",",$db_postcampaign[0]['iInterestId']);
    }
        
    $sql_int = "select * from interest";
    $db_interest = $obj->MySQLSelect($sql_int);
    
    $sql_skill = "select * from skill";
    $db_skill = $obj->MySQLSelect($sql_skill);
    
    $sql_con="select * from  country_master";
    $db_con = $obj->MySQLSelect($sql_con);
    
    $smarty->assign("db_con",$db_con);
    $smarty->assign("mode",$mode);
    $smarty->assign("relatedArrIntrest",$relatedArrIntrest);
    $smarty->assign("relatedArr",$relatedArr);
    $smarty->assign("db_skill",$db_skill);
    $smarty->assign("db_interest",$db_interest);
    $smarty->assign("db_postcampaign",$db_postcampaign);
    $smarty->assign("iContestId",$iContestId);
   
?>
