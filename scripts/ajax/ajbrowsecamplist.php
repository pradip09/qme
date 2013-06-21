<?php
        
        
	include_once(TPATH_CLASS_APP."/class.country.php");
	$CountryObj = new Country();
	$countryId = $_REQUEST['countryId'];
	$ssql = " AND iCountryId =".$countryId;
	$stateArr = $CountryObj->getStateList($ssql);	
        $count=sizeof($stateArr);        
        echo'<select name="searchstate" id="searchstate" style="width: 156px;margin-bottom: 5px;">';
	echo'<option value="">Select State</option>';
        for($i=0;$i<$count;$i++){
           if( $stateArr[$i]['iStateId'] !=  ''){
                echo"<option value={$stateArr[$i]['iStateId']} >{$stateArr[$i]['vState']}</option>";
            }else{
               echo"<option value={$stateArr[$i]['iStateId']}>{$stateArr[$i]['vState']}</option>";
            }
        }
	 echo "<script>$('#searchstate').selectbox({debug: true});</script>";
        echo '</select>';    
        exit;
?>