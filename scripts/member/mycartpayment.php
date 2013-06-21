<?php

//echo "<pre>";
//print_r($_REQUEST);exit;
include_once(TPATH_CLASS_GEN."class.general.php");
$GeneralObj = new General();
$iMemberId=$_SESSION['iUserId'];
$grandtotal = $_SESSION['Cart']['sess_total_price'];


$cardid=$_REQUEST['cardId'];
$vCardNo =$_REQUEST['cardno'];
$selmonth=$_REQUEST['selmonth'];
$selyear=$_REQUEST['selyear'];
$secureno=$_REQUEST['secureno'];
$exp=$_REQUEST['selmonth'].$_REQUEST['selyear'];

$randOrderNo = $GeneralObj->UniqueID('TOPG','`order`','vOrderNo','4');

if ($iMemberId != ''){
    
    $Data['vCardNo']=$vCardNo;
    $iMemberId = $_SESSION['iUserId'];
    $Data['vOrderNo']=$randOrderNo;
    $Data['iMemberId']=$iMemberId;
    $Data['fTotalPrice']=$grandtotal;
    $Data['vPaymentType']=$cardid;    
    $Data['dExpiaryDate']=$exp;
    $orDate=  mktime(0,0,0,date("m"),date("d"),date("Y"));
    $orDate=date("Y/m/d", $orDate);   
    $Data['dOrderDate']=$orDate;
    $Data['vccv']=$secureno;    
    $id1 = $obj->MySQLQueryPerform("`order`",$Data,'insert');
   
}

$iOrderId=$id1;
if ($iOrderId != ''){
for($i=0;$i<$_SESSION['Cart']['sess_total_product'];$i++){
        
        $data['vItemImage'] = $_SESSION['Cart']['sess_images'][$i];
        $data['vItemName'] = $_SESSION['Cart']['sess_productname'][$i];
        $data['fItemPrice'] = $_SESSION['Cart']['sess_itemprices'][$i];
        $data['iQty'] = $_SESSION['Cart']['sess_itemqtys'][$i];
        $data['iOwnerId'] = $_SESSION['Cart']['sess_iMemberId'][$i];
        $data['iCategoryId'] = $_SESSION['Cart']['sess_categoryid'][$i];
        $data['iOrderId']=$iOrderId;
        $id = $obj->MySQLQueryPerform("`order_detail`",$data,'insert');
   
} 
}
 header("Location: ".$site_url."/index.php?file=m-payment&iOrderId=$id1");


?>