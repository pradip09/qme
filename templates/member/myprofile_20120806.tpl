<!--<link rel="stylesheet" type="text/css" media="all" href="{$tconfig["front_javascript"]}datepicker/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="{$tconfig["front_javascript"]}datepicker/jquery.1.4.2.js"></script>
<script type="text/javascript" src="{$tconfig["front_javascript"]}datepicker/jsDatePick.jquery.min.1.3.js"></script>
<script type="text/javascript" src="{$tconfig["front_javascript"]}/datepicker/jsDatePick.min.1.3.js"></script>
-->

<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>


<div id="services_box" class="desboard_body">

	<div class="desboard-left">
	    <div class="user_name">
		<a href="#">
			{if $mem_info[0].vProfileImage eq ''}
			<img src="{$tconfig["front_images"]}user_img.png" alt="" />
			{else}
			<img src="{$tconfig["tsite_upload_images_member"]}/{$mem_info[0].iMemberId}/2_{$mem_info[0].vProfileImage}" alt="" />
			{/if}
		</a>{$mem_info[0].vName}
		<div class="cl"></div>
	    </div>
	
	    <div class="cl"></div>
	    <div class="my_account_head">My Account</div>
	    <div class="my_account">
		<ul>
		    <li class="liactive"><a href="{$site_url}/myprofile" class="padingleft active" ><img src="{$tconfig["front_images"]}myaccount_icon1.png" alt="" />My Profile</a> </li>
		    <li><a href="{$site_url}/myphoto"> <img src="{$tconfig["front_images"]}myaccount_icon2.png" alt="" />My Photos</a> </li>
		    <li><a href="{$site_url}/myvideo"><img src="{$tconfig["front_images"]}myaccount_icon3.png" alt="" />My Videos</a> </li>
		    <li><a href="{$site_url}/mysong"> <img src="{$tconfig["front_images"]}myaccount_icon4.png" alt="" />My Songs</a> </li>
		    <li><a href="{$site_url}/myblog" class="padingleft"> <img src="{$tconfig["front_images"]}myaccount_icon5.png" alt="" width="24" height="19" />My Blog</a> </li>
		    <li><a href="{$site_url}/myevent" class="padingleft"><img src="{$tconfig["front_images"]}myevent.png" alt="" />My Events</a> </li>
		    <li><a href="{$site_url}/mypostjob" class="padingleft" ><img src="{$tconfig["front_images"]}postjob.png" alt="" />post jobs</a> </li>
		    <li><a href="#"><img src="{$tconfig["front_images"]}my-store.png" alt="" /> My store</a></li>
		    <li><a href="{$site_url}/mypostcampaign" class="paddingleft"> <img src="{$tconfig["front_images"]}post-campaign.png" alt="" />Post campaign</a> </li>
		    <li><a href="{$site_url}/qmein"> <img src="{$tconfig["front_images"]}myaccount_icon7.png" alt="" />Qme in</a> </li>
		    <li><a href="#"> <img src="{$tconfig["front_images"]}myaccount_icon8.png" alt=""/>Invite Friends</a> </li>
		    <li><a href="{$site_url}/buypoints"><img src="{$tconfig["front_images"]}myaccount_icon9.png" alt=""/>Buy Point</a> </li>
		</ul>
	    </div>
	    <!--my account menu end here -->
	</div>
