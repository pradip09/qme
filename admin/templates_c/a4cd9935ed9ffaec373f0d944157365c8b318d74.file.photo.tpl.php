<?php /* Smarty version Smarty-3.0.7, created on 2012-07-13 10:58:27
         compiled from "/var/www/qme_theme/admin/templates/photo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17847946824fffb1fb1aadf7-82236959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4cd9935ed9ffaec373f0d944157365c8b318d74' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/photo.tpl',
      1 => 1342157275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17847946824fffb1fb1aadf7-82236959',
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
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Photo</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Photo</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=ph-photo_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iPhotoId" id="iPhotoId" value="<?php echo $_smarty_tpl->getVariable('iPhotoId')->value;?>
" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['vImage'];?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
				<div class="inputboxes">
					<label for="textfield"><strong>Photo Title:</strong></label>
					<input type="text" id="vPhotoTitle" name="Data[vPhotoTitle]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['vPhotoTitle'];?>
" lang="*" title="Photo Title"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Photo Credits:</strong></label>
					<input type="text" id="vPhotoCredit" name="Data[vPhotoCredit]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['vPhotoCredit'];?>
" title="Photo Credits"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Existing Category:</strong></label>
					<select id="iPhotoCategoryId" name="Data[iPhotoCategoryId]" lang="*" title="Photo Category" onchange="showdropdownvalue(this.value);">
						<option value=''>--Select Photo Category--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_photocat')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value='<?php echo $_smarty_tpl->getVariable('db_photocat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoCategoryId'];?>
' <?php if ($_smarty_tpl->getVariable('db_photocat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoCategoryId']==$_smarty_tpl->getVariable('db_photo')->value[0]['iPhotoCategoryId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_photocat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPhotoCategory'];?>
</option>
						<?php endfor; endif; ?>
						<option value="0">New Photo Category</option>
					</select>
					<!--<input type="text" id="vNewCategory" name="vNewCategory" class="inputbox" title="New Category" style="display:none;"/>-->

				</div>
				<div class="inputboxes" id="newcat" style="display:none;">
					<label for="textfield"><strong>New Photo Category:</strong></label>
					<div id="newtext"></div>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Member:</strong></label>
					<select id="iMemberId" name="Data[iMemberId]" lang="*" title="Member">
						<option value=''>--Select Member--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_photoMember')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value='<?php echo $_smarty_tpl->getVariable('db_photoMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
' <?php if ($_smarty_tpl->getVariable('db_photoMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId']==$_smarty_tpl->getVariable('db_photo')->value[0]['iMemberId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_photoMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
</option>
						<?php endfor; endif; ?>
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Photo Caption:</strong></label>
				</div>
				<p>
					<textarea id="tPhotoCaption" name="Data[tPhotoCaption]" class="inputbox" title="Text" style="width:900px; height:200px"><?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['tPhotoCaption'];?>
</textarea>
				</p>
								
				<div class="inputboxes">
					<label for="textfield"><strong>Explicit Content?</strong></label>
					<input type="checkbox" id="eExplicitContent" name="eExplicitContent" value="1" <?php if ($_smarty_tpl->getVariable('db_photo')->value[0]['eExplicitContent']=='Yes'){?>checked<?php }?>>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Hide Photo:</strong></label>
					<input type="checkbox" id="eHidePhoto" name="eHidePhoto" value="1" <?php if ($_smarty_tpl->getVariable('db_photo')->value[0]['eHidePhoto']=='Yes'){?>checked<?php }?>>
				</div>
				
				<div style="display:block;width:1000px;">
				<div style="width:303px;float:left;" class="inputboxes">
				<label for="textfield"><strong>Upload New Image:</strong></label>
				<?php if ($_smarty_tpl->getVariable('db_photo')->value[0]['vImage']==''){?>
				<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['vImage'];?>
"  title="vImage" lang="*" onchange="CheckValidFile(this.value,this.name)"/>
				<?php }else{ ?>
				<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['vImage'];?>
"  title="vImage" onchange="CheckValidFile(this.value,this.name)"/>
				<?php }?>
				</div>
				<?php if ($_smarty_tpl->getVariable('db_photo')->value[0]['vImage']!=''){?>
				
				<div style="float:left; width:450px;">
						<div style="float:left; margin:26px 5px 0px 26px;"><a href="#view1" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a></div>
						<p style="margin:26px 0 10px 0;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="ImageDelete();"/></p>
						
						<div style="display:none;">
						<div id="view1">
							<div class="popup_box">
								<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_photo"];?>
<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['vImage'];?>
" /></div>
							</div>
						</div>
						</div>
					
				</div>
				<?php }?>
				</div>
				<div style="clear:both;"></div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Price(USD):</strong></label>
					<input type="text" id="iPrice" name="Data[iPrice]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['iPrice'];?>
" title="Price(USD)" style="width:100px" onkeypress="return checkprice(event);" />
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_photo')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_photo')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				
               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Photo" class="btn" onclick="return validate(document.frmadd);" title="Add Photo"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Photo" class="btn" onclick="return validate(document.frmadd);" title="Edit Photo"/>
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
    var file = 'ph-photo';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=ph-photo&mode=view";
    return false;
}
</script>
<script>

showdropdownvalue($('#iPhotoCategoryId').val());
function showdropdownvalue(val){
	if(val != '0'){
		$('#newcat').hide();
		$('#newtext').html('');
	}else{		
		var html ='';
		html ='<input type="text" id="vNewCategory" name="vNewCategory" class="inputbox" title="New Category" lang="*"/>';
		$('#newtext').html(html);
		$('#newcat').show();
	}
}


//$('#iBlogCategoryId').change(function() {
//    $('#vNewCategory').css('display', ($(this).val() == '0') ? 'block' : 'none');
//    $('#vNewCategory').attr('lang', ($(this).val() == '0') ? '*' : '');
//});

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
	CKEDITOR.replace( 'tPhotoCaption' );
</script>



