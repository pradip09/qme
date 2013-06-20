<?php

        
	include_once(TPATH_CLASS_APP."/class.country.php");
	$CountryObj = new Country();
	$countryId = $_REQUEST['countryId'];
	$iMemberId = $_REQUEST['iMemberId'];
	$iCampaignId = $_REQUEST['iCampaignId'];
	$sql = "select * from post_campaign where iMemberId ='".$iMemberId."' AND iCampaignId='".$iCampaignId."'";
	$db_member = $obj->MySQLSelect($sql);
        $ssql = " AND iCountryId =".$countryId;
	$stateArr = $CountryObj->getStateList($ssql);
        $count=sizeof($stateArr);       
        echo'<select name="Data[iStateId]" id="iStateId" style="width:224px;" class="inputbox" lang="*" title="State">';
	echo'<option value="">--- Select State ---</option>';      
	for($i=0;$i<$count;$i++){
            if( $stateArr[$i]['iStateId'] == $db_member[0]['iStateId']){
                echo"<option value={$stateArr[$i]['iStateId']} selected='selected'>{$stateArr[$i]['vState']}</option>";
            }else{
               echo"<option value={$stateArr[$i]['iStateId']}>{$stateArr[$i]['vState']}</option>";
            }
        }
        echo '</select>';    
        exit;
       
?>