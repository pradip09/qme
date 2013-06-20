<?php /* Smarty version Smarty-3.0.7, created on 2012-12-26 03:58:51
         compiled from "/home/qmemedia/public_html/admin/templates/postcampaign/view-mpostcampaign.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17871151650daca5bb0b537-22564584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2077ce03e0e2a66a144f4461f5d57eb2be6a3a7c' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/postcampaign/view-mpostcampaign.tpl',
      1 => 1356511718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17871151650daca5bb0b537-22564584',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
jlist.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
jwplayer.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />


	
	
	<form id="frmcampadd" name="frmcampadd" action="index.php?file=pc-mpostcampaign_a" enctype="multipart/form-data" method="post">
		<input type="hidden" name="iCampaignId" id="iCampaignId" value="<?php echo $_smarty_tpl->getVariable('iCampaignId')->value;?>
" />
		<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('modeCampaign')->value;?>
" />
		<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iMemberId'];?>
" />
		<input type="hidden" name="iMemberId" id="iMemberId" value="<?php echo $_smarty_tpl->getVariable('memberId')->value;?>
" />
		<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vImage'];?>
" />
		<input type="hidden" name="vOldMp3" id="vOldMp3" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vMp3File'];?>
" />
		<input type="hidden" name="vOldVideo" id="vOldVideo" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vVideoFile'];?>
" />
		<input type="hidden" name="selectedstate" id="selectedstate" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iStateId'];?>
"/>
		<input type="hidden" name="actionCamp" id="actionCamp" value="" />
	
			<div class="container half left">
				
				<div class="conthead"><h2>Create a Campaign</h2></div>
				<div class="contentbox">
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Name:</strong></label>
					<input type="text" id="vCampaignName" name="Data[vCampaignName]" class="inputbox" lang="*" title="Ad Name" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vCampaignName'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Content:</strong></label>
				</div>
				<textarea id="tContent" name="Data[tContent]" class="inputbox" title="Ad Content" lang="*" style="margin-left:140px;width:314px; height:90px;"><?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['tContent'];?>
</textarea>
				<div style="clear:both;"></div>
				<br>
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Image:</strong></label>
					<?php if ($_smarty_tpl->getVariable('db_post_campaign')->value[0]['vImage']==''){?>
					<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vImage'];?>
"  title="Ad Image" lang="*" onchange="CheckValidFile(this.value,this.name)" style="width:206px;"/>
					<?php }else{ ?>
					<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vImage'];?>
"  title="Ad Image" onchange="CheckValidFile(this.value,this.name)" style="width:206px;"/>
					<?php }?>
					
					<?php if ($_smarty_tpl->getVariable('db_post_campaign')->value[0]['vImage']!=''){?>
					<div style="float:right; width:200px;">
						<div style="float:left; margin:0px 5px 0px 10px;"><a href="#view17" id="testt"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a></div>
						<img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="CampaignImgDelete();"/>
						<div style="display:none;">
							<div id="view17">
								<div class="popup_box">
									<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_campaign"];?>
/member/<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vImage'];?>
" /></div>
								</div>
							</div>
						</div>
					</div>
					<?php }?> 
				</div>
				<div style="clear:both;"></div>
				<div class="inputboxes">
					<label for="textfield"><strong>Campaign Interests:</strong></label>
					<br/>
					<?php if (count($_smarty_tpl->getVariable('db_interest')->value)>0){?>
					<div class="event_skill"> <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
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
" id="iInterestId" lang="*" name="iInterestId[]" <?php if (in_array($_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iInterestId'],$_smarty_tpl->getVariable('Arrintrest')->value)){?>checked<?php }?>/>
							<?php echo $_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vInterest'];?>
 </div>
						<?php endfor; endif; ?> </div>
					<?php }?> </div>
				<div class="inputboxes">
					<label for="textfield"><strong>Other Interest:</strong></label>
					<input type="text" id="vOtherinterest" name="Data[vOtherinterest]" class="inputbox"  title="Other Interest" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vOtherinterest'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Campaign Skills:</strong></label>
					<br/>
					<?php if (count($_smarty_tpl->getVariable('db_skill')->value)>0){?>
					<div class="event_skill" style="margin-left:137px;"> <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
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
						<?php endfor; endif; ?> </div>
					<?php }?> </div>
				<div class="inputboxes">
					<label for="textfield"><strong>Other Skill:</strong></label>
					<input type="text" id="vOtherskill" name="Data[vOtherskill]" class="inputbox" title="Other Skill" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vOtherskill'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Country:</strong></label>
					<select id="iCountryId" name="Data[iCountryId]" lang="*" title="Country" class="inputbox" onchange="getCountryCamp(this.value)" style="width:227px;">
						<option value=''>--Select Country--</option>
						
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_cont_info')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						
						<option value='<?php echo $_smarty_tpl->getVariable('db_cont_info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCountryId'];?>
' <?php if ($_smarty_tpl->getVariable('db_cont_info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCountryId']==$_smarty_tpl->getVariable('db_post_campaign')->value[0]['iCountryId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_cont_info')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCountry'];?>
</option>
						
						<?php endfor; endif; ?>
					
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>State:</strong></label>
					<div id="showallstatte">
						<select id="iStateId" name="Data[iStateId]" title="State"  lang="*"  style="width:227px">
							<option value=''>--Select State--</option>
						</select>
					</div>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>City:</strong></label>
					<input type="text" id="vCity" name="Data[vCity]" class="inputbox" lang="*" title="City" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vCity'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Choose a zip code:</strong></label>
					<input type="text" id="vZipCode" name="Data[vZipCode]" class="inputbox" title="Zip Code" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vZipCode'];?>
" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Choose mile radius from your location:</strong></label>
					<input type="text" id="vMileRadius" name="Data[vMileRadius]" class="inputbox" title="Zip Code" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vMileRadius'];?>
" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Is this a local community campaign?:</strong></label>
					<label for="textfield">
					<input type="checkbox" id="eIsLocal" name="eIsLocal" value="Yes" <?php if ($_smarty_tpl->getVariable('db_post_campaign')->value[0]['eIsLocal']=='Yes'){?>checked<?php }?>>
					<strong>Yes</strong></label>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Is this a National community campaign?:</strong></label>
					<label for="textfield">
					<input type="checkbox" id="eIsNational" name="eIsNational" value="Yes" <?php if ($_smarty_tpl->getVariable('db_post_campaign')->value[0]['eIsNational']=='Yes'){?>checked<?php }?>>
					<strong>Yes</strong></label>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Start Date:</strong></label>
					<input type="text" id="dStartDate" name="Data[dStartDate]" class="inputbox" title="Ad Start Date" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['dStartDate'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Finish Date:</strong></label>
					<input type="text" id="dFinishDate" name="Data[dFinishDate]" class="inputbox" title="Ad Finish Date"  value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['dFinishDate'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Points for viewing Ad:</strong></label>
					<input type="text" id="iPointsViewingAd" name="Data[iPointsViewingAd]" class="inputbox" title="Points for viewing Ad" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iPointsViewingAd'];?>
" onkeypress="return checkprice(event);"/>
				</div>
			</div>
				
			</div>
		
			
		<div class="ui-helper-clearfix"></div>			
	
		
		<div class="container half right">
			<div class="conthead">
				<h2>Radio Ad</h2>
			</div>
			<div class="contentbox">
				<div class="inputboxes">
					<div>
						<label for="textfield"><strong>Upload Mp3 File:</strong></label>
						<?php if ($_smarty_tpl->getVariable('db_post_campaign')->value[0]['vMp3File']==''){?>
						<input type="file" id="vMp3File" name="vMp3File" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vMp3File'];?>
"  title="Mp3 File" lang="*" onchange="CheckValidAudioFile(this.value,this.id)" style="width:201px;"/>
						<?php }else{ ?>
						<input type="file" id="vMp3File" name="vMp3File" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vMp3File'];?>
"  title="Mp3 File" onchange="CheckValidAudioFile(this.value,this.id)" style="width:201px;"/>
						<?php }?> </div>
					<?php if ($_smarty_tpl->getVariable('db_post_campaign')->value[0]['vMp3File']!=''){?>
					<div style="float:left; width:392px; margin-top: 11px; clear:left;">
						<div style="width:200px; float:left; margin-left:135px;">
							<object type="application/x-shockwave-flash" data="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_music'];?>
/dewplayer.swf" width="200" height="20" id="dewplayer" name="dewplayer">
								<param name="wmode" value="transparent" />
								<param name="movie" value="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_music'];?>
/dewplayer.swf" />
								<param name="flashvars" value="mp3=<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_campaign"];?>
/member/<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vMp3File'];?>
&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />
							</object>
						</div>
						<div style="width:50px; float:right">
							<p><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
delete.png" onclick="Mp3delete();"/></p>
						</div>
					</div>
					<?php }?> </div>
				<div class="inputboxes">
					<label for="textfield"><strong>Ponts to Listen To radio ad:</strong></label>
					<input type="text" id="iPointsListenAd" name="Data[iPointsListenAd]" class="inputbox" title="Ponts to Listen To radio ad" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iPointsListenAd'];?>
" onkeypress="return checkprice(event);"/>
				</div>
			</div>
		
		</div>
		<div class="container half right">
		
			<div class="conthead">
				<h2>Commercial Ad</h2>
			</div>
			<div class="contentbox">
				<div class="inputboxes">
					<div>
						<label for="textfield"><strong>Upload Video File:</strong></label>
						<?php if ($_smarty_tpl->getVariable('db_post_campaign')->value[0]['vVideoFile']==''){?>
						<input type="file" id="vVideoFile" name="vVideoFile" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vVideoFile'];?>
"  title="VideoFile" lang="*" onchange="CheckValidVideoFile(this.value,this.id)" style="width:201px;"/>
						<?php }else{ ?>
						<input type="file" id="vVideoFile" name="vVideoFile" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vVideoFile'];?>
"  title="VideoFile" onchange="CheckValidVideoFile(this.value,this.id)" style="width:201px;"/>
						<?php }?> </div>
					<?php if ($_smarty_tpl->getVariable('db_post_campaign')->value[0]['vVideoFile']!=''){?>
					<div style="float:left; width:450px; margin-top: 15px; clear:left;">
						<div id="video-container">Loading the player ...
							<input type="hidden" id="playerUrl" value="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_music'];?>
/player.swf">
							<input type="hidden" id="videoUrl" value="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_campaign"];?>
/member/<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vVideoFile'];?>
">
						</div>
						<div style="width:50px; float:left">
							<p style="margin:26px 0 10px 0;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp4=ob_get_clean();?><?php echo $_tmp4;?>
delete.png" onclick="VideoDelete();"/></p>
						</div>
					</div>
					<?php }?> </div>
				<div class="inputboxes">
					<label for="textfield"><strong>Points to view Commercial ad:</strong></label>
					<input type="text" id="iPointsCommercialAd" name="Data[iPointsCommercialAd]" class="inputbox" title="Ponts to view Commercial ad" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iPointsCommercialAd'];?>
" onkeypress="return checkprice(event);"/>
				</div>
			</div>
		</div>
		
	
		<div class="container half right">
			
				<div class="conthead">
					<h2>WebLink Option</h2>
				</div>
				<div class="contentbox">
					<div class="inputboxes">
						<label for="textfield"><strong>Ad URL:</strong></label>
						<input type="text" id="vURL" name="Data[vURL]" class="inputbox" title="Ad URL" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vURL'];?>
"/>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Ponts to visit This memeber site:</strong></label>
						<input type="text" id="iPointsWeblinkAd" name="Data[iPointsWeblinkAd]" class="inputbox" title="Ponts to visit This memeber site" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iPointsWeblinkAd'];?>
" onkeypress="return checkprice(event);"/>
					</div>
				</div>
		</div>
			
			<div class="container half right">
				<div class="conthead">
					<h2>Share Option</h2>
				</div>
				<div class="contentbox">
					<label for="textfield"><strong>Point when memebers share to their extended network:</strong></label>
					<div class="inputboxes">
						<input type="text" id="iPointsWhenShare" name="Data[iPointsWhenShare]" class="inputbox" title="Point when memebers share to their extended network" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iPointsWhenShare'];?>
" onkeypress="return checkprice(event);" style="margin-left:136px;"/>
					</div>
				</div>
			</div>
			
			<!--<div class="container">
			<div class="conthead">
				<h2>Who Match this campaign</h2>
			</div>
			<div class="contentbox">
				
				<label for="textfield"><strong>Number of members who match this campaign in my community:</strong></label>
				<div class="inputboxes">
					<input type="text" id="iNumMatchInCommunity" name="Data[iNumMatchInCommunity]" class="inputbox" title="Number of members who match this amp- aign in my community" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iNumMatchInCommunity'];?>
" onkeypress="return checkprice(event);"/>
				</div>
				
				<label for="textfield"><strong>Number of members who match this campaign outside of my community:</strong></label>
				<div class="inputboxes">
					<input type="text" id="iNumMatchOutCommunity" name="Data[iNumMatchOutCommunity]" class="inputbox" title="Number of members who match this campaign outside of my community" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iNumMatchOutCommunity'];?>
" onkeypress="return checkprice(event);"/>
				</div>
				
				<label for="textfield"><strong>Number of members who support biz in my community:</strong></label>
				<div class="inputboxes">
					<input type="text" id="iNumSupportBiz" name="Data[iNumSupportBiz]" class="inputbox" title="Number of members who support biz in my community" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iNumSupportBiz'];?>
" onkeypress="return checkprice(event);"/>
				</div>
			</div>
		</div>-->
			<div class="container half right">
				<div class="conthead">
					<h2>Number of clicks for this campaign</h2>
				</div>
				<div class="contentbox">
					<!--<div class="inputboxes">
						<label for="textfield"><strong>Max Ad Views:</strong></label>
						<input type="text" id="iMaxAdViews" name="Data[iMaxAdViews]" class="inputbox" title="Max Ad Views" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iMaxAdViews'];?>
" onkeypress="return checkprice(event);"/>
					</div>-->
					<div class="inputboxes">
						<label for="textfield"><strong>Max Ad Clicks:</strong></label>
						<input type="text" id="iMaxAdClicks" name="Data[iMaxAdClicks]" class="inputbox" title="Max Ad Clicks" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iMaxAdClicks'];?>
" onkeypress="return checkprice(event);"/>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Status :</strong></label>
						<select id="eStatus" name="Data[eStatus]" style="width:223px;" class="inputbox">
							<option value="Active" <?php if ($_smarty_tpl->getVariable('db_post_campaign')->value[0]['eStatus']=='Active'){?>selected<?php }?> >Active</option>
							<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_post_campaign')->value[0]['eStatus']=='Inactive'){?>selected<?php }?> >Inactive</option>
						</select>
					</div>
					<div class="add_photo_cancel"> <?php if ($_smarty_tpl->getVariable('modeCampaign')->value=='add'){?>
						<input type="submit" value="Add Campaign" class="btn" title="Add Campaign" onclick="return validate(document.frmcampadd);" style="cursor:pointer;"/>
						<?php }else{ ?>
						<input type="submit" value="Edit Campaign" class="btn" title="Edit Campaign" onclick="return validate(document.frmcampadd);" style="cursor:pointer;"/>
						<?php }?>
						<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
					</div>
				</div>
			</div>
	<div class="ui-helper-clearfix"></div>
	<div class="container half left">
				<div class="conthead">
					<h2>BuyLink Option</h2>
				</div>
				<div class="contentbox" >
					<div class="inputboxes">
						<label for="textfield"><strong>Buy Link URL:</strong></label>
						<input type="text" id="vBuyLinkURL" name="Data[vBuyLinkURL]" class="inputbox" title="Buy Link URL" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['vBuyLinkURL'];?>
"/>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Item cost:</strong></label>
						<input type="text" id="iItemCost" name="Data[iItemCost]" class="inputbox" title="Item Cost" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iItemCost'];?>
" onkeypress="return checkprice(event);"/>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Discount:</strong></label>
						<input type="text" id="iItemDiscount" name="Data[iItemDiscount]" class="inputbox" title="Item Discount" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iItemDiscount'];?>
" onkeypress="return checkprice(event);"/>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Ponts When Members buy:</strong></label>
						<input type="text" id="iPontsWhenBuy" name="Data[iPontsWhenBuy]" class="inputbox" title="Points When Members buy" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iPontsWhenBuy'];?>
" onkeypress="return checkprice(event);"/>
					</div>
				</div>
			</div>
	
	</form>	
	<form name="frmsearchcampaign" id="frmsearchcampaign" action="#tab-postcampaign" method="post">
		<div style="clear:both;"></div>
		<div class="whitebox">
		<table width="100%" border="0">
			<tbody>
				<tr>
					<td width="10%"><label for="textfield"><strong>Search:</strong></label>
					<td>
					<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword66" name="keyword66" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
" class="inputbox" /></div>
					<td>
					<td width="10%" ><div class="bulkactions"><select name="option66" id="option66" class="inputbox">
							<option value="vCampaignName">Campaign Name</option>
							<option value="eStatus">Status</option>
						</select></div>
					</td>
					<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Srchoptioncampaign();"/></div></td>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	
	<div class="contentbox contentbox_admin_bot">
		<form name="frmListCamp" id="frmListCamp"  action="index.php?file=pc-mpostcampaign_a" method="post">
		<input type="hidden" name="action" id="action" value="" />
		<input type="hidden" name="iCampaignId" id="iCampaignId" value="" />
		<input  type="hidden" name="iMemberId" id="iMemberId" value=""/>
		
		<table width="100%" border="0" class="admin_photo_table">
			<thead class="admin_table_title">
				<tr>
					<th>Campaign Name</th>
					<th>Status</th>
					<th>Action</th>
					<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmListCamp);"/></th>
				</tr>
				<tr>
					<td colspan="7" align="center"><div style="width:821px; margin:auto;"></div></td>
				</tr>
			</thead>
			<tbody>
			
			<?php if (count($_smarty_tpl->getVariable('db_view_postcampaign')->value)>0){?>
			<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_view_postcampaign')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iCampaignId=<?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCampaignId'];?>
#tab-postcampaign" title=""><?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCampaignName'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
				<td><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=m-member&mode=edit&iMemberId=<?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
&iCampaignId=<?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCampaignId'];?>
#tab-postcampaign" title=""><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_edit.png" title="Edit" /></a> <a href="javascript:void(0);" title="Active" onclick="MakeActionpostCampaign('<?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCampaignId'];?>
','<?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Active');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_approve.png" title="Active" /></a> <a href="javascript:void(0);" title="Inactive" onclick="MakeActionpostCampaign('<?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCampaignId'];?>
','<?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Inactive');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_unapprove.png" title="Inactive" /></a> <a href="javascript:void(0);" title="Delete" onclick="MakeActionpostCampaign('<?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCampaignId'];?>
','<?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
','Deletes');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_delete.png" title="Delete" /></a> </td>
				<td><input name="iCampaignId[]" type="checkbox" id="iId" value="<?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCampaignId'];?>
"/>
					<input name="iMemberId" type="hidden" id="mId" value="<?php echo $_smarty_tpl->getVariable('db_view_postcampaign')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
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
	<div style="clear:both;"></div>
	<div class="extrabottom"><table cellpadding="0" cellspacing="0" width="100%"><tr><td>
		<div class="pagination"> <?php if (count($_smarty_tpl->getVariable('db_view_postcampaign')->value)>0){?> <span class="switch" style="float: left;"><?php echo $_smarty_tpl->getVariable('recmsg58')->value;?>
</span> <?php }?> </div></td>
		<td><div class="bulkactions">
			<select name="newactionCampaign" id="newactionCampa">
				<option value="">Select Action</option>
				<option value="Deletes">Make Delete</option>
				<option value="Active">Make Active</option>
				<option value="Inactive">Make InActive</option>
				<option value="Show all">Show All</option>
			</select>
			<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionCampa').value,'m-member',document.frmListCamp);"/>
		</div></td></tr></table>
	</div>
	<div style="clear:both;"></div>
</div>
	</div>
	

<script type="text/javascript">
 $(document).ready(function() {
 $(function() {$('#dStartDate').datepicker({dateFormat: 'mm-dd-yy'});});
 });
  $(document).ready(function() {
 $(function() {$('#dFinishDate').datepicker({dateFormat: 'mm-dd-yy'});});
 });
 </script>
<script>
function Srchoptioncampaign(){
    document.getElementById('frmsearchcampaign').submit();
}
/*function AlphaSearch(val){
    var alphavalue = val;
    var file = 'pj-mpostjob';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}*/
