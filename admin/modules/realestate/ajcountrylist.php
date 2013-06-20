<?php

$countryId= $_REQUEST['countryId'];
$selectedstate = $_REQUEST['selectedstate'];

$sql1 =  "select iCountryId from  country_master where vCountry='".$countryId."'";
$db_statemaster = $obj->MySQLSelect($sql1);
$icountryIdstate = $db_statemaster[0]['iCountryId'];

$sql =  "select * from state_master where iCountryId='".$icountryIdstate."'";
$db_realestatestate = $obj->MySQLSelect($sql); 

if($countryId !=''){
    if(count($db_realestatestate) > 0){
      $html = '';
  $html .= '<select name="Data[vState]" id="vState" class="select_input" title="State" lang="*" style="width:220px;" >'; 
  $html .= '<option value="">----Select State----</option>';
  for($i=0;$i<count($db_realestatestate);$i++){
            if($iStateId == $db_realestatestate[$i]['iStateId']){
                $selected = "selected";
            }else{
                $selected = "";
            }
            if($selectedstate !=''){
                if($selectedstate == $db_realestatestate[$i]['vState']){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
            }
            $html .= '<option value="'.$db_realestatestate[$i]['vState'].'" '.$selected.'>'.$db_realestatestate[$i]['vState'].'</option>';
        }
      $html .= '<select>';
    }else{
        $html .= '<select name="Data[vState]" id="vState" class="select_input">'; 
            $html .= '<option value="">----select State----</option>';
        $html .= '<select>';    
    } 
    
}else{
     $html .= '<select name="Data[vState]" id="vState" class="select_input">'; 
            $html .= '<option value="">----select State----</option>';
        $html .= '<select>';    
}
echo $html;exit;
?>
