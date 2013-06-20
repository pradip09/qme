<?php /* Smarty version Smarty-3.0.7, created on 2012-07-16 12:18:22
         compiled from "/var/www/qme_theme/admin/templates/photo/photocategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10648913265003b936ee30f0-19132627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5babc8993a368ee41e4ebe952fd2fbc09a00e04' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/photo/photocategory.tpl',
      1 => 1342187130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10648913265003b936ee30f0-19132627',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Photo Category</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Photo Category</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=ph-photocategory_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iPhotoCategoryId" id="iPhotoCategoryId" value="<?php echo $_smarty_tpl->getVariable('iPhotoCategoryId')->value;?>
" />
				
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
				<div class="inputboxes">
					<label for="textfield"><strong>Photo Category:</strong></label>
					<input type="text" id="vPhotoCategory" name="Data[vPhotoCategory]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_photocategory')->value[0]['vPhotoCategory'];?>
" lang="*" title="Photo Category" style="width:900px"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_photocategory')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_photocategory')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				
               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Photo Category" class="btn" onclick="return validate(document.frmadd);" title="Add Photo Category"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Photo Category" class="btn" onclick="return validate(document.frmadd);" title="Edit Photo Category"/>
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
    var file = 'ph-photocategory';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=ph-photocategory&mode=view";
    return false;
}

</script>



