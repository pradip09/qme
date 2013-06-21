<?php

$mode = $_POST['mode'];

$iProductId=$_POST['iProductId'];
$Data['dAddedDate'] = date('Y-m-d H:i:s');
$addDate=$Data['dAddedDate'];
$path = TPATH_SERVER_IMAGES_STORE;

$Data = array();
$memberId = $_SESSION['iUserId'];
$Data['iMemberId'] = $memberId ;
$Data['iStoreCategoryId']=1 ;
$Data['vProductName']=$_POST['vProductName'];
$Data['vSellerName']=$_POST['vSellerName'];
$Data['tDescription']=$_POST['tDescription'];
$Data['vProductImage']=$_POST['vProductImage'];
$Data['fPrice']=$_POST['fPrice'];
$Data['iShippingCost']=$_POST['iShippingCost'];


if($mode == "add")
{    
    $id = $obj->MySQLQueryPerform("product_general_item",$Data,'insert');
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
	$id1 = $obj->MySQLQueryPerform("plan_transaction",$up_data,'update',$where3);
    }
    
      $iProductId = $id;
        if(!is_dir($path."/1")){
            @mkdir($path."/1", 0777);
        } 
     if(!is_dir($path."/1/".$iProductId)){
            @mkdir($path."/1/".$iProductId, 0777);
        } 

     if ($_FILES['vProductImage']['name'] != "") {  
	$PARAM_ARRAY = array
        (
         "TARGET_DIR" =>$path."/1/".$iProductId,
                array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                array('WIDTH_HEIGHT' => "200X267", 'PREFIX' => "1"),
		array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2"),
		array('WIDTH_HEIGHT' => "535X339", 'PREFIX' => "3")
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vProductImage']);
        if($image !=''){ $Data['vProductImage'] = $image; }
     
     $where  = "iProductId = ".$iProductId;
     $id = $obj->MySQLQueryPerform("product_general_item",$Data,'update',$where);
     
	//Twitter Status Update Start
	$twUploadType = 'GENERAL_ITEMS';
	$twGeneralItemId = $newId;
	include TPATH_ROOT.'/twitter/postOnTwitter.php'; 
	//Twitter Status Update End
	
	//Facebook Status Update Start
	 $fbGeneralItemType = 'GENERAL_ITEMS';
	 $fbGeneralItemId = $newId;
	 include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php'; 
	 //Facebook Status Update End
	  
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
	$Recent['vDescription'] = $_SESSION['Name'].' added '.$Data['vProductName'].' new product.';
	$Recent['dAddedDate'] = $addDate;
	
	//$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
    
    }
    echo $var_msg;exit;
}


if($mode == 'edit')
{
	if(!is_dir($path."/1")){
            @mkdir($path."/1", 0777);
        }
     if(!is_dir($path."/1/".$iProductId)){
            @mkdir($path."/1/".$iProductId, 0777);
        } 

     if ($_FILES['vProductImage']['name'] != "") {    
       $PARAM_ARRAY = array
        (
         "TARGET_DIR" =>$path."/1/".$iProductId,
                array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                array('WIDTH_HEIGHT' => "200X267", 'PREFIX' => "1"),
		array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2"),
		array('WIDTH_HEIGHT' => "535X339", 'PREFIX' => "3")
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vProductImage']);        
        
        if($image !=''){
		    $Data['vProductImage'] = $image;
		    unlink(TPATH_SERVER_IMAGES_STORE."/1/".$iProductId."/3_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE."/1/".$iProductId."/2_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE."/1/".$iProductId."/1_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE."/1/".$iProductId."/".$_POST['vOldImage']);
		}
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vProductImage'] = addslashes($_POST['vOldImage']);
		}
	}
	
	$sql = "SELECT * FROM product_count WHERE iMemberId = '".$memberId."'";
	$sql_data = $obj->MysqlSelect($sql);    
	
        $where = " iProductId = '".$iProductId."'";
        $id = $obj->MySQLQueryPerform("product_general_item",$Data,'update',$where);
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