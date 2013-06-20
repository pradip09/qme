<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<div class="contentcontainer">
	<div class="headings altheading">
		<h2>Login History</h2>
	</div>
	<div class="contentbox">
    {if $var_msg_new neq ''}
     <div class="status success" id="errormsgdiv"> 
        	<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
        	<p><img src="{$admin_images_url}icons/icon_success.png" title="Success" />
              {$var_msg_new}</p> 
     </div>     
    <div></div>
    {elseif $var_msg neq ''}
    <div class="status success" id="errormsgdiv"> 
        	<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
        	<p><img src="{$admin_images_url}icons/icon_success.png" title="Success" />
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
                        <option value='concat(vFirstName," ",vFirstName)'>Name</option>
						<option value="vUserName">User Name</option>
						<option value="vEmail">E-mail</option>
						<option value="eStatus">Status</option>
					</select>
				</td>
				<td width="60%"><input type="button" value="Search" class="btnalt" id="Search" name="Search" title="Search" onclick="Searchoption();"/></td>
				<td width="10%">
                    &nbsp;
                    <!--<input type="button" value="Add New" onclick="Redirect('index.php?file=ad-administrator&mode=add');" class="btnalt" />-->
                </td>
			</tr>	
			<tr>
				<td colspan="7" align="center">
					<div style="width:821px; margin:auto;">{$AlphaBox}</div>
				</td>
			</tr>
		</tbody>			
		</table> 
        </form>
        <form name="frmlist" id="frmlist"  action="index.php?file=cm-loginhistory_a" method="post">
        
		<table width="100%" border="0">
		<input type="hidden" name="action" id="action" value="" />
        <input  type="hidden" name="iLoginHistoryId" value=""/>
        <thead>
			<tr>
				<th>Name</th>
				<th>Username</th>
				<th>E-mail</th>
				<th>Login Date</th>
				<th>Logout Date</th>
				<th>Action</th>
				<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmlist);"/></th>
			</tr>
		</thead>
		<tbody>
        {if $db_hist|@count gt 0}
		{section name=i loop=$db_hist}
        <tr>
			<td>{$db_hist[i].vFirstName} {$db_hist[i].vLastName}</td>
			<td>{$db_hist[i].vUserName}</td>
			<td>{$db_hist[i].vEmail}</td>
			<td>{$generalobj->DateTime($db_hist[i].dLoginDate,'2')}</td>
            <td>{$generalobj->DateTime($db_hist[i].dLogoutDate,'2')}</td>
			<td>
				<!--<a href="{$admin_url}/index.php?file=ad-administrator&mode=edit&iAdminId={$db_admin_all[i].iAdminId}" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>-->
				<!--<a href="javascript:void(0);" title="Active" onclick="MakeAction('{$db_admin_all[i].iAdminId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>-->
				<!--<a href="javascript:void(0);" title="Inactive" onclick="MakeAction('{$db_admin_all[i].iAdminId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>-->
				<a href="javascript:void(0);" title="Delete" onclick="MakeAction('{$db_hist[i].iLoginHistoryId}','Deletes');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
			</td>
			<td><input name="iLoginHistoryId[]" type="checkbox" id="iId" value="{$db_hist[i].iLoginHistoryId}"/></td>
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
					<!--<option value="Active">Make Active</option>
					<option value="Inactive">Make Inactive</option>-->
					<option value="Deletes">Make Delete</option>
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction').value,'cm-loginhistory',document.frmlist);"/>
			</div>
		</div>
        <div>
            <div class="pagination">
            {if $db_hist|@count gt 0}
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
    var file = 'cm-loginhistory';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}
function MakeAction(loopid,type){
    document.frmlist.iLoginHistoryId.value = loopid;
    document.frmlist.action.value = type;
	document.frmlist.submit();	
}
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
</script>
{/literal}