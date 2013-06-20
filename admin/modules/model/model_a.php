<?php


$action = $_REQUEST['action'];
$iModelId = $_POST['iModelId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];

if($action == "add")
{	
	$id = $obj->MySQLQueryPerform("model",$Data,'insert');
	if($id)$var_msg = "model is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=md-model&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
	
	$iModelId = $_POST['iModelId'];
	$where = " iModelId = '".$iModelId."'";
	$res = $obj->MySQLQueryPerform("model",$Data,'update',$where);

	if($res)$var_msg = "model is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=md-model&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iModelId = $_REQUEST['iModelId'];
    $totid = count($iModelId);
       
    if(is_array($iModelId)){
        $iModelId  = @implode(",",$iModelId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iModelId IN (".$iModelId.")";
	$res = $obj->MySQLQueryPerform("model",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=md-model&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iModelId = $_REQUEST['iModelId'];
    $totid = count($iModelId );
    if(is_array($iModelId )){
        $iModelId = @implode(",",$iModelId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iModelId IN (".$iModelId.")";
	$res = $obj->MySQLQueryPerform("model",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=md-model&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{	
	$iModelId = $_POST['iModelId'];
	$sql="Delete from model where iModelId='".$iModelId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "model is Deleted Successfully.";
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=md-model&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{	
	$iModelId="";
	foreach ($_POST['iModelId'] as $id) {	
		$iModelId = $iModelId . $id .',';
	}
	
	$iModelId = substr($iModelId, 0, strlen($iModelId)-1); 
	
	$where = " iModelId IN (".$iModelId.")";
	$sql="Delete from model where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=md-model&mode=view&var_msg=$var_msg");
	exit;
}

?>
