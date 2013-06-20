<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 11:38:20
         compiled from "/var/www/qme_theme/admin/templates/postopportunity/postopportunity.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1099263876500652d47690b7-04714546%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1744101dd31f444b34c8aa368869fee48e82ff1f' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/postopportunity/postopportunity.tpl',
      1 => 1342590753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1099263876500652d47690b7-04714546',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_admin_creditor_url"];?>
/ckeditor.js"></script>
<div id="content">
	<div class="container" id="tabs">
		<div class="conthead">
			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
			<h2 class="left">Add Opportunity</h2>
			<?php }else{ ?>
			<h2 class="left">Edit Opportunity</h2>
			<?php }?>
		</div>
		<div class="contentbox" id="tabs-1">
				<form id="frmadd" name="frmadd" action="index.php?file=po-postopportunity_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iPostId" id="iPostId" value="<?php echo $_smarty_tpl->getVariable('iPostId')->value;?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
		
					<div class="inputboxes">
						<label for="textfield"><strong>Member:</strong></label>
						<select id="iMemberId" name="Data[iMemberId]" lang="*" title="Member">
							<option value=''>--Select Member--</option>
							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_PostOppMember')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<option value='<?php echo $_smarty_tpl->getVariable('db_PostOppMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
' <?php if ($_smarty_tpl->getVariable('db_PostOppMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId']==$_smarty_tpl->getVariable('db_postoopt')->value[0]['iMemberId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_PostOppMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
</option>
							<?php endfor; endif; ?>
						</select>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Type:</strong></label>
						<select id="eType" name="Data[eType]" onchange="showdropdownvalue(this.value);">
						<option value=''>Select</option>
						<option value="Local" <?php if ($_smarty_tpl->getVariable('db_postoopt')->value[0]['eType']=='local'){?>selected<?php }?>>Local</option>
						<option value="National" <?php if ($_smarty_tpl->getVariable('db_postoopt')->value[0]['eType']=='national'){?>selected<?php }?>>National</option>
						</select>
					</div>
					<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
						<div class="inputboxes" id="nationalfield" style="display:none;">
							<label for="textfield"><strong>Country:</strong></label>
							<div id="nationaltext"></div>
						</div>
						<div class="inputboxes" id="localfield1" style="display:none;">
							<label for="textfield"><strong>Town:</strong></label>
							<div id="localtext1"></div>
						</div>
						<div class="inputboxes" id="localfield2" style="display:none;">
								<label for="textfield"><strong>City:</strong></label>
								<div id="localtext2"></div>
						</div>
						<div class="inputboxes" id="localfield3" style="display:none;">
								<label for="textfield"><strong>Zip:</strong></label>
								<div id="localtext3"></div>
						</div>
						<div class="inputboxes" id="localfield4" style="display:none;">
								<label for="textfield"><strong>Mile:</strong></label>
								<div id="localtext4"></div>
						</div>
					<?php }else{ ?>
						<?php if ($_smarty_tpl->getVariable('db_postoopt')->value[0]['eType']=='national'){?>
						<div class="inputboxes" id="nationalfield">
							<label for="textfield"><strong>Country:</strong></label>
							<div id="nationaltext"><input type="text" id="vCountry" name="Data[vCountry]" class="inputbox" title="Country" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postoopt')->value[0]['vCountry'];?>
"/></div>
						</div>
						<?php }else{ ?>
						<div class="inputboxes" id="localfield1" style="display:none;">
							<label for="textfield"><strong>Town:</strong></label>
							<div id="localtext1"><input type="text" id="vTown" name="Data[vTown]" class="inputbox" title="Town" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postoopt')->value[0]['vTown'];?>
"/></div>
						</div>
						<div class="inputboxes" id="localfield2" style="display:none;">
								<label for="textfield"><strong>City:</strong></label>
								<div id="localtext2"><input type="text" id="vLocalCity" name="Data[vLocalCity]" class="inputbox" title="City" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postoopt')->value[0]['vLocalCity'];?>
"/></div>
						</div>
						<div class="inputboxes" id="localfield3" style="display:none;">
								<label for="textfield"><strong>Zip:</strong></label>
								<div id="localtext3"><input type="text" id="vLocalZip" name="Data[vLocalZip]" class="inputbox" title="Zip" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postoopt')->value[0]['vLocalZip'];?>
"/></div>
						</div>
						<div class="inputboxes" id="localfield4" style="display:none;">
								<label for="textfield"><strong>Mile:</strong></label>
								<div id="localtext4"><input type="text" id="vLocalMile" name="Data[vLocalMile]" class="inputbox" title="Mile" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postoopt')->value[0]['vLocalMile'];?>
"/></div>
						</div>
						<?php }?>
					<?php }?>
					
					
					<div class="inputboxes">
						<label for="textfield"><strong>What skill are you looking for?</strong></label>
						<input type="text" id="vSkill" name="Data[vSkill]" class="inputbox" lang="*" title="Skill" value="<?php echo $_smarty_tpl->getVariable('db_postoopt')->value[0]['vSkill'];?>
