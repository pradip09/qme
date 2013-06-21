<?php
$generalobj->checkFrontAuthntication();
//$generalobj->checkFrontAuthntication();
$photoId = $_REQUEST['iCateroryId'];
$url = $_REQUEST['mamberurl'];
$sql_user = "select * from members where vMemberUrl='".$url."'";
    $db_user = $obj->MySQLSelect($sql_user);
    #echo "<pre>";
    #print_r($db_user);exit;
    if($db_user[0]['iMemberId'] == ''){
    header("location:".$tconfig["tsite_url"]."/home");
}else{

$iMemberId = $db_user[0]['iMemberId'];
$sql_photo = "select pc.* from  photo AS p LEFT JOIN photo_category AS pc ON(p.iPhotoCategoryId =  pc.iPhotoCategoryId) where pc.iPhotoCategoryId='".$photoId."' AND pc.iMemberId = '".$iMemberId."'";
$db_photo = $obj->MySQLSelect($sql_photo);
#echo "<pre>";
#print_r($db_photo);exit;
}

$smarty->assign("db_user", $db_user);
$smarty->assign("iMemberid", $iMemberId);

$iCatPhotoId = $db_photo[0]['iPhotoCategoryId'];
$smarty->assign("db_photo",$db_photo);
$smarty->assign("iCatPhotoId",$iCatPhotoId);

?>