<?php
class BlogList
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

    
    function getBlogList($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  post_campaign where eStatus='Active' $ssql $var_limit";
	//echo $sql;
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
