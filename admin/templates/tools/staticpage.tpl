<script type="text/javascript" src="{$tconfig["tsite_admin_creditor_url"]}/ckeditor.js"></script>
<script>stateArr = new Array({$stateArr});</script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=to-staticpage&mode=view">Static Pages</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Static Pages{else}Edit Static Pages{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Static Page</h2>
		{else}
		<h2 class="left">Edit Static Page</h2>
		{/if}
	</div>
        <div class="contentbox" id="tabs-1">
		<form id="frmadd" name="frmadd" action="index.php?file=to-staticpage_a" method="post">
				<input type="hidden" name="iPageId" id="iPageId" value="{$iPageId}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
				
                                <div class="inputboxes">
					<label for="textfield"><strong>Pagecode:</strong></label>
					<select id="vPageCode" name="Data[vPageCode]" lang="*" title="PageCode" style="width:224px;">
						<option value=''>--Page Code--</option>
						{section name=i loop=$db_Pagecode}
						<option value='{$db_Pagecode[i].vPageCode}' {if $db_Pagecode[i].vPageCode eq $db_static_pages[0].vPageCode}selected{/if}>{$db_Pagecode[i].vPageCode}</option>
						{/section}
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>DisplayName:</strong></label>
					<input type="text" id="vDisplayName" name="Data[vDisplayName]" class="inputbox" value="{$db_static_pages[0].vDisplayName}" lang="*" title="Display Name"/>
				</div>
                               
                                <div class="inputboxes">
					<label for="textfield"><strong>Meta Title:</strong></label>
					<input type="text" id="tMetaTitle"  name="Data[tMetaTitle]" class="inputbox"  lang="*" title="MetaTitle" value="{$db_static_pages[0].tMetaTitle}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Meta Keyword:</strong></label>
					<input type="text" id="tMetaKeyword" name="Data[tMetaKeyword]" class="inputbox" lang="*" title="MetaKeyword" value="{$db_static_pages[0].tMetaKeyword}"/>
				</div>
                                <div class="inputboxes">
					<label for="textfield"><strong>Meta Description:</strong></label>
					<input type="text" id="tMetaDesc"  name="Data[tMetaDesc]" class="inputbox" lang="*" title="MetaDescription " value="{$db_static_pages[0].tMetaDesc}"/>
				</div>
                                <div class="inputboxes">
					<label for="textfield"><strong>Content:</strong></label>
				</div>
				<p>
					<textarea id="lContents" name="Data[lContents]" class="text2">{$db_static_pages[0].lContents}</textarea>
				</p>
                                  
				<div class="inputboxes">
					<label for="textfield" ><strong>Status:</strong></label>
					<select id="eStatus " name="Data[eStatus ]" style="width:224px;">
						<option value="Active" {if $db_static_pages[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_static_pages[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				{if $mode eq 'add'}
				<input type="submit" value="Add Page" class="btn" onclick="return validate(document.frmadd);" title="Add Page" style="margin-left:140px;"/>
                               {else}
                                <input type="submit" value="Edit Page" class="btn" onclick="return validate(document.frmadd);" title="Edit Page" style="margin-left:140px;"/>
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
    var file = 'to-staticpage';
    window.location=admin_url+"/index.php?file=to-staticpage&mode=view";
    return false;
}
</script>
<script type="text/javascript">
	CKEDITOR.config.width=800;
	CKEDITOR.replace( 'lContents' );
</script>
{/literal}
