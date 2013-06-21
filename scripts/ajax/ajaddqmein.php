<?php
//echo "<pre>";
//print_r($_REQUEST);exit;
ob_clean();
include_once(TPATH_CLASS_GEN."class.sendmail.php");
$mailObj = new SendPHPMail();
$mode = $_REQUEST['mode'];
$iQmeInId = $_REQUEST['iQmeInId'];

    $iMemberId = $_SESSION['iUserId'];
    $Connect_With = $_REQUEST['Connect_With'];
    $vOtherInterest = $_REQUEST['vOtherInterest'];
    $vOtherSkill = $_REQUEST['vOtherSkill'];
    $iCountryId = $_REQUEST['iCountryId'];
    $iStateId = $_REQUEST['iStateId'];
    $iPointsWhenConnect = $_REQUEST['iPointsWhenConnect'];
    $vCity = $_REQUEST['vCity'];
    $vZip = $_REQUEST['vZip'];
    $vMile = $_REQUEST['vMile'];
    $eHideEvent= $_REQUEST['eHideEvent'];
    $inviteqmein = $_REQUEST['inviteqmein'];
    $iSkillId = implode(",",$_REQUEST['iSkillId']);
    $iInterestId = implode(",",$_REQUEST['iInterestId']);
    
$sql_country = "select * from country_master where iCountryId = '".$iCountryId."'";
$db_country = $obj->MySQLSelect($sql_country);
$country=$db_country[0]['vCountryCode'];   
 
$details=array();
$details = getLatLong($vZip,$country);
$Latitude =$details['Latitude'];
$Longitude =$details['Longitude'];

function getLatLong($code,$country){
   //$mapsApiKey = 'your-google-maps-api-key';
   $query = "http://ws.geonames.org/postalCodeLookupJSON?formatted=true&postalcode=".urlencode($code)."&country=".$country."&style=full";
   //http://ws.geonames.org/postalCodeLookupJSON?formatted=true&postalcode=NC%2011001&country=USA&style=full
   $data = file_get_contents($query);
   if($data)
   {
    
      $data = json_decode($data);
      $long = $data->postalcodes[0]->lng;
      $lat = $data->postalcodes[0]->lat;
      return array('Latitude'=>$lat,'Longitude'=>$long);   
   }
   else{
      return false;
   }

}


$sql_member = "select * from members  where (iSkillId IN (".$iSkillId.") OR  `vOtherSkill` = '".$vOtherSkill."') and (iInterestId IN (".$iInterestId.") OR `vOtherInterest` = '".$vOtherInterest."') and iCountryId= ".$iCountryId." and iStateId=".$iStateId." and vCity='".$vCity."'";
$db_member = $obj->MySQLSelect($sql_member);

	for($i=0;$i<count($db_member);$i++)
	{
	$mulzip[]=$db_member[$i]['vZipCode'];
	$mem_country[] =$db_member[$i]['iCountryId'];
	$sql_country_one = "select * from country_master where iCountryId = '".$mem_country[$i]."'";
	$db_country_one= $obj->MySQLSelect($sql_country_one);
	$mulcountry[$i]=$db_country_one[0]['vCountryCode'];
	$mul_details=array();
	$mul_details= getLatLongmul($mulzip[$i],$mulcountry[$i]);
	$Latitudemul[]=$mul_details['Latitude'];
	$Longitudemul[]=$mul_details['Longitude'];
	
	
	}
//echo "<pre>";
//print_r($Latitudemul);exit;
function getLatLongmul($code,$mulcountry){
    
   //$mapsApiKey = 'your-google-maps-api-key';
   $query = "http://ws.geonames.org/postalCodeLookupJSON?formatted=true&postalcode=".urlencode($code)."&country=".$mulcountry."&style=full";
   //http://ws.geonames.org/postalCodeLookupJSON?formatted=true&postalcode=NC%2011001&country=USA&style=full
   $data = file_get_contents($query);
    //echo "<pre>";
    //print_r($query);
   if($data)
   {
      $data = json_decode($data);
      $long = $data->postalcodes[0]->lng;
      $lat = $data->postalcodes[0]->lat;
      return array('Latitude'=>$lat,'Longitude'=>$long);   
   }
   else{
      return false;
   }

}

