<?php

$countryId= $_REQUEST['iCountryId'];
$selectedstate = $_REQUEST['selectedstate'];

$sql1 =  "select iCountryId from  country_master where iCountryId='".$countryId."'";
$db_statemaster = $obj->MySQLSelect($sql1);

$icountryIdstate = $db_statemaster[0]['iCountryId'];
$sql =  "select * from state_master where iCountryId='".$icountryIdstate."'";
$db_automotivestate = $obj->MySQLSelect($sql); 

if($countryId !=''){
    if(count($db_automotivestate) > 0){
      $html = '';
  $html .= '<select name="vState" id="vState" class="select_input" style="width:225px; height:30px;">'; 
  $html .= '<option value="select">--Select--</option>';
  for($i=0;$i<count($db_automotivestate);$i++){
            if($iStateId == $db_automotivestate[$i]['iStateId']){
                $selected = "selected";
            }else{
                $selected = "";
            }
            if($selectedstate !=''){
                if($selectedstate == $db_automotivestate[$i]['vState']){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
            }
            $html .= '<option value="'.$db_automotivestate[$i]['vState'].'" '.$selected.'>'.$db_automotivestate[$i]['vState'].'</option>';
        }
      $html .= '</select>';
    }else{
        $html .= '<select name="vState" id="vState" class="select_input" style="width:225px;height:30px;">'; 
            $html .= '<option value="select">--Select--</option>';
        $html .= '</select>';    
    } 
    
}else{
     $html .= '<select name="vState" id="vState" class="select_input" style="width:225px;height:30px;">'; 
            $html .= '<option value="select">--Select--</option>';
        $html .= '</select>';    
}
echo $html;exit;
?>
