<?php
class VideoCategory
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
    
    function getVideos($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  video where $ssql $var_limit";
	
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    function getAllvideoalbums($var_limit,$ssql){
	global $obj;
	$sql = "SELECT va.*,count(v.iVideoAlbumId) AS count from video_album AS va LEFT JOIN video AS v ON(va.iVideoAlbumId =  v.iVideoAlbumId) where $ssql GROUP BY va.iVideoAlbumId $var_limit ";
	
	//$sql = "SELECT * FROM  post_job where eStatus='Active' $ssql $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }  
}
?>
