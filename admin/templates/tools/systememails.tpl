<script>
stateArr = new Array({$stateArr});
</script>
<script type="text/javascript" src="{$TPATH_ADMIN_CKEDITOR_URL}/ckeditor.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=to-systememails&mode=view">System Emails</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add System Emails{else}Edit System Emails{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add System Email</h2>
		{else}
		
		<h2 class="left">Edit System Email</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=to-systememails_a" method="post">
				<input type="hidden" name="iEmailTemplateId" id="iEmailTemplateId" value="{$iEmailTemplateId}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
				
				
				<div class="inputboxes">
					<label for="textfield"><strong>Email Title:</strong></label>
					<input type="text" id="vEmailTitle" name="Data[vEmailTitle]" class="inputbox" value="{$db_system_email[0].vEmailTitle}" lang="*" title="Email Title"/>
				</div> 
				
				<div class="inputboxes">
					<label for="textfield"><strong>Email Subject</strong></label>
					<input type="text" id="vEmailSubject" name="Data[vEmailSubject]" class="inputbox" value="{$db_system_email[0].vEmailSubject}" lang="*" title="Email Subject"/>
				</div> 
				<div class="inputboxes">
					<label for="textfield"><strong>From Name</strong></label>
					<input type="text" id="vFromName" name="Data[vFromName]" class="inputbox" value="{$db_system_email[0].vFromName}" lang="*" title="From Name"/>
				</div> 
				<div class="inputboxes">
					<label for="textfield"><strong>From Email</strong></label>
					<input type="text" id="vFromEmail" name="Data[vFromEmail]" class="inputbox" value="{$db_system_email[0].vFromEmail}" lang="*" title="From Email"/>
				</div> 
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:224px;">
						<option value="Active" {if $db_system_email[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_system_email[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div> 
				<div class="inputboxes">
					<label for="textfield"><strong>Email Message:</strong></label>
				</div>
				<p>
					<textarea id="tEmailMessage" name="tEmailMessage">{$db_system_email[0].tEmailMessage|stripslashes}</textarea>
				</p>
				
                {if $mode eq add}
   				<input type="submit" value="Add System Email" class="btn" onclick="return validate(document.frmadd);" title="Add System Email" style="margin-left:140px;"/>
   				{else}
   				<input type="submit" value="Edit System Email" class="btn" onclick="return validate(document.frmadd);" title="Edit System Email" style="margin-left:140px;"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</form>
	</div>    
</div>
</div>
{literal}
<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'u-user';
    window.location=admin_url+"/index.php?file=to-systememails&mode=view";
    return false;
}
</script>
<script type="text/javascript">
	CKEDITOR.config.width=800;
	
	CKEDITOR.replace( 'tEmailMessage' );
</script>

{/literal}
