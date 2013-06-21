<?php

$generalobj->checkFrontAuthntication();
    $iPostJobId = $_REQUEST['iPostJobId'];
    $iMemberId    = $_SESSION['iUserId'];
    if($iPostJobId == 'add')
    {
        $mode = 'add';
        
    }else{
        
	$sql_postjob = "select * from post_job where iPostJobId='".$iPostJobId."' AND iMemberId = '".$iMemberId."'";
        $db_postjob = $obj->MySQLSelect($sql_postjob);
        $mode = 'edit';
        $relatedArr = explode(",",$db_postjob[0]['iSkillId']);
        $relatedArrIntrest = explode(",",$db_postjob[0]['iInterestId']);
    }
    

$sqlState = "select iStateId, vState from state_master where vCountryCode ='US' ";
$db_state = $obj->MySQLSelect($sqlState);
    
 
 
 
$smarty->assign("relatedArrIntrest",$relatedArrIntrest);    
$smarty->assign("relatedArr",$relatedArr);
$smarty->assign("db_state",$db_state);
$smarty->assign("mode",$mode);
$smarty->assign("iMemberId",$iMemberId);
$smarty->assign("db_postjob",$db_postjob);
$smarty->assign("db_photo",$db_photo);

?>