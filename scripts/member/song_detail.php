<?php
    
$generalobj->checkFrontAuthntication();
$vMemberUrl = $_REQUEST['mamberurl'];
$iSongId = $_REQUEST['iSongId'];
 
    if($iSongId == '')
    {
         header("location:".$tconfig["tsite_url"]."/home");
    }else{
     
        $sql_user = "select * from members where vMemberUrl='".$vMemberUrl."'";
        $db_user = $obj->MySQLSelect($sql_user);
        $iMemberId = $db_user[0]['iMemberId'];
        
        $sql_song = "select * from song where iSongId = '".$iSongId."' AND eStatus = 'Active'";
        $db_song = $obj->MySQLSelect($sql_song);
        
        
        $db_song[0]['vCoverImage'] = $tconfig["tsite_upload_music_song"].$db_song[0]['iMemberId']."/".$db_song[0]['vCoverImage'];
        $member_name = "select * from members where iMemberId = '".$db_song[0]['iMemberId']."'";
        $db_membername = $obj->MySQLSelect($member_name);
        $name = $db_membername[0]['vName'];
        
        
        $sql_songcategory = "select * from song_album where iMemberId = '".$iMemberId."'";
        $db_songcategory = $obj->MySQLSelect($sql_songcategory);
        
    }
        
$smarty->assign("name", $name);
$smarty->assign("db_songcategory", $db_songcategory);
$smarty->assign("db_song", $db_song);
$smarty->assign("code", $vMemberUrl);
$smarty->assign("db_user", $db_user);


?>