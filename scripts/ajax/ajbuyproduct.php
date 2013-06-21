<?php

$useid =$_SESSION['iUserId'];
$iCampaignId = $_REQUEST['iCampaignId'];
$iMemId = $_REQUEST['iMemId'];
$iProductId = $_REQUEST['iProductId'];
$iStoreid = $_REQUEST['iStoreid'];
$iItemDiscount = $_REQUEST['iItemDiscount'];



if($iStoreid == 1){
$sql_gen =  "select * from product_general_item where iProductId='".$iProductId."' AND iStoreCategoryId = '".$iStoreid."'";
$ProductArr = $obj->MySQLSelect($sql_gen);
    
}
if($iStoreid == 2){
$sql_cloth =  "select * from product_clothing_accessories where iProductId='".$iProductId."' AND iStoreCategoryId = '".$iStoreid."'";
$ProductArr = $obj->MySQLSelect($sql_cloth);
    
}
$sql_static_pages = "select * from static_pages where vPageCode = 'learnmore_store_item'";
$db_static_pages = $obj->MySQLSelect($sql_static_pages);

$ProductArr[0]['Tot_price']=$ProductArr[0]['fPrice'] + $iItemDiscount ;
//echo "<pre>";
//print_r($ProductArr);exit;

if(count($ProductArr) > 0){
    
   $html .='<div class="general_product">';
	$html .=' <div class="my_pro_img">';
        if($ProductArr[0][vProductImage] != ''){
              $html .=' <a href="#"><img src="'.$tconfig["tsite_upload_images_store"].$ProductArr[0][iStoreCategoryId].'/'.$ProductArr[0][iProductId].'/'.$ProductArr[0][vProductImage].'" width="348" height="170"/></a>';
        }
 else{
                $html .='  <a href="#"><img src="'.$tconfig["front_images"].'noimage.jpg"/></a>';
}
                  $html .='</div>';
                
    $html .=' <div class="my_pro_dis" style="text-align:center;">
                    <div class="my_pro_distitle1">
                          Product Name: <a href="#"> '.$ProductArr[0][vProductName].'</a>
                    </div>
                    <div class="my_pro_disprise">Product price: $'.$ProductArr[0][Tot_price].'</div>
                     
                     <div class="cart_campaign">
                        
                        <div class="cart_campaign_inner">
                         <div class="add_to_card" style="margin-left: 121px;">';
                         if($useid != $iMemId){
			   $html .='<a href="#" onclick="getAjaxCart(\'Add\',\''.$ProductArr[0][iProductId].'\',\''.$ProductArr[0][iStoreCategoryId].'\',\''.$ProductArr[0][Tot_price].'\');"><img src="'.$tconfig["front_images"].'add-to-card.png" /></a>';			   
			 }
                          
		        $html .='</div>
                        </div>
                    </div>  
        </div>';
  
  $html .='<div style="display:none;">
        <div id="Learnmore'.$ProductArr[0][iProductId].'" class="signing">'.$db_static_pages[0][lContents].'</div>
        </div>';
    
}


echo $html;exit;
//onclick="savecomment('.$recent_activitieId.','.$user_id.',\''.$comment_type.'\','.$item_id.');"
?>