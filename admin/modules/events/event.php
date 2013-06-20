<?php
    $mode = $_REQUEST['mode'];
    $iEventId = $_REQUEST['iEventId'];
    $modeevent = 'add';
    $type = $_REQUEST['type'];
    $memberId = $_REQUEST['iMemberId'];
    $sql_interest = "select * from interest";
    $db_interest = $obj->MySQLSelect($sql_interest);
    
    $sql_skill = "select * from skill";
    $db_skill = $obj->MySQLSelect($sql_skill);
    
    if($iEventId !=''){
        $sql_eve = "select * from events where iEventId='".$iEventId."' ";
        $db_eve = $obj->MySQLSelect($sql_eve);
        
        $relatedArrIntrest=explode(",",$db_eve[0]['iInterestId']);
        $relatedArrSkill=explode(",",$db_eve[0]['iSkillId']);
        $db_eve[0][dEventDate]= date("m-d-Y", strtotime($db_eve[0][dEventDate]));
        $modeevent = 'edit';
     }
    
	$sql_cus = "SELECT * FROM events where iMemberId=".$memberId;	
	$db_viewevent= $obj->MySQLSelect($sql_cus);
	
	$sqlcnt= "select count(*) as total from events where iMemberId=".$memberId;
	$db_qry = $obj->MySQLSelect($sqlcnt);
	
	$totalEvent = $db_qry[0]['total'];
	
		
    $smarty->assign("totalEvent",$totalEvent);
   
    $smarty->assign("db_viewevent",$db_viewevent);
    //$smarty->assign("db_event",$db_event);
    $smarty->assign("db_interest",$db_interest);
    $smarty->assign("db_skill",$db_skill);
    $smarty->assign("mode",$mode);
    $smarty->assign("modeevent",$modeevent);
    $smarty->assign("type",$type);
    $smarty->assign("db_eve",$db_eve);
    $smarty->assign("iEventId",$iEventId);
    //$smarty->assign("stateArr",$stateArr);
   $smarty->assign("relatedArrIntrest",$relatedArrIntrest);
   $smarty->assign("relatedArrSkill",$relatedArrSkill);
?>
