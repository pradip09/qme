<?php
    ob_clean();
    $CartArr = $_SESSION['Cart'];
    include_once(TPATH_CLASS_APP."/Shopcart.class.php");
    $Cartobj = new Cart();
    include_once(TPATH_CLASS_GEN."class.sendmail.php");
    $mailObj = new SendPHPMail();
    $totProduct = $CartArr['sess_total_product'];
    $totPrice =   $CartArr['sess_total_price'];
    
    if($totProduct > 0){
     $dAddedDate =  date("Y-m-d H:i:s");
     $randOrderNo = $generalobj->UniqueID('BUGR','estimates','vOrderNo','4');
     $data = array(
                    "iUserId" =>$_SESSION['iUserId'],
                    "vOrderNo"=>$randOrderNo,
                    "fDiscount" =>"",
                    "fGrandTotal" =>$totPrice,
                    "eStatus"=>"Requested",
                    "dAddedDate"=>$dAddedDate
                   );
        $iEstimateId = $obj->MySQLQueryPerform("estimates",$data,'insert');
        for($i=0;$i<$totProduct;$i++){
            $sql = "select * from products where iProductId='".$CartArr['sess_iProductId'][$i]."'";
            $db_sql = $obj->MySQLSelect($sql);
            $totprice = $CartArr['sess_itemqtys'][$i]*$db_sql[0]['fPrice'];
         $data_orders = array(
                            "iEstimateId" =>$iEstimateId,
                            "iProductId" =>$CartArr['sess_iProductId'][$i],
                            "vProductCode" =>$CartArr['sess_code'][$i],
                            "iCategoryId"=>$db_sql[0]['iCategoryId'],
                            "vTitle"=>addslashes($db_sql[0]['vTitle']),
                            "tDescription" => addslashes($db_sql[0]['tDescription']),
                            "vImage"=>$db_sql[0]['vImage'],
                            "fPrice" =>$db_sql[0]['fPrice'],
                            "iQty"=>$CartArr['sess_itemqtys'][$i],
                            "fTotalPrice" => $totprice
                             );
         $iEstimateDetailId = $obj->MySQLQueryPerform("estimate_orders",$data_orders,'insert');
         
        }
        if($iEstimateDetailId > 0){
                $emailData = $Cartobj->EmailData();
                $to_email = $_SESSION['vEmail'];
                $Name = $_SESSION['Name'];
                $body_arr = Array("#NAME#","#SITE_NAME#","#QUOTATION_INFO#","#ORDERNO#","#MAIL_FOOTER#","#EMAIL#","#SITE_URL#","#ORDERSTATUS#");
                $post_arr = Array($Name,$COMPANY_NAME,$emailData,$randOrderNo,$MAIL_FOOTER,$to_email,$site_url,"Requested");
                unset($_SESSION['Cart']);
                $mailObj->Send("MEMBER_QUOTATION_REQUEST","Member",$to_email,$body_arr,$post_arr);        
                $var_msg = "Gracias por solicitar una quote.we pondremos en contacto contigo en breve.";
         }else{
            $var_msg ="Error en la solicitud de una cita";
         }
        
        
    }
    echo $var_msg;exit;
   
    
?>