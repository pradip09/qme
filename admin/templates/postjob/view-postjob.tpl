<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li class="current">Post Job</li>
	</ul>
</div>
<div id="content">
<div class="container">
	<div class="conthead">
		<h2>Post Job</h2>
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
		<input type="hidden" value="{$type}" name="type">
		<table width="100%" border="0">
			<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label><td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword" name="keyword" value="{$keyword}" class="inputbox" /></div><td>
				<td width="10%"><div class="bulkactions">
					<select name="option" id="option">
						<option  value='p.vSkill'>Skill Name</option>
						<option  value='concat(a.vFirstName," ",a.vLastName)'>Admin Name</option>
						<option value="p.eStatus">Status</option>
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoption();"/></div></td>
				<td width="10%"><div class="bulkactions"><input type="button" value="Add New" onclick="Redirect('index.php?file=pj-postjob&mode=add');" class="btn" /></div></td>
			</tr>	
			<tr>
				<td colspan="7" align="center">
					<div style="width:821px; margin:auto;">{$AlphaBox}</div>
				</td>
			</tr>
			</tbody>			
		</table> 
		</form>
		<form name="frmlist" id="frmlist"  action="index.php?file=pj-postjob_a" method="post">
		<div class="administator_table">
			<table width="100%" border="0">
			<input type="hidden" name="action" id="action" value="" />
		<input  type="hidden" name="iPostJobId" value=""/>
		<thead>
				<tr>
					<th>What skill are you looking for?</th>
					<th>Admin</th>
					<th>Status</th>
					<th>Action</th>
					<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmlist);"/></th>
				</tr>
			</thead>
			<tbody>
		{if $db_postjob|@count gt 0}
			{section name=i loop=$db_postjob}
		    
		{if $smarty.section.i.index % 2}
		    {assign var="class" value="alt"}
		{else}
		    {assign var="class" value=""}
		{/if}
		<tr class="{$class}">
				
				<td><a href="{$tconfig.tpanel_url}/index.php?file=pj-postjob&mode=edit&iPostJobId={$db_postjob[i].iPostJobId}" title="">{$db_postjob[i].vSkill}</a></td>
				<td>{$db_postjob[i].vFirstName} {$db_postjob[i].vLastName}</td>
				<td>{$db_postjob[i].eStatus}</td>
				<td>
					<a href="{$tconfig.tpanel_url}/index.php?file=pj-postjob&mode=edit&iPostJobId={$db_postjob[i].iPostJobId}" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
					<a href="javascript:void(0);" title="Active" onclick="MakeAction('{$db_postjob[i].iPostJobId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
					<a href="javascript:void(0);" title="Inactive" onclick="MakeAction('{$db_postjob[i].iPostJobId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
					<a href="javascript:void(0);" title="Delete" onclick="MakeAction('{$db_postjob[i].iPostJobId}','Deletes');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
				</td>
				<td><input name="iPostJobId[]" type="checkbox" id="iId" value="{$db_postjob[i].iPostJobId}"/></td>
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
					<td> <div class="pagination">
            {if $db_postjob|@count gt 0}
	        <span class="switch" style="float: left;">{$recmsg}</span>
	        {/if}
            </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newaction">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction').value,'pj-postjob',document.frmlist);"/>
			</div></td>
				<td><div>
           
            {$page_link}
        </div></td></tr></table>
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
	    var alphavalue = val;
	    var file = 'pj-postjob';
	    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
	    return false;
	}
	function MakeAction(loopid,type){
	    document.frmlist.iPostJobId.value = loopid;
	    document.frmlist.action.value = type;
		document.frmlist.submit();	
	}
	function hidemessage(){
	    jQuery("#errormsgdiv").slideUp();
	}
	</script>
{/literal}