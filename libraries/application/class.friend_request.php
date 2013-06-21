<?php
class Friend_request
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

    
    function getPendingList($var_limit,$ssql){
	
	global $obj;
	$sql = "SELECT * FROM qme_friend AS qf LEFT JOIN members AS m ON(qf.iMemberId = m.iMemberId) where m.eStatus='Active' AND  $ssql $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    function myallfriend($var_limit,$ssql){
	
	global $obj;
	$sql = "SELECT *,qf.eStatus AS Status ,qf.dApproveDate AS ApproveDate FROM qme_friend AS qf LEFT JOIN members AS m ON(qf.iMemberId = m.iMemberId) where m.eStatus='Active' AND  $ssql $var_limit";
	$result =$obj->MySQLSelect($sql);
	//echo $sql;
	return $result; 
    }
    function recent_friendList($var_limit,$ssql){
	
	global $obj;
	$sql = "SELECT *,qf.eStatus AS Status ,qf.dApproveDate AS ApproveDate FROM qme_friend AS qf LEFT JOIN members AS m ON(qf.iMemberId = m.iMemberId) where m.eStatus='Active' AND  $ssql $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    
    

} 

?>
