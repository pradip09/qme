<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body">
	
		{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>QME Connections</h1>
		</div>
		<div class="cl"></div>
		<div class="ProcessingIndication Navigation Myaccount" id="addqmein_loading">Please wait while your qmein is uploading.</div>
		<div class="ProcessingIndication Navigation Myaccount" id="addqmecount_loading">Please wait while number of members are counting.</div>
		<div id="addqmein">
			<form id="frmQmeIn" name="frmQmeIn" method="post">
				<input type="hidden" name="iQmeInId" id="iQmeInId" value="{$db_qmein[0].iQmeInId}" />
				<input type="hidden" name="mode" id="mode" value="{$mode}" />
				<div id="qmeinMsg" style="text-align:center;line-height:24px; color:red; font-size:18px;"></div>
				<div class="QmeinContentPart">
					<div class="QmeinContentTopTxt"> QME Connection allows you to create high-value friendships and connections in MYQME. Select cirteria to search for new QME members to connect with, as well as businesses, mentors
						or professionals in a similar field </div>
					<div class="QmeinInput">
						<h4>Who Would you like to connect With ?</h4>
						<span>
						<input type="text" value="{$db_qmein[0].Connect_With}" name="Connect_With" id="Connect_With"/>
						</span> Consultants, designer, soccer player, hunters, fishermans, singer, photographer, teachers, poker players..... </div>
					<div class="QmeinInputSelect">
						<h4>Select Skill you want connections with?</h4>
						<div class="myprofile_select_box"> {if  $db_skill|@count gt 0}
							<div class="event_skill">
							{section name=j loop=$db_skill}
								<div class="event_slikk_inner"><input type="checkbox" value="{$db_skill[j].iSkillId}" id="iSkillId" name="iSkillId[]" {if $db_skill[j].iSkillId|in_array:$relatedArr}checked{/if}/>   {$db_skill[j].vSkill}</div>
							{/section}
							</div>
							{/if} </div>
					</div>
					<div id="otherskill">
						<input type="text" name="vOtherSkill" class="inpuname" placeholder="Other Skill" id="vOtherSkill" value="{$db_qmein[0].vOtherSkill}" title="Other Skill"/>
						<br/>
					</div>
					<div class="QmeinInputSelect">
						<h4>Select Interest you want connections with?</h4>
						<div class="myprofile_select_box"> {if  $db_interest|@count gt 0}
							<div class="event_skill">
							{section name=j loop=$db_interest}
								<div class="event_slikk_inner"><input type="checkbox" value="{$db_interest[j].iInterestId}" id="iInterestId" name="iInterestId[]" {if $db_interest[j].iInterestId|in_array:$relatedArrIntrest}checked{/if}/>   {$db_interest[j].vInterest}</div>
							{/section}
							</div>
							{/if} </div>
					</div>
					<div id="otherintrest">
						<input type="text" name="vOtherInterest" class="inpuname" placeholder="Other Interest" id="vOtherInterest" value="{$db_qmein[0].vOtherInterest}" title="Other Interest"/>
						<br/>
					</div>
					<div class="QmeinComboBox">
						<!--<h4>Select Your Search Location </h4>-->
						<h4 style="padding-bottom:0px;padding-top:0px;">Country :</h4>
						<div style="margin-bottom:10px;">
							<select name="iCountryId" id="iCountryId" onchange="getStateQmeIn(this.value);" style="width:305px;">
								<option value="">---- Select Country ----</option>
								<option value='223' {if '223' eq $db_qmein[0].iCountryId}selected{/if}>United States</option>
									{if  $db_country|@count gt 0}
									{section name=i loop=$db_country}
									{if $db_country[i].iCountryId neq 223}
								<option value='{$db_country[i].iCountryId}' {if $db_country[i].iCountryId eq $db_qmein[0].iCountryId}selected{/if}>{$db_country[i].vCountry}</option>
								         {/if}
									{/section}
									{/if}
								
							</select>
						</div>
						<h4 style="padding-bottom:0px;padding-top:0px;">State :</h4>
						<div id="showallstatesqmein"> </div>
						<h4 style="padding-bottom:0px;padding-top:0px;">City name:</h4>
						<input type="text" name="vCity" class="inpuname" placeholder="Enter City" id="vCity" value="{$db_qmein[0].vCity}"/>
						<br/>
						<h4 style="padding-bottom:0px;padding-top:0px;">Zip code :</h4>
						<input type="text" name="vZip" class="inpuname" placeholder="Enter Zip" id="vZip" value="{$db_qmein[0].vZip}" onkeypress="return checkmobile(event);"/>
						<br />
						<h4 style="padding-bottom:0px;padding-top:0px;">Mile radius from Zip code:</h4>
						<input type="text" name="vMile" class="inpuname" placeholder="Enter Mile" id="vMile"  value="{$db_qmein[0].vMile}" onkeypress="return checkmobile(event);"/>
						
						<div><a href="#" onclick="getCountQmeIn(this.value);" style="text-decoration:none;" ><input type="button" style="cursor:pointer;" value="Search" class="cone_save_btnbg" title="Click search to get your result"></a></div>
						
						<h4>Numbers of members who match your search</h4>
						<div class="CountryInput">
							<div class="QeInputBox"> <span>
								<input type="text" id="qmenet" placeholder="Qme Network(0)" name="qmenet" readonly="true"  />
								</span>
								<!--<div class="CancleImg"><img src="{$tconfig["front_images"]}cancle-img.gif" /></div>-->
							</div>
							<div class="send_group_checkbox"> Invite this group?&nbsp;
								<input type="checkbox" id="eHideEvent" value="Yes"/>
								&nbsp; Yes </div>
							<div class="QeInputBox"> <span>
								<input type="text" placeholder="Top (0)by activities in search category" id="topcount" readonly="true"  />
								</span>
								<!--<div class="CancleImg"><img src="{$tconfig["front_images"]}cancle-img.gif" /></div>-->
							</div>
							<div class="send_group_checkbox"> Invite this group?&nbsp;
								<input type="checkbox" id="inviteqmein" value="Yes"/>
								&nbsp; Yes </div>
						</div>
						<div class="points_for_connection"> Points offered to each member to connect<br />
							<input type="text" value="{$db_qmein[0].iPointsWhenConnect}" name="iPointsWhenConnect" id="iPointsWhenConnect" onkeypress="return checkmobile(event);"/>
						</div>
						<div class="EstimatedReachTxt"> ESTIMATED REACH:<br />
							<span id="total">0</span>
						</div>
					</div>
				</div>
			</form>
			<div class="Submit_Opp_btn1"> <a href="#" onclick="validateQmeInForm();"><img src="{$tconfig["front_images"]}submit-btn.gif" /></a> <a href="{$site_url}/qmein"><img src="{$tconfig["front_images"]}cancle.png"></a> </div>
		</div>
	</div>
	<div class="cl"></div>
</div>
</div>

{literal}
<script type="text/javascript" language="javascript">
//getCountQmeIn('{/literal}{$db_qmein[0].iCountryId}{literal}','{/literal}{$db_qmein[0].vCity}{literal}','{/literal}{$db_qmein[0].vZip}{literal}','{/literal}{$db_qmein[0].vMile}{literal}');
function getCountQmeIn()
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
	
	$('#addqmecount_loading').show();
	var allData = $('#frmQmeIn').serialize();
	//alert (allData);
	var url = site_url+"/index.php?file=a-ajqmeincount";
	var pars = '&'+allData;
	//var pars = extra;
	//alert(url+pars);
	$.post(url+pars,
            function(data) {
		$('#addqmecount_loading').hide();
		var test = eval(data);
		//alert(test[0]);
		$('#qmenet').val("Qme Network("+test[0]+')');
		$('#qmenet').addClass("grncount");
		$('#topcount').val("Top ("+test[1]+')'+ "by activities in search category");
		$('#topcount').addClass("grncount");
		document.getElementById('total').innerHTML=test[2];
		
	});
}
getStateQmeIn('{/literal}{$db_qmein[0].iCountryId}{literal}','{/literal}{$db_qmein[0].iQmeInId}{literal}');
$(document).ready(function() {
		$('#box1').selectbox({debug: true});
		$('#box2').selectbox({debug: true});
		$('#box3').selectbox({debug: true});
		$('#box4').selectbox({debug: true});
		$('#box5').selectbox({debug: true});
		$('#box6').selectbox({debug: true});
	});
