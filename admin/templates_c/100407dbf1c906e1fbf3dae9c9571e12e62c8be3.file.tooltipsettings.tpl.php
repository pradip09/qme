<?php /* Smarty version Smarty-3.0.7, created on 2013-01-11 10:00:10
         compiled from "/home/qmemedia/public_html/admin/templates/tools/tooltipsettings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159519695550f0370acb6265-57009754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '100407dbf1c906e1fbf3dae9c9571e12e62c8be3' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/tools/tooltipsettings.tpl',
      1 => 1356511664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159519695550f0370acb6265-57009754',
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
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='edit'){?>Edit Tooltip Settings<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container">
    <div class="conthead">
        <h2>Edit Tooltip  Settings</h2>
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
        <form  name="frmaddtool" id="frmaddtool"  method="post" action="index.php?file=to-tooltipsettings_a">
    		<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
		<div class="container top " style="padding:20px;">
					<div class="conthead">
						<h2>My Account</h2>
					</div>					
              
            
             <div class="inputboxes">
                <!--<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('db_tool')->value[0]['vToolTipField'];?>
" name="Data[<?php echo $_smarty_tpl->getVariable('db_tool')->value[0]['iToolTipId'];?>
]" id="Data[<?php echo $_smarty_tpl->getVariable('db_tool')->value[0]['iToolTipId'];?>
]">--> 
		<label style="width:700px;" for="textfield"><strong><?php echo $_smarty_tpl->getVariable('db_tool')->value[0]['vToolTipField'];?>
</strong></label><br><br>
                <input style="width:650px;" type="text" id="<?php echo $_smarty_tpl->getVariable('db_tool')->value[0]['vToolTipField'];?>
" name="Data[<?php echo $_smarty_tpl->getVariable('db_tool')->value[0]['vToolTipField'];?>
]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_tool')->value[0]['vToolTipText'];?>
" lang="*" title="<?php echo $_smarty_tpl->getVariable('db_tool')->value[0]['vToolTipField'];?>
"/> <br />
	     </div>
	    
		</div>
		
	     <div class="container top " style="padding:20px;">
		       <div class="conthead">
			    <h2>My Compaign</h2>
		       </div>
		
		<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['k']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['name'] = 'k';
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_tool')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total']);
?>
		 <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['k']['index']!='0'){?>
                 <div class="inputboxes">
		   <!-- <input type="hidden" value="<?php echo $_smarty_tpl->getVariable('db_tool')->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['vToolTipField'];?>
" name="<?php echo $_smarty_tpl->getVariable('db_tool')->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['iToolTipId'];?>
" id="<?php echo $_smarty_tpl->getVariable('db_tool')->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['iToolTipId'];?>
">-->
                   <label style="width:700px;" for="textfield"><strong><?php echo $_smarty_tpl->getVariable('db_tool')->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['vToolTipField'];?>
</strong></label><br/><br/>
                    <input style="width:650px;" type="text" id="<?php echo $_smarty_tpl->getVariable('db_tool')->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['vToolTipField'];?>
" name="Data[<?php echo $_smarty_tpl->getVariable('db_tool')->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['vToolTipField'];?>
]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_tool')->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['vToolTipText'];?>
" lang="*" title="<?php echo $_smarty_tpl->getVariable('db_tool')->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['vToolTipField'];?>
"/> <br />
	         </div>
		 <?php }?>
                <?php endfor; endif; ?>
	    </div>

		
      	<input type="submit" value="Edit Settings" class="btn" title="Edit Settings" onclick="return validate(document.frmaddtool);"  style="margin-left:20px;"/>
        </form>
    </div>
</div>
</div>

<script>
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
</script>
        