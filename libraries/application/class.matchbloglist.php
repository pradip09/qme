<?php
class matchbloglist
{
	function __construct()
	{
		global $obj;
	}

	/**
	*   @desc   DECONSTRUCTOR METHOD
	*/

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
    
    function relevent_matchbloglist($var_limit,$ssql,$iMemberId){
	global $obj;
	$sql = "SELECT * FROM  members ORDER BY dAddedDate DESC LIMIT 0,2";
        $result =$obj->MySQLSelect($sql);
	return $result; 
    }
    
}

	

?>
