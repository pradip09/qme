<?php

$iUserId = $_SESSION['iUserId'];

$sqljobs="SELECT * FROM post_job WHERE iMemberId = '".$iUserId."'";
$db_browsjobs = $obj->MySQLSelect($sqljobs);

for($i = 0; $i < count($db_browsjobs); $i++)
{
    if(strlen($db_browsjobs[$i]['tDescription'])>170){
        $db_browsjobs[$i]['tDescription']=substr($db_browsjobs[$i]['tDescription'],0,169).'..';
}
}

$sql="SELECT  * FROM  members";
$db_zip = $obj->MySQLSelect($sql);
//echo "<pre>";
//print_r($db_zip);exit;

$smarty->assign("db_zip", $db_zip);
$smarty->assign("iUserId", $iUserId);
$smarty->assign("db_browsjobs", $db_browsjobs);

?>