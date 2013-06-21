<?php
class releventnews
{
	function __construct()
	{
		global $obj;
	}

	function __destruct()
	{
		unset($this->_obj);
	}

    function relevent_imgs($iMemberId){
	global $obj;
	$sql1 = "SELECT vProfileImage FROM  members where iMemberId='".$iMemberId."'";
	$res =$obj->MySQLSelect($sql1);
	return $res;
    }
    
    function relevent_newsList($ssql){
	global $obj;
	$sql = "SELECT * FROM  news where eStatus = 'Active' $ssql ORDER BY dAddedDate DESC LIMIT 0,2";
        $result =$obj->MySQLSelect($sql);
	return $result; 
    }
    function myaccount_newsList($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  news where eStatus = 'Active'  ORDER BY dAddedDate DESC $var_limit";
	//echo $sql;exit; 
        $result =$obj->MySQLSelect($sql);
	return $result; 
    }
    
}

	

?>
