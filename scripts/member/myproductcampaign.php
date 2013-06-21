<?php
$iMemberId = $_SESSION['iUserId'];

    $generalobj->checkFrontAuthntication();
    $iCampaignId = $_REQUEST['iCampaignId'];
    $mode=$_REQUEST['type'];
   
  
   
    $iProductId=$_REQUEST['iCampaignId'];
    $iStoreCategoryId=$_REQUEST['categoryId'];
    $sql_static_pages = "select * from static_pages where vPageCode = 'learnmore_campaign'";
    $db_static_pages = $obj->MySQLSelect($sql_static_pages);
    
    $sql_country = "select * from country_master";
    $db_mycountry = $obj->MySQLSelect($sql_country);
    
   // $sql_indust = "select * from industry where iIndustryId=".$db_campaign[0]['vIndstry']."";
   // $db_indust= $obj->MySQLSelect($sql_indust);
   
    $smarty->assign("iProductId",$iProductId);
    $smarty->assign("iStoreCategoryId",$iStoreCategoryId);
    $smarty->assign("relatedArrIntrest",$relatedArrIntrest);
    $smarty->assign("relatedArr",$relatedArr);
    $smarty->assign("db_static_pages", $db_static_pages);
    $smarty->assign("mode",$mode);
    $smarty->assign("iMemberId",$iMemberId);
    $smarty->assign("db_campaign",$db_campaign);
    $smarty->assign("db_mycountry",$db_mycountry);
?>