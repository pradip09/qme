<link rel="stylesheet" href="{$tconfig["front_javascript"]}jcrop/css/jquery.Jcrop.css" type="text/css" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}jcrop/js/jquery.Jcrop.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<link rel="stylesheet" href="{$tconfig["front_javascript"]}datepicker/css/jquery.datepick.css" type="text/css" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}datepicker/js/jquery.datepick.js"></script>
<div id="services_box" class="desboard_body">{include file="member/myaccountleft.tpl"}</div>
<!--left part end here -->
<div class="desboard-right">
	<div class="MyVedioTitle">
		<h1>My Profile</h1>
	</div>
    <div >
        <a href="{$site_url}/{$mem_info[0].vMemberUrl}" >
            <img src="{$tconfig["front_images"]}view_public.png" style="margin-top:28px;margin-left:107px;"alt="Public profile" title="Public profile" border="0" />
        </a>
    </div>
	<div class="cl"></div>
	<div class="paddingleftright graybox1">
		<!--heaing end -->
		<div class="graybox">
			<!--menu tab start here -->
			<div class="tabber">
				<!--personal infomation start here -->
				<div class="tabbertab">
					<h4>Personal Information </h4>
					<p>
					<div class="tab_num_box">
						<div class="tab_no_1"><img src="{$tconfig["front_images"]}1.png" alt="" title="" /></div>
						<div class="tab_no_2"><img src="{$tconfig["front_images"]}2.png" alt="" title="" /></div>
						<div class="tab_no_3"><img src="{$tconfig["front_images"]}3.png" alt="" title="" /></div>
						<div class="tab_no_4"><img src="{$tconfig["front_images"]}4.png" alt="" title="" /></div>
						<div class="tab_no_5"><img src="{$tconfig["front_images"]}5.png" alt="" title="" /></div>
					</div>
					<div style="text-align:center;line-height:32px; height:25px; padding-right:8px;width: 605px;margin-top: 8px;">Complete your profile step 1- 5 to receive 500 free QME points</div>
					<div class="formbox">
						<!--left form start here -->
						<form id="form1" name="form1" method="post" action="{$site_url}/index.php?file=a-ajeditprofile" enctype="multipart/form-data">
						
						<div class="leftform">
						<input type="text" name="vName" class="inpuname" placeholder="Name" id="vName" value="{$mem_info[0].vName}" title="name"/>
						<br />
						<input type="text" name="vEmailadd" class="inpuname" placeholder="Email Address " id="vEmailadd" value="{$mem_info[0].vEmail}"/>
						<br />
						
						<!--<div class="OppurtunitiesTxt">
							<div class="aboutus_link"><a href="{$site_url}/myabout"><input type="button"  value="Click here to add about you" style="cursor:pointer;border: 1px solid darkGray;"/></a><br/>
							
							</div>
						</div>-->
						<div style="display:none;">
							<div id="readAbout" class="readpoppupaboutus1" >
								<div >
									<div class="popupheadding">About Us</div>
									<div id="divaboutus" class="error_massage"></div>
									<table>
										<tr>
											<td><table>
													<tr>
														<td class="aboutus_popuptxt"> Tell us about You or your company ? </td>
													</tr>
													<tr>
														<td>
															<textarea id="about_company" name="about_company" rows="5" cols="37" >{$db_aboutus[0].vYourself}</textarea>
															
														</td>
													</tr>
													<tr>
														<td class="aboutus_popuptxt"> Experience . Qualifications . Certifications . Education . </td>
													</tr>
													<tr>
														<td><textarea id="about_exp" name="about_exp" rows="5" cols="37">{$db_aboutus[0].vYourexperience}</textarea>
														</td>
													</tr>
												</table></td>
											<td><table>
													<tr>
														<td class="aboutus_popuptxt"> Our Mission Statement </td>
													</tr>
													<tr>
														<td><textarea id="about_mission" name="about_mission" rows="5" cols="33">{$db_aboutus[0].vYourmission}</textarea>
														</td>
													</tr>
													<tr>
														<td class="aboutus_popuptxt"> Our Service </td>
													</tr>
													<tr>
														<td><textarea id="about_service" name="about_service" rows="5" cols="33">{$db_aboutus[0].vYourservice}</textarea>
														</td>
													</tr>
												</table></td>
										</tr>
									</table>
									<div>
										<input type="image" src="{$tconfig["front_images"]}btn_submit.png" value="Submit" onclick="return uploadAboutUs();"/>
										<a href="#" onclick="$.fancybox.close();"><img src="{$tconfig["front_images"]}cancle.png"/></a> </div>
									
								</div>
							</div>
						</div>
						
						<div   >
							<div class="input1">Identifier&nbsp;&nbsp;&nbsp;</div>
							<span>
							<input name="eGender" id="eGender" type="radio" value="Male" {if $mem_info[0].eGender eq 'Male'}  checked="checked" {/if}/>
							Male</span> <span>
							<input name="eGender" id="eGender" type="radio" value="Female" {if $mem_info[0].eGender eq 'Female'}  checked="checked" {/if}/>
							Female</span><span>
							<input name="eGender" id="eGender" type="radio" value="Business" {if $mem_info[0].eGender eq 'Business'}  checked="checked" {/if}/>
							Business</span> </div>
						<input type="text" name="vStudiedAt" class="inpuname" placeholder="Studied At " id="vStudiedAt" value="{$mem_info[0].vStudiedAt}"/>
						<br />
						<!--<input type="text" name="vEducation" class="inpuname" placeholder="Education level" id="vEducation" value="{$mem_info[0].vEducation}"/><br />-->
						<input type="text" name="vDegree" class="inpuname" placeholder="What is your degree?" id="vDegree" value="{$mem_info[0].vDegree}"/>
						<br />
						<input type="text" name="vWorkedAt" class="inpuname" placeholder="Worked At" id="vWorkedAt" value="{$mem_info[0].vWorkedAt}"/>
						<br />
						<input type="text" name="vOccupation" class="inpuname" placeholder="Occupation" id="vOccupation" value="{$mem_info[0].vOccupation}"/>
						<br />
						<input type="text" name="dBirthdate" class="inpuname" placeholder="Birthdate" id="dBirthdate"  value="{$mem_info[0].dBirthdate}" />
						<br/>
						<input type="text" name="vZipCode" class="inpuname" placeholder="Zip Code" id="vZipCode" value="{$mem_info[0].vZipCode}" title="zip code" onkeypress="return checkmobile(event);"/>
						<br />
						
						<div class="pass_word_profile">
						
							<div id="divContactmsgid" style="text-align:left;line-height:24px; height:25px; padding-right:8px; color:red;font-size:14px;"></div>
							<div class="change_padd_title">Change Password</div>
							<input type="password" name="oldPassword" id="oldPassword" class="inpuname" placeholder="Old Password" onkeyup="getButton();"/>
							<input type="password"  name="newPassword" id="newPassword" class="inpuname" placeholder="New Password" />
							<input type="password" name="confirmpassword" id="confirmpassword" class="inpuname" placeholder="Conform Password" />
							<div id="viewurlhide"> </div>
						
					</div>
				</div>
{literal}
<script>
function getButton(){
	//alert('hello');
	var html='';
	$('#viewurlhide').html('<input type="button" class="btnbg" value="Save" onclick="validatepsw();" style="cursor:pointer;"/>');
}

