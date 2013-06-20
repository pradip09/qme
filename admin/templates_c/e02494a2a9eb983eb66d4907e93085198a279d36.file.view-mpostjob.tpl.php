<?php /* Smarty version Smarty-3.0.7, created on 2012-12-26 03:58:51
         compiled from "/home/qmemedia/public_html/admin/templates/postjob/view-mpostjob.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93587656950daca5b5d8047-52621758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e02494a2a9eb983eb66d4907e93085198a279d36' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/postjob/view-mpostjob.tpl',
      1 => 1356511726,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93587656950daca5b5d8047-52621758',
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
		<h2 class="left">Post Job</h2>
	</div>
	
	<div class="contentbox" id="tabs-1">
		<form id="frmpostadd" name="frmpostadd" action="index.php?file=pj-mpostjob_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_post_job')->value[0]['vImage'];?>
"/>
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="<?php echo $_smarty_tpl->getVariable('db_post_job')->value[0]['iMemberId'];?>
" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="<?php echo $_smarty_tpl->getVariable('memberId')->value;?>
" />
			<input type="hidden" name="iPostJobId" id="iPostJobId" value="<?php echo $_smarty_tpl->getVariable('iPostJobId')->value;?>
" />
			<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('modePost')->value;?>
" />
			<input type="hidden" name="selectedstate" id="selectedstate" value="<?php echo $_smarty_tpl->getVariable('db_post_job')->value[0]['iStateId'];?>
"/>
			
			
			<table align="center" class="photo_edit_table">
			<tr>
			<td>
			
			<div class="inputboxes">
				<label for="textfield"><strong>What skill are you looking for:</strong></label>
				<input type="text" id="vSkill" name="Data[vSkill]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_post_job')->value[0]['vSkill'];?>
" lang="*" title=" Skill"/>
			</div>
			
				<div class="inputboxes">
					<label for="textfield"><strong>What do you need this person to do:</strong></label>
					<textarea id="tDescription" name="Data[tDescription]" class="inputbox" lang="*" title="What do you need this person to do" style="width:500px;height:123px;"><?php echo $_smarty_tpl->getVariable('db_post_job')->value[0]['tDescription'];?>
</textarea>
				</div>
				<div class="inputboxes">
							<label><strong>Skill:</strong></label>
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
" lang="*" id="iSkillId" name="iSkillId[]" <?php if (in_array($_smarty_tpl->getVariable('db_skill')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iSkillId'],$_smarty_tpl->getVariable('Arrskill')->value)){?>checked<?php }?>/>
									<?php echo $_smarty_tpl->getVariable('db_skill')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vSkill'];?>

								</div>
								<?php endfor; endif; ?>
							</div>
						<?php }?>
				</div>
				<div class="inputboxes">
						<label><strong>Interest:</strong></label>
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
" id="iInterestId" lang="*" name="iInterestId[]" <?php if (in_array($_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iInterestId'],$_smarty_tpl->getVariable('Arrintrest')->value)){?>checked<?php }?>/><?php echo $_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vInterest'];?>

							</div>
							<?php endfor; endif; ?>
						</div>
						<?php }?>
				</div>	
				
							
				<div class="inputboxes">
					<label for="textfield"><strong>Other Interest:</strong></label>
					<input type="text" name="Data[vOtherInterest]" class="inputbox" id="vOtherInterest" value="<?php echo $_smarty_tpl->getVariable('db_post_job')->value[0]['vOtherInterest'];?>
" title="Other Interest"/>
				</div>
				 <div class="inputboxes">
					<label for="textfield"><strong>Country:</strong></label>
					<select id="iCountryId" name="Data[iCountryId]" lang="*" title="Country" onchange="getCountrylist(this.value)" style="width:227px;">
						<option value=''>--Select Country--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_cont')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value='<?php echo $_smarty_tpl->getVariable('db_cont')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCountryId'];?>
' <?php if ($_smarty_tpl->getVariable('db_cont')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCountryId']==$_smarty_tpl->getVariable('db_post_job')->value[0]['iCountryId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_cont')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCountry'];?>
</option>
						<?php endfor; endif; ?>
					</select>                
				</div>             
                                	 
				 <div class="inputboxes">
					<label for="textfield"><strong>State:</strong></label>
					<div id="showallsta">					
						<select id="iStateId" name="Data[iStateId]" title="State"  lang="*"  style="width:227px">							
						<option value=''>--Select State--</option>
					    </select>	
					</div>				 
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>City:</strong></label>
					<input type="text" id="vCity" name="Data[vCity]" class="inputbox" title="City" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_job')->value[0]['vCity'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Zip:</strong></label>
					<input type="text" id="vZip" name="Data[vZip]" class="inputbox" title="Zip" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_job')->value[0]['vZip'];?>
" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Mile:</strong></label>
					<input type="text" id="vMile" name="Data[vMile]" class="inputbox" title="Mile" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_job')->value[0]['vMile'];?>
" onkeypress="return checkprice(event);"/>
				</div>
				
				<div style="clear:both;"></div>
									
			<div class="inputboxes">
				<label for="textfield"><strong>Status:</strong></label>
				<select id="eStatus" name="Data[eStatus]">
					<option value="Active" <?php if ($_smarty_tpl->getVariable('db_post_job')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
					<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_post_job')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
				</select>
			</div>
			<br/>
			<br/>
			<div class="add_photo_cancel">
				<?php if ($_smarty_tpl->getVariable('modePost')->value=='add'){?>
				<input type="submit" value="Add Post job" class="btn" onclick="return validate(document.frmpostadd);" title="Add Post job"/>
				<?php }else{ ?>
				<input type="submit" value="Edit Post job" class="btn" on click="return validate(document.frmpostadd);" title="Edit Post job"/>
				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</div>
			</td>
			</tr>
			</table>
		</form>
	</div>
	<!--- Add/Edit Blog ends here --->
	<form name="frmsearchpost" id="frmsearchpost" action="#tab-postjob" method="post">       
        <table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label><td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword23" name="keyword23" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
" class="inputbox" /></div><td>
				<td width="10%" ><div class="bulkactions">
					<select name="option23" id="option23">
						<option value="vSkill">Skill</option>
						<option value="eStatus">Status</option>
						
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Srchoption();"/></div></td>
			</tr>	

		</tbody>			
		</table> 
        </form>
	
	<!--  Blog listing starts here -->
	<div class="contentbox contentbox_admin_bot" id="tabs-1">
		<form name="frmpostlist" id="frmpostlist"  action="index.php?file=pj-mpostjob_a" method="post">
			<input type="hidden" name="action" id="action" value="" />
			<input type="hidden" name="iPostJobId" id="iPostJobId" value="" />
			<input  type="hidden" name="iMemberId" id="iMemberId" value=""/>
			<table width="100%" border="0" class="admin_photo_table">
				<thead class="admin_table_title">
					<tr>						
						<th>Skill</th>
						<th>Status</th>
						<th>Action</th>
						<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmpostlist);"/></th>
					</tr>
					<tr>
				<td colspan="7" align="center">
					<div style="width:821px; margin:auto;"></div>
				</td>
				</tr>
				</thead>
				<tbody>
				
				<?php if (count($_smarty_tpl->getVariable('db_view_post_job')->value)>0){?>
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_view_post_job')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iPostJobId=<?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostJobId'];?>
#tab-postjob" title=""><?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vSkill'];?>
</a></td>					
					
					<td><?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
					<td>
						<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iPostJobId=<?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostJobId'];?>
#tab-postjob" title=""><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_edit.png" title="Edit" /></a>
						<a href="javascript:void(0);" title="Active" onclick="MakeActionPost('<?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostJobId'];?>
','<?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Active');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_approve.png" title="Active" /></a>
						<a href="javascript:void(0);" title="Inactive" onclick="MakeActionPost('<?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostJobId'];?>
','<?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Inactive');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_unapprove.png" title="Inactive" /></a>
						<a href="javascript:void(0);" title="Delete" onclick="MakeActionPost('<?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostJobId'];?>
','<?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Delete');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_delete.png" title="Delete" /></a>
					</td>
					<td>
						<input name="iPostJobId[]" type="checkbox" id="iId" value="<?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPostJobId'];?>
"/>
						<input name="iMemberId" type="hidden" id="mId" value="<?php echo $_smarty_tpl->getVariable('db_view_post_job')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
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
			<?php if (count($_smarty_tpl->getVariable('db_view_post_job')->value)>0){?>
			    <span class="switch" style="float: left;"><?php echo $_smarty_tpl->getVariable('recmsg33')->value;?>
</span>
			    <?php }?>
			 </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newactionpost">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionpost').value,'m-member',document.frmpostlist);"/>
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

function Srchoption(){
	
    document.getElementById('frmsearchpost').submit();
}
function AlphaSearch(val){
	var type = $('#type').val();
    var alphavalue = val;
    
    var file = 'm-member';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}

function MakeActionPost(loopid,member,type){
	//alert("hello");
    document.frmpostlist.iPostJobId.value = loopid;
    document.frmpostlist.iMemberId.value = member;
    document.frmpostlist.action.value = type;    
    document.frmpostlist.submit();	
}

function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'm-member';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=m-member&mode=view";
    return false;
}
</script>
<script>
getId('<?php echo $_smarty_tpl->getVariable('db_post_job')->value[0]['iCountryId'];?>
','<?php echo $_smarty_tpl->getVariable('db_post_job')->value[0]['iMemberId'];?>
','<?php echo $_smarty_tpl->getVariable('db_post_job')->value[0]['iPostJobId'];?>
');
function getId(id,id1,id2){	
	if($('#action').val() == 'edit'){
		var countryId = id;
		var iMemberId=id1
		var iPostJobId=id2
		getCountrylist(countryId,iMemberId,iPostJobId);
	}	
}
function getCountrylist(countryId,iMemberId,iPostJobId)
{
	//alert(countryId);
	var extra ='';
	extra+='&countryId='+countryId;
	extra+='&iMemberId='+iMemberId;
	extra+='&iPostJobId='+iPostJobId;
	if($('#selectedstate')){
        if($('#selectedstate').val() !=''){
         var selectedstate = $('#selectedstate').val();
         extra+='&selectedstate='+selectedstate;   
        }        
	}
	var url = admin_url+"/index.php?file=pj-ajpostcountry";
	var pars = extra;
    //alert(url+pars);
	$.post(url+pars,
            function(data) {
       //alert(data);
		if($('#showallsta')){
			$('#showallsta').html(data);
          
		}
	});
}
</script>

