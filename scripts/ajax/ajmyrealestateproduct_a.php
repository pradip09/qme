<?php


$mode = $_REQUEST['mode'];
$dtype = $_POST['dtype'];
$iProductId=$_POST['iProductId'];
$Data['dAddedDate'] = date('Y-m-d H:i:s');
$addDate=$Data['dAddedDate'];
$path = TPATH_SERVER_IMAGES_STORE;


      $Data = array();
      $memberId = $_SESSION['iUserId'];
      $Data['iMemberId'] = $memberId ;
      $Data['iPropertyTypeId']=$_POST['iPropertyTypeId'];      
      $Data['iStoreCategoryId']=4;
      $Data['fAskingPrice']=$_POST['fAskingPrice'];
      $Data['iBedrooms']=$_POST['iBedrooms'];
      $Data['iBaths']=$_POST['iBaths'];
      $Data['fSqft']=$_POST['fSqft'];
      $Data['fLotSize']=$_POST['fLotSize'];
      $Data['tDescription']=$_POST['tDescription'];
      $Data['vStreetAddress']=$_POST['vStreetAddress'];     
      $Data['iCountryId']=$_POST['iCountryId'];
      $Data['iStateId']=$_POST['iStateId'];
      $Data['vCity']=$_POST['vCity'];
      $Data['iZipCode']=$_POST['iZipCode'];
      $Data['vImage']=$_POST['vImage'];
      $Data['vFirstName']=$_POST['vFirstName'];
      $Data['vLastName']=$_POST['vLastName'];
      $Data['vPhone']=$_POST['vPhone'];
      $Data['vRealEstateFirm']=$_POST['vRealEstateFirm'];
      $Data['vAgentName']=$_POST['vAgentName'];
      $Data['vAgentEmail']=$_POST['vAgentEmail'];
      $Data['vAgentMainContact']=$_POST['vAgentMainContact'];
      $Data['vRealEstateOfficeContact']=$_POST['vRealEstateOfficeContact'];

if($mode == "add")
{    
    
    $Data['tDescription']= addslashes($Data['tDescription']);
    
    $id = $obj->MySQLQueryPerform("product_real_estate",$Data,'insert');
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
                array('WIDTH_HEIGHT' => "430X280", 'PREFIX' => "1"),
		array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2"),
		array('WIDTH_HEIGHT' => "535X339", 'PREFIX' => "3")
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
	
        if($image !=''){ 
            $Data['vImage'] = $image;
             }
	 
        $where = " iProductId = '".$id."'";
       $pid = $obj->MySQLQueryPerform("product_real_estate",$Data,'update',$where); 
	
	 //Twitter Status Update Start
	$twUploadType = 'REALESTATE';
	$twRealestateId = $newId;
	include TPATH_ROOT.'/twitter/postOnTwitter.php'; 
	//Twitter Status Update End
	
	//Facebook Status Update Start
	$fbRealestateType = 'REALESTATE';
	$fbRealestateId = $newId;
	include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php';
	//Facebook Status Update End
    
      if(count($_FILES['gallery']['name'])  > 0){
		for($i=0;$i<count($_FILES['gallery']['name']);$i++){			
				#$a=count($_FILES['gallery']['name']);
				#echo $a;	   	
        	if($_FILES['gallery']['name'][$i] !=''){
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path.'/4/'.$id,
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
				$gal = $obj->MySQLQueryPerform("product_gallery",$Data_gal,'insert');
			}
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
	$Recent['eType'] = 'product_automotive';
	$Recent['iTypeId'] = $id;
	//$Recent['tProductDescription'] = $_SESSION['Name'].' added '.$Data['vProductName'].' new product.';
	$Recent['dAddedDate'] = $addDate;
	
	//$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
    }
    
   
}


if($mode == 'edit')
{
    $Data['tDescription']= addslashes($Data['tDescription']);
	         
    if ($_FILES['vImage']['name'] != "") { 
                
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
                array('WIDTH_HEIGHT' => "430X280", 'PREFIX' => "1"),
		array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2"),
		array('WIDTH_HEIGHT' => "535X339", 'PREFIX' => "3")
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);        
        
        if($image !=''){
		    $Data['vImage'] = $image;
		    unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/3_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/2_".$_POST['vOldImage']);
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
        $where = " iProductId = '".$iProductId."'";
        $pid = $obj->MySQLQueryPerform("product_real_estate",$Data,'update',$where);
	
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

        $sql_gal = "SELECT * FROM product_gallery  WHERE iProductId='".$iProductId."'";	
	    $db_product_gallery = $obj->MySQLSelect($sql_gal);

	for($i=0;$i<count($db_product_gallery);$i++){
		if(!in_array($db_product_gallery[$i]['vGalImage'],$_POST['vOldGall'])){
			unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/2_".$db_product_gallery[$i]['vGalImage']);
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
				unlink(TPATH_SERVER_IMAGES_STORE.'/4/'.$iProductId."/2_".$_POST['vOldGall'][$i]);
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
				$Data_gal['iProductId'] = $iProductId;
				$gal = $obj->MySQLQueryPerform("product_gallery",$Data_gal,'insert');
		        }elseif($_POST['vOldGall'][$i] !='' && $_FILES['gallery']['name'][$i] ==''){			
			     $Data_gal['vGalImage'] = $_POST['vOldGall'][$i];
			      $Data_gal['iProductId'] = $iProductId;
		        	$gal = $obj->MySQLQueryPerform("product_gallery",$Data_gal,'insert');
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
       if($pid){
        $var_msg = "Your product update successfully";
    }
    else{
        $var_msg = 'Error in update your My product';
    }
    
    echo $var_msg; exit;
        
        
    }
 
?>