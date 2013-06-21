<?php

    $generalobj->checkFrontAuthntication();
    $songid = $_REQUEST['songid'];
    $iMemberId    = $_SESSION['iUserId'];
    if($songid == 'add')
    {
        $mode = 'add';
        
    }else{
	$sql_music = "select * from song where iSongId='".$songid."' AND iMemberId = '".$iMemberId."'";
        $db_music = $obj->MySQLSelect($sql_music);
        $mode = 'edit';
    }
    $sql_songcategory = "select * from song_album where iMemberId = '".$iMemberId."'";
    $db_songcategory = $obj->MySQLSelect($sql_songcategory);
    $sql_genre = "Select * from song_genre";
    $db_genre = $obj->MySQLSelect($sql_genre);



    $smarty->assign("mode",$mode);
    $smarty->assign("iMemberId",$iMemberId);
    $smarty->assign("db_songcategory",$db_songcategory);
    $smarty->assign("db_music",$db_music);
    $smarty->assign("db_genre", $db_genre);

?>