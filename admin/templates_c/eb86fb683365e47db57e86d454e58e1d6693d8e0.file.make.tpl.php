<?php /* Smarty version Smarty-3.0.7, created on 2012-11-27 20:42:31
         compiled from "/var/www/qme/admin/templates/make/make.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12625625650b4d85f7c63b9-38211882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb86fb683365e47db57e86d454e58e1d6693d8e0' => 
    array (
      0 => '/var/www/qme/admin/templates/make/make.tpl',
      1 => 1354029148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12625625650b4d85f7c63b9-38211882',
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
/index.php?file=mk-make&mode=view">Make</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Make<?php }else{ ?>Edit Make<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Make</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Make</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=mk-make_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="imakeId" id="imakeId" value="<?php echo $_smarty_tpl->getVariable('imakeId')->value;?>
" />
				
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
				<div class="inputboxes">
					<label for="textfield"><strong>Name:</strong></label>
					<input type="text" id="vMake" name="Data[vMake]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_make')->value[0]['vMake'];?>
" lang="*" title="Name"/>
				</div>

				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:224px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_make')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_make')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				
               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Make" class="btn" onclick="return validate(document.frmadd);" title="Add Make" style="margin-left:140px;"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Make" class="btn" onclick="return validate(document.frmadd);" title="Edit Make" style="margin-left:140px;"/>
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
    var file = 'mk-make';
    window.location=admin_url+"/index.php?file=mk-make&mode=view";
    return false;
}

</script>



