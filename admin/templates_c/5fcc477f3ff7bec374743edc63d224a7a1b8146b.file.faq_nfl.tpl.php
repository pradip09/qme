<?php /* Smarty version Smarty-3.0.7, created on 2013-04-29 10:20:59
         compiled from "/home/qmemedia/public_html/admin/templates/faq_nfl/faq_nfl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1641179358517e8fdbda09c3-14227898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fcc477f3ff7bec374743edc63d224a7a1b8146b' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/faq_nfl/faq_nfl.tpl',
      1 => 1367248033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1641179358517e8fdbda09c3-14227898',
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
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=fan-faq_nfl&mode=view">FAQs</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add FAQs<?php }else{ ?>Edit FAQs<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add FAQ</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit FAQ</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=fan-faq_nfl_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iFAQId" id="iFAQId" value="<?php echo $_smarty_tpl->getVariable('iFAQId')->value;?>
" />
				
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				<div class="inputboxes">
					<label for="textfield"><strong>FAQ Category:</strong></label>
					<select id="iFAQCategoryId" name="Data[iFAQCategoryId]" lang="*" title="Category" style="width:203px;">
						<option value=''>Select FAQ category</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_faqcate')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value='<?php echo $_smarty_tpl->getVariable('db_faqcate')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iFAQCategoryId'];?>
' <?php if ($_smarty_tpl->getVariable('db_faqcate')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iFAQCategoryId']==$_smarty_tpl->getVariable('db_faq')->value[0]['iFAQCategoryId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_faqcate')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCategory'];?>
</option>
						<?php endfor; endif; ?>
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Question:</strong></label>
					<input type="text" id="vQuestion" name="Data[vQuestion]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_faq')->value[0]['vQuestion'];?>
" lang="*" title="Question" style="width:582px"/>
				</div>
				<div class="inputboxes">
					<label style="margin-bottom:7px;" for="textfield"><strong>Answer:</strong></label>
					<textarea id="tAnswer" name="Data[tAnswer]" class="inputbox" title="Answer"  lang="*" style="width: 582px;height: 174px;"><?php echo $_smarty_tpl->getVariable('db_faq')->value[0]['tAnswer'];?>
</textarea>
				</div>
				
				

				<div class="inputboxes">
					<label for="textfield"><strong>Order No :</strong></label>
					<select id="iOrderNo" name="Data[iOrderNo]" title="Order No"  lang="*">
						<option value=''>Select Order  No</option>
						<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
							<?php while (($_smarty_tpl->getVariable('totalRec')->value+1)>=$_smarty_tpl->getVariable('initOrder')->value){?>
								<option value="<?php echo $_smarty_tpl->getVariable('initOrder')->value;?>
" <?php if ($_smarty_tpl->getVariable('db_faq')->value[0]['iOrderNo']==$_smarty_tpl->getVariable('initOrder')->value){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('initOrder')->value++;?>
</option>
							<?php }?>
						<?php }else{ ?>
							<?php while (($_smarty_tpl->getVariable('totalRec')->value)>=$_smarty_tpl->getVariable('initOrder')->value){?>
								<option value="<?php echo $_smarty_tpl->getVariable('initOrder')->value;?>
" <?php if ($_smarty_tpl->getVariable('db_faq')->value[0]['iOrderNo']==$_smarty_tpl->getVariable('initOrder')->value){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('initOrder')->value++;?>
</option>
							<?php }?>
						<?php }?>
					</select>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_faq')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_faq')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				
               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Question" class="btn" onclick="return validate(document.frmadd);" title="Add Question"  style="margin-left: 140px;"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Question" class="btn" onclick="return validate(document.frmadd);" title="Edit Question"  style="margin-left: 140px;"/>
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
    var file = 'fan-faq_nfl';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=fan-faq_nfl&mode=view";
    return false;
}

</script>



