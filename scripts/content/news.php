<?php
$start = $_REQUEST['start'];
$FRONT_REC_LIMIT_ALL =  $user_reclimit;
$rec_limit 	= $FRONT_REC_LIMIT_ALL;
$var_limit = " ";


$sql="select * from news where eStatus='Active'";
$data=$obj->MySQLSelect($sql);
for($i=0;$i<count($data);$i++){
    if(strlen($data[$i]['vDescription'])>370){
			$data[$i]['vDescription']=substr($data[$i]['vDescription'],0,250).'..';
		}
}
#echo "<pre>";
#print_r($data);exit;

$smarty->assign("data",$data);

?>

