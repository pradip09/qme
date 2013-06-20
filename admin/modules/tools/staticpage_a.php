<?php

$action = $_REQUEST['action'];
$iPageId= $_POST['iPageId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];

if($action == "add")
{   
	$res = $obj->MySQLQueryPerform("static_pages",$Data,'insert');
	if($res)$var_msg = "Page is Added Successfully."; else $var_msg="Eror-in edit.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-staticpage&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{

	$iPageId = $_POST['iPageId'];
	$where = " iPageId = '".$iPageId."'";
	$res = $obj->MySQLQueryPerform("static_pages",$Data,'update',$where);
	if($res)$var_msg = "Page is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-staticpage&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{   
    $iPageId = $_REQUEST['iPageId'];
    $totid = count($iPageId);
       
    if(is_array($iPageId)){
        $iPageId  = @implode(",",$iPageId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iPageId IN (".$iPageId.")";
	$res = $obj->MySQLQueryPerform("static_pages",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-staticpage&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iPageId = $_REQUEST['iPageId'];
    $totid = count($iPageId);
    
    if(is_array($iPageId)){
        $iPageId  = @implode(",",$iPageId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iPageId IN (".$iPageId.")";
	$res = $obj->MySQLQueryPerform("static_pages",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-staticpage&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{
    
	$iPageId = $_POST['iPageId'];
	$sql="Delete from static_pages where iPageId='".$iPageId."'"; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = "Page is Deleted Successfully."; else $var_msg="Eror-in Delete.";
	header("Location: ".$admin_url."/index.php?file=to-staticpage&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Deletes")
{
	$iPageId="";
	foreach ($_POST['iPageId'] as $id) {
		$iPageId = $iPageId . $id .',';
	}
	
    $iPageId = substr($iPageId, 0, strlen($iPageId)-1); 
    $where = " $iPageId IN (".$iPageId.")";
	$sql="Delete from static_pages where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = $totid." Record Deleted Successfully."; else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-staticpage&mode=view&var_msg=$var_msg");
	exit;
}

?>
