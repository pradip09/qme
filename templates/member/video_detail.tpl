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
                                <div id="displayboxdiv"></div>
                                <div class="detail_left_part" style="float:left; width:230px;">
                                              <div id="displayboxdiv{$db_video[0].iVideoId}" class="VedioImg" style="float:left;">
                                                 <a href="javascript:void(0);">
                                                 <img src="{$db_video[0].vImage}" width="213px;" height="131px;" class="transperent_video" onclick="playvideo('{$db_video[0].iVideoId}','{$db_video[0].vVideo}','{$db_video[0].iMemberId}')"/>
                                                 <div class="cl"></div>
                                                 </a>
                                </div>
                                </div>
                        <div class="detail_right_part">
                               <div class="detail_top">
                                        <div class="member_l">QME Member:</div>
                                        <div class="member_r">{{$name}}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Video Title:</div>
                                        <div class="member_r">{{$db_video[0].vVideoName}}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Video Category:</div>
                                        <div class="member_r">{{$db_videocategory[0].vVideoAlbum}}</div>
                                </div>
                        </div>
                        </div>
                        <div class="cl"></div>
                </div>
        </div>
</div>

{literal}
<script type="text/javascript">
function playvideo(id,file,userId)
{
						
 var html = '';
	    
	    html = '<embed src="{/literal}{$tconfig["tsite_music"]}/player.swf{literal}" height="133" width="213" allowscriptaccess="always" allowfullscreen="true" flashvars="&controlbar=over&file={/literal}{$tconfig["tsite_upload_images_video"]}{literal}'+userId+'/'+file+'&plugins=sharing-2"/>';
	    $('#displayboxdiv'+id).html(html);
}
</script>
{/literal}