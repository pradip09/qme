<?php /* Smarty version Smarty-3.0.7, created on 2012-11-27 19:59:55
         compiled from "/var/www/qme/admin/templates/faq/faqcat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187255252050b4ce63a462c6-75471838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af091b8305c666ba107f2ca36f336c00f44a7516' => 
    array (
      0 => '/var/www/qme/admin/templates/faq/faqcat.tpl',
      1 => 1354026445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187255252050b4ce63a462c6-75471838',
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
/index.php?file=fa-faqcat&mode=view">FAQ Category</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add FAQ Category<?php }else{ ?>Edit FAQ Category<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add FAQ Category</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit FAQ Category</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=fa-faqcat_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iFAQCategoryId" id="iFAQCategoryId" value="<?php echo $_smarty_tpl->getVariable('iFAQCategoryId')->value;?>
" />
				
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				<div class="inputboxes">
					<label for="textfield"><strong>FAQ Category</strong></label>
					<?php if ($_smarty_tpl->getVariable('db_faqcat')->value[0]['vCategory']=='Buy Points'){?>
					<input type="text" id="vCategory" name="Data[vCategory]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_faqcat')->value[0]['vCategory'];?>
" lang="*" title="Category" readonly="readonly"/>
					<?php }else{ ?>
					<input type="text" id="vCategory" name="Data[vCategory]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_faqcat')->value[0]['vCategory'];?>
" lang="*" title="Category"/>
					<?php }?>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Order No :</strong></label>
					<select id="iOrderNo" name="Data[iOrderNo]" title="Order No"  lang="*"  style="width:224px;">
						<option value=''>Select Order  No</option>
						<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
							<?php while (($_smarty_tpl->getVariable('totalRec')->value+1)>=$_smarty_tpl->getVariable('initOrder')->value){?>
								<option value="<?php echo $_smarty_tpl->getVariable('initOrder')->value;?>
" <?php if ($_smarty_tpl->getVariable('db_faqcat')->value[0]['iOrderNo']==$_smarty_tpl->getVariable('initOrder')->value){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('initOrder')->value++;?>
</option>
							<?php }?>
						<?php }else{ ?>
							<?php while (($_smarty_tpl->getVariable('totalRec')->value)>=$_smarty_tpl->getVariable('initOrder')->value){?>
								<option value="<?php echo $_smarty_tpl->getVariable('initOrder')->value;?>
" <?php if ($_smarty_tpl->getVariable('db_faqcat')->value[0]['iOrderNo']==$_smarty_tpl->getVariable('initOrder')->value){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('initOrder')->value++;?>
</option>
							<?php }?>
						<?php }?>
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]"  style="width:224px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_faqcat')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_faqcat')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				
               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add FAQ Category" class="btn" onclick="return validate(document.frmadd);" title="Add FAQ Category"  style="margin-left: 140px;"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit FAQ Category" class="btn" onclick="return validate(document.frmadd);" title="Edit FAQ Category"  style="margin-left: 140px;"/>
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
    var file = 'fa-faqcat';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=fa-faqcat&mode=view";
    return false;
}

</script>



