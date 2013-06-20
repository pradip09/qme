<?php

$action = $_REQUEST['action'];
$iStorePlanId = $_POST['iStorePlanId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];


if($action == "add")
{
	$id = $obj->MySQLQueryPerform("store_plan",$Data,'insert');
	if($id)$var_msg = "Store Plan data is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=sp-storeplan&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
	$iStorePlanId = $_POST['iStorePlanId'];
	$where = " iStorePlanId = '".$iStorePlanId."'";
	$res = $obj->MySQLQueryPerform("store_plan",$Data,'update',$where);
	if($res)$var_msg = "Store Plan data is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=sp-storeplan&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iStorePlanId = $_REQUEST['iStorePlanId'];
    $totid = count($iStorePlanId);
       
    if(is_array($iStorePlanId)){
        $iStorePlanId  = @implode(",",$iStorePlanId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iStorePlanId IN (".$iStorePlanId.")";
	$res = $obj->MySQLQueryPerform("store_plan",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=sp-storeplan&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
	
    $iStorePlanId = $_REQUEST['iStorePlanId'];
    $totid = count($iStorePlanId );
    if(is_array($iStorePlanId )){
        $iStorePlanId = @implode(",",$iStorePlanId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iStorePlanId IN (".$iStorePlanId.")";
	$res = $obj->MySQLQueryPerform("store_plan",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=sp-storeplan&mode=view&var_msg=$var_msg");
	exit;
}

?>
