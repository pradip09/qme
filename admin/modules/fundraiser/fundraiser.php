<?php

    
    $mode = $_REQUEST['mode'];
    $iCampaignId = $_REQUEST['iCampaignId'];
    $type = $_REQUEST['type'];
     
    if($iCampaignId !=''){
        $sql_postjob = "SELECT * FROM fundraiser_campaign  WHERE iCampaignId='".$iCampaignId."'";	
        $db_fundcampaign = $obj->MySQLSelect($sql_postjob);
        
        $interestArr = explode(",",$db_fundcampaign[0]['iInterestId']);
        $industryArr = explode(",",$db_fundcampaign[0]['iIndustryId']);
    } 
    
    
    
    $sql_int = "select * from interest";
    $db_interest = $obj->MySQLSelect($sql_int);
    
    $sql_ind = "select * from industry";
    $db_industry = $obj->MySQLSelect($sql_ind);
        
    $sql_mem = "select * from members";
    $db_fundMember = $obj->MySQLSelect($sql_mem);
    
    $sql_int = "select * from compaign_item WHERE iCampaignId='".$iCampaignId."' ORDER BY  iItemId";
    $db_compaignitem = $obj->MySQLSelect($sql_int);
    
    if($mode == 'add'){
      $totgal = 1;  
    }else{
        if(count($db_compaignitem) > 0){
         $totgal = count($db_compaignitem);
         $flag=1;
        }else{
            $totgal = 1;
            $flag = 0;
        }
        
    }
      
    $smarty->assign("mode",$mode);
    $smarty->assign("db_compaignitem",$db_compaignitem);
    $smarty->assign("db_interest",$db_interest);
    $smarty->assign("db_fundcampaign",$db_fundcampaign);
    $smarty->assign("iCampaignId",$iCampaignId);
    $smarty->assign("db_fundMember",$db_fundMember);
    $smarty->assign("db_industry",$db_industry);
    $smarty->assign("industryArr",$industryArr);
    $smarty->assign("interestArr",$interestArr);
    $smarty->assign("totgal",$totgal);
    $smarty->assign("flag",$flag);
    $smarty->assign("type",$type);
?>
