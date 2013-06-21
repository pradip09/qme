<?php
class Promotion
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

    
    function getPromotionList($var_limit,$ssql){
	
	global $obj;
	$sql = "SELECT * FROM products where eStatus='Active' AND ePromotion='Yes' $ssql $var_limit";
	//echo $sql;
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    
    

} 

?>
