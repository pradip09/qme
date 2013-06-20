<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div class="desboard_body" id="services_boxinnerbg">
        <div class="public_pro_container">
                <div class="top_album_title">
                <div class="top_album_img">
                        <img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/2_{$db_user[0].vProfileImage}" alt="" width="70" height="56" />
                </div>
                        <div class="album_name">{$db_user[0].vName}</div>
                        <div class="cl"></div>
                        <div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
                </div>
                <div class="myphoto_album_img">
                        <div class="QmeinContentPart PostInnerContentPart" style="padding:15px 0 0 22px">
                        <div class="detail_left_part" style="float:left; width:165px;"><img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/2_{$db_user[0].vProfileImage}" title="Song" width="150px" height="150px"/></div>
                        <div class="detail_right_part">
                                 <div class="detail_top">
                                        <div class="member_l">QME Member:</div>
                                        <div class="member_r">{{$name}}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Song Title:</div>
                                        <div class="member_r"> {{$db_song[0].vSongTitle}}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Song Category:</div>
                                        <div class="member_r"> {{$db_songcategory[0].vSongAlbum}}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Song:</div>
                                        <div class="member_r">
                                                {if $db_song[0].vSong neq ''}
								<div id="displaydiv{$db_song[0].iSongId}" style="float:left; padding-top:1px;">
								<a href="#"><img src="{$tconfig["front_images"]}play-icon.png" onclick="playmusic('{$db_song[0].iSongId}','{$db_song[0].vSong}','{$db_song[0].iMemberId}')"/></a>
								<div class="playicon"></div>
						{/if}
                                        </div>
                                </div>
                        </div>
                                
                        </div>
                        </div>
                        <div class="cl"></div>
                </div>
        </div>
</div>

{literal}
<script>
function playmusic(id,file,userId)
{
						
 var html = '';
	    html += '<object type="application/x-shockwave-flash" data="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" width="200" height="20" id="dewplayer" name="dewplayer">';
	    html += '<param name="wmode" value="transparent" />';
	    html += '<param name="movie" value="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" />';
	    html += '<param name="flashvars" value=" mp3={/literal}{$tconfig["tsite_upload_music_song"]}{literal}/'+userId+'/'+file+'&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />';
	    html += '</object>';
	    $('#displaydiv'+id).html(html);
}
</script>
{/literal}