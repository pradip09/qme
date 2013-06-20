<?php /* Smarty version Smarty-3.0.7, created on 2012-12-14 20:12:09
         compiled from "/var/www/qme/admin/templates/fundraiser/fundraiser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175962691050cb3ac141dbe7-79068158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a53ce499d48de1b6b3a05c76aba4fe4ac37e4b3' => 
    array (
      0 => '/var/www/qme/admin/templates/fundraiser/fundraiser.tpl',
      1 => 1355495787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175962691050cb3ac141dbe7-79068158',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_admin_creditor_url"];?>
/ckeditor.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
datetimepicker.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
jwplayer.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<div id="breadcrumb">
	<ul>
		<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=fu-fundraiser&mode=view">Fundraiser Campaign</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Fundraiser Campaign<?php }else{ ?>Edit Fundraiser Campaign<?php }?></li>
	</ul>
</div>
<div id="content">
	<div class="container" id="tabs">
		<div class="conthead"> <?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
			<h2 class="left">Fundraiser Campaign</h2>
			<?php }else{ ?>
			<h2 class="left">Edit Fundraiser Campaign</h2>
			<?php }?> </div>
	</div>
	<div class="contentbox" style="padding:0 !important">
	<form id="frmadd" name="frmadd" action="index.php?file=fu-fundraiser_a" enctype="multipart/form-data" method="post">
		<input type="hidden" name="iCampaignId" id="iCampaignId" value="<?php echo $_smarty_tpl->getVariable('iCampaignId')->value;?>
" />
		<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
		<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vImage'];?>
" />
		<input type="hidden" name="vOldMp3" id="vOldMp3" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vMp3File'];?>
" />
		<input type="hidden" name="vOldVideo" id="vOldVideo" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vVideoFile'];?>
" />
		<div style="float:left; width:49%;" >
			<div class="container">
				<div class="conthead">
					<h2>Create Fundraiser Campaign</h2>
				</div>
				<div class="contentbox">
					<div class="inputboxes">
						<label for="textfield"><strong>Compaign Name</strong></label>
						<input type="text" id="vCampaignName" name="Data[vCampaignName]" class="inputbox" lang="*" title="Ad Name" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vCampaignName'];?>
"/>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Member:</strong></label>
						<!--<input type="text" id="iMemberId" name="Data[iMemberId]" class="inputbox"  value="<?php echo $_smarty_tpl->getVariable('db_fundMember')->value[0]['vName'];?>
" readonly="true"/>-->
						
						<select id="iMemberId" name="Data[iMemberId]" lang="*" title="Member" style="width:224px;">
							<option value=''>--Select Member--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_fundMember')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<option value='<?php echo $_smarty_tpl->getVariable('db_fundMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
' <?php if ($_smarty_tpl->getVariable('db_fundMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId']==$_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iMemberId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_fundMember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
</option>
							
						<?php endfor; endif; ?>
						</select>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Ad Content</strong></label>
					</div>
					<textarea id="tContent" name="Data[tContent]" class="inputbox"  title="Content" ><?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['tContent'];?>
</textarea>
					<div style="clear:both;"></div>
					<br>
					<div class="inputboxes">
						<label for="textfield"><strong>Ad Image:</strong></label>
						<?php if ($_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vImage']==''){?>
						<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vImage'];?>
"  lang="*" title="Ad Image" onchange="CheckValidFile(this.value,this.name)" style="width:200px;margin-right:105px;"/>
						<?php }else{ ?>
						<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vImage'];?>
"  title="Ad Image" onchange="CheckValidFile(this.value,this.name)" style="width:200px;margin-right:105px;"/>
						<?php }?>
						
						<?php if ($_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vImage']!=''){?>
						<div style="margin-top:10px;">
							<div style="float:left; margin:0px 5px 0px 5px;"><a href="#view1" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a></div>
							<img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="ImageDelete();"/>
							<div style="display:none;">
								<div id="view1">
									<div class="popup_box">
										<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_fundraiser_campaign"];?>
member/<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vImage'];?>
" /></div>
									</div>
								</div>
							</div>
						</div>
						<?php }?> </div>
					<div style="clear:both;"></div>
					<div class="inputboxes">
						<label for="textfield"><strong>Campaign Interests:</strong></label>
						<?php if (count($_smarty_tpl->getVariable('db_interest')->value)>0){?>
						<select multiple name="iInterestId[]" id="iInterestId" title="Campaign Interest" class="inputbox"  lang="*" style="width:223px;">
													
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_interest')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						
							<option value="<?php echo $_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iInterestId'];?>
" <?php if (in_array($_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iInterestId'],$_smarty_tpl->getVariable('interestArr')->value)){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vInterest'];?>
</option>
							
						<?php endfor; endif; ?>
					
						</select>
						<?php }?> </div>
					<div class="inputboxes">
						<label for="textfield"><strong>Other Interest:</strong></label>
						<input type="text" id="vOtherInterest" name="Data[vOtherInterest]" class="inputbox" title="Other interest"  value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vOtherInterest'];?>
" />
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Industry:</strong></label>
						<?php if (count($_smarty_tpl->getVariable('db_industry')->value)>0){?>
						<select multiple name="iIndustryId[]"  id="iIndustryId" class="inputbox" title="Industry" lang="*" style="width:223px;" >
												       
					        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_industry')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						
							<option value="<?php echo $_smarty_tpl->getVariable('db_industry')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIndustryId'];?>
" <?php if (in_array($_smarty_tpl->getVariable('db_industry')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIndustryId'],$_smarty_tpl->getVariable('industryArr')->value)){?> selected <?php }?>><?php echo $_smarty_tpl->getVariable('db_industry')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIndustry'];?>
</option>
							
						<?php endfor; endif; ?>
						
						</select>
						<?php }?> </div>
					<div class="inputboxes">
						<label for="textfield"><strong>Other Industry:</strong></label>
						<input type="text" id="vOtherIndustry" name="Data[vOtherIndustry]" class="inputbox" title="Other industry" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vOtherIndustry'];?>
" />
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Is this a local community campaign?:</strong></label>
						<label for="textfield">
						<input type="checkbox" id="eIsLocal" name="eIsLocal" value="Yes" <?php if ($_smarty_tpl->getVariable('db_fundcampaign')->value[0]['eIsLocal']=='Yes'){?>checked<?php }?>>
						<strong>Yes</strong></label>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Choose a zip code:</strong></label>
						<input type="text" id="vZipCode" name="Data[vZipCode]" class="inputbox" title="Zip Code" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vZipCode'];?>
" onkeypress="return checkprice(event);"/>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Choose mile radius from your location:</strong></label>
						<input type="text" id="vMileRadius" name="Data[vMileRadius]" class="inputbox" title="Mile" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vMileRadius'];?>
" onkeypress="return checkprice(event);"/>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Is this a National community campaign?:</strong></label>
						<label for="textfield">
						<input type="checkbox" id="eIsNational" name="eIsNational" value="Yes" <?php if ($_smarty_tpl->getVariable('db_fundcampaign')->value[0]['eIsNational']=='Yes'){?>checked<?php }?>>
						<strong>Yes</strong></label>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Ad Start Date:</strong></label>
						<input type="text" id="dStartDate" name="Data[dStartDate]" class="inputbox" title="Ad Start Date" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['dStartDate'];?>
"/>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Ad Finish Date:</strong></label>
						<input type="text" id="dFinishDate" name="Data[dFinishDate]" class="inputbox" title="Ad Finish Date" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['dFinishDate'];?>
"/>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Points for viewing Ad:</strong></label>
						<input type="text" id="iPointsViewingAd" name="Data[iPointsViewingAd]" class="inputbox" title="Points for viewing Ad" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iPointsViewingAd'];?>
" onkeypress="return checkprice(event);"/>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="conthead">
					<h2>Radio Ad</h2>
				</div>
				<div class="contentbox">
					<div class="inputboxes">
						<div>
							<label for="textfield"><strong>Upload Mp3 File:</strong></label>
							<?php if ($_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vMp3File']==''){?>
							<input type="file" id="vMp3File" name="vMp3File" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vMp3File'];?>
"  title="Mp3 File" lang="*" onchange="CheckValidAudioFile(this.value,this.id)" style="width:202px;"/>
							<?php }else{ ?>
							<input type="file" id="vMp3File" name="vMp3File" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vMp3File'];?>
"  title="Mp3 File" onchange="CheckValidAudioFile(this.value,this.id)" style="width:202px;"/>
							<?php }?> </div>
						<?php if ($_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vMp3File']!=''){?>
						<div style="float:left; width:392px; margin-top: 11px;">
							<div style="width:200px; float:left; margin-left:135px;">
								<object type="application/x-shockwave-flash" data="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_music'];?>
/dewplayer.swf" width="200" height="20" id="dewplayer" name="dewplayer">
									<param name="wmode" value="transparent" />
									<param name="movie" value="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_music'];?>
/dewplayer.swf" />
									<param name="flashvars" value="mp3=<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_fundraiser_campaign"];?>
/member/<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vMp3File'];?>
&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />
								</object>
							</div>
							<div style="width:50px; float:right">
								<p><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
delete.png" onclick="Mp3Delete();"/></p>
							</div>
						</div>
						<?php }?> </div>
					<div class="inputboxes">
						<label for="textfield"><strong>Ponts to Listen To radio ad:</strong></label>
						<input type="text" id="iPointsListenAd" name="Data[iPointsListenAd]" class="inputbox" title="Ponts to Listen To radio ad" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iPointsListenAd'];?>
" onkeypress="return checkprice(event);"/>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="conthead">
					<h2>Commercial Ad</h2>
				</div>
				<div class="contentbox">
					<div class="inputboxes">
						<div>
							<label for="textfield"><strong>Upload Video File:</strong></label>
							<?php if ($_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vVideoFile']==''){?>
							<input type="file" id="vVideoFile" name="vVideoFile" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vVideoFile'];?>
"  title="VideoFile" lang="*" onchange="CheckValidVideoFile(this.value,this.id)" style="width:202px;"/>
							<?php }else{ ?>
							<input type="file" id="vVideoFile" name="vVideoFile" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vVideoFile'];?>
"  title="VideoFile" onchange="CheckValidVideoFile(this.value,this.id)" style="width:202px;"/>
							<?php }?> </div>
						<?php if ($_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vVideoFile']!=''){?>
						<div style="float:left; width:450px; margin-top: 15px;">
							<div id="video-container">Loading the player ...
								<input type="hidden" id="playerUrl" value="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_music'];?>
/player.swf">
								<input type="hidden" id="videoUrl" value="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_fundraiser_campaign"];?>
/member/<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vVideoFile'];?>
">
							</div>
							<div style="width:50px; float:left">
								<p style="margin:26px 0 10px 0;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp4=ob_get_clean();?><?php echo $_tmp4;?>
delete.png" onclick="videoDelete();"/></p>
							</div>
						</div>
						<?php }?> </div>
					<div class="inputboxes">
						<label for="textfield"><strong>Points to view Commercial ad:</strong></label>
						<input type="text" id="iPointsCommercialAd" name="Data[iPointsCommercialAd]" class="inputbox" title="Ponts to view Commercial ad" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iPointsCommercialAd'];?>
" onkeypress="return checkprice(event);"/>
					</div>
				</div>
			</div>
		</div>
		<div style="float:right; width:49%;">
			<div class="container">
				<div class="conthead">
					<h2>WebLink Option</h2>
				</div>
				<div class="contentbox">
					<div class="inputboxes">
						<label for="textfield"><strong>Ad URL:</strong></label>
						<input type="text" id="vURL" name="Data[vURL]" class="inputbox" title="Ad URL" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['vURL'];?>
" style="margin-left: 119px;"/>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Ponts to visit This memeber site:</strong></label>
						<input type="text" id="iPointsWeblinkAd" name="Data[iPointsWeblinkAd]" class="inputbox" title="Ponts to visit This memeber site" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iPointsWeblinkAd'];?>
" onkeypress="return checkprice(event);" style="margin-left: 119px;"/>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="conthead">
					<h2>Upload Campaign Items Info</h2>
				</div>
				<input  type="hidden" id="totcount" name="totcount" value="<?php echo $_smarty_tpl->getVariable('totgal')->value;?>
"/>
				<div class="contentbox" id="TextBoxesGroup"> <?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
					<div id="TextBoxDiv0"  style="border:1px solid #999;border-radius:7px; position:relative; margin-top:10px; padding-top:25px;">
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaign Item name:</strong></label>
							<input type="text" id="vItemName" name="data[vItemName][]" class="inputbox" title="Item Name" lang="*" value=""/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaign Item description BOX:</strong></label>
							<input type="text" id="tDescription" name="data[tDescription][]" class="inputbox" title="Description" lang="*" />
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Production House email notification:</strong></label>
							<input type="text" id="vPNotification" name="data[vPNotification][]" class="inputbox" title="Mail Notification" lang="*" />
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>QME marketing management email notification:</strong></label>
							<input type="text" id="vMarkNotification" name="data[vMarkNotification][]" class="inputbox" title="Market Notification" lang="*" value=""/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaigner email notification 1:</strong></label>
							<input type="text" id="vNotification1" name="data[vNotification1][]" class="inputbox" title="Notification1" lang="*" value=""/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaigner email notification 2:</strong></label>
							<input type="text" id="vNotification2" name="data[vNotification2][]" class="inputbox" title="Notification2" lang="*" value=""/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaigner email notification 3:</strong></label>
							<input type="text" id="vNotification3" name="data[vNotification3][]" class="inputbox" title="Notification3" lang="*" value=""/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Minimum donation to qualify for this time: BOX $20</strong></label>
							<input type="text" id="vQualify" name="data[vQualify][]" class="inputbox" title="Qualify" lang="*"onkeypress="return checkprice(event);"/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Minimum donation to qualify for all Item on this campaign:$50</strong></label>
							<input type="text" id="vQualifyall" name="data[vQualifyall][]" class="inputbox" title="Qualify all" lang="*" onkeypress="return checkprice(event);"/>
						</div>
						<div class="inputboxes" style="padding:3px;">
							<label for="textfield" style="width:250px;"><strong>Points when members donate:</strong></label>
							<input type="text" id="iPontsWhenBuy" name="data[iPontsWhenBuy][]" class="inputbox" title="Points When Members buy" lang="*"  onkeypress="return checkprice(event);"/>
						</div>
						<div class="inputboxes" style="padding:3px;">
							<label for="textfield" style="width:250px;"><strong>Compaign image:</strong></label>
							<input type="file" id="Image" name="Image[]"  title="Image" lang="*" />
							<div class="add_btn_admin">
								<input type="button" class="btn" name="Add" id="addButton" style="padding:3px 15px;" value="Add">
							</div>
						</div>
					</div>
					<?php }elseif($_smarty_tpl->getVariable('mode')->value=='edit'&&$_smarty_tpl->getVariable('totgal')->value==1&&$_smarty_tpl->getVariable('flag')->value==0){?>
					<div id="TextBoxDiv0" style="border:1px solid #999;border-radius:7px; position:relative; margin-top:10px; padding-top:25px;">
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaign Item name:</strong></label>
							<input type="text" id="vItemName" name="data[vItemName][]" class="inputbox" title="Item Name" lang="*" value=""/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaign Item description BOX:</strong></label>
							<input type="text" id="tDescription" name="data[tDescription][]" class="inputbox" title="Description" lang="*" />
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Production House email notification:</strong></label>
							<input type="text" id="vPNotification" name="data[vPNotification][]" class="inputbox" title="Mail Notification" lang="*" />
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>QME marketing management email notification:</strong></label>
							<input type="text" id="vMarkNotification" name="data[vMarkNotification][]" class="inputbox" title="Market Notification" lang="*" value=""/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaigner email notification 1:</strong></label>
							<input type="text" id="vNotification1" name="data[vNotification1][]" class="inputbox" title="Notification1" lang="*" value=""/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaigner email notification 2:</strong></label>
							<input type="text" id="vNotification2" name="data[vNotification2][]" class="inputbox" title="Notification2" lang="*" value=""/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaigner email notification 3:</strong></label>
							<input type="text" id="vNotification3" name="data[vNotification3][]" class="inputbox" title="Notification3" lang="*" value=""/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Minimum donation to qualify for this time: BOX $20</strong></label>
							<input type="text" id="vQualify" name="data[vQualify][]" class="inputbox" title="Qualify" lang="*" onkeypress="return checkprice(event);"/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Minimum donation to qualify for all Item on this campaign:$50</strong></label>
							<input type="text" id="vQualifyall" name="data[vQualifyall][]" class="inputbox" title="Qualify all" lang="*" onkeypress="return checkprice(event);"/>
						</div>
						<div class="inputboxes" style="padding:3px;">
							<label for="textfield" style="width:250px;"><strong>Points when members donate:</strong></label>
							<input type="text" id="iPontsWhenBuy" name="data[iPontsWhenBuy][]" class="inputbox" title="Points When Members buy" lang="*"  onkeypress="return checkprice(event);"/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Compaign image:</strong></label>
							<input type="file" id="Image" name="Image[]"  title="Image" />
							<div width="40%">
								<input type="button" class="btn" name="Add" id="addButton" style="padding:3px 15px;" value="Add">
							</div>
						</div>
					</div>
					<?php }else{ ?>
					
					<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_compaignitem')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
"  style="border:1px solid #999;border-radius:7px;position:relative;margin-top:10px;">
						<input type="hidden" name="iItemId" id="iItemId" value="<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iItemId'];?>
">
						<input type="hidden" name="vOldGall[]" id="vOldGall" value="<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['Image'];?>
">
						<div class="inputboxes" style="padding-top:25px;">
							<label for="textfield" style="width:250px;"><strong>Campaign Item name:</strong></label>
							<input type="text" id="vItemName" name="data[vItemName][]" class="inputbox" title="Item Name" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vItemName'];?>
"/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaign Item description BOX:</strong></label>
							<input type="text" id="tDescription" name="data[tDescription][]" class="inputbox" title="Description" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tDescription'];?>
"/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Production House email notification:</strong></label>
							<input type="text" id="vPNotification" name="data[vPNotification][]" class="inputbox" title="Mail Notification" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPNotification'];?>
"/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>QME marketing management email notification:</strong></label>
							<input type="text" id="vMarkNotification" name="data[vMarkNotification][]" class="inputbox" title="Market Notification" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vMarkNotification'];?>
"/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaigner email notification 1:</strong></label>
							<input type="text" id="vNotification1" name="data[vNotification1][]" class="inputbox" title="Notification1" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vNotification1'];?>
"/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaigner email notification 2:</strong></label>
							<input type="text" id="vNotification2" name="data[vNotification2][]" class="inputbox" title="Notification2" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vNotification2'];?>
"/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Campaigner email notification 3:</strong></label>
							<input type="text" id="vNotification3" name="data[vNotification3][]" class="inputbox" title="Notification3" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vNotification3'];?>
"/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Minimum donation to qualify for this time: BOX $20</strong></label>
							<input type="text" id="vQualify" name="data[vQualify][]" class="inputbox" title="Qualify" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vQualify'];?>
" onkeypress="return checkprice(event);"/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Minimum donation to qualify for all Item on this campaign:$50</strong></label>
							<input type="text" id="vQualifyall" name="data[vQualifyall][]" class="inputbox" title="Qualify all" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vQualifyall'];?>
" onkeypress="return checkprice(event);"/>
						</div>
						<div class="inputboxes" style="padding:3px;">
							<label for="textfield" style="width:250px;"><strong>Points when members donate:</strong></label>
							<input type="text" id="iPontsWhenBuy" name="data[iPontsWhenBuy][]" class="inputbox" title="Points When Members buy" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPontsWhenBuy'];?>
"  onkeypress="return checkprice(event);"/>
						</div>
						<div class="inputboxes">
							<label for="textfield" style="width:250px;"><strong>Compaign image:</strong></label>
							<input type="file" id="Image" name="Image[]"  title="Image" size="20" style="float:left;" />
							<?php if ($_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['Image']!=''){?>
							<a href="#galdis<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
" style="margin-left:5px;" id="popgal<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp5=ob_get_clean();?><?php echo $_tmp5;?>
view.png"/></a>
							<div style="display:none;">
								<div id="galdis<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
">
									<div class="popup_box">
										<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_fundraiser_campaign"];?>
/member/<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_compaignitem')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['Image'];?>
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
							
							<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']==0){?>
							<div class="add_btn_admin">
								<input type="button" class="btn" style="padding:3px 15px;" name="Add" id="addButton" value="Add">
							</div>
							<?php }else{ ?>
							<div class="remove_btn_admin">
								<input type="button" class="btnalt" style="padding:2px 2px;" name="Remove" id="remove" value="Remove" onclick="deleterow(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
);">
							</div>
							<?php }?> </div>
					</div>
					<?php endfor; endif; ?>
					<?php }?> </div>
			</div>
			<div class="container">
				<div class="conthead">
					<h2>Share Option</h2>
				</div>
				<div class="contentbox">
					
					<div class="inputboxes">
						<label for="textfield" style="width:250px;" ><strong>Point when memebers share to their extended network:</strong></label>
						<input type="text" id="iPointsWhenShare" name="Data[iPointsWhenShare]" class="inputbox" title="Point when memebers share to their extended network" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iPointsWhenShare'];?>
" onkeypress="return checkprice(event);"/>
					</div>
				</div>
			</div>
			<!--<div class="container">
				<div class="conthead">
					<h2>Members who match campaign</h2>
				</div>
				<div class="contentbox">
					<label for="textfield"  style="width:250px;"><strong>Number of members who match this campaign in my community:</strong></label>
					<div class="inputboxes">
						<input type="text" id="iNumMatchInCommunity" name="Data[iNumMatchInCommunity]" class="inputbox" title="Number of members who match this amp- aign in my community" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iNumMatchInCommunity'];?>
" onkeypress="return checkprice(event);"/>
					</div>
					<label for="textfield"><strong>Number of members who match this campaign outside of my community:</strong></label>
					<div class="inputboxes">
						<input type="text" id="iNumMatchOutCommunity" name="Data[iNumMatchOutCommunity]" class="inputbox" title="Number of members who match this campaign outside of my community" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iNumMatchOutCommunity'];?>
" onkeypress="return checkprice(event);"/>
					</div>
					<label for="textfield"><strong>Number of members who support biz in my community:</strong></label>
					<div class="inputboxes">
						<input type="text" id="iNumSupportBiz" name="Data[iNumSupportBiz]" class="inputbox" title="Number of members who support biz in my community" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iNumSupportBiz'];?>
" onkeypress="return checkprice(event);"/>
					</div>
				</div>
			</div>-->
			<div class="container">
				<div class="conthead">
					<h2>Number of clicks for this campaign</h2>
				</div>
				<div class="contentbox">
					<!--<div class="inputboxes">
						<label for="textfield" style="width:250px;"><strong>Max Ad Views:</strong></label>
						<input type="text" id="iMaxAdViews" name="Data[iMaxAdViews]" class="inputbox" title="Max Ad Views" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iMaxAdViews'];?>
" onkeypress="return checkprice(event);"/>
					</div>-->
					<div class="inputboxes">
						<label for="textfield" style="width:250px;"><strong>Max Ad Clicks:</strong></label>
						<input type="text" id="iMaxAdClicks" name="Data[iMaxAdClicks]" class="inputbox" title="Max Ad Clicks" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_fundcampaign')->value[0]['iMaxAdClicks'];?>
" onkeypress="return checkprice(event);"/>
					</div>
					<div class="inputboxes">
						<label for="textfield" style="width:250px;"><strong>Status :</strong></label>
						<select id="eStatus" name="Data[eStatus]" style="width:224px;">
							<option value="Active" <?php if ($_smarty_tpl->getVariable('db_fundcampaign')->value[0]['eStatus']=='Active'){?>selected<?php }?> >Active</option>
							<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_fundcampaign')->value[0]['eStatus']=='Inactive'){?>selected<?php }?> >Inactive</option>
						</select>
					</div>
					<br>
					<br>
					<br>
					<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
					<input type="submit" value="Add Campaign" class="btn" title="Add Campaign" onclick="return validate(document.frmadd);" style="cursor:pointer;margin-left:255px;"/>
					<?php }else{ ?>
					<input type="submit" value="Edit Campaign" class="btn" title="Edit Campaign" onclick="return validate(document.frmadd);" style="cursor:pointer;margin-left:255px;"/>
					<?php }?>
					<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
				</div>
			</div>
		</div>
		</div>
		<div style="clear:both;"></div>
	</form>
</div>
</div>

<script>

$(document).ready(function(){
    var counter = $('#totcount').val();
    
    $("#addButton").click(function () {
    //alert($('#totcount').val());
    if($('#totcount').val() >= 5){
        alert("Only allow 5 images to upload.");
        return false;
    }   
 
    var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
       
    
        var html ='';
        html +='<div id="TextBoxDiv0" style="border:1px solid #999;border-radius:7px; position:relative; margin-top:10px; padding-top:25px;">';
		html +='<div class="inputboxes"><label for="textfield" style="width:250px;"><strong>Campaign Item name:</strong></label><input type="text" id="vItemName" name="data[vItemName][]" class="inputbox" title="Item Name" lang="*" value=""/></div>';
	        html +='<div class="inputboxes"><label for="textfield" style="width:250px;"><strong>Campaign Item description BOX:</strong></label><input type="text" id="tDescription" name="data[tDescription][]" class="inputbox" title="Description" lang="*" /></div>';
		html +='<div class="inputboxes"><label for="textfield" style="width:250px;"><strong>Production House email notification:</strong></label><input type="text" id="vPNotification" name="data[vPNotification][]" class="inputbox" title="Mail Notification" lang="*" /></div>';
		html +='<div class="inputboxes"><label for="textfield" style="width:250px;"><strong>QME marketing management email notification:</strong></label><input type="text" id="vMarkNotification" name="data[vMarkNotification][]" class="inputbox" title="Market Notification" lang="*" /></div>';
		html +='<div class="inputboxes"><label for="textfield" style="width:250px;"><strong>Campaigner email notification 1:</strong></label><input type="text" id="vNotification1" name="data[vNotification1][]" class="inputbox" title="Notification1" lang="*" value=""/></div>';
		html +='<div class="inputboxes"><label for="textfield" style="width:250px;"><strong>Campaigner email notification 2:</strong></label><input type="text" id="vNotification2" name="data[vNotification2][]" class="inputbox" title="Notification2" lang="*" value=""/></div>';
		html +='<div class="inputboxes"><label for="textfield" style="width:250px;"><strong>Campaigner email notification 3:</strong></label><input type="text" id="vNotification3" name="data[vNotification3][]" class="inputbox" title="Notification3" lang="*" value=""/></div>';
		html +='<div class="inputboxes"><label for="textfield" style="width:250px;"><strong>Minimum donation to qualify for this time: BOX $20</strong></label><input type="text" id="vQualify" name="data[vQualify][]" class="inputbox" title="Qualify" lang="*" onkeypress="return checkprice(event);"/></div>';
		html +='<div class="inputboxes"><label for="textfield" style="width:250px;"><strong>Minimum donation to qualify for all Item on this campaign:$50</strong></label><input type="text" id="vQualifyall" name="data[vQualifyall][]" class="inputbox" title="Qualify all" lang="*" onkeypress="return checkprice(event);"/></div>';
		html +='<div class="inputboxes" style="padding:3px;"><label for="textfield" style="width:250px;"><strong>Points when members donate:</strong></label><input type="text" id="iPontsWhenBuy" name="data[iPontsWhenBuy][]" class="inputbox" title="Points When Members buy" lang="*"  onkeypress="return checkprice(event);"/></div>';
		html +='<div class="inputboxes"><label for="textfield" style="width:250px;"><strong>Compaign image:</strong></label><input type="file" id="Image" name="Image[]"  title="Image" lang="*" /></div>';
		html +='<div class="remove_btn_admin"><input type="button" name="Remove" class="btnalt" style="padding:2px 2px;" id="remove" value="Remove" onclick="deleterow('+counter+');"></div>';
	html +='</div>';
       
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






function redirectcancel(){

    window.location="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=fu-fundraiser&mode=view";
    return false;
}

function checkOnly(x)
  {
  $('#eIsLocal').attr("checked", false);
    $(x).attr("checked", true);
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


function Mp3Delete(){
	var r=confirm("Are you sure to delete this Mp3");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteMp3");
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
function videoDelete(){
	var r=confirm("Are you sure to delete this video");
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

</script>
<script type="text/javascript">
	//CKEDITOR.replace( 'tContent' );

	$(document).ready(function() {
	$(function() {$('#dStartDate').datepicker({dateFormat: 'yy-mm-dd'});});
	});
	
	$(document).ready(function() {
	$(function() {$('#dFinishDate').datepicker({dateFormat: 'yy-mm-dd'});});
	});
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
CKEDITOR.replace( 'tContent' );
</script>
