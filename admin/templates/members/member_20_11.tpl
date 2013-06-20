<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<script>
stateArr = new Array({$stateArr});
</script>
<div id="content">
	<div class="container" id="tabs">
		<div class="conthead">
			<ul class="tabhead">
				<li style="background:none !important; border:none !important;"><a href="#tab-profile" onclick="hidemessage()">My Profile</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-photo" onclick="hidemessage()">My Photos</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-song" onclick="hidemessage()">My Songs</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-video" onclick="hidemessage()">My Videos</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-blog" onclick="hidemessage()">My Blogs</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-event" onclick="hidemessage()">My Events</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-postjob" onclick="hidemessage()">Post Job</a></li>
				<li style="display:none; background:none !important; border:none !important;"><a href="#tab-addpostjob">Post Job</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-postcampaign" onclick="hidemessage()">Post Campaign</a></li>
				<li style="display:none; background:none !important; border:none !important;"><a href="#tab-addpostcampaign">Post Campaign</a></li>
			</ul>
		</div>
	</div>
	<div> {if $var_msg_new neq ''}
		<div class="status success" id="errormsgdiv">
			<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p>
			<p><img src="{$tconfig.tpanel_img}icons/icon_success.png" title="Success" /> {$var_msg_new}</p>
		</div>
		<div></div>
		{elseif $var_msg neq ''}
		<div class="status success" id="errormsgdiv">
			<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p>
			<p><img src="{$tconfig.tpanel_img}icons/icon_success.png" title="Success" /> {$var_msg}</p>
		</div>
		<div></div>
		{/if} </div>
	<div id="tabs" style="background:transparent !important; color:#666 !important; border: none !important;">
		<div id="tab-profile" style="padding:0 !important;">
			<form id="frm" name="frm" action="index.php?file=m-member_a" enctype="multipart/form-data" method="post">			
				<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_mem[0].vProfileImage}" />
				<div class="container half left">
					<div class="conthead">
						<h2>Personal Information</h2>
					</div>
					<div class="contentbox">
						<div class="inputboxes">
							<label for="textfield"><strong>Name:</strong></label>
							<input type="text" id="vName" name="Data[vName]" class="inputbox" value="{$db_mem[0].vName}" lang="*" title="Name"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Email Address:</strong></label>
							<input type="text" id="vEmail" name="Data[vEmail]" class="inputbox"  lang="{literal}*{E}{/literal}" title="E-mail" value="{$db_mem[0].vEmail}"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Password:</strong></label>							
							<input type="password" id="vPassword"  name="Data[vPassword]" class="inputbox"  lang="*" title="Password" value="{$db_mem[0].vPassword}"/>
						</div>						
						<div class="inputboxes">
							<label for="textfield"><strong>Gender: </strong></label>
							<select id="eGender" name="Data[eGender]" lang="*" title="Gender" style="width:224px;">
								<option value="">Select Gender</option>
								<option value="Male" {if $db_mem[0].eGender eq Male}selected{/if}>Male</option>
								<option value="Female" {if $db_mem[0].eGender eq Female}selected{/if}>Female</option>								
							</select>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Studied At:</strong></label>
							<input type="text" name="Data[vStudiedAt]" class="inputbox" id="vStudiedAt" value="{$db_mem[0].vStudiedAt}" lang="*" title="StudiedAt"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Degree:</strong></label>
							<input type="text" name="Data[vDegree]" class="inputbox" id="vDegree" value="{$db_mem[0].vDegree}" lang="*" title="Degree"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Worked At:</strong></label>
							<input type="text" name="Data[vWorkedAt]" class="inputbox" id="vWorkedAt" value="{$db_mem[0].vWorkedAt}" lang="*" title="WorkedAt"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Occupation:</strong></label>
							<input type="text" id="vOccupation" name="Data[vOccupation]" class="inputbox" value="{$db_mem[0].vOccupation}" lang="*" title="Occupation"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Birthdate:</strong></label>
							<input type="text" id="dBirthdate" name="Data[dBirthdate]" class="inputbox" value="{$db_mem[0].dBirthdate}" lang="*" title="Birthdate"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Country:</strong></label>
							<select name="Data[iCountryId]" id="iCountryId" onchange="getCountry(this.value);" style="width:224px;" class="inputbox" lang="*" title="Country">
								<option value="">--Select Country--</option>
															
								{if  $db_mycountry|@count gt 0}
								{section name=i loop=$db_mycountry}										
									
								<option value='{$db_mycountry[i].iCountryId}' {if $db_mycountry[i].iCountryId eq $db_mem[0].iCountryId}selected{/if}>{$db_mycountry[i].vCountry}</option>
															
								{/section}
								{/if}				
							
							</select>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>State:</strong></label>							
							<div id="showallstates">
								<select name="iStateId" id="iStateId" class="inputbox">
									<option value="">-Select-</option>
								</select>
							</div>							
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>City:</strong></label>
							<input type="text" name="Data[vCity]" class="inputbox" id="vCity" value="{$db_mem[0].vCity}" title="city"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Address:</strong></label>
							<input type="text" name="Data[vAddress]" class="inputbox" id="vAddress" value="{$db_mem[0].vAddress}" title="address"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Zip Code:</strong></label>
							<input type="text" name="Data[vZipCode]" class="inputbox" id="vZipCode" value="{$db_mem[0].vZipCode}" title="zip code" onkeypress="return checkmobile(event);"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Phone No:</strong></label>
							<input type="text" name="Data[vPhone]" class="inputbox" id="vPhone" value="{$db_mem[0].vPhone}" title="Phone No" onkeypress="return checkmobile(event);"/>
						</div>
						<div class="inputboxes">
							<label><strong>Interests:</strong></label>
							<br/>
							{if  $db_interest|@count gt 0}
							<div class="event_skill">
								{section name=j loop=$db_interest}
								<div class="event_slikk_inner">
									<input type="checkbox" value="{$db_interest[j].iInterestId}" id="iInterestId" name="Data[iInterestId][]" {if $db_interest[j].iInterestId|in_array:$relatedArr}checked{/if} lang="*" title="Interest" />
									{$db_interest[j].vInterest}
								</div>
								{/section}
							</div>
							{/if}
						</div>						
						<div class="inputboxes">
							<label for="textfield"><strong>Other Interest:</strong></label>
							<input type="text" name="Data[vOtherInterest]" class="inputbox" id="vOtherInterest" value="{$db_mem[0].vOtherInterest}" title="Other Interest" lang="*"/>
						</div>
						<div class="inputboxes">
							<label><strong>Skills:</strong></label>
							<br/>
							{if  $db_skill|@count gt 0}
							<div class="event_skill">
								{section name=j loop=$db_skill}
								<div class="event_slikk_inner">
									<input type="checkbox" value="{$db_skill[j].iSkillId}" id="iSkillId" name="Data[iSkillId][]" {if $db_skill[j].iSkillId|in_array:$skillArr}checked{/if} lang="*" title="Skill"/>
									{$db_skill[j].vSkill}
								</div>
								{/section}
							</div>
						{/if}
						</div>						
						<div class="inputboxes">
							<label for="textfield"><strong>Other Skill:</strong></label>
							<input type="text" id="vOtherSkill" name="Data[vOtherSkill]" class="inputbox" value="{$db_mem[0].vOtherSkill}" title="Other Skill" lang="*"/>
						</div>
					</div>
				</div>				
				<div class="container half right">
					<div class="conthead">
						<h2>Biz Contact</h2>
					</div>
					<div class="contentbox">
						<div class="inputboxes">
							<label for="textfield"><strong>BizName:</strong></label>
							<input type="text" class="inputbox" name="Data[vBizName]" id="vBizName" value="{$db_mem[0].vBizName}" lang="*" title="BizName"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Address:</strong></label>
							<input type="text" id="vAddress" name="Data[vAddress]" class="inputbox" value="{$db_mem[0].vAddress}" lang="*" title="Address"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Phone:</strong></label>
							<input type="text" id="vPhone"  name="Data[vPhone]" class="inputbox" lang="{literal}*N{/literal}" title="Phone" value="{$db_mem[0].vPhone}"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Email Address:</strong></label>
							<input type="text" id="vEmail"  name="Data[vEmail]" class="inputbox"  lang="{literal}*{E}{/literal}" title="E-mail" value="{$db_mem[0].vEmail}"/>
						</div>
						
						<div class="inputboxes">
							<label for="textfield"><strong>Country:</strong></label>
							<select name="Data[iBizCountryId]" class="inputbox" id="iBizCountryId" style="width:224px;" onchange="getCount(this.value);" lang="*" title="BizCountry">
								<option value="">--Select Country--</option>
											
								{if  $db_mycountry|@count gt 0}
								{section name=i loop=$db_mycountry}
											
									<option value='{$db_mycountry[i].iCountryId}' {if $db_mycountry[i].iCountryId eq $db_mem[0].iBizCountryId}selected{/if}>{$db_mycountry[i].vCountry}</option>
									
								{/section}
								{/if}
										
							</select>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>State:</strong></label>
							<div id="showstates" >
								<select name="Data[iBizStateId]" id="iBizStateId" class="inputbox" style="width:305px;">
									<option value="">-Select-</option>
								</select>
							</div>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>City:</strong></label>
							<input type="text" id="vCity" name="Data[vCity]" class="inputbox" value="{$db_mem[0].vCity}" lang="*" title="City"/>
						</div>
						<div class="inputboxes" style="margin-left:133px;">							
							<input type="checkbox" id="eNonProfit" name="Data[eNonProfit]" {if $db_mem[0].eNonProfit eq 'Yes'}checked{/if}/>
							&nbsp;Are you a non profit ?<br/>
							<input type="checkbox" id="eChruch" name="Data[eChruch]" {if $db_mem[0].eChruch eq 'Yes'}checked{/if}/>
							&nbsp;Are you a Church ?<br/>
							<input type="checkbox" id="ePolitician" name="Data[ePolitician]" {if $db_mem[0].ePolitician eq 'Yes'}checked{/if}/>
							&nbsp;Are you a politician ?<br/>
							<input type="checkbox" id="eFundraiser" name="Data[eFundraiser]" {if $db_mem[0].eFundraiser eq 'Yes'}checked{/if}/>
							&nbsp;Are you a Fundraiser ?<br/>
						</div>
						<div class="inputboxes">
						<strong>List your website:</strong><br />
							<br />
							<div class="inputboxes">														
								<label for="textfield"><strong>1:</strong></label>							
								<input type="text" class="inputbox"  id="vWebsite1" name="Data[vWebsite1]" value="{$db_mem[0].vWebsite1}"/>
							</div>
							<div class="inputboxes">														
								<label for="textfield"><strong>2:</strong></label>							
								<input type="text" class="inputbox" id="vWebsite2" name="Data[vWebsite2]" value="{$db_mem[0].vWebsite2}"/>
							</div>
							<div class="inputboxes">														
								<label for="textfield"><strong>3:</strong></label>							
								<input type="text" class="inputbox"  id="vWebsite3" name="Data[vWebsite3]" value="{$db_mem[0].vWebsite3}"/>
							</div>														
						</div>
					</div>
				</div>
				<div class="container half right">
					<div class="conthead">
						<h2>General Settings</h2>
					</div>
					<div class="General_Settings_profilepage">
						<div id="divSettingmsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"></div>
						<table>
							<!--<form id="frmMyGeneralSetting" name="frmMyGeneralSetting" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajmygeneralsetting">-->
								<input type="hidden" id="iGeneralSettingId" name = "iGeneralSettingId" value = "{$db_gen_setting[0].iGeneralSettingId}"/>
								<tr>
									<td class="qme_language">My QME Language</td>
								</tr>
								<tr>
									<td><div class="SelectTextBoxMyPro" style="border:none;">
											<select name="vLanguage" id="vLanguage" style="width:150px;" class="inputbox" lang="*" title="Language">
												<option value="3">English</option>								
												{if  $db_language|@count gt 0}
												{section name=i loop=$db_language}	
												<option value='{$db_language[i].iLangId}' {if $db_language[i].iLangId eq $db_mem[0].iLangId}selected{/if}>{$db_language[i].vLanguage}</option>
												{/section}
												{/if}
											</select>
										</div></td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowEmail" name="eShowEmail" {if $db_gen_setting[0].eShowEmail eq 'Yes' or $db_gen_setting[0].eShowEmail eq ''}checked{/if}/>
										&nbsp;Show Email Address as Public ?</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowBusinessNumber" name="eShowBusinessNumber" {if $db_gen_setting[0].eShowBusinessNumber eq 'Yes' or $db_gen_setting[0].eShowBusinessNumber eq ''}checked{/if}/>
										&nbsp;Show my business Number</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eSupportBusiness" name="eSupportBusiness" {if $db_gen_setting[0].eSupportBusiness eq 'Yes' or $db_gen_setting[0].eSupportBusiness eq ''}checked{/if} />
										&nbsp;I Support Businesses in my community</td>
								</tr>
								<!--			<tr>
						<td><input type="checkbox" id="eShowRelationshipStatus" name="eShowRelationshipStatus" {if $db_gen_setting[0].eShowRelationshipStatus eq 'Yes'}checked{/if}/>&nbsp;Show your relationship status</td>
					</tr>-->
								<tr>
									<td><input type="checkbox" id="eShowBusinessAddress" name="eShowBusinessAddress" {if $db_gen_setting[0].eShowBusinessAddress eq 'Yes' or $db_gen_setting[0].eShowBusinessAddress eq ''}checked{/if} />
										&nbsp;Show your business address</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eHideOnlineStatus" name="eHideOnlineStatus" {if $db_gen_setting[0].eHideOnlineStatus eq 'Yes' or $db_gen_setting[0].eShowBusinessAddress eq ''}checked{/if}/>
										&nbsp;Hide Online Status</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eBizContact" name="eBizContact" {if $db_gen_setting[0].eBizContact eq 'Yes' or $db_gen_setting[0].eBizContact eq ''}checked{/if}/>
										&nbsp;Show your Biz Contact in your public profile</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowSkill" name="eShowSkill" {if $db_gen_setting[0].eShowSkill eq 'Yes' or $db_gen_setting[0].eShowSkill eq ''}checked{/if}/>
										&nbsp;Show your Skill in your public profile</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowIntrest" name="eShowIntrest" {if $db_gen_setting[0].eShowIntrest eq 'Yes' or $db_gen_setting[0].eShowIntrest eq ''}checked{/if}/>
										&nbsp;Show your Intrest in your public profile</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowOccupation" name="eShowOccupation" {if $db_gen_setting[0].eShowOccupation eq 'Yes' or $db_gen_setting[0].eShowOccupation eq ''}checked{/if}/>
										&nbsp;Show your Occupation in your public profile</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowStudiedat" name="eShowStudiedat" {if $db_gen_setting[0].eShowStudiedat eq 'Yes' or $db_gen_setting[0].eShowStudiedat eq ''}checked{/if}/>
										&nbsp;Show your Studied At in your public profile</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowDegreein" name="eShowDegreein" {if $db_gen_setting[0].eShowDegreein eq 'Yes' or $db_gen_setting[0].eShowDegreein eq ''}checked{/if}/>
										&nbsp;Show your Degree in your public profile</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShareFavourite" name="eShareFavourite" {if $db_gen_setting[0].eShareFavourite eq 'Yes' OR  $db_gen_setting[0].eShareFavourite eq ''}checked{/if} />
										&nbsp;Share Your Favorites ?</td>
								</tr>
								<tr>
									<td class="qme_language">Profile Private or Public ? Private is  only visible to members who you have in your network.</td>
								</tr>
								<tr>
									<td><div class="SelectTextBoxMyPro" style="border:none;">
											<select name="eIsPrivatePublic" id="eIsPrivatePublic" style="width:150px;" class="inputbox">
												<option value="Private" {if $db_gen_setting[0].eIsPrivatePublic eq 'Private'}selected{/if}>Private</option>
												<option value="Public" {if $db_gen_setting[0].eIsPrivatePublic eq 'Public' or $db_gen_setting[0].eIsPrivatePublic eq ''}selected{/if}>
												Public
												</option>
											</select>
										</div></td>
								</tr>
								
								
							<!--</form>	-->						
						</table>			
					</div>
				</div>				
				<div class="container half left">
					<div class="conthead">
						<h2>Upload Image and Banners</h2>
					</div>
					<div class="contentbox">
						<div style="display:block;">
							<div class="inputboxes">
								<label for="textfield"><strong>Upload Profile image:</strong></label>
								<input type="file" id="vProfileImage" name="vProfileImage" class="inputbox" value="{$db_mem[0].vProfileImage}"  title=" ProfileImage" onchange="CheckValidFile(this.value,this.name)" style="width: 201px;margin-right: 87px;"/>
							
							{if $db_mem[0].vProfileImage neq ''}
							<div style="margin-top: 10px;"> <a href="#viewmember" id="member_image"><img src="{{$tconfig["tsite_images"]}}view.png"/></a> <img src="{{$tconfig["tsite_images"]}}delete.png" onclick="ImageDelete();"/> </div>
							</div>
							
							<div>
								<div style="display:none;">
									<div id="viewmember">
										<div class="popup_box">
											<div><img src="{$tconfig["tsite_upload_images_member"]}{$db_mem[0].iMemberId}/{$db_mem[0].vProfileImage}" /></div>
										</div>
									</div>
								</div>
							</div>
							{/if} </div>
						<label for="textfield"><strong>Banner:</strong></label>
						<input  type="hidden" id="totcount" name="totcount" value="{$totgal}"/>
						<div id="TextBoxesGroup">
							{if $mode eq 'add'}
							<div id="TextBoxDiv0">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="60%"><input type="file" name="gallery[]" id="gallery"></td>
										<td width="40%"><input type="button" name="Add" class="btn" value="Add" id="addButton"></td>
									</tr>
								</table>
							</div>
							{elseif  $mode eq 'edit' and $totgal eq 1 and $flag eq 0}
							<div id="TextBoxDiv0">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="60%"><input type="file" name="gallery[]" id="gallery"></td>
										<td width="40%"><input type="button" class="btn" name="Add" id="addButton" value="Add"></td>
									</tr>
								</table>
							</div>
							{else}
							
							{section name=i loop=$db_banner_gal}
							<div id="TextBoxDiv{$smarty.section.i.index}">
								<input type="hidden" name="vOldGall[]" id="vOldGall" value="{$db_banner_gal[i].vBannerImage}">
								<input type="hidden" name="iBannerId[]" id="iBannerId" value="{$db_banner_gal[i].iBannerId}">
								<table width="85%%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="1%" valign="top"><input type="file" name="gallery[]" style="margin-bottom:5px;" id="gallery" >
											{if $db_banner_gal[0].vBannerImage neq ''} </br>
											<a href="#galdis{$smarty.section.i.index}" style="margin-left:5px;" id="popgal{$smarty.section.i.index}"><img src="{{$tconfig["tsite_images"]}}view.png"/></a>
											<div style="display:none;">
												<div id="galdis{$smarty.section.i.index}">
													<div class="popup_box">
														<div><img src="{$tconfig["tsite_upload_images_member"]}{$db_banner_gal[i].iMemberId}/banner/{$db_banner_gal[i].vBannerImage}"></div>
													</div>
												</div>
											</div>
											{literal}
											<script>
										$(document).ready(function(){
											$('#popgal{/literal}{$smarty.section.i.index}{literal}').fancybox({
												'overlayShow'	: true	,
												'transitionIn'	: 'elastic',
												'transitionOut'	: 'elastic',
												'margin' : '0',
												'padding' : '0',
												'scrolling' : 'no'
												
											});
										});
			
										</script>
											{/literal}
											{/if} </td>
										{if $smarty.section.i.index eq 0}
										<td width="20%" valign="top"><input type="button" class="btn" style="padding:3px 7px;" name="Add" id="addButton" value="Add"></td>
										{else}
										<td width="20%" valign="top" align=left><input type="button" class="btnalt" style="padding:4px 3px;" name="Remove" id="remove" value="Remove" onclick="deleterow({$smarty.section.i.index});">
										</td>
										{/if} </tr>
								</table>
							</div>
							{/section}
							{/if}
						</div>
						{if $mode eq add}
							<input type="submit" value="Add Member" class="btn" onclick="return validate(document.frm);" title="Add Member"/>
						{else}
							<input type="submit" value="Edit Member" class="btn" onclick="return validate(document.frm);" title="Edit Member"/>
						{/if}						
						<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
					</div>
				</div>
			</form>
		</div>
		<div id="tab-photo" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> {include file="photo/photo.tpl"} </div>
		<div id="tab-song" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> {include file="song/song.tpl"} </div>
		<div id="tab-video" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> {include file="video/video.tpl"} </div>
		<div id="tab-blog" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> {include file="blog/blog.tpl"} </div>
		<div id="tab-event" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> event </div>
		<div id="tab-postjob" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> {include file="postjob/view-mpostjob.tpl"} </div>
		<div id="tab-addpostjob" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> {include file="postjob/mpostjob.tpl"} </div>
		<div id="tab-postcampaign" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> {include file="postcampaign/view-mpostcampaign.tpl"} </div>
		<div id="tab-addpostcampaign" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> {include file="postcampaign/mpostcampaign.tpl"} </div>
		<div style="clear: both"></div>
	</div>
	<div style="clear: both"></div>
