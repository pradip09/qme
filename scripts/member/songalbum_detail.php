<?php

$generalobj->checkFrontAuthntication();
$vMemberUrl = $_REQUEST['mamberurl'];
$iSongAlbumId = $_REQUEST['iSongalbumId'];
        
    if($iSongAlbumId == '')
    {
         header("location:".$tconfig["tsite_url"]."/home");
    }else{
     
        $sql_user = "select * from members where vMemberUrl='".$vMemberUrl."'";
        $db_user = $obj->MySQLSelect($sql_user);
        $iMemberId = $db_user[0]['iMemberId'];
        
        $sql_songalb = "select * from song_album where iSongAlbumId = '".$iSongAlbumId."' AND eStatus = 'Active'";
        $db_songalbum = $obj->MySQLSelect($sql_songalb);
        $db_songalbum[0][dAddedDate]=date("m-d-Y",strtotime($db_songalbum[0][dAddedDate]));
        
        $db_songalbum[0]['vImage'] = $tconfig["tsite_upload_music_song"].$db_songalbum[0]['iMemberId']."/".$db_songalbum[0]['vImage'];
        $member_name = "select * from members where iMemberId = '".$db_songalbum[0]['iMemberId']."'";
        $db_membername = $obj->MySQLSelect($member_name);
        $name = $db_membername[0]['vName'];
    }
        
$smarty->assign("name", $name);
$smarty->assign("db_songalbum", $db_songalbum);
$smarty->assign("code", $vMemberUrl);
$smarty->assign("db_user", $db_user);


?>