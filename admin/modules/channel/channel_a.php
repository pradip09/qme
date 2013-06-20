<?php
#echo "<pre>";
#print_r($_REQUEST);exit;
$action = $_REQUEST['action'];
$iChannelId = $_POST['iChannelId'];
#echo $iChannelId;exit;
$Data = $_POST["Data"];
$path = TPATH_SERVER_IMAGES_CHANNEL;
if($_POST['eDeleteImage'] == "Yes")
		$Data['eDeleteImage'] = 'Yes';
	else
		$Data['eDeleteImage'] = 'No';
if($action == "add")
{
	
	$mId = $Data['iMemberId'];
	if(!is_dir($path."/".$mId)){
		@mkdir($path."/".$mId, 0777);
        }
	
	$bId = $obj->MySQLQueryPerform("channel",$Data,'insert');
	if ($_FILES['vImage']['name'] != "") {
	$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path."/".$mId,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
				array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1")
			
			);

		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
		if($image !=''){
		$Data['vImage'] = $image;
		}
		$where = " iChannelId = '".$bId."'";
		$res = $obj->MySQLQueryPerform("channel",$Data,'update',$where);
	}
  
	if($bId)$var_msg = "Channel is Added Successfully.";else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ch-channel&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "edit")
{
	
	$mId = $Data['iMemberId'];
	if(!is_dir($path."/".$mId)){
		@mkdir($path."/".$mId, 0777);
        }
	
	if ($_FILES['vImage']['name'] != "")
	{
		$PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path."/".$mId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1")
			
		 );
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
		if($image !=''){
		    $Data['vImage'] = addslashes($image);
		    unlink(TPATH_SERVER_IMAGES_CHANNEL."/".$mId."/1_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_CHANNEL."/".$mId."/".$_POST['vOldImage']);
		}
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vImage'] = addslashes($_POST['vOldImage']);
		}
	}

	$iChannelId = $_POST['iChannelId'];
	$where = " iChannelId = '".$iChannelId."'";
	$res = $obj->MySQLQueryPerform("channel",$Data,'update',$where);
	if($res)$var_msg = "Channel is Updated Successfully.";else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ch-channel&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Active")
{
    $iChannelId= $_REQUEST['iChannelId'];
    $totid = count($iChannelId);
    if(is_array($iChannelId)){
        $iChannelId  = @implode(",",$iChannelId);
    }
    $data = array('eStatus'=>'Active');
    $where = " $iChannelId IN (".$iChannelId.")";
	$res = $obj->MySQLQueryPerform("channel",$data,'update',$where);
	if($res)$var_msg = $totid."Record Activeted Successfully.";else $var_msg="Eror-in Active.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ch-channel&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iChannelId = $_REQUEST['iChannelId'];
    $totid = count($iChannelId);
    if(is_array($iChannelId)){
        $iChannelId  = @implode(",",$iChannelId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iChannelId IN (".$iChannelId.")";
	$res = $obj->MySQLQueryPerform("channel",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Inactive.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ch-channel&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{
	$iChannelId = $_POST['iChannelId'];
	$sql="Delete from channel where iChannelId='".$iChannelId."'"; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = "Channel is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ch-channel&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Deletes")
{
    $iChannelId = $_REQUEST['iChannelId'];
    $totid = count($iChannelId);
    if(is_array($iChannelId)){
        $iChannelId  = @implode(",",$iChannelId);
    }
    $where = " iChannelId IN (".$iChannelId.")";
	$sql="Delete from channel where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = $totid." Record Deleted Successfully.";else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ch-channel&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "DeleteImage")
{
	$mId = $Data['iMemberId'];
	$iChannelId = $_REQUEST['iChannelId'];
	$data_new = array("vImage"=>'');
	$where = " iChannelId = '".$iChannelId."'";
	$res = $obj->MySQLQueryPerform("channel",$data_new,'update',$where);
	
	unlink(TPATH_SERVER_IMAGES_CHANNEL."/".$mId."/1_".$_POST['vOldImage']);
	unlink(TPATH_SERVER_IMAGES_CHANNEL."/".$mId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ch-channel&mode=edit&iChannelId=$iChannelId&var_msg=$var_msg");
	exit;
}

?>
