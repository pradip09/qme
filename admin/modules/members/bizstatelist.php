<?php
       /* 
        echo "<pre>";
        print_r($_REQUEST);
        exit;
       */
	include_once(TPATH_CLASS_APP."/class.country.php");
	$CountryObj = new Country();
	$countryId = $_REQUEST['CountryId'];	
	$iMemberId = $_REQUEST['iMemberId'];
	$sql = "select * from members where iMemberId ='".$iMemberId."'";
	$db_member = $obj->MySQLSelect($sql);	
	$ssql = " AND iCountryId =".$countryId;
	$stateArr = $CountryObj->getStateList($ssql);	
        $count=sizeof($stateArr);        
        echo'<select name="Data[iBizStateId]" id="iBizStateId" style="width:224px;" lang="*" title="BizState" class="inputbox">';
	echo'<option value="">--- Select State ---</option>';
        for($i=0;$i<$count;$i++){
            if( $stateArr[$i]['iStateId'] == $db_member[0]['iBizStateId']){
                echo"<option value={$stateArr[$i]['iStateId']} selected='selected'>{$stateArr[$i]['vState']}</option>";
            }else{
               echo"<option value={$stateArr[$i]['iStateId']}>{$stateArr[$i]['vState']}</option>";
            }
        }
        echo '</select>';    
        exit;
?>