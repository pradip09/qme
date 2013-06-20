<?php /* Smarty version Smarty-3.0.7, created on 2012-12-26 03:58:49
         compiled from "/home/qmemedia/public_html/admin/templates/song/song.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49681066750daca59ad7758-33930507%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '816990fe6b66e3ddf2125189db1ff3dc68c6d5cf' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/song/song.tpl',
      1 => 1356511566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49681066750daca59ad7758-33930507',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
jlist.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>

<div class="container" id="tabs">
	<div class="conthead">
		<h2 class="left">My Songs</h2>
	</div>
	<!--  Add/Edit category starts here -->
	<div class="contentbox" id="tabs-1" >

		<form id="frmaddsongcat" name="frmaddsongcat" action="index.php?file=so-songalbum_a" enctype="multipart/form-data" method="post" >
			<input type="hidden" name="iSongAlbumId" id="iSongAlbumId" value="<?php echo $_smarty_tpl->getVariable('iSongAlbumId')->value;?>
" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="<?php echo $_smarty_tpl->getVariable('iMemberId')->value;?>
" />
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="<?php echo $_smarty_tpl->getVariable('db_songalbum')->value[0]['iMemberId'];?>
" />
			<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('modeSongAlb')->value;?>
"/>
			<input type="hidden" name="actionAlbsong" id="actionAlbsong" value=""/>
			<table align="center" class="admin_top_table" width="50%">  
				<tr>
					<td>
						<div class="inputboxes inputboxes_admin">
							<label for="textfield"><strong>Song Album:</strong></label>
							<input type="text" id="vSongAlbum" name="Data[vSongAlbum]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_songalbum')->value[0]['vSongAlbum'];?>
" title="Song Album" lang="*"/>
						</div>
					</td>
				</tr>
				<tr>
				<td><div class="inputboxes inputboxes_admin">
				<label for="textfield"><strong>Select Image:</strong></label>
				<?php if ($_smarty_tpl->getVariable('db_songalbum')->value[0]['vImage']==''){?>
				<input type="file" id="vImage" name="vImage"  value="<?php echo $_smarty_tpl->getVariable('db_songalbum')->value[0]['vImage'];?>
"  title="Image" lang="*" onchange="CheckValidFile(this.value,this.name)"/>
				<?php }else{ ?>
				<input type="file" id="vImage" name="vImage" value="<?php echo $_smarty_tpl->getVariable('db_songalbum')->value[0]['vImage'];?>
" style="float:left; width:auto;"  title="Image" onchange="CheckValidFile(this.value,this.name)"/>
				<div class="view_btn"><a href="#view12" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="AlbImageDelete();" style="margin-left:8px;"/></div>
				<?php }?>
					<div style="display:none;">
						<div id="view12">
							<div class="popup_box">
								<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_music_song"];?>
<?php echo $_smarty_tpl->getVariable('db_songalbum')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_songalbum')->value[0]['vImage'];?>
" /></div>
							</div>
						</div>
					</div>
				</div>
				</td>			
				</tr>
				<tr>
					<td>
						<div class="inputboxes inputboxes_admin">
							<label for="textfield"><strong>Status:</strong></label>
							<select id="eStatus" name="Data[eStatus]">
								<option value="Active" <?php if ($_smarty_tpl->getVariable('db_songalbum')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
								<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_songalbum')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
							</select>
						</div>			
					</td>
				</tr>
				<tr>
					<td align="right" class="add_photo_btn"> 
						<?php if ($_smarty_tpl->getVariable('modeSongAlb')->value=='add'){?>
						<input type="submit" value="Add Song Album" class="btn" onclick="return validate(document.frmaddsongcat);" title="Add Song Album"/>
						<?php }else{ ?>
						<input type="submit" value="Edit Song Album" class="btn" onclick="return validate(document.frmaddsongcat);" title="Edit Song Album"/>
						<?php }?>
						<!--<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>-->
					</td>
				</tr>
			</table>
			
			
			
		</form>
	</div>
	<!--  Add/Edit category ends here -->
	<form name="frmsearchsongcat" id="frmsearchsongcat" action="#tab-song" method="post">
	<table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label>
				<td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword4" name="keyword4" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
" class="inputbox" /></div>
				<td>
				<td width="10%" ><div class="bulkactions"><select name="option4" id="option4">
						<option value="vSongAlbum">Song Album</option>
						<option value="eStatus">Status</option>
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoptionsongcat();"/></div></td>
				</td>
			</tr>
		</tbody>
	</table>
	</form>
	<!-- category listing starts here -->
	<div class="contentbox contentbox_admin" id="tabs-1">
		<form name="frmsongcatlist" id="frmsongcatlist" action="index.php?file=so-songalbum_a" method="post">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="admin_main_table">
				<input type="hidden" name="action" id="action" value="" />
				<input  type="hidden" name="iSongAlbumId" value=""/>
				<input  type="hidden" name="iMemberId" value=""/>
				<thead class="admin_table_title">
					<tr>
						<th>Song Album</th>
						<th>Status</th>
						<th>Action</th>
						<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmsongcatlist);"/></th>
					</tr>
				</thead>
				<tbody>
				
				<?php if (count($_smarty_tpl->getVariable('db_viewsongalbum')->value)>0){?>
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_viewsongalbum')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				
				<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']%2){?>
				<?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable("alt", null, null);?>
				<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, null);?>
				<?php }?>
				<tr class="<?php echo $_smarty_tpl->getVariable('class')->value;?>
">
					<td><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iSongAlbumId=<?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongAlbumId'];?>
#tab-song" title=""><?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vSongAlbum'];?>
</a></td>
					<td><?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
					<td>
						<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iSongAlbumId=<?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongAlbumId'];?>
#tab-song" title=""><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_edit.png" title="Edit" /></a>
						<a href="javascript:void(0);" title="Active" onclick="MakeActionCat('<?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongAlbumId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Active');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_approve.png" title="Active" /></a>
						<a href="javascript:void(0);" title="Inactive" onclick="MakeActionCat('<?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongAlbumId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Inactive');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_unapprove.png" title="Inactive" /></a>
						<a href="javascript:void(0);" title="Delete" onclick="MakeActionCat('<?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongAlbumId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Delete');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_delete.png" title="Delete" /></a>
					</td>
					<td><input name="iSongAlbumId[]" type="checkbox" id="iId" value="<?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongAlbumId'];?>
"/>
						<input name="iMemberId" type="hidden" id="mId" value="<?php echo $_smarty_tpl->getVariable('db_viewsongalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
"/></td>
				</tr>
				<?php endfor; endif; ?>
				<?php }else{ ?>
				<tr>
					<td height="70px;" colspan="8" style="text-align:center; color:#C44C22; font-size:14px; font-weight:bold;">No Record Found.</td>
				</tr>
				<?php }?>
				</tbody>
				
			</table>
		</form>
		<div class="extrabottom">
			<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
			<div class="pagination"> <?php if (count($_smarty_tpl->getVariable('db_viewsongalbum')->value)>0){?> <span class="switch" style="float: left;"><?php echo $_smarty_tpl->getVariable('recmsg11')->value;?>
</span> <?php }?> </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newactionSongCat">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionSongCat').value,'m-member',document.frmsongcatlist);"/>
			</div></td></tr></table>
		</div>
	</div>
	<!-- category listing ends here -->
	
	<!--- Add/Edit Song starts here --->
	<div class="contentbox" id="tabs-1" style="margin-left: -200px;">
		<form id="frmsongadd" name="frmsongadd" action="index.php?file=so-song_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iSongId" id="iSongId" value="<?php echo $_smarty_tpl->getVariable('iSongId')->value;?>
"/>
			<input type="hidden" name="vOldSong" id="vOldSong" value="<?php echo $_smarty_tpl->getVariable('db_song')->value[0]['vSong'];?>
"/>
			<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_song')->value[0]['vCoverImage'];?>
"/>
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="<?php echo $_smarty_tpl->getVariable('db_song')->value[0]['iMemberId'];?>
" />
			<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('modeSong')->value;?>
" />
			<input type="hidden" name="actionSong" id="actionSong" value="" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="<?php echo $_smarty_tpl->getVariable('iMemberId')->value;?>
"/>
			<table align="center" class="photo_edit_table">
			<tr>
			<td>
			
			<div class="inputboxes">
				<label for="textfield"><strong>Song Title:</strong></label>
				<input type="text" id="vSongTitle" name="Data[vSongTitle]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_song')->value[0]['vSongTitle'];?>
" lang="*" title="Song Title"/>
			</div>
			<div class="inputboxes">
				<label for="textfield"><strong>Song Album:</strong></label>
				<select id="iSongAlbumId" name="Data[iSongAlbumId]" title="Song Album" onchange="showdropdownvalue(this.value);">
					<option value=''>--Select Song Album--</option>
					<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_songAlb')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value='<?php echo $_smarty_tpl->getVariable('db_songAlb')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongAlbumId'];?>
' <?php if ($_smarty_tpl->getVariable('db_songAlb')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongAlbumId']==$_smarty_tpl->getVariable('db_song')->value[0]['iSongAlbumId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_songAlb')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vSongAlbum'];?>
</option>
					<?php endfor; endif; ?>
				</select>
			</div>
			<div class="inputboxes">
				<label for="textfield"><strong>Song Genre:</strong></label>
				<select id="iSongGenreId" name="Data[iSongGenreId]"  title="Song Genre">
					<option value=''>--Select Song Genre--</option>
					<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_songGenre')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value='<?php echo $_smarty_tpl->getVariable('db_songGenre')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongGenreId'];?>
' <?php if ($_smarty_tpl->getVariable('db_songGenre')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongGenreId']==$_smarty_tpl->getVariable('db_song')->value[0]['iSongGenreId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_songGenre')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vGenreName'];?>
</option>
					<?php endfor; endif; ?>
				</select>
			</div>
			<!--<div class="inputboxes">
				<label for="textfield"><strong>Order No :</strong></label>
				<select id="iOrderNo" name="Data[iOrderNo]">
					<?php if ($_smarty_tpl->getVariable('modeSong')->value=='add'){?>
						<?php while (($_smarty_tpl->getVariable('totalRecSong')->value+1)>=$_smarty_tpl->getVariable('initOrderSong')->value){?>
							<option value="<?php echo $_smarty_tpl->getVariable('initOrderSong')->value;?>
" <?php if ($_smarty_tpl->getVariable('db_song')->value[0]['iOrderNo']==$_smarty_tpl->getVariable('initOrderSong')->value){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('initOrderSong')->value++;?>
</option>
						<?php }?>
					<?php }else{ ?>
						<?php while (($_smarty_tpl->getVariable('totalRecSong')->value)>=$_smarty_tpl->getVariable('initOrderSong')->value){?>
							<option value="<?php echo $_smarty_tpl->getVariable('initOrderSong')->value;?>
" <?php if ($_smarty_tpl->getVariable('db_song')->value[0]['iOrderNo']==$_smarty_tpl->getVariable('initOrderSong')->value){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('initOrderSong')->value++;?>
</option>
						<?php }?>
					<?php }?>
				</select>
			</div>-->
			<div class="inputboxes">
				<div>
					<label for="textfield"><strong>Audio File:</strong></label>
					<?php if ($_smarty_tpl->getVariable('db_song')->value[0]['vSong']==''){?>
					<input type="file" id="vSong" name="vSong"  value="<?php echo $_smarty_tpl->getVariable('db_song')->value[0]['vSong'];?>
"  title="Mp3 File" lang="*" onchange="CheckAudioValidFile(this.value,this.id)"/>
					<?php }else{ ?>
					<input type="file" id="vSong" name="vSong" value="<?php echo $_smarty_tpl->getVariable('db_song')->value[0]['vSong'];?>
"  title="Mp3 File" onchange="CheckAudioValidFile(this.value,this.id)"/>
					<?php }?>
				</div>
				<div style="clear:both;"></div>
				<?php if ($_smarty_tpl->getVariable('db_song')->value[0]['vSong']!=''){?>
				<div style="float:left; width:450px;">
					<div style="width:260px; float:left; margin-left:135px;">
						<object type="application/x-shockwave-flash" data="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_music'];?>
/dewplayer-bubble.swf" width="250" height="65" id="dewplayer" name="dewplayer">
							<param name="wmode" value="transparent" />
							<param name="movie" value="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_music'];?>
/dewplayer-bubble.swf" />
							<param name="flashvars" value="mp3=<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_upload_music_song'];?>
<?php echo $_smarty_tpl->getVariable('db_song')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_song')->value[0]['vSong'];?>
&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />
						</object>
					</div>
					<div style="width:50px; float:left">
						<p style="margin:26px 0 10px 0;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
delete.png" onclick="SongDelete();"/></p>
					</div>
				</div>
				<?php }?>
			</div>
			<!--<div class="inputboxes">
				
				<label for="textfield"><strong>Upload Cover Photo:</strong></label>
				<?php if ($_smarty_tpl->getVariable('db_song')->value[0]['vCoverImage']==''){?>
				<input type="file" id="vCoverImage" name="vCoverImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_song')->value[0]['vCoverImage'];?>
"  title="vImage" lang="*" onchange="CheckValidFile(this.value,this.name)"/>
				<?php }else{ ?>
				<input type="file" id="vCoverImage" name="vCoverImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_song')->value[0]['vCoverImage'];?>
"  title="vImage" onchange="CheckValidFile(this.value,this.name)"/>
				<?php }?>
				<div style="clear:both;"></div>
				<?php if ($_smarty_tpl->getVariable('db_song')->value[0]['vCoverImage']!=''){?>
				<div style="float:left; width:350px;">
					<div style="float:left; margin:10px 5px 0px 140px;"><a href="#viewSong" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp4=ob_get_clean();?><?php echo $_tmp4;?>
view.png"/></a></div>
					<p style="margin:10px 5px 0px 140px;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp5=ob_get_clean();?><?php echo $_tmp5;?>
delete.png" onclick="CoverImageDelete();"/></p>
					<div style="display:none;">
						<div id="viewSong">
							<div class="popup_box">
								<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_music_song"];?>
<?php echo $_smarty_tpl->getVariable('db_song')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_song')->value[0]['vCoverImage'];?>
" /></div>
							</div>
						</div>
					</div>
				</div>
				<?php }?>
			</div>-->
			<div style="clear:both;"></div>
			
			<div class="inputboxes">
				<label for="textfield"><strong>Status:</strong></label>
				<select id="eStatus" name="Data[eStatus]">
					<option value="Active" <?php if ($_smarty_tpl->getVariable('db_song')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
					<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_song')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
				</select>
			</div>
			
			<div class="add_photo_cancel">
				<?php if ($_smarty_tpl->getVariable('modeSong')->value=='add'){?>
				<input type="submit" value="Add Song" class="btn" onclick="return validate(document.frmsongadd);" title="Add Song"/>
				<?php }else{ ?>
				<input type="submit" value="Edit Song" class="btn" on click="return validate(document.frmsongadd);" title="Edit Song"/>
				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</div>
			</td>
			</tr>
			</table>
		</form>
	</div>
	<!--- Add/Edit Song ends here --->
	<form name="frmsearchsong" id="frmsearchsong" action="#tab-song" method="post">
	<table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label>
				<td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword5" name="keyword5" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
" class="inputbox" /></div>
				<td>
				<td width="10%" ><div class="bulkactions"><select name="option5" id="option5">
						<option value="vSongTitle">Song Title</option>
						<option value="eStatus">Status</option>
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoptionsong();"/></div></td>
				</td>
			</tr>
		</tbody>
	</table>
	</form>
	
	<!--  Song listing starts here -->
	<div class="contentbox contentbox_admin_bot" id="tabs-1">
		<form name="frmsonglist" id="frmsonglist"  action="index.php?file=so-song_a" method="post">
			<table width="100%" border="0" class="admin_photo_table">
				<input type="hidden" name="action" id="action" value="" />
				<input type="hidden" name="iMemberId" id="iMemberId" value="" />
				<input  type="hidden" name="iSongId" value=""/>
				<thead class="admin_table_title">
					<tr>
						<!--<th>Cover Photo</th>-->
						<th>Song Title</th>
						<th>Song Album</th>
						<th>Status</th>
						<th>Action</th>
						<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmsonglist);"/></th>
					</tr>
				</thead>
				<tbody>
				
				<?php if (count($_smarty_tpl->getVariable('db_viewsong')->value)>0){?>
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_viewsong')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				
				<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']%2){?>
				<?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable("alt", null, null);?>
				<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, null);?>
				<?php }?>
				<tr class="<?php echo $_smarty_tpl->getVariable('class')->value;?>
">
					<!--<td><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_upload_music_song'];?>
/<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
/1_<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCoverImage'];?>
"></td>-->
					<td><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iSongId=<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongId'];?>
#tab-song" title=""><?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vSongTitle'];?>
</a></td>
					<?php if ($_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['SongAlbum']!=''){?>
					<td><?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['SongAlbum'];?>
</td>
					<?php }else{ ?>
					<td>.......</td>
					<?php }?>
					<td><?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
					<td>
						<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iSongId=<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongId'];?>
#tab-song" title=""><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_edit.png" title="Edit" /></a>
						<a href="javascript:void(0);" title="Active" onclick="MakeActionSong('<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Active');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_approve.png" title="Active" /></a>
						<a href="javascript:void(0);" title="Inactive" onclick="MakeActionSong('<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Inactive');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_unapprove.png" title="Inactive" /></a>
						<a href="javascript:void(0);" title="Delete" onclick="MakeActionSong('<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Delete');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_delete.png" title="Delete" /></a>
					</td>
					<td>
						<input name="iSongId[]" type="checkbox" id="iId" value="<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSongId'];?>
"/>
						<input name="iMemberId" type="hidden" id="mId" value="<?php echo $_smarty_tpl->getVariable('db_viewsong')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
"/>
					</td>
				</tr>
				<?php endfor; endif; ?>
				<?php }else{ ?>
				<tr>
					<td height="70px;" colspan="8" style="text-align:center; color:#C44C22; font-size:14px; font-weight:bold;">No Record Found.</td>
				</tr>
				<?php }?>
				</tbody>
				
			</table>
		</form>
		<div class="extrabottom"><table cellpadding="0" cellspacing="0" width="100%"><tr><td>
			<div class="pagination"> <?php if (count($_smarty_tpl->getVariable('db_viewsong')->value)>0){?> <span class="switch" style="float: left;"><?php echo $_smarty_tpl->getVariable('recmsg12')->value;?>
</span> <?php }?> </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newactionSong">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionSong').value,'m-member',document.frmsonglist);"/>
			</div></td></tr></table>
		</div>
	</div>
	<!--  photo listing ends here -->
	
</div>

<script>

function Searchoptionsongcat(){
	
    document.getElementById('frmsearchsongcat').submit();
}
function Searchoptionsong(){
	
    document.getElementById('frmsearchsong').submit();
}
function AlphaSearch(val){
	var type = $('#type').val();
    var alphavalue = val;
    
    var file = 'so-song';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}
function MakeActionCat(loopid,member,type){

    document.frmsongcatlist.iSongAlbumId.value = loopid;
    document.frmsongcatlist.iMemberId.value = member;
    document.frmsongcatlist.action.value = type;
	document.frmsongcatlist.submit();	
}
function MakeActionSong(loopid,member,type){
    document.frmsonglist.iSongId.value = loopid;
    document.frmsonglist.iMemberId.value = member;
    document.frmsonglist.action.value = type;    
	document.frmsonglist.submit();	
}

function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'so-song';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=m-member&mode=view";
    return false;
}

$(document).ready(function(){
	$('#test').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});

function CheckValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  )
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}
function CheckAudioValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'mp3' || a == 'MP3')
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Audio (mp3)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}
function SongDelete(){
	var r=confirm("Are you sure to delete this Image ");
	if (r==true)
	{
	      if($('#actionSong')){
		      $('#actionSong').val("DeleteSong");
	      }
	      
	      if($('#frmsongadd')){
		      $('#frmsongadd').submit();
	      }
	}
      else
	{
	      return false;
	} 
}
function AlbImageDelete(){
	var r=confirm("Are you sure to delete this image ");
	if (r==true)
	{
	      if($('#actionAlbsong')){
		      $('#actionAlbsong').val("DeleteImage");
	      }
	      
	      if($('#frmaddsongcat')){
		      $('#frmaddsongcat').submit();
	      }
	}
      else
	{
	      return false;
	} 
}
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>

