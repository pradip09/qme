<?php
    $path = TPATH_SERVER_IMAGES_MEMBER;
    $memberId = $_SESSION['iUserId'];

    if(!is_dir($path."/".$memberId)){
        @mkdir($path."/".$memberId, 0777);
    }
    
    
    $sql_banner = "SELECT * FROM banner_image  WHERE iMemberId='".$memberId."'";	
    $db_banner = $obj->MySQLSelect($sql_banner);
    
    for($i=0;$i<count($db_banner);$i++){
            
            if(!in_array($db_banner[$i]['vBannerImage'],$_POST['vOldBanner'])){    
                unlink($path."/".$memberId."/".$db_banner[$i]['vBannerImage']);
            }        
    }
    $where = "iMemberId='".$memberId."'";
    $sql_banner_dlt="Delete from banner_image where ".$where; 
    $res=$obj->sql_query($sql_banner_dlt);
    
    
    for($i=0;$i<$_POST['totcount'];$i++)
    {
        if($_POST['vOldBanner'][$i] =='' && $_FILES['banner']['name'][$i] !='')
        {
            if(!is_dir($path."/".$memberId)){
                @mkdir($path."/".$memberId, 0777);
            }
            
            $PARAM_ARRAY = array
                    (
                     "TARGET_DIR" =>$path."/".$memberId,
                            array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => '')
                     );
            $_FILES['banner'][$i] = array(
                                           "name"=>$_FILES['banner']['name'][$i],
                                           "type"=>$_FILES['banner']['type'][$i],
                                           "tmp_name"=>$_FILES['banner']['tmp_name'][$i],
                                           "error"=>$_FILES['banner']['error'][$i],
                                           "size"=>$_FILES['banner']['size'][$i]
                                           );
           $imagegal=$generalobj->import($PARAM_ARRAY, $_FILES['banner'][$i]);
       
           if($imagegal !=''){
                   $Data_gal['vBannerImage'] = $imagegal;
           }
           $Data_gal['iMemberId'] = $memberId;
           $ban = $obj->MySQLQueryPerform("banner_image",$Data_gal,'insert');
           #if($ban) echo "cnd1";
        }
        
        elseif($_POST['vOldBanner'][$i] !='' && $_FILES['banner']['name'][$i] !='')
        {
            $PARAM_ARRAY = array
            (
             "TARGET_DIR" =>$path."/".$memberId,
                    array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => '')
             );
             $_FILES['banner'][$i] = array(
                                            "name"=>$_FILES['banner']['name'][$i],
                                            "type"=>$_FILES['banner']['type'][$i],
                                            "tmp_name"=>$_FILES['banner']['tmp_name'][$i],
                                            "error"=>$_FILES['banner']['error'][$i],
                                            "size"=>$_FILES['banner']['size'][$i]
                                            );

            $imagegal=$generalobj->import($PARAM_ARRAY, $_FILES['banner'][$i]);
            unlink($path."/".$memberId."/".$_POST['vOldBanner'][$i]);
            if($imagegal !=''){
                    $Data_gal['vBannerImage'] = $imagegal;
            }
            $Data_gal['iMemberId'] = $memberId;
            $ban = $obj->MySQLQueryPerform("banner_image",$Data_gal,'insert');
            #if($ban) echo "cnd2";
        }
        elseif($_POST['vOldBanner'][$i] !='' && $_FILES['banner']['name'][$i] =='')
        {
            $Data_gal['vBannerImage'] = $_POST['vOldBanner'][$i];
            $Data_gal['iMemberId'] = $memberId;
            $ban = $obj->MySQLQueryPerform("banner_image",$Data_gal,'insert');
            #if($ban) echo "cnd3";
        }
    }
    
    #exit;
    if($ban){
        echo "Banners Uploaded Successfully";
    }
    else{
        echo "There is an error in uploading banners";
    }
    
?>