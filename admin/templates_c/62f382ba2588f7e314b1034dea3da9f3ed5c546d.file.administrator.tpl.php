<?php /* Smarty version Smarty-3.0.7, created on 2012-06-09 15:34:56
         compiled from "/var/www/quotation/admin/templates/administrator/administrator.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12579341774fd31fc85e87d9-18788577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62f382ba2588f7e314b1034dea3da9f3ed5c546d' => 
    array (
      0 => '/var/www/quotation/admin/templates/administrator/administrator.tpl',
      1 => 1339236291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12579341774fd31fc85e87d9-18788577',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="contentcontainer" id="tabs">
	<div class="headings">
		<h2 class="left">Add Administrator</h2>
	</div>
	<div class="contentbox" id="tabs-1">
            
			<form id="frmadd" name="frmadd" action="index.php?file=ad-administrator_a" method="post">
            <input type="hidden" name="iAdminId" id="iAdminId" value="<?php echo $_smarty_tpl->getVariable('iAdminId')->value;?>
" />
            <input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				<p>
					<label for="textfield"><strong>First Name :</strong></label>
					<input type="text" id="vLastName" name="Data[vFirstName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_admin')->value[0]['vFirstName'];?>
" lang="*" title="First Name"/>
				</p>
				<p>
					<label for="textfield"><strong>Last Name :</strong></label>
					<input type="text" id="vLastName" name="Data[vLastName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_admin')->value[0]['vLastName'];?>
" lang="*" title="Last Name"/>
				</p>
				<!--<p>
					<label for="textfield"><strong>Assign Group :</strong></label>
					<select name="Data[iGroupId]" id="iGroupId" style="width:200px;" lang="*" title="Group">
						<option value="">---Select Group---</option>
                        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_groups')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <?php if ($_smarty_tpl->getVariable('db_admin')->value[0]['iGroupId']==$_smarty_tpl->getVariable('db_groups')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iGroupId']){?>
                           <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_variable("selected", null, null);?>
                        <?php }else{ ?>
                        <?php $_smarty_tpl->tpl_vars["selected"] = new Smarty_variable('', null, null);?>
                        <?php }?>
                        <option value="<?php echo $_smarty_tpl->getVariable('db_groups')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iGroupId'];?>
" <?php echo $_smarty_tpl->getVariable('selected')->value;?>
><?php echo $_smarty_tpl->getVariable('db_groups')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vGroup'];?>
</option>
                        <?php endfor; endif; ?>
					</select>
				</p>-->
				<p>
					<label for="textfield"><strong>E-mail :</strong></label>
					<input type="text" id="vEmail"  name="Data[vEmail]" class="inputbox"  lang="*{E}" title="E-mail" value="<?php echo $_smarty_tpl->getVariable('db_admin')->value[0]['vEmail'];?>
"/>
				</p>
				<p>
					<label for="textfield"><strong>User Name :</strong></label>
					<input type="text" id="vUserName" name="Data[vUserName]" class="inputbox" lang="*{P}6:0" title="User Name" value="<?php echo $_smarty_tpl->getVariable('db_admin')->value[0]['vUserName'];?>
"/>
				</p>
				<p>
					<label for="textfield"><strong>Password :</strong></label>
					<input type="password" id="vPassword"  name="Data[vPassword]" class="inputbox" lang="*{P}6:0" title="Password" value="<?php echo $_smarty_tpl->getVariable('db_admin')->value[0]['vPassword'];?>
"/>
				</p>
				<p>
					<label for="textfield"><strong>Status :</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_admin')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_admin')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</p>
				<?php if ($_smarty_tpl->getVariable('mode')->value=='edit'){?>
				<input type="submit" value="Edit Administrator" class="btn" onclick="return validate(document.frmadd);" title="Edit Administrator"/>
				      <?php }else{ ?>
   				<input type="submit" value="Add Administrator" class="btn" onclick="return validate(document.frmadd);" title="Add Administrator"/>
  				
				      
				      <?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</form>
	</div>
</div>

<script>
function redirectcancel()
{
    window.location="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=ad-administrator&mode=view";
    return false;
}
</script>

