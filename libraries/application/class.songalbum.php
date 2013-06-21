

<?php
class SongCategory
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
    
    function getSongs($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  song where $ssql $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    function getAllsongalbums($var_limit,$ssql){
	global $obj;
	$sql = "SELECT sa.*,count(s.iSongAlbumId) AS count from song_album AS sa LEFT JOIN song AS s ON(sa.iSongAlbumId =  s.iSongAlbumId) where $ssql GROUP BY sa.iSongAlbumId $var_limit ";
	
	//$sql = "SELECT * FROM  post_job where eStatus='Active' $ssql $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }  
}
?>
