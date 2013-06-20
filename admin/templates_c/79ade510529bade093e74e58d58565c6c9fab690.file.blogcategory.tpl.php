<?php /* Smarty version Smarty-3.0.7, created on 2012-08-13 20:07:33
         compiled from "/var/www/qme/admin/templates/blogcategory/blogcategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18529207965029112d8bc9c4-97336567%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79ade510529bade093e74e58d58565c6c9fab690' => 
    array (
      0 => '/var/www/qme/admin/templates/blogcategory/blogcategory.tpl',
      1 => 1342093730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18529207965029112d8bc9c4-97336567',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Blog Category</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Blog Category</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=bc-blogcategory_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iBlogCategoryId" id="iBlogCategoryId" value="<?php echo $_smarty_tpl->getVariable('iBlogCategoryId')->value;?>
" />
				
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
				<div class="inputboxes">
					<label for="textfield"><strong>Blog Category:</strong></label>
					<input type="text" id="vBlogCategory" name="Data[vBlogCategory]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_blogcategory')->value[0]['vBlogCategory'];?>
" lang="*" title="Blog Category" style="width:900px"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_blogcategory')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_blogcategory')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				
               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Blog Category" class="btn" onclick="return validate(document.frmadd);" title="Add Blog Category"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Blog Category" class="btn" onclick="return validate(document.frmadd);" title="Edit Blog Category"/>
   				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

		</form>
	</div>
</div>
<div id="content">

<script>
function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'bc-blogcategory';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=bc-blogcategory&mode=view";
    return false;
}

</script>