</script>
{/literal}
				<!--right side form start here -->
				<div class="rightform">
					<div class="myprofile_select_box">
						<select name="iCountryId" id="iCountryId" onchange="getCountry(this.value);" style="width:305px;" class="inpuname">
							
							<option value="">--Select Country--</option>
							<option value='223' {if '223' eq $mem_info[0].iCountryId}selected{/if}>United States</option>
							{if  $db_mycountry|@count gt 0}
							{section name=i loop=$db_mycountry}
							{if $db_country[i].iCountryId neq 223}			
							<option value='{$db_mycountry[i].iCountryId}' {if $db_mycountry[i].iCountryId eq $mem_info[0].iCountryId}selected{/if}>{$db_mycountry[i].vCountry}</option>
							{/if}
							{/section}
							{/if}
					
									
						</select>
					</div>
					<div class="myprofile_select_box">
						<div id="showallstates">
							<select name="iStateId" id="iStateId" class="inpuname">
								<option value="">-Select-</option>
							</select>
						</div>
					</div>
					<input type="text" name="vCity" class="inpuname" placeholder="City" id="vCity" value="{$mem_info[0].vCity}" title="city"/>
					<br/>
					<input type="text" name="vAddress" class="inpuname" placeholder="Address" id="vAddress" value="{$mem_info[0].vAddress}" title="address"/>
					<br/>
					<input type="text" name="vPhone" class="inpuname" placeholder="Phone No" id="vPhone" value="{$mem_info[0].vPhone}" title="Phone No" onkeypress="return checkmobile(event);"/>
						<br/>
					<!--<input type="text" name="flatitude" class="inpuname" placeholder="Latitude" id="flatitude" value="{$mem_info[0].flatitude}" title="Latitude" onkeypress="return checkmobile(event);"/>
					<br />
					<input type="text" name="flongitude" class="inpuname" placeholder="Longitude" id="flongitude" value="{$mem_info[0].flongitude}" title="Longitude" onkeypress="return checkmobile(event);"/>
					<br />-->
					
					<div class="myprofile_select_box">
						<label><strong>Interests:</strong></label>
						<br/>
						{if  $db_interest|@count gt 0}
						<div class="event_skill"> {section name=j loop=$db_interest}
							<div class="event_slikk_inner">
								<input type="checkbox" value="{$db_interest[j].iInterestId}" id="iInterestId" name="iInterestId[]" {if $db_interest[j].iInterestId|in_array:$relatedArrIntrest}checked{/if}/>
								{$db_interest[j].vInterest}</div>
							{/section} </div>
						{/if} </div>
					<div id="otherintrest">
						<input type="text" name="vOtherInterest" class="inpuname" placeholder="Other Interest" id="vOtherInterest" value="{$mem_info[0].vOtherInterest}" title="Other Interest"/>
						<br/>
					</div>
					<div class="myprofile_select_box" >
						<label><strong>Skills:</strong></label>
						<br/>
						{if  $db_skill|@count gt 0}
						<div class="event_skill"> {section name=j loop=$db_skill}
							<div class="event_slikk_inner">
								<input type="checkbox" value="{$db_skill[j].iSkillId}" id="iSkillId" name="iSkillId[]" {if $db_skill[j].iSkillId|in_array:$relatedArr}checked{/if}/>
								{$db_skill[j].vSkill}</div>
							{/section} </div>
						{/if} </div>
					<div id="divmsgid" style="text-align:left;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"></div>
					<div id="otherskill">
						<input type="text" name="vOtherSkill" class="inpuname" placeholder="Other Skill" id="vOtherSkill" value="{$mem_info[0].vOtherSkill}" title="Other Skill"/>
						<br/>
					</div>
					<input type="button" class="btnbg" value="Save" onclick="validateform();" style="cursor:pointer;"/>
					<input type="button" class="btnbg" value="Clear" style="cursor:pointer;"/>
				</div>
				</form>
				<!--right side form end here -->
				<div class="cl"></div>
			</div>
			</p>
		</div>
		<!--personal infomation emd here -->

