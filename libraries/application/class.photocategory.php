<?php
class PhotoCategory
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
    
    function getPhotos($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  photo where $ssql $var_limit";
	//echo $sql;exit;
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    function getAllcategory($var_limit,$ssql){
	global $obj;
	$sql = "SELECT pc.*,count(ph.iPhotoCategoryId) AS count from photo_category AS pc LEFT JOIN photo AS ph ON(pc.iPhotoCategoryId =  ph.iPhotoCategoryId) where $ssql GROUP BY pc.iPhotoCategoryId $var_limit ";

	//$sql = "SELECT * FROM  post_job where eStatus='Active' $ssql $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }  
}
?>
