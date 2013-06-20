<?php
//echo "<pre>";
//print_r($_REQUEST);exit;
$str = $_SERVER['HTTP_REFERER'];
$mem= (explode("=",$str));
$mid=$mem[3];

$action = $_REQUEST['action'];
$iBlogId = $_POST['iBlogId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$path = TPATH_SERVER_IMAGES_BLOG;
$memberId = $_REQUEST['iMemberId'];
$Data['dAddedDate'] = date('Y-m-d H:i:s');
$Data['iMemberId']=$memberId ;
$eHideEntry = $_REQUEST['eHideEntry'];

$actiondel = $_REQUEST['actiondel'];
if($actiondel){$action = $_REQUEST['actiondel']; }

list($m, $d, $y) = explode('-', $Data['dCreateDate']);
$Data['dCreateDate'] = date('Y-m-d', mktime(0,0,0,$m,$d,$y));

$Data['iSkillId'] = implode(",",$_REQUEST['iSkillId']);
$Data['iInterestId'] = implode(",",$_REQUEST['iInterestId']);	

if($action == "add")
{
	
	if($_POST['eHideEntry'] == 1)
		$Data['eHideEntry'] = 'Yes';
	else
		$Data['eHideEntry'] = 'No';
	#echo "<pre>"; print_r($Data); print_r($_POST); exit;
	
	
	if(!is_dir($path."/".$memberId)){
		@mkdir($path."/".$memberId, 0777);
        }		
	
	if ($_FILES['vImage']['name'] != "") {
	$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path."/".$memberId,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
				array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1")
			
			);

		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
		if($image !=''){
		$Data['vImage'] = $image;
		}
		$bId = $obj->MySQLQueryPerform("blog",$Data,'insert');		
	}
  
	if($bId)$var_msg = " Blog is Added Successfully."; else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-blog");
	exit;
}

if($action == "edit")
{
	
	
	

	if($_POST['eHideEntry'] == 1)
		$Data['eHideEntry'] = 'Yes';
	else
		$Data['eHideEntry'] = 'No';
	
	
	$Data['iMemberId'] = $memberId;
	if(!is_dir($path."/".$memberId)){
		@mkdir($path."/".$memberId, 0777);
        }		
	if ($_FILES['vImage']['name'] != "")
	{
		$PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path."/".$memberId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1")
			
		 );
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
		if($image !=''){
		    $Data['vImage'] = $image;
			unlink($path."/".$memberId."/".$_POST['vOldImage']);
			unlink($path."/".$memberId."/1_".$_POST['vOldImage']);
			unlink($path."/".$memberId."/2_".$_POST['vOldImage']);
		}
		
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vImage'] = $_POST['vOldImage'];
		}
	}

	$iBlogId = $_POST['iBlogId'];
	$where = " iBlogId = '".$iBlogId."'";
	$res = $obj->MySQLQueryPerform("blog",$Data,'update',$where);

	if($res)$var_msg = "Blog is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-blog");
	exit;
}

if($action=="Active")
{
    $iBlogId = $_REQUEST['iBlogId'];
    $totid = count($iBlogId);
       
    if(is_array($iBlogId)){
        $iBlogId  = @implode(",",$iBlogId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iBlogId IN (".$iBlogId.")";
	$res = $obj->MySQLQueryPerform("blog",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-blog");
	exit;
}
//echo $memberId;exit;


if($action=="Inactive")
{
	//echo $memberId;exit;
	
    $iBlogId = $_REQUEST['iBlogId'];
    $totid = count($iBlogId );
    if(is_array($iBlogId )){
        $iBlogId = @implode(",",$iBlogId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iBlogId IN (".$iBlogId.")";
	$res = $obj->MySQLQueryPerform("blog",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-blog");
	exit;
}
if($action == "Delete")
{	
	$iBlogId = $_POST['iBlogId'];
	
	
	$sql_sel = "select vImage,iMemberId from blog where iBlogId = '$iBlogId'";
	$db_sel = $obj->MySQLSelect($sql_sel);
	
	$img = $db_sel[0]['vImage'];
	$mId = $db_sel[0]['iMemberId'];
	
	$sql="Delete from blog where iBlogId='".$iBlogId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Blog is Deleted Successfully.";
		unlink(TPATH_SERVER_IMAGES_BLOG."/".$mId."/1_".$img);				
		unlink(TPATH_SERVER_IMAGES_BLOG."/".$mId."/".$img);
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
	$iBlogId="";
	foreach ($_POST['iBlogId'] as $id) {	
		$iBlogId = $iBlogId . $id .',';
	}
	
	$iBlogId = substr($iBlogId, 0, strlen($iBlogId)-1); 
	
    $where = " iBlogId IN (".$iBlogId.")";
	$sql="Delete from blog where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-blog");
	exit;
}
if($action == "DeleteBlogImage")
{	
    $mId = $Data['iMemberId'];
	$iBlogId = $_POST['iBlogId'];
	$data_new = array("vImage"=>'');
	$where = " iBlogId = '".$iBlogId."'";
	$res = $obj->MySQLQueryPerform("blog",$data_new,'update',$where);
		
	unlink(TPATH_SERVER_IMAGES_BLOG."/".$mId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_IMAGES_BLOG."/".$mId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iBlogId=$iBlogId&iMemberId=$memberId&var_msg=$var_msg#tab-blog");
	exit;
}
if($action=="Show all")
{
		
	//$mId =$_REQUEST['iMemberId'];
	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$mid#tab-blog");
	exit;
}
?>
