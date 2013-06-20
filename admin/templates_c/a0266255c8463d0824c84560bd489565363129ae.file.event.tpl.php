<?php /* Smarty version Smarty-3.0.7, created on 2012-11-27 19:20:18
         compiled from "/var/www/qme/admin/templates/events/event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125978218350b4c51a06cec2-37864214%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0266255c8463d0824c84560bd489565363129ae' => 
    array (
      0 => '/var/www/qme/admin/templates/events/event.tpl',
      1 => 1354024146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125978218350b4c51a06cec2-37864214',
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
<style type="text/css">
.admin_photo_table th, .admin_photo_table td{ padding:0px;}
</style>
<div class="container" id="tabs">
	<div class="conthead">
		<h2 class="left">My Events</h2>
	</div>
	
	<div class="contentbox" id="tabs-1" style="margin-left:-140px;">
			<form id="frmaddevent" name="frmaddevent" action="index.php?file=e-event_a" method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('modeevent')->value;?>
" />
				<input type="hidden" name="actionEvent" id="actionEvent" value="" />
				<input type="hidden" name="iEventId" id="iEventId" value="<?php echo $_smarty_tpl->getVariable('iEventId')->value;?>
" />
				<input type="hidden" name="iMemberId" id="iMemberId" value="<?php echo $_smarty_tpl->getVariable('iMemberId')->value;?>
" />
				<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['iMemberId'];?>
" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vEventImage'];?>
" />
				<table align="center" class="photo_edit_table">
					<tr>
					<td>
					<div class="inputboxes ">
						<label for="textfield"><strong>Event Title:</strong></label>
						<input type="text" id="vTitle" name="Data[vTitle]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vTitle'];?>
" lang="*" title="Event Title"/>
					</div>			    
					<div class="inputboxes">
						<label for="textfield"><strong>Event Location:</strong></label>
						<input type="text" id="vLocation" name="Data[vLocation]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vLocation'];?>
" lang="*" title="Location"/>
					</div>												
					<div class="inputboxes">
						<label for="textfield"><strong>EventDate:</strong></label>
						<input type="text" id="dEventDate" name="Data[dEventDate]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['dEventDate'];?>
" lang="*" title="EventDate" />
					     
					</div>									               																							
					<div class="inputboxes">
					       <label for="textfield"><strong>Event Description:</strong></label>							
					       <textarea id="vDescription" name="Data[vDescription]" lang="*" title="Text" rows="5" cols="45"><?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vDescription'];?>
</textarea>
							
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Interests:<br />(check all that applies,Ctrl to select):</strong></label>
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
" id="iInterestId" name="iInterestId[]" <?php if (in_array($_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iInterestId'],$_smarty_tpl->getVariable('relatedArrIntrest')->value)){?>checked<?php }?>/><?php echo $_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vInterest'];?>

							</div>
							<?php endfor; endif; ?>
						</div>
						<?php }?>
					</div>														
					<div class="inputboxes">
						<label for="textfield"><strong>Other interest:</strong></label>
						<input type="text" id="vOtherInterest" name="Data[vOtherInterest]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vOtherInterest'];?>
"  title="Otherintrest"/>
					</div>
					<div class="inputboxes">
							<label for="textfield"><strong>Skills:<br />(check all that applies,Ctrl to select)</strong></label>
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
" id="iSkillId" name="iSkillId[]" <?php if (in_array($_smarty_tpl->getVariable('db_skill')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iSkillId'],$_smarty_tpl->getVariable('relatedArrSkill')->value)){?>checked<?php }?>/>
									<?php echo $_smarty_tpl->getVariable('db_skill')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vSkill'];?>

								</div>
								<?php endfor; endif; ?>
							</div>
						<?php }?>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Other Skills:</strong></label>
						<input type="text" id="vOtherSkill" name="Data[vOtherSkill]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vOtherSkill'];?>
"  title="Other Skills"/>
					</div>
					
					
					<div class="inputboxes">
					<label for="textfield"><strong>Event Image:</strong></label>
					<?php if ($_smarty_tpl->getVariable('db_eve')->value[0]['vEventImage']==''){?>
					<input type="file" id="vEventImage" name="vEventImage" lang="*"  value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vEventImage'];?>
"  title="Image" onchange="CheckValidFile(this.value,this.name)"/>
					<?php }else{ ?>
					<input type="file" id="vEventImage" name="vEventImage" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vEventImage'];?>
"  title="Image" onchange="CheckValidFile(this.value,this.name)" style="float:left; width:auto;" />
					<div style="float:left; width:350px;">
					<div style="float:left; margin:0px 5px 0px 26px;"><a href="#view1" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a></div>
					<p style="margin:0px 0 10px 0;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="EventImageDelete();"/></p>
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
								<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_event"];?>
<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vEventImage'];?>
" /></div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
					</div>
			<div class="add_photo_cancel">		
			<?php if ($_smarty_tpl->getVariable('modeevent')->value=='add'){?>
			<input type="submit" value="Add Event" class="btn" onclick="return validate(document.frmaddevent);" title="Add Event"/>
			<?php }else{ ?>
			<input type="submit" value="Edit Event" class="btn" onclick="return validate(document.frmaddevent);" title="Edit Event"/>
			<?php }?>
			<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</div>
			</td>
			</tr>        
	</table>
	</form>
</div>

<form name="frmsearchevent18" id="frmsearchevent18" action="#tab-event" method="post">       
        <table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label><td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword21" name="keyword21" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
" class="inputbox" /></div><td>
				<td width="10%" ><div class="bulkactions">
					<select name="option21" id="option21">
						<option value="vTitle">Event Title</option>
						<option value="eStatus">Status</option>
						
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoptionsrc();"/></div></td>
			</tr>	

		</tbody>			
		</table> 
        </form>

<div class="contentbox contentbox_admin" id="tabs-1">
<form name="frmEventList" id="frmEventList"  action="index.php?file=e-event_a" method="post">       
        <table width="100%" border="0" class="admin_photo_table">
		<input type="hidden" name="action" id="action" value="" />
		<input type="hidden" name="iMemberId" id="iMemberId" value="" />		
		<input type="hidden" name="iEventId" id="iEventId" value=""/>
		<table width="100%" border="0" class="admin_photo_table">
		<thead class="admin_table_title">
			<tr>			    
				<th>Title</th>
				<th>Location</th>
				<th>Event Date</th>	
				<th>Status</th>
				<th>Action</th>
				<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmEventList);"/></th>
			</tr>
			<tr>
				<td colspan="7" align="center">
					<div style="width:821px; margin:auto;"></div>
				</td>
			</tr>
		</thead>
		<tbody>
        <?php if (count($_smarty_tpl->getVariable('db_viewevent')->value)>0){?>
		<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_viewevent')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<td><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iEventId=<?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEventId'];?>
#tab-event" title=""><?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</a></td>
			<td><?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vLocation'];?>
</td>
			<td><?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['dEventDate'];?>
</td>
			<td><?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
			<td>
				<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iEventId=<?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEventId'];?>
#tab-event" title=""><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_edit.png" title="Edit" /></a>
				<a href="javascript:void(0);" title="Active" onclick="MakeActionEventt('<?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEventId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Active');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_approve.png" title="Active" /></a>
				<a href="javascript:void(0);" title="Inactive" onclick="MakeActionEventt('<?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEventId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Inactive');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_unapprove.png" title="Inactive" /></a>
				<a href="javascript:void(0);" title="Delete" onclick="MakeActionEventt('<?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEventId'];?>
','<?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Delete');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_delete.png" title="Delete" /></a>
			</td>
			<td><input name="iEventId[]" type="checkbox" id="iId" value="<?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEventId'];?>
"/>
			    <input name="iMemberId" type="hidden" id="mId" value="<?php echo $_smarty_tpl->getVariable('db_viewevent')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
"/></td></td>
		</tr>
        <?php endfor; endif; ?>
        <?php }else{ ?>
        <tr>
			<td height="70px;" colspan="8" style="text-align:center; color:#C44C22; font-size:14px; font-weight:bold;">No Event Found.</td>
		</tr>
        <?php }?>
		</tbody>
		</table>
        </form>
		<div class="extrabottom">
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td>
			<div class="pagination"><?php if (count($_smarty_tpl->getVariable('db_viewevent')->value)>0){?><span class="switch" style="float: left;"><?php echo $_smarty_tpl->getVariable('recmsg20')->value;?>
</span><?php }?></div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newactioneventt">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactioneventt').value,'m-member',document.frmEventList);"/>
			</div></td></tr></table>			
		</div>
</div>
</div>


<script type="text/javascript">
 $(document).ready(function() {
 $(function() {$('#dEventDate').datepicker({dateFormat: 'mm-dd-yy'});});
 });
</script>
<script type="text/javascript">
function Searchoptionsrc(){
    document.getElementById('frmsearchevent18').submit();
}
function MakeActionEventt(loopid,member,type){
    document.frmEventList.iEventId.value = loopid;
    document.frmEventList.iMemberId.value = member;
    document.frmEventList.action.value = type;
    document.frmEventList.submit();
}
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'm-member';
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
function EventImageDelete(){
	var r=confirm("Are you sure to delete this image");
	if (r==true)
	  {
		if($('#actionEvent')){
			$('#actionEvent').val("DeleteEventImage");
		}
		
		if($('#frmaddevent')){
			$('#frmaddevent').submit();
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

