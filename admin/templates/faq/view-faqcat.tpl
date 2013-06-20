<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li class="current">FAQ Category</li>
	</ul>
</div>
<div id="content">
<div class="container">
	<div class="conthead">
		<h2>FAQ CAtegory</h2>
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
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword" name="keyword" value="{$keyword}" class="inputbox" /></div><td>
				<td width="10%" ><div class="bulkactions">
					<select name="option" id="option">
						<option value="vCategory">Category</option>
						<option value="iOrderNo">Order No</option>
						<option value="eStatus">Status</option>
						<!--<option value="fPrice">Price</option>-->
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoption();"/></div></td>
				<td width="10%"><div class="bulkactions"><input type="button" value="Add New" onclick="Redirect('index.php?file=fa-faqcat&mode=add');" class="btn" /></div></td>
			</tr>	
			<tr>
				<td colspan="7" align="center">
					<div style="width:821px; margin:auto;">{$AlphaBox}</div>
				</td>
			</tr>
		</tbody>			
		</table> 
        </form>
        <form name="frmlist" id="frmlist"  action="index.php?file=fa-faqcat_a" method="post">
        <div class="administator_table">
		<table width="100%" border="0">
		<input type="hidden" name="action" id="action" value="" />
		<input  type="hidden" name="iFAQCategoryId" value=""/>
        <thead>
			<tr>
				<th>FAQ Category</th>
				<th>Order No</th>
				<th>Status</th>
				<th>Action</th>
				<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmlist);"/></th>
			</tr>
		</thead>
		<tbody>
        {if $db_faqcat|@count gt 0}
		{section name=i loop=$db_faqcat}
            
        {if $smarty.section.i.index % 2}
            {assign var="class" value="alt"}
        {else}
            {assign var="class" value=""}
        {/if}
        <tr class="{$class}">
			<td><a href="{$tconfig.tpanel_url}/index.php?file=fa-faqcat&mode=edit&iFAQCategoryId={$db_faqcat[i].iFAQCategoryId}" title="">{$db_faqcat[i].vCategory}</a></td>
			<td>{$db_faqcat[i].iOrderNo}</td>
			<td>{$db_faqcat[i].eStatus}</td>
			<td>
				<a href="{$tconfig.tpanel_url}/index.php?file=fa-faqcat&mode=edit&iFAQCategoryId={$db_faqcat[i].iFAQCategoryId}" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
				<a href="javascript:void(0);" title="Active" onclick="MakeAction('{$db_faqcat[i].iFAQCategoryId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
				<a href="javascript:void(0);" title="Inactive" onclick="MakeAction('{$db_faqcat[i].iFAQCategoryId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
				<a href="javascript:void(0);" title="Delete" onclick="MakeAction('{$db_faqcat[i].iFAQCategoryId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
			</td>
			
			<td><input name="iFAQCategoryId[]" type="checkbox" id="iId" value="{$db_faqcat[i].iFAQCategoryId}"/></td>
		</tr>
        {/section}
        {else}
        <tr>
			<td height="70px;" colspan="8" style="text-align:center; color:#C44C22; font-size:14px; font-weight:bold;">No Record Found.</td>
		</tr>
        {/if}
		</tbody>
		</table>
	</div>
        </form>
		<div class="extrabottom">
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td>
			<div class="pagination">
			{if $db_faqcat|@count gt 0}
			<span class="switch" style="float: left;">{$recmsg}</span>
			{/if}
			</div></td>
					<td>
			<div class="bulkactions">
				<select name="newaction" id="newaction">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction').value,'fa-faqcat',document.frmlist);"/>
			</div></td>
					<td><div>
           
            {$page_link}
        </div></td>
				</tr>
			</table>
		</div>
        
	<div style="clear: both;"></div></div>
</div></div>
{literal}
<script>
function Searchoption(){
	
    document.getElementById('frmsearch').submit();
}
function AlphaSearch(val){
	var type = $('#type').val();
    var alphavalue = val;
    
    var file = 'fa-faqcat';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}
function MakeAction(loopid,type){
    document.frmlist.iFAQCategoryId.value = loopid;
    document.frmlist.action.value = type;
	document.frmlist.submit();	
}
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
</script>
{/literal}
