<?php
$iUserId=$_SESSION['iUserId'];
$orderid=$_REQUEST['id'];
//echo "<pre>";
//print_r($orderNo);exit;
    $sql_id ="Select * from `order` where iOrderId ='".$orderid."'";
    $ordernoarr = $obj->MySQLSelect($sql_id); 
    $orderNo = $ordernoarr[0]['vOrderNo'];
    $status = $ordernoarr[0]['eOrderStatus'];

$sql="select * from members where iMemberId='".$iUserId."'";
$db_sql= $obj->MySQLSelect($sql);
$memurl=$db_sql[0]['vMemberUrl'];


$smarty->assign("orderid", $orderid);
$smarty->assign("status", $status);
$smarty->assign("memurl", $memurl);
$smarty->assign("orderNo", $orderNo);

?>