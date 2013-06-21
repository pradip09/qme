<?php

$view 		= $_REQUEST['view'];
$iMailId 	= $_REQUEST['iMailId'];
$chkCount 	= $_REQUEST['chkCount'];

if($view == "Delete"){
	
	for($i=0;$i<$_POST['no'];$i++)
 	{
		if($_POST['ch'][$i])
		{
			$iId=$_POST['ch'][$i];
			//echo $iId;
			$id = $obj->MySQLDelete("qme_inbox"," iMailId = '".$iId."'");
		}
	}
	if($iMailId){
		$id = $obj->MySQLDelete("qme_inbox"," iMailId = '".$iMailId."'");	
	}
	
	if($id)
	{
	     $var_msg = $chkCount."Mail has been deleted.";
	}else {
		$var_msg="Error - in Delete.";
	}
	
}

if($view == '1'){
	
	for($i=0;$i<$_POST['no'];$i++)
 	{
		if($_POST['ch'][$i])
		{
			$iId=$_POST['ch'][$i];
			$read_update = "UPDATE qme_inbox set eRead='1' where iMailId = '".$iId."'";
			$id1 = $obj->sql_query($read_update);
		}
	}
	if($id1)$var_msg = $chkCount."Mail maked as Read successfully.";else $var_msg="Error - Read Message.";
}
if($view == '0'){
	
	for($i=0;$i<$_POST['no'];$i++)
 	{
		if($_POST['ch'][$i])
		{
			$iId=$_POST['ch'][$i];
			$read_update = "UPDATE qme_inbox set eRead='0' where iMailId = '".$iId."'";
			$id2 = $obj->sql_query($read_update);
		}
	}
	
	if($id2)$var_msg = $chkCount."Mail maked as UnRead successfully.";else $var_msg="Error - Unread Message.";
}


header("Location:index.php?file=m-myinbox&var_msg=$var_msg");
exit;
?>