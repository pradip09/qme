<?php /* Smarty version Smarty-3.0.7, created on 2012-06-28 14:44:11
         compiled from "/var/www/quotation/admin/templates/product/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20497402024fec2063c5c867-48838119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80c418849c3521818ee4f4ff7f7cf16712e69473' => 
    array (
      0 => '/var/www/quotation/admin/templates/product/product.tpl',
      1 => 1340874850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20497402024fec2063c5c867-48838119',
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
	<h2 class="left">Add Product</h2>
	<?php }else{ ?>
	<h2 class="left">Edit Product</h2>
	<?php }?>
</div>
<div class="contentbox" id="tabs-1">
	<form id="frmadd" name="frmadd" action="index.php?file=pr-product_a" enctype="multipart/form-data" method="post">
        <input type="hidden" name="iProductId" id="iProductId" value="<?php echo $_smarty_tpl->getVariable('iProductId')->value;?>
" />
	<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_product')->value[0]['vImage'];?>
" />
	<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td width="50%">
		<div style="float:left; border:#747474 solid 1px; padding:20px 20px 10px 20px;border-radius:10px; width:580px; position:relative;">
 <div style="position:absolute;top: -6px;line-height: 7px; font-size:18px;color: #333333; background: none repeat scroll 0 0 #f8f8f8; padding:0 3px;">Product Details</div>
		<p>
			<label for="textfield"><strong>Select Parent Category :</strong></label>
			
				<select id="iCategoryId" name="Data[iCategoryId ]" lang="*" title="Parent Category">
				<!--<option value=''>--Select Category--</option>
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('cat')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<option value="<?php echo $_smarty_tpl->getVariable('cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCategoryId'];?>
" <?php if ($_smarty_tpl->getVariable('db_product')->value[0]['iCategoryId']==$_smarty_tpl->getVariable('cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCategoryId']){?>selected<?php }?> ><?php echo $_smarty_tpl->getVariable('cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCategory'];?>
</option>
				<?php endfor; endif; ?>-->
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
' <?php if ($_smarty_tpl->getVariable('db_product')->value[0]['iCategoryId']==$_smarty_tpl->getVariable('parentarray')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCategoryId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('parentarray')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCategory'];?>
</option>
				<?php endfor; endif; ?>
			</select>
			
		</p>
		<p>
			<label for="textfield"><strong>Product Code:</strong></label>
			<input type="text" id="vProductCode " name="Data[vProductCode ]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_product')->value[0]['vProductCode'];?>
" lang="*" title="ProductCode"/>
		</p>
		<p>
				<label for="textfield"><strong>Product Name:</strong></label>
				<input type="text" id="vTitle" name="Data[vTitle]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_product')->value[0]['vTitle'];?>
" lang="*" title="Product Name"/>
			</p>
		<p>
				<label for="textfield"><strong>Description:</strong></label>
				<textarea type="text" id="tDescription" name="Data[tDescription]" class="inputbox" lang="*"  title="Description" rows="8" cols="8"><?php echo $_smarty_tpl->getVariable('db_product')->value[0]['tDescription'];?>
</textarea>
		</p>
		<p>
				<label for="textfield"><strong>price:</strong></label>
				<input type="text" id="fPrice" name="Data[fPrice]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_product')->value[0]['fPrice'];?>
" lang="*{N}" title="Price" onkeypress="return checkprice(event);" maxlength="15"/>
			</p>
			<div style="width:1000px; display:block;">
				<div style="float:left; width:303px;">
				<label for="textfield"><strong>Image :</strong></label>
				<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_product')->value[0]['vImage'];?>
"  title="vImage" onchange="CheckValidFile(this.value,this.name)"/>
				</div>
				<?php if ($_smarty_tpl->getVariable('db_product')->value[0]['vImage']!=''){?>
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
								<div><img src="<?php echo $_smarty_tpl->getVariable('tsite_upload_images_product')->value;?>
/<?php echo $_smarty_tpl->getVariable('db_product')->value[0]['iProductId'];?>
/<?php echo $_smarty_tpl->getVariable('db_product')->value[0]['vImage'];?>
" /></div>
							</div>
						</div>
						</div>
					
				</div>
				
				
				<?php }?>
				</div>
				
				<div style="clear:both;"></div>
</div>
		</td>
		<td width="50%" valign="top">
			<div style="border:#747474 solid 1px; padding:20px 20px 10px 20px; border-radius:10px;width:580px; position:relative;">
<div style="position:absolute;top: -6px;line-height: 7px; font-size:18px;color: #333333; background: none repeat scroll 0 0 #f8f8f8;padding:0 3px;">Extra Details</div>
			<p>
				<label for="textfield"><strong>Promotation Data:</strong></label>
				<textarea type="text" id="ePromotionData" name="Data[ePromotionData]" class="inputbox" style="height:100px;width:275px;" lang="*"  title="PromotionData" rows="8" cols="8"><?php echo $_smarty_tpl->getVariable('db_product')->value[0]['ePromotionData'];?>
</textarea>
			</p>
			<p>
				<label for="textfield"><strong>Related Product :</strong></label>
			<?php if (count($_smarty_tpl->getVariable('db_pro')->value)>0){?>
			<select multiple name="vRelatedProduct[]" id="vRelatedProduct" style="height:200px; width:300px;">
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_pro')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<option value="<?php echo $_smarty_tpl->getVariable('db_pro')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iProductId'];?>
" <?php if (in_array($_smarty_tpl->getVariable('db_pro')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iProductId'],$_smarty_tpl->getVariable('relatedArr')->value)){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_pro')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</option>
				<?php endfor; endif; ?>
			<?php }else{ ?>
			No Product Found
			<?php }?>
			</select>
			</p>
			<p>
				<label for="textfield"><strong>Product Type :</strong></label>
					<select id="eProductType" name="Data[eProductType]">
						<option value="">--Select Product Type--</option>
						<option value="Promotion" <?php if ($_smarty_tpl->getVariable('db_product')->value[0]['eProductType']=='Promotion'){?>selected<?php }?> >Promotion</option>
						<option value="New" <?php if ($_smarty_tpl->getVariable('db_product')->value[0]['eProductType']=='New'){?>selected<?php }?> >New</option>
						<option value="Exclusive" <?php if ($_smarty_tpl->getVariable('db_product')->value[0]['eProductType']=='Exclusive'){?>selected<?php }?> >Exclusive</option>
					</select>
			</p>

			<!--<p>
				<label for="textfield"><strong>Promotion :</strong></label>
					<select id="ePromotion" style="width:103px;text-align:center;" name="Data[ePromotion]">
						<option value="No" <?php if ($_smarty_tpl->getVariable('db_product')->value[0]['ePromotion']=='No'){?>selected<?php }?> >No</option>
					<option value="Yes" <?php if ($_smarty_tpl->getVariable('db_product')->value[0]['ePromotion']=='Yes'){?>selected<?php }?> >Yes</option>
					
				</select>
			</p>
			<p>
				<label for="textfield"><strong>New :</strong></label>
					<select id="eNew" style="width:103px;text-align:center;" name="Data[eNew]">
						<option value="No" <?php if ($_smarty_tpl->getVariable('db_product')->value[0]['eNew']=='No'){?>selected<?php }?> >No</option>
					<option value="Yes" <?php if ($_smarty_tpl->getVariable('db_product')->value[0]['eNew']=='Yes'){?>selected<?php }?> >Yes</option>
					
				</select>
			</p>
			<p>
				<label for="textfield"><strong>Exclusive :</strong></label>
					<select id="eExclusive" style="width:103px; text-align:center;" name="Data[eExclusive]">
						<option value="No" <?php if ($_smarty_tpl->getVariable('db_product')->value[0]['eExclusive']=='No'){?>selected<?php }?> >No</option>
					<option value="Yes" <?php if ($_smarty_tpl->getVariable('db_product')->value[0]['eExclusive']=='Yes'){?>selected<?php }?> >Yes</option>
					
				</select>
			</p>-->
			<p>
				<label for="textfield"><strong>Status :</strong></label>
					<select id="eStatus" style="width:103px; text-align:center;" name="Data[eStatus]">
					<option value="Active" <?php if ($_smarty_tpl->getVariable('db_product')->value[0]['eStatus']=='Active'){?>selected<?php }?> >Active</option>
					<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_product')->value[0]['eStatus']=='Inactive'){?>selected<?php }?> >Inactive</option>
				</select>
			</p>
			</div>
		</td>
	</tr>
	<tr>
		<td width="50%" valign="top">
			<div style="float:left; border:#747474 solid 1px; padding:20px 20px 10px 20px;border-radius:10px; width:580px;position:relative;">
<div style="position:absolute;top: -6px;line-height: 7px; font-size:18px;color: #333333; background: none repeat scroll 0 0 #f8f8f8;padding:0 3px;">Other Details</div>
			<p>
				<label for="textfield"><strong>Tag:</strong></label>
				<textarea type="text" id="vTag" name="Data[vTag]" class="inputbox"  title="Tag" lang="*" rows="3" cols="8"><?php echo $_smarty_tpl->getVariable('db_product')->value[0]['vTag'];?>
</textarea>
			</p>
			<p>
				<label for="textfield"><strong>Meta Keyword:</strong></label>
				<textarea type="text" id="vMetaKeyword" name="Data[vMetaKeyword]" class="inputbox"  title="Meta Keyword" rows="3" cols="8"><?php echo $_smarty_tpl->getVariable('db_product')->value[0]['vMetaKeyword'];?>
</textarea>
			</p>
			<p>
				<label for="textfield"><strong>Meta Desc:</strong></label>
				<textarea type="text" id="vMetaDesc" name="Data[vMetaDesc]" class="inputbox"  title="Meta Desc" rows="3" cols="8"><?php echo $_smarty_tpl->getVariable('db_product')->value[0]['vMetaDesc'];?>
</textarea>
			</p>
			<p>
				<label for="textfield"><strong>Meta Other:</strong></label>
				<textarea type="text" id="vMetaOther" name="Data[vMetaOther]" class="inputbox"  title="Meta Other" rows="3" cols="8"><?php echo $_smarty_tpl->getVariable('db_product')->value[0]['vMetaOther'];?>
</textarea>
			</p>
			
		</div>	
		</td>
			
		<td width="50%" valign="top">
			<div style="border:#747474 solid 1px; padding:10px 20px;border-radius:10px; width:580px;position:relative;">
<div style="position:absolute;top: -6px;line-height: 7px; font-size:18px;color: #333333; background: none repeat scroll 0 0 #f8f8f8;padding:0 3px;">Image Details</div>
			<label for="textfield"><strong>Image :</strong></label>
			<input  type="hidden" id="totcount" name="totcount" value="<?php echo $_smarty_tpl->getVariable('totgal')->value;?>
"/>
			<div id="TextBoxesGroup">
				<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
				
				<div id="TextBoxDiv0">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="60%"><input type="file" name="gallery[]" id="gallery"></td>
						<td width="40%"><input type="button" name="Add" id="addButton" value="Add"></td>
					</tr>
					</table>	
				</div>
				<?php }elseif($_smarty_tpl->getVariable('mode')->value=='edit'&&$_smarty_tpl->getVariable('totgal')->value==1&&$_smarty_tpl->getVariable('flag')->value==0){?>
				<div id="TextBoxDiv0">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="60%"><input type="file" name="gallery[]" id="gallery"></td>
						<td width="40%"><input type="button" class="btn" name="Add" id="addButton" value="Add"></td>
					</tr>
					</table>	
				</div>
				<?php }else{ ?>
					
					<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_product_gal')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<div id="TextBoxDiv<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
">
						<input type="hidden" name="vOldGall[]" id="vOldGall" value="<?php echo $_smarty_tpl->getVariable('db_product_gal')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vGalImage'];?>
">
						<input type="hidden" name="iGalleryId[]" id="iGalleryId" value="<?php echo $_smarty_tpl->getVariable('db_product_gal')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iGalleryId'];?>
">
						<table width="85%%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="1%" valign="top">
								<input type="file" name="gallery[]" style="margin-bottom:5px;" id="gallery" >
								<?php if ($_smarty_tpl->getVariable('db_product_gal')->value[0]['vGalImage']!=''){?>
								</br>
									<a href="#galdis<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
" style="margin-left:5px;" id="popgal<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
view.png"/></a>
									<div style="display:none;">
									<div id="galdis<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
">
										<div class="popup_box">
											<div><img src="<?php echo $_smarty_tpl->getVariable('tsite_upload_images_product')->value;?>
/<?php echo $_smarty_tpl->getVariable('db_product_gal')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iProductId'];?>
/<?php echo $_smarty_tpl->getVariable('db_product_gal')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vGalImage'];?>
"></div>
										</div>
									</div>
									</div>
								
									
									<script>
									$(document).ready(function(){
										$('#popgal<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
').fancybox({
											'overlayShow'	: true	,
											'transitionIn'	: 'elastic',
											'transitionOut'	: 'elastic',
											'margin' : '0',
											'padding' : '0',
											'scrolling' : 'no'
											
										});
									});
		
									</script>
									
								<?php }?>
							</td>
							<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']==0){?>
							<td width="20%" valign="top"><input type="button" class="btn" style="padding:3px 7px;" name="Add" id="addButton" value="Add"></td>
							<?php }else{ ?>
							<td width="20%" valign="top" align=left><input type="button" class="btnalt" style="padding:4px 3px;" name="Remove" id="remove" value="Remove" onclick="deleterow(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
);">
							</td>
							<?php }?>
							
						</tr>
						</table>	
					</div>
					<?php endfor; endif; ?>
				<?php }?>
			</div>	
		</div>		
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
			<input type="submit" value="Add Product" class="btn" title="Add Product" onclick="return validate(document.frmadd);"/>
			<?php }else{ ?>
			<input type="submit" value="Edit Product" class="btn" title="Edit Product" onclick="return validate(document.frmadd);"/>
			<?php }?>
			<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</td>
	</tr>
	</table>
	<form>
</div>

</div>


<script type="text/javascript">
function redirectcancel(){

    window.location="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=pr-product&mode=view";
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



$(document).ready(function(){
    var counter = $('#totcount').val();
    
    $("#addButton").click(function () {
    //alert($('#totcount').val());
    if($('#totcount').val() >= 5){
        alert("Only allow 5 images to upload.");
        return false;
    }   
 
    var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
    //var newTextBoxDiv = $(document.createElement('div')).attr("style", 'width:200px;');
    
    
        var html ='';
        html +='<table width="100%" border="0" cellspacing="0" cellpadding="0" id="TextBoxesGroup">';
	html +='<tr>';
		html +='<td width="1%"><input type="file" name="gallery[]" id="gallery"></td>';
		html +='<td width="40%"><input type="button" name="Remove" class="btnalt" style="padding:4px 3px;" id="remove" value="Remove" onclick="deleterow('+counter+');"></td>';
	html +='</tr>';
	html +='</table>';
       
        newTextBoxDiv.html(html);
        /*newTextBoxDiv.html('<label>Textbox #'+ counter + ' : </label>' +
        '<input type="text" name="textbox' + counter + 
        '" id="textbox' + counter + '" value="" >');*/
        
        newTextBoxDiv.appendTo("#TextBoxesGroup");
        counter = $('#totcount').val();
        counter++;
        //alert(counter);
        $('#totcount').val(counter);
        //alert(counter);
        
        $('.vTimeType ,.vServiceType ,.eDuration').click(function(){
            $(this).closest('table').find("input:checkbox").each(function(){        
                $(this).attr('checked',false)
            }) 
            $(this).attr('checked',true)
        })
    
    });
      
      $('.vTimeType,.vServiceType ,.eDuration').click(function(){
            $(this).closest('table').find("input:checkbox").each(function(){        
                $(this).attr('checked',false)
            }) 
            $(this).attr('checked',true)
        })  
  });
  
  function deleterow(divid){
    //alert($('#totcount').val());
    //alert(divid);
    $("#TextBoxDiv" + divid).remove();
    var counter = $('#totcount').val()-1; ;
    //alert(counter);
     //counter--;
    $('#totcount').val(counter);
  }
  /*$("#removeButton").click(function () {
    if(counter==1){
      alert("No more textbox to remove");
      return false;
    }   
    counter--;
    alert(counter);   
    $("#TextBoxDiv" + counter).remove();
});*/

/*var mode = '<?php echo $_smarty_tpl->getVariable('mode')->value;?>
';
if(mode == 'edit'){
	$('#totcount').val('<?php echo $_smarty_tpl->getVariable('totgal')->value;?>
')
}else{
	$('#totcount').val(2);	
}*/


</script>

