<?php /* Smarty version Smarty-3.0.7, created on 2012-11-27 19:20:17
         compiled from "/var/www/qme/admin/templates/blog/blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141459532250b4c519d860d4-97818594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9f40fd67ac7d418472cc496e3c0810a8ed4c5d2' => 
    array (
      0 => '/var/www/qme/admin/templates/blog/blog.tpl',
      1 => 1354024216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141459532250b4c519d860d4-97818594',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
jlist.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<div class="container" id="tabs">
	<div class="conthead">
		<h2 class="left">My Blogs</h2>
	</div>
	
	<div class="contentbox" id="tabs-1" style="margin-left:129px;">
		<form id="frmblogadd" name="frmblogadd" action="index.php?file=b-blog_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_blog')->value[0]['vImage'];?>
"/>
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="<?php echo $_smarty_tpl->getVariable('db_blog')->value[0]['iMemberId'];?>
" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="<?php echo $_smarty_tpl->getVariable('memberId')->value;?>
" />
			<input type="hidden" name="iBlogId" id="iBlogId" value="<?php echo $_smarty_tpl->getVariable('iBlogId')->value;?>
"/>
			<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('modeBlog')->value;?>
" />
			<input type="hidden" name="actiondel" id="actiondel" value="" />
			<table align="center" class="photo_edit_table" width="70%">
			<tr>
			<td>
			
			<div class="inputboxes">
				<label for="textfield"><strong>Entry Title:</strong></label>
				<input type="text" id="vBlogTitle" name="Data[vBlogTitle]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_blog')->value[0]['vBlogTitle'];?>
" lang="*" title="Entry Title"/>
			</div>
			
				<div class="inputboxes">
					<label for="textfield"><strong>Create  Date:</strong></label>
					<input type="text" id="dCreateDate" name="Data[dCreateDate]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_blog')->value[0]['dCreateDate'];?>
" lang="*" title="CreateDate" />
				</div>
				<div class="inputboxes">
					<label style="margin-bottom:7px;" for="textfield"><strong>Description:</strong></label>
					<!--<label for="textfield"><strong>Entry Text:</strong></label>-->
					<textarea id="vText" name="Data[vText]" class="inputbox" title="Text" lang="*" style="width:300px; height:150px"><?php echo $_smarty_tpl->getVariable('db_blog')->value[0]['vText'];?>
</textarea>
				</div>
			
				<div class="inputboxes">
					<label for="textfield"><strong>Hide Entry:</strong></label>
					<input type="checkbox" id="eHideEntry" name="eHideEntry"  value="1" <?php if ($_smarty_tpl->getVariable('db_blog')->value[0]['eHideEntry']=='Yes'){?>checked<?php }?>>
				</div>
				
				<div class="inputboxes">
				<label for="textfield"><strong>Upload Image:</strong></label>
				<?php if ($_smarty_tpl->getVariable('db_blog')->value[0]['vImage']==''){?>
				<input type="file" id="vImage" name="vImage"  value="<?php echo $_smarty_tpl->getVariable('db_blog')->value[0]['vImage'];?>
"  lang="*" title="Image" onchange="CheckValidFile(this.value,this.name)"  />
				<!--</div>-->
				<?php }else{ ?>
				<input type="file" id="vImage" name="vImage"  value="<?php echo $_smarty_tpl->getVariable('db_blog')->value[0]['vImage'];?>
" title="Image" onchange="CheckValidFile(this.value,this.name)" style="float:left; width:auto;" />
				<div style="float:left; width:350px;">
						<div style="float:left; margin:0px 5px 0px 26px;"><a href="#view1" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a></div>
						<p style="margin:0px 0 10px 0;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="BlogImageDelete();"/></p>
						
						<div style="display:none;">
						<div id="view1">
							<div class="popup_box">
								<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_blog"];?>
<?php echo $_smarty_tpl->getVariable('db_blog')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_blog')->value[0]['vImage'];?>
" /></div>
							</div>
						</div>
						</div>
					
				</div>
				<?php }?>
				</div>
				<div class="inputboxes">
						<label><strong>Blog Category:</strong></label>
						<br/>
						<?php if (count($_smarty_tpl->getVariable('db_interest')->value)>0){?>
						<div class="event_skill">
							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_interest')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
							<div class="event_slikk_inner">
								<input type="checkbox" value="<?php echo $_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iInterestId'];?>
" id="iInterestId" name="iInterestId[]" <?php if (in_array($_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iInterestId'],$_smarty_tpl->getVariable('Arrintrest')->value)){?>checked<?php }?>/><?php echo $_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vInterest'];?>

							</div>
							<?php endfor; endif; ?>
						</div>
						<?php }?>
						</div>						
						<div class="inputboxes">
							<label for="textfield"><strong>Other Category:</strong></label>
							<input type="text" name="Data[vOtherInterest]" class="inputbox" id="vOtherInterest" value="<?php echo $_smarty_tpl->getVariable('db_blog')->value[0]['vOtherInterest'];?>
" title="Other Interest"/>
						</div>
						<div class="inputboxes">
							<label><strong>Select Groups that may benefit from this blog:</strong></label>
							<br/>
							<?php if (count($_smarty_tpl->getVariable('db_skill')->value)>0){?>
							<div class="event_skill" style="margin-left:137px;">
								<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_skill')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
								<div class="event_slikk_inner">
									<input type="checkbox" value="<?php echo $_smarty_tpl->getVariable('db_skill')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iSkillId'];?>
" id="iSkillId" name="iSkillId[]" <?php if (in_array($_smarty_tpl->getVariable('db_skill')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iSkillId'],$_smarty_tpl->getVariable('Arrskill')->value)){?>checked<?php }?>/>
									<?php echo $_smarty_tpl->getVariable('db_skill')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vSkill'];?>

								</div>
								<?php endfor; endif; ?>
							</div>
						<?php }?>
						</div>						
						<div class="inputboxes">
							<label for="textfield"><strong>Other Group:</strong></label>
							<input type="text" id="vOtherSkill" name="Data[vOtherSkill]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_blog')->value[0]['vOtherSkill'];?>
" title="Other Skill"/>
						</div>
				<div style="clear:both;"></div>
									
			<div class="inputboxes">
				<label for="textfield"><strong>Status:</strong></label>
				<select id="eStatus" name="Data[eStatus]">
					<option value="Active" <?php if ($_smarty_tpl->getVariable('db_blog')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
					<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_blog')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
				</select>
			</div>
			
			<div class="add_photo_cancel">
				<?php if ($_smarty_tpl->getVariable('modeBlog')->value=='add'){?>
				<input type="submit" value="Add Blog" class="btn" onclick="return validate(document.frmblogadd);" title="Add Blog"/>
				<?php }else{ ?>
				<input type="submit" value="Edit Blog" class="btn" on click="return validate(document.frmblogadd);" title="Edit Blog"/>
				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</div>
			</td>
			</tr>
			</table>
		</form>
	</div>
	<!--- Add/Edit Blog ends here --->
	<form name="frmsearchblog" id="frmsearchblog" action="#tab-blog" method="post">       
        <table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label><td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword" name="keyword" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
" class="inputbox" /></div><td>
				<td width="10%" ><div class="bulkactions">
					<select name="option" id="option">
						<option value="vBlogTitle">Blog Title</option>
						<option value="eStatus">Status</option>
						
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchopt();"/></div></td>
			</tr>	

		</tbody>			
		</table> 
        </form>
	
	<!--  Blog listing starts here -->
	<div class="contentbox contentbox_admin_bot" id="tabs-1">
		<form name="frmbloglist" id="frmbloglist"  action="index.php?file=b-blog_a" method="post">
			<input type="hidden" name="action" id="action" value="" />
			<input  type="hidden" name="iBlogId" id="iBlogId" value=""/>
			<input  type="hidden" name="iMemberId" id="iMemberId" value=""/>
			<table width="100%" border="0" class="admin_photo_table">
				<thead class="admin_table_title">
					<tr>						
						<th>Entry Title</th>
						<th>Create Date</th>
						<th>Status</th>
						<th>Action</th>
						<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmbloglist);"/></th>
					</tr>
					<tr>
				<td colspan="7" align="center">
					<div style="width:821px; margin:auto;"></div>
				</td>
				</tr>
				</thead>
				<tbody>
				
				<?php if (count($_smarty_tpl->getVariable('db_blog_view')->value)>0){?>
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_blog_view')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iBlogId=<?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBlogId'];?>
#tab-blog" title=""><?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vBlogTitle'];?>
</a></td>					
					<td><?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['dCreateDate'];?>
</td>
					<td><?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
					<td>
						<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iBlogId=<?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBlogId'];?>
#tab-blog" title=""><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_edit.png" title="Edit" /></a>
						<a href="javascript:void(0);" title="Active" onclick="MakeActionBlog('<?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBlogId'];?>
','<?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Active');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_approve.png" title="Active" /></a>
						<a href="javascript:void(0);" title="Inactive" onclick="MakeActionBlog('<?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBlogId'];?>
','<?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Inactive');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_unapprove.png" title="Inactive" /></a>
						<a href="javascript:void(0);" title="Delete" onclick="MakeActionBlog('<?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBlogId'];?>
','<?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Delete');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_delete.png" title="Delete" /></a>
					</td>
					<td>
						<input name="iBlogId[]" type="checkbox" id="iId" value="<?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBlogId'];?>
"/>
						<input name="iMemberId" type="hidden" id="mId" value="<?php echo $_smarty_tpl->getVariable('db_blog_view')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
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
			<div class="pagination">
			<?php if (count($_smarty_tpl->getVariable('db_blog_view')->value)>0){?>
			    <span class="switch" style="float: left;"><?php echo $_smarty_tpl->getVariable('recmsg')->value;?>
</span>
			    <?php }?>
			 </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newactionBlog">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionBlog').value,'m-member',document.frmbloglist);"/>
			</div></td></tr></table>
		</div>
	</div>
	<!--  Blog listing ends here -->
	
</div>

<script type="text/javascript">
 $(document).ready(function() {
 $(function() {$('#dCreateDate').datepicker({dateFormat: 'mm-dd-yy'});});
 });
 </script>
<script>

function Searchopt(){
	
    document.getElementById('frmsearchblog').submit();
}
function AlphaSearch(val){
	var type = $('#type').val();
    var alphavalue = val;
    
    var file = 'm-member';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}

function MakeActionBlog(loopid,member,type){
	//alert("hello");
    document.frmbloglist.iBlogId.value = loopid;
    document.frmbloglist.iMemberId.value = member;
    document.frmbloglist.action.value = type;    
    document.frmbloglist.submit();	
}

function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'm-member';
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

function BlogImageDelete(){
	var r=confirm("Are you sure to delete this Image File");
	if (r==true)
	{
		
	      if($('#actiondel')){
		      $('#actiondel').val("DeleteBlogImage");
	      }
	      if($('#frmblogadd')){
		      $('#frmblogadd').submit();
	      }
	     
	}
      else
	{
	      return false;
	} 
}

</script>

