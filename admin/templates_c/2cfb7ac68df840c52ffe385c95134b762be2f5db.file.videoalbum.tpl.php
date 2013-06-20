<?php /* Smarty version Smarty-3.0.7, created on 2012-09-08 17:23:56
         compiled from "/var/www/qme/admin/templates/videoalbum/videoalbum.tpl" */ ?>
<?php /*%%SmartyHeaderCode:370773748504b31d468d623-70581958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cfb7ac68df840c52ffe385c95134b762be2f5db' => 
    array (
      0 => '/var/www/qme/admin/templates/videoalbum/videoalbum.tpl',
      1 => 1347085680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '370773748504b31d468d623-70581958',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<div class="contentcontainer" id="tabs">
	<div class="headings">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Video Album</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Video Album</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=va-videoalbum_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iVideoAlbumId" id="iVideoAlbumId" value="<?php echo $_smarty_tpl->getVariable('iVideoAlbumId')->value;?>
" />
				
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				<div style="clear:both;"></div>
				
				<div class="inputboxes">
                                        <label for="textfield"><strong>Video Album:</strong></label>
					<input type="text" id="vVideoAlbum" name="Data[vVideoAlbum]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_videoalbum')->value[0]['vVideoAlbum'];?>
" lang="*" title="Video Album"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_videoalbum')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_videoalbum')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				
               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Video Album" class="btn" onclick="return validate(document.frmadd);" title="Add Video Album"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Video Album" class="btn" onclick="return validate(document.frmadd);" title="Edit Video Album"/>
   				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

		</form>
	</div>
</div>

<script>
function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'va-videoalbum';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=va-videoalbum&mode=view";
    return false;
}

</script>