$cnt=0;
//$email=array();
if(isset($details['Longitude']) && isset($details['Latitude']) && ($Latitudemul) != '' && $Longitudemul != ''){
  for($i=0;$i<count($db_member);$i++){

     $sql="SELECT *,(((acos(sin((".$Latitude."*pi()/180)) * sin((".$Latitudemul[$i]."*pi()/180))+cos((".$Latitude."*pi()/180)) *  cos((".$Latitudemul[$i]."*pi()/180)) * cos(((".$Longitude." - ".$Longitudemul[$i].")*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` having distance<= ".$vMile." AND iMemberId = '".$db_member[$i]['iMemberId']."'";
//   SELECT *,(((acos(sin((40.298988*pi()/180)) * sin((40.261767*pi()/180))+cos((40.298988*pi()/180)) *  cos((40.261767*pi()/180)) * cos(((-76.847194 - -76.883079)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` having distance<= 5 AND iMemberId = '26'
   //$sql="SELECT acos(sin(".$Latitude.") * sin(".$Latitudemul.") + cos(".$Latitude.") * cos(".$Latitudemul.") * cos(".$Longitude." - (".$Longitudemul."))) as 'Distance' FROM members WHERE acos(sin(".$Latitude.") * sin(".$Latitudemul.") + cos(".$Latitude.") * cos(".$Latitudemul.") * cos(".$Longitude." - (".$Longitudemul."))) * 6371 ";
   
   $db_mem_count[]= $obj->MySQLSelect($sql);
   //echo "<pre>";
//print_r($db_mem_count);
   //$email[]=$db_mem_count[0]['vEmail'];
   
   if(!empty($db_mem_count))
   {$cnt++;}
   else{
   
   }
 
  }
  
}

