<?php
$action = $_REQUEST['action'];
$imakeId = $_POST['imakeId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];

if($action == "add")
{
	$Data['vMake']= addslashes($Data['vMake']);
	
	$id = $obj->MySQLQueryPerform("make",$Data,'insert');
	if($id)$var_msg = "Make is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=mk-make&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
	$Data['vMake']= addslashes($Data['vMake']);
	
	$imakeId = $_POST['imakeId'];
	$where = " imakeId = '".$imakeId."'";
	$res = $obj->MySQLQueryPerform("make",$Data,'update',$where);

	if($res)$var_msg = "Make is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=mk-make&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $imakeId = $_REQUEST['imakeId'];
    $totid = count($imakeId);
       
    if(is_array($imakeId)){
        $imakeId  = @implode(",",$imakeId);
    }
    $data = array('eStatus'=>'Active');
    $where = " imakeId IN (".$imakeId.")";
	$res = $obj->MySQLQueryPerform("make",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=mk-make&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $imakeId = $_REQUEST['imakeId'];
    $totid = count($imakeId );
    if(is_array($imakeId )){
        $imakeId = @implode(",",$imakeId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " imakeId IN (".$imakeId.")";
	$res = $obj->MySQLQueryPerform("make",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=mk-make&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{	
	$imakeId = $_POST['imakeId'];
	
	$sql="Delete from make where imakeId='".$imakeId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Make is Deleted Successfully.";
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=mk-make&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{	
	$imakeId="";
	foreach ($_POST['imakeId'] as $id) {	
		$imakeId = $imakeId . $id .',';
	}
	
	$imakeId = substr($imakeId, 0, strlen($imakeId)-1); 
	
    $where = " imakeId IN (".$imakeId.")";
	$sql="Delete from make where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=mk-make&mode=view&var_msg=$var_msg");
	exit;
}

?>
