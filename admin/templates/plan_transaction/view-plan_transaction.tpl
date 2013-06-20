<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li class="current">Plan Trasaction</li>
	</ul>
</div>
<div id="content">
<div class="container">
	<div class="conthead">
		<h2>Plan Transaction</h2>
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
						<option value="vName">Member Name</option>
						<option value="vStorePlanName">Plan Name</option>
						<option value="fTotalPrice">Plan Price</option>
						<option value="eTransactionStatus">Payment Status</option>
						
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoption();"/></div></td>
				<!--<td width="10%"><input type="button" value="Add New" onclick="Redirect('index.php?file=pt-plan_transaction&mode=add');" class="btn" /></td>-->
			</tr>	
			<tr>
				<td colspan="7" align="center">
					<div style="width:821px; margin:auto;">{$AlphaBox}</div>
				</td>
			</tr>
		</tbody>			
		</table> 
        </form>
        <form name="frmlist" id="frmlist"  action="index.php?file=pt-plan_transaction_a" method="post">
        <div class="administator_table">
		<table width="100%" border="0">
		<input type="hidden" name="action" id="action" value="" />
        <input  type="hidden" name="iPlanTransactionId" value=""/>
        <thead>
			<tr>
				<th>Member Name</th>
				<th>Plan Name</th>
				<th>Plan Price</th>
				<th>Transaction Date</th>
				<th>Payment Status</th>
				<th>Action</th>
				<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmlist);"/></th>
			</tr>
		</thead>
		<tbody>
	{if $db_plan|@count gt 0}
		{section name=i loop=$db_plan}
            
	{if $smarty.section.i.index % 2}
            {assign var="class" value="alt"}
        {else}
            {assign var="class" value=""}
        {/if}
        <tr class="{$class}">
			<td><a href="{$tconfig.tpanel_url}/index.php?file=pt-plan_transaction&mode=edit&iPlanTransactionId={$db_plan[i].iPlanTransactionId}" title="">{$db_plan[i].vName}</a></td>
			<td>{$db_plan[i].vStorePlanName}</td>
			<td>$ {$db_plan[i].fTotalPrice}</td>
			<td>{$db_plan[i].dTransactionDate}</td>
			<td>{$db_plan[i].eTransactionStatus}</td>
			<td><a href="{$tconfig.tpanel_url}/index.php?file=pt-plan_transaction&mode=edit&iPlanTransactionId={$db_plan[i].iPlanTransactionId}" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a></td>
			<td><input name="iPlanTransactionId[]" type="checkbox" id="iId" value="{$db_plan[i].iPlanTransactionId}"/></td>
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
            {if $db_plan|@count gt 0}
	        <span class="switch" style="float: left;">{$recmsg}</span>
	        {/if}
            </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newaction">
					<option value="">Select Action</option>
					<!--<option value="Deletes">Make Delete</option>-->
					<!--<option value="Active">Active</option>
					<option value="Inactive">InActive</option>-->
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction').value,'pt-plan_transaction',document.frmlist);"/>
			</div></td>
			<td><div>
			    
			    {$page_link}
			</div></td>
				</tr></table>
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
    
    var file = 'pt-plan_transaction';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}
function MakeAction(loopid,type){
    document.frmlist.iPlanTransactionId.value = loopid;
    document.frmlist.action.value = type;
	document.frmlist.submit();	
}
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
</script>
{/literal}
