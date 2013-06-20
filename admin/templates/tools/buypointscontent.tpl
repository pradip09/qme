<script type="text/javascript" src="{$TPATH_ADMIN_CKEDITOR_URL}/ckeditor.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		
		<li>/</li>
		<li class="current">{if $mode eq 'edit'}Edit Buy Points Content{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container">
    <div class="conthead">
        <h2>Buy Points Content</h2>
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
        <form  name="frmadd" id="frmadd"  method="post" action="index.php?file=to-buypointscontent_a">
    		<input type="hidden" name="action" id="action" value="{$mode}" />
            {section name=i loop=$db_res}
            {if $db_res[i].eType neq $currType}
            {/if}
             <div class="inputboxes_buypoint">
                <label for="textfield"><strong>{$db_res[i].vTitle}</strong>:</label>
                
		<textarea id="vDescription{$db_res[i].iContentId}" name="Data[{$db_res[i].content_code}]">{$db_res[i].vDescription}</textarea>
		<!--<input type="text" id="{$db_res[i].content_code}" name="Data[{$db_res[i].content_code}]" class="inputbox" value="{$db_res[i].vDescription}" lang="*" title="{$db_res[i].vDescription}"/> <br />-->
	     
	     
	     </div>
            {assign var="currType" value="$db_res[i].eType"}
            {/section}
      	<input type="submit" value="Save Content" class="btn" title="Edit Settings" onclick="return validate(document.frmadd);"  style="margin-left:566px;"/>
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

<script type="text/javascript">
	CKEDITOR.config.width=600;
	
	CKEDITOR.replace( 'vDescription1' );
	CKEDITOR.replace( 'vDescription2' );
	CKEDITOR.replace( 'vDescription3' );
	CKEDITOR.replace( 'vDescription4' );
</script>

{/literal}        