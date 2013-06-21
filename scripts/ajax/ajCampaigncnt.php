<?php
//echo "<pre>";
//print_r($_REQUEST);


    
$iInterestId=$_REQUEST['iInterestId'];
$InterestArr =  implode(",",$iInterestId);
//$vIndustry =$_REQUEST['vIndustry'];
$iSkillId = implode(",",$_REQUEST['iSkillId']);
$iCountryId =$_REQUEST['iCountryId'];
$iStateId =$_REQUEST['iStateId'];
$vCity =$_REQUEST['vCity'];
$vZipCode =$_REQUEST['vZipCode'];
$vOtherInterest = $_REQUEST['vOtherinterest'];
$vOtherSkill=$_REQUEST['vOtherskill'];
//$vMileRadius =$_REQUEST['vMileRadius'];

$sql_country = "select * from country_master where iCountryId = '".$iCountryId."'";
$db_country = $obj->MySQLSelect($sql_country);
$country=$db_country[0]['vCountryCode'];
 
$details=array();
$details = getLatLong($vZipCode,$country);
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
//echo "<pre>";
//print_r($_REQUEST);
//SELECT *  FROM employee WHERE id > ANY (SELECT id     FROM title)
if($vOtherInterest == '' && $vOtherSkill == '' ){
   $sql_member = "select * from members  where  (iSkillId IN (".$iSkillId.")) and (iInterestId IN (".$InterestArr.")) and iCountryId= ".$iCountryId." and iStateId=".$iStateId." and vCity='".$vCity."'";
   $db_member = $obj->MySQLSelect($sql_member);
}else if($vOtherInterest != '' && $vOtherSkill != ''){
   $sql_member = "select * from members  where  (iSkillId IN (".$iSkillId.") OR  `vOtherSkill` = '".$vOtherSkill."') and (iInterestId IN (".$InterestArr.") OR `vOtherInterest` = '".$vOtherInterest."') and iCountryId= ".$iCountryId." and iStateId=".$iStateId." and vCity='".$vCity."'";
   $db_member = $obj->MySQLSelect($sql_member); 
}else if($vOtherInterest != '' && $vOtherSkill == ''){
   $sql_member = "select * from members  where  (iSkillId IN (".$iSkillId.")) and (iInterestId IN (".$InterestArr.") OR `vOtherInterest` = '".$vOtherInterest."') and iCountryId= ".$iCountryId." and iStateId=".$iStateId." and vCity='".$vCity."'";
   $db_member = $obj->MySQLSelect($sql_member); 
}else if($vOtherInterest == '' && $vOtherSkill != ''){
   $sql_member = "select * from members  where  (iSkillId IN (".$iSkillId.") OR  `vOtherSkill` = '".$vOtherSkill."') and (iInterestId IN (".$InterestArr.")) and iCountryId= ".$iCountryId." and iStateId=".$iStateId." and vCity='".$vCity."'";
   $db_member = $obj->MySQLSelect($sql_member);  
}

