<script type="text/javascript" src="{$tconfig["tsite_admin_creditor_url"]}/ckeditor.js"></script>
	<div class="container" id="tabs">
		<div class="conthead">
			{if $mode eq add}
			<h2 class="left">Add Post</h2>
			{else}
			<h2 class="left">Edit Post</h2>
			{/if}
		</div>
		<div class="contentbox" id="tabs-1">
			<form id="frmadd" name="frmadd" action="index.php?file=pj-mpostjob_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iPostJobId" id="iPostJobId" value="{$iPostJobId}" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}" />
			<input type="hidden" name="action" id="action" value="{$mode}" />		
				<div class="inputboxes">
					<label for="textfield" style="width:300px;"><strong>What skill are you looking for?</strong></label>
				</div>
				<input style="width:600px;" type="text" id="vSkill" name="Data[vSkill]" class="inputbox" lang="*" title="Skill" value="{$db_postjob[0].vSkill}"/>
				<div style="clear:both"></div>
				<div class="inputboxes">
					<label for="textfield" style="width:300px;"><strong>What do you need this person to do?</strong></label>
				</div>
				<textarea id="tDescription" name="Data[tDescription]" class="inputbox" title="What do you need this person to do">{$db_postjob[0].tDescription}</textarea>
				
				<div class="inputboxes">
					<label for="textfield"><strong>State:</strong></label>
					<select id="iStateId" name="Data[iStateId]" lang="*" title="State">
						<option value=''>--Select State--</option>
						{section name=i loop=$db_state}
							<option value='{$db_state[i].iStateId}' {if $db_state[i].iStateId eq $db_postjob[0].iStateId}selected{/if}>{$db_state[i].vState}</option>
						{/section}
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>City:</strong></label>
					<input type="text" id="vCity" name="Data[vCity]" class="inputbox" title="City" lang="*" value="{$db_postjob[0].vCity}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Zip:</strong></label>
					<input type="text" id="vZip" name="Data[vZip]" class="inputbox" title="Zip" lang="*" value="{$db_postjob[0].vZip}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Mile:</strong></label>
					<input type="text" id="vMile" name="Data[vMile]" class="inputbox" title="Mile" lang="*" value="{$db_postjob[0].vMile}"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status :</strong></label>
						<select id="eStatus" name="Data[eStatus]">
						<option value="Active" {if $db_postjob[0].eStatus eq Active}selected{/if} >Active</option>
						<option value="Inactive" {if $db_postjob[0].eStatus eq Inactive}selected{/if} >Inactive</option>
					</select>
				</div>
				{if $mode eq add}
					<input type="submit" value="Add Post" class="btn" title="Add Post" onclick="return validate(document.frmadd);"/>
				{else}
					<input type="submit" value="Edit Post" class="btn" title="Edit Post" onclick="return validate(document.frmadd);"/>
				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</form>
		</div>
	</div>
{literal}
<script>
function redirectcancel(){

    window.location="{/literal}{$admin_url}{literal}/index.php?file=m-member&mode=edit#tab-postjob";
    return false;
}

</script>

<script type="text/javascript">
	CKEDITOR.replace( 'tDescription' );
</script>
{/literal}
