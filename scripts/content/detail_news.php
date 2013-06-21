<?php

$userid =$_SESSION['iUserId'];
$sql="select * from members where IMemberId='".$userid."'";
$db_sql=$obj->MySQLSelect($sql);

$iNewsId = $_REQUEST['iNewsId'];
$sqlnews="SELECT * FROM news WHERE iNewsId='".$iNewsId."'";
$db_newsdetail = $obj->MySQLSelect($sqlnews);
$smarty->assign("db_newsdetail", $db_newsdetail);
$smarty->assign("db_sql",$db_sql);



?>