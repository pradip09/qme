<?php
 
$mode = $_REQUEST['mode'];
$dtype = $_POST['dtype'];
$iProductId=$_POST['iProductId'];
$Data['dAddedDate'] = date('Y-m-d H:i:s');
$addDate=$Data['dAddedDate'];
$path = TPATH_SERVER_IMAGES_STORE;

$vahicleSafety = array();
$vahicleSafety  = $_POST['iVehicleSafetyId'];

$vehiclecomfort = array();
$vehiclecomfort  = $_POST['iVehicleComfortId'];

$vehicleaudio = array();
$vehicleaudio  = $_POST['iVehicleaudioId'];

$vehiclemechanical = array();
$vehiclemechanical  = $_POST['iVehicleMechanicalId'];

$vehiclecondition = array();
$vehiclecondition  = $_POST['iVehicleConditionId'];


      $Data = array();
      $memberId = $_SESSION['iUserId'];
      $Data['iMemberId'] = $memberId ;
      $Data['iStoreCategoryId'] = 3;
      $Data['vType']=$_POST['vType'];
      $Data['iYear']=$_POST['iYear'];
      $Data['make']=$_POST['make'];
      $Data['model']=$_POST['model'];
      $Data['fPrice']=$_POST['fPrice'];
      $Data['fMsrp']=$_POST['fMsrp'];
      $Data['iMileage']=$_POST['iMileage'];
      $Data['vVin']=$_POST['vVin'];
      $Data['vTransmission']=$_POST['vTransmission'];     
      $Data['vBodyStyle']=$_POST['vBodyStyle'];
      $Data['vEngineType']=$_POST['vEngineType'];      
      $Data['vFuelType']=$_POST['vFuelType'];
      $Data['vDriveTrain']=$_POST['vDriveTrain'];     
      $Data['vDoors']=$_POST['vDoors'];
      $Data['vExteriorColor']=$_POST['vExteriorColor'];      
      $Data['vInteriorColor']=$_POST['vInteriorColor'];
      $Data['tDescription']=$_POST['tDescription'];
      $Data['vExternalLink']=$_POST['vExternalLink'];      
      $Data['vVehicleImage']=$_POST['vVehicleImage'];
      $Data['vCity']=$_POST['vCity'];     
      $Data['vContactName']=$_POST['vContactName'];
      $Data['vSellerNumber']=$_POST['vSellerNumber'];
      $Data['vSellerEmail']=$_POST['vSellerEmail'];
      $Data['vDealershipName']=$_POST['vDealershipName'];      
      $Data['vDealershipAddress']=$_POST['vDealershipAddress'];
      $Data['vDealerNumber']=$_POST['vDealerNumber'];
      $Data['vDealerEmail']=$_POST['vDealerEmail'];
      $Data['iVehicleSafetyId'] = implode("|", $vahicleSafety);
      $Data['iVehicleComfortId'] = implode("|", $vehiclecomfort);
      $Data['iVehicleaudioId'] = implode("|", $vehicleaudio);
      $Data['iVehicleMechanicalId'] = implode("|", $vehiclemechanical);
      $Data['iVehicleConditionId'] = implode("|", $vehiclecondition);
	
if($mode == "add")
{    
      $id = $obj->MySQLQueryPerform("product_automotive",$Data,'insert');
      $newId = $id;
      
      $sql = "SELECT * FROM product_count WHERE iMemberId = '".$memberId."'";
      $sql_data = $obj->MysqlSelect($sql);    
      if($sql_data[0]['iPro_tot_cnt'] == ''){
	  $Data2['iMemberId'] = $memberId;
	  $Data2['iPro_tot_cnt'] = 1;
	  $id2 = $obj->MySQLQueryPerform("product_count",$Data2,'insert');
      }else{
	  $Data2['iMemberId'] = $memberId;
	  $Data2['iPro_tot_cnt'] = $sql_data[0]['iPro_tot_cnt'] + 1;
	  $where2  = "iMemberId = ".$memberId;
	  $id2 = $obj->MySQLQueryPerform("product_count",$Data2,'update',$where2);
      }
      
      $sql = "SELECT * FROM product_count WHERE iMemberId = '".$memberId."'";
      $sql_data = $obj->MysqlSelect($sql);
      
      $sql_plan = "SELECT * FROM plan_transaction WHERE iMemberId = '".$memberId."' ORDER BY iPlanTransactionId DESC Limit 1";
      $db_plan = $obj->MySQLSelect($sql_plan);
      
      $sql_cnt = "SELECT * FROM store_plan WHERE iStorePlanId = '".$db_plan[0]['iPlanId']."'";
      $item_limit = $obj->MySQLSelect($sql_cnt);
      
      $sql_store = "select * from store_plan ";
      $db_storeplan = $obj->MySQLSelect($sql_store);
      
      $item_cnt = $db_storeplan[0]['item_limit'] + $item_limit[0]['item_limit'];
      
      if($item_cnt == $sql_data[0]['iPro_tot_cnt'] && $db_plan[0]['iPlanId'] != '4'){
	  $up_data['ePlanstatus'] ='Completed';
	  $where3 = "iPlanTransactionId='".$db_plan[0]['iPlanTransactionId']."'";
	  $id = $obj->MySQLQueryPerform("plan_transaction",$up_data,'update',$where3);
      }
      
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
                array('WIDTH_HEIGHT' => "430X280", 'PREFIX' => "1"),
		array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2"),
		array('WIDTH_HEIGHT' => "535X339", 'PREFIX' => "3")
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vVehicleImage']);
        if($image !=''){ 
            $Data['vVehicleImage'] = $image;
        }
        $where = " iProductId = '".$id."'";
       $pid = $obj->MySQLQueryPerform("product_automotive",$Data,'update',$where); 
      
       //Twitter Status Update Start
	$twUploadType = 'AUTOMOTIVE';
	$twAutomotiveId = $newId;
	include TPATH_ROOT.'/twitter/postOnTwitter.php'; 
	//Twitter Status Update End
	 
      //Facebook Status Update Start
      $fbAutomotiveType = 'AUTOMOTIVE';
      $fbAutomotiveId = $newId;
      include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php';
      //Facebook Status Update End
      
       if(count($_FILES['gallery']['name'])  > 0){
		for($i=0;$i<count($_FILES['gallery']['name']);$i++){			
				#$a=count($_FILES['gallery']['name']);
				#echo $a;	   	
        	if($_FILES['gallery']['name'][$i] !=''){
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path.'/3/'.$id,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "90X60", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "430X280", 'PREFIX' => "2")
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
			
	}exit;
       
      if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
	$Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'product_automotive';
	$Recent['iTypeId'] = $id;
	//$Recent['tProductDescription'] = $_SESSION['Name'].' added '.$Data['vProductName'].' new product.';
	$Recent['dAddedDate'] = $addDate;
	
	//$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
    
    }
    
    exit;
}


