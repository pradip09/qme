<?php
    
    $iCampaignId = $_REQUEST['iCampaignId'];
    $iMemberId = $_REQUEST['iMemberId'];
    $modeCampaign='add';
    if($iCampaignId !=''){
        $sql_post_campaign = "SELECT * FROM post_campaign WHERE iCampaignId='".$iCampaignId."'";	
        $db_post_campaign = $obj->MySQLSelect($sql_post_campaign);
        $modeCampaign='edit';
        $Arrintrest = explode(",",$db_post_campaign[0]['iInterestId']);
	$Arrskill= explode(",",$db_post_campaign[0]['iSkillId']);
    }
    
        $sql_interest = "select * from interest";
	$db_interest = $obj->MySQLSelect($sql_interest);
	
	$sql_skill = "select * from skill";
	$db_skill = $obj->MySQLSelect($sql_skill);
        
        $sql_cont_info="select * from  country_master";
        $db_cont_info = $obj->MySQLSelect($sql_cont_info);
        
        $smarty->assign("modeCampaign",$modeCampaign);
        $smarty->assign("db_cont_info",$db_cont_info);
        $smarty->assign("db_post_campaign",$db_post_campaign);
        $smarty->assign("iCampaignId",$iCampaignId);
        $smarty->assign("iMemberId",$iMemberId);
        $smarty->assign("db_interest",$db_interest);
        $smarty->assign("db_skill",$db_skill);
        $smarty->assign("Arrintrest",$Arrintrest);
        $smarty->assign("Arrskill",$Arrskill);
?>
