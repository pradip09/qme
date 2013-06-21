<?php


$sqljobs="SELECT * FROM post_job WHERE iAdminId != '' order by rand() limit 2";
$sqlcamps="SELECT * FROM post_campaign WHERE iAdminId !='' order by rand() limit 2";

$db_postjob = $obj->MySQLSelect($sqljobs);
$db_postcamp = $obj->MySQLSelect($sqlcamps);

for($i = 0; $i < count($db_postcamp); $i++)
{
    if(strlen($db_postcamp[$i]['tContent'])>15){
        $db_postcamp[$i]['tFullContent']=$db_postcamp[$i]['tContent'];
        $db_postcamp[$i]['tContent']=substr($db_postcamp[$i]['tContent'],0,14).'..';
}
}

$smarty->assign("db_postjob", $db_postjob);
$smarty->assign("db_postcamp", $db_postcamp);


?>