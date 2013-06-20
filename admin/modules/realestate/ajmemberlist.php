<?php

$memberId= $_REQUEST['memberId'];
$selectedstore = $_REQUEST['selectedstore'];

$sql =  "select * from store where iMemberId='".$memberId."'";
$db_realestatestore = $obj->MySQLSelect($sql); 

if($memberId !=''){
    if(count($db_realestatestore) > 0){
      $html = '';
  $html .= '<select name="Data[iStoreId]" id="iStoreId" class="select_input" title="Store" lang="*" style="width:220px;" >'; 
  $html .= '<option value="">----Select Store----</option>';
  for($i=0;$i<count($db_realestatestore);$i++){
            if($iStoreId == $db_realestatestore[$i]['iStoreId']){
                $selected = "selected";
            }else{
                $selected = "";
            }
            if($selectedstore !=''){
                if($selectedstore == $db_realestatestore[$i]['iStoreId']){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
            }
            $html .= '<option value="'.$db_realestatestore[$i]['iStoreId'].'" '.$selected.'>'.$db_realestatestore[$i]['vStoreName'].'</option>';
        }
      $html .= '<select>';
    }else{
        $html .= '<select name="Data[iStoreId]" id="iStoreId" class="select_input">'; 
            $html .= '<option value="">----Select Store----</option>';
        $html .= '<select>';    
    } 
    
}else{
     $html .= '<select name="Data[iStoreId]" id="iStoreId" class="select_input">'; 
            $html .= '<option value="">----Select Store----</option>';
        $html .= '<select>';    
}
echo $html;exit;
?>
