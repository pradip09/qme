<?php /* Smarty version Smarty-3.0.7, created on 2012-07-12 18:38:21
         compiled from "/var/www/qme_theme/admin/templates/channel/channel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3056699844ffecc459c3dd2-49340040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '754e3948442d365cb39088e3f415a40e3fd8bf9b' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/channel/channel.tpl',
      1 => 1342096080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3056699844ffecc459c3dd2-49340040',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_admin_creditor_url"];?>
/ckeditor.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>
<div id="content">
<div class="container">
<div class="conthead">
	<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
	<h2 class="left">Add Channel</h2>
	<?php }else{ ?>
	<h2 class="left">Edit Channel</h2>
	<?php }?>
</div>
<div class="contentbox" id="tabs-1">
		<form id="frmadd" name="frmadd" action="index.php?file=ch-channel_a" enctype="multipart/form-data" method="post">
		<input type="hidden" name="iChannelId" id="iChannelId" value="<?php echo $_smarty_tpl->getVariable('iChannelId')->value;?>
" />
		<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_channel')->value[0]['vImage'];?>
" />
		<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
			<p>
					<label for="textfield"><strong>Member:</strong></label>
					<select id="iMemberId" name="Data[iMemberId]" lang="*" title="Member">
						<option value=''>--Select Member--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_ChannelMember')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value='<?php echo $_smarty_tpl->getVariable('db_ChannelMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
' <?php if ($_smarty_tpl->getVariable('db_ChannelMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId']==$_smarty_tpl->getVariable('db_channel')->value[0]['iMemberId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_ChannelMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
</option>
						<?php endfor; endif; ?>
					</select>
			</p>
			
			<!--<p>
				<label for="textfield"><strong>Channel File Type:</strong></label>
				<label for="textfield"><?php echo $_smarty_tpl->getVariable('db_channel')->value[0]['tChannelFileType'];?>
</label>
			</p>-->
			<p>
				<label for="textfield"><strong>Channel Name:</strong></label>
				<input type="text" id="vChannelName" name="Data[vChannelName]" class="inputbox" lang="*" title="Channel Name" value="<?php echo $_smarty_tpl->getVariable('db_channel')->value[0]['vChannelName'];?>
"/>
			</p>
			<p>
				<label for="textfield"><strong>Channel Description:</strong></label>
				<textarea id="tChannelDescription" name="Data[tChannelDescription]" class="inputbox" title="Channel Description"><?php echo $_smarty_tpl->getVariable('db_channel')->value[0]['tChannelDescription'];?>
</textarea>
			</p>
			<p>
				<label for="textfield"><strong>Randomize Videos:</strong></label>
				<input type="radio" name="Data[eRandomizeVideos]" id="eRandomizeVideos" value="Yes"<?php if ($_smarty_tpl->getVariable('db_channel')->value[0]['eRandomizeVideos']=='Yes'){?>checked<?php }?>>Yes
				<input type="radio" name="Data[eRandomizeVideos]" id="eRandomizeVideos" value="No"<?php if ($_smarty_tpl->getVariable('db_channel')->value[0]['eRandomizeVideos']=='No'){?>checked<?php }?>>No	
			</p>
			<p>
				<label for="textfield"><strong>Repeat Videos:</strong></label>
				<input type="radio" name="Data[eRepeatVideos]" id="eRepeatVideos" value="Yes"<?php if ($_smarty_tpl->getVariable('db_channel')->value[0]['eRepeatVideos']=='Yes'){?>checked<?php }?>>Yes
				<input type="radio" name="Data[eRepeatVideos]" id="eRepeatVideos" value="No"<?php if ($_smarty_tpl->getVariable('db_channel')->value[0]['eRepeatVideos']=='No'){?>checked<?php }?>>No	
			</p>	
			
			<p>
					<label for="textfield"><strong>Channel Mode:</strong></label>
					<?php if (count($_smarty_tpl->getVariable('ChannelMode')->value)>0){?>
					<select id="eChannelMode" name="Data[eChannelMode]" lang="*">
					<option value='0'>Choose Mode</option>	
					<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('ChannelMode')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value="<?php echo $_smarty_tpl->getVariable('ChannelMode')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"<?php ob_start();?><?php echo $_smarty_tpl->getVariable('ChannelMode')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->getVariable('db_channel')->value[0]['eChannelMode']==$_tmp1){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('ChannelMode')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
					<?php endfor; endif; ?>
					<?php }?>
					</select>
					
			</p>
			<div style="display:block;">
				<div style="width:303px;">
				<label for="textfield"><strong>Upload Channel Image:</strong></label>
				<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_channel')->value[0]['vImage'];?>
"  title="Channel Image" onchange="CheckValidFile(this.value,this.name)"/>
				</div>
				<?php if ($_smarty_tpl->getVariable('db_channel')->value[0]['vImage']!=''){?>
				<div style="float:left; width:450px;">
				<div style="display:none;">
				<div id="channelimg">
					<div class="popup_box">
						<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_channel"];?>
<?php echo $_smarty_tpl->getVariable('db_channel')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_channel')->value[0]['vImage'];?>
"/></div>
						
					</div>
				</div>
				</div>
					
				</div>
				<label for="textfield"><strong>Current Channel Image:</strong></label>
				
				<a href="#channelimg" id="currentchannel_img"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_channel"];?>
<?php echo $_smarty_tpl->getVariable('db_channel')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_channel')->value[0]['vImage'];?>
" height="150" width="150"/><a/>
				<?php }?>
			</div>
				<?php if ($_smarty_tpl->getVariable('db_channel')->value[0]['vImage']!=''){?>
				<p>
					<label for="textfield"><strong>Delete Channel Image?:</strong>
					<input type="checkbox" id="eDeleteImage" name="eDeleteImage" onclick="ImageDelete();"value="Yes" <?php if ($_smarty_tpl->getVariable('db_channel')->value[0]['eDeleteImage']=='Yes'){?>checked<?php }?>/></label>
				</p>
				<?php }?>			
			<p>
				<label for="textfield"><strong>Status :</strong></label>
					<select id="eStatus" name="Data[eStatus]">
					<option value="Active" <?php if ($_smarty_tpl->getVariable('db_channel')->value[0]['eStatus']=='Active'){?>selected<?php }?> >Active</option>
					<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_channel')->value[0]['eStatus']=='Inactive'){?>selected<?php }?> >Inactive</option>
				</select>
			</p>
			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
			<input type="submit" value="Add Channel" class="btn" title="Add Opportunity" onclick="return validate(document.frmadd);"/>
			<?php }else{ ?>
			<input type="submit" value="Edit Channel" class="btn" title="Edit Opportunity" onclick="return validate(document.frmadd);"/>
			<?php }?>
			<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</form>
</div>
</div>
</div>


<script>
$(document).ready(function(){
	$('#currentchannel_img').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});

	
function redirectcancel(){

    window.location="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=ch-channel&mode=view";
    return false;
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


</script>
<script type="text/javascript">
	CKEDITOR.replace( 'tChannelDescription' );


</script>

