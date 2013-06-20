<?php /* Smarty version Smarty-3.0.7, created on 2012-06-28 14:29:33
         compiled from "/var/www/quotation/admin/templates/faqs/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1792286584fec1cf59dde42-35256094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09e87f624cc8dbe7246699d61cd6bdbdf4ba9393' => 
    array (
      0 => '/var/www/quotation/admin/templates/faqs/category.tpl',
      1 => 1340873972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1792286584fec1cf59dde42-35256094',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>
<div class="contentcontainer">
<div class="headings">
	<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
	<h2 class="left">Add Category</h2>
	<?php }else{ ?>
	<h2 class="left">Edit Category</h2>
	<?php }?>
</div>
<div class="contentbox" id="tabs-1">
		<form id="frmadd" name="frmadd" action="index.php?file=fa-category_a" method="post" enctype="multipart/form-data">
        <input type="hidden" name="iCategoryId" id="iCategoryId" value="<?php echo $_smarty_tpl->getVariable('iCategoryId')->value;?>
" />
	<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_cat')->value[0]['vImage'];?>
" />
        <input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>	
			<p>
				<label for="textfield"><strong>Select Parent Category:</strong></label>
				<select id="iParentId" name="Data[iParentId]" >
					<option value=''>--Select Parent Category--</option>
					<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('parentarray')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value='<?php echo $_smarty_tpl->getVariable('parentarray')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCategoryId'];?>
' <?php if ($_smarty_tpl->getVariable('db_cat')->value[0]['iCategoryId']==$_smarty_tpl->getVariable('parentarray')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCategoryId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('parentarray')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCategory'];?>
</option>
					<?php endfor; endif; ?>
				</select>
			</p>
			<?php }elseif($_smarty_tpl->getVariable('mode')->value=='edit'&&$_smarty_tpl->getVariable('db_cat')->value[0]['iParentId']==0){?>
			<p>
				<label for="textfield"><strong style="color:red;">Parent Category :</strong></label>
				<?php echo $_smarty_tpl->getVariable('db_cat')->value[0]['vCategory'];?>

			</p>
			<?php }else{ ?>
			<p>
				<label for="textfield"><strong>Select Parent Category:</strong></label>
				<select id="iParentId" name="Data[iParentId]" >
					<option value=''>--Select Parent Category--</option>
					<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('parentarray')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value='<?php echo $_smarty_tpl->getVariable('parentarray')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCategoryId'];?>
' <?php if ($_smarty_tpl->getVariable('db_cat')->value[0]['iCategoryId']==$_smarty_tpl->getVariable('parentarray')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCategoryId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('parentarray')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCategory'];?>
</option>
					<?php endfor; endif; ?>
				</select>
			</p>
			<?php }?>
			<p>
				<label for="textfield"><strong>Title :</strong></label>
				<input type="text" id="vCategory" name="Data[vCategory]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_cat')->value[0]['vCategory'];?>
" lang="*" title="Title"/>
			</p>
			<div style="width:1000px; display:block;">
				<div style="float:left; width:303px;">
				<label for="textfield"><strong>Image :</strong></label>
				<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_cat')->value[0]['vImage'];?>
"  title="vImage" onchange="CheckValidFile(this.value,this.name)"/>
				</div>
				<?php if ($_smarty_tpl->getVariable('db_cat')->value[0]['vImage']!=''){?>
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
								<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_category"];?>
<?php echo $_smarty_tpl->getVariable('db_cat')->value[0]['vImage'];?>
" /></div>
							</div>
						</div>
						</div>
					
				</div>
				
				
				<?php }?>
				</div>
				
				<div style="clear:both;"></div>
			
			<p>
				<label for="textfield"><strong>Description:</strong></label>
				<textarea id="tDescription" name="Data[tDescription]" class="inputbox" lang="*" title="Description" ><?php echo $_smarty_tpl->getVariable('db_cat')->value[0]['tDescription'];?>
</textarea>
			</p>
			<p>
				<label for="textfield"><strong>Status :</strong></label>
					<select id="eStatus" name="Data[eStatus]">
					<option value="Active" <?php if ($_smarty_tpl->getVariable('db_cat')->value[0]['eStatus']=='Active'){?>selected<?php }?> >Active</option>
					<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_cat')->value[0]['eStatus']=='Inactive'){?>selected<?php }?> >Inactive</option>
				</select>
			</p>
			<p>
					<label for="textfield"><strong>Order No :</strong></label>
					<select id="iOrderNo" name="Data[iOrderNo]">
						<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
							<?php while (($_smarty_tpl->getVariable('totalRec')->value+1)>=$_smarty_tpl->getVariable('initOrder')->value){?>
								<option value="<?php echo $_smarty_tpl->getVariable('initOrder')->value;?>
" <?php if ($_smarty_tpl->getVariable('db_cat')->value[0]['iOrderNo']==$_smarty_tpl->getVariable('initOrder')->value){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('initOrder')->value++;?>
</option>
							<?php }?>
						<?php }else{ ?>
							<?php while (($_smarty_tpl->getVariable('totalRec')->value)>=$_smarty_tpl->getVariable('initOrder')->value){?>
								<option value="<?php echo $_smarty_tpl->getVariable('initOrder')->value;?>
" <?php if ($_smarty_tpl->getVariable('db_cat')->value[0]['iOrderNo']==$_smarty_tpl->getVariable('initOrder')->value){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('initOrder')->value++;?>
</option>
							<?php }?>
						<?php }?>
					</select>
			</p>
			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
			<input type="submit" value="Add Category" class="btn" title="Add Category" onclick="return validate(document.frmadd);"/>
			<?php }else{ ?>
			<input type="submit" value="Edit Category" class="btn" title="Edit Category" onclick="return validate(document.frmadd);"/>
			<?php }?>
			<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</form>
</div>
</div>

<script>
function redirectcancel(){

    window.location="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=fa-category&mode=view";
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


