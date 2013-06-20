<?php
$action = $_REQUEST['action'];
$iPostId = $_POST['iPostId'];

$Data = $_POST["Data"];


if($action == "add")
{
	$Data['dAddedDate'] = date('Y-m-d H:i:s');
	$id = $obj->MySQLQueryPerform("post_opportunity",$Data,'insert');
	if($id)$var_msg = "Post opportunity is Added Successfully.";else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=po-postopportunity&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "edit")
{
	
	$iPostId = $_POST['iPostId'];
	$where = " iPostId = '".$iPostId."'";
	$res = $obj->MySQLQueryPerform("post_opportunity",$Data,'update',$where);
	if($res)$var_msg = "Post opportunity is Updated Successfully.";else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=po-postopportunity&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Active")
{
    $iPostId = $_REQUEST['iPostId'];
    $totid = count($iPostId);
    if(is_array($iPostId)){
        $iPostId  = @implode(",",$iPostId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iPostId IN (".$iPostId.")";
	$res = $obj->MySQLQueryPerform("post_opportunity",$data,'update',$where);
	if($res)$var_msg = $totid."Record Activeted Successfully.";else $var_msg="Eror-in Active.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=po-postopportunity&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iPostId = $_REQUEST['iPostId'];
    $totid = count($iPostId);
    if(is_array($iPostId)){
        $iPostId  = @implode(",",$iPostId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iPostId IN (".$iPostId.")";
	$res = $obj->MySQLQueryPerform("post_opportunity",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Inactive.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=po-postopportunity&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{
	$iPostId = $_POST['iPostId'];
	$sql="Delete from post_opportunity where iPostId='".$iPostId."'"; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = "Opportunity is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=po-postopportunity&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Deletes")
{
    $iPostId = $_REQUEST['iPostId'];
    $totid = count($iPostId);
    if(is_array($iPostId)){
        $iPostId  = @implode(",",$iPostId);
    }
    $where = " iPostId IN (".$iPostId.")";
	$sql="Delete from post_opportunity where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = $totid." Record Deleted Successfully.";else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=po-postopportunity&mode=view&var_msg=$var_msg");
	exit;
}

?>
