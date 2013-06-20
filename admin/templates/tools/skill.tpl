<script>
stateArr = new Array({$stateArr});
</script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=to-skill&mode=view">Skill</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Skill{else}Edit Skill{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Skill</h2>
		{else}
		
		<h2 class="left">Edit Skill</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=to-skill_a" method="post">
				<input type="hidden" name="iSkillId" id="iSkillId" value="{$iSkillId}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
				
				
				
				<div class="inputboxes">
					<label for="textfield"><strong>Skill:</strong></label>
					<input type="text" id="vSkill" name="Data[vSkill]" class="inputbox" value="{$db_skill[0].vSkill}" lang="*" title="Skill"/>
				</div> 
				
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:224px;">
						<option value="Active" {if $db_skill[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_skill[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div> <br/><br/>
				
				
				  {if $mode eq add}
   				<input type="submit" value="Add Skill" class="btn" onclick="return validate(document.frmadd);" title="Add Skill" style="margin-left:140px;"/>
   				{else}
   				<input type="submit" value="Edit Skill" class="btn" onclick="return validate(document.frmadd);" title="Edit Skill" style="margin-left:140px;"/>
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
    var file = 'to-skill';
    window.location=admin_url+"/index.php?file=to-skill&mode=view";
    return false;
}
</script>

{/literal}
