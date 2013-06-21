<?php
    //echo "<pre>";
    //print_r($_SESSION);exit;
    
    for($i = 0; $i < $_SESSION['Cart']['sess_total_product']; $i++)
    {        
        $cart[$i]['item_id'] = $_SESSION['Cart']['sess_iProductId'][$i];
        $cart[$i]['item_name'] = $_SESSION['Cart']['sess_productname'][$i];
        $cart[$i]['item_prise'] = $_SESSION['Cart']['sess_itemprices'][$i];
        $cart[$i]['item_qty'] = $_SESSION['Cart']['sess_itemqtys'][$i];
        $cart[$i]['item_id'] = $_SESSION['Cart']['sess_iProductId'][$i];
        $cart[$i]['item_category'] = $_SESSION['Cart']['sess_categoryid'][$i];
    
        
        if($cart[$i]['item_category'] != '' && $tconfig["tsite_upload_images_store"].$cart[$i]['item_category'].'/'.$cart[$i]['item_id']."/2_".$_SESSION['Cart']['sess_images'][$i] != '')
        {
                $cart[$i]['item_image'] = $tconfig["tsite_upload_images_store"].$cart[$i]['item_category'].'/'.$cart[$i]['item_id']."/2_".$_SESSION['Cart']['sess_images'][$i];
        }
        else {
            
             $cart[$i]['item_image'] = $tconfig["front_images"].'order-img.png';
            
        }
        $cart[$i]['item_total'] = $_SESSION['Cart']['sess_itemprices'][$i]*$_SESSION['Cart']['sess_itemqtys'][$i];
    }
    $subtotal = $_SESSION['Cart']['sess_total_price'];
    $grandtotal = $_SESSION['Cart']['sess_total_price'];
    
    $smarty->assign("subtotal",$subtotal);
    $smarty->assign("grandtotal",$grandtotal);
    $smarty->assign("cart",$cart);
    
?>