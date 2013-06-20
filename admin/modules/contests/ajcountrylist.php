<?php

$countryId= $_REQUEST['countryId'];
$selectedstate = $_REQUEST['selectedstate'];
$sql =  "select * from state_master where iCountryId='".$countryId."'";
$db_realestatestate = $obj->MySQLSelect($sql); 

if($countryId !=''){
    if(count($db_realestatestate) > 0){
      $html = '';
  $html .= '<select name="Data[iStateId]" id="iStateId" class="select_input" title="State" lang="*" style="width:227px;" onchange="getStates(this.value)">'; 
  $html .= '<option value="">--Select State--</option>';
  for($i=0;$i<count($db_realestatestate);$i++){
            if($iStateId == $db_realestatestate[$i]['iStateId']){
                $selected = "selected";
            }else{
                $selected = "";
            }
            if($selectedstate !=''){
                if($selectedstate == $db_realestatestate[$i]['iStateId']){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
            }
            $html .= '<option value="'.$db_realestatestate[$i]['iStateId'].'" '.$selected.'>'.$db_realestatestate[$i]['vState'].'</option>';
        }
      $html .= '<select>';
    }else{
        $html .= '<select name="Data[iStateId]" id="iStateId" class="select_input" title="State" lang="*" style="width:227px;" onchange="getStates(this.value)">'; 
            $html .= '<option value="">--Select State--</option>';
        $html .= '<select>';    
    } 
    
}else{
     $html .= '<select name="Data[iStateId]" id="iStateId" class="select_input" style="width:227px;" onchange="getStates(this.value)">'; 
            $html .= '<option value="">--Select State--</option>';
        $html .= '<select>';    
}
echo $html;exit;
?>
