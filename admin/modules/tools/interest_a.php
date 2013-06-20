<?php

$action = $_REQUEST['action'];
$iInterestId = $_POST['iInterestId'];
$Data = $_POST["Data"];

if($action == "add")
{
	
        $id = $obj->MySQLQueryPerform("interest",$Data,'insert');
        if($id)$var_msg = " Interest is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-interest&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{

        $iInterestId = $_POST['iInterestId'];
	$where = " iInterestId = '".$iInterestId."'";
	$res = $obj->MySQLQueryPerform("interest",$Data,'update',$where);

	if($res)$var_msg = " Interest is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-interest&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iInterestId = $_REQUEST['iInterestId'];
    $totid = count($iInterestId);
       
    if(is_array($iInterestId)){
        $iInterestId  = @implode(",",$iInterestId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iInterestId IN (".$iInterestId.")";
	$res = $obj->MySQLQueryPerform("interest",$data,'update',$where);
	if($res)$var_msg = $totid." Interest Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-interest&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iInterestId = $_REQUEST['iInterestId'];
    $totid = count($iInterestId);
    if(is_array($iInterestId)){
        $iInterestId  = @implode(",",$iInterestId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iInterestId IN (".$iInterestId.")";
	$res = $obj->MySQLQueryPerform("interest",$data,'update',$where);
	if($res)$var_msg = $totid." Interest Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-interest&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{
	$iInterestId = $_POST['iInterestId'];
	$sql="Delete from interest where iInterestId='".$iInterestId."'"; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = " Interest is Deleted Successfully."; else $var_msg="Eror-in Delete.";
	header("Location: ".$admin_url."/index.php?file=to-interest&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{
	$iInterestId="";
	foreach ($_POST['iInterestId'] as $id) {
		$iInterestId = $iInterestId . $id .',';
	}
	
	$iInterestId = substr($iInterestId, 0, strlen($iInterestId)-1); 
	
	$where = " iInterestId IN (".$iInterestId.")";
	$sql="Delete from interest where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = $totid." Interest Deleted Successfully."; else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-interest&mode=view&var_msg=$var_msg");
	exit;
}

?>