<!--left part end here -->

	<div class="desboard-right paddingleftright" style="width:710px">
	    <div class="MyVedioTitle">
		<h1>My Profile</h1>
	    </div>
	    <div class="cl"></div>
	    <!--heaing end -->
	    <div class="graybox" style="margin-top:15px;">
	    <!--menu tab start here -->
		<div class="tabber">
	    	<!--personal infomation start here -->
		    <div class="tabbertab">
			<h4>Personal Information </h4>
			<p>
			<div class="formbox">
		    <!--left form start here -->
		    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
			<div id="divmsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"></div>
			    <div class="leftform ">
			
			    <input type="text" name="vName" class="inpuname" placeholder="Name" id="vName" value="{$mem_info[0].vName}" title="name"/><br />
			    <input type="text" name="vEmailadd" class="inpuname" placeholder="Email Address " id="vEmailadd" value="{$mem_info[0].vEmail}"/><br />
			<!--
				<div class="OppurtunitiesTxt">
				<a href="#readAbout" id="aboutDesc">About</a><br/>
				</div>
				<div style="display:none">
					<div id="readAbout" class="readpoppup">
					<div><div class="popupheadding">About</div>
					<div class="popuptext">{$mem_info[0].vAbout}</div></div>
					</div>
				</div>-->
				<textarea name="tAbout" cols="" rows="" class="inpuname1"  placeholder="About" id="tAbout">{$mem_info[0].tAbout}</textarea>
				<div class="inpuname"  style="border:none;"><div class="input1">Gender &nbsp;&nbsp;&nbsp;</div>
					<span><input name="eGender" id="eGender" type="radio" value="Male"  {if $mem_info[0].eGender eq 'Male'} checked="checked" {/if}/>Male</span>
					<span><input name="eGender" id="eGender" type="radio" value="Female" {if $mem_info[0].eGender eq 'Female'} checked="checked" {/if}/>Female</span>
				</div>
				<input type="text" name="vStudiedAt" class="inpuname" placeholder="Studied At " id="vStudiedAt" value="{$mem_info[0].vStudiedAt}"/><br />
				<input type="text" name="vEducation" class="inpuname" placeholder="Education level" id="vEducation" value="{$mem_info[0].vEducation}"/><br />
				<input type="text" name="vDegree" class="inpuname" placeholder="What is your degree?" id="vDegree" value="{$mem_info[0].vDegree}"/><br />
				<input type="text" name="vWorkedAt" class="inpuname" placeholder="Worked At" id="vWorkedAt" value="{$mem_info[0].vDegree}"/><br />
				<input type="button" class="btnbg" value="Save" onclick="validateform();" style="cursor:pointer;"/><input type="button" class="btnbg" value="Clear"/>
			    </div>
			    <!--right side form start here -->
			    <div class="rightform">
				<input type="text" name="vOccupation" class="inpuname" placeholder="Occupation" id="vOccupation" value="{$mem_info[0].vOccupation}"/><br />
				<input type="text" name="dBirthdate" class="inpuname" placeholder="Birthdate" id="dBirthdate" value="{$mem_info[0].dBirthdate}" onclick="dtpicker();"/><br />
				
				<div class="SelectTextBoxMyPro">
					<select name="iCountryId" id="iCountryId" onchange="getStates(this.value);">
						<option value="">Country</option>
						{if  $db_country|@count gt 0}
						{section name=i loop=$db_country}
						<option value='{$db_country[i].iCountryId}' {if $db_country[i].iCountryId eq $mem_info[0].iCountryId}selected{/if}>{$db_country[i].vCountry}</option>
						{/section}
						{/if}
					</select>
				</div><br /><br />

				<div class="SelectTextBoxMyPro showallstates"></div>

				<input type="text" name="vAddress" class="inpuname" placeholder="Address" id="vAddress" value="{$mem_info[0].vAddress}" title="address"/><br/>
				<input type="text" name="vZipCode" class="inpuname" placeholder="Zip Code" id="vZipCode" value="{$mem_info[0].vZipCode}" title="zip code"/><br />
				
				<div class="SelectTextBoxMyPro">
					<select name="iInterestId" id="iInterestId" onchange="showOtherInterest(this.value);">						
						{if  $db_interest|@count gt 0}
						{section name=j loop=$db_interest}
						<option value="{$db_interest[j].iInterestId}" {if $db_interest[j].iInterestId eq $mem_info[0].iInterestId} selected {/if}>{$db_interest[j].vInterest}</option>
						{/section}
						{/if}
						<option value="0" {if $mem_info[0].iInterestId eq '0'} selected {/if}>Other Interest</option>
					</select>
				</div>
				<br/>
				<div id="newInt" style="display:none;">
					<div id="newtext"></div>
				</div>
				
				<div class="SelectTextBoxMyPro" style="margin-top:10px;">
					<select name="iSkillId" id="iSkillId">
						<option value="">Skills</option>
						{if  $db_skill|@count gt 0}
						{section name=j loop=$db_skill}
						<option value="{$db_skill[j].iSkillId}" {if $db_skill[j].iSkillId eq $mem_info[0].iSkillId} selected {/if}>{$db_skill[j].vSkill}</option>
						{/section}
						{/if}
					</select>
				</div>
				
			    </div>
			    </form>
			<!--right side form end here -->
			<div class="cl"></div>
			</div>
			</p>
		    </div>
		<!--personal infomation emd here -->
		<!--contact us start here -->
		    <div class="tabbertab">
			<h4>Contact Us</h4>
			    <p>
				<div class="formbox">
				<div id="divContactmsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"></div>
        <!--left form start here -->
				<div class="leftform ">
				    <form id="frmMyContact" name="frmMyContact" method="post" action="{$site_url}/index.php?file=a-ajmycontact">
            
					<input type="text" class="inpuname" placeholder="Address" name="vAddress" id="vAddress" value="{$mem_info[0].vAddress}"/><br />
					<input type="text" class="inpuname" placeholder="Phone" id="vPhone" name="vPhone" value="{$mem_info[0].vPhone}"/><br />
					<input type="text" class="inpuname" placeholder="Email" id="vEmail" name="vEmail" value="{$mem_info[0].vEmail}"/><br />
					<input type="text" name="vCity" class="inpuname" placeholder="City" id="vCity"  value="{$mem_info[0].vCity}"/><br />
					List of website:</br>
					1. <input type="text" class="inpuname" style="width:285px;" placeholder="Enter your website" id="" name="" value=""/><br />
					2. <input type="text" class="inpuname" style="width:285px;" placeholder="Enter your website" id="" name="" value=""/><br />
					3. <input type="text" class="inpuname" style="width:285px;" placeholder="Enter your website" id="" name="" value=""/><br />
					
					<div class="SelectTextBoxMyPro">
						<select name="iCountryId" id="iCountryId" onchange="getStates(this.value);">
							<option value="">Country</option>
							{if  $db_country|@count gt 0}
							{section name=i loop=$db_country}
							<option value='{$db_country[i].iCountryId}' {if $db_country[i].iCountryId eq $mem_info[0].iCountryId}selected{/if}>{$db_country[i].vCountry}</option>
							{/section}
							{/if}
						</select>
					</div><br /><br />

					<div class="SelectTextBoxMyPro showallstates"></div>
					<br/><br/>
					<input type="button" class="btnbg" value="Save" onclick="return saveMyContact();"/><input type="button" class="btnbg" value="Clear" />
				    </form>
				</div>
        <!--right side form start here -->
				<div class="rightform">
				    <img src="{$tconfig["front_images"]}img_contact.png" width="259" height="259" alt="" />
				</div>
        <!--right side form end here -->
				<div class="cl"></div>
				</div>
			    </p>
		    </div>
        <!--contact us end here -->
        
        <!--my images start here -->



