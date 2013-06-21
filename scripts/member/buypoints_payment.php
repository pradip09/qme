<?php
//echo "<pre>";
//print_r($_REQUEST);exit;


$price=$_POST['price'];
$points=$_POST['points'];
$price11=$_POST['price11'];
$points11=$_POST['points11'];

$smarty->assign("points",$points);
$smarty->assign("price",$price);
$smarty->assign("price11",$price11);
$smarty->assign("points11",$points11);
?>