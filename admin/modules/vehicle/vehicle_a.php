<?php


$action = $_REQUEST['action'];
$iVehicleTypeId = $_POST['iVehicleTypeId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];

if($action == "add")
{
	
	$id = $obj->MySQLQueryPerform("vehicle_type",$Data,'insert');
	if($id)$var_msg = " vehicle type is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ve-vehicle&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
	
	$iVehicleTypeId = $_POST['iVehicleTypeId'];
	$where = " iVehicleTypeId = '".$iVehicleTypeId."'";
	$res = $obj->MySQLQueryPerform("vehicle_type",$Data,'update',$where);

	if($res)$var_msg = " vehicle type is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ve-vehicle&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iVehicleTypeId = $_REQUEST['iVehicleTypeId'];
    $totid = count($iVehicleTypeId);
       
    if(is_array($iVehicleTypeId)){
        $iVehicleTypeId  = @implode(",",$iVehicleTypeId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iVehicleTypeId IN (".$iVehicleTypeId.")";
	$res = $obj->MySQLQueryPerform("vehicle_type",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ve-vehicle&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iVehicleTypeId = $_REQUEST['iVehicleTypeId'];
    $totid = count($iVehicleTypeId );
    if(is_array($iVehicleTypeId )){
        $iVehicleTypeId = @implode(",",$iVehicleTypeId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iVehicleTypeId IN (".$iVehicleTypeId.")";
	$res = $obj->MySQLQueryPerform("vehicle_type",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ve-vehicle&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{	
	$iVehicleTypeId = $_POST['iVehicleTypeId'];
	$sql="Delete from vehicle_type where iVehicleTypeId='".$iVehicleTypeId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = " vehicle type is Deleted Successfully.";
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ve-vehicle&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{	
	$iVehicleTypeId="";
	foreach ($_POST['iVehicleTypeId'] as $id) {	
		$iVehicleTypeId = $iVehicleTypeId . $id .',';
	}
	
	$iVehicleTypeId = substr($iVehicleTypeId, 0, strlen($iVehicleTypeId)-1); 
	
	$where = " iVehicleTypeId IN (".$iVehicleTypeId.")";
	$sql="Delete from vehicle_type where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ve-vehicle&mode=view&var_msg=$var_msg");
	exit;
}

?>
