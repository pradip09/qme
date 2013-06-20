<?php

$action = $_REQUEST['action'];
$iVideoAlbumId = $_POST['iVideoAlbumId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
    
if($action == "add")
{
	
	$id = $obj->MySQLQueryPerform("video_album",$Data,'insert');
	if($id)$var_msg = "Video Album is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=va-videoalbum&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
	
	$iVideoAlbumId= $_POST['iVideoAlbumId'];
	$where = " iVideoAlbumId = '".$iVideoAlbumId."'";
	$res = $obj->MySQLQueryPerform("video_album",$Data,'update',$where);

	if($res)$var_msg = "Video Album is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=va-videoalbum&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iVideoAlbumId= $_REQUEST['iVideoAlbumId'];
    $totid = count($iVideoAlbumId);
       
    if(is_array($iVideoAlbumId)){
        $iVideoAlbumId  = @implode(",",$iVideoAlbumId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iVideoAlbumId IN (".$iVideoAlbumId.")";
	$res = $obj->MySQLQueryPerform("video_album",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=va-videoalbum&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iVideoAlbumId = $_REQUEST['iVideoAlbumId'];
    $totid = count($iVideoAlbumId );
    if(is_array($iVideoAlbumId )){
        $iVideoAlbumId = @implode(",",$iVideoAlbumId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iVideoAlbumId IN (".$iVideoAlbumId.")";
	$res = $obj->MySQLQueryPerform("video_album",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=va-videoalbum&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{	
	$iVideoAlbumId = $_POST['iVideoAlbumId'];
	
	$sql="Delete from video_album where iVideoAlbumId='".$iVideoAlbumId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Video Album is Deleted Successfully.";
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=va-videoalbum&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{	
	$iVideoAlbumId="";
	foreach ($_POST['iVideoAlbumId'] as $id) {	
		$iVideoAlbumId = $iVideoAlbumId.$id.',';
	}
	
	$iVideoAlbumId = substr($iVideoAlbumId, 0, strlen($iVideoAlbumId)-1); 
	
    $where = " iVideoAlbumId IN (".$iVideoAlbumId.")";
	$sql="Delete from video_album where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=va-videoalbum&mode=view&var_msg=$var_msg");
	exit;
}

?>
