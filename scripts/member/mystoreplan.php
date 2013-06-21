<?php
$generalobj->checkFrontAuthntication();

$sql_store = "select * from store_plan ";
$db_storeplan = $obj->MySQLSelect($sql_store);

$iMemberId = $_SESSION['iUserId'];
$sql_plan = "SELECT * FROM plan_transaction WHERE iMemberId = '".$iMemberId."' ORDER BY iPlanTransactionId DESC Limit 1";
$db_plan = $obj->MySQLSelect($sql_plan);
#echo "<pre>";
#print_r($db_storeplan);exit;

$free_limit = $db_storeplan[0]['item_limit'];
if($db_plan[0]['iPlanId'] == '2'){
    $bronze_limit = $db_storeplan[0]['item_limit'] + $db_storeplan[1]['item_limit'];
}
else{
    $bronze_limit = $db_storeplan[0]['item_limit'];
}
if($db_plan[0]['iPlanId'] == '3'){
    $silver_limit = $db_storeplan[0]['item_limit'] + $db_storeplan[2]['item_limit'];
}
else{
    $silver_limit = $db_storeplan[0]['item_limit'];
}
$gold_limit = $silver_limit + $db_storeplan[4]['item_limit'];

$smarty->assign("free_limit",$free_limit);
$smarty->assign("bronze_limit",$bronze_limit);
$smarty->assign("silver_limit",$silver_limit);
$smarty->assign("gold_limit",$gold_limit);

$smarty->assign("db_plan",$db_plan);
$smarty->assign("db_storeplan",$db_storeplan);


?>