</div>
{literal}
<script type="text/javascript">

function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}


$(document).ready(function(){
    var counter = $('#totcount').val();
    
    $("#addButton").click(function () {
    //alert($('#totcount').val());
    if($('#totcount').val() >= 5){
        alert("Only allow 5 images to upload.");
        return false;
    }   
 
    var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
       
    
        var html ='';
        html +='<table width="100%" border="0" cellspacing="0" cellpadding="0" id="TextBoxesGroup">';
	html +='<tr>';
		html +='<td width="1%"><input type="file" name="gallery[]" id="gallery"></td>';
		html +='<td width="40%"><input type="button" name="Remove" class="btnalt" style="padding:4px 3px;" id="remove" value="Remove" onclick="deleterow('+counter+');"></td>';
	html +='</tr>';
	html +='</table>';
       
        newTextBoxDiv.html(html);
        /*newTextBoxDiv.html('<label>Textbox #'+ counter + ' : </label>' +
        '<input type="text" name="textbox' + counter + 
        '" id="textbox' + counter + '" value="" >');*/
        
        newTextBoxDiv.appendTo("#TextBoxesGroup");
        counter = $('#totcount').val();
        counter++;
        //alert(counter);
        $('#totcount').val(counter);
        //alert(counter);
        
        $('.vTimeType ,.vServiceType ,.eDuration').click(function(){
            $(this).closest('table').find("input:checkbox").each(function(){        
                $(this).attr('checked',false)
            }) 
            $(this).attr('checked',true)
        })
    
    });
      
      $('.vTimeType,.vServiceType ,.eDuration').click(function(){
            $(this).closest('table').find("input:checkbox").each(function(){        
                $(this).attr('checked',false)
            }) 
            $(this).attr('checked',true)
        })  
  });

