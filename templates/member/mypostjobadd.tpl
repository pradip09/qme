<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body" style="padding-bottom:0px;"> {include file="member/myaccountleft.tpl"} </div>
<div class="desboard-right">
	<div class="MyVedioTitle">
		<h1>Post Job</h1>
	</div>
	<div class="cl"></div>
	{if $mode eq 'add'}
	<div class="AddneweventTitle" style="margin-top:15px;">ADD post JOB</div>
	{else}
	<div class="AddneweventTitle">EDIT post JOB</div>
	{/if}
	<div class="ProcessingIndication Navigation Myaccount" id="addjob_loading">Please wait while your job is uploading.</div>
	<div class="ProcessingIndication Navigation Myaccount" id="addjobcount_loading">Please wait while number of members are counting.</div>
	<div id="addjob" class="QmeinContentPart PostInnerContentPart">
		<div class="BroCampToptxt">Post Your Job to find Professionals to do your next Project. Vet them on QME
			see their Work and more....</div>
		<form id="frmPostJob" name="frmPostJob" method="post">
			<input type="hidden" name="iPostJobId" id="iPostJobId" value="{$db_postjob[0].iPostJobId}" />
			<input type="hidden" name="mode" id="mode" value="{$mode}" />
			
			<div id="postjobMsg" style="text-align:center;line-height:24px; color:red; font-size:18px;"></div>
			<div class="QmeinInput">
				<h4>What skill are you looking for? </h4>
				<span>
				<input type="text" id="vSkill" class="addbginput" name="vSkill" value="{$db_postjob[0].vSkill}" />
				</span> Consultants, Producers, Musicions, Designeres , 
				manufactures, developers...... </div>
			<div class="QmeinInputSelect">
				<h4>What do you need this person to do? </h4>
				<textarea id="tDescription" name="tDescription" cols="2" rows="2" >{$db_postjob[0].tDescription}</textarea>
				<span class="smalltxt">Write a detailed description of the duties and 
				responsibilities you expect to be completed by
				this person. </span>
			</div>
			<div class="SelctBoxCombo" style="margin-top: 47px;">
				<h4><strong>Skill </strong>:</h4>
				<div class="myprofile_select_box"> {if  $db_skill|@count gt 0}
					<div class="event_skill">
					{section name=j loop=$db_skill}
						<div class="event_slikk_inner"><input type="checkbox" value="{$db_skill[j].iSkillId}" id="iSkillId" name="iSkillId[]" {if $db_skill[j].iSkillId|in_array:$relatedArr}checked{/if} style="margin-right:4px;"/>   {$db_skill[j].vSkill}</div>
					{/section}
					</div>
					{/if}
				</div>
		        </div>
			<div class="QmeinInputSelect">
						<h4><strong>Interest </strong>:</h4>
						<div class="myprofile_select_box"> {if  $db_interest|@count gt 0}
							<div class="event_skill">
							{section name=j loop=$db_interest}
								<div class="event_slikk_inner"><input type="checkbox" value="{$db_interest[j].iInterestId}" id="iInterestId" name="iInterestId[]" {if $db_interest[j].iInterestId|in_array:$relatedArrIntrest}checked{/if} style="margin-right:4px;"/>   {$db_interest[j].vInterest}</div>
							{/section}
							</div>
							{/if} </div>
					</div>
				<div id="otherintrest">
					<input type="text" name="vOtherInterest" class="inpuname" placeholder="Other Interest" id="vOtherInterest" value="{$db_qmein[0].vOtherInterest}" title="Other Interest"/>
					<br/>
				</div>
			<div class="SelctBoxCombo">
				<h4>Where does this person need to be located ?</h4>
				<h4 style="padding-bottom:0px;padding-top:0px;">Country :</h4>
				<div style="margin-bottom:10px;">
					<select name="iCountryId" id="iCountryId" onchange="getStatePostjob(this.value);" style="width:305px;">
						<option value="">---- Select Country ----</option>
						<option value='223' {if '223' eq $db_postjob[0].iCountryId}selected{/if}>United States</option>	
							
						{if  $db_country|@count gt 0}
						{section name=i loop=$db_country}
						
						{if $db_country[i].iCountryId neq 223}
						<option value='{$db_country[i].iCountryId}' {if $db_country[i].iCountryId eq $db_postjob[0].iCountryId}selected{/if}>{$db_country[i].vCountry}</option>
						{/if}
							
						{/section}
						{/if}
					
						
					</select>
				</div>
				<h4 style="padding-bottom:0px;padding-top:0px;">State :</h4>
				<div class="displaystate"> </div>
				<h4 style="padding-bottom:0px;padding-top:0px;">City name:</h4>
				<input type="text" name="vCity" class="inpuname" placeholder="Enter City" id="vCity" value="{$db_postjob[0].vCity}"/>
				<br/>
				<h4 style="padding-bottom:0px;padding-top:0px;">Zip code :</h4>
				<input type="text" name="vZip" class="inpuname" placeholder="Enter Zip" id="vZip" value="{$db_postjob[0].vZip}" onkeypress="return checknum(event);"/>
				<br />
				<h4 style="padding-bottom:0px;padding-top:0px;">Mile radius from Zip code to search :</h4>
				<input type="text" name="vMile" class="inpuname" placeholder="Enter Mile" id="vMile" value="{$db_postjob[0].vMile}" onkeypress="return checknum(event);"/>
			</div>
			<div><a href="#" onclick="getCntpostjob(this.value);" style="text-decoration:none;" ><input type="button" style="cursor:pointer;" value="Search" class="cone_save_btnbg" title="Click search to get your result"></a></div>
			<h4>WHO CAN SEE THIS OPPORTUNITY :</h4>
			<div class="CountryInput BroCampInput">
				<input type="text" id="qmenet" placeholder="Qme Network (0)"/>
				<div class="send_group_checkbox"> Invite this group?&nbsp;
					<input type="checkbox" id="eHideEvent" value="Yes" style="margin-top: 5px;margin-right: 4px;"/>
					&nbsp; Yes </div>
				<input type="text" placeholder="People with Relevant Skills(0)" id="relevent" />
				<div class="send_group_checkbox"> Invite this group?&nbsp;
					<input type="checkbox" id="inviteqmein" value="Yes" style="margin-top: 5px;margin-right: 4px;"/>
					&nbsp; Yes </div>
			</div>
			<div class="EstimatedReachTxt"> ESTIMATED REACH :<br />
				<span id="total">0</span> </div>
		</form>
		<div class="submitbutton_new" onclick="validatePostJobForm();" > <a href="#">
			<input type="image" src="{$tconfig["front_images"]}submit-btn.gif" style="cursor:pointer;" />
			</a> <a href="{$site_url}/mypostjob"><img src="{$tconfig["front_images"]}cancle.png" style="cursor:pointer;"></a> </div>
	</div>
