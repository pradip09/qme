<?php /* Smarty version Smarty-3.0.7, created on 2012-07-12 16:46:35
         compiled from "/var/www/qme_theme/admin/templates/tools/generalsettings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1543321924ffeb213a4de22-61588024%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f7fb58423f3130e5d18b7f1f9af333fcf1e22a6' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/tools/generalsettings.tpl',
      1 => 1342091791,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1543321924ffeb213a4de22-61588024',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content">
<div class="container">
    <div class="conthead">
        <h2>Edit General Settings</h2>
    </div>
    
    
    <div class="contentbox">
    <?php if ($_smarty_tpl->getVariable('var_msg')->value!=''){?>
     <div class="status success" id="errormsgdiv"> 
        	<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
        	<p><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_success.png" title="Success" />
              <?php echo $_smarty_tpl->getVariable('var_msg')->value;?>
</p> 
     </div>     
    <div></div>
    <?php }?>
        <form  name="frmadd" id="frmadd"  method="post" action="index.php?file=to-generalsettings_a">
    		<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
            <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_res')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <?php if ($_smarty_tpl->getVariable('db_res')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eType']!=$_smarty_tpl->getVariable('currType')->value){?>
            <?php }?>
             <div class="inputboxes">
                <label for="textfield"><strong><?php echo $_smarty_tpl->getVariable('db_res')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tDescription'];?>
</strong></label>
                <input type="text" id="<?php echo $_smarty_tpl->getVariable('db_res')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
" name="Data[<?php echo $_smarty_tpl->getVariable('db_res')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_res')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vValue'];?>
" lang="*" title="<?php echo $_smarty_tpl->getVariable('db_res')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tDescription'];?>
"/> <br />
	     </div>
            <?php $_smarty_tpl->tpl_vars["currType"] = new Smarty_variable(($_smarty_tpl->getVariable('db_res')->value)."[i].eType", null, null);?>
            <?php endfor; endif; ?>
      	<input type="submit" value="Edit Settings" class="btn" title="Edit Settings" onclick="return validate(document.frmadd);"/>
        </form>
    </div>
</div>
</div>

<script>
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
</script>
        