</script>

<script>
function validateQmeInForm(){
	
	var extra='';
	if($('#Connect_With')){
		if($('#Connect_With').val() ==''){
			$('#qmeinMsg').html("Please enter Who Would you like to connect With?").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var Connect_With = $('#Connect_With').val();
			extra+='&Connect_With='+Connect_With;
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
		$('#qmeinMsg').html("Please select at least one Skill").addClass('errormsg').fadeTo(900,1);
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
		$('#qmeinMsg').html("Please select at least one Interest").addClass('errormsg').fadeTo(900,1);
                //alert("Please select at least one Interest.");
                chks[0].focus();
                return false;
        }
	if($('#iSkillId')){
		if($('#iSkillId').val() == null){
			$('#qmeinMsg').html("Please select Skills").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var iSkillId = $('#iSkillId').val();
			extra+='&iSkillId='+iSkillId;
		}
	}
	if($('#iInterestId')){
		if($('#iInterestId').val() ==null){
			$('#qmeinMsg').html("Please select Interest").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var iInterestId = $('#iInterestId').val();
			extra+='&iInterestId='+iInterestId;
		}
	}
	
	if($('#iCountryId')){
		if($('#iCountryId').val() ==''){
			$('#qmeinMsg').html("Please select Country").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var iStateId = $('#iStateId').val();
			extra+='&iStateId='+iStateId;
		}
	}
	if($('#iStateId')){
		if($('#iStateId').val() ==''){
			$('#qmeinMsg').html("Please select the State where the person need to be located").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var iStateId = $('#iStateId').val();
			extra+='&iStateId='+iStateId;
		}
	}
	if($('#vCity')){
		if($('#vCity').val() ==''){
			$('#qmeinMsg').html("Please enter city name").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vCity = $('#vCity').val();
			extra+='&vCity='+vCity;
		}
	}
	if($('#vZip')){
		if($('#vZip').val() ==''){
			$('#qmeinMsg').html("Please enter zip code").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vZip = $('#vZip').val();
			extra+='&vZip='+vZip;
		}
	}
	if($('#vMile')){
		if($('#vMile').val() ==''){
			$('#qmeinMsg').html("Please enter Mile").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vMile = $('#vMile').val();
			extra+='&vMile='+vMile;
		}
	}
	if($('#iPointsWhenConnect')){
		if($('#iPointsWhenConnect').val() ==''){
			$('#qmeinMsg').html("Please enter Points offered to each member to connect").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var iPointsWhenConnect = $('#iPointsWhenConnect').val();
			extra+='&iPointsWhenConnect='+iPointsWhenConnect;
		}
	}
	//alert(extra);
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
	$("#qmeinMsg").removeClass('popup-err').addClass('errormsg').fadeIn(1000);
        $('#addqmein').hide();
        $('#addqmein_loading').show();	
	var allData = $('#frmQmeIn').serialize();
	
	if(extra !='')
	{
		allData = allData+extra_one;
	}
	
	var url = site_url+"/index.php?file=a-ajaddqmein";
	var pars = '&'+allData;
	$.post(url+pars,
        function(data) {
		
		$('#addqmein_loading').hide();
		if(data != ''){
			window.location='{/literal}{$site_url}{literal}'+'/qmein/';
		}
		
	});
}

function checkmobile(events)
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