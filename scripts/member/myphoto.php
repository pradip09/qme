<?php

$generalobj->checkFrontAuthntication();
$iMemberId    = $_SESSION['iUserId'];

$sql_category = "Select * from photo_category where iMemberId = '".$iMemberId."'";
	$db_albums = $obj->MySQLSelect($sql_category);


//$sql_cate = "Select pc.*,count(ph.iPhotoCategoryId) AS count from photo_category  AS pc LEFT JOIN photo AS ph ON(pc.iMemberId = ph.iMemberId) where pc.iMemberId = '0' AND pc.iPhotoCategoryId='0'";
$sql_cate = "select * from photo where iPhotoCategoryId = '0' AND iMemberId = '".$iMemberId."'";
	$db_albums = $obj->MySQLSelect($sql_cate);
        $gen_count = count($db_albums);

	


$smarty->assign("gen_count", $gen_count);
	$smarty->assign("db_albums", $db_albums);

?>