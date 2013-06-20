<?
$ssql = "";

$alp = $_REQUEST['alp'];
$option = $_REQUEST['option'];
//echo $option;
$keyword = $_REQUEST['keyword'];
$type = $_REQUEST['type'];
//echo $keyword; exit;
$my_mode = 'add';

$memberId = $_REQUEST['iMemberId'];


if($option != '' && $keyword != ''){
    $ssql.= " AND ".stripslashes($option)." LIKE '".stripslashes($keyword)."%'";
}
/*if($alp != ''){
    $ssql.= " AND vBlogTitle LIKE '".stripslashes($alp)."%'";

}*/

/*$leftjoin = " INNER JOIN blogcategory bc ON (b.iBlogCategoryId = bc.iBlogCategoryId) JOIN members m ON (b.iMemberId = m.iMemberId) ";
$sql_res = "SELECT b.*,bc.vBlogCategory as BlogCategory,m.vName as Name FROM blog as b ".$leftjoin." WHERE 1 ".$ssql;
$db_res = $obj->MySQLSelect($sql_res);*/
$sql_res = "select * from  blog WHERE iMemberId='".$memberId."' ".$ssql."" ;
$db_res = $obj->MySQLSelect($sql_res);
//echo $sql_res;exit; 
$num_totrec = count($db_res);

include(TPATH_CLASS_GEN."paging.inc.php");

#Listing Starts from here
/*$sql_cus = "SELECT b.*,bc.vBlogCategory as BlogCategory FROM blog as b ".$leftjoin." where 1 AND b.iMemberId = ".$memberId." ".$ssql." order by iBlogId ".$var_limit;	
$db_blog_view= $obj->MySQLSelect($sql_cus);*/
$sql_cus = "select * from  blog WHERE  iMemberId = ".$memberId." ".$ssql." order by iBlogId ".$var_limit;	
$db_blog_view= $obj->MySQLSelect($sql_cus);
//$db_blog_view[0]['dCreateDate'] = date('m-d-Y',strtotime($db_blog_view[0]['dCreateDate']));
//echo $sql_cus;exit; 
$cntt=count($db_blog_view);
for($i=0;$i<$cntt;$i++)
{
	$db_blog_view[$i][dCreateDate]=date("m-d-Y", strtotime($db_blog_view[$i][dCreateDate]));
}
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

$sql_alp = "select vBlogTitle from blog where 1=1";
$db_alp = $obj->MySQLSelect($sql_alp);

for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vBlogTitle'], 0,1));
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
$smarty->assign("my_mode",$my_mode);
$smarty->assign("db_blog_view",$db_blog_view);
$smarty->assign("db_blog",$db_blog);
$smarty->assign("AlphaBox",$AlphaBox);
$smarty->assign("recmsg",$recmsg);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("keyword",$keyword);
$smarty->assign("option",$option);
$smarty->assign("page_link",$page_link);
$smarty->assign("var_msg_new",$var_msg_new);

?>
