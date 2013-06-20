<?php /* Smarty version Smarty-3.0.7, created on 2012-11-27 20:11:39
         compiled from "/var/www/qme/admin/templates/tools/generalsettings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136019313550b4d1239d5140-65423455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '372712232d59b65f8e2d8cdeadd64711ef297dad' => 
    array (
      0 => '/var/www/qme/admin/templates/tools/generalsettings.tpl',
      1 => 1354027295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136019313550b4d1239d5140-65423455',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="breadcrumb">
	<ul>
		<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=home-dashboard">Dashboard</a></li>
		
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='edit'){?>Edit General Settings<?php }?></li>
	</ul>
</div>
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
      	<input type="submit" value="Edit Settings" class="btn" title="Edit Settings" onclick="return validate(document.frmadd);" style="margin-left:140px;"/>
        </form>
    </div>
</div>
</div>

<script>
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
</script>
        