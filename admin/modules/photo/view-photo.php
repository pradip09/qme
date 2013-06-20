<?

$ssql = "";

$alp = $_REQUEST['alp'];
$option = $_REQUEST['option8'];

$keyword = $_REQUEST['keyword8'];
$type = $_REQUEST['type'];


$memberId = $_REQUEST['iMemberId'];


if($option != '' && $keyword != ''){
    $ssql.= " AND p.".stripslashes($option)." LIKE '".stripslashes($keyword)."%'";
}
/*if($alp != ''){
    $ssql.= " AND vPhotoTitle LIKE '".stripslashes($alp)."%'";

}*/
$leftjoin = " LEFT JOIN photo_category pc ON (p.iPhotoCategoryId = pc.iPhotoCategoryId) JOIN members m ON (p.iMemberId = m.iMemberId) ";

$sql_res = "SELECT p.*,pc.vPhotoCategory FROM photo as p ".$leftjoin." WHERE 1 AND p.iMemberId = ".$memberId." ".$ssql;
$db_res = $obj->MySQLSelect($sql_res);
//echo $sql_res;exit; 
$num_totrec = count($db_res);

include(TPATH_CLASS_GEN."paging.inc.php");

#Listing Starts from here
//SELECT p.* FROM photo as p LEFT JOIN photo_category pc ON (p.iPhotoCategoryId = pc.iPhotoCategoryId) JOIN members m ON (p.iMemberId = m.iMemberId) where 1  AND p.iMemberId = 90 ORDER BY iPhotoId LIMIT 0,10
$sql_cus = "SELECT p.*,pc.vPhotoCategory FROM photo as p ".$leftjoin." where 1 AND p.iMemberId = ".$memberId." ".$ssql." order by iPhotoId ".$var_limit;	
$db_viewphoto= $obj->MySQLSelect($sql_cus);


//$sql_res = "select * from photo where iPhotoCategoryId = '0' AND iMemberId = '".$iMemberId."' ".$ssql;
//$sql_cus = "select * from photo where 1 iPhotoCategoryId = '0' AND iMemberId = ".$iMemberId." ".$ssql." order by iPhotoId ".$var_limit;	
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
			$recmsg4 = "Showing ".$startrec." - ".$lastrec." Records Of ".$num_totrec;
		}
		else
		{
			$recmsg4="No Records Found.";
		}

if(!count($db_res)>0 && $keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>0</font> matches:";
}else if($keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}else if($alp !=''){
    $var_msg_new = "Your search for <font color=#2e71b3>$alp</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}

$sql_alp = "select vPhotoTitle from photo where 1=1" ;
$db_alp = $obj->MySQLSelect($sql_alp);

for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vPhotoTitle'], 0,1));
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
$smarty->assign("db_viewphoto",$db_viewphoto);
$smarty->assign("AlphaBox",$AlphaBox);
$smarty->assign("recmsg4",$recmsg4);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("keyword",$keyword);
$smarty->assign("option",$option);
$smarty->assign("page_link",$page_link);
$smarty->assign("var_msg_new",$var_msg_new);

?>
