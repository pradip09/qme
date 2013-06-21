<?php
    $path = TPATH_SERVER_IMAGES_MEMBER;
    if(!is_dir($path."/banner_tmp/")){
        @mkdir($path."/banner_tmp/", 0777);
    }
    $moved = move_uploaded_file($_FILES["bannerImage"]["tmp_name"],$path."/banner_tmp/".$_FILES["bannerImage"]["name"]);
    $imgUploaded =$_FILES["bannerImage"]["name"];
    echo $imgUploaded; exit;
    
    
?>
