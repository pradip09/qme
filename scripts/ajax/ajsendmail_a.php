<?php
//echo "<pre>";
//print_r($_REQUEST);exit;
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
	if($id)$var_msg = $chkCount."Mail has been deleted.";else $var_msg="Error - in Delete.";
}
if($view == "Delete"){
	for($i=0;$i<$_POST['no'];$i++)
 	{
		if($_POST['ch'][$i])
		{
			$iId=$_POST['ch'][$i];
			//echo $iId;
			$id = $obj->MySQLDelete("qme_sentmails"," iMailId = '".$iId."'");
		}
	}
	if($id)$var_msg = $chkCount."Mail has been deleted.";else $var_msg="Error - in Delete.";
}
if($view == "Delete"){
	
			
			$id = $obj->MySQLDelete("qme_sentmails"," iMailId = '".$iMailId."'");
		
	
	if($id)$var_msg = $chkCount."Send mail has been deleted.";else $var_msg="Error - in Delete.";
}
header("Location:index.php?file=m-sentmail&var_msg=$var_msg");
exit;

?>