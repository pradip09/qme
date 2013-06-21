<?php
    
    $iProductId = $_REQUEST['iProductId'];
    $sql1="SELECT * FROM products WHERE iProductId='".$iProductId."'";
    $db_productdetail = $obj->MySQLSelect($sql1);
    
    
    $relatedProArr =explode("|",$db_productdetail[0]['vRelatedProduct']);
    #echo "<pre>";
    #print_r($relatedProArr);
    $relArr = array();
    for($i=0;$i<count($relatedProArr);$i++){
        $sql_rel = "SELECT * FROM products WHERE iProductId='".$relatedProArr[$i]."'";
        $db_rel_pro = $obj->MySQLSelect($sql_rel);
        
        
        $relArr[$i]['iProductId'] = $db_rel_pro[0]['iProductId'];
        $relArr[$i]['vTitle'] = $db_rel_pro[0]['vTitle'];
        if($db_rel_pro[0]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_PRODUCT."/".$db_rel_pro[0]['iProductId']."/".$db_rel_pro[0]['vImage'])){
            $relArr[$i]['vImage'] = $tconfig["front_images"]."noimage.png";
	}else{
            $relArr[$i]['vImage'] = $tconfig["tsite_upload_images_product"].$db_rel_pro[0]['iProductId']."/"."1_".$db_rel_pro[0]['vImage'];
	}
        
    }
    
    $sql_gal = "SELECT * FROM product_gallery WHERE iProductId='".$iProductId."'";
    $db_gal = $obj->MySQLSelect($sql_gal);
    
    for($i=0;$i<count($db_gal);$i++){
        if($db_gal[$i]['vGalImage'] =='' && !is_file(TPATH_SERVER_IMAGES_PRODUCT."/".$db_gal[$i]['iProductId']."/".$db_gal[$i]['vGalImage'])){
            $db_gal[$i]['vGalImagenew'] = $tconfig["front_images"]."noimage.png";
	}else{
            $db_gal[$i]['vGalImagenew'] = $tconfig["tsite_upload_images_product"].$db_gal[$i]['iProductId']."/"."1_".$db_gal[$i]['vGalImage'];
	}
        
        if($db_gal[$i]['vGalImage'] =='' && !is_file(TPATH_SERVER_IMAGES_PRODUCT."/".$db_gal[$i]['iProductId']."/".$db_gal[$i]['vGalImage'])){
            $db_gal[$i]['vGalImagemain'] = $tconfig["front_images"]."noimage.png";
	}else{
            $db_gal[$i]['vGalImagemain'] = $tconfig["tsite_upload_images_product"].$db_gal[$i]['iProductId']."/".$db_gal[$i]['vGalImage'];
	}
        
    }
    #echo "<pre>";
    #print_r($db_gal);exit;
    
    $sql_p = "select c.iParentId from products AS p LEFT JOIN categories AS c ON(p.iCategoryId = c.iCategoryId) where p.eStatus='Active' AND iProductId='".$iProductId."'";
    $result =$obj->MySQLSelect($sql_p);
    
    #echo "<pre>";
    #print_r($relArr);exit;
    $smarty->assign("relArr", $relArr);
    $smarty->assign("db_productdetail", $db_productdetail);
    $smarty->assign("db_gal", $db_gal);
    $smarty->assign("parentcat", $result[0]['iParentId']);

?>