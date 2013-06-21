<?php
class Store
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
    
    function getStoreList($var_limit,$ssql){
	global $obj;
	$sql = "SELECT sa.*,count(s.iStoreId) AS count from store AS sa LEFT JOIN product_general_item AS s ON(sa.iStoreId =  s.iStoreId) where $ssql GROUP BY sa.iStoreId $var_limit ";
	$result = $obj->MySQLSelect($sql);
	return $result;
    }
    function geStore($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  store where $ssql $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result; 	
	
    }
    function getProductList($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM product_general_item where eStatus='Active' $ssql ORDER BY iProductId $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    function getClothingProductList($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM product_clothing_accessories where eStatus='Active' $ssql ORDER BY iProductId $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    function getAutomotiveProductList($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  product_automotive where eStatus='Active' $ssql ORDER BY iProductId $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result;
    }
    function getRealestateProductList($var_limit,$ssql){
	global $obj;
	$sql = "SELECT r.*,p.vPropertyType FROM product_real_estate r LEFT JOIN real_estate_property p  ON r.iPropertyTypeId = p.iPropertyTypeId where r.eStatus='Active' $ssql ORDER BY iProductId $var_limit";
	$result =$obj->MySQLSelect($sql);
	return $result;
    }  
}
?>