<div class="tabbertab">
<h4>My Images</h4>
<div id="divImagemsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"></div>

<p>
<div class="Myprofile_container">
		<div class="pload_prodile_image">
			<label>Upload Profile Image :</label>
			<form id="frmMyProfileImage" name="frmMyProfileImage" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajmyimages">
			<input type="hidden" value="insert" name="vOperation" id="vOperation"/>
			<input type="hidden" name="vOldProfileImage" id="vOldProfileImage" value="{$mem_info[0].vProfileImage}"/>
			<table>
				<tr>
					<td><input type="file" class="file_upload_browse" size="40" name="vProfileImage" id="vProfileImage"/></td>
					{if $mem_info[0].vProfileImage neq ''}
					<td><a href="#view1" id="viewProfileImage"><input type="button" value="View" class="banner_view" /></a></td>
					<td  onclick="profileImageDelete();"><input type="button" value="Delete" class="banner_delete" /></td >
					{/if}
				</tr>
			</table>
			</form>
			<!-- view profile image popup start-->
			<div style="display:none;">
			<div id="view1">
				<div class="popup_box">
					<div><img src="{$tconfig["tsite_upload_images_member"]}/{$mem_info[0].iMemberId}/{$mem_info[0].vProfileImage}" /></div>
				</div>
			</div>
			</div>
			<!-- view profile image popup  End-->
			
			<input type="button" value="Upload" class="upload_btn" onclick="return validateMyImages();"/>
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<div>
			<form id="frmMyBannerUpload" name="frmMyBannerUpload" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajuploadbanner">
				<input type="file" id="bannerImage" name = "bannerImage" >
			</form>
			<input type="button" id="bannerButton" name="bannerButton" onclick="return uploadBanner();">
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<div class="pload_prodile_image pload_prodile_banner">
			<form id="frmMyBannerImage" name="frmMyBannerImage" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajmybannerimages">
			
			<label>Upload Banner Image :</label>
			<input type="hidden" id="totcount" name="totcount" value="{$totgal}"/>
			<div id="TextBoxesGroup">
				{if $flag eq 0}
				<div id="TextBoxDiv0">
					<table>
					<tr>
						<td><input type="file" name="banner[]" id="banner"></td>
						<td></td> 
						<td><input type="button" name="Add" class="banner_delete" id="addButton" value="Add"/></td>
					</tr>
					</table>	
				</div>
				{/if}
				
				{section name=i loop=$db_banner_image}
				<div id="TextBoxDiv{$smarty.section.i.index}">
					<input type="hidden" name="vOldBanner[]" id="vOldBanner" value="{$db_banner_image[i].vBannerImage}">
					<input type="hidden" name="iBannerId[]" id="iBannerId" value="{$db_banner_image[i].iBannerId}">
					<table>
					<tr>
						<td><input type="file" name="banner[]" id="banner" ></td>

						{if $db_banner_image[i].vBannerImage neq ''}
						<td>
							<a href="#galdis{$smarty.section.i.index}" id="popgal{$smarty.section.i.index}"><input type="button" value="View" class="banner_view" /></a>
							<div style="display:none;">
							<div id="galdis{$smarty.section.i.index}">
								<div class="popup_box">
									<div><img src="{$tconfig['tsite_upload_images_member']}/{$db_banner_image[i].iMemberId}/{$db_banner_image[i].vBannerImage}"></div>
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
						</td>
						{else}
						<td></td>
						{/if}
						
						{if $smarty.section.i.index eq 0}
						<td><input type="button" name="Add" class="banner_delete" id="addButton" value="Add"></td>
						{else}
						<td><input type="button" name="Remove" class="banner_delete" id="remove" value="Remove" onclick="deleterow({$smarty.section.i.index});">
						</td>
						{/if}
					</tr>
					</table>	
				</div>
				{/section}
			</div>
			</form>
			<input type="button" value="Upload" class="upload_btn" onclick="return validateMyBanners();"/>
			
		</div>
	</div>
	