function MakeActionpostCampaign(loopid,member,type){
    document.frmListCamp.iCampaignId.value = loopid;
    document.frmListCamp.iMemberId.value = member;
    document.frmListCamp.action.value = type;
    document.frmListCamp.submit();	
}
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
$(document).ready(function(){
	$('#testt').fancybox({
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

function CheckValidAudioFile(val,name)
{
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'mp3' || a == 'MP3' )
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Audio (mp3)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}

function CheckValidVideoFile(val,name)
{
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'mp4' || a == 'MP4' || a== 'avi' || a == 'AVI' || a == 'flv' || a == 'FLV')
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Video (mp4, flv, avi)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}
function CampaignImgDelete(){
	var r=confirm("Are you sure to delete this image");
	if (r==true)
	  {
		if($('#actionCamp')){
			$('#actionCamp').val("DeleteImage");
		}
		
		if($('#frmcampadd')){
			$('#frmcampadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
	}
function Mp3delete(){
	var r=confirm("Are you sure to delete this Mp3");
	if (r==true)
	  {
		if($('#actionCamp')){
			$('#actionCamp').val("DeleteMp3");
		}
		
		if($('#frmcampadd')){
			$('#frmcampadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
}
function VideoDelete(){
	var r=confirm("Are you sure to delete this video");
	if (r==true)
	  {
		if($('#actionCamp')){
			$('#actionCamp').val("DeleteVideo");
		}
		
		if($('#frmcampadd')){
			$('#frmcampadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
}
</script>
<script type="text/javascript">
	var playerUrl;
	var videoUrl;
	playerUrl = $('#playerUrl').val();	
	videoUrl = $('#videoUrl').val();
	jwplayer("video-container").setup({
	    flashplayer: playerUrl,
	    file: videoUrl,
	      plugins: {
		"sharing-2": {
		  code: "",
		  link: ""
		}
	      },
	    height: 270,
	    width: 450
	});
</script>
<script>
getId('<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iCountryId'];?>
','<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iMemberId'];?>
','<?php echo $_smarty_tpl->getVariable('db_post_campaign')->value[0]['iCampaignId'];?>
');
function getId(id,id1,id2){
	
	if($('#action').val() == 'edit'){
		var countryId = id;
		var iMemberId=id1
		var iCampaignId=id2
		getCountryCamp(countryId,iMemberId,iCampaignId);
	}
	
}

function getCountryCamp(countryId,iMemberId,iCampaignId)
{
	//alert(countryId);
	var extra ='';
	extra+='&countryId='+countryId;
	extra+='&iMemberId='+iMemberId;
	extra+='&iCampaignId='+iCampaignId;
	if($('#selectedstate')){
        if($('#selectedstate').val() !=''){
         var selectedstate = $('#selectedstate').val();
         extra+='&selectedstate='+selectedstate;   
        }
        
	}
	var url = admin_url+"/index.php?file=pc-ajcampcountry";
	var pars = extra;
    //alert(url+pars);
	$.post(url+pars,
            function(data) {
       //alert(data);
		if($('#showallstatte')){
			$('#showallstatte').html(data);
          
		}
	});
}
</script>
