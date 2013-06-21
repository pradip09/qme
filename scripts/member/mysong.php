<?php



$generalobj->checkFrontAuthntication();
$iMemberId    = $_SESSION['iUserId'];

$sql_category = "Select * from song_album where iMemberId = '".$iMemberId."'";
	$db_albums = $obj->MySQLSelect($sql_category);
	$smarty->assign("db_albums", $db_albums);

$sql_genre = "Select * from song_genre";
	$db_genre = $obj->MySQLSelect($sql_genre);
	$smarty->assign("db_genre", $db_genre);



?>