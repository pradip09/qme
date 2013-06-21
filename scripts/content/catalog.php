<?php

$iCategoryId = $_REQUEST['iCategoryId'];

/*if($_SESSION['iCategoryId'] !=''){
    $iCategoryId = $_SESSION['iCategoryId'];    
    
}else{
    unset($_SESSION['iCategoryId']);
    $iCategoryId = $_REQUEST['iCategoryId'];        
}

if($_SESSION['keyword'] !=''){
    $keyword = $_SESSION['keyword'];       
    
}else{
    unset($_SESSION['keyword']);
    $keyword = $_REQUEST['keyword'];
}

if($_SESSION['iParentId'] !=''){
    $iParentId = $_SESSION['iParentId'];
    
}else{
    unset($_SESSION['iParentId']);
    $iParentId = $_REQUEST['iParentId'];
}*/







$smarty->assign("iCategoryId",$iCategoryId);
//$smarty->assign("keyword",$keyword);
//$smarty->assign("iParentId",$iParentId);

?>

 