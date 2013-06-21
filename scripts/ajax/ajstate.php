<?php

$iParentId = $_REQUEST['iParentId'];
$templatefile = $_REQUEST['templatefile'];
$iCategoryId = $_REQUEST['iCategoryId'];

if($_REQUEST['iCategoryId'] !=''){
    $iCategoryId = $_REQUEST['iCategoryId'];
}

if($iParentId !=''){
    $sql = "select * from categories where iParentId='".$iParentId."' AND eStatus='Active'";
    $dbchildcat = $obj->MySQLSelect($sql);
    if(count($dbchildcat) > 0){
      $html = '';
      if($templatefile == 'home'){
       $html .= '<select name="iCategoryId" id="iCategoryId" class="select_input">'; 
      }else{
        $html .= '<select name="iCategoryId" id="iCategoryId" class="select_input1">'; 
      }
      
        $html .= '<option value="">----Elija una Categoria----</option>';
        for($i=0;$i<count($dbchildcat);$i++){
            if($iCategoryId == $dbchildcat[$i]['iCategoryId']){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $html .= '<option value="'.$dbchildcat[$i]['iCategoryId'].'" '.$selected.'>'.$dbchildcat[$i]['vCategory'].'</option>';
        }
      $html .= '<select>';
    }else{
        if($templatefile == 'home'){
        $html .= '<select name="iCategoryId" id="iCategoryId" class="select_input">';
        }else{
            $html .= '<select name="iCategoryId" id="iCategoryId" class="select_input1">';
        }
        $html .= '<option value="">No Subcategor&iacute;a encontrados</option>';
        $html .= '<select>';
    }
}else{
    if($templatefile == 'home'){
        $html .= '<select name="iCategoryId" id="iCategoryId" class="select_input">';
        }else{
            $html .= '<select name="iCategoryId" id="iCategoryId" class="select_input1">';
        }
        $html .= '<option value="">No Subcategor&iacute;a encontrados</option>';
        $html .= '<select>';
}
echo $html;exit;
?>