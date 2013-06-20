<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<div class="contentcontainer">
	<div class="headings altheading">
		<h2>Estimate Orders</h2>
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
				<td width="10%"><input type="Text" id="keyword" name="keyword" value="{$keyword}"  class="inputbox" /><td>
				<td width="10%" >
					<select name="option" id="option">
						<option  value='vTitle'>Title</option>
						<option value="fPrice">Price</option>
						<option value="iQty">Quentity</option>
						<option value="fTotalPrice">TotalPrice</option>
					</select>
				</td>
				<td width="60%"><input type="button" value="Search" class="btnalt" id="Search" name="Search" title="Search" onclick="Searchoption();"/></td>
				<td width="10%"><input type="button" value="Add New" onclick="Redirect('index.php?file=o-estimate_orders&mode=add');" class="btnalt" /></td>
			</tr>	
			<tr>
				<td colspan="7" align="center">
					{$AlphaBox}
				</td>
			</tr>
		</tbody>			
		</table> 
        </form>
        <form name="frmlist" id="frmlist"  action="index.php?file=o-estimate_orders_a" method="post">
        
		<table width="100%" border="0">
		<input type="hidden" name="action" id="action" value="" />
        <input  type="hidden" name="iEstimateDetailId" value=""/>
        <thead>
			<tr>
				<th>Title</th>
				<th>Price</th>
				<th>Quentity</th>
				<th>TotalPrice</th>
				
				<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmlist);"/></th>
			</tr>
		</thead>
		<tbody>
        {if $db_cat|@count gt 0}
		{section name=i loop=$db_cat}
            
        {if $smarty.section.i.index % 2}
            {assign var="class" value="alt"}
        {else}
            {assign var="class" value=""}
        {/if}
        <tr class="{$class}">
			<td><a href="{$tconfig.tpanel_url}/index.php?file=o-estimate_orders&mode=edit&iEstimateDetailId={$db_cat[i].iEstimateDetailId}" title="">{$db_cat[i].vTitle}</a></td>
			<td>{$db_cat[i].fPrice}</td>
			<td>{$db_cat[i].iQty}</td>
			<td>{$db_cat[i].fTotalPrice}</td>
			<!--<td>{$db_cat[i].eStatus}</td>
			<td>
				<a href="{$tconfig.tpanel_url}/index.php?file=o-estimate_orders&mode=edit&iEstimateDetailId={$db_cat[i].iEstimateDetailId}" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
				<a href="javascript:void(0);" title="Active" onclick="MakeAction('{$db_cat[i].iEstimateDetailId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
				<a href="javascript:void(0);" title="Inactive" onclick="MakeAction('{$db_cat[i].iEstimateDetailId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
				<a href="javascript:void(0);" title="Delete" onclick="MakeAction('{$db_cat[i].iEstimateDetailId}','Deletes');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
			</td>-->
			<td><input name="iEstimateDetailId[]" type="checkbox" id="iId" value="{$db_cat[i].iEstimateDetailId}"/></td>
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
			<ul>
				<li><img src="{$tconfig.tpanel_img}icons/icon_edit.png" alt="Edit" /> Edit</li>
				<li><img src="{$tconfig.tpanel_img}icons/icon_approve.png" alt="Approve" /> Active</li>
				<li><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" alt="Unapprove" /> Inactive</li>
				<li><img src="{$tconfig.tpanel_img}icons/icon_delete.png" alt="Delete" /> Remove</li>
			</ul>
			<div class="bulkactions">
				<select name="newaction" id="newaction">
					<option value="">Select Action</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make Inactive</option>
					<option value="Deletes">Make Delete</option>
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction').value,'o-estimate_orders',document.frmlist);"/>
			</div>
		</div>
        <div>
            <div class="pagination">
            {if $db_cat|@count gt 0}
	        <span class="switch" style="float: left;">{$recmsg}</span>
	        {/if}
            </div>
            {$page_link}
        </div>
		
        <!--<ul class="pagination">
			<li class="text">Previous</li>
			<li class="page"><a href="#" title="">1</a></li>
			<li><a href="#" title="">2</a></li>
			<li><a href="#" title="">3</a></li>
			<li><a href="#" title="">4</a></li>
			<li class="text"><a href="#" title="">Next</a></li>
		</ul>-->
		<div style="clear: both;"></div></div>
</div>
{literal}
<script>
function Searchoption(){
    document.getElementById('frmsearch').submit();
}
function AlphaSearch(val){
    var alphavalue = val;
    var file = 'o-estimate_orders';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}
function MakeAction(loopid,type){
    document.frmlist.iEstimateDetailId.value = loopid;
    document.frmlist.action.value = type;
	document.frmlist.submit();	
}
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
</script>
{/literal}
