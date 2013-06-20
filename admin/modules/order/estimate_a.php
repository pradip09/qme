<?php
$action = $_REQUEST['action'];
$iEstimateId = $_POST['iEstimateId'];
$Data = $_POST["Data"];
$IdArr = $_POST["IdArr"];
$fPrice = $_POST["fPrice"];
$iQty = $_POST["iQty"];
#echo "<pre>";
#print_r($_REQUEST);exit;
    
if($action == "add")
{
	
	
    $id = $obj->MySQLQueryPerform("estimates",$Data,'insert');
    if($id)$var_msg = "Estimate is Added Successfully.";else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "edit")
{	
	$grantotal='';
	$totcount = count($IdArr);
	for($i=0;$i<$totcount;$i++){
		$total='';
		$where = " iEstimateDetailId = '".$IdArr[$i]."'";
		$sql="UPDATE  estimate_orders SET  fPrice = '".$fPrice[$i]."' WHERE  $where"; 
		//echo $sql; 
		$db_sql=$obj->sql_query($sql);	
		$total = $fPrice[$i]*$iQty[$i];
		$sql2="UPDATE  estimate_orders SET fTotalPrice =  '".$total."' WHERE  $where";
		$db_sql=$obj->sql_query($sql2);
		$grantotal= $grantotal+($fPrice[$i]*$iQty[$i]);
	
	}
	$where = " iEstimateId = '".$iEstimateId."'";
	#print_r($grantOTAL);
	$sql1="UPDATE  estimates SET fGrandTotal =  '".$grantotal."' WHERE  $where";
	$db_sql=$obj->sql_query($sql1);	
	//echo $db_sql;exit;
	if($db_sql)$var_msg = "Estimate is Updated Successfully.";else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate&mode=edit&iEstimateId=$iEstimateId&var_msg=$var_msg");
	exit;
}
if($action=="Requested")
{
    $iEstimateId = $_REQUEST['iEstimateId'];
    $totid = count($iEstimateId);
    if(is_array($iEstimateId)){
        $iEstimateId  = @implode(",",$iEstimateId);
    }
    $data = array('eStatus'=>'Requested');
    $where = " iEstimateId IN (".$iEstimateId.")";
	$res = $obj->MySQLQueryPerform("estimates",$data,'update',$where);
	if($res)$var_msg = $totid."Record Requested Successfully.";else $var_msg="Eror-in Request.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Complete")
{
    $iEstimateId = $_REQUEST['iEstimateId'];
    $totid = count($iEstimateId);
    if(is_array($iEstimateId)){
        $iEstimateId  = @implode(",",$iEstimateId);
    }
    $data = array('eStatus'=>'Complete');
    $where = " iEstimateId IN (".$iEstimateId.")";
	$res = $obj->MySQLQueryPerform("estimates",$data,'update',$where);
	if($res)$var_msg = $totid." Record completed Successfully.";else $var_msg="Eror-in Complete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{
	$iEstimateId = $_POST['iEstimateId'];
	$sql="Delete from estimates where iEstimateId='".$iEstimateId."'"; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = "Estimate is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Deletes")
{
    $iEstimateId = $_REQUEST['iEstimateId'];
    $totid = count($iEstimateId);
    if(is_array($iEstimateId)){
        $iEstimateId  = @implode(",",$iEstimateId);
    }
    $where = " iEstimateId IN (".$iEstimateId.")";
	$sql="Delete from estimates where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = $totid." Record Deleted Successfully.";else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate&mode=view&var_msg=$var_msg");
	exit;
}

?>
