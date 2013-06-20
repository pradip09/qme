<script type="text/javascript" src="{$tconfig["tsite_admin_creditor_url"]}/ckeditor.js"></script>
<div id="content">
	<div class="container" id="tabs">
		<div class="conthead">
			{if $mode eq add}
			<h2 class="left">Add Opportunity</h2>
			{else}
			<h2 class="left">Edit Opportunity</h2>
			{/if}
		</div>
		<div class="contentbox" id="tabs-1">
				<form id="frmadd" name="frmadd" action="index.php?file=po-postopportunity_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iPostId" id="iPostId" value="{$iPostId}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
		
					<div class="inputboxes">
						<label for="textfield"><strong>Member:</strong></label>
						<select id="iMemberId" name="Data[iMemberId]" lang="*" title="Member">
							<option value=''>--Select Member--</option>
							{section name=i loop=$db_PostOppMember}
							<option value='{$db_PostOppMember[i].iMemberId}' {if $db_PostOppMember[i].iMemberId eq $db_postoopt[0].iMemberId}selected{/if}>{$db_PostOppMember[i].vName}</option>
							{/section}
						</select>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Type:</strong></label>
						<select id="eType" name="Data[eType]" onchange="showdropdownvalue(this.value);">
						<option value=''>Select</option>
						<option value="Local" {if $db_postoopt[0].eType eq 'local'}selected{/if}>Local</option>
						<option value="National" {if $db_postoopt[0].eType eq 'national'}selected{/if}>National</option>
						</select>
					</div>
					{if $mode eq add}
						<div class="inputboxes" id="nationalfield" style="display:none;">
							<label for="textfield"><strong>Country:</strong></label>
							<div id="nationaltext"></div>
						</div>
						<div class="inputboxes" id="localfield1" style="display:none;">
							<label for="textfield"><strong>Town:</strong></label>
							<div id="localtext1"></div>
						</div>
						<div class="inputboxes" id="localfield2" style="display:none;">
								<label for="textfield"><strong>City:</strong></label>
								<div id="localtext2"></div>
						</div>
						<div class="inputboxes" id="localfield3" style="display:none;">
								<label for="textfield"><strong>Zip:</strong></label>
								<div id="localtext3"></div>
						</div>
						<div class="inputboxes" id="localfield4" style="display:none;">
								<label for="textfield"><strong>Mile:</strong></label>
								<div id="localtext4"></div>
						</div>
					{else}
						{if $db_postoopt[0].eType eq 'national'}
						<div class="inputboxes" id="nationalfield">
							<label for="textfield"><strong>Country:</strong></label>
							<div id="nationaltext"><input type="text" id="vCountry" name="Data[vCountry]" class="inputbox" title="Country" lang="*" value="{$db_postoopt[0].vCountry}"/></div>
						</div>
						{else}
						<div class="inputboxes" id="localfield1" style="display:none;">
							<label for="textfield"><strong>Town:</strong></label>
							<div id="localtext1"><input type="text" id="vTown" name="Data[vTown]" class="inputbox" title="Town" lang="*" value="{$db_postoopt[0].vTown}"/></div>
						</div>
						<div class="inputboxes" id="localfield2" style="display:none;">
								<label for="textfield"><strong>City:</strong></label>
								<div id="localtext2"><input type="text" id="vLocalCity" name="Data[vLocalCity]" class="inputbox" title="City" lang="*" value="{$db_postoopt[0].vLocalCity}"/></div>
						</div>
						<div class="inputboxes" id="localfield3" style="display:none;">
								<label for="textfield"><strong>Zip:</strong></label>
								<div id="localtext3"><input type="text" id="vLocalZip" name="Data[vLocalZip]" class="inputbox" title="Zip" lang="*" value="{$db_postoopt[0].vLocalZip}"/></div>
						</div>
						<div class="inputboxes" id="localfield4" style="display:none;">
								<label for="textfield"><strong>Mile:</strong></label>
								<div id="localtext4"><input type="text" id="vLocalMile" name="Data[vLocalMile]" class="inputbox" title="Mile" lang="*" value="{$db_postoopt[0].vLocalMile}"/></div>
						</div>
						{/if}
					{/if}
					
					
					<div class="inputboxes">
						<label for="textfield"><strong>What skill are you looking for?</strong></label>
						<input type="text" id="vSkill" name="Data[vSkill]" class="inputbox" lang="*" title="Skill" value="{$db_postoopt[0].vSkill}"/>
					</div>
					
					<div class="inputboxes">
						<label for="textfield"><strong>What do you need this person to do?</strong></label>
						<textarea id="tDescription" name="Data[tDescription]" class="inputbox" title="What do you need this person to do">{$db_postoopt[0].tDescription}</textarea>
					</div>
					
					<div class="inputboxes">
						<label for="textfield"><strong>Status :</strong></label>
							<select id="eStatus" name="Data[eStatus]">
							<option value="Active" {if $db_postoop[0].eStatus eq Active}selected{/if} >Active</option>
							<option value="Inactive" {if $db_postoop[0].eStatus eq Inactive}selected{/if} >Inactive</option>
						</select>
					</div>
					{if $mode eq add}
					<input type="submit" value="Add Opportunity" class="btn" title="Add Opportunity" onclick="return validate(document.frmadd);"/>
					{else}
					<input type="submit" value="Edit Opportunity" class="btn" title="Edit Opportunity" onclick="return validate(document.frmadd);"/>
					{/if}
					<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
				</form>
		</div>
	</div>
</div>
{literal}
<script>
function redirectcancel(){

    window.location="{/literal}{$admin_url}{literal}/index.php?file=po-postopportunity&mode=view";
    return false;
}

showdropdownvalue($('#eType').val());
function showdropdownvalue(val){
	if(val != 'Local'){
		$('#localfield1').hide();
		$('#localtext1').html('');
		$('#localfield2').hide();
		$('#localtext2').html('');
		$('#localfield3').hide();
		$('#localtext3').html('');
		$('#localfield4').hide();
		$('#localtext4').html('');
	}else{		
		var html ='';
		html ='<input type="text" id="vTown" name="Data[vTown]" class="inputbox" title="Town" lang="*"/>';
		$('#localtext1').html(html);
		$('#localfield1').show();
		html ='<input type="text" id="vLocalCity" name="Data[vLocalCity]" class="inputbox" title="City" lang="*"/>';
		$('#localtext2').html(html);
		$('#localfield2').show();
		html ='<input type="text" id="vLocalZip" name="Data[vLocalZip]" class="inputbox" title="Zip" lang="*"/>';
		$('#localtext3').html(html);
		$('#localfield3').show();
		html ='<input type="text" id="vLocalMile" name="Data[vLocalMile]" class="inputbox" title="Mile" lang="*"/>';
		$('#localtext4').html(html);
		$('#localfield4').show();

	}
	if(val != 'National'){
		$('#nationalfield').hide();
		$('#nationaltext').html('');
	}else{		
		var html ='';
		html ='<input type="text" id="vCountry" name="Data[vCountry]" class="inputbox" title="Country" lang="*"/>';
		$('#nationaltext').html(html);
		$('#nationalfield').show();
	}
	
}
</script>
<script type="text/javascript">
	CKEDITOR.replace( 'tDescription' );


</script>
{/literal}
