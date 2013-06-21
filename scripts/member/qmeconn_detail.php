<?php

if(isset($_SESSION['iUserId']) == false && $_SESSION['iUserId'] ==''){
    $url = $_SERVER['REQUEST_URI'];
    header("location:".$tconfig["tsite_url"]."?file=c-home&url=".$url);    
}

    $vMemberUrl = $_REQUEST['mamberurl'];
    $iQmeInId = $_REQUEST['iQmeconnId'];
  
    if($iQmeInId == '')
    {
         header("location:".$tconfig["tsite_url"]."/home");
    }else{
     
        $sql_user = "select * from members where vMemberUrl='".$vMemberUrl."'";
        $db_user = $obj->MySQLSelect($sql_user);
        $iMemberId = $db_user[0]['iMemberId'];
        //echo "<pre>";
        //print_r($iMemberId);exit;
        $sql_qme = "select * from qmein where iQmeInId = '".$iQmeInId."'AND eStatus = 'Active'";
        $db_QmeIn = $obj->MySQLSelect($sql_qme);
       
       
        $member_name = "select * from members where iMemberId = '".$db_QmeIn[0]['iMemberId']."'";
        $db_membername = $obj->MySQLSelect($member_name);
        $name = $db_membername[0]['vName'];
       
         $sql_country = "select * from country_master where  iCountryId = '". $db_QmeIn[0]['iCountryId']."'";
        $db_country = $obj->MySQLSelect($sql_country);
        $Country = $db_country[0]['vCountry'];
    
        $sql_state = "select * from state_master where  iStateId = '".$db_QmeIn[0]['iStateId']."'";
        $db_state = $obj->MySQLSelect($sql_state);
        $State = $db_state[0]['vState'];
    
        $sql_skill = "select * from skill where iSkillId IN (".$db_QmeIn[0]['iSkillId'].")";
        $db_skillevent = $obj->MySQLSelect($sql_skill);
        
        $sql_interest = "select * from  interest where iInterestId IN (".$db_QmeIn[0]['iInterestId'].")";
        $db_interestevent = $obj->MySQLSelect($sql_interest);
    }
        
$smarty->assign("db_interestevent", $db_interestevent);
$smarty->assign("db_skillevent", $db_skillevent);
$smarty->assign("State", $State);
$smarty->assign("name", $name);
$smarty->assign("Country", $Country);
$smarty->assign("db_QmeIn", $db_QmeIn);
$smarty->assign("code", $vMemberUrl);
$smarty->assign("db_user", $db_user);
?>