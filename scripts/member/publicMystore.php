<?php

$generalobj->checkFrontAuthntication();
$url = $_REQUEST['mamberurl'];
$sql_user = "select * from members where vMemberUrl='".$url."'";
$db_user = $obj->MySQLSelect($sql_user);
if($db_user[0]['iMemberId'] == ''){
    header("location:".$tconfig["tsite_url"]."/home");
}else{
    $iMemberId = $db_user[0]['iMemberId'];
    
    $sql_photo = "select pc.* from  photo AS p LEFT JOIN photo_category AS pc ON(p.iPhotoCategoryId =  pc.iPhotoCategoryId) where pc.iPhotoCategoryId='".$photoId."' AND pc.iMemberId = '".$iMemberId."'";
    $db_photo = $obj->MySQLSelect($sql_photo);
}

$sql_store = "select * from store_category ORDER BY iStoreCategoryId";
$db_store = $obj->MySQLSelect($sql_store);

$sql_generalcnt = "select * from product_general_item where eStatus = 'Active' and  iStoreCategoryId=1 and iMemberId = $iMemberId ORDER BY iProductId DESC";
$db_generalcnt= $obj->MySQLSelect($sql_generalcnt);

$cntGeneral = count($db_generalcnt);


$sql_clothingcnt = "select * from product_clothing_accessories where eStatus = 'Active' and  iStoreCategoryId=2 AND iMemberId = $iMemberId ORDER BY iProductId DESC";
$db_clothingcnt= $obj->MySQLSelect($sql_clothingcnt);
$cntClothing = count($db_clothingcnt);

$sql_autocnt = "select * from product_automotive where eStatus = 'Active' and  iStoreCategoryId=3 and iMemberId = $iMemberId ORDER BY iProductId DESC";
$db_autocnt= $obj->MySQLSelect($sql_autocnt);
$cntAutomotive = count($db_autocnt);

$sql_realcnt = "select * from product_real_estate where eStatus = 'Active' and  iStoreCategoryId=4 and iMemberId = $iMemberId ORDER BY iProductId DESC";
$db_realcnt= $obj->MySQLSelect($sql_realcnt);
$cntReal = count($db_realcnt);

/* public product page banner start*/

$arrBannerProduct = array();
$sql_image = "select * from store_public_image where iMemberId = $iMemberId AND eType = 'image' ORDER BY iFileId DESC";
$arrBannerProduct = $obj->MySQLSelect($sql_image);
for($k = 0; $k < count($arrBannerProduct); $k++)
{
 $arrBannerProduct[$k]= $tconfig["tsite_upload_images_public_store_images"].$arrBannerProduct[$k]['iMemberId'].'/2_'. $arrBannerProduct[$k]['vFile'];   
}
$sql_video = "select * from store_public_image where iMemberId = $iMemberId AND eType = 'video' ORDER BY iFileId DESC";

$arrvideo = $obj->MySQLSelect($sql_video);
if($arrvideo[0]['vFile'] != '')
{
$arrvideo[0]['vFile'] = $tconfig["tsite_upload_images_public_store_images"].$arrvideo[0]['iMemberId'].'/'. $arrvideo[0]['vFile'];       
}

#echo "<pre>";
#print_r($arrvideo);exit;

if($arrBannerProduct[0] == '')
{
$i=0;
for($j=0;$j<count($db_generalcnt) && $j<3 ;$j++)
{
    if(is_file(TPATH_SERVER_IMAGES_STORE.'/1/'.$db_generalcnt[$j]['iProductId'].'/3_'. $db_generalcnt[$j]['vProductImage']))
    {
        $arrBannerProduct[$i]= $tconfig["tsite_upload_images_store"].'/1/'.$db_generalcnt[$j]['iProductId'].'/3_'. $db_generalcnt[$j]['vProductImage'];
        $i++;
    }
}
for($j=0;$j<count($db_clothingcnt) && $j<3 ;$j++)
{
    if(is_file(TPATH_SERVER_IMAGES_STORE.'/2/'.$db_clothingcnt[$j]['iProductId'].'/3_'. $db_clothingcnt[$j]['vProductImage']))
    {
        $arrBannerProduct[$i]= $tconfig["tsite_upload_images_store"].'/2/'.$db_clothingcnt[$j]['iProductId'].'/3_'. $db_clothingcnt[$j]['vProductImage'];
        $i++;
    }
}
for($j=0;$j<count($db_autocnt) && $j<3 ;$j++)
{
    if(is_file(TPATH_SERVER_IMAGES_STORE.'/3/'.$db_autocnt[$j]['iProductId'].'/3_'. $db_autocnt[$j]['vVehicleImage']))
    {
        $arrBannerProduct[$i]= $tconfig["tsite_upload_images_store"].'/3/'.$db_autocnt[$j]['iProductId'].'/3_'. $db_autocnt[$j]['vVehicleImage'];
        $i++;
    }
}
for($j=0;$j<count($db_realcnt) && $j<3 ;$j++)
{
    if(is_file(TPATH_SERVER_IMAGES_STORE.'/4/'.$db_realcnt[$j]['iProductId'].'/3_'. $db_realcnt[$j]['vImage']))
    {
        $arrBannerProduct[$i]= $tconfig["tsite_upload_images_store"].'/4/'.$db_realcnt[$j]['iProductId'].'/3_'. $db_realcnt[$j]['vImage'];
        $i++;
    }
}
}
#echo "<pre>";
#print_r($arrBannerProduct);exit;


/* public product page banner end*/
#echo "<pre>";
#print_r($arrvideo);exit;
$smarty->assign("arrvideo",$arrvideo);
$smarty->assign("arrBannerProduct",$arrBannerProduct);
$smarty->assign("db_store",$db_store);
$smarty->assign("cntGeneral",$cntGeneral);
$smarty->assign("cntClothing",$cntClothing);
$smarty->assign("cntAutomotive",$cntAutomotive);
$smarty->assign("cntReal",$cntReal);
$smarty->assign("db_user", $db_user);
$smarty->assign("iMemberid", $iMemberId);

$iCatPhotoId = $db_photo[0]['iPhotoCategoryId'];
$smarty->assign("db_photo",$db_photo);
?>