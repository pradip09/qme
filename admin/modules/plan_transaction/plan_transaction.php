<?php

	$mode = $_REQUEST['mode'];
	$iPlanTransactionId = $_REQUEST['iPlanTransactionId'];
	
	if($iPlanTransactionId !='')
	{
		//$sql_Plan = "select * from plan_transaction where iPlanTransactionId='".$iPlanTransactionId."' ";
		$sql_Plan = "SELECT p.*,m.vName,m.vEmail,s.vStorePlanName,s.fPrice,s.iPoint,s.item_limit FROM plan_transaction AS p LEFT JOIN members AS m on m.iMemberId = p.iMemberId LEFT JOIN store_plan s on p.iPlanId = s.iStorePlanId WHERE iPlanTransactionId='".$iPlanTransactionId."'";
		$db_plan = $obj->MySQLSelect($sql_Plan);
		$db_plan[0]['vCardNo'] = substr_replace($db_plan[0]['vCardNo'], str_repeat('X', strlen($db_plan[0]['vCardNo']) - 4), 0, -4);
		$db_plan[0]['dTransactionDate'] = date('dS-M-Y',strtotime($db_plan[0]['dTransactionDate']));
	}
	#echo "<pre>";
	#print_r($db_plan);exit;
	$smarty->assign("mode",$mode);
	$smarty->assign("db_plan",$db_plan);
	$smarty->assign("iPlanTransactionId",$iPlanTransactionId);
?>
