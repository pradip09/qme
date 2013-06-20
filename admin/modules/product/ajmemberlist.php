<?php

$memberId= $_REQUEST['memberId'];
#echo $memberId; exit;
$selectedstore = $_REQUEST['selectedstore'];
#echo "<pre>";
#print_r ($makeId);exit;
#$sql1 =  "select * from  members where iMemberId ='".$memberId."'";
#$db_stores = $obj->MySQLSelect($sql1);

#$imemberIdstore = $db_stores[0]['iMemberId'];
$sql =  "select * from store where iMemberId='".$memberId."'";
$db_generalstore = $obj->MySQLSelect($sql); 

#echo "<pre>";
#print_r ($db_automotivestore);exit;

if($memberId !=''){
    if(count($db_generalstore) > 0){
      $html = '';
  $html .= '<select name="Data[iStoreId]" id="iStoreId" class="select_input" title="Store" lang="*" style="width:220px;" >'; 
  $html .= '<option value="">----Select Store----</option>';
  for($i=0;$i<count($db_generalstore);$i++){
            if($iStoreId == $db_generalstore[$i]['iStoreId']){
                $selected = "selected";
            }else{
                $selected = "";
            }
            if($selectedstore !=''){
                if($selectedstore == $db_generalstore[$i]['iStoreId']){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
            }
            $html .= '<option value="'.$db_generalstore[$i]['iStoreId'].'" '.$selected.'>'.$db_generalstore[$i]['vStoreName'].'</option>';
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
