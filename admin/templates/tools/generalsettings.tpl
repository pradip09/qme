<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		
		<li>/</li>
		<li class="current">{if $mode eq 'edit'}Edit General Settings{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container">
    <div class="conthead">
        <h2>Edit General Settings</h2>
    </div>
    
    
    <div class="contentbox">
    {if $var_msg neq ''}
     <div class="status success" id="errormsgdiv"> 
        	<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
        	<p><img src="{$tconfig.tpanel_img}icons/icon_success.png" title="Success" />
              {$var_msg}</p> 
     </div>     
    <div></div>
    {/if}
        <form  name="frmadd" id="frmadd"  method="post" action="index.php?file=to-generalsettings_a">
    		<input type="hidden" name="action" id="action" value="{$mode}" />
            {section name=i loop=$db_res}
           {if $db_res[i].iSettingId neq 11}
             <div class="inputboxes">
		
                <label for="textfield"><strong>{$db_res[i].tDescription}</strong></label>
                <input type="text" id="{$db_res[i].vName}" name="Data[{$db_res[i].vName}]" class="inputbox" value="{$db_res[i].vValue}" lang="*" title="{$db_res[i].tDescription}"/> <br />
	     
	     </div>{/if}
           
            {/section}
	     <div class="inputboxes">
                <label for="textfield"><strong>{$db_res[4].tDescription}</strong></label>
                <select id="{$db_res[4].vName}" name="Data[{$db_res[4].vName}]" class="inputbox" lang="*" title="{$db_res[4].tDescription}" style="width: 225px;">
		<option value="">--Select--</option>
		<option value="Test" {if $db_res[4].vValue eq 'Test'}selected{/if} >Test</option>
		<option value="Live" {if $db_res[4].vValue eq 'Live'}selected{/if}>Live</option>
		</select>
	     </div>
      	<input type="submit" value="Edit Settings" class="btn" title="Edit Settings" onclick="return validate(document.frmadd);" style="margin-left:140px;"/>
        </form>
    </div>
</div>
</div>
{literal}
<script>
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
</script>
{/literal}        