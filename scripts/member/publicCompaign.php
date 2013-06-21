<?php
$generalobj->checkFrontAuthntication();

$url = $_REQUEST['mamberurl'];
$sql_user = "select * from members where vMemberUrl='".$url."'";
$db_user = $obj->MySQLSelect($sql_user);
//echo "<pre>";
//print_r($url);exit;
    if($db_user[0]['iMemberId'] == ''){
    header("location:".$tconfig["tsite_url"]."/home");
}else{
    $iUserid = $db_user[0]['iMemberId'];

$sqlcamps="SELECT * FROM post_campaign WHERE iMemberId = '".$iUserid."'";
#echo $sqlcamps;exit;
$db_browscamps = $obj->MySQLSelect($sqlcamps);

for($i = 0; $i < count($db_browscamps); $i++)
{
    if(strlen($db_browscamps[$i]['tContent'])>15){
        $db_browscamps[$i]['tContent']=substr($db_browscamps[$i]['tContent'],0,14).'..';
}
}
}

$smarty->assign("db_user", $db_user);
$smarty->assign("iMemberid", $iUserid);
$smarty->assign("db_browscamps", $db_browscamps);
?>