if($mode == 'edit')
{
	 
        

     if ($_FILES['vVehicleImage']['name'] != "") { 
        
        
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
                array('WIDTH_HEIGHT' => "430X280", 'PREFIX' => "1"),
		array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2"),
		array('WIDTH_HEIGHT' => "535X339", 'PREFIX' => "3")
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vVehicleImage']);        
        
        if($image !=''){
		    $Data['vVehicleImage'] = $image;
		     unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/3_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/2_".$_POST['vOldImage']);
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
        $where = " iProductId = '".$iProductId."'";
        $pid = $obj->MySQLQueryPerform("product_automotive",$Data,'update',$where);
	
      /*$sql = "SELECT * FROM product_count WHERE iMemberId = '".$memberId."'";
      $sql_data = $obj->MysqlSelect($sql);    
      if($sql_data[0]['iPro_tot_cnt'] == ''){
	  $Data2['iMemberId'] = $memberId;
	  $Data2['iPro_tot_cnt'] = 1;
	  $id2 = $obj->MySQLQueryPerform("product_count",$Data2,'insert');
      }else{
	  $Data2['iMemberId'] = $memberId;
	  $Data2['iPro_tot_cnt'] = $sql_data[0]['iPro_tot_cnt'] + 1;
	  $where2  = "iMemberId = ".$memberId;
	  $id2 = $obj->MySQLQueryPerform("product_count",$Data2,'update',$where2);
      }*/
        
        $sql_gal = "SELECT * FROM automotive_gallery  WHERE iProductId='".$iProductId."'";	
	    $db_product_gallery = $obj->MySQLSelect($sql_gal);
	for($i=0;$i<count($db_automotive_gallery);$i++){
		
		if(!in_array($db_automotive_gallery[$i]['vGalImage'],$_POST['vOldGall'])){
			//echo $db_product_gal[$i]['vGalImage'];
			unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/1_".$db_automotive_gallery[$i]['vGalImage']);				
			unlink(TPATH_SERVER_IMAGES_STORE.'/3/'.$iProductId."/".$db_automotive_gallery[$i]['vGalImage']);
		}
		
	}
	
	$sql_gal="Delete from automotive_gallery where ".$where; 
	$db_sql=$obj->sql_query($sql_gal);
	#echo "<pre>";
	#print_r($where);exit;
	
	for($i=0;$i<$_POST['totcount'];$i++){
		
		if($_POST['vOldGall'][$i] !='' && $_FILES['gallery']['name'][$i] !=''){
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path.'/3/'.$iProductId,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "90X60", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "430X280", 'PREFIX' => "2")
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
			
		}
		elseif($_POST['vOldGall'][$i] =='' && $_FILES['gallery']['name'][$i] !=''){
			if(!is_dir($path.'/3/'.$iProductId)){
				@mkdir($path.'/3/'.$iProductId, 0777);
		        }
			
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path.'/3/'.$iProductId,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "90X60", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "430X280", 'PREFIX' => "2")
				 );
				 $_FILES['gallery'][$i] = array(
								"name"=>$_FILES['gallery']['name'][$i],
								"type"=>$_FILES['gallery']['type'][$i],
								"tmp_name"=>$_FILES['gallery']['tmp_name'][$i],
								"error"=>$_FILES['gallery']['error'][$i],
								"size"=>$_FILES['gallery']['size'][$i]
								);

				$imagegal=$generalobj->import($PARAM_ARRAY, $_FILES['gallery'][$i]);
				#echo $imagegal;exit;
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
        
        
        
        
	if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
	$Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'product_general_item';
	$Recent['iTypeId'] = $id;
	$Recent['vDescription'] = $_SESSION['Name'].' Updated '.$Data['vProductName'].' product.';
	$Recent['dAddedDate'] =$addDate;
	
	//$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
       if($id){
        $var_msg = "Your product update successfully";
    }
    else{
        $var_msg = 'Error in update your My product';
    }
    
  exit;
        
        
    }
 
?>