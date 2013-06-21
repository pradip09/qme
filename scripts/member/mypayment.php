<?php
    //echo "ok";
    #print_r($_SESSION['cart']);exit;
    
    $cartArrr = $_SESSION['cart'];
    $cartArr = $_SESSION['cart']['sess_total_product'];
    $grandtotal = $_SESSION['Cart']['sess_total_price'];
    
    
    
    $smarty->assign("cartArr",$cartArr);
    $smarty->assign("subtotal",$subtotal);
    $smarty->assign("grandtotal",$grandtotal);
    $smarty->assign("cart",$cart);
?>