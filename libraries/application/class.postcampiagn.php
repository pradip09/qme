

<?php
class PostCampiagn
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
    
    function getPostCampiagn($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  post_campaign where $ssql $var_limit";
	
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    function getAllPostCampiagn($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  post_campaign where $ssql $var_limit";
	//echo $sql;exit;
        
	//$sql = "SELECT * FROM  post_job where eStatus='Active' $ssql $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }  
}
?>
