<?php
class RecentActivity
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

    
    function getRecentActivity($var_limit,$ssql){
	global $obj;
	$sql = "select * from recent_activities AS rs LEFT JOIN members AS m ON(rs.iMemberId =  m.iMemberId) where $ssql ORDER BY dAddedDate DESC $var_limit";
	//echo $sql;exit;
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
     function getAllBlogList($var_limit,$ssql){
	global $obj;
	$sql = "SELECT b.* , bc.vBlogCategory AS vBlogCategory FROM  blog AS b LEFT JOIN blogcategory AS bc ON(b.iBlogCategoryId =  bc.iBlogCategoryId) where $ssql $var_limit";
	
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    
}

	

?>