{literal}
<!--<script type="text/javascript">

CKEDITOR.config.width = 350;
CKEDITOR.replace( 'about_company',
		 
	{
		
		toolbar :
		[
			{ name: 'document', items : ['Save','NewPage','Print',] },
			{ name: 'styles', items : ['Format' ] },
			{ name: 'basicstyles', items : [ 'Bold','Italic',] },
			{ name: 'paragraph', items : [ 'NumberedList','BulletedList'] },
		]
	}
	
	);

CKEDITOR.replace( 'about_exp',
	{
		toolbar :
		[
			{ name: 'document', items : ['Save','NewPage','Print',] },
			{ name: 'styles', items : ['Format' ] },
			{ name: 'basicstyles', items : [ 'Bold','Italic',] },
			{ name: 'paragraph', items : [ 'NumberedList','BulletedList'] },
		]
	});
CKEDITOR.replace( 'about_mission',
	{
		toolbar :
		[
			{ name: 'document', items : ['Save','NewPage','Print',] },
			{ name: 'styles', items : ['Format' ] },
			{ name: 'basicstyles', items : [ 'Bold','Italic',] },
			{ name: 'paragraph', items : [ 'NumberedList','BulletedList'] },
		]
	});
CKEDITOR.replace( 'about_service',
	{
		toolbar :
		[
			{ name: 'document', items : ['Save','NewPage','Print',] },
			{ name: 'styles', items : ['Format' ] },
			{ name: 'basicstyles', items : [ 'Bold','Italic',] },
			{ name: 'paragraph', items : [ 'NumberedList','BulletedList'] },
		]
	});
	
</script>-->


