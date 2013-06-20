<?php

$action = $_REQUEST['action'];
$iFAQCategoryId = $_POST['iFAQCategoryId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];

if($action == "add")
{
	$Data['vCategory']= addslashes($Data['vCategory']);
	$id = $obj->MySQLQueryPerform("faq_category_nfl",$Data,'insert');
	if($id)$var_msg = "FAQ Category is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fan-faqcat_nfl&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
	$Data['vCategory']= addslashes($Data['vCategory']);
	$iFAQCategoryId = $_POST['iFAQCategoryId'];
	$where = " iFAQCategoryId = '".$iFAQCategoryId."'";
	$res = $obj->MySQLQueryPerform("faq_category_nfl",$Data,'update',$where);

	if($res)$var_msg = "FAQ Category is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fan-faqcat_nfl&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iFAQCategoryId = $_POST['iFAQCategoryId'];
    $totid = count($iFAQCategoryId);
       
    if(is_array($iFAQCategoryId)){
        $iFAQCategoryId  = @implode(",",$iFAQCategoryId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iFAQCategoryId IN (".$iFAQCategoryId.")";
	$res = $obj->MySQLQueryPerform("faq_category_nfl",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fan-faqcat_nfl&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iFAQCategoryId = $_POST['iFAQCategoryId'];
    $totid = count($iFAQCategoryId);
    if(is_array($iFAQCategoryId )){
        $iFAQCategoryId = @implode(",",$iFAQCategoryId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iFAQCategoryId IN (".$iFAQCategoryId.")";
	$res = $obj->MySQLQueryPerform("faq_category_nfl",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fan-faqcat_nfl&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{	
	$iFAQCategoryId = $_POST['iFAQCategoryId'];
	$sql="Delete from faq_category_nfl where iFAQCategoryId='".$iFAQCategoryId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "FAQ Category is Deleted Successfully.";
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fan-faqcat_nfl&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{	
	$iFAQCategoryId="";
	foreach ($_POST['iFAQCategoryId'] as $id) {	
		$iFAQCategoryId = $iFAQCategoryId . $id .',';
	}
	
	$iFAQCategoryId = substr($iFAQCategoryId, 0, strlen($iFAQCategoryId)-1); 
	
	$where = " iFAQCategoryId IN (".$iFAQCategoryId.")";
	$sql="Delete from faq_category_nfl where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fan-faqcat_nfl&mode=view&var_msg=$var_msg");
	exit;
}

?>
