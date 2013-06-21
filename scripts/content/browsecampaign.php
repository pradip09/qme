<?php
$iUserId = $_SESSION['iUserId'];

$sqlcamps="SELECT * FROM post_campaign WHERE iMemberId = '".$iUserId."'";
$db_browscamps = $obj->MySQLSelect($sqlcamps);

for($i = 0; $i < count($db_browscamps); $i++)
{
    if(strlen($db_browscamps[$i]['tContent'])>15){
        $db_browscamps[$i]['tContent']=substr($db_browscamps[$i]['tContent'],0,14).'..';
}
}

$sql="SELECT  * FROM  members";
$db_zip = $obj->MySQLSelect($sql);
//echo "<pre>";
//print_r($db_zip);exit;

$smarty->assign("db_zip", $db_zip);
$smarty->assign("iUserId", $iUserId);
$smarty->assign("db_browscamps", $db_browscamps);
?>