<?php
if(isset($_SESSION['iUserId']) == false && $_SESSION['iUserId'] ==''){
    $url = $_SERVER['REQUEST_URI'];
    header("location:".$tconfig["tsite_url"]."?file=c-home&url=".$url);    
}
//$generalobj->checkFrontAuthntication();
$vMemberUrl = $_REQUEST['mamberurl'];
$iPostjobId = $_REQUEST['iPostjobId'];
    
    if($iPostjobId == '')
    {
         header("location:".$tconfig["tsite_url"]."/home");
    }else{
     
        $sql_user = "select * from members where vMemberUrl='".$vMemberUrl."'";
        $db_user = $obj->MySQLSelect($sql_user);
        $iMemberId = $db_user[0]['iMemberId'];
        
        $sql_event = "select * from  post_job where iPostJobId = '".$iPostjobId."'";
        $db_postjob = $obj->MySQLSelect($sql_event);
         $db_postjob[0][dAddedDate]=date("m-d-Y",strtotime($db_postjob[0][dAddedDate]));
        
        $member_name = "select * from members where iMemberId = '".$db_postjob[0]['iMemberId']."'";
        $db_membername = $obj->MySQLSelect($member_name);
        $name = $db_membername[0]['vName'];
        
        $sql_country = "select * from country_master where  iCountryId = '". $db_postjob[0]['iCountryId']."'";
        $db_country = $obj->MySQLSelect($sql_country);
        $Country = $db_country[0]['vCountry'];
    
        $sql_state = "select * from state_master where  iStateId = '".$db_postjob[0]['iStateId']."'";
        $db_state = $obj->MySQLSelect($sql_state);
        $State = $db_state[0]['vState'];
    }
        
$smarty->assign("name", $name);
$smarty->assign("Country", $Country);
$smarty->assign("State", $State);
$smarty->assign("db_postjob", $db_postjob);
$smarty->assign("code", $vMemberUrl);
$smarty->assign("db_user", $db_user);


?>