<?php

$action = $_REQUEST['action'];
$iBlogCategoryId = $_POST['iBlogCategoryId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];

$memberId = $_REQUEST['iMemberId'][0];
    
if($action == "add")
{
	$Data['iMemberId'] = $_POST['iMemberId'];
	$memberId = $_POST['iMemberId'];
	$id = $obj->MySQLQueryPerform("blogcategory",$Data,'insert');
	if($id)$var_msg = "Blog Category is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-blog");
	exit;
}

if($action == "edit")
{
	$memberId = $Data['iMemberId'];
	$iBlogCategoryId = $_POST['iBlogCategoryId'];
	$where = " iBlogCategoryId = '".$iBlogCategoryId."'";
	$res = $obj->MySQLQueryPerform("blogcategory",$Data,'update',$where);

	if($res)$var_msg = "Blog Category is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-blog");
	exit;
}

if($action=="Active")
{
    $iBlogCategoryId = $_REQUEST['iBlogCategoryId'];
    $totid = count($iBlogCategoryId);
       
    if(is_array($iBlogCategoryId)){
        $iBlogCategoryId  = @implode(",",$iBlogCategoryId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iBlogCategoryId IN (".$iBlogCategoryId.")";
	$res = $obj->MySQLQueryPerform("blogcategory",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-blog");
	exit;
}

if($action=="Inactive")
{
    $iBlogCategoryId = $_REQUEST['iBlogCategoryId'];
    $totid = count($iBlogCategoryId );
    if(is_array($iBlogCategoryId )){
        $iBlogCategoryId = @implode(",",$iBlogCategoryId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iBlogCategoryId IN (".$iBlogCategoryId.")";
	$res = $obj->MySQLQueryPerform("blogcategory",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-blog");
	exit;
}
if($action == "Delete")
{	
	$iBlogCategoryId = $_POST['iBlogCategoryId'];
	
	$sql="Delete from blogcategory where iBlogCategoryId='".$iBlogCategoryId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Blog Category is Deleted Successfully.";
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-blog");
	exit;
}
if($action=="Deletes")
{	
	$iBlogCategoryId="";
	foreach ($_POST['iBlogCategoryId'] as $id) {	
		$iBlogCategoryId = $iBlogCategoryId . $id .',';
	}
	
	$iBlogCategoryId = substr($iBlogCategoryId, 0, strlen($iBlogCategoryId)-1); 
	
    $where = " iBlogCategoryId IN (".$iBlogCategoryId.")";
	$sql="Delete from blogcategory where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-blog");
	exit;
}

?>
