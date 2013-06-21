<?php

$generalobj->checkFrontAuthntication();
$vMemberUrl = $_REQUEST['mamberurl'];
$iEventId = $_REQUEST['iEventId'];

    if($iEventId == '')
    {
         header("location:".$tconfig["tsite_url"]."/home");
    }else{
     
        $sql_user = "select * from members where vMemberUrl='".$vMemberUrl."'";
        $db_user = $obj->MySQLSelect($sql_user);
        $iMemberId = $db_user[0]['iMemberId'];
        
        $sql_event = "select * from events where iEventId = '".$iEventId."'";
        $db_event = $obj->MySQLSelect($sql_event);
         $db_event[0][dEventDate]=date("m-d-Y",strtotime($db_event[0][dEventDate]));
         
        $db_event[0]['vEventImage'] = $tconfig["tsite_upload_images_event"].$db_event[0]['iMemberId']."/".$db_event[0]['vEventImage'];
        $member_name = "select * from members where iMemberId = '".$db_event[0]['iMemberId']."'";
        $db_membername = $obj->MySQLSelect($member_name);
        $name = $db_membername[0]['vName'];
   
        $sql_skill = "select * from skill where iSkillId IN (".$db_event[0]['iSkillId'].")";
        $db_skillevent = $obj->MySQLSelect($sql_skill);
        
        $sql_interest = "select * from  interest where iInterestId IN (".$db_event[0]['iInterestId'].")";
        $db_interestevent = $obj->MySQLSelect($sql_interest);
  
    }
      
$smarty->assign("name", $name);
$smarty->assign("db_interestevent", $db_interestevent);
$smarty->assign("db_skillevent", $db_skillevent);
$smarty->assign("db_event", $db_event);
$smarty->assign("code", $vMemberUrl);
$smarty->assign("db_user", $db_user);


?>