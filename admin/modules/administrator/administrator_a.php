<?php

$action = $_REQUEST['action'];
$iAdminId = $_POST['iAdminId'];
$Data = $_POST["Data"];
$Data['vPassword'] = $generalobj->encrypt($Data['vPassword']); 
$Data['vFromIP'] = $_SERVER['REMOTE_ADDR'];
    
if($action == "add")
{
	$Data['dAddedDate'] = date("Y-m-d H:i:s");
	$id = $obj->MySQLQueryPerform("administrators",$Data,'insert');
	if($id)$var_msg = "Admin is Added Successfully.";else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ad-administrator&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "edit")
{
	$Data['dModifiedDate'] = date("Y-m-d H:i:s");
	$iAdminId = $_POST['iAdminId'];
	$where = " iAdminId = '".$iAdminId."'";
	$res = $obj->MySQLQueryPerform("administrators",$Data,'update',$where);
	if($res)$var_msg = "Admin is Updated Successfully.";else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ad-administrator&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{
	$iAdminId = $_POST['iAdminId1'];
	$sql="Delete from administrators where iAdminId='".$iAdminId."'"; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = "Admin is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ad-administrator&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Active")
{
    $iAdminId = $_REQUEST['iAdminId'];
    $totid = count($iAdminId);
    if(is_array($iAdminId)){
        $iAdminId  = @implode(",",$iAdminId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iAdminId IN (".$iAdminId.")";
	$res = $obj->MySQLQueryPerform("administrators",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ad-administrator&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iAdminId = $_REQUEST['iAdminId'];
    $totid = count($iAdminId);
    if(is_array($iAdminId)){
        $iAdminId  = @implode(",",$iAdminId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iAdminId IN (".$iAdminId.")";
	$res = $obj->MySQLQueryPerform("administrators",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ad-administrator&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{
    $iAdminId = $_REQUEST['iAdminId'];
    $totid = count($iAdminId);
    
    if(is_array($iAdminId)){
        $iAdminId  = @implode(",",$iAdminId);
    }
    $where = " iAdminId IN (".$iAdminId.")";
	$sql="Delete from administrators where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = $totid." Record Deleted Successfully.";else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ad-administrator&mode=view&var_msg=$var_msg");
	exit;
}

?>
