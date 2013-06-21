<?php
class Faq
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

    
    function getFaqList($var_limit,$ssql){
        global $obj;
	$sql = "SELECT * FROM faq where eStatus='Active' $ssql $var_limit";
	//echo $sql;
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    function getNewProduct($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM products  $ssql ORDER BY RAND()";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    function getExclusiveProduct($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM products $ssql ORDER BY RAND()";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
	    
	function getPromotioinProduct($var_limit,$ssql){
	    global $obj;
	    $sql = "SELECT * FROM products $ssql ORDER BY RAND()";
	    $result =$obj->MySQLSelect($sql);
	    return $result; 
	}
	
	function getCategoryList($var_limit,$ssql){
		global $obj;
		$sql = "SELECT * FROM categories  where eStatus='Active' $ssql $var_limit";
		$result =$obj->MySQLSelect($sql);
		return $result; 
	}
}
	

?>
