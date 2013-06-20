<?php

$action = $_REQUEST['action'];
$iEmailTemplateId = $_POST['iEmailTemplateId'];
$Data = $_POST["Data"];
$Data['tEmailMessage'] = stripslashes($_POST['tEmailMessage']);

if($action == "add")
{
	
	$id = $obj->MySQLQueryPerform("system_email",$Data,'insert');
	if($id)$var_msg = "System Email is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-systememails&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{

	$iEmailTemplateId = $_POST['iEmailTemplateId'];
	$where = " iEmailTemplateId = '".$iEmailTemplateId."'";
	$res = $obj->MySQLQueryPerform("system_email",$Data,'update',$where);

	if($res)$var_msg = " System Email is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-systememails&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iEmailTemplateId = $_REQUEST['iEmailTemplateId'];
    $totid = count($iEmailTemplateId);
       
    if(is_array($iEmailTemplateId)){
        $iEmailTemplateId  = @implode(",",$iEmailTemplateId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iEmailTemplateId IN (".$iEmailTemplateId.")";
	$res = $obj->MySQLQueryPerform("system_email",$data,'update',$where);
	if($res)$var_msg = $totid." System Email Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-systememails&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iEmailTemplateId = $_REQUEST['iEmailTemplateId'];
    $totid = count($iEmailTemplateId);
    if(is_array($iEmailTemplateId)){
        $iEmailTemplateId  = @implode(",",$iEmailTemplateId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iEmailTemplateId IN (".$iEmailTemplateId.")";
	$res = $obj->MySQLQueryPerform("system_email",$data,'update',$where);
	if($res)$var_msg = $totid." System Email Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-systememails&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{
	$iEmailTemplateId = $_POST['iEmailTemplateId'];
	$sql="Delete from system_email where iUserId='".$iEmailTemplateId."'"; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = " System Email is Deleted Successfully."; else $var_msg="Eror-in Delete.";
	header("Location: ".$admin_url."/index.php?file=to-systememails&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{
	$iEmailTemplateId="";
	foreach ($_POST['iEmailTemplateId'] as $id) {
		$iEmailTemplateId = $iEmailTemplateId . $id .',';
	}
	
	$iEmailTemplateId = substr($iEmailTemplateId, 0, strlen($iEmailTemplateId)-1); 
	
	$where = " iEmailTemplateId IN (".$iEmailTemplateId.")";
	$sql="Delete from system_email where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = $totid." System Email Deleted Successfully."; else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-systememails&mode=view&var_msg=$var_msg");
	exit;
}

?>
