<?php


$action = $_REQUEST['action'];
$iPostJobId = $_POST['iPostJobId'];
$Data = $_POST["Data"];
$Data['iInterestId'] = implode(",",$_REQUEST['iInterestId']);
$Data['iSkillId']= implode(",",$_REQUEST['iSkillId']);
	

if($action == "add")
{
	$Data['iAdminId'] =  $_SESSION['sess_iAdminId'];
	$Data['dAddedDate'] = date('Y-m-d H:i:s');
	$id = $obj->MySQLQueryPerform("post_job",$Data,'insert');
	if($id)$var_msg = " Job Posted Successfully.";else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pj-postjob&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "edit")
{
	$iPostJobId = $_POST['iPostJobId'];
	$where = " iPostJobId = '".$iPostJobId."'";
	$res = $obj->MySQLQueryPerform("post_job",$Data,'update',$where);
	if($res)$var_msg = " Posted Job is Updated Successfully.";else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pj-postjob&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Active")
{
	$iPostJobId = $_REQUEST['iPostJobId'];
	$totid = count($iPostJobId);
	if(is_array($iPostJobId)){
	    $iPostJobId  = @implode(",",$iPostJobId);
	}
	$data = array('eStatus'=>'Active');
	$where = " iPostJobId IN (".$iPostJobId.")";
	    $res = $obj->MySQLQueryPerform("post_job",$data,'update',$where);
	    if($res)$var_msg = $totid." Record Activeted Successfully.";else $var_msg="Eror-in Active.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pj-postjob&mode=view&var_msg=$var_msg");
	    exit;
}

if($action=="Inactive")
{
	$iPostJobId = $_REQUEST['iPostJobId'];
	$totid = count($iPostJobId);
	if(is_array($iPostJobId)){
	    $iPostJobId  = @implode(",",$iPostJobId);
	}
	$data = array('eStatus'=>'Inactive');
	$where = " iPostJobId IN (".$iPostJobId.")";
	    $res = $obj->MySQLQueryPerform("post_job",$data,'update',$where);
	    if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Inactive.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pj-postjob&mode=view&var_msg=$var_msg");
	    exit;
}
if($action == "Delete")
{
	$iPostJobId = $_POST['iPostJobId'];
	$sql="Delete from post_job where iPostJobId='".$iPostJobId."'"; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = " Posted Job is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pj-postjob&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Deletes")
{
	$iPostJobId = $_REQUEST['iPostJobId'];
	$totid = count($iPostJobId);
	if(is_array($iPostJobId)){
	    $iPostJobId  = @implode(",",$iPostJobId);
	}
	$where = " iPostJobId IN (".$iPostJobId.")";
	    $sql="Delete from post_job where ".$where; 
	    $db_sql=$obj->sql_query($sql);	
	    if($db_sql)$var_msg = $totid." Record Deleted Successfully.";else $var_msg="Eror-in Delete.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pj-postjob&mode=view&var_msg=$var_msg");
	    exit;
}

?>