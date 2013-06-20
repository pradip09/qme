<?php

$action = $_REQUEST['action'];
$iProductId = $_POST['iProductId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$Data['iStoreCategoryId'] = 4; 
$path = TPATH_SERVER_IMAGES_STORE;

if($_POST['eShowNamePhone'] == 'Yes'){
	$Data['eShowNamePhone'] = 'Yes';
}else{
	$Data['eShowNamePhone'] = 'No';
}

if($action == "add")
{
	 
	$Data['tDescription']= addslashes($Data['tDescription']);
	$id = $obj->MySQLQueryPerform("product_real_estate",$Data,'insert');
	
	if ($_FILES['vImage']['name'] != "") {
	                  
	if(!is_dir($path.'/4')){
		@mkdir($path.'/4', 0777);
	}
	if(!is_dir($path.'/4/'.$id)){
		@mkdir($path.'/4/'.$id, 0777);
	}           
	$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path.'/4/'.$id,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
				array('WIDTH_HEIGHT' => "200X267", 'PREFIX' => "1"),
				array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2")
			);
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
		if($image !=''){
		  $Data['vImage'] = $image; 
          }
	
	$where = " iProductId = '".$id."'";
	$res = $obj->MySQLQueryPerform("product_real_estate",$Data,'update',$where);
    }
    
  if(count($_FILES['gallery']['name'])  > 0){
		for($i=0;$i<count($_FILES['gallery']['name']);$i++){			
				#$a=count($_FILES['gallery']['name']);
				#echo $a;
			if($_FILES['gallery']['name'][$i] !=''){
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path.'/4/'.$id,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                    array('WIDTH_HEIGHT' => "200X267", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "840X350", 'PREFIX' => "2")
					
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
				$gal = $obj->MySQLQueryPerform("product_gallery",$Data_gal,'insert');	
			}
		}
			
	}	  
	if($res)$var_msg = "Real Estate is Added Successfully."; else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=re-realestate&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
	$Data['tDescription']= addslashes($Data['tDescription']);
	if ($_FILES['vImage']['name'] != "")
	{
	   
	if(!is_dir($path.'/4')){
		@mkdir($path.'/4', 0777);
	}
	if(!is_dir($path.'/4/'.$iProductId)){
		@mkdir($path.'/4/'.$iProductId, 0777);
	}              
		$PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path.'/4/'.$iProductId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "200X267", 'PREFIX' => "1"),
			array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2")
		 );
		
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
		
		if($image !=''){
		    $Data['vImage'] =addslashes($image);
		    unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/1_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/".$_POST['vOldImage']);
		}
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vImage'] = addslashes($_POST['vOldImage']);
		}
	}
	$iProductId= $_POST['iProductId'];
	$where = " iProductId = '".$iProductId."'";
	$res = $obj->MySQLQueryPerform("product_real_estate",$Data,'update',$where);
    
	$sql_gal = "SELECT * FROM product_gallery  WHERE iProductId='".$iProductId."'";	
	$db_product_gallery = $obj->MySQLSelect($sql_gal);
	
	for($i=0;$i<count($db_product_gallery);$i++){
		
		if(!in_array($db_product_gallery[$i]['vGalImage'],$_POST['vOldGall'])){
			//echo $db_product_gal[$i]['vGalImage'];
			unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/1_".$db_product_gallery[$i]['vGalImage']);				
			unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/".$db_product_gallery[$i]['vGalImage']);
		}
		
	}
	
	$sql_gal="Delete from product_gallery where ".$where; 
	$db_sql=$obj->sql_query($sql_gal);
	
	for($i=0;$i<$_POST['totcount'];$i++){
		if($_POST['vOldGall'][$i] !='' && $_FILES['gallery']['name'][$i] !=''){
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path.'/4/'.$iProductId,
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
				unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/1_".$_POST['vOldGall'][$i]);				
				unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/".$_POST['vOldGall'][$i]);
				if($imagegal !=''){
					$Data_gal['vGalImage'] = $imagegal;
				}
				$Data_gal['iProductId'] = $iProductId;
				$gal = $obj->MySQLQueryPerform("product_gallery",$Data_gal,'insert');
		}elseif($_POST['vOldGall'][$i] =='' && $_FILES['gallery']['name'][$i] !=''){
			if(!is_dir($path.'/4/'.$iProductId)){
				@mkdir($path.'/4/'.$iProductId, 0777);
		        }
			
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path.'/4/'.$iProductId,
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
				$gal = $obj->MySQLQueryPerform("product_gallery",$Data_gal,'insert');
		}elseif($_POST['vOldGall'][$i] !='' && $_FILES['gallery']['name'][$i] ==''){			
			$Data_gal['vGalImage'] = $_POST['vOldGall'][$i];
			$Data_gal['iProductId'] = $iProductId;
			$gal = $obj->MySQLQueryPerform("product_gallery",$Data_gal,'insert');
		}
	}

	if($res)$var_msg = "Real Estate is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=re-realestate&mode=view&var_msg=$var_msg");
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
	$res = $obj->MySQLQueryPerform("product_real_estate",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=re-realestate&mode=view&var_msg=$var_msg");
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
	$res = $obj->MySQLQueryPerform("product_real_estate",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=re-realestate&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{	
	$iProductId = $_POST['iProductId'];
	$sql_img = "select vImage from   product_real_estate where iProductId='".$iProductId."' ";
	$db_realestate = $obj->MySQLSelect($sql_img);
	$vImage=$db_realestate[0]['vImage'];
	
	$sql="Delete from  product_real_estate where iProductId='".$iProductId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Record is Deleted Successfully.";
		unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/1_".$vImage);				
		unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/".$vImage);
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=re-realestate&mode=view&var_msg=$var_msg");
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
	$sql="Delete from product_real_estate where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=re-realestate&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "DeleteImage")
{	
	$iProductId = $_POST['iProductId'];
	$data_new = array("vImage"=>'');
    
	$where = " iProductId = '".$iProductId."'";
	$res = $obj->MySQLQueryPerform("product_real_estate",$data_new,'update',$where);
	unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=re-realestate&mode=edit&iProductId=$iProductId&var_msg=$var_msg");
	exit;
}

?>
