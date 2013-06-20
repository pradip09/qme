<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=ad-admin&mode=view">Administrator</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Administrator{else}Edit Administrator{/if}</li>
	</ul>
</div>
<div id="content">
        <!-- Table styles start -->           
        <div class="container">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Administrator</h2>
		{else}
		
		<h2 class="left">Edit Administrator</h2>
		{/if}
	</div>
                
                <div class="contentbox">
			<form id="frmadd" name="frmadd" action="index.php?file=ad-administrator_a" method="post">
				<input type="hidden" name="iAdminId" id="iAdminId" value="{$iAdminId}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
				<div class="inputboxes">
					<label for="textfield"><strong>First Name :</strong></label>
					<input type="text" id="vLastName" name="Data[vFirstName]" class="inputbox" value="{$db_admin[0].vFirstName}" lang="*" title="First Name"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Last Name :</strong></label>
					<input type="text" id="vLastName" name="Data[vLastName]" class="inputbox" value="{$db_admin[0].vLastName}" lang="*" title="Last Name"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>E-mail :</strong></label>
					<input type="text" id="vEmail"  name="Data[vEmail]" class="inputbox"  lang="{literal}*{E}{/literal}" title="E-mail" value="{$db_admin[0].vEmail}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>User Name :</strong></label>
					<input type="text" id="vUserName" name="Data[vUserName]" class="inputbox" lang="{literal}*{P}6:0{/literal}" title="User Name" value="{$db_admin[0].vUserName}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Password :</strong></label>
					<input type="password" id="vPassword"  name="Data[vPassword]" class="inputbox" lang="{literal}*{P}6:0{/literal}" title="Password" value="{$db_admin[0].vPassword}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Status :</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width: 223px;">
						<option value="Active" {if $db_admin[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_admin[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				{if $mode eq 'edit'}
				<input type="submit" value="Edit Administrator" class="btn" onclick="return validate(document.frmadd);" title="Edit Administrator" style="margin-left: 140px;"/>
				      {else}
   				<input type="submit" value="Add Administrator" class="btn" onclick="return validate(document.frmadd);" title="Add Administrator" style="margin-left: 140px;"/>
  				
				      
				      {/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</form>
                </div>
        </div>
        <!-- Table styles end -->
</div>

{literal}
<script>
function redirectcancel()
{
    window.location="{/literal}{$tconfig.tpanel_url}{literal}/index.php?file=ad-administrator&mode=view";
    return false;
}
</script>
{/literal}