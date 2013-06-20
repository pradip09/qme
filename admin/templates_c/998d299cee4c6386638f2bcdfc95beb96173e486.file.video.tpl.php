<?php /* Smarty version Smarty-3.0.7, created on 2012-07-14 17:54:06
         compiled from "/var/www/qme_theme/admin/templates/video/video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147856277500164e6ed1b70-21982853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '998d299cee4c6386638f2bcdfc95beb96173e486' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/video/video.tpl',
      1 => 1342242045,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147856277500164e6ed1b70-21982853',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_admin_creditor_url"];?>
/ckeditor.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>

<div class="contentcontainer" id="tabs">
	<div class="headings">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Video</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Video</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=v-video_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iVideoId" id="iVideoId" value="<?php echo $_smarty_tpl->getVariable('iVideoId')->value;?>
" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['vImage'];?>
" />
				<input type="hidden" name="vOldVideo" id="vOldVideo" value="<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['vVideo'];?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
				<p>
					<label for="textfield"><strong>Video Name:</strong></label>
					<input type="text" id="vVideoName" name="Data[vVideoName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['vVideoName'];?>
" lang="*" title="Video Name"/>
				</p>
				<p>
					<label for="textfield"><strong>Video Credits:</strong></label>
					<input type="text" id="vVideoCredits" name="Data[vVideoCredits]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['vVideoCredits'];?>
" title="Video Credits"/>
				</p>
				<p>
					<label for="textfield"><strong>Existing Album:</strong></label>
					<select id="iVideoAlbumId" name="Data[iVideoAlbumId]" lang="*" title="Existing Album" onchange="showdropdownvalue(this.value);">
						<option value=''>--Select Video Album--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_videoalbum')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value='<?php echo $_smarty_tpl->getVariable('db_videoalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iVideoAlbumId'];?>
' <?php if ($_smarty_tpl->getVariable('db_videoalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iVideoAlbumId']==$_smarty_tpl->getVariable('db_video')->value[0]['iVideoAlbumId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_videoalbum')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vVideoAlbum'];?>
</option>
						<?php endfor; endif; ?>
						<option value="0">New Video Album</option>
					</select>
					<!--<input type="text" id="vNewCategory" name="vNewCategory" class="inputbox" title="New Category" style="display:none;"/>-->

				</p>
				
				<p id="newcat" style="display:none;">
					<label for="textfield"><strong>New Video Album:</strong></label>
					<div id="newtext"></div>
				</p>
				<p>
					<label for="textfield"><strong>Member:</strong></label>
					<select id="iMemberId" name="Data[iMemberId]" lang="*" title="Member">
						<option value=''>--Select Member--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_videoMember')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value='<?php echo $_smarty_tpl->getVariable('db_videoMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
' <?php if ($_smarty_tpl->getVariable('db_videoMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId']==$_smarty_tpl->getVariable('db_video')->value[0]['iMemberId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_videoMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
</option>
						<?php endfor; endif; ?>
					</select>
				</p>
				<p>
					<label for="textfield"><strong>Video Genre:</strong></label>
					<?php if (count($_smarty_tpl->getVariable('video_genre')->value)>0){?>
					<select id="eVideoGenre" name="Data[eVideoGenre]">
					<option value="">Action</option>	
					<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('video_genre')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value="<?php echo $_smarty_tpl->getVariable('video_genre')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"<?php ob_start();?><?php echo $_smarty_tpl->getVariable('video_genre')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->getVariable('db_video')->value[0]['eVideoGenre']==$_tmp1){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('video_genre')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
					<?php endfor; endif; ?>
					<?php }?>
					</select>
				</p>
				<p>
					<label for="textfield"><strong>Video Caption:</strong></label>
					<textarea id="vVideoCaption" name="Data[vVideoCaption]" class="inputbox" title="Text" style="width:900px; height:200px"><?php echo $_smarty_tpl->getVariable('db_video')->value[0]['vVideoCaption'];?>
</textarea>
				</p>
				<p>
					<label for="textfield"><strong>Artist License:</strong></label>
					<input type="text" id="vArtistLicense" name="Data[vArtistLicense]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['vArtistLicense'];?>
" lang="*" title="Artist License"/>
				</p>
				
				<p>
					<label for="textfield"><strong>Explicit Content?</strong></label>
					<input type="checkbox" id="eExplicitContent" name="eExplicitContent" value="1" <?php if ($_smarty_tpl->getVariable('db_video')->value[0]['eExplicitContent']=='Yes'){?>checked<?php }?>>
				</p>
				<p>
					<label for="textfield"><strong>Hide Video:</strong></label>
					<input type="checkbox" id="eHideVideo" name="eHideVideo" value="1" <?php if ($_smarty_tpl->getVariable('db_video')->value[0]['eHideVideo']=='Yes'){?>checked<?php }?>>
				</p>
				
				<?php if ($_smarty_tpl->getVariable('db_video')->value[0]['vVideo']!=''){?>
				<p>
					<label for="textfield"><strong>Current Video File:</strong></label>
					<a class="video"  title="The Falltape" href="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_video"];?>
<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['vVideo'];?>
?fs=1&amp;autoplay=1"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
play.png"/></a>
					
					
				</p>
				<?php }?>
				
				<p>
					<label for="textfield"><strong>Upload Video File:</strong></label>
					<input type="file" id="vVideo" name="vVideo" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['vVideo'];?>
"  title="Video File" onchange="CheckValidVideoFile(this.value,this.name)"/>
					
				</p>
				<p>
					<label for="textfield"><strong>Video Viewer Access:</strong></label>
					<?php if (count($_smarty_tpl->getVariable('VideoViewerAccess')->value)>0){?>
					<select id="eVideoViewerAccess" name="Data[eVideoViewerAccess]">
					<option value="">Streaming Only</option>	
					<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('VideoViewerAccess')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value="<?php echo $_smarty_tpl->getVariable('VideoViewerAccess')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"<?php ob_start();?><?php echo $_smarty_tpl->getVariable('VideoViewerAccess')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_smarty_tpl->getVariable('db_video')->value[0]['eVideoViewerAccess']==$_tmp3){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('VideoViewerAccess')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
					<?php endfor; endif; ?>
					<?php }?>
					</select>
				</p>
				<?php if ($_smarty_tpl->getVariable('db_video')->value[0]['vVideo']!=''){?>
				<p>
					<label for="textfield"><strong>Delete Video?:</strong>
					<input type="checkbox" id="eDeleteVideo" name="eDeleteVideo" onclick="VideoDelete();" value="Yes" <?php if ($_smarty_tpl->getVariable('db_video')->value[0]['eDeleteVideo']=='Yes'){?>checked<?php }?>/></label>
				</p>
				<?php }?>			
				<div style="display:block;">
				<div style="width:303px;">
				<label for="textfield"><strong>Upload Video Image:</strong></label>
				<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['vImage'];?>
"  title="Video Image" onchange="CheckValidFile(this.value,this.name)"/>
				</div>
				<?php if ($_smarty_tpl->getVariable('db_video')->value[0]['vImage']!=''){?>
				<div style="float:left; width:450px;">
						<!--<div style="float:left; margin:26px 5px 0px 26px;"><a href="#videoimg" id="video_img"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp4=ob_get_clean();?><?php echo $_tmp4;?>
view.png"/></a></div>
						<p style="margin:26px 0 10px 0;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp5=ob_get_clean();?><?php echo $_tmp5;?>
delete.png" onclick="ImageDelete();"/></p>-->
						
						<div style="display:none;">
						<div id="videoimg">
							<div class="popup_box">
								<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_video"];?>
<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['vImage'];?>
"/></div>
								
							</div>
						</div>
						</div>
					
				</div>
				<label for="textfield"><strong>Current Video Image:</strong></label>
				
				<a href="#videoimg" id="currentvideo_img"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_video"];?>
<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['vImage'];?>
" height="100" width="100"/><a/>
				<?php }?>
				</div>
				<?php if ($_smarty_tpl->getVariable('db_video')->value[0]['vImage']!=''){?>
				<p>
					<label for="textfield"><strong>Delete Video Image?:</strong>
					<input type="checkbox" id="eDeleteVideoImage" name="eDeleteVideoImage" onclick="ImageDelete();"value="Yes" <?php if ($_smarty_tpl->getVariable('db_video')->value[0]['eDeleteVideoImage']=='Yes'){?>checked<?php }?>/></label>
				</p>
				<?php }?>			
				<p>
					<label for="textfield"><strong>Price(USD):</strong></label>
					<input type="text" id="vPrice" name="Data[vPrice]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_video')->value[0]['vPrice'];?>
" title="Price(USD)" style="width:100px" onkeypress="return checkprice(event);" />
				</p>
				<p>
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_video')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_video')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</p>
				
               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Video" class="btn" onclick="return validate(document.frmadd);" title="Add Video"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Video" class="btn" onclick="return validate(document.frmadd);" title="Edit Video"/>
   				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

		</form>
	</div>
</div>

<script>
function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'v-video';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=v-video&mode=view";
    return false;
}
</script>
<script>

showdropdownvalue($('#iVideoAlbumId').val());
function showdropdownvalue(val){
	if(val != '0'){
		$('#newcat').hide();
		$('#newtext').html('');
	}else{		
		var html ='';
		html ='<input type="text" id="vNewPageCode" name="vNewPageCode" class="inputbox" title="New PageCode" lang="*"/>';
		$('#newtext').html(html);
		$('#newcat').show();
	}
}


//$('#iBlogCategoryId').change(function() {
//    $('#vNewCategory').css('display', ($(this).val() == '0') ? 'block' : 'none');
//    $('#vNewCategory').attr('lang', ($(this).val() == '0') ? '*' : '');
//});

$(document).ready(function(){
	$('#video_img').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});
$(document).ready(function(){
	$('#currentvideo_img').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});

jQuery(document).ready(function() {
	 
    $(".video").click(function() {
	        $.fancybox({
	            'padding'       : 0,
	            'autoScale'     : false,
	            'transitionIn'  : 'none',
	            'transitionOut' : 'none',
	            'title'         : this.title,
	            'width'         : 640,
	            'height'        : 385,
	            'href'          : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
	           'type'  : 'iframe',
	            'iframe'           : {
	            'wmode'             : 'transparent',
	            'allowfullscreen'   : 'true'
	            }
	        });
	 
	        return false;
	    });
	});

function VideoDelete(){
	var r=confirm("Are you sure to delete this Video File");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteVideo");
		}
		
		if($('#frmadd')){
			$('#frmadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
	}   
function ImageDelete(){
	var r=confirm("Are you sure to delete this image");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteImage");
		}
		
		if($('#frmadd')){
			$('#frmadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
	}
function CheckValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  )
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}

function CheckValidVideoFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'flv' || a == 'avi' || a == 'mp4')
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Video (flv,mp4,avi)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}
</script>
<script type="text/javascript">
	CKEDITOR.replace( 'vVideoCaption' );
</script>