<script>
function validatepsw(){

var extra='';
	if($('#oldPassword')){
		if($('#oldPassword').val() ==''){
			$('#divContactmsgid').html("Please enter old password").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
				var oldPassword = $('#oldPassword').val();
				extra+='&oldPassword='+oldPassword;
			}
	}
	if($('#newPassword')){
		if($('#newPassword').val() ==''){
		     	$('#divContactmsgid').html("Please enter new password").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
				var newPassword = $('#newPassword').val();
				extra+='&newPassword='+newPassword;
			}
	}
	if($('#confirmpassword')){
		
		if($('#confirmpassword').val() ==''){
			$('#divContactmsgid').html("Please enter confirm password").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#newPassword').val() != $('#confirmpassword').val()){
		
		$('#divContactmsgid').html("Please enter correct password").addClass('errormsg').fadeTo(900,1);
		return false;
	}else{
		
		var confPassword = $('#confirmpassword').val();
		var newPassword = $('#newPassword').val();
		extra+='&newPassword='+newPassword;
	}
	//alert("hi");
	 var url = site_url+"/index.php?file=a-ajprofilepsw";
         var pars = extra;
	 //alert(url+pars);
	   $.post(url+pars,
            function(data) {
                
		if(data =='success')
		{
		     $("#divContactmsgid").html("Your password changed successfully").addClass('errormsg').fadeTo(900,1);
		     $('#oldPassword').val('');
		     $('#newPassword').val('');
		     $('#confirmpassword').val('');
		     
		}
		else if(data=='notmatch')
		{
		     $('#divContactmsgid').html('Please enter correct old password');
		}
	});
}


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
		{/literal}
		<!--contact us start here -->
		<div class="tabbertab" style="min-height:700px;">
			<h4>Biz Contact</h4>
			<p style="margin-bottom: -18px;">
			<div class="tab_num_box">
				<div class="tab_no_1"><img src="{$tconfig["front_images"]}1.png" alt="" title="" /></div>
				<div class="tab_no_2"><img src="{$tconfig["front_images"]}2.png" alt="" title="" /></div>
				<div class="tab_no_3"><img src="{$tconfig["front_images"]}3.png" alt="" title="" /></div>
				<div class="tab_no_4"><img src="{$tconfig["front_images"]}4.png" alt="" title="" /></div>
				<div class="tab_no_5"><img src="{$tconfig["front_images"]}5.png" alt="" title="" /></div>
			</div>
			<div style="text-align: center;line-height: 29px;height: 29px;padding-right: 8px;width: 605px;">Complete your profile step 1- 5 to receive 500 free QME points</div>
			<div class="formbox">
			
				<!--left form start here -->
				<div class="leftform">
					<form id="frmMyContact" name="frmMyContact" method="post" action="{$site_url}/index.php?file=a-ajmycontact">
						<input type="text" class="inpuname" placeholder="Name" name="vBizName" id="vBizName" value="{$mem_info[0].vBizName}"/>
						<br />
						<input type="text" class="inpuname" placeholder="Business Address" name="vBizAddress" id="vBizAddress" value="{$mem_info[0].vBizAddress}"/>
						<br />
						<input type="text" class="inpuname" placeholder="Business Phone" id="vBizPhone" name="vBizPhone" value="{$mem_info[0].vBizPhone}"/>
						<br />
						<input type="text" class="inpuname" placeholder="Business Email" id="vBizEmail" name="vBizEmail" value="{$mem_info[0].vBizEmail}"/>
						<br />
						<div>
							<select name="iBizCountryId" class="inpuname" id="iBizCountryId" style="width:305px;" onchange=" getCount(this.value);" >
								<option value="">--Select Country--</option>
								<option value='223' {if '223' eq $mem_info[0].iBizCountryId}selected{/if}>United States</option>			
							{if  $db_mycountry|@count gt 0}
							{section name=i loop=$db_mycountry}
								{if $db_country[i].iCountryId neq 223}		
								<option value='{$db_mycountry[i].iCountryId}' {if $db_mycountry[i].iCountryId eq $mem_info[0].iBizCountryId}selected{/if}>{$db_mycountry[i].vCountry}</option>
								{/if}
							{/section}
							{/if}
									
							</select>
						</div>
						<div id="showstates" >
							<select name="iBizStateId" id="iBizStateId" class="inpuname" style="width:305px;">
								<option value="">-Select-</option>
							</select>
						</div>
						<input type="text" name="vBizCity" class="inpuname" placeholder="City" id="vBizCity"  value="{$mem_info[0].vBizCity}"/>
						<br />
						<div  class="website" >
							<input type="checkbox" id="eNonProfit" name="eNonProfit" {if $mem_info[0].eNonProfit eq 'Yes'}checked{/if} style="margin-top: 5px;"/>
							&nbsp;Are you a non profit ?<br/>
							<input type="checkbox" id="eChruch" name="eChruch" {if $mem_info[0].eChruch eq 'Yes'}checked{/if} style="margin-top: 5px;"/>
							&nbsp;Are you a Church ?<br/>
							<input type="checkbox" id="ePolitician" name="ePolitician" {if $mem_info[0].ePolitician eq 'Yes'}checked{/if} style="margin-top:5px;"/>
							&nbsp;Are you a politician ?<br/>
							<input type="checkbox" id="eFundraiser" name="eFundraiser" {if $mem_info[0].eFundraiser eq 'Yes'}checked{/if} style="margin-top:5px;"/> 
							&nbsp;Are you a Fundraiser ?<br/>
						</div>
						List your website:</br>
						1.&nbsp;
						<input type="text" class="inpuname" style="width:285px;" placeholder="Enter your website" id="vWebsite1" name="vWebsite1" value="{$mem_info[0].vWebsite1}"/>
						<br />
						2.&nbsp;
						<input type="text" class="inpuname" style="width:285px;" placeholder="Enter your website" id="vWebsite2" name="vWebsite2" value="{$mem_info[0].vWebsite2}"/>
						<br />
						3.&nbsp;
						<input type="text" class="inpuname" style="width:285px;margin-bottom:-3px;" placeholder="Enter your website" id="vWebsite3" name="vWebsite3" value="{$mem_info[0].vWebsite3}"/>
						
						<div id="divConmsgid" style="margin-left: -139px;text-align:center;line-height:9px; height:17px; padding-right:8px;width: 605px;color:red;"></div>
						
						<input type="button" class="btnbg" style="margin-left:23px;cursor:pointer;" value="Save" onclick="return saveMyContact();"/>
						<input type="button" class="btnbg" value="Clear" style="cursor:pointer;"/>
					</form>
				</div>
				<!--right side form start here -->
				<div class="rightform"> <img src="{$tconfig["front_images"]}img_contact.png" width="259" height="259" alt="" /> </div>
				<!--right side form end here -->
				<div class="cl"></div>
			</div>
			</p>
		</div>
		<!--contact us end here -->
		<!--my images start here -->
		<div class="tabbertab">
			<h4>My Images</h4>
			<p>
			<div class="tab_num_box">
				<div class="tab_no_1"><img src="{$tconfig["front_images"]}1.png" alt="" title="" /></div>
				<div class="tab_no_2"><img src="{$tconfig["front_images"]}2.png" alt="" title="" /></div>
				<div class="tab_no_3"><img src="{$tconfig["front_images"]}3.png" alt="" title="" /></div>
				<div class="tab_no_4"><img src="{$tconfig["front_images"]}4.png" alt="" title="" /></div>
				<div class="tab_no_5"><img src="{$tconfig["front_images"]}5.png" alt="" title="" /></div>
			</div>
			
			<div style="text-align:center;line-height:23px; height:30px; padding-right:8px;width: 605px;">Complete your profile step 1- 5 to receive 500 free QME points</div>
			<div class="Myprofile_container">
				<div class="pload_prodile_image">
					<label style="color:#0A55C5;">Upload Your Profile Image :</label>
					<form id="frmMyProfileImage" name="frmMyProfileImage" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajmyimages">
						<input type="hidden" value="insert" name="vOperation" id="vOperation"/>
						<input type="hidden" name="vOldProfileImage" id="vOldProfileImage" value="{$mem_info[0].vProfileImage}" />
						<table>
							<tr>
								<td><input type="file" class="file_upload_browse" name="vProfileImage" id="vProfileImage1"/></td>
								{if $mem_info[0].vProfileImage neq ''}
								<td><a href="#view1" id="viewProfileImage" style="text-decoration:none;">
									<input type="button" value="View" class="banner_view" />
									</a></td>
								<td onclick="profileImageDelete();"><input type="button" value="Delete" class="banner_delete" /></td >
								{/if} </tr>
						</table>
					</form>
					<!-- view profile image popup start-->
					<div style="display:none;">
						<div id="view1">
							<div>
								<div><img src="{$tconfig["tsite_upload_images_member"]}/{$mem_info[0].iMemberId}/{$mem_info[0].vProfileImage}" /></div>
							</div>
						</div>
					</div>
					<!-- view profile image popup  End-->
					<input type="button" value="Upload" class="upload_btn" onclick="return validateMyImages();"/>
					<div id="divImagemsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"></div>
				</div>
				
				<div style="display:none">
					<div id="uploadedImageShow"></div>
				</div>
				<div id="divBannermsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"></div>
				<div class="pload_prodile_image pload_prodile_banner">
					<div class="checkall_myimg">Custom banner size for upload not requiring cropping 959 X 300</div>					
					<label style="color:#0A55C5;">Upload Your Banner Image :</label>
					{while $initBanner <= $totBanner}
					<table style="border-bottom:1px solid #999999;">
						<tr>
							<td><label>Banner {$initBanner}:</label></td>
							<div class="ProcessingIndication Navigation Mybanner" id="banner_loading">Please Wait Banner is Uploading...</div>
							<div id="imageloader">
								<form id="frmMyUploadBanner{$initBanner}" name="frmMyUploadBanner{$initBanner}" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajcropbannerhtml">
									<input type="hidden" name="bannerNum" value="{$initBanner}">
									<input type="hidden" name="iBannerId" value="{$db_banner_image[$initBanner-1].iBannerId}">
									<td><input type="file" onchange="return checkFileSize({$initBanner});" name ="bannerImage" id="bannerImage{$initBanner}" ></td>
								</form>
							</div>
							<td><input class="banner_delete" type="button" id="bannerButton{$initBanner}" name="bannerButton" value="Upload & Crop Banner" onclick="return uploadBanner({$initBanner},{if $db_banner_image[$initBanner-1].iBannerId neq ''}{$db_banner_image[$initBanner-1].iBannerId}{else}0{/if});"></td>
							<!--<td><a href="#uploadedImageShow" class="showFancy">Crop Banner</a></td>-->
						</tr>
						<tr id="showbannerarea{$initBanner}">
							<td></td>
							<td id="ban_img{$initBanner}"><div> <img src="{$tconfig["tsite_upload_images_member"]}{$db_banner_image[$initBanner-1].iMemberId}/banner/{$db_banner_image[$initBanner-1].vBannerImage}" width="300" height="100"> </div></td>
							<td style="vertical-align:top;"> {if $db_banner_image[$initBanner-1].vBannerImage neq ''}
								<input class="banner_delete" type="button" id="deleteButton{$initBanner}" name="bannerButton" value="Delete Banner" onclick="return deleteBanner({$db_banner_image[$initBanner-1].iBannerId},{$initBanner});">
								{/if} </td>
						</tr>
					</table>
					
					<!--<div style="display:none"><div id="uploadedImageShow{$initBanner}"></div></div>-->
{literal}
<script type="text/javascript">
var bannerNum = '';
var iBannerId =0;
function uploadBanner(initBanner,bannerId)
{
	iBannerId = bannerId;
	bannerNum = initBanner;
	if($('#bannerImage'+bannerNum).val() == '')
	{
		$('#divBannermsgid').html("Please browse your banner image").addClass('errormsg').fadeTo(900,1);
	}
	else
	{
		$('#divBannermsgid').html("").addClass('errormsg').fadeTo(900,1);
		$('#imageloader').hide();
		$('#banner_loading').show();
		$("#frmMyUploadBanner"+initBanner).ajaxForm({
			success :function(responseText){
				$('#banner_loading').hide();
				$.fancybox({
					'centerOnScroll': true,
					'overlayShow'	: true,
					'transitionIn'	: 'elastic',
					'transitionOut'	: 'elastic',
					'content' : responseText
				});
				
				$('#bannerImage'+bannerNum).val('');
			}	
		}).submit();
	}
	
}

function checkFileSize(bannerNum){
	
	var val = $('#bannerImage'+bannerNum).val();	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' || a == 'PNG' || a == 'png'){
		$("#frmMyUploadBanner"+bannerNum).ajaxForm({
			success :function(data){
				//alert('hello');
				//alert(data);
				if(data == '0'){
					var html='';
					html+='<div  class="signing" style="height:100px;">';
					html+='<div  style="text-align:center;line-height:93px;color:#ED0D0D;" class="errormsg">Max image size upload: 2000 X 1500</div>';
					//html+='<div  style="text-align:center;line-height:93px;color:#ED0D0D;" class="errormsg">Custom banner size for upload not requiring cropping 940 X 350</div>';
					html+='<div>';
					 $(document).ready(function () {                                
                                         $.fancybox(html,{'modal':false,
                                                'margin' : '0',
                                                'padding' : '0',
                                                'scrolling' : 'no'
			                 });
					 });
					//$('#divBannermsgid').html("Max image size upload: 2000 X 1500").addClass('errormsg').fadeTo(900,1);					
					$('#bannerImage'+bannerNum).val('');					
				}
				else{
					var id = data.split('||');
					if(id[0] == 1)
					{
					$('#divBannermsgid').html("Banner Uploaded successfully.").addClass('errormsg').fadeTo(900,1);
					$('#bannerImage'+bannerNum).val('');
					$('#showbannerarea'+bannerNum).html('<td></td><td id="ban_img'+bannerNum+'"><div><img src="{/literal}{$tconfig["tsite_upload_images_member"]}{literal}/{/literal}{$iUserId}{literal}/banner/'+id[2]+'" width="300" height="100"></div><td style="vertical-align:top;"><input class="banner_delete" type="button" id="deleteButton{$initBanner}" name="bannerButton" value="Delete Banner" onclick="return deleteBanner('+id[1]+','+bannerNum+');"></td>');	
					}
				}
				//alert(data);
		}
		}).submit();
	}else{
		$('#divBannermsgid').html('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (jpg,jpeg)  Files!!!').addClass('errormsg').fadeTo(900,1);
		$('#bannerImage'+bannerNum).val('');
	}	
}




