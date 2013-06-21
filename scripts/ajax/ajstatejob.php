<?php	
	include_once(TPATH_CLASS_APP."/class.country.php");
	$CountryObj = new Country();
	$countryId = $_REQUEST['countryId'];
	$iPostJobId = $_REQUEST['iPostJobId'];
	
	$sMemberId = $_SESSION['iUserId'];
	$postjob = "select * from post_job where iMemberId ='".$sMemberId."' AND iPostJobId = '".$iPostJobId."'";
	$db_postjob = $obj->MySQLSelect($postjob);
	
	$ssql = " AND iCountryId =".$countryId;
	$stateArr = $CountryObj->getStateList($ssql);
	
	$smarty->assign("db_postjob",$db_postjob);
	$smarty->assign("stateArr", $stateArr);
?>