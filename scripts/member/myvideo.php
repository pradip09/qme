<?php

$generalobj->checkFrontAuthntication();

$iMemberId    = $_SESSION['iUserId'];

$sql_category = "Select * from video_album where iMemberId = '".$iMemberId."'";
	$db_albums = $obj->MySQLSelect($sql_category);
	$smarty->assign("db_albums", $db_albums);

?>