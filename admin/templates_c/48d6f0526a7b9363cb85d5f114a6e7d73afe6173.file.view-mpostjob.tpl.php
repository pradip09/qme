<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 18:13:59
         compiled from "/var/www/qme_theme/admin/templates/postjob/view-mpostjob.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8068289325006af8fd252d0-45565841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48d6f0526a7b9363cb85d5f114a6e7d73afe6173' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/postjob/view-mpostjob.tpl',
      1 => 1342615435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8068289325006af8fd252d0-45565841',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
jlist.js"></script>

<div class="container">
	<div class="conthead">
		<h2>Post Job</h2>
	</div>
	<div class="contentbox">
		
		<form name="frmsearch" id="frmsearch" action="#tab-postjob" method="post">
		<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
" name="type">
		<table width="100%" border="0">
			<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label><td>
				<td width="10%"><input type="Text" id="keyword" name="keyword" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
" class="inputbox" /><td>
				<td width="10%">
					<select name="option" id="option">
						<option  value='vSkill'>Skill</option>
						<option value="eStatus">Status</option>
					</select>
				</td>
				<td width="60%"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoption();"/></td>
				<td width="10%"><input type="button" value="Add New" onclick="Redirect('index.php?file=m-member&iMemberId=<?php echo $_smarty_tpl->getVariable('iMemberId')->value;?>
&mode=add#tab-addpostjob');" class="btn" /></td>
			</tr>
			</tbody>			
		</table> 
		</form>
		<form name="frmjoblist" id="frmjoblist"  action="index.php?file=pj-mpostjob_a" method="post">
		
			<table width="100%" border="0">
			<input type="hidden" name="action" id="action" value="" />
		<input  type="hidden" name="iPostJobId" value=""/>
		<thead>
				<tr>
					<th>What skill are you looking for?</th>
					<th>Status</th>
					<th>Action</th>
					<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmjoblist);"/></th>
				</tr>
			</thead>
			<tbody>
		<?php if (count($_smarty_tpl->getVariable('db_viewpostjob')->value)>0){?>
			<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_viewpostjob')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
/index.php?file=m-member&iMemberId=<?php echo $_smarty_tpl->getVariable('iMemberId')->value;?>
&mode=edit&iPostJobId=<?php echo $_smarty_tpl->getVariable('db_viewpostjob')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostJobId'];?>
#tab-addpostjob" title=""><?php echo $_smarty_tpl->getVariable('db_viewpostjob')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vSkill'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('db_viewpostjob')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
				<td>
					<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&iMemberId=<?php echo $_smarty_tpl->getVariable('iMemberId')->value;?>
&mode=edit&iPostJobId=<?php echo $_smarty_tpl->getVariable('db_viewpostjob')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostJobId'];?>
#tab-addpostjob" title=""><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_edit.png" title="Edit" /></a>
					<a href="javascript:void(0);" title="Active" onclick="MakeActionJob('<?php echo $_smarty_tpl->getVariable('db_viewpostjob')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostJobId'];?>
','Active');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_approve.png" title="Active" /></a>
					<a href="javascript:void(0);" title="Inactive" onclick="MakeActionJob('<?php echo $_smarty_tpl->getVariable('db_viewpostjob')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostJobId'];?>
','Inactive');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_unapprove.png" title="Inactive" /></a>
					<a href="javascript:void(0 );" title="Delete" onclick="MakeActionJob('<?php echo $_smarty_tpl->getVariable('db_viewpostjob')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostJobId'];?>
','Deletes');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_delete.png" title="Delete" /></a>
				</td>
				<td><input name="iPostJobId[]" type="checkbox" id="iId" value="<?php echo $_smarty_tpl->getVariable('db_viewpostjob')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostJobId'];?>
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
		</form>
		<div class="extrabottom">
			<ul style="display:none">
			</ul>
			<div class="bulkactions">
				<select name="newactionjob" id="newactionjob">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Active</option>
					<option value="Inactive">InActive</option>
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionjob').value,'pj-mpostjob',document.frmjoblist);"/>
			</div>
		</div>
        <div>
            <?php echo $_smarty_tpl->getVariable('page_link')->value;?>

        </div>		
	<div style="clear: both;"></div></div>
</div>



	<script>
	function Searchoption(){
	    document.getElementById('frmsearch').submit();
	}
	function AlphaSearch(val){
	    var alphavalue = val;
	    var file = 'pj-mpostjob';
	    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
	    return false;
	}
	function MakeActionJob(loopid,type){
	    document.frmjoblist.iPostJobId.value = loopid;
	    document.frmjoblist.action.value = type;
		document.frmjoblist.submit();	
	}
	function hidemessage(){
	    jQuery("#errormsgdiv").slideUp();
	}
	</script>
