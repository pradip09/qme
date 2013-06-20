<?php


$action = $_REQUEST['action'];
$iFAQId = $_POST['iFAQId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];

if($action == "add")
{
	$Data['vQuestion']= addslashes($Data['vQuestion']);
	$Data['tAnswer']= addslashes($Data['tAnswer']);
	
	$id = $obj->MySQLQueryPerform("faq",$Data,'insert');
	if($id)$var_msg = "FAQ is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fa-faq&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
	$Data['vQuestion']= addslashes($Data['vQuestion']);
	$Data['tAnswer']= addslashes($Data['tAnswer']);
	
	$iFAQId = $_POST['iFAQId'];
	$where = " iFAQId = '".$iFAQId."'";
	$res = $obj->MySQLQueryPerform("faq",$Data,'update',$where);

	if($res)$var_msg = "FAQ is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fa-faq&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iFAQId = $_REQUEST['iFAQId'];
    $totid = count($iFAQId);
       
    if(is_array($iFAQId)){
        $iFAQId  = @implode(",",$iFAQId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iFAQId IN (".$iFAQId.")";
	$res = $obj->MySQLQueryPerform("faq",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fa-faq&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iFAQId = $_REQUEST['iFAQId'];
    $totid = count($iFAQId );
    if(is_array($iFAQId )){
        $iFAQId = @implode(",",$iFAQId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iFAQId IN (".$iFAQId.")";
	$res = $obj->MySQLQueryPerform("faq",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fa-faq&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{	
	$iFAQId = $_POST['iFAQId'];
	$sql="Delete from faq where iFAQId='".$iFAQId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "FAQ is Deleted Successfully.";
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fa-faq&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{	
	$iFAQId="";
	foreach ($_POST['iFAQId'] as $id) {	
		$iFAQId = $iFAQId . $id .',';
	}
	
	$iFAQId = substr($iFAQId, 0, strlen($iFAQId)-1); 
	
	$where = " iFAQId IN (".$iFAQId.")";
	$sql="Delete from faq where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fa-faq&mode=view&var_msg=$var_msg");
	exit;
}

?>
