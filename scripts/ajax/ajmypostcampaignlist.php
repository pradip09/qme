<?php

$countryId= $_REQUEST['CountryId'];

$selectedstate = $_REQUEST['selectedstate'];
//$sql1 =  "select iCountryId from  country_master where vCountry='".$countryId."'";
//$db_statemaster = $obj->MySQLSelect($sql1);

//$icountryIdstate = $db_statemaster[0]['iCountryId'];
$sql =  "select * from state_master where iCountryId='".$countryId."'";
$db_postcqamp = $obj->MySQLSelect($sql); 

if($countryId !=''){
    if(count($db_postcqamp) > 0){
        $html = '';
        $html .= '<select name="iStateId" id="iStateId" class="inpuname" title="State" >'; 
        $html .= '<option value="">----Select State----</option>';
        for($i=0;$i<count($db_postcqamp);$i++){
              if($iStateId == $db_postcqamp[$i]['iStateId']){
                  $selected = "selected";
              }else{
                  $selected = "";
              }
              if($selectedstate !=''){
                  if($selectedstate == $db_postcqamp[$i]['iStateId']){
                      $selected = "selected";
                  }else{
                      $selected = "";
                  }
              }
              $html .= '<option value="'.$db_postcqamp[$i]['iStateId'].'" '.$selected.'>'.$db_postcqamp[$i]['vState'].'</option>';
          }
        $html .= '<select>';
      }else{
            $html .= '<select name="iStateId" id="iStateId" class="inpuname" >'; 
            $html .= '<option value="">----select State----</option>';
            $html .= '<select>';    
      } 
      
}else{
     $html .= '<select name="iStateId" id="iStateId" class="inpuname" >'; 
            $html .= '<option value="">----select State----</option>';
        $html .= '<select>';    
}
echo $html;exit;
?>
