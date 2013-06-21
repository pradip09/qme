<?php
$iParentId = $_REQUEST['iParentId'];
$iCategoryId = $_REQUEST['iCategoryId'];
$keyword = $_REQUEST['keyword'];


$smarty->assign("iCategoryId",$iCategoryId);
$smarty->assign("keyword",$keyword);
$smarty->assign("iParentId",$iParentId);

?>

