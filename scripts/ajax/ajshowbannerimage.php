<?php
	$iBannerId = $_REQUEST['iBannerId'];
	
	$bannerNum = $_REQUEST['bannerNum'];
	
	$sql_banner = "SELECT * FROM banner_image  WHERE iBannerId='".$iBannerId."'";
	$db_banner = $obj->MySQLSelect($sql_banner);
	$smarty->assign("db_banner",$db_banner);
	$smarty->assign("bannerNum",$bannerNum);
?>
