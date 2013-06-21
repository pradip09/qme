<?php

$mode = $_POST['mode'];
$iStoreId=$_POST['iStoreId'];
$path = TPATH_SERVER_IMAGES_STORE;

$Data = array();
$memberId = $_SESSION['iUserId'];
$Data['iStoreId']=$iStoreId;
$Data['vStoreName'] =$_POST['vStoreName'];
$Data['iMemberId'] = $memberId ;


if($mode == "add")
{       
      $id = $obj->MySQLQueryPerform("store",$Data,'insert');
     //$iStoreId= $id;
    if(!is_dir($path."/".$id)){
        @mkdir($path."/".$id, 0777);
    }
    
$_FILES['vImage'] = $_FILES['vStoreImage'];
if ($_FILES['vImage']['name'] != "") {
    
    $PARAM_ARRAY = array
        (
         "TARGET_DIR" =>$path."/".$id."/",
                array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                array('WIDTH_HEIGHT' => "128X110", 'PREFIX' => "1"),
                array('WIDTH_HEIGHT' => "128X115", 'PREFIX' => "2")
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
        if($image !=''){ $Data['vStoreImage'] = $image; }
        
            $where = " iStoreId = '".$id."'";
	    $Data['iStoreId']=$id;
       $id = $obj->MySQLQueryPerform("store",$Data,'update',$where);
       
  }
	exit; 
    
    }
        
if($mode == 'edit')
{
    
        $storeid = $Data['iStoreId'];
        if(!is_dir($path."/".$storeid)){
        @mkdir($path."/".$storeid, 0777);
    }

if ($_FILES['vStoreImage']['name'] != "") {
    
    $PARAM_ARRAY = array
        (
         "TARGET_DIR" =>$path."/".$storeid,
                array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                array('WIDTH_HEIGHT' => "128X110", 'PREFIX' => "1"),
                array('WIDTH_HEIGHT' => "128X115", 'PREFIX' => "2")
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vStoreImage']);
        if($image !=''){ $Data['vStoreImage'] = $image; }
         if($image !=''){
		    $Data['vStoreImage'] = $image;
		    unlink(TPATH_SERVER_IMAGES_STORE."/".$storeid."/1_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE."/".$storeid."/".$_POST['vOldImage']);
		}
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vStoreImage'] = addslashes($_POST['vOldImage']);
		}
	}
        $where = " iStoreId = '".$iStoreId."'";
        $id = $obj->MySQLQueryPerform("store",$Data,'update',$where);
	
	exit; 
    }  
 
?>