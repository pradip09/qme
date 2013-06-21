<?php
$generalobj->checkFrontAuthntication();
$sql="select * from qme_earnpoints where iMemberId = '".$_SESSION['iUserId']."'";
$db_point=$obj->MySQLSelect($sql);
$total_points = $db_point[0]['Total_earnpoints'];

$smarty->assign("total_points",$total_points);

?>