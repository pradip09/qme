<?php
class Country
{
	function __construct()
	{
		global $obj;
	}
	function __destruct()
	{
		unset($this->_obj);
	}

    function getStateList($ssql){
	global $obj;
	$sql = "SELECT * FROM  state_master where eStatus='Active' $ssql $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
}
?>
