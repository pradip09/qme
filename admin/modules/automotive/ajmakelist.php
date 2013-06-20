<?php

$makeId= $_REQUEST['makeId'];
$selectedmodel = $_REQUEST['selectedmodel'];

$sql1 =  "select imakeId from make where vMake='".$makeId."'";
$db_model = $obj->MySQLSelect($sql1);
$imakeIdmodel = $db_model[0]['imakeId'];

$sql =  "select * from model where imakeId='".$imakeIdmodel."'";
$db_automotivemodel = $obj->MySQLSelect($sql); 

if($makeId !=''){
    if(count($db_automotivemodel) > 0){
      $html = '';
  $html .= '<select name="Data[model]" id="model" class="select_input" title="Model" lang="*" style="width:220px;" >'; 
  $html .= '<option value="">----Select Model----</option>';
  for($i=0;$i<count($db_automotivemodel);$i++){
            if($iModelId == $db_automotivemodel[$i]['iModelId']){
                $selected = "selected";
            }else{
                $selected = "";
            }
            if($selectedmodel !=''){
                if($selectedmodel == $db_automotivemodel[$i]['vModel']){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
            }
            $html .= '<option value="'.$db_automotivemodel[$i]['vModel'].'" '.$selected.'>'.$db_automotivemodel[$i]['vModel'].'</option>';
        }
      $html .= '<select>';
    }else{
        $html .= '<select name="Data[model]" id="model" class="select_input">'; 
            $html .= '<option value="">----Select Model----</option>';
        $html .= '<select>';    
    } 
    
}else{
     $html .= '<select name="Data[model]" id="model" class="select_input">'; 
            $html .= '<option value="">----Select Model----</option>';
        $html .= '<select>';    
}
echo $html;exit;

?>