//echo "<pre>";
//print_r($sql_member);exit;
for($i=0;$i<count($db_member);$i++)
{
$mulzip[]=$db_member[$i]['vZipCode'];
$mem_country[$i] =$db_member[$i]['iCountryId'];
$sql_country_one = "select * from country_master where iCountryId = '".$mem_country[$i]."'";
$db_country_one= $obj->MySQLSelect($sql_country_one);
$mulcountry[$i]=$db_country_one[0]['vCountryCode'];
$mul_details=array();
$mul_details= getLatLongmul($mulzip[$i],$mulcountry[$i]);
$Latitudemul[]=$mul_details['Latitude'];
$Longitudemul[]=$mul_details['Longitude'];

}
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
if(isset($details['Longitude']) && isset($details['Latitude']) && ($Latitudemul) != '' && $Longitudemul != ''){
  for($i=0;$i<count($db_member);$i++){
     //$sql="SELECT *,(((acos(sin((".$Latitude."*pi()/180)) * sin((".$Latitudemul."*pi()/180))+cos((".$Latitude."*pi()/180)) *  cos((".$Latitudemul."*pi()/180)) * cos(((".$Longitude."- ".$Longitudemul.")*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` WHERE 'distance' <= '".$vMileRadius."' AND iMemberId = '".$db_member[$i]['iMemberId']."'";
      $sql="SELECT *,(((acos(sin((".$Latitude."*pi()/180)) * sin((".$Latitudemul[$i]."*pi()/180))+cos((".$Latitude."*pi()/180)) *  cos((".$Latitudemul[$i]."*pi()/180)) * cos(((".$Longitude." - ".$Longitudemul[$i].")*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` having distance<= 3 AND iMemberId = '".$db_member[$i]['iMemberId']."'";
     $db_mem_count= $obj->MySQLSelect($sql);
      $memberid[]=$db_mem_count[0]['iMemberId'];
      //$email[]=$db_mem_count[0]['vEmail'];
 //echo "<pre>";
 //print_r($sql);
 if(!empty($db_mem_count))
   {$cnt++;}
   else{
   
   }
  }
  
}//exit;
//echo "<pre>";
//print_r($email);
$count=0;
if(isset($details['Longitude']) && isset($details['Latitude']) && ($Latitudemul) != '' && $Longitudemul != ''){
  for($i=0;$i<count($db_member);$i++){
     //$sql="SELECT *,(((acos(sin((".$Latitude."*pi()/180)) * sin((".$Latitudemul."*pi()/180))+cos((".$Latitude."*pi()/180)) *  cos((".$Latitudemul."*pi()/180)) * cos(((".$Longitude."- ".$Longitudemul.")*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` WHERE 'distance' <= '".$vMileRadius."' AND iMemberId = '".$db_member[$i]['iMemberId']."'";
      $sql_out="SELECT *,(((acos(sin((".$Latitude."*pi()/180)) * sin((".$Latitudemul[$i]."*pi()/180))+cos((".$Latitude."*pi()/180)) *  cos((".$Latitudemul[$i]."*pi()/180)) * cos(((".$Longitude." - ".$Longitudemul[$i].")*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` having distance>= 3 AND iMemberId = '".$db_member[$i]['iMemberId']."'";
     $db_mem_count_out= $obj->MySQLSelect($sql_out);
      $memberrId[]=$db_mem_count_out[0]['iMemberId'];
      //$email[]=$db_mem_count_out[0]['vEmail'];
 if(!empty($db_mem_count_out))
   {$count++;}
   else{
   
   }
  }
  
}
//echo "<pre>";
//print_r($email);exit;
if($cnt > 0){
for($i=0;$i<$cnt;$i++){
$sql_email = "SELECT * FROM members u LEFT JOIN general_setting o ON ( u.iMemberId = o.iMemberId ) WHERE  u.iMemberId=".$memberid[$i]." AND `eSupportBusiness` =  'Yes' ";
$db_email[] = $obj->MySQLSelect($sql_email); 


}
}

if($count > 0){
for($i=0;$i<$count;$i++){
 $sql_emaill = "SELECT * FROM members u LEFT JOIN general_setting o ON ( u.iMemberId = o.iMemberId )  WHERE  u.iMemberId=".$memberrId[$i]." AND `eSupportBusiness` =  'Yes' ";
$db_emaill[] = $obj->MySQLSelect($sql_emaill); 


}
}
$biz=count($db_emaill);
$buzsup=count($db_email);
$buzsupport=$biz+$buzsup;
//echo $buzsupport;exit;
$qmetotal=$cnt+$buzsupport+$count;
$array=array($cnt,$count,$buzsupport,$qmetotal);
///print_r($array);exit;
echo json_encode($array);exit;

 /*$sql_email = "SELECT * FROM members u LEFT JOIN general_setting o ON ( u.iMemberId = o.iMemberId ) WHERE  `eSupportBusiness` =  'Yes'";
$db_email = $obj->MySQLSelect($sql_email);
$buzsupport=count($db_email);   */

?>