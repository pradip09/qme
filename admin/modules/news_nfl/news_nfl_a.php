<?php

$action = $_REQUEST['action'];
$iNewsId = $_POST['iNewsId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$img = $_REQUEST['vOldImage'];
$path = TPATH_SERVER_MUSIC_NEWS;

    
if($action == "add")
{
	
	$Data['vTitle']= addslashes($Data['vTitle']);
	$Data['vDescription']= addslashes($Data['vDescription']);
	
	$id = $obj->MySQLQueryPerform("news_nfl",$Data,'insert');
	if(!is_dir($path."/".$id)){
		@mkdir($path."/".$id, 0777);
	
	if ($_FILES['vImage']['name'] != "") {  
		$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path."/".$id,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "81X81", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "450X289", 'PREFIX' => "2"),
					array('WIDTH_HEIGHT' => "71X71", 'PREFIX' => "3")
				 );
				 
			$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
			
			if($image !=''){
			$Data['vImage'] = $image;
			}	
	}
	if ($_FILES['vVideo']['name'] != ""){	
		$video=move_uploaded_file($_FILES["vVideo"]["tmp_name"],$path."/".$id."/".$_FILES["vVideo"]["name"]);
		if($video){
		$Data['vVideo'] = $_FILES["vVideo"]["name"];
		}
	}
	$where = " iNewsId = '".$id."'";
	$res = $obj->MySQLQueryPerform("news_nfl",$Data,'update',$where);
	
	if($res)$var_msg = "News is Added Successfully.";else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ne-news_nfl&mode=view&var_msg=$var_msg");
	}
}

if($action == "edit")
{
	
	$Data['vTitle']= addslashes($Data['vTitle']);
	$Data['vDescription']= addslashes($Data['vDescription']);
	$iNewsId = $_POST['iNewsId'];
	
	if(!is_dir($path."/".$iNewsId)){
		@mkdir($path."/".$iNewsId, 0777);
	}
	
	if ($_FILES['vImage']['name'] != "") {  
		$PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path."/".$iNewsId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "81X81", 'PREFIX' => "1"),
			array('WIDTH_HEIGHT' => "450X289", 'PREFIX' => "2"),
			array('WIDTH_HEIGHT' => "71X71", 'PREFIX' => "3")
		 );
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
		
		if($image !=''){
		    $Data['vImage'] = addslashes($image);
		    unlink(TPATH_SERVER_MUSIC_NEWS.'/'.$iNewsId."/2_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_MUSIC_NEWS.'/'.$iNewsId."/1_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_MUSIC_NEWS.'/'.$iNewsId."/".$_POST['vOldImage']);
		}
		
	}else{
		if($_POST['vOldImage'] != ""){
			$Data['vImage'] = addslashes($_POST['vOldImage']);
		}
	}
	if ($_FILES['vVideo']['name'] != ""){	
		$video=move_uploaded_file($_FILES["vVideo"]["tmp_name"],$path."/".$iNewsId."/".$_FILES["vVideo"]["name"]);
		if($video){
		$Data['vVideo'] = $_FILES["vVideo"]["name"];
		 unlink(TPATH_SERVER_MUSIC_NEWS.'/'.$iNewsId."/".$_POST['vOldVideo']);
		}
	}
	
	if($iNewsId == $Data['iNewsId']){
	    $Data = array(
			    "vImage"=>$Data['vImage'],
			    "vTitle" =>$Data['vTitle'],
			    "dAddedDate" =>$Data['dAddedDate'],
			    "vDescription" =>$Data['vDescription'],
			    "eStatus" =>$Data['eStatus'],
			    "iOrderNo" =>$Data['iOrderNo']
			  );
	   
	}
	$where = " iNewsId = '".$iNewsId."'";
	$res = $obj->MySQLQueryPerform("news_nfl",$Data,'update',$where);
	if($res)$var_msg = "News is Updated Successfully.";else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ne-news_nfl&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Active")
{
    $iNewsId = $_REQUEST['iNewsId'];
    $totid = count($iNewsId);
       
    if(is_array($iNewsId)){
        $iNewsId  = @implode(",",$iNewsId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iNewsId IN (".$iNewsId.")";
	$res = $obj->MySQLQueryPerform("news_nfl",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ne-news_nfl&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iNewsId = $_REQUEST['iNewsId'];
    $totid = count($iNewsId );
    if(is_array($iNewsId )){
        $iNewsId = @implode(",",$iNewsId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iNewsId IN (".$iNewsId.")";
	$res = $obj->MySQLQueryPerform("news_nfl",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ne-news_nfl&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{	
	$iNewsId = $_POST['iNewsId'];
	$sql="select vImage from news_nfl where iNewsId = ".$iNewsId; 
	$db_data=$obj->sql_query($sql);
	$eImg = $db_data[0]['vImage'];

	$sql="Delete from news_nfl where iNewsId='".$iNewsId."'"; 
	$db_sql=$obj->sql_query($sql);
	if($db_sql)
	{
		$var_msg = "news_nfl is Deleted Successfully.";
		unlink(TPATH_SERVER_MUSIC_NEWS.'/'.$iNewsId."/".$eImg);
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ne-news_nfl&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{	
	$iNewsId="";
	$eImg = array();
	foreach ($_POST['iNewsId'] as $id) {	
		$iNewsId = $iNewsId . $id .',';
		$sql="select vImage from news_nfl where iNewsId = ".$id; 
			$db_data=$obj->sql_query($sql);
			$eImg[] = $db_data[0]['vImage'];
			
	}
	
	$iNewsId = substr($iNewsId, 0, strlen($iNewsId)-1); 
	
    	$where = " iNewsId IN (".$iNewsId.")";
	$sql="Delete from news_nfl where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$db_data = array();
		$var_msg= $totid." Record Deleted Successfully.";
		foreach ($eImg as $img) {				
			
			unlink(TPATH_SERVER_MUSIC_NEWS.'/'.$iNewsId."/".$img);
		}

	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ne-news_nfl&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "DeleteImage")
{	

	$iNewsId = $_POST['iNewsId'];
	$data_new = array("vImage"=>'');
	$where = " iNewsId = '".$iNewsId."'";
	$res = $obj->MySQLQueryPerform("news_nfl",$data_new,'update',$where);
	unlink(TPATH_SERVER_MUSIC_NEWS.'/'.$iNewsId."/2_".$_POST['vOldImage']);
	unlink(TPATH_SERVER_MUSIC_NEWS.'/'.$iNewsId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_MUSIC_NEWS.'/'.$iNewsId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ne-news_nfl&mode=edit&iNewsId=$iNewsId&var_msg=$var_msg");
	exit;
}
if($action == "DeleteVideo")
{	
	$mId = $Data['iNewsId'];
	$iNewsId = $_POST['iNewsId'];
	$data_new = array("vVideo"=>'');
	$where = " iNewsId = '".$iNewsId."'";
	$res = $obj->MySQLQueryPerform("news_nfl",$data_new,'update',$where);
	unlink(TPATH_SERVER_MUSIC_NEWS.'/'.$iNewsId."/".$_POST['vOldVideo']);
	if($res){
		$var_msg = "Video is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Video Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ne-news_nfl&mode=edit&iNewsId=$iNewsId&var_msg=$var_msg");
	exit;
}


?>
