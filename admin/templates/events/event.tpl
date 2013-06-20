<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<style type="text/css">
.admin_photo_table th, .admin_photo_table td{ padding:0px;}
</style>
<div class="container" id="tabs">
	<div class="conthead">
		<h2 class="left">My Events</h2>
	</div>
	
	<div class="contentbox" id="tabs-1" style="margin-left:-140px;">
			<form id="frmaddevent" name="frmaddevent" action="index.php?file=e-event_a" method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" id="action" value="{$modeevent}" />
				<input type="hidden" name="actionEvent" id="actionEvent" value="" />
				<input type="hidden" name="iEventId" id="iEventId" value="{$iEventId}" />
				<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}" />
				<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="{$db_eve[0].iMemberId}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_eve[0].vEventImage}" />
				<table align="center" class="photo_edit_table">
					<tr>
					<td>
					<div class="inputboxes ">
						<label for="textfield"><strong>Event Title:</strong></label>
						<input type="text" id="vTitle" name="Data[vTitle]" class="inputbox" value="{$db_eve[0].vTitle}" lang="*" title="Event Title"/>
					</div>			    
					<div class="inputboxes">
						<label for="textfield"><strong>Event Location:</strong></label>
						<input type="text" id="vLocation" name="Data[vLocation]" class="inputbox" value="{$db_eve[0].vLocation}" lang="*" title="Location"/>
					</div>												
					<div class="inputboxes">
						<label for="textfield"><strong>EventDate:</strong></label>
						<input type="text" id="dEventDate" name="Data[dEventDate]" class="inputbox" value="{$db_eve[0].dEventDate}" lang="*" title="EventDate" />
					     
					</div>									               																							
					<div class="inputboxes">
					       <label for="textfield"><strong>Event Description:</strong></label>							
					       <textarea id="vDescription" name="Data[vDescription]" lang="*" title="Text" rows="5" cols="45">{$db_eve[0].vDescription}</textarea>
							
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Interests:<br />(check all that applies,Ctrl to select):</strong></label>
						<br/>
						{if  $db_interest|@count gt 0}
						<div class="event_skill">
							{section name=j loop=$db_interest}
							<div class="event_slikk_inner">
								<input type="checkbox" value="{$db_interest[j].iInterestId}" id="iInterestId" name="iInterestId[]" {if $db_interest[j].iInterestId|in_array:$relatedArrIntrest}checked{/if}/>{$db_interest[j].vInterest}
							</div>
							{/section}
						</div>
						{/if}
					</div>														
					<div class="inputboxes">
						<label for="textfield"><strong>Other interest:</strong></label>
						<input type="text" id="vOtherInterest" name="Data[vOtherInterest]" class="inputbox" value="{$db_eve[0].vOtherInterest}"  title="Otherintrest"/>
					</div>
					<div class="inputboxes">
							<label for="textfield"><strong>Skills:<br />(check all that applies,Ctrl to select)</strong></label>
							<br/>
							{if  $db_skill|@count gt 0}
							<div class="event_skill" style="margin-left:137px;">
								{section name=j loop=$db_skill}
								<div class="event_slikk_inner">
									<input type="checkbox" value="{$db_skill[j].iSkillId}" id="iSkillId" name="iSkillId[]" {if $db_skill[j].iSkillId|in_array:$relatedArrSkill}checked{/if}/>
									{$db_skill[j].vSkill}
								</div>
								{/section}
							</div>
						{/if}
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Other Skills:</strong></label>
						<input type="text" id="vOtherSkill" name="Data[vOtherSkill]" class="inputbox" value="{$db_eve[0].vOtherSkill}"  title="Other Skills"/>
					</div>
					
					
					<div class="inputboxes">
					<label for="textfield"><strong>Event Image:</strong></label>
					{if $db_eve[0].vEventImage eq ''}
					<input type="file" id="vEventImage" name="vEventImage" lang="*"  value="{$db_eve[0].vEventImage}"  title="Image" onchange="CheckValidFile(this.value,this.name)"/>
					{else}
					<input type="file" id="vEventImage" name="vEventImage" value="{$db_eve[0].vEventImage}"  title="Image" onchange="CheckValidFile(this.value,this.name)" style="float:left; width:auto;" />
					<div style="float:left; width:350px;">
					<div style="float:left; margin:0px 5px 0px 26px;"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
					<p style="margin:0px 0 10px 0;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="EventImageDelete();"/></p>
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
								<div><img src="{$tconfig["tsite_upload_images_event"]}{$db_eve[0].iMemberId}/{$db_eve[0].vEventImage}" /></div>
								</div>
							</div>
						</div>
					</div>
					{/if}
					</div>
			<div class="add_photo_cancel">		
			{if $modeevent eq add}
			<input type="submit" value="Add Event" class="btn" onclick="return validate(document.frmaddevent);" title="Add Event"/>
			{else}
			<input type="submit" value="Edit Event" class="btn" onclick="return validate(document.frmaddevent);" title="Edit Event"/>
			{/if}
			<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</div>
			</td>
			</tr>        
	</table>
	</form>