getId('{/literal}{$mem_info[0].iCountryId}{literal}');
function getId(id){
	//alert("hi");
	//alert(id);
	var CountryId = id;		
	getCountry(CountryId);	
}

function getCountry(CountryId)
{
	//alert(CountryId);
	var extra ='';
	extra+='&CountryId='+CountryId;
	if($('#selectedstate')){
        if($('#selectedstate').val() !=''){
         var selectedstate = $('#selectedstate').val();
         extra+='&selectedstate='+selectedstate;   
        }
        
	}
	var url = site_url+"/index.php?file=a-ajmyprofilelist";
	
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
getId('{/literal}{$mem_info[0].iBizCountryId}{literal}');
function getId(id){
	//alert("hi");
	var CountryId = id;		
	getCount(CountryId);	
}

function getCount(CountryId)
{
	//alert(CountryId);
	var extra ='';
	extra+='&CountryId='+CountryId;
	if($('#selectedstate')){
        if($('#selectedstate').val() !=''){
         var selectedstate = $('#selectedstate').val();
         extra+='&selectedstate='+selectedstate;   
        }
        
	}
	var url = site_url+"/index.php?file=a-ajbizprofilelist";
	
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
            $(function() {
	$('#dBirthdate').datepick({dateFormat: 'mm-dd-yyyy'});
	
});

</script>
<script>

function deleteBanner(bannerId,bannerNum)
{
	var extra ='&iBannerId=' + bannerId;
	extra+= '&bannerNum=' + bannerNum;
	
	var url = site_url+"/index.php?file=a-ajdeletebanner";
	var pars = extra;
	
	$.post(url+pars,
	function(data) {
		if($('#showbannerarea'+bannerNum)){
			$('#showbannerarea'+bannerNum).html(data);
			
		}
	});
}



</script>
					{/literal}
					<div style="display:none">{$initBanner++}</div>
					{/while} </div>
			</div>
			</p>
		</div>
		<!--contact us end here -->
		<!--Social networking start here -->
		<div class="tabbertab">
			<h4>Social Networking</h4>
			<p>
			<div class="tab_num_box">
				<div class="tab_no_1"><img src="{$tconfig["front_images"]}1.png" alt="" title="" /></div>
				<div class="tab_no_2"><img src="{$tconfig["front_images"]}2.png" alt="" title="" /></div>
				<div class="tab_no_3"><img src="{$tconfig["front_images"]}3.png" alt="" title="" /></div>
				<div class="tab_no_4"><img src="{$tconfig["front_images"]}4.png" alt="" title="" /></div>
				<div class="tab_no_5"><img src="{$tconfig["front_images"]}5.png" alt="" title="" /></div>
			</div>
			<div style="text-align:center;line-height:35px; height:25px; padding-right:8px;width: 605px;">Complete your profile step 1- 5 to receive 500 free QME points</div>
			<div class="Socal_net_link">
				<table>
					<tr>
						<td class="border_socialnet">
							<table>
								<tr>
									<td><strong>Facebook:</strong></td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><input type="button" value="Facebook" onclick="FBlogin();"/></td>
									<td id="isFacebookConnected">
										{if $isFacebookConnect == '0'}
											Connect Your Profile With FaceBook
										{else}
											Your Profile is connected with Facebook
										{/if}
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td class="border_socialnet"><strong>Twitter:</strong>
							<!--<a href="{$site_url}/includes/twitter_master/redirect.php" target="_blank" ><input type="button" value="Twitter" style="width: 81px;"/></a>-->
							<input type="button" value="Twitter" style="width: 81px;" onclick="twitterlog();"/>
						{if $TwitterConnect == '0'}	
							&nbsp;Connect Your Profile With Twitter
						{else}
							Your Profile is connected with Twitter
						{/if}
			
						</td>
					</tr>
					<tr>
						<td class="border_socialnet"><strong>MySpace:</strong>
							<input type="button" value="MySpace" />
							&nbsp;Connect Your Profile With MySpace </td>
					</tr>
					<tr>
						<td class="border_socialnet"><strong>Google+:</strong>
							<input type="button" value="Google+" />
							&nbsp;Connect Your Profile With Google+ </td>
					</tr>
					<tr>
						<td><strong>Linkedin:</strong>
							<!--{literal}
							<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
							<script type=IN/FollowCompany data-counter="right" data-id="276955"></script>
							{/literal}-->
							<a  href="{$site_url}/LinkedIn/demo/content.php"><input type="button" value="Linkedin" /></a>
							&nbsp;Connect Your Profile With Linkedin+ </td>
					</tr>
				</table>
				
			</div>
			</p>
		</div>
		<!--<div id="profiles"></div>
		social networking end here -->
		<!--Subscribers start here -->
		<div class="tabbertab">
			<h4>General Setting</h4>
			<p>
			<div class="tab_num_box">
				<div class="tab_no_1"><img src="{$tconfig["front_images"]}1.png" alt="" title="" /></div>
				<div class="tab_no_2"><img src="{$tconfig["front_images"]}2.png" alt="" title="" /></div>
				<div class="tab_no_3"><img src="{$tconfig["front_images"]}3.png" alt="" title="" /></div>
				<div class="tab_no_4"><img src="{$tconfig["front_images"]}4.png" alt="" title="" /></div>
				<div class="tab_no_5"><img src="{$tconfig["front_images"]}5.png" alt="" title="" /></div>
			</div>
			<div style="text-align:center;line-height:32px; height:25px; padding-right:8px;width: 605px;">Complete your profile step 1- 5 to receive 500 free QME points</div>
			<div class="General_Settings_profilepage">
				<div id="divSettingmsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"></div>
				<table>
					<form id="frmMyGeneralSetting" name="frmMyGeneralSetting" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajmygeneralsetting">
						<input type="hidden" id="iGeneralSettingId" name = "iGeneralSettingId" value = "{$db_gen_setting[0].iGeneralSettingId}"/>
						<tr>
							<td class="qme_language">My QME Language</td>
						</tr>
						<tr>
							<td><div class="SelectTextBoxMyPro" style="border:none;">
									<select name="vLanguage" id="vLanguage" style="width:150px;">
										<option value="3">English</option>								
												{if  $db_language|@count gt 0}
												{section name=i loop=$db_language}	
										<option value='{$db_language[i].iLangId}' {if $db_language[i].iLangId eq $mem_info[0].iLangId}selected{/if}>{$db_language[i].vLanguage}</option>
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
							<td><input type="checkbox" id="eHideOnlineStatus" name="eHideOnlineStatus" {if $db_gen_setting[0].eHideOnlineStatus eq 'Yes'}checked{/if}/>
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
								&nbsp;Show your Interest in your public profile</td>
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
									<select name="eIsPrivatePublic" id="eIsPrivatePublic" style="width:150px;">
										<option value="Private" {if $db_gen_setting[0].eIsPrivatePublic eq 'Private'}selected{/if}>Private</option>
										<option value="Public" {if $db_gen_setting[0].eIsPrivatePublic eq 'Public' or $db_gen_setting[0].eIsPrivatePublic eq ''}selected{/if}>
										Public
										</option>
									</select>
								</div></td>
						</tr>
					</form>
					<tr>
						<td class="general_border_none"><input type="button" onclick="return saveGeneralSetting();" value="Save Setting" class="upload_btn"/>
							<a href="{$site_url}/myprofile" ><input type="button" value="Restore Default"  class="upload_btn"/></a>
							
						</td>
					</tr>
				</table>			
			</div>
			</p>
		</div>
		<!--Subscribers end here -->
	</div>
	<!--menu tab start end -->
</div>
</div>
</div>
<!--right part start end-->
<div class="cl"></div>
</div>
</div>
</div>
{literal}
<script>
function twitterlog(){
	
	var site_url='{/literal}{$site_url}{literal}';
	window.open(site_url+"/twitter_master/redirect.php","_blank","toolbar=yes,left=600,top=200 location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=500, height=200");	
	
}


</script>



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

document.write('<style type="text/css">.tabber{display:none;}</style>');


function validateform(){
	
	
	$("#divmsgid").removeClass('popup-err').addClass('errormsg_login').text('Validating....').fadeIn(1000);
	var extra='';
	if($('#vName')){
			 var vName = $('#vName').val();
			extra+='&vName='+vName;
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
	if($('#iCountryId')){
		if($('#iCountryId').val() ==''){
			$('#divmsgid').html("Please select your country.").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
		var iCountryId = $('#iCountryId').val();
		extra+='&iCountryId='+iCountryId;
		}
	}
	if($('#iStateId')){
		if($('#iStateId').val() ==''){
			$('#divmsgid').html("Please select your state.").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
		var iStateId = $('#iStateId').val();
		extra+='&iStateId='+iStateId;
		}
	}
	var chks = document.getElementsByName('iInterestId[]');
        var hasChecked = false;
        for (var i = 0; i < chks.length; i++)
        {
                if (chks[i].checked)
                {
                        hasChecked = true;
                        break;
                }
        }
        if (!hasChecked)
        {
		$('#divmsgid').html("Please choose at least one Interest.").addClass('errormsg').fadeTo(900,1);
                chks[0].focus();
                return false;
        }
	var chkss = document.getElementsByName('iSkillId[]');
        var hasChecked = false;
        for (var i = 0; i < chkss.length; i++)
        {
                if (chkss[i].checked)
                {
                        hasChecked = true;
                        break;
                }
        }
        if (!hasChecked)
        {
		$('#divmsgid').html("Please choose at least one Skill.").addClass('errormsg').fadeTo(900,1);
                chkss[0].focus();
                return false;
        }

	if($('#tAbout')){
		var tAbout = $('#tAbout').val();
		extra+='&tAbout='+tAbout;
	}

	if($('#eGender')){
		var eGender = '';
		if(form1.eGender[0].checked)
			eGender = form1.eGender[0].value;
		else
			eGender = form1.eGender[1].value;
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
	
	if($('#vZipCode')){
		var vZipCode = $('#vZipCode').val();
		extra+='&vZipCode='+vZipCode;
	}
	if($('#vPhone')){
		var vPhone = $('#vPhone').val();
		extra+='&vPhone='+vPhone;
	}
	if($('#vCity')){
		var vCity = $('#vCity').val();
		extra+='&vCity='+vCity;
	}
	if($('#vAddress')){
		 var vAddress = $('#vAddress').val();
		   extra+='&vAddress='+vAddress;
	}
	
	
	//var url = site_url+"/index.php?file=a-ajeditprofile";
	//var pars = extra;
	//alert(url+pars);
	$("#form1").ajaxForm({
		target: '#divmsgid'
		}).submit();
}




function uploadAboutUs()
{
	var extra = '';
	
	if($('#about_company')){
		if($('#about_company').val() ==''){
			$('#divaboutus').html("Please enter text for about you or your company").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			var about_company = $('#about_company').val();
			extra+='&about_company='+about_company;
		}
	}
	if($('#about_exp')){
		if($('#about_exp').val() ==''){
			$('#divaboutus').html("Please  enter text for your experience,qualifications,certifications,education").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			var about_exp = $('#about_exp').val();
			extra+='&about_exp='+about_exp;
		}
	}
	if($('#about_mission')){
		if($('#about_mission').val() ==''){
			$('#divaboutus').html("Please enter text for your mission statement").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			var about_mission = $('#about_mission').val();
			extra+='&about_mission='+about_mission;
		}
	}
	if($('#about_service')){
		if($('#about_service').val() ==''){
			$('#divaboutus').html("Please tell us about your service statement").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			var about_service = $('#about_service').val();
			extra+='&about_service='+about_service;
		}
	}
	var url = site_url+"/index.php?file=a-ajaboutus";
	var pars = extra;
	//alert(url+pars);
	$.post(url+pars,
            function(data) {
		if(data == 'success')
		{
			$.fancybox.close();
			//window.location = '{/literal}{$site_url}{literal}'+'/myprofile/';
		}else{
			$.fancybox.close();
			//window.location = '{/literal}{$site_url}{literal}'+'/myprofile/';
			$('#divImagemsgid').html("error in add aboutus data").addClass('errormsg').fadeTo(900,1);
		}
		
       });
	
}
function finish()
{
	window.location='{/literal}{$site_url}{literal}'+'/myprofile/';
}




function validateMyImages()
{
	if($('#vProfileImage1').val() == '')
	{
		$('#divImagemsgid').html("Please browse your image").addClass('errormsg').fadeTo(900,1);	
	}
	else
	{
		$('#vOperation').val('insert');
		$('#divImagemsgid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
		$("#frmMyProfileImage").ajaxForm({
		target: '#divImagemsgid'
		}).submit();	
	}
	
	
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
	$('#divConmsgid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$("#frmMyContact").ajaxForm({
		target: '#divConmsgid'
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
	$('#showFancy').fancybox({
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
<script language="Javascript">

	$('#showFancy').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'type' : 'iframe',
		helpers : { 
		overlay: {
		opacity: 0.8, 
		css: {'background-color': '#ff0000'} 
		} 
		}
	});

			function callJcorp(){
				$('#cropbox').Jcrop({
					aspectRatio: 3,
					setSelect: [150,50,250,363],
					onSelect: updateCoords
				});
			};
			
			function updateCoords(c)
			{
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);

			
			};

			function checkCoords()
			{
				if (parseInt($('#w').val())) return true;
				alert('Please select a crop region then press submit.');
				return false;
			};

		</script>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
var FB_APPID = '{/literal}{$FB_APPID}{literal}';
$(document).ready(function() {
FB.init({
	    appId  : FB_APPID,
	    status : true, 
	    cookie : true, 
	    xfbml  : true
	  });
});

var accesstoken='';
var username='';
var name = '';
function FBlogin()  
{
	
	FB.login(function(response) {
		
	if (response.authResponse.accessToken) {
		
		$('#fbKey').val(response.authResponse.accessToken);
		accesstoken = response.authResponse.accessToken;
		alert(accesstoken);
	}
	
	if (response.authResponse) {
		
		FB.api('/me', function(response) {
			username = response.username;
			alert(username);
			name = response.name ;
		});
	}
	

	if(username != '' && accesstoken != ''){
		var url = site_url+'/index.php?file=a-ajSaveFacebookToken';
		var pars = '&username='+username+'&accesstoken='+accesstoken+'&name='+name;
		//alert(url+pars);
		$.post(url+pars,
		    function(data) {
			//alert(data);
			if(data > 0){
				$('#isFacebookConnected').html('Your profile is connected with Facebook');	
			}else{
				alert('Error occurs. Please Try Again');
			}			
			//alert(data);
		});
	}else{

		alert('Error occurs. Please Try Again');
	}
	}, {scope: 'email,user_birthday,offline_access,read_stream,publish_stream,publish_actions'});
}

function postOnFB(body)
{
	//alert('hi');
	//var body = 'Reading JS SDK documentation';
	FB.api('/me/feed', 'post', { message: body }, function(response) {
		
	  if (!response || response.error) {
	    //alert('Error occured');
	  } else {
	    //alert('QME is now Connected with Facebook');
	  }
	});
}

</script>

{/literal}