</p>


</div>
        <!--contact us end here -->
        
        <!--Social networking start here -->
        <div class="tabbertab">
        <h4>Social Networking</h4>
        <p>
	    <div class="Socal_net_link">
		<table>
			<tr>
				<td class="border_socialnet"><strong>Facebook:</strong>
					<input type="button" value="Facebook" />
					&nbsp;Connect Your Profile With FaceBook </td>
			</tr>
			<tr>
				<td class="border_socialnet"><strong>Twitter:</strong>
					<input type="button" value="Twitter" />
					&nbsp;Connect Your Profile With Twitter </td>
			</tr>
			<tr>
				<td class="border_socialnet"><strong>MySpace:</strong>
					<input type="button" value="MySpace" />
					&nbsp;Connect Your Profile With MySpace </td>
			</tr>
			<tr>
				<td class="border_socialnet"><strong>Google+:</strong>
					<input type="button" value="MySpace" />
					&nbsp;Connect Your Profile With Google+ </td>
			</tr>
			<tr>
				<td><strong>Linkedin:</strong>
					<input type="button" value="MySpace" />
					&nbsp;Connect Your Profile With Linkedin+ </td>
			</tr>
		</table>
</div>
</p>
	
</div>
	
	
        <!--social networking end here -->
        
        <!--Subscribers start here -->
        <div class="tabbertab">
        <h4>General Setting</h4>
        <p>
		
		<div class="General_Settings_profilepage">
		<div id="divSettingmsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"></div>	
		<table>
			<form id="frmMyGeneralSetting" name="frmMyGeneralSetting" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajmygeneralsetting">
				<input type="hidden" id="iGeneralSettingId" name = "iGeneralSettingId" value = "{$db_gen_setting[0].iGeneralSettingId}"/>
			
			<tr>
				<td>
					
					<div class="SelectTextBoxMyPro" style="border:none;">
					<select name="vLanguage" id="vLanguage">
						<option value="3">English</option>
						{if  $db_language|@count gt 0}
						{section name=i loop=$db_language}
						<option value='{$db_language[i].iLangId}' {if $db_language[i].iLangId eq $mem_info[0].iLangId}selected{/if}>{$db_language[i].vLanguage}</option>
						{/section}
						{/if}
					</select>
					</div>Select a Language
				</td>
			</tr>
			<tr>
				<td><div class="SelectTextBoxMyPro" style="border:none;">
						<select name="vQmePlatformColor" id="vQmePlatformColor">
							<option>Select Color</option>
							<option>Color 1</option>
							<option>Color 2</option>
							<option>Color 3</option>
							<option>Color 4</option>
						</select>
					</div>&nbsp;Choose my QME platform color</td>
			</tr>
			<tr>
				<td><input type="checkbox" id="eShowEmail" name="eShowEmail" {if $db_gen_setting[0].eShowEmail eq 'Yes'}checked{/if}/>&nbsp;Show Email Address as Public ?</td>
			</tr>	
			<tr>
				<td><input type="checkbox" id="eShowBusinessNumber" name="eShowBusinessNumber" {if $db_gen_setting[0].eShowBusinessNumber eq 'Yes'}checked{/if}/>&nbsp;Show my business Number</td>
			</tr>
			<tr>
				<td><input type="checkbox" id="eSupportBusiness" name="eSupportBusiness" {if $db_gen_setting[0].eSupportBusiness eq 'Yes' or $db_gen_setting[0].eSupportBusiness eq ''}checked{/if}/>&nbsp;I Support Businesses in my community</td>
			</tr>
			<tr>
				<td><input type="checkbox" id="eShowRelationshipStatus" name="eShowRelationshipStatus" {if $db_gen_setting[0].eShowRelationshipStatus eq 'Yes'}checked{/if}/>&nbsp;Show your relationship status</td>
			</tr>
			<tr>
				<td><input type="checkbox" id="eShowBusinessAddress" name="eShowBusinessAddress" {if $db_gen_setting[0].eShowBusinessAddress eq 'Yes'}checked{/if} />&nbsp;Show your business address</td>
			</tr>
			<tr>
				<td><input type="checkbox" id="eHideOnlineStatus" name="eHideOnlineStatus" {if $db_gen_setting[0].eHideOnlineStatus eq 'Yes'}checked{/if}/>&nbsp;Hide Online Status</td>
			</tr>
			<tr>
				<td><input type="checkbox" id="eShareFavourite" name="eShareFavourite" {if $db_gen_setting[0].eShareFavourite eq 'Yes' OR  $db_gen_setting[0].eShareFavourite eq ''}checked{/if}/>&nbsp;Share Your Favourites ?</td>
			</tr>
			
			<tr>
				<td><div class="SelectTextBoxMyPro" style="border:none;">
						<select name="eIsPrivatePublic" id="eIsPrivatePublic">
							<option value="Private" {if $db_gen_setting[0].eIsPrivatePublic eq 'Private'}selected{/if}>Private</option>
							<option value="Public" {if $db_gen_setting[0].eIsPrivatePublic eq 'Public'}selected{/if}>Public</option>
						</select>
					</div>Profile Private or Public ? Private is  only visible to members who you have in your network.</td>
			</tr>
			
			</form>
			<tr>
				<td>
					<input type="button" onclick="return saveGeneralSetting();" value="Save Setting" class="upload_btn"/>
					<input type="button" value="Restore Default" class="upload_btn"/>
				</td>
				
			</tr>
		</table></div>
		
	</p>
        </div>
        <!--Subscribers end here -->
    </div>
    <!--menu tab start end -->
    </div>
