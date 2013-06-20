<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div class="desboard_body" id="services_boxinnerbg">
        <div class="public_pro_container">
                <div class="top_album_title">
                <div class="top_album_img">
                         {if $db_user[0].vProfileImage neq ''}
                        <img src="{$tconfig["tsite_upload_images_member"]}{$db_user[0].iMemberId}/2_{$db_user[0].vProfileImage}" alt="" width="70" height="56" />
                        {else}
                        <img src="{$tconfig["front_images"]}member_user.png" alt="" width="70" height="56"/>
                        {/if}
                </div>
                        <div class="album_name">{$db_user[0].vName}</div>
                        <div class="cl"></div>
                        <div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
                </div>
                <div class="myphoto_album_img">
                        <div class="QmeinContentPart PostInnerContentPart" style="padding:15px 0 0 22px">
                        {if $db_user[0].vProfileImage neq ''}
                        <div class="detail_left_part" style="float:left; width:225px;"><img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/2_{$db_user[0].vProfileImage}"" title="Status" width="150px;" height="150px;"/></div>
                        {else}
                       <div class="detail_left_part" style="float:left; width:225px;"><img src="{$tconfig["front_images"]}member_user.png" alt="" width="150px;" height="150px;"/></div>
                        {/if}
                        <div class="detail_right_part">
                                <div class="detail_top">
                                        <div class="member_l">QME Member:</div>
                                        <div class="member_r">{{$name}}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Description :</div>
                                        <div class="member_r">{{$db_status[0].vDescription}}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Date:</div>
                                        <div class="member_r">{{$db_status[0].dAddedDate}} </div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Type:</div>
                                        <div class="member_r">{{$db_status[0].eType}} </div>
                                </div>
                        </div>
                        </div>
                        <div class="cl"></div>
                </div>
        </div>
</div>

