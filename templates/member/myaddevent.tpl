<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="http://jqueryui.com/ui/jquery.ui.datepicker.js"></script>
<script language="JavaScript" src="http://jqueryui.com/ui/jquery.ui.widget.js"></script>
<script language="JavaScript" src="http://jqueryui.com/ui/jquery.ui.core.js"></script>
<script language="JavaScript" src="http://jqueryui.com/jquery-1.7.2.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<link rel="stylesheet" href="{$tconfig["front_javascript"]}datepicker/css/jquery.datepick.css" type="text/css" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}datepicker/js/jquery.datepick.js"></script>

<div id="services_box" class="desboard_body">
	
		{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right" style="min-height:706px;">
		<div class="MyVedioTitle">
			<h1>My Events</h1>
		</div>
		<div class="cl"></div>
		<div class="ProcessingIndication Navigation Myaccount" id="addevent_loading">Please wait while your event is uploading...</div>
		<div id="addevent" class="MyEventContentPart">
			<div id="divContactmsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"></div>
			<form id="frmMyEvent" name="frmMyEvent" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajsaveevent">
				{if $mode eq add}
				<div class="AddneweventTitle">CREATE EVENT</div>
				{else}
				<div class="AddneweventTitle">Edit event</div>
				{/if}
				<input type="hidden" name="action" id="action" value="{$mode}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$eventsArr[0].vEventImage}" />
				<div class="AddneweventContent">
					<div class="AddneweventLeftPart1">
						<div class="Eventfield">
							<h4>Event Title :</h4>
							<input type="text" name="vTitle" id="vTitle" value="{$eventsArr[0].vTitle}"/>
						</div>
						<div class="Eventfield">
							<h4>Event Location :</h4>
							<input type="text" name="vLocation" id="vLocation" value="{$eventsArr[0].vLocation}"/>
						</div>
						<div class="Eventfield">
							<h4>Event Date :</h4>
							<input type="text" name="dEventDate" id="dEventDate"  value="{$eventsArr[0].dEventDate}"  />
						</div>
						<div class="Eventfield">
							<h4>Event Discription</h4>
							<div class="EventDiscriptionTextarea">
								<textarea id="vDescription" name="vDescription" rows="3" cols="3">{$eventsArr[0].vDescription}</textarea>
							</div>
						</div>
						<div class="HideEvent"> Hide Event :
							<input type="checkbox" name="eHideEvent" id="eHideEvent" value="1" {if $eventsArr[0].eHideEvent eq 1}checked{/if}/>
							<img src="http://192.168.1.12/qme/public/images/question-mark.gif">
						</div>
						<div class="Eventfield" style="margin-top:20px;">
							<h4>Select My event Image :</h4>
							<input type="file" name="vEventImage" id="vEventImage" onchange="CheckValidFile(this.value,this.name)"/>
							{if $eventsArr[0].vEventImage neq ''}
							<div class="viewimage1" style="float:none;"><a href="#view1" id="test"><img src="{$tconfig["front_images"]}view.png"/></a></div>
							<div style="display:none;">
								<div id="view1">
									<div>
										<div><img src="{$tconfig["tsite_upload_images_event"]}{$eventsArr[0].iMemberId}/1_{$eventsArr[0].vEventImage}" /></div>
									</div>
								</div>
							</div>
							{else}
							
							{/if} </div>
						
					</div>
					<div class="eventrightPart">
						<div class="Eventfield1">
							<label>
							<h4> Event Category:</h4>
							</label>
						</div>
						<br/>
						{if  $db_interest|@count gt 0}
						<div class="event_skill">
        					{section name=j loop=$db_interest}
							<div class="event_slikk_inner"><input type="checkbox" value="{$db_interest[j].iInterestId}" id="iInterestId" name="iInterestId[]" {if $db_interest[j].iInterestId|in_array:$relatedArrIntrest}checked{/if}/>   {$db_interest[j].vInterest}</div>
						{/section}
						</div>
						
						
						{/if}
						<div class="Eventfield1" style="padding-top:12px;">
							
							<h4>Other Category:</h4>
							
						</div>
						<div id="otherintrest">
							<input type="text" name="vOtherInterest" class="inpuname_other" placeholder="Other Category" id="vOtherInterest" value="{$eventsArr[0].vOtherInterest}" title="Other Interest"/>
							<br/>
						</div>
						<div class="Eventfield1" style="padding-top:12px;">
							<label>
							<h4>Select groups you want to see this events:</h4>
							</label>
						</div>
						<br/>
						{if  $db_skill|@count gt 0}
						<div class="event_skill">
						{section name=j loop=$db_skill}
							<div class="event_slikk_inner"><input type="checkbox" value="{$db_skill[j].iSkillId}" id="iSkillId" name="iSkillId[]" {if $db_skill[j].iSkillId|in_array:$relatedArr}checked{/if}/>   {$db_skill[j].vSkill}</div>
						{/section}
						</div>
						{/if}
						<div class="Eventfield1" style="padding-top:12px;">
							<h4>Other groups :</h4>
							
						</div>
						<div id="otherskill">
							<input type="text" name="vOtherSkill" class="inpuname_other" placeholder="Other Group" id="vOtherSkill" value="{$eventsArr[0].vOtherSkill}" title="Other Skill"/>
							<br/>
						</div>
						
						
					</div>
				</div>
				<div class="cl"></div>
				
				{if $mode eq add}
				<input type="hidden" value="insert" name="vOperation" id="vOperation"/>
				{else}
				<input type="hidden" name="iEventId" value="{$eventsArr[0].iEventId}">
				<input type="hidden" value="update" name="vOperation" id="vOperation"/>
				{/if}
			</form>
			<div class="submitbutton_myblog"> {if $mode eq add}
			<input type="hidden" value="insert" name="vOperation" id="vOperation"/>
			<a onclick="return validateform();"><img src="{$tconfig["front_images"]}cerate-event.png" style="cursor: pointer;margin-left: 22px; "/></a> {else}
			<input type="hidden" name="iEventId" value="{$eventsArr[0].iEventId}">
			<input type="hidden" value="update" name="vOperation" id="vOperation"/>
			<a onclick="return validateform();"><img src="{$tconfig["front_images"]}edit-cerate-event.png" style="cursor: pointer;margin-left: 22px; "/></a> {/if} <a onclick="return cancel();"><img src="{$tconfig["front_images"]}cancle.png" style="cursor: pointer;"/></a>
		</div>
		</div>
		
	</div>
	<div class="cl"></div>
</div>
<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript">
      $(function() {
	$('#dEventDate').datepick({dateFormat: 'mm-dd-yyyy'});
	
});  
</script>

<script type="text/javascript">


$(document).ready(function(){
	$('#test').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});
function checkprice(events)
{
     
	var unicodes=events.charCode? events.charCode :events.keyCode;
	//alert(unicodes);
	if (unicodes!=8)
	{ //backspace

	        if (unicodes>47 && unicodes<58){
	            return true;
		}else{
		    $('#divContactmsgid').html("Please enter numeric value!").addClass('errormsg').fadeTo(900,1);  
			return false;
		}
	}
}

function validateform(){
        
      
        if($('#vTitle').val() ==''){
    		$('#divContactmsgid').html("Please enter your title!").addClass('errormsg').fadeTo(900,1);
    		return false;
        } 
        else if($('#vLocation').val() ==''){
			$("#divContactmsgid").html('Please enter your location').addClass('errormsg').fadeTo(900,1);
			return false;
		}
		
        else if($('#vDescription').val() ==''){
			$("#divContactmsgid").html('Please enter Event description').addClass('errormsg').fadeTo(900,1);
			return false;
		}    
       else if($('#vItemDescription').val() ==''){
			$('#divContactmsgid').html("Please enter Item description").addClass('errormsg').fadeTo(900,1);
			return false;
		}
        else{   
            $('#divContactmsgid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
            $('#addevent').hide();
            $('#addevent_loading').show();
		$("#frmMyEvent").ajaxForm({
		    target: '#divContactmsgid',
		    success: finish
		    }).submit();

        }        
}
function finish()
{
	window.location='{/literal}{$site_url}{literal}'+'/myevent/';
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

function cancel(){
    window.location='{/literal}{$site_url}{literal}'+'/myevent/';
}
</script>
{/literal} 