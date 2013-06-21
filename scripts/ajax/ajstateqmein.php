<?php	
	include_once(TPATH_CLASS_APP."/class.country.php");
	$CountryObj = new Country();
	$countryId = $_REQUEST['countryId'];
	$iQmeInId = $_REQUEST['iQmeInId'];
	
	$sMemberId = $_SESSION['iUserId'];
	$QmeIn = "select * from qmein where iMemberId ='".$sMemberId."' AND iQmeInId = '".$iQmeInId."'";
	$db_QmeIn = $obj->MySQLSelect($QmeIn);
	
	$ssql = " AND iCountryId =".$countryId;
	$stateArr = $CountryObj->getStateList($ssql);
	
	$smarty->assign("db_QmeIn",$db_QmeIn);
	$smarty->assign("stateArr", $stateArr);
?>