<?php /* Smarty version Smarty-3.0.7, created on 2012-07-17 09:47:57
         compiled from "/var/www/qme_theme/admin/templates/song/songalbum.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16982588785004e7753d2a42-35462328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f978f9ade1f80e90aac761ee98b770964e0a9ce' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/song/songalbum.tpl',
      1 => 1341659949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16982588785004e7753d2a42-35462328',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="contentcontainer" id="tabs">
	<div class="headings">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Song Album</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Song Album</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=so-songalbum_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iSongAlbumId" id="iSongAlbumId" value="<?php echo $_smarty_tpl->getVariable('iSongAlbumId')->value;?>
" />
				
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
				<p>
					<label for="textfield"><strong>Photo Category:</strong></label>
					<input type="text" id="vSongAlbum" name="Data[vSongAlbum]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_songalbum')->value[0]['vSongAlbum'];?>
" lang="*" title="Song Album"/>
				</p>
				
				<p>
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_songalbum')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_songalbum')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</p>
				
               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Song Album" class="btn" onclick="return validate(document.frmadd);" title="Add Song Album"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Song Album" class="btn" onclick="return validate(document.frmadd);" title="Edit Song Album"/>
   				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

		</form>
	</div>
</div>

<script>
function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'so-songalbum';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=so-songalbum&mode=view";
    return false;
}

</script>



