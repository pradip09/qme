<?php
#echo "ok"; 
#echo "<pre>";
#print_r($_REQUEST);exit;
$ssql = "";
$alp = $_REQUEST['alp'];
$option = $_REQUEST['option'];
$keyword = $_REQUEST['keyword'];
#echo "<pre>";
#print_r($option);
#print_r($keyword);exit;
//echo $option;exit;
if($option != '' && $keyword != ''){
    $ssql.= " AND ".stripslashes($option)." LIKE '".stripslashes($keyword)."%'";
}
#echo "<pre>";
#print_r($ssql);exit;
if($alp != ''){
    $ssql.= " AND vProductName LIKE '".stripslashes($alp)."%'";
}
$leftjoin = " INNER JOIN members m ON (pro.iMemberId = m.iMemberId) ";
$sql_res = "SELECT pro.*,m.vName as Name FROM product_general_item as pro ".$leftjoin." WHERE 1 ".$ssql;
$db_res = $obj->MySQLSelect($sql_res);
#$sql = "SELECT * FROM  product_general_item WHERE 1 $ssql";	
#$dbfaqcat = $obj->MySQLSelect($sql);
#echo "<pre>"; 
#print_r($sql_res); exit;
$num_totrec = count($db_res);
//$num_totrec1 = count($dbfaqcat2);
//$result2 = $num_totrec+$num_totrec1;
#echo "<pre>"; 
#print_r($num_totrec); exit;
include(TPATH_CLASS_GEN."paging.inc.php");

#Listing Starts from here

$sql_cus = "SELECT pro.*,m.vName as Name FROM product_general_item as pro ".$leftjoin." where 1 $ssql order by iProductId DESC $var_limit";
$db_product= $obj->MySQLSelect($sql_cus);
#$sql_cat = "SELECT * FROM   product_general_item where 1 $ssql order by iProductId DESC $var_limit";	
#$db_product = $obj->MySQLSelect($sql_cat);


#$result = array_merge((array)$num_totrec, (array)$db_product2);
#echo "<pre>"; 
#print_r($result); exit;

#echo "<pre>";
#print_r($db_cat);exit;
#ends here
if(!isset($start))
	$start = 1;
	$num_limit = ($start-1)*$rec_limit;
	$startrec = $num_limit;
	
	$lastrec = $startrec + $rec_limit;
	$startrec = $startrec + 1;
	if($lastrec > $num_totrec)
		$lastrec = $num_totrec;
		if($num_totrec > 0 )
		{
			$recmsg = "Showing ".$startrec." - ".$lastrec." Records Of ".$num_totrec;
		}
		else
		{
			$recmsg="No Records Found.";
		}

if(!count($db_product)>0 && $keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>0</font> matches:";
}else if($keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}else if($alp !=''){
    $var_msg_new = "Your search for <font color=#2e71b3>$alp</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}

$sql_alp = "select vProductName from  product_general_item where 1=1";
$db_alp = $obj->MySQLSelect($sql_alp);


#echo "<pre>";
#print_r($result3);exit;
for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vProductName'], 0,1));
}


$alpha_rs =implode(",",$db_alp);
#echo $alpha_rs;exit;
$AlphaChar = @explode(',',$alpha_rs);
#echo "<pre>";
#print_r($AlphaChar);exit;
$AlphaBox.='<ul class="pagination">';
for($i=65;$i<=90;$i++){
	
	if(!@in_array(chr($i),$AlphaChar)){
		$AlphaBox.= '<li ><a href="#" onclick="return false;"  id="alch_'.$i.'">'.chr($i).'</a></li>';
	}else{
		$AlphaBox.= '<li class="page"><a  href="javascript:void(0);" onclick="AlphaSearch(\''.chr($i).'\');" id="alch_'.$i.'" >'.chr($i).'</a></li>';
	}
}
$AlphaBox.='</ul>';
$smarty->assign("result",$result);
$smarty->assign("db_product",$db_product);
$smarty->assign("AlphaBox",$AlphaBox);
$smarty->assign("recmsg",$recmsg);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("keyword",$keyword);
$smarty->assign("option",$option);
$smarty->assign("page_link",$page_link);
$smarty->assign("var_msg_new",$var_msg_new);

?>
