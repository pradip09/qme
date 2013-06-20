<?php /* Smarty version Smarty-3.0.7, created on 2012-12-26 03:58:51
         compiled from "/home/qmemedia/public_html/admin/templates/postjob/mpostjob.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96255605150daca5b9c19f8-70426661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a689e3cc08ee89e58d256b22df370d84b150f6e' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/postjob/mpostjob.tpl',
      1 => 1356511725,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96255605150daca5b9c19f8-70426661',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_admin_creditor_url"];?>
/ckeditor.js"></script>
	<div class="container" id="tabs">
		<div class="conthead">
			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
			<h2 class="left">Add Post</h2>
			<?php }else{ ?>
			<h2 class="left">Edit Post</h2>
			<?php }?>
		</div>
		<div class="contentbox" id="tabs-1">
			<form id="frmadd" name="frmadd" action="index.php?file=pj-mpostjob_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iPostJobId" id="iPostJobId" value="<?php echo $_smarty_tpl->getVariable('iPostJobId')->value;?>
" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="<?php echo $_smarty_tpl->getVariable('iMemberId')->value;?>
" />
			<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />		
				<div class="inputboxes">
					<label for="textfield" style="width:300px;"><strong>What skill are you looking for?</strong></label>
				</div>
				<input style="width:600px;" type="text" id="vSkill" name="Data[vSkill]" class="inputbox" lang="*" title="Skill" value="<?php echo $_smarty_tpl->getVariable('db_postjob')->value[0]['vSkill'];?>
"/>
				<div style="clear:both"></div>
				<div class="inputboxes">
					<label for="textfield" style="width:300px;"><strong>What do you need this person to do?</strong></label>
				</div>
				<textarea id="tDescription" name="Data[tDescription]" class="inputbox" title="What do you need this person to do"><?php echo $_smarty_tpl->getVariable('db_postjob')->value[0]['tDescription'];?>
</textarea>
				
				<div class="inputboxes">
					<label for="textfield"><strong>State:</strong></label>
					<select id="iStateId" name="Data[iStateId]" lang="*" title="State">
						<option value=''>--Select State--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_state')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<option value='<?php echo $_smarty_tpl->getVariable('db_state')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iStateId'];?>
' <?php if ($_smarty_tpl->getVariable('db_state')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iStateId']==$_smarty_tpl->getVariable('db_postjob')->value[0]['iStateId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_state')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vState'];?>
</option>
						<?php endfor; endif; ?>
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>City:</strong></label>
					<input type="text" id="vCity" name="Data[vCity]" class="inputbox" title="City" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postjob')->value[0]['vCity'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Zip:</strong></label>
					<input type="text" id="vZip" name="Data[vZip]" class="inputbox" title="Zip" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postjob')->value[0]['vZip'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Mile:</strong></label>
					<input type="text" id="vMile" name="Data[vMile]" class="inputbox" title="Mile" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postjob')->value[0]['vMile'];?>
"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status :</strong></label>
						<select id="eStatus" name="Data[eStatus]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_postjob')->value[0]['eStatus']=='Active'){?>selected<?php }?> >Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_postjob')->value[0]['eStatus']=='Inactive'){?>selected<?php }?> >Inactive</option>
					</select>
				</div>
				<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
					<input type="submit" value="Add Post" class="btn" title="Add Post" onclick="return validate(document.frmadd);"/>
				<?php }else{ ?>
					<input type="submit" value="Edit Post" class="btn" title="Edit Post" onclick="return validate(document.frmadd);"/>
				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</form>
		</div>
	</div>

<script>
function redirectcancel(){

    window.location="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=m-member&mode=edit#tab-postjob";
    return false;
}

</script>

<script type="text/javascript">
	CKEDITOR.replace( 'tDescription' );
</script>

