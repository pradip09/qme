

<?php
class QmeIn
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
    
    function getQmeIn($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  qmein where $ssql $var_limit";
	
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    function getAllpostjobs($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  post_job where $ssql $var_limit";
	
        
	//$sql = "SELECT * FROM  post_job where eStatus='Active' $ssql $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }  
}
?>
