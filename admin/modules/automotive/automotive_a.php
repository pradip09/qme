<?php

$action = $_REQUEST['action'];
$iProductId = $_POST['iProductId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$Data['iStoreCategoryId'] = 3;
$path = TPATH_SERVER_IMAGES_STORE;

$vahicleSafety = array();
$vahicleSafety  = $_POST['iVehicleSafetyId'];
$Data['iVehicleSafetyId'] = implode("|", $vahicleSafety);

$vehiclecomfort = array();
$vehiclecomfort  = $_POST['iVehicleComfortId'];
$Data['iVehicleComfortId'] = implode("|", $vehiclecomfort);

$vehicleaudio = array();
$vehicleaudio  = $_POST['iVehicleaudioId'];
$Data['iVehicleaudioId'] = implode("|", $vehicleaudio);

$vehiclemechanical = array();
$vehiclemechanical  = $_POST['iVehicleMechanicalId'];
$Data['iVehicleMechanicalId'] = implode("|", $vehiclemechanical);

$vehiclecondition = array();
$vehiclecondition  = $_POST['iVehicleConditionId'];
$Data['iVehicleConditionId'] = implode("|", $vehiclecondition);

if($action == "add")
{           
	$id = $obj->MySQLQueryPerform("product_automotive",$Data,'insert');
	if ($_FILES['vVehicleImage']['name'] != "") {
	                 
	if(!is_dir($path.'/3')){
		@mkdir($path.'/3', 0777);
	}
	if(!is_dir($path.'/3/'.$id)){
		@mkdir($path.'/3/'.$id, 0777);
	}
	$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path.'/3/'.$id,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
				array('WIDTH_HEIGHT' => "200X267", 'PREFIX' => "1"),
				array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2")
			);
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vVehicleImage']);
		if($image !=''){
		  $Data['vVehicleImage'] = $image; 
        }
	
	$where = " iProductId = '".$id."'";
	$res = $obj->MySQLQueryPerform("product_automotive",$Data,'update',$where);
  }
  if(count($_FILES['gallery']['name'])  > 0){
		for($i=0;$i<count($_FILES['gallery']['name']);$i++){			
				#$a=count($_FILES['gallery']['name']);
				#echo $a;
			if($_FILES['gallery']['name'][$i] !=''){
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path.'/3/'.$id,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                                        array('WIDTH_HEIGHT' => "200X267", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2")
					
				 );
				 $_FILES['gallery'][$i] = array(
								"name"=>$_FILES['gallery']['name'][$i],
								"type"=>$_FILES['gallery']['type'][$i],
								"tmp_name"=>$_FILES['gallery']['tmp_name'][$i],
								"error"=>$_FILES['gallery']['error'][$i],
								"size"=>$_FILES['gallery']['size'][$i]
								);
				
				$imagegal=$generalobj->import($PARAM_ARRAY, $_FILES['gallery'][$i]);
				
				if($imagegal !=''){
					$Data_gal['vGalImage'] = $imagegal;
				}
				$Data_gal['iProductId'] = $id;
				$gal = $obj->MySQLQueryPerform("automotive_gallery",$Data_gal,'insert');	
			}
		}
			
	}	  
	if($res)$var_msg = "Automotive is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=at-automotive&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
	                        
	if ($_FILES['vVehicleImage']['name'] != "")
	{
	 
	if(!is_dir($path.'/3')){
		@mkdir($path.'/3', 0777);
	}
	if(!is_dir($path.'/3/'.$iProductId)){
		@mkdir($path.'/3/'.$iProductId, 0777);
	}           
		$PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path.'/3/'.$iProductId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "200X267", 'PREFIX' => "1"),
			array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2")
		 );
		
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vVehicleImage']);
		
		if($image !=''){
		    $Data['vVehicleImage'] = $image;
		    unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/1_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/".$_POST['vOldImage']);
		}
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vVehicleImage'] = addslashes($_POST['vOldImage']);
		}
	}

 	$iProductId= $_POST['iProductId'];
	$where = " iProductId = '".$iProductId."'";
	$res = $obj->MySQLQueryPerform("product_automotive",$Data,'update',$where);
    
	$sql_gal = "SELECT * FROM automotive_gallery  WHERE iProductId='".$iProductId."'";	
	$db_automotive_gallery = $obj->MySQLSelect($sql_gal);
	
	for($i=0;$i<count($db_automotive_gallery);$i++){
		
		if(!in_array($db_automotive_gallery[$i]['vGalImage'],$_POST['vOldGall'])){
			//echo $db_product_gal[$i]['vGalImage'];
			unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/1_".$db_automotive_gallery[$i]['vGalImage']);				
			unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/".$db_automotive_gallery[$i]['vGalImage']);
		}
		
	}
	
	$sql_gal="Delete from automotive_gallery where ".$where; 
	$db_sql=$obj->sql_query($sql_gal);
	
	for($i=0;$i<$_POST['totcount'];$i++){
		
		if($_POST['vOldGall'][$i] !='' && $_FILES['gallery']['name'][$i] !=''){
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path.'/3/'.$iProductId,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "248X247", 'PREFIX' => "2")
				 );
				 $_FILES['gallery'][$i] = array(
								"name"=>$_FILES['gallery']['name'][$i],
								"type"=>$_FILES['gallery']['type'][$i],
								"tmp_name"=>$_FILES['gallery']['tmp_name'][$i],
								"error"=>$_FILES['gallery']['error'][$i],
								"size"=>$_FILES['gallery']['size'][$i]
								);
				$imagegal=$generalobj->import($PARAM_ARRAY, $_FILES['gallery'][$i]);
				unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/1_".$_POST['vOldGall'][$i]);				
				unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/".$_POST['vOldGall'][$i]);
				if($imagegal !=''){
					$Data_gal['vGalImage'] = $imagegal;
				}
				$Data_gal['iProductId'] = $iProductId;
				$gal = $obj->MySQLQueryPerform("automotive_gallery",$Data_gal,'insert');
		}elseif($_POST['vOldGall'][$i] =='' && $_FILES['gallery']['name'][$i] !=''){
			if(!is_dir($path.'/3/'.$iProductId)){
				@mkdir($path.'/3/'.$iProductId, 0777);
		        }
			
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path.'/3/'.$iProductId,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "248X247", 'PREFIX' => "2")
				 );
				 $_FILES['gallery'][$i] = array(
								"name"=>$_FILES['gallery']['name'][$i],
								"type"=>$_FILES['gallery']['type'][$i],
								"tmp_name"=>$_FILES['gallery']['tmp_name'][$i],
								"error"=>$_FILES['gallery']['error'][$i],
								"size"=>$_FILES['gallery']['size'][$i]
								);
				$imagegal=$generalobj->import($PARAM_ARRAY, $_FILES['gallery'][$i]);
				if($imagegal !=''){
					$Data_gal['vGalImage'] = $imagegal;
				}
				$Data_gal['iProductId'] = $iProductId;
				$gal = $obj->MySQLQueryPerform("automotive_gallery",$Data_gal,'insert');
		}elseif($_POST['vOldGall'][$i] !='' && $_FILES['gallery']['name'][$i] ==''){			
			$Data_gal['vGalImage'] = $_POST['vOldGall'][$i];
			$Data_gal['iProductId'] = $iProductId;
			$gal = $obj->MySQLQueryPerform("automotive_gallery",$Data_gal,'insert');
		}
	}


	if($res)$var_msg = "Automotive is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=at-automotive&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iProductId = $_REQUEST['iProductId'];
    $totid = count($iProductId);
       
    if(is_array($iProductId)){
        $iProductId  = @implode(",",$iProductId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iProductId IN (".$iProductId.")";
	$res = $obj->MySQLQueryPerform("product_automotive",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=at-automotive&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
	
    $iProductId = $_REQUEST['iProductId'];
    $totid = count($iProductId );
    if(is_array($iProductId )){
        $iProductId = @implode(",",$iProductId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iProductId IN (".$iProductId.")";
	$res = $obj->MySQLQueryPerform("product_automotive",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=at-automotive&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{	
	$iProductId = $_POST['iProductId'];
    
        $sql_img = "select vVehicleImage from   product_automotive where iProductId='".$iProductId."' ";
	$db_automotive = $obj->MySQLSelect($sql_img);
        $vVehicleImage=$db_automotive[0]['vVehicleImage'];
	
	$sql="Delete from  product_automotive where iProductId='".$iProductId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Record is Deleted Successfully.";
		unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/1_".$vVehicleImage);				
		unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/".$vVehicleImage);
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}
	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=at-automotive&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{	
	$iProductId="";
	foreach ($_POST['iProductId'] as $id) {	
		$iProductId = $iProductId . $id .',';
	}
	
	$iProductId = substr($iProductId, 0, strlen($iProductId)-1); 
	
	$where = " iProductId IN (".$iProductId.")";
	$sql="Delete from product_automotive where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=at-automotive&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "DeleteImage")
{	
	$iProductId = $_POST['iProductId'];
	$data_new = array("vVehicleImage"=>'');
	$where = " iProductId = '".$iProductId."'";
	$res = $obj->MySQLQueryPerform("product_automotive",$data_new,'update',$where);
	unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=at-automotive&mode=edit&iProductId=$iProductId&var_msg=$var_msg");
	exit;
}

?>