</div>
<!--right part start end-->
<div class="cl"></div>
</div>


</div></div>

{literal}
<script type="text/javascript" language="javascript">

getStates('{/literal}{$mem_info[0].iCountryId}{literal}');
showOtherInterest('{/literal}{$mem_info[0].iInterestId}{literal}');
function showOtherInterest(otherInterest)
{
	if(otherInterest != '0'){
		$('#newInt').hide();
		$('#newtext').html('');
	}else{
		var html ='';
		html ='<input type="text" placeholder="Other Interest" id="vOtherInterest" name="vOtherInterest" value="{/literal}{$mem_info[0].vOtherInterest}{literal}" class="inpuname" title="Other Interest"/>';
		$('#newtext').html(html);
		$('#newInt').show();
	}
}

$(document).ready(function() {
	/*$('#box1').selectbox({debug: true});
	$('#box2').selectbox({debug: true});
	$('#vCountry').selectbox();
	$('#vState').selectbox({debug: true});
	$('#vInterest').selectbox({debug: true});
	$('#vSkill').selectbox({debug: true});
	$('#vLanguage').selectbox({debug: true});
	$('#eIsPrivatePublic').selectbox({debug: true});
	$('#vColor').selectbox({debug: true});
	$('#iVideoAlbumId').selectbox({debug: true});
	*/
});

