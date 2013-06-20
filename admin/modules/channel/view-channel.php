<?php
#echo "ok"; 
#echo "<pre>";
#print_r($_REQUEST);exit;
$ssql = "";
$alp = $_REQUEST['alp'];
$option = $_REQUEST['option'];
$keyword = $_REQUEST['keyword'];
if($option != '' && $keyword != ''){
    $ssql.= " AND ".stripslashes($option)." LIKE '%".stripslashes($keyword)."%'";
}

if($alp != ''){
    $ssql.= " AND vChannelName LIKE '%".stripslashes($alp)."%'";
}

$sql_channel = "SELECT ch.*,m.vName AS Name  FROM  channel AS ch LEFT JOIN members AS m ON(m.iMemberId=ch.iMemberId) WHERE 1=1 $ssql";
$db_viewchannel1 = $obj->MySQLSelect($sql_channel);
#echo "<pre>";
#print_r($db_viewchannel);exit;

#paging start from here..
$num_totrec = count($db_viewchannel1);
include(TPATH_CLASS_GEN."paging.inc.php");


$sql_channel = "SELECT ch.*,m.vName AS Name  FROM  channel AS ch LEFT JOIN members AS m ON(m.iMemberId=ch.iMemberId) WHERE 1=1 $ssql order by iChannelId DESC $var_limit";	
$db_viewchannel = $obj->MySQLSelect($sql_channel);



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

if(!count($db_viewchannel)>0 && $keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>0</font> matches:";
}else if($keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}else if($alp !=''){
    $var_msg_new = "Your search for <font color=#2e71b3>$alp</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}

$sql_alp = "select vChannelName from channel where 1=1";
$db_alp = $obj->MySQLSelect($sql_alp);

for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vChannelName'], 0,1));
}
#echo "<pre>";
#print_r($db_alp);exit;

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
$smarty->assign("AlphaBox",$AlphaBox);
$smarty->assign("recmsg",$recmsg);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("keyword",$keyword);
$smarty->assign("option",$option);
$smarty->assign("page_link",$page_link);
$smarty->assign("var_msg_new",$var_msg_new);
$smarty->assign("db_viewchannel",$db_viewchannel);

?>
