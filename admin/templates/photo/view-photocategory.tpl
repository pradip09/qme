<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<div id="content">
<div class="container">
	<div class="conthead">
		<h2>Photo Category</h2>
	</div>
	<div class="contentbox">
    {if $var_msg_new neq ''}
     <div class="status success" id="errormsgdiv"> 
        	<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
        	<p><img src="{$tconfig.tpanel_img}icons/icon_success.png" title="Success" />
              {$var_msg_new}</p> 
     </div>     
    <div></div>
    {elseif $var_msg neq ''}
    <div class="status success" id="errormsgdiv"> 
        	<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
        	<p><img src="{$tconfig.tpanel_img}icons/icon_success.png" title="Success" />
              {$var_msg}</p> 
     </div>     
    <div></div>
    {/if}
		<form name="frmsearch" id="frmsearch" action="" method="post">
        
        <table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label><td>
				<td width="10%"><input type="Text" id="keyword" name="keyword" value="{$keyword}" class="inputbox" /><td>
				<td width="10%" >
					<select name="option" id="option">
						<option value="vPhotoCategory">Photo Category</option>
						<option value="eStatus">Status</option>
					</select>
				</td>
				<td width="60%"><input type="button" value="Search" class="btnalt" id="Search" name="Search" title="Search" onclick="Searchoption();"/></td>
				<td width="10%"><input type="button" value="Add New" onclick="Redirect('index.php?file=ph-photocategory&mode=add');" class="btnalt" /></td>
			</tr>	
			<tr>
				<td colspan="7" align="center">
					<div style="width:821px; margin:auto;">{$AlphaBox}</div>
				</td>
			</tr>
		</tbody>			
		</table> 
        </form>
        <form name="frmlist" id="frmlist"  action="index.php?file=ph-photocategory_a" method="post">
        
		<table width="100%" border="0">
		<input type="hidden" name="action" id="action" value="" />
        <input  type="hidden" name="iPhotoCategoryId" value=""/>
        <thead>
			<tr>
				<th>Photo Category</th>
				<th>Status</th>
				<th>Action</th>
				<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmlist);"/></th>
			</tr>
		</thead>
		<tbody>
        {if $db_photocategory|@count gt 0}
		{section name=i loop=$db_photocategory}
            
        {if $smarty.section.i.index % 2}
            {assign var="class" value="alt"}
        {else}
            {assign var="class" value=""}
        {/if}
        <tr class="{$class}">
			<td><a href="{$tconfig.tpanel_url}/index.php?file=ph-photocategory&mode=edit&iPhotoCategoryId={$db_photocategory[i].iPhotoCategoryId}" title="">{$db_photocategory[i].vPhotoCategory}</a></td>
			<td>{$db_photocategory[i].eStatus}</td>
			<td>
				<a href="{$tconfig.tpanel_url}/index.php?file=ph-photocategory&mode=edit&iPhotoCategoryId={$db_photocategory[i].iPhotoCategoryId}" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
				<a href="javascript:void(0);" title="Active" onclick="MakeAction('{$db_photocategory[i].iPhotoCategoryId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
				<a href="javas cript:void(0);" title="Inactive" onclick="MakeAction('{$db_photocategory[i].iPhotoCategoryId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
				<a href="javascript:void(0);" title="Delete" onclick="MakeAction('{$db_photocategory[i].iPhotoCategoryId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
			</td>
			
			<td><input name="iPhotoCategoryId[]" type="checkbox" id="iId" value="{$db_photocategory[i].iPhotoCategoryId}"/></td>
		</tr>
        {/section}
        {else}
        <tr>
			<td height="70px;" colspan="8" style="text-align:center; color:#C44C22; font-size:14px; font-weight:bold;">No Record Found.</td>
		</tr>
        {/if}
		</tbody>
		</table>
        </form>
		<div class="extrabottom">
			<div class="pagination">
            {if $db_photocategory|@count gt 0}
	        <span class="switch" style="float: left;">{$recmsg}</span>
	        {/if}
            </div>
			<div class="bulkactions">
				<select name="newaction" id="newaction">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Active</option>
					<option value="Inactive">InActive</option>
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction').value,'ph-photocategory',document.frmlist);"/>
			</div>
		</div>
        <div>
            {$page_link}
        </div>
	<div style="clear: both;"></div></div>
</div>
</div>
{literal}
<script>
function Searchoption(){
	
    document.getElementById('frmsearch').submit();
}
function AlphaSearch(val){
	var type = $('#type').val();
    var alphavalue = val;
    
    var file = 'ph-photocategory';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}
function MakeAction(loopid,type){
    document.frmlist.iPhotoCategoryId.value = loopid;
    document.frmlist.action.value = type;
	document.frmlist.submit();	
}
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
</script>
{/literal}