<?php
  
    //echo "<pre>";
    //print_r($_SESSION['Cart']);exit;
    $generalobj->checkFrontAuthntication();
    $mode = $_REQUEST['mode'];
    $eType=$_REQUEST['eType'];
    
    $iMemberId = $_SESSION['iUserId'];
    $sql_store = "select * from store_category ORDER BY iStoreCategoryId";
    $db_store = $obj->MySQLSelect($sql_store);
    
    $sql_store_public_video = "select * from store_public_image  WHERE iMemberId='".$iMemberId."' AND 	eType ='video' ORDER BY iFileId ";
    $db_store_public_video = $obj->MySQLSelect($sql_store_public_video);
    
    $sql_store_public_image = "select * from store_public_image  WHERE iMemberId='".$iMemberId."' AND 	eType ='image' ORDER BY iFileId ";
    $db_store_public_image = $obj->MySQLSelect($sql_store_public_image);
    #echo "<pre>";
    #print_r($db_store_public_image);exit;
    $sql_store_public_data = "select * from store_public_image  WHERE iMemberId='".$iMemberId."' ORDER BY iFileId ";
    $db_store_public_data = $obj->MySQLSelect($sql_store_public_data);
    
    
    $totpublicdata = count($db_store_public_data);
    
    
    #echo "<pre>";
    #print_r($totpublicdata);exit;
    
    
   # echo "<pre>";
   # print_r($db_store); exit;
     if($mode == 'add'){
      $totgal = 1;
    }else{
       if(count($db_store_public_image) > 0){
         $totgal = count($db_store_public_image);
         $flag=1;
        }else{
            $totgal = 1;
            $flag = 0;
        }
        
    }
    
    $sql_store = "select * from store_plan ";
    $db_storeplan = $obj->MySQLSelect($sql_store);
    
    $iMemberId = $_SESSION['iUserId'];
    $sql_plan = "SELECT * FROM plan_transaction WHERE iMemberId = '".$iMemberId."' ORDER BY iPlanTransactionId DESC Limit 1";
    $db_plan = $obj->MySQLSelect($sql_plan);
    
    $free_limit = $db_storeplan[0]['item_limit'];
    if($db_plan[0]['iPlanId'] == '2'){
        $bronze_limit = $db_storeplan[0]['item_limit'] + $db_storeplan[1]['item_limit'];
    }
    else{
        $bronze_limit = $db_storeplan[0]['item_limit'];
    }
    if($db_plan[0]['iPlanId'] == '3'){
        $silver_limit = $bronze_limit + $db_storeplan[2]['item_limit'];
    }
    else{
        $silver_limit = $bronze_limit;
    }
    $gold_limit = $silver_limit + $db_storeplan[4]['item_limit'];
    
    $smarty->assign("totpublicdata",$totpublicdata);
    $smarty->assign("db_store",$db_store);
    $smarty->assign("mode",$mode);
    $smarty->assign("iMemberId",$iMemberId);
    $smarty->assign("db_store_public_data",$db_store_public_data);
    
    $smarty->assign("db_store_public_video",$db_store_public_video);
    $smarty->assign("db_store_public_image",$db_store_public_image);
   
    $smarty->assign("free_limit",$free_limit);
    $smarty->assign("bronze_limit",$bronze_limit);
    $smarty->assign("silver_limit",$silver_limit);
    $smarty->assign("gold_limit",$gold_limit);
    
    $smarty->assign("db_plan",$db_plan);
    $smarty->assign("db_storeplan",$db_storeplan);
    
    $smarty->assign("totgal",$totgal);
    $smarty->assign("flag",$flag);
    $smarty->assign("eType",$eType);
?>
