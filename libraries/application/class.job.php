<?php
class PostJob
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
    
    function getJobList($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  post_job where eStatus='Active' $ssql ORDER BY `iPostJobId` DESC $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    function getAllJobList($var_limit,$ssql){
	global $obj;
	$sql = "SELECT p.*, a.vFirstName, a.vLastName, m.vName , m.vProfileImage FROM post_job p LEFT JOIN administrators a ON p.iAdminId = a.iAdminId LEFT JOIN  members m ON p.iMemberId = m.iMemberId where p.eStatus='Active' $ssql ORDER BY `iPostJobId` DESC $var_limit";
	//$sql = "SELECT * FROM  post_job where eStatus='Active' $ssql $var_limit";
	//echo $sql;
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    
    
}
?>
