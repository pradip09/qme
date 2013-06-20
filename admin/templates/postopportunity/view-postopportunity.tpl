<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<div id="content">
<div class="container">
	<div class="conthead">
		<h2>Post Opportunity</h2>
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
				<td width="10%"><input type="Text" id="keyword" name="keyword" value="{$keyword}" class="inputbox" /><td>
				<td width="10%" >
					<select name="option" id="option">
						<option  value='vSkills'>Skill</option>
						<option value="tDescription">Description</option>
						<option value="po.eStatus">Status</option>
						
					</select>
				</td>
				<td width="60%"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoption();"/></td>
				<td width="10%"><input type="button" value="Add New" onclick="Redirect('index.php?file=po-postopportunity&mode=add');" class="btn" /></td>
			</tr>	
			<tr>
				<td colspan="7" align="center">
					{$AlphaBox}
				</td>
			</tr>
		</tbody>			
		</table> 
        </form>
        <form name="frmlist" id="frmlist"  action="index.php?file=po-postopportunity_a" method="post">
        
		<table width="100%" border="0">
		<input type="hidden" name="action" id="action" value="" />
        <input  type="hidden" name="iPostId" value=""/>
        <thead>
			<tr>
				
				<th>What skill are you looking for?</th>
				<th>Member</th>
				<th>What do you need this person to do?</th>
				<th>Status</th>
				<th>Action</th>
				<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmlist);"/></th>
			</tr>
		</thead>
		<tbody>
        {if $db_postoop|@count gt 0}
		{section name=i loop=$db_postoop}
            
        {if $smarty.section.i.index % 2}
            {assign var="class" value="alt"}
        {else}
            {assign var="class" value=""}
        {/if}
        <tr class="{$class}">
			
			<td><a href="{$tconfig.tpanel_url}/index.php?file=po-postopportunity&mode=edit&iPostId={$db_postoop[i].iPostId}" title="">{$db_postoop[i].vSkill}</a></td>
			<td>{$db_postoop[i].Name}</td>
			<td>{$db_postoop[i].tDescription}</td>
			<td>{$db_postoop[i].eStatus}</td>
			<td>
				<a href="{$tconfig.tpanel_url}/index.php?file=po-postopportunity&mode=edit&iPostId={$db_postoop[i].iPostId}" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
				<a href="javascript:void(0);" title="Active" onclick="MakeAction('{$db_postoop[i].iPostId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
				<a href="javascript:void(0);" title="Inactive" onclick="MakeAction('{$db_postoop[i].iPostId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
				<a href="javascript:void(0);" title="Delete" onclick="MakeAction('{$db_postoop[i].iPostId}','Deletes');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
			</td>
			<td><input name="iPostId[]" type="checkbox" id="iId" value="{$db_postoop[i].iPostId}"/></td>
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
				<li><img src="{$tconfig.tpanel_img}icons/icon_approve.png" alt="Approve" />Active</li>
				<li><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" alt="Unapprove" />Inactive</li>
				<li><img src="{$tconfig.tpanel_img}icons/icon_delete.png" alt="Delete" /> Remove</li>
			</ul>
			<div class="bulkactions">
				<select name="newaction" id="newaction">
					<option value="">Select Action</option>
					<option value="Active">Make Requested</option>
					<option value="Complete">Make Complete</option>
					<option value="Deletes">Make Delete</option>
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction').value,'po-postopportunity',document.frmlist);"/>
			</div>
		</div>
        <div>
            <div class="pagination">
            {if $db_postoop|@count gt 0}
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
</div>
{literal}
<script>
function Searchoption(){
    document.getElementById('frmsearch').submit();
}
function AlphaSearch(val){
    var alphavalue = val;
    var file = 'po-postopportunity';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}
function MakeAction(loopid,type){
    document.frmlist.iPostId.value = loopid;
    document.frmlist.action.value = type;
	document.frmlist.submit();	
}
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
</script>
{/literal}
