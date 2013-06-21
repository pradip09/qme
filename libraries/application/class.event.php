<?php
class Event
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

    
    function getEventList($var_limit,$ssql,$iMemberId){
	global $obj;
	$sql = "SELECT * FROM  events where iMemberId='".$iMemberId."' $ssql $var_limit";
	//echo $sql;
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    
}

	

?>
