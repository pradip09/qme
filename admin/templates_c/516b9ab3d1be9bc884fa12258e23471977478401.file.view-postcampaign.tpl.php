<?php /* Smarty version Smarty-3.0.7, created on 2012-12-18 19:09:17
         compiled from "/var/www/qme/admin/templates/postcampaign/view-postcampaign.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214429032550d07205ac18d8-57639996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '516b9ab3d1be9bc884fa12258e23471977478401' => 
    array (
      0 => '/var/www/qme/admin/templates/postcampaign/view-postcampaign.tpl',
      1 => 1355837581,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214429032550d07205ac18d8-57639996',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
jlist.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li class="current">Post Campaign</li>
	</ul>
</div>
<div id="content">
<div class="container">
	<div class="conthead">
		<h2>Post Campaign</h2>
	</div>
	<div class="contentbox">
	<?php if ($_smarty_tpl->getVariable('var_msg_new')->value!=''){?>
	<div class="status success" id="errormsgdiv"> 
		    <p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
		    <p><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_success.png" title="Success" />
		  <?php echo $_smarty_tpl->getVariable('var_msg_new')->value;?>
</p> 
	</div>     
	<div></div>
	<?php }elseif($_smarty_tpl->getVariable('var_msg')->value!=''){?>
	<div class="status success" id="errormsgdiv"> 
		    <p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
		    <p><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_success.png" title="Success" />
		  <?php echo $_smarty_tpl->getVariable('var_msg')->value;?>
</p> 
	</div>
	
	<div></div>
	
	<?php }?>
		<form name="frmsearch" id="frmsearch" action="" method="post">
		<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
" name="type">
		<table width="100%" border="0">
			<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label><td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword" name="keyword" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
" class="inputbox" /></div><td>
				<td width="10%"><div class="bulkactions">
					<select name="option" id="option">
						<option  value='p.vCampaignName'>Campaign Name</option>
						<option  value='concat(a.vFirstName," ",a.vLastName)'>Admin Name</option>
						<option value="p.eStatus">Status</option>
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoption();"/></div></td>
				<td width="10%"><div class="bulkactions"><input type="button" value="Add New" onclick="Redirect('index.php?file=pc-postcampaign&mode=add');" class="btn" /></div></td>
			</tr>	
			<tr>
				<td colspan="7" align="center">
					<div style="width:821px; margin:auto;"><?php echo $_smarty_tpl->getVariable('AlphaBox')->value;?>
</div>
				</td>
				
			</tr>
			</tbody>			
		</table> 
		</form>
		<form name="frmlist" id="frmlist"  action="index.php?file=pc-postcampaign_a" method="post">
		<div class="administator_table">
			<table width="100%" border="0">
			<input type="hidden" name="action" id="action" value="" />
		<input  type="hidden" name="iCampaignId" value=""/>
		<thead>
				<tr>
					<th>Campaign Name</th>
					<th>Admin</th>
					<th>Status</th>
					<th>Action</th>
					<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmlist);"/></th>
				</tr>
			</thead>
			<tbody>
		<?php if (count($_smarty_tpl->getVariable('db_postcampaign')->value)>0){?>
			<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_postcampaign')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
		    
		<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']%2){?>
		    <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable("alt", null, null);?>
		<?php }else{ ?>
		    <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, null);?>
		<?php }?>
		<tr class="<?php echo $_smarty_tpl->getVariable('class')->value;?>
">
				
				<td><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=pc-postcampaign&mode=edit&iCampaignId=<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCampaignId'];?>
" title=""><?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCampaignName'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFirstName'];?>
 <?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vLastName'];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
				<td>
					<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=pc-postcampaign&mode=edit&iCampaignId=<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCampaignId'];?>
" title=""><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_edit.png" title="Edit" /></a>
					<a href="javascript:void(0);" title="Active" onclick="MakeAction('<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCampaignId'];?>
','Active');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_approve.png" title="Active" /></a>
					<a href="javascript:void(0);" title="Inactive" onclick="MakeAction('<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCampaignId'];?>
','Inactive');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_unapprove.png" title="Inactive" /></a>
					<a href="javascript:void(0);" title="Delete" onclick="MakeAction('<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCampaignId'];?>
','Deletes');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_delete.png" title="Delete" /></a>
				</td>
				<td><input name="iCampaignId[]" type="checkbox" id="iId" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCampaignId'];?>
"/></td>
			</tr>
		<?php endfor; endif; ?>
		<?php }else{ ?>
		<tr>
			<td height="70px;" colspan="8" style="text-align:center; color:#C44C22; font-size:14px; font-weight:bold;">No Record Found.</td>
		</tr>
		<?php }?>
			</tbody>
			</table>
		</div>
		</form>
		<div class="extrabottom">
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td>
						
				<div class="pagination">
            <?php if (count($_smarty_tpl->getVariable('db_postcampaign')->value)>0){?>
	        <span class="switch" style="float: left;"><?php echo $_smarty_tpl->getVariable('recmsg')->value;?>
</span>
	        <?php }?>
            </div></td>
			
			<td><div class="bulkactions">
				<select name="newaction" id="newaction">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction').value,'pc-postcampaign',document.frmlist);"/>
			</div></td>
				<td><div>
            
            <?php echo $_smarty_tpl->getVariable('page_link')->value;?>

        </div></td></tr></table>
		</div>
        		
	<div style="clear: both;"></div></div>
</div>
</div>


	<script>
	function Searchoption(){
	    document.getElementById('frmsearch').submit();
	}
	function AlphaSearch(val){
	    var alphavalue = val;
	    var file = 'pc-postcampaign';
	    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
	    return false;
	}
	function MakeAction(loopid,type){
	    document.frmlist.iCampaignId.value = loopid;
	    document.frmlist.action.value = type;
		document.frmlist.submit();	
	}
	function hidemessage(){
	    jQuery("#errormsgdiv").slideUp();
	}
	</script>