</div>
<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript" language="javascript">
getStatePostjob('{/literal}{$db_postjob[0].iCountryId}{literal}','{/literal}{$db_postjob[0].iPostJobId}{literal}');
function getCntpostjob()
{
var extra ='';
var chkss = document.getElementsByName('iSkillId[]');
        var hasChecked = false;
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chkss.length; i++)
        {
                if (chkss[i].checked)
                {
                        hasChecked = true;
                        break;
                }
        }
        // if ishasChecked is false then throw the error message
        if (!hasChecked)
        {
                alert("Please select at least one Skill.");
                chkss[0].focus();
                return false;
        }
var chks = document.getElementsByName('iInterestId[]');
        var hasChecked = false;
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chks.length; i++)
        {
                if (chks[i].checked)
                {
                        hasChecked = true;
                        break;
                }
        }
        // if ishasChecked is false then throw the error message
        if (!hasChecked)
        {
                alert("Please select at least one Interest.");
                chks[0].focus();
                return false;
        }

if($('#iInterestId')){
       if($('#iInterestId').val() ==''){
	       alert("Please Select at least  one Interest");
	       return false;
       }else{
		var iInterestId = $('#iInterestId').val();
	       extra+='&iInterestId='+iInterestId;
       }
}
if($('#iSkillId')){
        if($('#iSkillId').val() ==''){
	       alert("Please Select at least one Skill");
	       return false;
       }else{
		var iSkillId = $('#iSkillId').val();
	       extra+='&iSkillId='+iSkillId;
       }
}
if($('#iCountryId')){
       if($('#iCountryId').val() ==''){
	       alert("Please Select your Country");
	       return false;
       }else{
		var iCountryId = $('#iCountryId').val();
	       extra+='&iCountryId='+iCountryId;
       }
}
if($('#iStateId')){
       if($('#iStateId').val() ==''){
	       alert("Please Select your State");
	       return false;
       }else{
		var iStateId = $('#iStateId').val();
	       extra+='&iStateId='+iStateId;
       }
}        
if($('#vCity')){
       if($('#vCity').val() ==''){
	       alert("Please enter your City");
	       return false;
       }else{
		var vCity = $('#vCity').val();
	       extra+='&vCity='+vCity;
       }
}        
if($('#vZip')){
       if($('#vZip').val() ==''){
	       alert("Please enter Zip code");
	       return false;
       }else{
		var vZip = $('#vZip').val();
	       extra+='&vZip='+vZip;
       }
} 	 
if($('#vMile')){
       if($('#vMile').val() ==''){
	       alert("Please enter Mile");
	       return false;
       }else{
		var vMile = $('#vMile').val();
	       extra+='&vMile='+vMile;
       }
}        
        
	//alert (extra);
	
	$('#addjobcount_loading').show();
	var allData = $('#frmPostJob').serialize();
	//alert (allData);
	var url = site_url+"/index.php?file=a-ajpostjobmemcnt";
	var pars = '&'+allData;
	//var pars = extra;
	//alert(url+pars);
	$.post(url+pars,
            function(data) {
		$('#addjobcount_loading').hide();
		var test = eval(data);
		//alert(test[0]);
		$('#qmenet').val("Qme Network("+test[0]+')');
		$('#qmenet').addClass("grncount");
		$('#relevent').val("People with Relevant Skills("+test[1]+')'+"");
		$('#relevent').addClass("grncount");
		document.getElementById('total').innerHTML=test[2];
		
	});
}
</script>
<script type="text/javascript" language="javascript">


