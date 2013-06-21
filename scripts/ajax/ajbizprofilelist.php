<?php
	include_once(TPATH_CLASS_APP."/class.country.php");
	$CountryObj = new Country();
	$countryId = $_REQUEST['CountryId'];
	$sMemberId = $_SESSION['iUserId'];
	$sql = "select * from members where iMemberId ='".$sMemberId."'";
	$db_member = $obj->MySQLSelect($sql);
	
	$ssql = " AND iCountryId =".$countryId;
	$stateArr = $CountryObj->getStateList($ssql);
    
        
	$smarty->assign("db_member",$db_member);
	$smarty->assign("stateArr", $stateArr);
       
?>