document.write('<style type="text/css">.tabber{display:none;}</style>');


function validateform(){
	
	$("#divmsgid").removeClass('popup-err').addClass('errormsg_login').text('Validating....').fadeIn(1000);
	var extra='';
	if($('#vName')){
		
		if($('#vName').val() ==''){
			$('#divmsgid').html("Please enter your name!!").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vName = $('#vName').val();
			extra+='&vName='+vName;
		}
	}
	if($('#vEmailadd')){
		
		if($('#vEmailadd').val() ==''){
			$("#divmsgid").html('Please enter your email').addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			
			var vEmail = $('#vEmailadd').val();
			var msg = isValidEmail(vEmail);
			if(msg !='0'){
				$("#divmsgid").html(msg).addClass('errormsg').fadeTo(900,1);
				return false;
			}else{
				extra+='&vEmail='+vEmail;
			}
		}
	}
	if($('#tAbout')){
		var tAbout = $('#tAbout').val();
		extra+='&tAbout='+tAbout;
	}
	if($('#eGender')){
		var eGender = $('#eGender').val();
		extra+='&eGender='+eGender;
	}
	if($('#vStudiedAt')){
		var vStudiedAt = $('#vStudiedAt').val();
		extra+='&vStudiedAt='+vStudiedAt;
	}
	if($('#vEducation')){
		var vEducation = $('#vEducation').val();
		extra+='&vEducation='+vEducation;
	}
	if($('#vDegree')){
		var vDegree = $('#vDegree').val();
		extra+='&vDegree='+vDegree;
	}
	if($('#vWorkedAt')){
		var vWorkedAt = $('#vWorkedAt').val();
		extra+='&vWorkedAt='+vWorkedAt;
	}
	if($('#vOccupation')){
		var vOccupation = $('#vOccupation').val();
		extra+='&vOccupation='+vOccupation;
	}
	if($('#dBirthdate')){
		var dBirthdate = $('#dBirthdate').val();
		extra+='&dBirthdate='+dBirthdate;
		
	}
	if($('#iCountryId')){
		var iCountryId = $('#iCountryId').val();
		extra+='&iCountryId='+iCountryId;
	}
	if($('#iStateId')){
		var iStateId = $('#iStateId').val();
		extra+='&iStateId='+iStateId;
	}
	if($('#vZipCode')){
		var vZipCode = $('#vZipCode').val();
		extra+='&vZipCode='+vZipCode;
	}
	if($('#vAddress')){
		if($('#vAddress').val() ==''){
			$('#divmsgid').html("Please enter your address").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vAddress = $('#vAddress').val();
			extra+='&vAddress='+vAddress;
		}
	}
	if($('#iInterestId')){
		var iInterestId = $('#iInterestId').val();
		extra+='&iInterestId='+iInterestId;
	}
	if($('#vOtherInterest')){
		var vOtherInterest = $('#vOtherInterest').val();
		extra+='&vOtherInterest='+vOtherInterest;
	}
	if($('#iSkillId')){
		var iSkillId = $('#iSkillId').val();
		extra+='&iSkillId='+iSkillId;
	}
	
	var url = site_url+"/index.php?file=a-ajeditprofile";
	var pars = extra;
	
	$.post(url+pars,
            function(data) {
		//alert(data);
		if(data == "success")
		{
			$("#divmsgid").html("Profile Edited Successfully").addClass('errormsg').fadeTo(900,1);
			
		}
		else
		{
			
			$("#divmsgid").html("Error in Saving Profile").addClass('errormsg').fadeTo(900,1);
		}
       });
}