function deleterow(divid){
  //alert($('#totcount').val());
  //alert(divid);
  $("#TextBoxDiv" + divid).remove();
  var counter = $('#totcount').val()-1; ;
  //alert(counter);
   //counter--;
  $('#totcount').val(counter);
}
  
  
  function redirectcancel(){
	
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'm-member';
    window.location=admin_url+"/index.php?file=m-member&mode=view";
    return false;
}

function ImageDelete(){
	var r=confirm("Are you sure to delete this image");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteImage");			
		}
		
		if($('#frm')){
			$('#frm').submit();
		}
	  }
	else
	  {
		return false;
	  } 
	}
	
function CheckValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  )
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}

$(document).ready(function(){
	$('#member_image').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});
/*$(document).ready(function(){
	$('#profile_image').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});*/

function checkmobile(events)
{
     
	var unicodes=events.charCode? events.charCode :events.keyCode;
	if (unicodes!=8)
	{ 
	        if( ((unicodes>47 && unicodes<58) || unicodes == 43 || unicodes == 46 )){
	            return true;
		}else{
			return false;
		}
	}
}


</script>
<script type="text/javascript">
getId('{/literal}{$db_mem[0].iCountryId}{literal}','{/literal}{$db_mem[0].iMemberId}{literal}');
function getId(id,id1){
	//alert("hi");
	var CountryId = id;
	var iMemberId = id1;		
	getCountry(CountryId,iMemberId);	
}
function getCountry(CountryId,iMemberId)
{
	//alert(CountryId);
	//alert(iMemberId);
	var extra ='';
	extra+='&CountryId='+CountryId;
	extra+='&iMemberId='+iMemberId;
	//alert(extra);
	
	if($('#selectedstate')){
		if($('#selectedstate').val() !=''){
			var selectedstate = $('#selectedstate').val();
			extra+='&selectedstate='+selectedstate;   
		}        
	}
	
	//alert("ok");
	var url = admin_url+"/index.php?file=m-statelist";
	//alert(url);
	var pars = extra;
	
	$.post(url+pars,
            function(data) {
		//alert(data);
		if($('#showallstates')){
			$('#showallstates').html(data);			
		}
	});
}
</script>
<script type="text/javascript">
getId('{/literal}{$db_mem[0].iBizCountryId}{literal}','{/literal}{$db_mem[0].iMemberId}{literal}');
function getId(id,id1){
	//alert("hi Biz");
	var CountryId = id;
	var iMemberId = id1;		
	getCount(CountryId,iMemberId);	
}
function getCount(CountryId,iMemberId)
{
	//alert(CountryId);
	var extra ='';
	extra+='&CountryId='+CountryId;
	extra+='&iMemberId='+iMemberId;
	//alert(extra);
	
	if($('#selectedstate')){
		if($('#selectedstate').val() !=''){
			var selectedstate = $('#selectedstate').val();
			extra+='&selectedstate='+selectedstate;   
		}        
	}
	
	//alert("ok");
	var url = admin_url+"/index.php?file=m-bizstatelist";
	//alert(url);
	var pars = extra;
	
	$.post(url+pars,
            function(data) {
		//alert(data);
		if($('#showtates')){
			$('#showstates').html(data);
		}
	});
}
</script>
<script type="text/javascript">
 $(document).ready(function() {
 $(function() {$('#dBirthdate').datepicker({dateFormat: 'mm-dd-yy'});});
 });
 </script>
{/literal} 