</div>

<form name="frmsearchevent18" id="frmsearchevent18" action="#tab-event" method="post">       
        <table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label><td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword21" name="keyword21" value="{$keyword}" class="inputbox" /></div><td>
				<td width="10%" ><div class="bulkactions">
					<select name="option21" id="option21">
						<option value="vTitle">Event Title</option>
						<option value="eStatus">Status</option>
						
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoptionsrc();"/></div></td>
			</tr>	

		</tbody>			
		</table> 
        </form>

<div class="contentbox contentbox_admin" id="tabs-1">
<form name="frmEventList" id="frmEventList"  action="index.php?file=e-event_a" method="post">       
        <table width="100%" border="0" class="admin_photo_table">
		<input type="hidden" name="action" id="action" value="" />
		<input type="hidden" name="iMemberId" id="iMemberId" value="" />		
		<input type="hidden" name="iEventId" id="iEventId" value=""/>
		<table width="100%" border="0" class="admin_photo_table">
		<thead class="admin_table_title">
			<tr>			    
				<th>Title</th>
				<th>Location</th>
				<th>Event Date</th>	
				<th>Status</th>
				<th>Action</th>
				<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmEventList);"/></th>
			</tr>
			<tr>
				<td colspan="7" align="center">
					<div style="width:821px; margin:auto;"></div>
				</td>
			</tr>
		</thead>
		<tbody>
        {if $db_viewevent|@count gt 0}
		{section name=i loop=$db_viewevent}
		{if $smarty.section.i.index % 2}
            {assign var="class" value="alt"}
        {else}
            {assign var="class" value=""}
        {/if}
        <tr class="{$class}">                  
			<td><a href="{$admin_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewevent[i].iMemberId}&iEventId={$db_viewevent[i].iEventId}#tab-event" title="">{$db_viewevent[i].vTitle}</a></td>
			<td>{$db_viewevent[i].vLocation}</td>
			<td>{$db_viewevent[i].dEventDate}</td>
			<td>{$db_viewevent[i].eStatus}</td>
			<td>
				<a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewevent[i].iMemberId}&iEventId={$db_viewevent[i].iEventId}#tab-event" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
				<a href="javascript:void(0);" title="Active" onclick="MakeActionEventt('{$db_viewevent[i].iEventId}','{$db_viewevent[i].iMemberId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
				<a href="javascript:void(0);" title="Inactive" onclick="MakeActionEventt('{$db_viewevent[i].iEventId}','{$db_viewevent[i].iMemberId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
				<a href="javascript:void(0);" title="Delete" onclick="MakeActionEventt('{$db_viewevent[i].iEventId}','{$db_viewevent[i].iMemberId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
			</td>
			<td><input name="iEventId[]" type="checkbox" id="iId" value="{$db_viewevent[i].iEventId}"/>
			    <input name="iMemberId" type="hidden" id="mId" value="{$db_viewevent[i].iMemberId}"/></td></td>
		</tr>
        {/section}
        {else}
        <tr>
			<td height="70px;" colspan="8" style="text-align:center; color:#C44C22; font-size:14px; font-weight:bold;">No Event Found.</td>
		</tr>
        {/if}
		</tbody>
		</table>
        </form>
		<div class="extrabottom">
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td>
			<div class="pagination">{if $db_viewevent|@count gt 0}<span class="switch" style="float: left;">{$recmsg20}</span>{/if}</div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newactioneventt">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactioneventt').value,'m-member',document.frmEventList);"/>
			</div></td></tr></table>			
		</div>
</div>
</div>

{literal}
<script type="text/javascript">
 $(document).ready(function() {
 $(function() {$('#dEventDate').datepicker({dateFormat: 'mm-dd-yy'});});
 });
</script>
<script type="text/javascript">
function Searchoptionsrc(){
    document.getElementById('frmsearchevent18').submit();
}
function MakeActionEventt(loopid,member,type){
    document.frmEventList.iEventId.value = loopid;
    document.frmEventList.iMemberId.value = member;
    document.frmEventList.action.value = type;
    document.frmEventList.submit();
}
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'm-member';
    window.location=admin_url+"/index.php?file=m-member&mode=view";
    return false;
}
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
function EventImageDelete(){
	var r=confirm("Are you sure to delete this image");
	if (r==true)
	  {
		if($('#actionEvent')){
			$('#actionEvent').val("DeleteEventImage");
		}
		
		if($('#frmaddevent')){
			$('#frmaddevent').submit();
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
</script>
{/literal}
