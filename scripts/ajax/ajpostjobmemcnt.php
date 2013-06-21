<?php
//echo "<pre>";
//print_r($_REQUEST);exit;

$skill=$_REQUEST['iSkillId'];
$relatedArr =  implode(",",$skill);
$iInterestId=$_REQUEST['iInterestId'];
$relatedinterest =  implode(",",$iInterestId);
$vOtherSkill=$_REQUEST['vSkill'];
$vOtherInterest=$_REQUEST['vOtherInterest'];
$iCountryId=$_REQUEST['iCountryId'];
$iStateId=$_REQUEST['iStateId'];
$vCity=$_REQUEST['vCity'];
$vZip=$_REQUEST['vZip'];
$vMile=$_REQUEST['vMile'];


$sql_country = "select * from country_master where iCountryId = '".$iCountryId."'";
$db_country = $obj->MySQLSelect($sql_country);
$country=$db_country[0]['vCountryCode'];
//echo  $country;exit;
$details=array();
$details = getLatLong($vZip,$country);
$Latitude =$details['Latitude'];
$Longitude =$details['Longitude'];
//print_r($details);

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

$sql_member = "select * from members  where (iSkillId IN (".$relatedArr.") OR  `vOtherSkill` = '".$vOtherSkill."') and (iInterestId IN (".$relatedinterest.") OR `vOtherInterest` = '".$vOtherInterest."') and iCountryId= ".$iCountryId." and iStateId=".$iStateId." and vCity='".$vCity."'";
$db_member = $obj->MySQLSelect($sql_member);
//print_r($db_member);

$mul_details=array();
for($i=0;$i<count($db_member);$i++)
{
$mulzip[]=$db_member[$i]['vZipCode'];
$mem_country[$i] =$db_member[$i]['iCountryId'];
//$mem_id[]=$db_member[$i]['iMemberId'];

$sql_country_one = "select * from country_master where iCountryId = '".$mem_country[$i]."'";
$db_country_one= $obj->MySQLSelect($sql_country_one);
$mulcountry[$i]=$db_country_one[0]['vCountryCode'];
$mul_details= getLatLongmul($mulzip[$i],$mulcountry[$i]);
$Latitudemul[]=$mul_details['Latitude'];
$Longitudemul[]=$mul_details['Longitude'];


}
//echo "<pre>";
//print_r($Latitudemul );exit;
function getLatLongmul($code,$mulcountry){
    //$mapsApiKey = 'REMOVED';
    //$query = "http://maps.google.co.in/maps/geo?q=".urlencode($code)."&output=json&key=".$mapsApiKey;
   //$mapsApiKey = 'your-google-maps-api-key';
   $query = "http://ws.geonames.org/postalCodeLookupJSON?formatted=true&postalcode=".urlencode($code)."&country=".$mulcountry."&style=full";
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


$cnt=0;
//$email=array();
if(isset($details['Longitude']) && isset($details['Latitude']) && ($Latitudemul) != '' && $Longitudemul != ''){
  for($i=0;$i<count($db_member);$i++){

     $sql="SELECT *,(((acos(sin((".$Latitude."*pi()/180)) * sin((".$Latitudemul[$i]."*pi()/180))+cos((".$Latitude."*pi()/180)) *  cos((".$Latitudemul[$i]."*pi()/180)) * cos(((".$Longitude." - ".$Longitudemul[$i].")*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` having distance<= ".$vMile." AND iMemberId = '".$db_member[$i]['iMemberId']."'";
//   SELECT *,(((acos(sin((40.298988*pi()/180)) * sin((40.261767*pi()/180))+cos((40.298988*pi()/180)) *  cos((40.261767*pi()/180)) * cos(((-76.847194 - -76.883079)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` having distance<= 5 AND iMemberId = '26'
   //$sql="SELECT acos(sin(".$Latitude.") * sin(".$Latitudemul.") + cos(".$Latitude.") * cos(".$Latitudemul.") * cos(".$Longitude." - (".$Longitudemul."))) as 'Distance' FROM members WHERE acos(sin(".$Latitude.") * sin(".$Latitudemul.") + cos(".$Latitude.") * cos(".$Latitudemul.") * cos(".$Longitude." - (".$Longitudemul."))) * 6371 ";
   
   $db_mem_count[]= $obj->MySQLSelect($sql);
   //$memberId[]=$db_mem_count[0]['iMemberId'];
   if(!empty($db_mem_count))
   {$cnt++;}
   else{
   
   }
 
  }
  
}

for($y=0;$y<count($db_mem_count);$y++){
    for($x=0;$x<count($db_mem_count[$y]);$x++){
	$memberId=$db_mem_count[$y][$x]['iMemberId'];
	//$memberId[]=$db_mem_count[0]['iMemberId'];
    $sql_top = "SELECT *  FROM members  where (iSkillId IN (".$relatedArr.") OR  `vOtherSkill` = '".$vOtherSkill."') and iMemberId=".$memberId.""; 
    $db_qmein_top[] = $obj->MySQLSelect($sql_top);

    }
  }


//echo count($db_qmein_top);exit;

$qmerecentcout=count($db_qmein_top);
//echo count($db_mem_count);exit;
$qmetotal=$cnt+$qmerecentcout;
$array=array($cnt,$qmerecentcout,$qmetotal);
echo json_encode($array);exit;



?>