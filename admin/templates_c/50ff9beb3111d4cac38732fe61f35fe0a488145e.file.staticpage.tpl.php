<?php /* Smarty version Smarty-3.0.7, created on 2012-12-31 23:10:09
         compiled from "/home/qmemedia/public_html/admin/templates/tools/staticpage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195100329750e26fb1755e81-50828674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50ff9beb3111d4cac38732fe61f35fe0a488145e' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/tools/staticpage.tpl',
      1 => 1356511655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195100329750e26fb1755e81-50828674',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_admin_creditor_url"];?>
/ckeditor.js"></script>
<script>stateArr = new Array(<?php echo $_smarty_tpl->getVariable('stateArr')->value;?>
);</script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=to-staticpage&mode=view">Static Pages</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Static Pages<?php }else{ ?>Edit Static Pages<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Static Page</h2>
		<?php }else{ ?>
		<h2 class="left">Edit Static Page</h2>
		<?php }?>
	</div>
        <div class="contentbox" id="tabs-1">
		<form id="frmadd" name="frmadd" action="index.php?file=to-staticpage_a" method="post">
				<input type="hidden" name="iPageId" id="iPageId" value="<?php echo $_smarty_tpl->getVariable('iPageId')->value;?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
                                <div class="inputboxes">
					<label for="textfield"><strong>Pagecode:</strong></label>
					<select id="vPageCode" name="Data[vPageCode]" lang="*" title="PageCode" style="width:224px;">
						<option value=''>--Page Code--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_Pagecode')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value='<?php echo $_smarty_tpl->getVariable('db_Pagecode')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPageCode'];?>
' <?php if ($_smarty_tpl->getVariable('db_Pagecode')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPageCode']==$_smarty_tpl->getVariable('db_static_pages')->value[0]['vPageCode']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_Pagecode')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPageCode'];?>
</option>
						<?php endfor; endif; ?>
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>DisplayName:</strong></label>
					<input type="text" id="vDisplayName" name="Data[vDisplayName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_static_pages')->value[0]['vDisplayName'];?>
" lang="*" title="Display Name"/>
				</div>
                               
                                <div class="inputboxes">
					<label for="textfield"><strong>Meta Title:</strong></label>
					<input type="text" id="tMetaTitle"  name="Data[tMetaTitle]" class="inputbox"  lang="*" title="MetaTitle" value="<?php echo $_smarty_tpl->getVariable('db_static_pages')->value[0]['tMetaTitle'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Meta Keyword:</strong></label>
					<input type="text" id="tMetaKeyword" name="Data[tMetaKeyword]" class="inputbox" lang="*" title="MetaKeyword" value="<?php echo $_smarty_tpl->getVariable('db_static_pages')->value[0]['tMetaKeyword'];?>
"/>
				</div>
                                <div class="inputboxes">
					<label for="textfield"><strong>Meta Description:</strong></label>
					<input type="text" id="tMetaDesc"  name="Data[tMetaDesc]" class="inputbox" lang="*" title="MetaDescription " value="<?php echo $_smarty_tpl->getVariable('db_static_pages')->value[0]['tMetaDesc'];?>
"/>
				</div>
                                <div class="inputboxes">
					<label for="textfield"><strong>Content:</strong></label>
				</div>
				<p>
					<textarea id="lContents" name="Data[lContents]" class="text2"><?php echo $_smarty_tpl->getVariable('db_static_pages')->value[0]['lContents'];?>
</textarea>
				</p>
                                  
				<div class="inputboxes">
					<label for="textfield" ><strong>Status:</strong></label>
					<select id="eStatus " name="Data[eStatus ]" style="width:224px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_static_pages')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_static_pages')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
				<input type="submit" value="Add Page" class="btn" onclick="return validate(document.frmadd);" title="Add Page" style="margin-left:140px;"/>
                               <?php }else{ ?>
                                <input type="submit" value="Edit Page" class="btn" onclick="return validate(document.frmadd);" title="Edit Page" style="margin-left:140px;"/>
   				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
                                
		        </form>
        </div>
</div>
</div>




<script>
function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'to-staticpage';
    window.location=admin_url+"/index.php?file=to-staticpage&mode=view";
    return false;
}
</script>
<script type="text/javascript">
	CKEDITOR.config.width=800;
	CKEDITOR.replace( 'lContents' );
</script>

