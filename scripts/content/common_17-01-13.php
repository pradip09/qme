<?php

/*
session_start();
$_SESSION['iUserId'] = 28;
$_SESSION['Name'] = 'Dharmesh Makwana';
$_SESSION['vEmail'] = 'demo@gmail.com';
$_SESSION['vMemberUrl'] = 'Dharmesh.Makwana';
$_SESSION['vProfileImage'] = '13547930371_1344426116asian_smile_001.jpga4d46a62-5f36-464c-9d02-faee259eb5bcLarger.jpg';
*/
if($_COOKIE['remember_me'])
{
    $cookie_name = $_COOKIE['remember_me'];
}else{
    $cookie_name = '';
}
if($_COOKIE['password_me'])
{
    $cookie_password = $_COOKIE['password_me'];
}else{
    $cookie_password = '';
}
if($_COOKIE['check_me'])
{
    $cookie_check = $_COOKIE['check_me'];
}else{
    $cookie_check = '';
}

    $smarty->assign("cookie_name",$cookie_name);
    $smarty->assign("cookie_password",$cookie_password);
    $smarty->assign("cookie_check",$cookie_check);


    
    if($_SESSION['iUserId'] !=''){
        $iUserId = $_SESSION['iUserId'];
        $Name = $_SESSION['Name'];
        $vProfileImage = $_SESSION['vProfileImage'];
    }
    
    $sql_interest = "select * from interest  where eStatus ='Active'";
    $db_interest = $obj->MySQLSelect($sql_interest);
    
    $sql_skill = "select * from skill where eStatus ='Active'";
    $db_skill = $obj->MySQLSelect($sql_skill);
    
    $sql_country = "select * from country_master";
    $db_country = $obj->MySQLSelect($sql_country);
    
    $sql_state = "select * from state_master";
    $db_state = $obj->MySQLSelect($sql_state);
    
    $sql_language = "select * from language";
    $db_language = $obj->MySQLSelect($sql_language);
    
    
    $sql_industry = "select * from industry";
    $db_industry = $obj->MySQLSelect($sql_industry);

    $member = "select * from members where iMemberId ='".$iUserId."' ";
    $mem_info = $obj->MySQLSelect($member);

    if($mem_info[0]['dBirthdate'] != '0000-00-00')
    {
     $mem_info[0]['dBirthdate'] = date('m-d-Y',strtotime($mem_info[0]['dBirthdate']));
    }else{
     $mem_info[0]['dBirthdate'] = '';
    }

   $sql_mem_country = "select vCountry from country_master where iCountryId =".$mem_info[0]['iCountryId'];
   $memCountry = $obj->MySQLSelect($sql_mem_country);
   $mem_info[0]['vCountry'] = $memCountry[0]['vCountry'];
   
   $sql_mem_state = "select * from state_master where iStateId =".$mem_info[0]['iStateId'];
   $memState = $obj->MySQLSelect($sql_mem_state);
   $mem_info[0]['vState'] = $memState[0]['vState'];
   $mem_info[0]['vStateSortCode'] = $memState[0]['vStateCode'];
   
    $sql_tooltips = "select * from question_tool_tip";
    $db_tooltips = $obj->MySQLSelect($sql_tooltips);

    $sess_total_product = $_SESSION['Cart']['sess_total_product'];
    if($sess_total_product == '')
    {
        $sess_total_product = 0;
    }else{
        $sess_total_product = $_SESSION['Cart']['sess_total_product'];
    }
    
    /*$sql_stcount1 = "Select count(iProductId) AS count from product_automotive where iMemberId = '".$_SESSION['iUserId']."'";
    $count_item1 = $obj->MySQLSelect($sql_stcount1);
    $sql_stcount2 = "Select count(iProductId) AS count from product_general_item where iMemberId = '".$_SESSION['iUserId']."'";
    $count_item2 = $obj->MySQLSelect($sql_stcount2);
    $sql_stcount3 = "Select count(iProductId) AS count from product_real_estate where iMemberId = '".$_SESSION['iUserId']."'";
    $count_item3 = $obj->MySQLSelect($sql_stcount3);
    $sql_stcount4 = "Select count(iProductId) AS count from product_clothing_accessories where iMemberId = '".$_SESSION['iUserId']."'";
    $count_item4 = $obj->MySQLSelect($sql_stcount4);
    $tot_storeitem = $count_item1[0]['count']+$count_item2[0]['count']+$count_item3[0]['count']+$count_item4[0]['count'];
    #product_clothing_accessories
    #product_clothing_accessories
    #product_general_item
    $tot_storeitem = 5;*/
    
    $sql_stcount = "Select * from product_count where iMemberId = '".$_SESSION['iUserId']."'";
    $db_cnt = $obj->MySQLSelect($sql_stcount);
    
    $tot_storeitem = $db_cnt[0]['iPro_tot_cnt'];
    
    $sql_term = "select * from static_pages where vFileName = 'terms&condition'";
    $db_term = $obj->MySQLSelect($sql_term);
    
    $sql_topban = "select * from banner where eStatus = 'Active'";
    $db_topban = $obj->MySQLSelect($sql_topban);
   
    //echo "<pre>";
    //print_r($sql_term);exit;
    
    
    $smarty->assign("db_topban",$db_topban);
    $smarty->assign("db_term",$db_term);
    $smarty->assign("tot_storeitem",$tot_storeitem);
    $smarty->assign("word",$word);
    $smarty->assign("mem_info",$mem_info);
    $smarty->assign("db_tooltips",$db_tooltips);
    $smarty->assign("db_industry",$db_industry);
    $smarty->assign("db_language",$db_language);
    $smarty->assign("db_country",$db_country);
    $smarty->assign("db_state",$db_state);
    $smarty->assign("db_skill",$db_skill);
    $smarty->assign("db_interest",$db_interest);
    $smarty->assign("iUserId",$iUserId);
    $smarty->assign("Name",$Name);
    $smarty->assign("vProfileImage",$vProfileImage);
    $smarty->assign("sess_total_product",$sess_total_product);
    
?>