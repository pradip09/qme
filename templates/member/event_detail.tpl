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
                        <div class="detail_left_part" style="float:left; width:225px;"><img src="{$db_event[0].vEventImage}" title="event image" width="200px;" height="200px;"/></div>
                        <div class="detail_right_part">
                                <div class="member_part" style="padding-top:0px;">
                                        <div class="member_l">QME Member:</div>
                                        <div class="member_r">{{$name}}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Event Title :</div>
                                        <div class="member_r">{{$db_event[0].vTitle}}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Event Location :</div>
                                        <div class="member_r">{{$db_event[0].vLocation}}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Event Skill:</div>
                                        <div class="member_r">{section name=i loop=$db_skillevent} {{$db_skillevent[i].vSkill}}, {/section}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Event Interest :</div>
                                        <div class="member_r">{section name=i loop=$db_interestevent} {{$db_interestevent[i].vInterest}}, {/section}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Date:</div>
                                        <div class="member_r">{{$db_event[0].dEventDate}} </div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Description:</div>
                                        <div class="member_r">{{$db_event[0].vDescription}}</div>
                                </div>
                        </div>
                        </div>
                        <div class="cl"></div>
                </div>
        </div>
</div>

