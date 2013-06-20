<?php

$ssql = "";
$alp = $_REQUEST['alp'];
$option = $_REQUEST['option'];
$keyword = $_REQUEST['keyword'];
$type = $_REQUEST['type'];


if($option != '' && $keyword != ''){
    $ssql.= " AND ".stripslashes($option)." LIKE '".stripslashes($keyword)."%'";
}
if($alp != ''){
    $ssql.= " AND vCampaignName LIKE '".stripslashes($alp)."%'";

}

$sql_res =  "SELECT p.*, a.vFirstName, a.vLastName,p.vCampaignName,p.eStatus FROM post_campaign p INNER JOIN administrators a ON p.iAdminId = a.iAdminId WHERE 1=1 $ssql";	
$db_res = $obj->MySQLSelect($sql_res);
$num_totrec = count($db_res);
include(TPATH_CLASS_GEN."paging.inc.php");

#Listing Starts from here
/*$sql_campaignjob = "SELECT * FROM post_campaign  WHERE 1=1 $ssql order by iCampaignId $var_limit";
$db_postcampaign = $obj->MySQLSelect($sql_campaignjob);*/


$sql_campaign = "SELECT p.*, a.vFirstName, a.vLastName,p.vCampaignName,p.eStatus FROM post_campaign p INNER JOIN administrators a ON p.iAdminId = a.iAdminId WHERE 1=1 $ssql order by iCampaignId DESC $var_limit";
$db_postcampaign = $obj->MySQLSelect($sql_campaign);

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

if(!count($db_res)>0 && $keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>0</font> matches:";
}else if($keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}else if($alp !=''){
	$var_msg_new = "Your search for <font color=#2e71b3>$alp</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}

$sql_alp = "SELECT p.*, a.vFirstName, a.vLastName FROM post_campaign p INNER JOIN administrators a ON p.iAdminId = a.iAdminId WHERE 1=1";
$db_alp = $obj->MySQLSelect($sql_alp);

for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vCampaignName'], 0,1));
}


$alpha_rs =implode(",",$db_alp);
$AlphaChar = @explode(',',$alpha_rs);

$AlphaBox.='<ul class="pagination">';
for($i=65;$i<=90;$i++){
	
	if(!@in_array(chr($i),$AlphaChar)){
		$AlphaBox.= '<li ><input type="hidden" value="'.$type.'" name="type" id="type" ><a href="#" onclick="return false;"  type ="'.$type.'" id="alch_'.$i.'">'.chr($i).'</a></li>';
	}else{
		$AlphaBox.= '<li class="page"><input type="hidden" value="'.$type.'" name="type" id="type"><a  href="javascript:void(0);" type ="'.$type.'"onclick="AlphaSearch(\''.chr($i).'\');" id="alch_'.$i.'" >'.chr($i).'</a></li>';
	}
}
$AlphaBox.='</ul>';


$smarty->assign("type",$type);
$smarty->assign("db_postcampaign",$db_postcampaign);
$smarty->assign("AlphaBox",$AlphaBox);
$smarty->assign("recmsg",$recmsg);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("keyword",$keyword);
$smarty->assign("option",$option);
$smarty->assign("page_link",$page_link);
$smarty->assign("var_msg_new",$var_msg_new);


?>
