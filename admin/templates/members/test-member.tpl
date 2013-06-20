<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<script language="JavaScript" src="{$tconfig.tcp_javascript}datetimepicker.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<script>
stateArr = new Array({$stateArr});
</script>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Member</h2>
		{else}
		
		<h2 class="left">Edit Member</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=m-member_a" method="post" enctype="multipart/form-data">
				<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_mem[0].vMyImage}" />
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<div style="float:left;">
				<div style="border:#747474 solid 1px; padding:20px 20px 10px 20px;border-radius:10px; width:570px; position:relative;">
				
				 <div style="position:absolute;top: -6px;line-height: 7px; font-size:18px;color: #333333; background: none repeat scroll 0 0 #f8f8f8; padding:0 3px;">Personal Information</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Name:</strong></label>
					<input type="text" id="vName" name="Data[vName]" class="inputbox" value="{$db_mem[0].vName}" lang="*" title="Name"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Email Address:</strong></label>
					<input type="text" id="vEmail"  name="Data[vEmail]" class="inputbox"  lang="{literal}*{E}{/literal}" title="E-mail" value="{$db_mem[0].vEmail}"/>
				</div>
				<!--<div class="inputboxes">
					<label for="textfield"><strong>Password:</strong></label>
					<input type="password" id="vPassword"  name="Data[vPassword]" class="inputbox" lang="{literal}*{/literal}" title="Password" value="{$db_mem[0].vPassword}"/>
				</div>-->
				<div class="inputboxes">
					<label for="textfield"><strong>Gender:</strong></label>
					<select id="eGender" name="Data[eGender]" lang="*">
						<option value="0" selected="selected">Select Gender</option>
						<option value="Male" {if $db_mem[0].eGender eq Male}selected{/if}>Male</option>
						<option value="Female" {if $db_mem[0].eGender eq Female}selected{/if}>Female</option>
						<option value="Unspecified" {if $db_mem[0].eGender eq Unspecified}selected{/if}>Unspecified</option>
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Occupation:</strong></label>
					<input type="text" id="vOccupation" name="Data[vOccupation]" class="inputbox" value="{$db_mem[0].vOccupation}" lang="*" title="Occupation"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Education:</strong></label>
					<input type="text" id="vEducation" name="Data[vEducation]" class="inputbox" value="{$db_mem[0].vEducation}" lang="*" title="Education"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Birthdate:</strong></label>
					<input type="text" id="dBirthdate" name="Data[dBirthdate]" class="inputbox" value="{$db_mem[0].dBirthdate}" lang="*" title="Birthdate"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Skillset:</strong></label>
					{if $skill|@count gt 0}
					<select id="eSkillset" name="Data[eSkillset]">
					{section name=i loop=$skill}
					<option value="{$skill[i]}"{if $db_mem[0].eSkillset eq {$skill[i]}}selected{/if}>{$skill[i]}</option>
					{/section}
					{/if}
					</select>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Other Skill?:</strong></label>
					<input type="text" id="vOtherSkill" name="Data[vOtherSkill]" class="inputbox" value="{$db_mem[0].vOtherSkill}" title="Other Skill"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Interest:</strong></label>
					{if $interest|@count gt 0}
					<select multiple name="eInterest[]" id="eInterest">
					{section name=i loop=$interest}
					<option value="{$interest[i]}"{if $interest[i]|in_array:$relatedArr}selected{/if}>{$interest[i]}</option>
					{/section}
					{/if}
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>About:</strong></label>
					<textarea type="text" id="vAbout" name="Data[vAbout]" class="inputbox" lang="*"  title="About" rows="10" cols="50">{$db_mem[0].vAbout}</textarea>
				</div>
				
			</div>
				<div style="border:#747474 solid 1px; padding:20px 20px 10px 20px;border-radius:10px; width:570px; position:relative;margin:10px 0;">
				<div style="position:absolute;top: -6px;line-height: 7px; font-size:18px;color: #333333; background: none repeat scroll 0 0 #f8f8f8; padding:0 3px;">Contact Information</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Address:</strong></label>
					<input type="text" id="vAddress" name="Data[vAddress]" class="inputbox" value="{$db_mem[0].vAddress}" lang="*" title="Address"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Phone:</strong></label>
					<input type="text" id="vPhone"  name="Data[vPhone]" class="inputbox" lang="{literal}*N{/literal}" title="Phone" value="{$db_mem[0].vPhone}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>City:</strong></label>
					<input type="text" id="vCity" name="Data[vCity]" class="inputbox" value="{$db_mem[0].vCity}" lang="*" title="City"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Country:</strong></label>
					<input type="text" id="vCountry" name="Data[vCountry]" class="inputbox" value="{$db_mem[0].vCountry}" lang="*" title="Country"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>State:</strong></label>
					<input type="text" id="vState" name="Data[vState]" class="inputbox" value="{$db_mem[0].vState}" lang="*" title="State"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>ZipCode</strong></label>
					<input type="text" id="iZipCode" name="Data[iZipCode]" class="inputbox" value="{$db_mem[0].iZipCode}" lang="*" title="ZipCode"/>
				</div>
				</div>
			
				
				<div style="border:#747474 solid 1px; padding:20px 20px 10px 20px;border-radius:10px; width:570px; position:relative;margin:10px 0;">
				<!--<div style=" height:26px; background:#333; font-size:14px; line-height:25px; color:#fff; text-align:left; padding:0 5px;">Select A Banner</div>-->	
				<div style="position:absolute;top: -6px;line-height: 7px; font-size:18px;color: #333333; background: none repeat scroll 0 0 #f8f8f8; padding:0 3px;">My Images</div>
				<div style="display:block;">
				<div style="width:303px;">
				<label for="textfield"><strong>Upload new image:</strong></label>
				<input type="file" id="vMyImage" name="vMyImage" class="inputbox" value="{$db_mem[0].vMyImage}"  title="MyImage" onchange="CheckValidFile(this.value,this.name)"/>
				</div>
				{if $db_mem[0].vMyImage neq ''}
				
				<div style="float:left; width:450px;">
						<!--<div style="float:left; margin:26px 5px 0px 26px;"><a href="#viewmember" id="member_image"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
						<p style="margin:26px 0 10px 0;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="ImageDelete();"/></p>-->
						
						<div style="display:none;">
						<div id="viewmember">
							<div class="popup_box">
								<div><img src="{$tconfig["tsite_upload_images_member"]}{$db_mem[0].iMemberId}/{$db_mem[0].vMyImage}" /></div>
								
							</div>
						</div>
						</div>
					
				</div>
				<label for="textfield"><strong>Profile Image:</strong></label>
				
				<a href="#viewmember" id="profile_image"><img src="{$tconfig["tsite_upload_images_member"]}{$db_mem[0].iMemberId}/{$db_mem[0].vMyImage}" height="100" width="100"/><a/>{$db_mem[0].vMyImage}
				
				
				</div>
				<p>
					<label for="textfield"><strong>Delete Profile Image:</strong>
					<input type="checkbox" id="eDeleteProfileImage" name="eDeleteProfileImage" onclick="ImageDelete();"value="1" {if $db_mem[0].eDeleteProfileImage eq 1}checked{/if}/></label>
				</p>
				{/if}
				<!--<p>
					<label for="textfield"><strong>Multiple Image:</strong>
					<input name="fileImage[]" type="file" multiple="true" />
					</label>
				</p>-->
				

				
				<td width="50%" valign="top">
				<div style="float:left; border:#747474 solid 1px; padding:20px 20px 10px 20px;border-radius:10px; width:495px;position:relative;">
				<div style="position:absolute;top: -6px;line-height: 7px; font-size:18px;color: #333333; background: none repeat scroll 0 0 #f8f8f8; padding:0 3px;">Social Networking</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Facebook:</strong>
					<a href="http://www.facebook.com" style="text-decoration:none;"><input type="button" style="cursor:pointer;" name="facebook" value="Facebook"></a>Connect Your Profile With FaceBook</label>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Facebook key:</strong>
					<input type="text" id="vFacebookkey"  name="Data[vFacebookkey]" class="inputbox"  title="Facebook key" value="{$db_mem[0].vFacebookkey}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Twitter:</strong>
					<a href="http://www.twitter.com" style="text-decoration:none;"><input type="button" style="cursor:pointer;" name="facebook" value="Twitter"></a>Connect Your Profile With Twitter</label>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Twitter key:</strong>
					<input type="text" id="vTwitterkey"  name="Data[vTwitterkey]" class="inputbox"  title="Twitter key" value="{$db_mem[0].vTwitterkey}"/>
				</div>
				<div class="inputboxes">
				<label for="textfield"><strong>Show Email Address as Public:</strong></label>
				<input type="checkbox" id="eShowEmailAddress" name="eShowEmailAddress" value="Yes" {if $db_mem[0].eShowEmailAddress eq Yes}checked{/if}>
				</div>
				<div class="inputboxes">
				<label for="textfield"><strong>Hide Online Status:</strong></label>
				<input type="checkbox" id="eHideOnlineStatus" name="eHideOnlineStatus" value="Yes" {if $db_mem[0].eHideOnlineStatus eq Yes}checked{/if}>
				</div>
				<div class="inputboxes">
				<label for="textfield"><strong>Share Your Favourites?:</strong></label>
				<input type="checkbox" id="eShareFavourites" name="eShareFavourites" value="Yes" {if $db_mem[0].eShareFavourites eq Yes}checked{/if}>
				</div>
				<div class="inputboxes">
				<label for="textfield"><strong>Share Your Fans:</strong></label>
				<input type="checkbox" id="eShareYourFans" name="eShareYourFans" value="Yes" {if $db_mem[0].eShareYourFans eq Yes}checked{/if}>
				</div>
				
				
			</td>
				
			</tr>
			<tr>
			
			<td>
					
				{if $mode eq add}
   				<input type="submit" value="Add Member" class="btn" onclick="return validate(document.frmadd);" title="Add Member"/>
   				{else}
   				<input type="submit" value="Edit Member" class="btn" onclick="return validate(document.frmadd);" title="Edit Member"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</td>
			
			</tr>	
			</table>	
		</form>
		
	</div>    
</div>
</div>
{literal}
<script>
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
		
		if($('#frmadd')){
			$('#frmadd').submit();
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
$(document).ready(function(){
	$('#profile_image').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});

</script>

 
<script type="text/javascript">
 $(document).ready(function() {
 $(function() {$('#dBirthdate').datepicker({dateFormat: 'yy-mm-dd'});});
 });
 </script>

{/literal}




			