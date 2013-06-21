<?php

$generalobj->checkFrontAuthntication();

$iCateroryId  = $_REQUEST['iCateroryId'];

$iMemberId    = $_SESSION['iUserId'];

$sql_category = "Select * from photo_category where iMemberId = '".$iMemberId."'";
	$db_albums = $obj->MySQLSelect($sql_category);
	
        
$smarty->assign("db_albums", $db_albums);
$smarty->assign("iCateroryId",$iCateroryId);


?>