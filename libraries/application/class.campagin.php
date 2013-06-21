<?php
class Campagin
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


function getAllFundCampaginList($var_limit,$ssql){
	global $obj;
	$ssql = "SELECT * FROM  fundraiser_campaign where eStatus='Active' $ssql order by iCampaignId DESC $var_limit";
	$result =$obj->MySQLSelect($ssql);
	return $result; 
    }
    function getCampaginList($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  post_campaign where eStatus='Active'  $ssql order by iCampaignId DESC $var_limit";
	//$sql = "SELECT *,pc.iCampaignId AS iCampaignId FROM  post_campaign pc inner join view_campaign vc ON (pc.iCampaignId = vc.iCampaignId) where pc.eStatus='Active' $ssql order by pc.iCampaignId DESC  $var_limit";
	//echo $sql;exit;
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
     function getAllCampaginList($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  post_campaign where eStatus='Active'  $ssql order by iCampaignId DESC $var_limit";
	//echo $sql;exit;
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
    function getAllJobList($var_limit,$ssql){
	global $obj;
	$sql = "SELECT * FROM  post_job where eStatus='Active'   $ssql $var_limit";
	
	$result =$obj->MySQLSelect($sql);
	return $result; 
    }
   
}

	

?>
