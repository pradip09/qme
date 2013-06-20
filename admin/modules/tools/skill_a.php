<?php

$action = $_REQUEST['action'];
$iSkillId = $_POST['iSkillId'];
$Data = $_POST["Data"];

if($action == "add")
{
	
	$id = $obj->MySQLQueryPerform("skill",$Data,'insert');
	if($id)$var_msg = "Skill is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-skill&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{

	$iSkillId = $_POST['iSkillId'];
	$where = " iSkillId = '".$iSkillId."'";
	$res = $obj->MySQLQueryPerform("skill",$Data,'update',$where);

	if($res)$var_msg = " Skill is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-skill&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iSkillId = $_REQUEST['iSkillId'];
    $totid = count($iSkillId);
       
    if(is_array($iSkillId)){
        $iSkillId  = @implode(",",$iSkillId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iSkillId IN (".$iSkillId.")";
	$res = $obj->MySQLQueryPerform("skill",$data,'update',$where);
	if($res)$var_msg = $totid." Skill Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-skill&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iSkillId = $_REQUEST['iSkillId'];
    $totid = count($iSkillId);
    if(is_array($iSkillId)){
        $iSkillId  = @implode(",",$iSkillId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iSkillId IN (".$iSkillId.")";
	$res = $obj->MySQLQueryPerform("skill",$data,'update',$where);
	if($res)$var_msg = $totid." Skill Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-skill&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{
	$iSkillId = $_POST['iSkillId'];
	$sql="Delete from skill where iSkillId='".$iSkillId."'"; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = " Skill is Deleted Successfully."; else $var_msg="Eror-in Delete.";
	header("Location: ".$admin_url."/index.php?file=to-skill&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{
	$iSkillId="";
	foreach ($_POST['iSkillId'] as $id) {
		$iSkillId = $iSkillId . $id .',';
	}
	
	$iSkillId = substr($iSkillId, 0, strlen($iSkillId)-1); 
	
	$where = " iSkillId IN (".$iSkillId.")";
	$sql="Delete from skill where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = $totid." Skill Deleted Successfully."; else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-skill&mode=view&var_msg=$var_msg");
	exit;
}

?>
