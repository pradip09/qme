<?php
$action = $_REQUEST['action'];
$iLoginHistoryId = $_POST['iLoginHistoryId'];

#echo "<pre>";
#print_r($_REQUEST);exit;
    


if($action=="Deletes")
{
    $iLoginHistoryId = $_REQUEST['iLoginHistoryId'];
    $totid = count($iLoginHistoryId);

    if(is_array($iLoginHistoryId)){
        $iLoginHistoryId  = @implode(",",$iLoginHistoryId);
    }
    $where = " iLoginHistoryId IN (".$iLoginHistoryId.")";
	$sql="Delete from login_histories where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = $totid." Record Deleted Successfully.";else $var_msg="Eror-in Delete.";
	header("Location: ".$admin_url."/index.php?file=ad-loginhistory&mode=view&var_msg=$var_msg");
	exit;
}

?>