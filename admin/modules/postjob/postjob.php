<?php


    $mode = $_REQUEST['mode'];
    $iPostJobId = $_REQUEST['iPostJobId'];
    if($iPostJobId !=''){
        $sql_postjob = "SELECT * FROM post_job  WHERE iPostJobId='".$iPostJobId."'";	
        $db_postjob = $obj->MySQLSelect($sql_postjob);
        $relatedArr = explode(",",$db_postjob[0]['iSkillId']);
	$relatedArrIntrest = explode(",",$db_postjob[0]['iInterestId']);
        
    }

        $sqlState = "select iStateId, vState from state_master where vCountryCode ='US' ";
        $db_state = $obj->MySQLSelect($sqlState);
        
        $sql_int = "select * from interest";
        $db_interest = $obj->MySQLSelect($sql_int);
        
        $sql_skill = "select * from skill";
        $db_skill = $obj->MySQLSelect($sql_skill);
        
        $sql_con="select * from  country_master";
        $db_con = $obj->MySQLSelect($sql_con);
    
   
    $smarty->assign("db_con",$db_con); 
    $smarty->assign("mode",$mode);
    $smarty->assign("db_skill",$db_skill);
    $smarty->assign("db_interest",$db_interest);
    $smarty->assign("db_postjob",$db_postjob);
    $smarty->assign("relatedArrIntrest",$relatedArrIntrest);
    $smarty->assign("relatedArr",$relatedArr);
    $smarty->assign("db_state",$db_state);
    $smarty->assign("iPostJobId",$iPostJobId);
    
?>