function validateMyImages()
{
	$('#vOperation').val('insert');
	$('#divImagemsgid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$("#frmMyProfileImage").ajaxForm({
		target: '#divImagemsgid'
		}).submit();
}
function validateMyBanners()
{
	$('#divImagemsgid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$("#frmMyBannerImage").ajaxForm({
		target: '#divImagemsgid'
		}).submit();
}
function profileImageDelete()
{	
	$('#vOperation').val('delete');
	$('#divImagemsgid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$("#frmMyProfileImage").ajaxForm({
		target: '#divImagemsgid'
		}).submit();
}

function saveMyContact()
{
	$('#divContactmsgid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$("#frmMyContact").ajaxForm({
		target: '#divContactmsgid'
		}).submit();
}

function saveGeneralSetting()
{
	$('#divSettingmsgid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$("#frmMyGeneralSetting").ajaxForm({
		target: '#divSettingmsgid'
		}).submit();
}



$(document).ready(function(){
$('#aboutDesc').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'	
});
});

$(document).ready(function(){
	$('#viewProfileImage').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});



$(document).ready(function(){
    var counter = $('#totcount').val();
    $("#addButton").click(function () {
    if($('#totcount').val() >= 5){
	$('#divImagemsgid').html("You can upload only 5 banners.").addClass('errormsg').fadeTo(900,1);
        return false;
    }   
 
    var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
        var html ='';
        html +='<table id="TextBoxesGroup">';
	html +='<tr>';
		html +='<td><input type="file" class="file_upload_browse" name="banner[]" id="banner"></td>';
		html +='<td></td>';
		html +='<td><input type="button" class="banner_delete" name="Remove" id="remove" value="Remove" onclick="deleterow('+counter+');"></td>';
	html +='</tr>';
	html +='</table>';
       
        newTextBoxDiv.html(html);
        
        newTextBoxDiv.appendTo("#TextBoxesGroup");
        counter = $('#totcount').val();
        counter++;
        
        $('#totcount').val(counter);
        
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
	//alert(divid);
    $("#TextBoxDiv" + divid).remove();
    var counter = $('#totcount').val()-1; ;
    $('#totcount').val(counter);
  }


</script>
{/literal} 
