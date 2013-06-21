<?php
class publicprofile
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

    function recent_imgs($iMemberId){
	global $obj;
	$sql1 = "SELECT vProfileImage FROM  members where iMemberId='".$iMemberId."'";
	$res =$obj->MySQLSelect($sql1);
	return $res;
    }
    
    function recent_activitiesList($var_limit,$ssql,$iMemberId){
	global $obj;
	$sql = "SELECT * FROM  recent_activities r left join members m ON (r.iMemberId=m.iMemberId) where iType != 'Private' AND m.iMemberId='".$iMemberId."' $ssql order by r.iRecentActivityId DESC $var_limit";
	//echo  $sql;exit;
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    
}

	

?>
