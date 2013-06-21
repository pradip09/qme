<?php
$iMemberId = $_SESSION['iUserId'];

    $generalobj->checkFrontAuthntication();
    $iCampaignId = $_REQUEST['iCampaignId'];
  
    if($iCampaignId == 'add')
    {
        $mode = 'add';
        
    }else{
        
	$sql_campaign = "select * from post_campaign where iCampaignId='".$iCampaignId."' AND iMemberId = '".$iMemberId."'";
        $db_campaign = $obj->MySQLSelect($sql_campaign);	
        $mode = 'edit';
	$relatedArr = explode(",",$db_campaign[0]['iSkillId']);
	$relatedArrIntrest = explode(",",$db_campaign[0]['iInterestId']);
	$db_campaign[0][dStartDate]=date("m-d-Y",strtotime($db_campaign[0][dStartDate]));
	$db_campaign[0][dFinishDate]=date("m-d-Y",strtotime($db_campaign[0][dFinishDate]));
        
    }
    
    $sql_static_pages = "select * from static_pages where vPageCode = 'learnmore_campaign'";
    $db_static_pages = $obj->MySQLSelect($sql_static_pages);
    
    $sql_country = "select * from country_master";
    $db_mycountry = $obj->MySQLSelect($sql_country);
    
   // $sql_indust = "select * from industry where iIndustryId=".$db_campaign[0]['vIndstry']."";
   // $db_indust= $obj->MySQLSelect($sql_indust);
   
    
    $smarty->assign("relatedArrIntrest",$relatedArrIntrest);
    $smarty->assign("relatedArr",$relatedArr);
    $smarty->assign("db_static_pages", $db_static_pages);
    $smarty->assign("mode",$mode);
    $smarty->assign("iMemberId",$iMemberId);
    $smarty->assign("db_campaign",$db_campaign);
   // $smarty->assign("db_indust",$db_indust);
    $smarty->assign("db_mycountry",$db_mycountry);


?>