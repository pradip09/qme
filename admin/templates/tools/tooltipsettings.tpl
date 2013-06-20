<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		
		<li>/</li>
		<li class="current">{if $mode eq 'edit'}Edit Tooltip Settings{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container">
    <div class="conthead">
        <h2>Edit Tooltip  Settings</h2>
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
        <form  name="frmaddtool" id="frmaddtool"  method="post" action="index.php?file=to-tooltipsettings_a">
    		<input type="hidden" name="action" id="action" value="{$mode}" />
		<div class="container top " style="padding:20px;">
					<div class="conthead">
						<h2>My Account</h2>
					</div>					
              
            
             <div class="inputboxes">
                <!--<input type="hidden" value="{$db_tool[0].vToolTipField}" name="Data[{$db_tool[0].iToolTipId}]" id="Data[{$db_tool[0].iToolTipId}]">--> 
		<label style="width:700px;" for="textfield"><strong>{$db_tool[0].vToolTipField}</strong></label><br><br>
                <input style="width:650px;" type="text" id="{$db_tool[0].vToolTipField}" name="Data[{$db_tool[0].vToolTipField}]" class="inputbox" value="{$db_tool[0].vToolTipText}" lang="*" title="{$db_tool[0].vToolTipField}"/> <br />
	     </div>
	    
		</div>
		
	     <div class="container top " style="padding:20px;">
		       <div class="conthead">
			    <h2>My Compaign</h2>
		       </div>
		
		{section name=k loop=$db_tool}
		 {if $smarty.section.k.index neq '0'}
                 <div class="inputboxes">
		   <!-- <input type="hidden" value="{$db_tool[k].vToolTipField}" name="{$db_tool[k].iToolTipId}" id="{$db_tool[k].iToolTipId}">-->
                   <label style="width:700px;" for="textfield"><strong>{$db_tool[k].vToolTipField}</strong></label><br/><br/>
                    <input style="width:650px;" type="text" id="{$db_tool[k].vToolTipField}" name="Data[{$db_tool[k].vToolTipField}]" class="inputbox" value="{$db_tool[k].vToolTipText}" lang="*" title="{$db_tool[k].vToolTipField}"/> <br />
	         </div>
		 {/if}
                {/section}
	    </div>

		
      	<input type="submit" value="Edit Settings" class="btn" title="Edit Settings" onclick="return validate(document.frmaddtool);"  style="margin-left:20px;"/>
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