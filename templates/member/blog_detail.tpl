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
                        <div class="detail_left_part" style="width: 333px;float: left;margin-right: 10px;"><img src="{$db_blogs[0].vImage}" title="blog" width="300px;" height="250px;"/></div>
                        <div class="detail_right_part" style="float:left;width: 499px;">
                                <div class="member_part">
                                        <div class="member_l">QME Member:</div>
                                        <div class="member_r"><a href="{$site_url}/{$memurl}" style="text-decoration: none;color: #676767;font-weight: bold;}">{$name}</a></div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Blog Title :</div>
                                        <div class="member_r">{{$db_blogs[0].vBlogTitle}}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Date:</div>
                                        <div class="member_r">{{$db_blogs[0].dCreateDate}} </div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Description:</div>
                                        <div class="member_r" style="text-align:justify;">{{$db_blogs[0].vText}} </div>
                                </div>
                        </div>
                        </div>
                        <div class="cl"></div>
                </div>
        </div>
</div>

