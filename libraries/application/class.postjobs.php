

<?php
class PostJobs
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
    
    function getPostJobs($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  song where $ssql $var_limit";
	
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
