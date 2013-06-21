<?php
$generalobj->checkFrontAuthntication();
$sql_earn="select * from qme_earnpoints where iMemberId = '".$_SESSION['iUserId']."'";
$db_earn=$obj->MySQLSelect($sql_earn);

$sql_purchase="select * from qme_purchagepnts where iMemberId = '".$_SESSION['iUserId']."'";
$db_purchase=$obj->MySQLSelect($sql_purchase);

$total_earn = $db_earn[0]['Total_earnpoints'];
$total_purchase = $db_purchase[0]['Total_purchagepoints'];

$total_points = ($total_earn) + ($total_purchase);



$smarty->assign("total_earn",$total_earn);
$smarty->assign("total_purchase",$total_purchase);
$smarty->assign("total_points",$total_points);

?>