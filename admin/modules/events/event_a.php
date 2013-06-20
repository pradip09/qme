<?php

$str = $_SERVER['HTTP_REFERER'];
$mem= (explode("=",$str));
$mid=$mem[3];

$action = $_REQUEST['action'];
$iEventId = $_POST['iEventId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$path = TPATH_SERVER_IMAGES_EVENT;
$memberId = $_REQUEST['iMemberId'];
$Data['dAddedDate'] = date('Y-m-d H:i:s');
$actionEvent = $_REQUEST['actionEvent'];
if($actionEvent){
	$action = $_REQUEST['actionEvent'];
	 }

list($m, $d, $y) = explode('-', $_POST['Data']['dEventDate']);
$Data['dEventDate'] = date('Y-m-d', mktime(0,0,0,$m,$d,$y));


if($_POST['eCreateAsTicket'] == '1'){
	$Data['eCreateAsTicket'] = '1';
}else{
	$Data['eCreateAsTicket'] = '0';
}

if($_POST['eHideVaultEntry'] == '1'){
	$Data['eHideVaultEntry'] = '1';
}else{
	$Data['eHideVaultEntry'] = '0';
}

$Data['iInterestId']=implode(",",$_REQUEST['iInterestId']);
$Data['iSkillId']=implode(",",$_REQUEST['iSkillId']);
    
if($action == "add")
{
	$Data['iMemberId'] = $_POST['iMemberId'];
	$memberId = $_POST['iMemberId'];
	
	
    $id = $obj->MySQLQueryPerform("events",$Data,'insert');
    if ($_FILES['vEventImage']['name'] != "") {		
	if(!is_dir($path."/".$memberId)){
		@mkdir($path."/".$memberId, 0777);
        }
	$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path."/".$memberId,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1")

				 );
				 
			$image=$generalobj->import($PARAM_ARRAY, $_FILES['vEventImage']);
			if($image !=''){
			$Data['vEventImage'] = $image;
		}
		$where = " iEventId = '".$id."'";
		$res = $obj->MySQLQueryPerform("events",$Data,'update',$where);
	}
  
	
    if($id)$var_msg = "Event is Created Successfully."; else $var_msg="Eror-in Creation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-event");
	exit;
}

if($action == "edit")
{
	
    $memberId = $Data['iMemberId'];
    if(!is_dir($path."/".$memberId)){
		@mkdir($path."/".$memberId, 0777);
        }
        
	if ($_FILES['vEventImage']['name'] != "") {		
	
		$PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path."/".$memberId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1")
			
		 );
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vEventImage']);
		
		if($image !='')
		{
			$Data['vEventImage'] = $image;
			unlink($path."/".$memberId."/".$_POST['vOldImage']);
			unlink($path."/".$memberId."/1_".$_POST['vOldImage']);
			unlink($path."/".$memberId."/2_".$_POST['vOldImage']);
			}		
	    }else{
		if($_POST['vOldImage'] != ""){
			$Data['vEventImage'] = $_POST['vOldImage'];
		}
	}

	
	$iEventId= $_POST['iEventId'];
	$where = " iEventId = '".$iEventId."'";
	$res = $obj->MySQLQueryPerform("events",$Data,'update',$where);

	if($res)$var_msg = "Event is Modified Successfully."; else $var_msg="Eror-in Modification.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-event");
	exit;
}



if($action=="Active")
{
	
    $iEventId = $_REQUEST['iEventId'];
    $totid = count($iEventId);
    if(is_array($iEventId)){
        $iEventId  = @implode(",",$iEventId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iEventId IN (".$iEventId.")";
	$res = $obj->MySQLQueryPerform("events",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-event");
	exit;
}

if($action=="Inactive")
{
	$Data['iMemberId'] = $memberId;
    $iEventId = $_REQUEST['iEventId'];
    $totid = count($iEventId);
    if(is_array($iEventId)){
        $iEventId  = @implode(",",$iEventId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iEventId IN (".$iEventId.")";
	$res = $obj->MySQLQueryPerform("events",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-event");
	exit;
}
if($action == "Delete")
{
	
	$Data['iMemberId'] = $memberId;
	$iEventId = $_POST['iEventId'];
	
	$sql_evt = "select vEventImage,iMemberId from song where iEventId = '$iEventId'";
	$db_evt = $obj->MySQLSelect($sql_evt);
	#echo "<pre>";
    #print_r($db_evt);exit;
   
	$img = $db_evt[0]['vEventImage'];
	$mId = $db_evt[0]['iMemberId'];
	
	$sql="Delete from events where iEventId='".$iEventId."'"; 
	$db_sql=$obj->sql_query($sql);
	
	if($db_sql)
	{
		$var_msg = "Record is Deleted Successfully.";
		unlink(TPATH_SERVER_IMAGES_EVENT."/".$mId."/1_".$img);				
		unlink(TPATH_SERVER_IMAGES_EVENT."/".$mId."/".$img);
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-event");
	exit;
}
if($action=="Deletes")
{
	$iEventId="";
	foreach ($_POST['iEventId'] as $id) {
		$iEventId = $iEventId . $id .',';
	}
	
	$iEventId = substr($iEventId, 0, strlen($iEventId)-1); 
	
    $where = " iEventId IN (".$iEventId.")";
	$sql="Delete from events where ".$where; 
	$db_sql=$obj->sql_query($sql);
	
		
	if($db_sql)
	{
	$var_msg = $totid." Event Deleted Successfully."; 
    }
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-event");
	exit;
}
if($action == "DeleteEventImage")
{	
    $mId = $Data['iMemberId'];
	$iEventId = $_POST['iEventId'];
	$data_new = array("vEventImage"=>'');
	$where = " iEventId = '".$iEventId."'";
	$res = $obj->MySQLQueryPerform("events",$data_new,'update',$where);
	
	unlink(TPATH_SERVER_IMAGES_EVENT."/".$mId."/1_".$_POST['vOldImage']);
	unlink(TPATH_SERVER_IMAGES_EVENT."/".$mId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iEventId=$iEventId&iMemberId=$memberId&var_msg=$var_msg#tab-event");
	exit;
}
if($action=="Show all")
{
		
	//$mId =$_REQUEST['iMemberId'];
	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$mid#tab-event");
	exit;
}
?>
