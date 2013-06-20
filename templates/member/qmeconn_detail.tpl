<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div class="desboard_body" id="services_boxinnerbg">
        <div class="public_pro_container">
                <div class="top_album_title">
                <div class="top_album_img">
                        <img src="{$tconfig["tsite_upload_images_member"]}{$db_user[0].iMemberId}/2_{$db_user[0].vProfileImage}" alt="" width="70" height="56" />
                </div>
                        <div class="album_name">{$db_user[0].vName}</div>
                        <div class="cl"></div>
                        <div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
                </div>
                <div class="myphoto_album_img">
                       <div class="OppurtunitiesReaptBox" style="margin-left:89px;width:684px;">
                        <div class="QmeinContentPart PostInnerContentPart" style="padding:15px 0 0 22px">
                        <div class="detail_left_part" style="float:left; width:225px;"><img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/2_{$db_user[0].vProfileImage}" title="Qme connection" width="200px;" height="200px;"/></div>
                        <div class="qmeconn_detail_ri">
                             <!--   <div class="member_part">
                                        <div class="member_l">QME Member:</div>
                                        <div class="member_r">{{$name}}</div>
                                </div>-->
                                <div class="member_part">
                                        <div class="member_l">Who would you like to connect with:</div>
                                        <div class="member_r">{{$db_QmeIn[0].Connect_With}}</div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">Country:</div>
                                        <div class="member_r">{{$Country}} </div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">State:</div>
                                        <div class="member_r">{{$State}} </div>
                                </div>
                                <div class="member_part">
                                        <div class="member_l">City:</div>
                                        <div class="member_r">{{$db_QmeIn[0].vCity}} </div>
                                </div>
                                <div class="member_part">
                                        <div class="conn_member_l">Interest:  
								<span> {section name=i loop=$db_interestevent} {{$db_interestevent[i].vInterest}}, {/section}</span></div>
                                        
                                </div>
                                <div class="member_part">
                                        <div class="conn_member_l">Skill:
									<span> {section name=i loop=$db_skillevent} {{$db_skillevent[i].vSkill}}, {/section}</span>
								</div>
                                       
                                </div>
                                <div class="member_part">
                                        <div class="conn_member_l">Points when connect:
                                       	 <span>{{$db_QmeIn[0].iPointsWhenConnect}} </span>
								</div>
                                </div> 
                                
                        </div>
                        </div>
                       </div>
                        <div class="cl"></div>
                </div>
        </div>
</div>

