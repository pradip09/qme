<?php

    $mode = $_REQUEST['mode'];
    $ssql = "";
    $alp = $_REQUEST['alp'];
    $option = $_REQUEST['option'];
    $keyword = $_REQUEST['keyword'];
    $type = $_REQUEST['type'];
   //echo "<pre>";
   //print_r($_REQUEST);
    
    if($option != '' && $keyword != ''){
        $ssql.= "And ".stripslashes($option)." LIKE '".stripslashes($keyword)."%'";
    }
    if($alp != ''){
        $ssql.= "And vName LIKE '".stripslashes($alp)."%'";
    
    }
    //echo  $ssql;exit;
    $sql_mem = "select * from members WHERE 1 $ssql";
    $db_res = $obj->MySQLSelect($sql_mem);
    
    $num_totrec = count($db_res);
    
    include(TPATH_CLASS_GEN."paging.inc.php");
    $sql_cus =  "select * from members WHERE 1 $ssql order by iMemberId DESC ";    
    $db_member= $obj->MySQLSelect($sql_cus);
    //echo "<pre>";
    //print_r($sql_cus);exit;
    
    if($mode !=''){
      
        $sql_city="select * from citynews";
        $db_city =$obj->MySQLSelect($sql_city);
    }
   
    for($i=0;$i<count($db_city);$i++){
            $CityArr = explode(",",$db_city[$i]['iMemberId']);
            $CityArray []= implode(",",$CityArr);
        
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

if(!count($db_member)>0 && $keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>0</font> matches:";
}else if($keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}else if($alp !=''){
	$var_msg_new = "Your search for <font color=#2e71b3>$alp</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}

$sql_alp = "select vName from members where 1=1";
$db_alp = $obj->MySQLSelect($sql_alp);

for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vName'], 0,1));
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
    $smarty->assign("AlphaBox",$AlphaBox);
    $smarty->assign("recmsg",$recmsg);
    $smarty->assign("var_msg",$var_msg);
    $smarty->assign("keyword",$keyword);
    $smarty->assign("option",$option);
    $smarty->assign("page_link",$page_link);
    $smarty->assign("var_msg_new",$var_msg_new);
    $smarty->assign("db_city",$db_city);  
    $smarty->assign("CityArray",$CityArray);
    $smarty->assign("mode",$mode);
    $smarty->assign("db_member",$db_member);
?>
