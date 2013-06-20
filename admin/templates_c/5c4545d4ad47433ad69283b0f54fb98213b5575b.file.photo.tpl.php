<?php /* Smarty version Smarty-3.0.7, created on 2012-11-28 17:03:04
         compiled from "/var/www/qme/admin/templates/photo/photo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141880251050b5f670808226-39143235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c4545d4ad47433ad69283b0f54fb98213b5575b' => 
    array (
      0 => '/var/www/qme/admin/templates/photo/photo.tpl',
      1 => 1354101972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141880251050b5f670808226-39143235',
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
		<h2 class="left">My Photos</h2>
	</div>
	<!--  Add/Edit category starts here -->
	<div class="contentbox" id="tabs-1">
		<form id="frmaddphotocat" name="frmaddphotocat" action="index.php?file=ph-photocategory_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iPhotoCategoryId" id="iPhotoCategoryId" value="<?php echo $_smarty_tpl->getVariable('iPhotoCategoryId')->value;?>
" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="<?php echo $_smarty_tpl->getVariable('iMemberId')->value;?>
" />
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="<?php echo $_smarty_tpl->getVariable('db_photocategory')->value[0]['iMemberId'];?>
" />
			<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('modePhotoCat')->value;?>
"/>
			<input type="hidden" name="actionalb" id="actionalb" value=""/>
			<table align="center" class="admin_top_table" width="50%">
				<tr>
					<td><div class="inputboxes inputboxes_admin">
							<label for="textfield"><strong>Photo Category:</strong></label>
							<input type="text" id="vPhotoCategory" name="Data[vPhotoCategory]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_photocategory')->value[0]['vPhotoCategory'];?>
" lang="*" title="Photo Category" lang="*"/>
						</div></td>
				</tr>
				<tr>
					<td><div class="inputboxes inputboxes_admin">
							<label for="textfield"><strong>Select Image:</strong></label>
							<?php if ($_smarty_tpl->getVariable('db_photocategory')->value[0]['vImage']==''){?>
							<input type="file"  id="vImage" name="vImage"  value="<?php echo $_smarty_tpl->getVariable('db_photocategory')->value[0]['vImage'];?>
"  title="Image" lang="*" onchange="CheckValidFile(this.value,this.name)"/>
							<?php }else{ ?>
							<input type="file" id="vImage" name="vImage" value="<?php echo $_smarty_tpl->getVariable('db_photocategory')->value[0]['vImage'];?>
" style="float:left; margin-right:10px; width:auto;"   title="Image" onchange="CheckValidFile(this.value,this.name)"/>
							<div class="view_btn"><a href="#view11" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="PhalbImageDelete();" style="margin-left:8px;"/></div>
							<?php }?>
							<div style="display:none;">
								<div id="view11">
									<div class="popup_box">
										<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_photo"];?>
<?php echo $_smarty_tpl->getVariable('db_photocategory')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_photocategory')->value[0]['vImage'];?>
" /></div>
									</div>
								</div>
							</div>
						</div></td>
				</tr>
				<tr>
					<td><div class="inputboxes inputboxes_admin">
							<label for="textfield"><strong>Status:</strong></label>
							<select id="eStatus" name="Data[eStatus]">
								<option value="Active" <?php if ($_smarty_tpl->getVariable('db_photocategory')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
								<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_photocategory')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
							</select>
						</div></td>
				</tr>
				<tr>
					<td align="right" class="add_photo_btn"> <?php if ($_smarty_tpl->getVariable('modePhotoCat')->value=='add'){?>
						<input type="submit" value="Add Photo Category" class="btn" onclick="return validate(document.frmaddphotocat);" title="Add Photo Category"/>
						<?php }else{ ?>
						<input type="submit" value="Edit Photo Category" class="btn" onclick="return validate(document.frmaddphotocat);" title="Edit Photo Category"/>
						<?php }?>
						<!--<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>-->
					</td>
				</tr>
			</table>
		</form>
	</div>
	<!--  Add/Edit category ends here -->
	<form name="frmsearchphcat" id="frmsearchphcat" action="#tab-photo" method="post">
		<table width="100%" border="0">
			<tbody>
				<tr>
					<td width="10%"><label for="textfield"><strong>Search:</strong></label>
					<td>
					<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword3" name="keyword3" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
" class="inputbox" /></div>
					<td>
					<td width="10%" ><div class="bulkactions"><select name="option3" id="option3">
							<option value="vPhotoCategory">Photo Album</option>
							<option value="eStatus">Status</option>
						</select></div>
					</td>
					<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoptionphcat();"/></div></td>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<!-- category listing starts here -->
	<div class="contentbox contentbox_admin" id="tabs-1">
		<form name="frmlist" id="frmlist"  action="index.php?file=ph-photocategory_a" method="post">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="admin_main_table">
				<input type="hidden" name="action" id="action" value="" />
				<input  type="hidden" name="iPhotoCategoryId" value=""/>
				<input  type="hidden" name="iMemberId" value=""/>
				<thead class="admin_table_title">
					<tr>
						<th>Photo Category</th>
						<th>Status</th>
						<th>Action</th>
						<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmlist);"/></th>
					</tr>
				</thead>
				<tbody>
				
				<?php if (count($_smarty_tpl->getVariable('db_viewphotocategory')->value)>0){?>
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_viewphotocategory')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iPhotoCategoryId=<?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoCategoryId'];?>
#tab-photo" title=""><?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPhotoCategory'];?>
</a></td>
					<td><?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
					<td><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iPhotoCategoryId=<?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoCategoryId'];?>
#tab-photo" title=""><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_edit.png" title="Edit" /></a> <a href="javascript:void(0);" title="Active" onclick="MakeActionPhotoCat('<?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoCategoryId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Active');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_approve.png" title="Active" /></a> <a href="javascript:void(0);" title="Inactive" onclick="MakeActionPhotoCat('<?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoCategoryId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Inactive');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_unapprove.png" title="Inactive" /></a> <a href="javascript:void(0);" title="Delete" onclick="MakeActionPhotoCat('<?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoCategoryId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Delete');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_delete.png" title="Delete" /></a> </td>
					<td><input name="iPhotoCategoryId[]" type="checkbox" id="iId" value="<?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoCategoryId'];?>
"/>
						<input name="iMemberId" type="hidden" id="mId" value="<?php echo $_smarty_tpl->getVariable('db_viewphotocategory')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
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
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td>
			<div class="pagination"> <?php if (count($_smarty_tpl->getVariable('db_viewphotocategory')->value)>0){?> <span class="switch" style="float: left;"><?php echo $_smarty_tpl->getVariable('recmsg3')->value;?>
</span> <?php }?> </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newaction">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction').value,'m-member',document.frmlist);"/>
			</div></td>
			</tr></table>
		</div>
	</div>
	<!--- Add/Edit Photo starts here --->
	<div class="contentbox" id="tabs-1">
		<form id="frmphotoadd" name="frmphotoadd" action="index.php?file=ph-photo_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iPhotoId" id="iPhotoId" value="<?php echo $_smarty_tpl->getVariable('iPhotoId')->value;?>
" />
			<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['vImage'];?>
" />
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['iMemberId'];?>
" />
			<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('modePhoto')->value;?>
" />
			<input type="hidden" name="actionPhoto" id="actionPhoto" value="" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="<?php echo $_smarty_tpl->getVariable('iMemberId')->value;?>
" />
			<table align="center" class="photo_edit_table" width="50%">
				<tr>
					<td><div class="inputboxes">
							<label for="textfield"><strong>Photo Title:</strong></label>
							<input type="text" id="vPhotoTitle" name="Data[vPhotoTitle]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['vPhotoTitle'];?>
" lang="*" title="Photo Title"/>
						</div>
			<!--<div class="inputboxes">
				<label for="textfield"><strong>Order No :</strong></label>
				<select id="iOrderNo" name="Data[iOrderNo]">
					
					<?php if ($_smarty_tpl->getVariable('my_mode2')->value=='add'){?>
						<?php while (($_smarty_tpl->getVariable('totalRec')->value+1)>=$_smarty_tpl->getVariable('initOrder')->value){?>
						<option value="<?php echo $_smarty_tpl->getVariable('initOrder')->value;?>
" <?php if ($_smarty_tpl->getVariable('db_photo')->value[0]['iOrderNo']==$_smarty_tpl->getVariable('initOrder')->value){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('initOrder')->value++;?>
</option>					
						<?php }?>
					<?php }else{ ?>
						<?php while (($_smarty_tpl->getVariable('totalRec')->value)>=$_smarty_tpl->getVariable('initOrder')->value){?>
						<option value="<?php echo $_smarty_tpl->getVariable('initOrder')->value;?>
" <?php if ($_smarty_tpl->getVariable('db_photo')->value[0]['iOrderNo']==$_smarty_tpl->getVariable('initOrder')->value){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('initOrder')->value++;?>
</option>				
						<?php }?>
					<?php }?>
				</select>
			</div>-->
						<div class="inputboxes" >
							<label for="textfield"><strong>Select Image:</strong></label>
							<?php if ($_smarty_tpl->getVariable('db_photo')->value[0]['vImage']==''){?>
							<input type="file" id="vImage" name="vImage"  value="<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['vImage'];?>
"  title="vImage" lang="*" onchange="CheckValidFile(this.value,this.name)"/>
							<?php }else{ ?>
							<input type="file" id="vImage" name="vImage" value="<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['vImage'];?>
"  title="vImage" onchange="CheckValidFile(this.value,this.name)" style=" float:left; width:auto;" />
							<?php }?>
							
							<?php if ($_smarty_tpl->getVariable('db_photo')->value[0]['vImage']!=''){?>
							<div style="float:left; ">
								<div style="float:left; margin:5px 5px 0px 10px; "><a href="#viewPhoto" id="testPhoto"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
view.png"/></a></div>
								<p style="margin:5px 0 0px 0; padding-bottom:0; float:left; "><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp4=ob_get_clean();?><?php echo $_tmp4;?>
delete.png" onclick="PhotoImageDelete();"/></p>
								<div style="display:none;">
									<div id="viewPhoto">
										<div class="popup_box">
											<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_photo"];?>
<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_photo')->value[0]['vImage'];?>
" /></div>
										</div>
									</div>
								</div>
							</div>
							<?php }?> </div>
						<div class="inputboxes"><label for="textfield"><strong>Category:</strong></label>
							<select id="iPhotoCategoryId" name="Data[iPhotoCategoryId]" title="Photo Category" onchange="showdropdownvalue(this.value);">
								<option value=''>--Select photo category--</option>
								
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
				
							</select>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Status:</strong></label>
							<select id="eStatus" name="Data[eStatus]">
								<option value="Active" <?php if ($_smarty_tpl->getVariable('db_photo')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
								<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_photo')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
							</select>
						</div>
						<div class="add_photo_cancel"> <?php if ($_smarty_tpl->getVariable('modePhoto')->value=='add'){?>
							<input type="submit" value="Add Photo" class="btn" onclick="return validate(document.frmphotoadd);" title="Add Photo"/>
							<?php }else{ ?>
							<input type="submit" value="Edit Photo" class="btn" onclick="return validate(document.frmphotoadd);" title="Edit Photo"/>
							<?php }?>
							<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
						</div></td>
				</tr>
			</table>
		</form>
		<div id='preview'> </div>
	</div>
	<!--- Add/Edit Photo ends here --->
	<form name="frmsearchphoto" id="frmsearchphoto" action="#tab-photo" method="post">
		<table width="100%" border="0">
			<tbody>
				<tr>
					<td width="10%"><label for="textfield"><strong>Search:</strong></label>
					<td>
					<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword8" name="keyword8" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
" class="inputbox" /></div>
					<td>
					<td width="10%" ><div class="bulkactions"><select name="option8" id="option8">
							<option value="vPhotoTitle">Photo Title</option>
							<option value="eStatus">Status</option>
						</select></div>
					</td>
					<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoptionphoto();"/></div></td>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<!--  photo listing starts here -->
	<div class="contentbox contentbox_admin_bot" id="tabs-1">
		<form name="frmphotolist" id="frmphotolist"  action="index.php?file=ph-photo_a" method="post">
			<table width="100%" border="0" class="admin_photo_table">
				<input type="hidden" name="action" id="action" value="" />
				<input type="hidden" name="iMemberId" id="iMemberId" value="" />
				<input  type="hidden" name="iPhotoId" value=""/>
				<thead class="admin_table_title" style="width:490px">
					<tr>
						<th>Photo</th>
						<th>Photo Title</th>
						<th>Photo Category</th>
						<th>Status</th>
						<th>Action</th>
						<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmphotolist);"/></th>
					</tr>
				</thead>
				<tbody>
				
				<?php if (count($_smarty_tpl->getVariable('db_viewphoto')->value)>0){?>
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_viewphoto')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<td><img width="76" height="68" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_upload_images_photo'];?>
/<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
/2_<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
"/></td>
					<!--<td><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_upload_images_photo'];?>
/<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoCategoryId'];?>
/2_<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
"></td>-->
					<td><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iPhotoId=<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoId'];?>
#tab-photo" title=""><?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPhotoTitle'];?>
</a></td>
					<?php if ($_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPhotoCategory']!=''){?>
					<td><?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPhotoCategory'];?>
</td>
					<?php }else{ ?>
					<td>....</td>
					<?php }?>
					<td><?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
					<td><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iPhotoId=<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoId'];?>
#tab-photo" title=""><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_edit.png" title="Edit" /></a> <a href="javascript:void(0);" title="Active" onclick="MakeActionPhoto('<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Active');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_approve.png" title="Active" /></a> <a href="javascript:void(0);" title="Inactive" onclick="MakeActionPhoto('<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Inactive');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_unapprove.png" title="Inactive" /></a> <a href="javascript:void(0);" title="Delete" onclick="MakeActionPhoto('<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Delete');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_delete.png" title="Delete" /></a> </td>
					<td><input name="iPhotoId[]" type="checkbox" id="iId" value="<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPhotoId'];?>
"/>
						<input name="iMemberId[]" type="hidden" id="mId" value="<?php echo $_smarty_tpl->getVariable('db_viewphoto')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
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
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td>
			<div class="pagination"> <?php if (count($_smarty_tpl->getVariable('db_viewphoto')->value)>0){?> <span class="switch" style="float: left;"><?php echo $_smarty_tpl->getVariable('recmsg4')->value;?>
</span> <?php }?> </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newaction2">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction2').value,'m-member',document.frmphotolist);"/>
			</div></td></tr></table>
		</div>
	</div>
	<!--  photo listing ends here -->
</div>

<script>
function Searchoptionphoto(){
	
    document.getElementById('frmsearchphoto').submit();
}
function Searchoptionphcat(){
	
    document.getElementById('frmsearchphcat').submit();
}
function AlphaSearch(val){
	var type = $('#type').val();
    var alphavalue = val;
    
    var file = 'ph-photo';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}
function MakeActionPhotoCat(loopid,member,type){
    document.frmlist.iPhotoCategoryId.value = loopid;
    document.frmlist.iMemberId.value = member;
    document.frmlist.action.value = type;
    
	document.frmlist.submit();	
}
function MakeActionPhoto(loopid,member,type){
    document.frmphotolist.iPhotoId.value = loopid;
    document.frmphotolist.iMemberId.value = member;
    document.frmphotolist.action.value = type;
    
	document.frmphotolist.submit();	
}
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}

function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'ph-photo';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=m-member&mode=view";
    return false;
}

$(document).ready(function(){
	$('#testPhoto').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});
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
function PhotoImageDelete(){
	var r=confirm("Are you sure to delete this image");
	if (r==true)
	  {
		if($('#actionPhoto')){
			$('#actionPhoto').val("DeleteImage");
		}
		
		if($('#frmphotoadd')){
			$('#frmphotoadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
	}
function PhalbImageDelete(){
	var r=confirm("Are you sure to delete this image");
	if (r==true)
	  {
		if($('#actionalb')){
			$('#actionalb').val("DeleteImage");
		}
		
		if($('#frmaddphotocat')){
			$('#frmaddphotocat').submit();
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
 