$(document).ready(function() {
		$('#box1').selectbox({debug: true});
		$('#box2').selectbox({debug: true});
		$('#box3').selectbox({debug: true});
		$('#box4').selectbox({debug: true});
		$('#box5').selectbox({debug: true});
		$('#box6').selectbox({debug: true});
		$('#iStateId').selectbox({debug: true});
		
	});


function validatePostJobForm(){
	
	var extra='';
	if($('#vSkill')){
		if($('#vSkill').val() ==''){
			$('#postjobMsg').html("Please enter Skill, you are looking for").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vSkill = $('#vSkill').val();
			extra+='&vSkill='+vSkill;
		}
	}
	if($('#tDescription')){
		if($('#tDescription').val() ==''){
			$('#postjobMsg').html("Please describe 'What do you need this person to do?'").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var tDescription = $('#tDescription').val();
			extra+='&tDescription='+tDescription;
		}
	}
	var chkss = document.getElementsByName('iSkillId[]');
        var hasChecked = false;
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chkss.length; i++)
        {
                if (chkss[i].checked)
                {
                        hasChecked = true;
                        break;
                }
        }
        // if ishasChecked is false then throw the error message
        if (!hasChecked)
        {
                //alert("Please select at least one Skill.");
		$('#postjobMsg').html("Please select at least one Skill").addClass('errormsg').fadeTo(900,1);
                chkss[0].focus();
                return false;
        }
	var chks = document.getElementsByName('iInterestId[]');
        var hasChecked = false;
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chks.length; i++)
        {
                if (chks[i].checked)
                {
                        hasChecked = true;
                        break;
                }
        }
        // if ishasChecked is false then throw the error message
        if (!hasChecked)
        {
		$('#postjobMsg').html("Please select at least one Interest").addClass('errormsg').fadeTo(900,1);
                //alert("Please select at least one Interest.");
                chks[0].focus();
                return false;
        }
	if($('#iSkillId')){
		if($('#iSkillId').val() == null){
			$('#postjobMsg').html("Please select Skills").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var iSkillId = $('#iSkillId').val();
			extra+='&iSkillId='+iSkillId;
		}
	}
	if($('#iInterestId')){
		if($('#iInterestId').val() ==null){
			$('#postjobMsg').html("Please select Interest").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var iInterestId = $('#iInterestId').val();
			extra+='&iInterestId='+iInterestId;
		}
	}
	if($('#iCountryId')){
		if($('#iCountryId').val() ==''){
			$('#postjobMsg').html("Please select your Country").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var iCountryId = $('#iCountryId').val();
			extra+='&iCountryId='+iCountryId;
		}
	}
	if($('#iStateId')){
		if($('#iStateId').val() ==''){
			$('#postjobMsg').html("Please select the State where the person need to be located").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var iStateId = $('#iStateId').val();
			extra+='&iStateId='+iStateId;
		}
	}
	if($('#vCity')){
		if($('#vCity').val() ==''){
			$('#postjobMsg').html("Please enter City name").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vCity = $('#vCity').val();
			extra+='&vCity='+vCity;
		}
	}
	if($('#vZip')){
		if($('#vZip').val() ==''){
			$('#postjobMsg').html("Please enter zip code").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vZip = $('#vZip').val();
			extra+='&vZip='+vZip;
		}
	}
	if($('#vMile')){
		if($('#vMile').val() ==''){
			$('#postjobMsg').html("Please enter Mile").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vMile = $('#vMile').val();
			extra+='&vMile='+vMile;
		}
	}
	var extra_one = '';
	
	if($('#eHideEvent'))
	{
		if ($('#eHideEvent').is(':checked')) {
				eHideEvent.value='Yes';
		} else {
				eHideEvent.value='No';
		}
		extra_one='&eHideEvent='+eHideEvent.value;
	}
	if($('#inviteqmein'))
	{
		if ($('#inviteqmein').is(':checked')) {
				inviteqmein.value='Yes';
		} else {
				inviteqmein.value='No';
		}
		extra_one+='&inviteqmein='+inviteqmein.value;
	}
	//alert(extra);
	
	$("#postjobMsg").removeClass('popup-err').addClass('errormsg').fadeIn(1000);
	 $('#addjob').hide();
	$('#addjob_loading').show();
	var allData = $('#frmPostJob').serialize();
	if(extra !='')
	{
		allData = allData+extra_one;
	}
	var url = site_url+"/index.php?file=a-ajpostjob";
	var pars = '&'+allData;
	//alert(url+pars);
	$.post(url+pars,
        function(data) {
		$('#addjob_loading').hide();		
		if(data == 'success'){
			window.location='{/literal}{$site_url}{literal}'+'/mypostjob/';
		}
		else{
			
		}
		
	});
}

function checknum(events)
{
     
	var unicodes=events.charCode? events.charCode :events.keyCode;
	//alert(unicodes);
	if (unicodes!=8)
	{ //backspace

	        if( ((unicodes>47 && unicodes<58) || unicodes == 43 || unicodes == 46 )){
	            return true;
		}else{
			return false;
		}
	}
}
</script>
{/literal} 