//echo "<pre>";
//print_r($memberId);exit;
  

    $dAddedDate = date('Y-m-d H:i:s');
    $Data = array(
        'iMemberId'=>$iMemberId,
        'Connect_With'=>$Connect_With,
        'iSkillId'=>$iSkillId,
	'iInterestId'=>$iInterestId,
	'vOtherSkill'=>$vOtherSkill,
	'vOtherInterest'=>$vOtherInterest,
	'vCity'=>$vCity,
	'iCountryId'=>$iCountryId,
        'iStateId'=>$iStateId,
        'vZip'=>$vZip,
	'vMile'=>$vMile,
	'dAddedDate'=>$dAddedDate,
        'iPointsWhenConnect'=>$iPointsWhenConnect,
	'eStatus'=>'Active'
        
    );
    
    $sql_user_qme = "select * from members where  iMemberId='".$iMemberId."' ";
    $db_user_qme = $obj->MySQLSelect($sql_user_qme);
    //echo "<pre>";
    //print_r($db_user_qme);
    for($y=0;$y<count($db_mem_count);$y++){
    for($x=0;$x<count($db_mem_count[$y]);$x++){
	$memberId=$db_mem_count[$y][$x]['iMemberId'];
	//$memberId[]=$db_mem_count[0]['iMemberId'];
    $sql_top = "SELECT m. * , MAX( iRecentActivityId ) FROM members m LEFT JOIN recent_activities r ON ('m.iMemberId = r.iMemberId') where m.iMemberId=".$memberId." GROUP BY iMemberId ORDER BY iRecentActivityId DESC  LIMIT 0 , 50"; 
    $db_qmein_top[] = $obj->MySQLSelect($sql_top);

    }
  }


    //$sql_top = "SELECT m. * , MAX( iRecentActivityId ) FROM members m INNER JOIN recent_activities r ON ( m.iMemberId = r.iMemberId )  GROUP BY iMemberId ORDER BY iRecentActivityId DESC  LIMIT 0 , 50"; 
    //$db_qmein_top = $obj->MySQLSelect($sql_top);
      
    $memid=array();
    if($mode == "add")
    {
	
    $id = $obj->MySQLQueryPerform("qmein",$Data,'insert');
    $newId = $id;
    
    if($eHideEvent =='Yes' ){
	
	for($y=0;$y<count($db_mem_count);$y++){
	for($x=0;$x<count($db_mem_count[$y]);$x++){
	$memid=$db_mem_count[$y][$x]['iMemberId'];
	$email_to=$db_mem_count[$y][$x]['vEmail'];
	$NAME= $db_mem_count[$y][$x]['vName'];
	$sql_qme_co = "select * from qmein where  iMemberId='".$memid."' ";
	$db_qme_conwth = $obj->MySQLSelect($sql_qme_co);
	$CON= $db_qme_conwth[$x]['Connect_With'];
	$memberurl= $db_user_qme[0]['vMemberUrl'];
	$user=$db_user_qme[0]['vName'];
	$url = $site_url.'/qmeconn_detail/'.$memberurl.'/'.$id;
	//$email_to="bamadeb.upadhyaya@php2india.com";
	if($iMemberId != $memid){
	$body_arr = Array("#NAME#","#USER#","#SITE_URL#","#CON_WITH#","#MAIL_FOOTER#");
	$post_arr = Array($NAME,$user,$url,$CON,$MAIL_FOOTER);
	$mailObj->Send("CONNECT_WITH","Member",$email_to,$body_arr,$post_arr);
	}
	
	}
	}
    }
    if($inviteqmein =='Yes'){
	
	for($y= 0; $y < count($db_qmein_top); $y++){
	for($x=0;$x<count($db_qmein_top[$y]);$x++){
	$memid= $db_qmein_top[$y][$x]['iMemberId'];
        $sql_qme_conn = "select * from qmein where  iMemberId='".$memid."' ";
	$db_qme_conn = $obj->MySQLSelect($sql_qme_conn);
	$memberurl= $db_user_qme[0]['vMemberUrl'];
	$user=$db_user_qme[0]['vName'];
	$url = $site_url.'/qmeconn_detail/'.$memberurl.'/'.$id;
	$NAME= $db_qmein_top[$y][$x]['vName'];
	//$email_to="bamadeb.upadhyaya@php2india.com";
	$email_to=$db_qmein_top[$y][$x]['vEmail'];
	$CON= $db_qme_conn[$x]['Connect_With'];
	if($iMemberId != $memid){
	$body_arr = Array("#NAME#","#USER#","#SITE_URL#","#CON_WITH#","#MAIL_FOOTER#");
	$post_arr = Array($NAME,$user,$url,$CON,$MAIL_FOOTER);
	$mailObj->Send("CONNECT_WITH","Member",$email_to,$body_arr,$post_arr);
	}
	}
	}
    }
    
    //Twitter Status Update Start
	$twUploadType = 'CONNECTIONS';
	$twQmeconId = $newId;
	include TPATH_ROOT.'/twitter/postOnTwitter.php'; 
	//Twitter Status Update End
	
    //Facebook Status Update Start
	$fbUploadType = 'CONNECTIONS';
	$fbQmeconId = $newId;
	include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php'; 
   //Facebook Status Update End
    
    if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
	$Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'QmeIn';
	$Recent['iTypeId'] = $id;
	$Recent['vDescription'] = $_SESSION['Name'].' added new QME Connections.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['Connect_With'];
	$id1 = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
   
    }else
    {
        $iQmeInId = $_REQUEST['iQmeInId'];
	$where = " iQmeInId = '".$iQmeInId."'";
        $id1 = $obj->MySQLQueryPerform("qmein",$Data,'update',$where);
	if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
	$Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'QmeIn';
	$Recent['iTypeId'] = $iQmeInId;
	$Recent['vDescription'] = $_SESSION['Name'].' updated QME Connections.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['Connect_With'];
        $id1 = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
    }
     
    if($id1){$var_msg = "success";}
    else{$var_msg = 'Error';}
    echo $var_msg; exit;
    
    
    
?>