"/>
					</div>
					
					<div class="inputboxes">
						<label for="textfield"><strong>What do you need this person to do?</strong></label>
						<textarea id="tDescription" name="Data[tDescription]" class="inputbox" title="What do you need this person to do"><?php echo $_smarty_tpl->getVariable('db_postoopt')->value[0]['tDescription'];?>
</textarea>
					</div>
					
					<div class="inputboxes">
						<label for="textfield"><strong>Status :</strong></label>
							<select id="eStatus" name="Data[eStatus]">
							<option value="Active" <?php if ($_smarty_tpl->getVariable('db_postoop')->value[0]['eStatus']=='Active'){?>selected<?php }?> >Active</option>
							<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_postoop')->value[0]['eStatus']=='Inactive'){?>selected<?php }?> >Inactive</option>
						</select>
					</div>
					<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
					<input type="submit" value="Add Opportunity" class="btn" title="Add Opportunity" onclick="return validate(document.frmadd);"/>
					<?php }else{ ?>
					<input type="submit" value="Edit Opportunity" class="btn" title="Edit Opportunity" onclick="return validate(document.frmadd);"/>
					<?php }?>
					<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
				</form>
		</div>
	</div>
</div>

<script>
function redirectcancel(){

    window.location="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=po-postopportunity&mode=view";
    return false;
}

showdropdownvalue($('#eType').val());
function showdropdownvalue(val){
	if(val != 'Local'){
		$('#localfield1').hide();
		$('#localtext1').html('');
		$('#localfield2').hide();
		$('#localtext2').html('');
		$('#localfield3').hide();
		$('#localtext3').html('');
		$('#localfield4').hide();
		$('#localtext4').html('');
	}else{		
		var html ='';
		html ='<input type="text" id="vTown" name="Data[vTown]" class="inputbox" title="Town" lang="*"/>';
		$('#localtext1').html(html);
		$('#localfield1').show();
		html ='<input type="text" id="vLocalCity" name="Data[vLocalCity]" class="inputbox" title="City" lang="*"/>';
		$('#localtext2').html(html);
		$('#localfield2').show();
		html ='<input type="text" id="vLocalZip" name="Data[vLocalZip]" class="inputbox" title="Zip" lang="*"/>';
		$('#localtext3').html(html);
		$('#localfield3').show();
		html ='<input type="text" id="vLocalMile" name="Data[vLocalMile]" class="inputbox" title="Mile" lang="*"/>';
		$('#localtext4').html(html);
		$('#localfield4').show();

	}
	if(val != 'National'){
		$('#nationalfield').hide();
		$('#nationaltext').html('');
	}else{		
		var html ='';
		html ='<input type="text" id="vCountry" name="Data[vCountry]" class="inputbox" title="Country" lang="*"/>';
		$('#nationaltext').html(html);
		$('#nationalfield').show();
	}
	
}
</script>
<script type="text/javascript">
	CKEDITOR.replace( 'tDescription' );


</script>

